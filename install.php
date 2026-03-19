<?php
/**
 * Flavor Theme - Database Installer (v1.1.0)
 * Copyright (C) 2025-2026  Octavio Daio  <ola@novadx.pt>  https://novadx.pt
 *
 * Creates the llx_flavor_config table and seeds it with default icon mappings.
 * Auto-locks itself after successful installation via install.lock.
 *
 * Usage: Visit http://your-dolibarr/theme/flavor/install.php (admin only, one-time)
 */

// ──────────────────────────────────────────────────────────────────────────────
// SECURITY GATE 1: Install Lock
// ──────────────────────────────────────────────────────────────────────────────
if (file_exists(__DIR__ . '/install.lock')) {
    die('<div style="font-family: \'Inter\', -apple-system, sans-serif; background: #F8FAFC; height: 100vh; display: flex; align-items: center; justify-content: center; margin: 0;">
            <div style="background: #FFF; padding: 48px; border-radius: 16px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.1); text-align: center; max-width: 420px;">
                <div style="width: 64px; height: 64px; background: linear-gradient(135deg, #DCFCE7, #BBF7D0); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px; font-size: 28px;">✅</div>
                <h2 style="color: #1E293B; margin-top: 0; font-size: 1.25rem;">Already Installed</h2>
                <p style="color: #64748B; line-height: 1.6; margin-bottom: 0;">The Flavor database schema has already been installed. To re-run, delete <code style="background: #F1F5F9; padding: 2px 6px; border-radius: 4px;">install.lock</code> from the theme directory.</p>
            </div>
         </div>');
}

// ──────────────────────────────────────────────────────────────────────────────
// Dolibarr Bootstrap
// ──────────────────────────────────────────────────────────────────────────────
define('NOCSRFCHECK', 1);
define('NOTOKENRENEWAL', 1);
define('NOREQUIREMENU', 1);
define('NOREQUIREHTML', 1);
define('NOREQUIREAJAX', 1);

require_once __DIR__.'/../../main.inc.php';

// ──────────────────────────────────────────────────────────────────────────────
// SECURITY GATE 2: Admin only
// ──────────────────────────────────────────────────────────────────────────────
if (empty($user->admin)) {
    accessforbidden('Admin access required');
}

// ──────────────────────────────────────────────────────────────────────────────
// INSTALLATION LOGIC
// ──────────────────────────────────────────────────────────────────────────────
$errors = array();
$steps  = array();
$prefix = MAIN_DB_PREFIX; // typically 'llx_'

// ── Step 1: Create table ─────────────────────────────────────────────────────
$tableName = $prefix . 'flavor_config';

$sql_create = "CREATE TABLE IF NOT EXISTS " . $tableName . " (
    rowid        INT AUTO_INCREMENT PRIMARY KEY,
    menu_key     VARCHAR(100) NOT NULL,
    fa_icon      VARCHAR(50)  NOT NULL DEFAULT '',
    custom_label VARCHAR(200) NOT NULL DEFAULT '',
    is_hidden    TINYINT      NOT NULL DEFAULT 0,
    sort_order   INT          NOT NULL DEFAULT 0,
    entity       INT          NOT NULL DEFAULT 1,
    UNIQUE KEY uk_flavor_config_menu (menu_key, entity)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$resql = $db->query($sql_create);
if ($resql) {
    $steps[] = array('ok' => true,  'msg' => 'Table <code>'.$tableName.'</code> created (or already exists)');
} else {
    $errors[] = 'Failed to create table: ' . $db->lasterror();
    $steps[]  = array('ok' => false, 'msg' => 'Table creation failed: ' . htmlspecialchars($db->lasterror()));
}

// ── Step 2: Seed default icon mappings ───────────────────────────────────────
$defaultMappings = array(
    array('home',        'fas fa-tachometer-alt',     'Dashboard'),
    array('companies',   'fas fa-building',           'Third Parties'),
    array('products',    'fas fa-box-open',           'Products / Services'),
    array('commercial',  'fas fa-briefcase',          'Commercial'),
    array('compta',      'fas fa-file-invoice-dollar', 'Billing / Payments'),
    array('accountancy', 'fas fa-book',               'Accountancy'),
    array('bank',        'fas fa-university',         'Banking'),
    array('project',     'fas fa-project-diagram',    'Projects'),
    array('hrm',         'fas fa-users',              'HR / Leaves'),
    array('ticket',      'fas fa-life-ring',          'Tickets / Support'),
    array('tools',       'fas fa-tools',              'Tools'),
    array('members',     'fas fa-id-card',            'Members'),
);

$seedCount  = 0;
$seedErrors = 0;

foreach ($defaultMappings as $idx => $map) {
    $menuKey     = $db->escape($map[0]);
    $faIcon      = $db->escape($map[1]);
    $customLabel = $db->escape($map[2]);
    $sortOrder   = ($idx + 1) * 10; // 10, 20, 30...

    $sql_seed = "INSERT INTO " . $tableName . " (menu_key, fa_icon, custom_label, sort_order, entity)
                 SELECT '".$menuKey."', '".$faIcon."', '".$customLabel."', ".$sortOrder.", 1
                 FROM DUAL
                 WHERE NOT EXISTS (
                     SELECT 1 FROM " . $tableName . " WHERE menu_key = '".$menuKey."' AND entity = 1
                 )";

    $resql = $db->query($sql_seed);
    if ($resql) {
        if ($db->affected_rows($resql) > 0) {
            $seedCount++;
        }
    } else {
        $seedErrors++;
        $errors[] = 'Seed error for "'.$map[0].'": ' . $db->lasterror();
    }
}

if ($seedErrors === 0) {
    $steps[] = array('ok' => true, 'msg' => 'Seeded <strong>'.$seedCount.'</strong> default icon mappings (skipped existing)');
} else {
    $steps[] = array('ok' => false, 'msg' => 'Seed completed with '.$seedErrors.' error(s)');
}

// ── Step 3: Verify data ──────────────────────────────────────────────────────
$sql_count = "SELECT COUNT(*) as total FROM " . $tableName . " WHERE entity = 1";
$resql = $db->query($sql_count);
$totalRows = 0;
if ($resql) {
    $obj = $db->fetch_object($resql);
    $totalRows = (int) $obj->total;
    $steps[] = array('ok' => true, 'msg' => 'Verification: <strong>'.$totalRows.'</strong> rows in <code>'.$tableName.'</code>');
}

// ── Step 4: Auto-lock ────────────────────────────────────────────────────────
$installSuccess = empty($errors);

if ($installSuccess) {
    $lockContent = 'Installed on '.date('Y-m-d H:i:s').' by '.$user->login . "\n";
    $lockContent .= 'Schema version: 1.1.0' . "\n";
    $lockContent .= 'Rows seeded: ' . $seedCount . "\n";

    if (file_put_contents(__DIR__ . '/install.lock', $lockContent) !== false) {
        $steps[] = array('ok' => true, 'msg' => '<code>install.lock</code> created — installer is now locked');
    } else {
        $steps[] = array('ok' => false, 'msg' => 'Warning: could not create <code>install.lock</code> — check file permissions');
    }
}

// ──────────────────────────────────────────────────────────────────────────────
// OUTPUT UI
// ──────────────────────────────────────────────────────────────────────────────
?>
<!DOCTYPE html>
<html>
<head>
<title>Flavor Theme Installer — v1.1.0</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Inter', -apple-system, sans-serif; background: #F8FAFC; color: #1E293B; min-height: 100vh; display: flex; align-items: center; justify-content: center; }

    .installer { background: #FFF; max-width: 560px; width: 100%; border-radius: 20px; padding: 48px; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.08); margin: 32px; }

    .installer-icon { width: 72px; height: 72px; border-radius: 18px; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px; font-size: 32px; }
    .installer-icon.success { background: linear-gradient(135deg, #DCFCE7, #BBF7D0); }
    .installer-icon.error { background: linear-gradient(135deg, #FEE2E2, #FECACA); }

    h1 { text-align: center; font-size: 1.5rem; font-weight: 700; margin-bottom: 8px; }
    .subtitle { text-align: center; color: #64748B; font-size: 0.9rem; margin-bottom: 32px; }

    .steps { list-style: none; padding: 0; margin-bottom: 32px; }
    .steps li { display: flex; align-items: flex-start; gap: 12px; padding: 12px 0; border-bottom: 1px solid #F1F5F9; font-size: 0.9rem; line-height: 1.5; }
    .steps li:last-child { border-bottom: none; }
    .step-icon { width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; flex-shrink: 0; margin-top: 1px; }
    .step-icon.ok { background: #DCFCE7; color: #166534; }
    .step-icon.fail { background: #FEE2E2; color: #991B1B; }
    .step-msg { flex: 1; color: #475569; }
    .step-msg code { background: #F1F5F9; padding: 1px 5px; border-radius: 3px; font-size: 0.85em; }

    .error-box { background: #FEF2F2; border: 1px solid #FECACA; border-radius: 10px; padding: 16px; margin-bottom: 24px; font-size: 0.85rem; color: #991B1B; }

    .btn { display: inline-block; padding: 12px 28px; border-radius: 10px; font-size: 0.9rem; font-weight: 600; text-decoration: none; cursor: pointer; border: none; transition: all 0.2s ease; }
    .btn-primary { background: linear-gradient(135deg, #6366F1, #818CF8); color: #FFF; box-shadow: 0 4px 12px rgba(99,102,241,0.25); }
    .btn-primary:hover { box-shadow: 0 8px 20px rgba(99,102,241,0.35); transform: translateY(-1px); }
    .btn-outline { background: #FFF; color: #475569; border: 1px solid #E2E8F0; }
    .btn-outline:hover { border-color: #6366F1; color: #6366F1; }
    .btn-group { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }

    .footer { text-align: center; margin-top: 24px; font-size: 0.8rem; color: #94A3B8; }
    .footer a { color: #6366F1; text-decoration: none; }
</style>
</head>
<body>

<div class="installer">
    <div class="installer-icon <?php echo $installSuccess ? 'success' : 'error'; ?>">
        <?php echo $installSuccess ? '🚀' : '❌'; ?>
    </div>

    <h1><?php echo $installSuccess ? 'Installation Complete!' : 'Installation Failed'; ?></h1>
    <p class="subtitle">
        <?php echo $installSuccess
            ? 'Flavor v1.1.0 database schema is ready.'
            : 'Some errors occurred during installation. See details below.'; ?>
    </p>

    <?php if (!empty($errors)): ?>
    <div class="error-box">
        <strong>Errors:</strong><br>
        <?php echo implode('<br>', array_map('htmlspecialchars', $errors)); ?>
    </div>
    <?php endif; ?>

    <ul class="steps">
        <?php foreach ($steps as $step): ?>
        <li>
            <div class="step-icon <?php echo $step['ok'] ? 'ok' : 'fail'; ?>">
                <?php echo $step['ok'] ? '✓' : '✗'; ?>
            </div>
            <div class="step-msg"><?php echo $step['msg']; ?></div>
        </li>
        <?php endforeach; ?>
    </ul>

    <div class="btn-group">
        <?php if ($installSuccess): ?>
        <a href="setup.php" class="btn btn-primary">⚙️ Go to Setup</a>
        <a href="<?php echo DOL_URL_ROOT; ?>/index.php" class="btn btn-outline">← Dashboard</a>
        <?php else: ?>
        <a href="install.php" class="btn btn-primary">🔄 Retry Installation</a>
        <?php endif; ?>
    </div>

    <div class="footer">
        Flavor Theme v1.1.0 • <a href="https://novadx.pt" target="_blank">NovaDX</a>
    </div>
</div>

</body>
</html>
