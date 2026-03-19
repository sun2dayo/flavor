<?php
/**
 * Flavor Theme - Setup & Configuration Panel
 * Copyright (C) 2025-2026  Octavio Daio  <ola@novadx.pt>  https://novadx.pt
 * 
 * Features:
 * - ALLOW_THEME_JS: Loads flavor.js for Dolibarr→Dolisys text replacement
 * - Menu Manager: Hide/show sidebar menu items via generated CSS
 * - Security Lock: flavor.lock blocks access to this page
 * 
 * Usage: Visit http://your-dolibarr/theme/flavor/setup.php in your browser
 *        (you must be logged in as admin)
 */

// ──────────────────────────────────────────────────────────────────────────────
// PHASE 10.1 — Security Lock Check
// ──────────────────────────────────────────────────────────────────────────────
if (file_exists(__DIR__ . '/flavor.lock')) {
    die('<div style="font-family: \'Inter\', -apple-system, sans-serif; background: #F8FAFC; height: 100vh; display: flex; align-items: center; justify-content: center; margin: 0;">
            <div style="background: #FFF; padding: 48px; border-radius: 16px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.1); text-align: center; max-width: 420px;">
                <div style="width: 64px; height: 64px; background: linear-gradient(135deg, #FEE2E2, #FECACA); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px; font-size: 28px;">🔒</div>
                <h2 style="color: #1E293B; margin-top: 0; font-size: 1.25rem;">Setup Locked</h2>
                <p style="color: #64748B; line-height: 1.6; margin-bottom: 0;">For security reasons, the configuration page is locked.</p>
            </div>
         </div>');
}

// ──────────────────────────────────────────────────────────────────────────────
// Dolibarr Bootstrap
// ──────────────────────────────────────────────────────────────────────────────
// CSRF: No longer disabling token check — forms now include newToken()
define('NOTOKENRENEWAL', 1);
define('NOREQUIREMENU', 1);
define('NOREQUIREHTML', 1);
define('NOREQUIREAJAX', 1);

require_once __DIR__.'/../../main.inc.php';
require_once DOL_DOCUMENT_ROOT.'/core/lib/admin.lib.php';

// Only admin can run this
if (empty($user->admin)) {
    accessforbidden('Admin access required');
}

// ──────────────────────────────────────────────────────────────────────────────
// Menu definitions — all manageable sidebar menus
// ──────────────────────────────────────────────────────────────────────────────
$availableMenus = array(
    'home'          => array('label' => 'Home / Dashboard',   'icon' => '🏠'),
    'companies'     => array('label' => 'Third Parties',      'icon' => '🏢'),
    'products'      => array('label' => 'Products/Services',  'icon' => '📦'),
    'commercial'    => array('label' => 'Commercial',         'icon' => '🤝'),
    'compta'        => array('label' => 'Billing / Payment',  'icon' => '💰'),
    'bank'          => array('label' => 'Banking',            'icon' => '🏦'),
    'accountancy'   => array('label' => 'Accountancy',        'icon' => '📊'),
    'project'       => array('label' => 'Projects',           'icon' => '📋'),
    'hrm'           => array('label' => 'HRM',                'icon' => '👥'),
    'ticket'        => array('label' => 'Tickets',            'icon' => '🎫'),
    'tools'         => array('label' => 'Tools',              'icon' => '🛠️'),
    'members'       => array('label' => 'Members',            'icon' => '👤'),
);

// ──────────────────────────────────────────────────────────────────────────────
// Admin Tools submenu — granular control over each item
// ──────────────────────────────────────────────────────────────────────────────
$adminToolsSubmenus = array(
    'admin_system_dolibarr'     => array('label' => 'About Dolisys',         'icon' => 'ℹ️',  'css' => '.menu_contenu_admin_system_dolibarr'),
    'admin_system_browser'      => array('label' => 'About Browser',         'icon' => '🌐', 'css' => '.menu_contenu_admin_system_browser'),
    'admin_system_os'           => array('label' => 'About OS',              'icon' => '💻', 'css' => '.menu_contenu_admin_system_os'),
    'admin_system_web'          => array('label' => 'About Web Server',      'icon' => '🖥️',  'css' => '.menu_contenu_admin_system_web'),
    'admin_system_phpinfo'      => array('label' => 'About PHP',             'icon' => '🐘', 'css' => '.menu_contenu_admin_system_phpinfo'),
    'admin_system_database'     => array('label' => 'About Database',        'icon' => '🗄️',  'css' => '.menu_contenu_admin_system_database'),
    'admin_system_perf'         => array('label' => 'About Performances',    'icon' => '⚡', 'css' => '.menu_contenu_admin_system_perf'),
    'admin_system_security'     => array('label' => 'About Security',        'icon' => '🛡️',  'css' => '.menu_contenu_admin_system_security'),
    'admin_tools_listevents'    => array('label' => 'Security Events',       'icon' => '📜', 'css' => '.menu_contenu_admin_tools_listevents'),
    'admin_tools_listsessions'  => array('label' => 'Users Sessions',        'icon' => '👥', 'css' => '.menu_contenu_admin_tools_listsessions'),
    'admin_tools_dolibarr_export' => array('label' => 'Backup',              'icon' => '💾', 'css' => '.menu_contenu_admin_tools_dolibarr_export'),
    'admin_tools_dolibarr_import' => array('label' => 'Restore',             'icon' => '📥', 'css' => '.menu_contenu_admin_tools_dolibarr_import'),
    'admin_tools_update'        => array('label' => 'Upgrade / Extend',      'icon' => '🔄', 'css' => '.menu_contenu_admin_tools_update'),
    'admin_tools_purge'         => array('label' => 'Purge',                 'icon' => '🗑️',  'css' => '.menu_contenu_admin_tools_purge'),
    'product_admin_product_tools' => array('label' => 'Global VAT Update',   'icon' => '💱', 'css' => '.menu_contenu_product_admin_product_tools'),
    'barcode_codeinit'          => array('label' => 'Mass Barcode Init',     'icon' => '📊', 'css' => '.menu_contenu_barcode_codeinit'),
    'printing_index'            => array('label' => 'One Click Printing Jobs','icon' => '🖨️',  'css' => '.menu_contenu_printing_index'),
    'admin_emailcollector_list' => array('label' => 'Email Collectors',      'icon' => '📧', 'css' => '.menu_contenu_admin_emailcollector_list'),
    'cron_list'                 => array('label' => 'Scheduled Jobs',        'icon' => '⏰', 'css' => '.menu_contenu_cron_list'),
);

// ──────────────────────────────────────────────────────────────────────────────
// Module setup tabs — hide specific tabs from Modules/Application setup page
// ──────────────────────────────────────────────────────────────────────────────
$moduleTabs = array(
    'marketplace' => array('label' => 'Find external applications and modules', 'icon' => '🔍', 'css' => 'a[href*="mode=marketplace"]'),
    'deploy'      => array('label' => 'Deploy/install external app/module',     'icon' => '📤', 'css' => 'a[href*="mode=deploy"]'),
    'develop'     => array('label' => 'Develop your own app/modules',           'icon' => '🧑‍💻', 'css' => 'a[href*="mode=develop"]'),
);

// ──────────────────────────────────────────────────────────────────────────────
// Actions
// ──────────────────────────────────────────────────────────────────────────────
$action = GETPOST('action', 'aZ');
$message = '';

// Action: Activate white-labeling JS
if ($action === 'activate') {
    $res1 = dolibarr_set_const($db, 'ALLOW_THEME_JS', '1', 'chaine', 0, 'Allow theme-level JS files (required for Flavor white-labeling)', 0);
    if ($res1 > 0) {
        $message = '<div class="alert alert-success">✅ <strong>White-labeling activated!</strong> ALLOW_THEME_JS has been enabled. Dolibarr→Dolisys text replacement is now active.</div>';
    } else {
        $message = '<div class="alert alert-error">❌ <strong>Error:</strong> Could not save configuration. Check database permissions.</div>';
    }
}

// Action: Save Preferences (topbar title + primary color)
if ($action === 'saveprefs') {
    $topbarTitle  = GETPOST('topbar_title', 'alphanohtml');
    $primaryColor = GETPOST('primary_color', 'alphanohtml');
    $r1 = dolibarr_set_const($db, 'FLAVOR_TOPBAR_TITLE', $topbarTitle, 'chaine', 0, 'Flavor theme — topbar title', 0);
    $r2 = dolibarr_set_const($db, 'FLAVOR_PRIMARY_COLOR', $primaryColor, 'chaine', 0, 'Flavor theme — primary color override', 0);
    if ($r1 > 0 && $r2 > 0) {
        $message = '<div class="alert alert-success">✅ <strong>Preferences saved!</strong> Topbar title and color updated. Reload the app (Ctrl+Shift+R) to see changes.</div>';
    } else {
        $message = '<div class="alert alert-error">❌ <strong>Error:</strong> Could not save preferences.</div>';
    }
}

// Action: Save Icon Manager
if ($action === 'saveicons') {
    $iconKeys = GETPOST('icon_keys', 'array');
    $errCount = 0;
    if (is_array($iconKeys)) {
        foreach ($iconKeys as $key) {
            $key = $db->escape($key);
            $faIcon      = $db->escape(GETPOST('fa_'.$key, 'alphanohtml'));
            $customLabel = $db->escape(GETPOST('label_'.$key, 'alphanohtml'));
            $isHidden    = GETPOST('hidden_'.$key, 'int') ? 1 : 0;
            $sql = "UPDATE ".MAIN_DB_PREFIX."flavor_config SET fa_icon='".$faIcon."', custom_label='".$customLabel."', is_hidden=".$isHidden." WHERE menu_key='".$key."' AND entity=1";
            if (!$db->query($sql)) { $errCount++; }
        }
    }
    if ($errCount === 0) {
        $message = '<div class="alert alert-success">✅ <strong>Icons saved!</strong> FontAwesome mappings updated. Reload the app (Ctrl+Shift+R) to see changes.</div>';
    } else {
        $message = '<div class="alert alert-error">❌ <strong>Error:</strong> '.$errCount.' icon(s) could not be saved.</div>';
    }
}

// Action: Save ALL visibility settings (menus + admin tools + module tabs)
if ($action === 'savemenus' || $action === 'saveadmintools' || $action === 'savemoduletabs' || $action === 'saveall') {
    // Read existing CSS sections we are NOT updating to preserve them
    $cssFile = __DIR__ . '/flavor_hidden.css';
    $existingContent = file_exists($cssFile) ? file_get_contents($cssFile) : '';

    // ── Parse existing sections ──
    $sections = array('menus' => '', 'admintools' => '', 'moduletabs' => '');
    if (preg_match('/\/\* SECTION: MENUS \*\/(.*?)\/\* END: MENUS \*\//s', $existingContent, $m)) $sections['menus'] = $m[1];
    if (preg_match('/\/\* SECTION: ADMINTOOLS \*\/(.*?)\/\* END: ADMINTOOLS \*\//s', $existingContent, $m)) $sections['admintools'] = $m[1];
    if (preg_match('/\/\* SECTION: MODULETABS \*\/(.*?)\/\* END: MODULETABS \*\//s', $existingContent, $m)) $sections['moduletabs'] = $m[1];

    // ── Update the section being saved ──
    if ($action === 'savemenus' || $action === 'saveall') {
        $sections['menus'] = "\n";
        foreach ($availableMenus as $key => $menu) {
            if (GETPOST('hide_'.$key, 'alpha')) {
                $sections['menus'] .= "/* Hide: {$menu['label']} */\n";
                $sections['menus'] .= "#mainmenutd_{$key}, .menu_contenu[id*=\"{$key}\"], div.vmenu div[id*=\"{$key}\"], li.tmenu[data-mainmenu=\"{$key}\"], div.mainmenu.{$key} { display: none !important; }\n\n";
            }
        }
    }

    if ($action === 'saveadmintools' || $action === 'saveall') {
        $sections['admintools'] = "\n";
        foreach ($adminToolsSubmenus as $key => $item) {
            if (GETPOST('hide_at_'.$key, 'alpha')) {
                $sections['admintools'] .= "/* Hide: {$item['label']} */\n";
                $sections['admintools'] .= "{$item['css']} { display: none !important; }\n\n";
            }
        }
    }

    if ($action === 'savemoduletabs' || $action === 'saveall') {
        $sections['moduletabs'] = "\n";
        foreach ($moduleTabs as $key => $tab) {
            if (GETPOST('hide_mt_'.$key, 'alpha')) {
                $sections['moduletabs'] .= "/* Hide tab: {$tab['label']} */\n";
                $sections['moduletabs'] .= "{$tab['css']} { display: none !important; }\n\n";
            }
        }
    }

    // ── Rebuild the full CSS file ──
    $cssContent  = "/* ============================================================================== */\n";
    $cssContent .= "/* Auto-generated by Flavor Setup — Visibility Manager                          */\n";
    $cssContent .= "/* Generated: ".date('Y-m-d H:i:s')."                                            */\n";
    $cssContent .= "/* DO NOT EDIT MANUALLY — changes will be overwritten by setup.php              */\n";
    $cssContent .= "/* ============================================================================== */\n\n";
    $cssContent .= "/* SECTION: MENUS */".$sections['menus']."/* END: MENUS */\n\n";
    $cssContent .= "/* SECTION: ADMINTOOLS */".$sections['admintools']."/* END: ADMINTOOLS */\n\n";
    $cssContent .= "/* SECTION: MODULETABS */".$sections['moduletabs']."/* END: MODULETABS */\n";

    if (file_put_contents($cssFile, $cssContent) !== false) {
        $message = '<div class="alert alert-success">✅ <strong>Visibility settings saved!</strong> Changes are active immediately.</div>';
    } else {
        $message = '<div class="alert alert-error">❌ <strong>Error:</strong> Could not write flavor_hidden.css. Check file permissions.</div>';
    }
}

// Action: Lock setup page
if ($action === 'lock') {
    if (file_put_contents(__DIR__ . '/flavor.lock', 'Locked on '.date('Y-m-d H:i:s').' by '.$user->login) !== false) {
        $message = '<div class="alert alert-success">🔒 <strong>Setup locked!</strong> This page will be inaccessible until you delete the <code>flavor.lock</code> file.</div>';
    } else {
        $message = '<div class="alert alert-error">❌ <strong>Error:</strong> Could not create lock file. Check file permissions.</div>';
    }
}

// ──────────────────────────────────────────────────────────────────────────────
// Read current state
// ──────────────────────────────────────────────────────────────────────────────
$jsEnabled = getDolGlobalString('ALLOW_THEME_JS');
$topbarTitle  = getDolGlobalString('FLAVOR_TOPBAR_TITLE');
$primaryColor = getDolGlobalString('FLAVOR_PRIMARY_COLOR');
if (empty($primaryColor)) $primaryColor = '#6366F1';

// ── Read icon configuration from llx_flavor_config ──
$iconConfig = array();
$sql_icons = "SELECT menu_key, fa_icon, custom_label, is_hidden, sort_order FROM ".MAIN_DB_PREFIX."flavor_config WHERE entity=1 ORDER BY sort_order ASC";
$resql = $db->query($sql_icons);
if ($resql) {
    while ($obj = $db->fetch_object($resql)) {
        $iconConfig[$obj->menu_key] = array(
            'fa_icon'      => $obj->fa_icon,
            'custom_label' => $obj->custom_label,
            'is_hidden'    => (int) $obj->is_hidden,
            'sort_order'   => (int) $obj->sort_order,
        );
    }
}

// ── Auto-detect non-native modules from llx_menu ──
$sql_menus = "SELECT DISTINCT mainmenu FROM ".MAIN_DB_PREFIX."menu WHERE mainmenu != '' AND entity IN (0,1) ORDER BY mainmenu";
$resql = $db->query($sql_menus);
if ($resql) {
    $maxSort = count($iconConfig) * 10 + 10;
    while ($obj = $db->fetch_object($resql)) {
        $mk = $obj->mainmenu;
        if (!isset($iconConfig[$mk])) {
            // Insert new discovered module into flavor_config
            $safeMk = $db->escape($mk);
            $db->query("INSERT INTO ".MAIN_DB_PREFIX."flavor_config (menu_key, fa_icon, custom_label, sort_order, entity) VALUES ('".$safeMk."', 'fas fa-puzzle-piece', '".$safeMk."', ".$maxSort.", 1)");
            $iconConfig[$mk] = array('fa_icon' => 'fas fa-puzzle-piece', 'custom_label' => $mk, 'is_hidden' => 0, 'sort_order' => $maxSort);
            $maxSort += 10;
        }
    }
}

// Read currently hidden items from flavor_hidden.css
$currentlyHidden = array();
$currentlyHiddenAT = array();
$currentlyHiddenMT = array();
$cssFile = __DIR__ . '/flavor_hidden.css';
if (file_exists($cssFile)) {
    $content = file_get_contents($cssFile);
    // Main menus
    foreach ($availableMenus as $key => $menu) {
        if (strpos($content, '#mainmenutd_'.$key) !== false) {
            $currentlyHidden[$key] = true;
        }
    }
    // Admin Tools submenu
    foreach ($adminToolsSubmenus as $key => $item) {
        if (strpos($content, $item['css']) !== false) {
            $currentlyHiddenAT[$key] = true;
        }
    }
    // Module tabs
    foreach ($moduleTabs as $key => $tab) {
        if (strpos($content, $tab['css']) !== false) {
            $currentlyHiddenMT[$key] = true;
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Flavor Theme Setup — Dolisys</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Inter', -apple-system, sans-serif; background: #F1F5F9; color: #1E293B; min-height: 100vh; }

    /* Top bar */
    .topbar { background: #FFFFFF; border-bottom: 1px solid #E2E8F0; padding: 16px 32px; display: flex; align-items: center; gap: 12px; }
    .topbar-logo { width: 32px; height: 32px; background: linear-gradient(135deg, #6366F1, #8B5CF6); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #FFF; font-weight: 700; font-size: 14px; }
    .topbar h1 { font-size: 1.1rem; font-weight: 700; }
    .topbar .version { color: #94A3B8; font-size: 0.75rem; margin-left: 8px; background: #F1F5F9; padding: 2px 8px; border-radius: 4px; }

    /* Layout */
    .container { max-width: 760px; margin: 32px auto; padding: 0 24px; }

    /* Cards */
    .card { background: #FFFFFF; border-radius: 16px; padding: 32px; box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04); border: 1px solid #F1F5F9; margin-bottom: 24px; }
    .card-header { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; padding-bottom: 16px; border-bottom: 1px solid #F1F5F9; }
    .card-icon { width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px; }
    .card-icon.indigo { background: linear-gradient(135deg, #EEF2FF, #E0E7FF); }
    .card-icon.amber { background: linear-gradient(135deg, #FFFBEB, #FEF3C7); }
    .card-icon.red { background: linear-gradient(135deg, #FEF2F2, #FEE2E2); }
    .card-title { font-size: 1.05rem; font-weight: 700; }
    .card-subtitle { font-size: 0.8rem; color: #94A3B8; margin-top: 2px; }

    /* Alerts */
    .alert { padding: 14px 18px; border-radius: 10px; margin-bottom: 20px; font-size: 0.9rem; line-height: 1.5; }
    .alert-success { background: #ECFDF5; color: #065F46; border: 1px solid #A7F3D0; }
    .alert-error { background: #FEF2F2; color: #991B1B; border: 1px solid #FECACA; }
    .alert code { background: rgba(0,0,0,0.06); padding: 1px 5px; border-radius: 3px; font-size: 0.85em; }

    /* Status list */
    .checklist { list-style: none; padding: 0; }
    .checklist li { padding: 10px 0; border-bottom: 1px solid #F8FAFC; display: flex; align-items: center; gap: 10px; font-size: 0.9rem; }
    .checklist li:last-child { border-bottom: none; }
    .check-icon { width: 22px; height: 22px; border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; flex-shrink: 0; }
    .check-icon.ok { background: #ECFDF5; color: #059669; }
    .check-icon.pending { background: #FEF3C7; color: #D97706; }

    /* Buttons */
    .btn { display: inline-flex; align-items: center; gap: 6px; padding: 10px 24px; border-radius: 10px; font-size: 0.9rem; font-weight: 600; cursor: pointer; border: none; text-decoration: none; transition: all 0.2s; font-family: inherit; }
    .btn-primary { background: linear-gradient(135deg, #6366F1, #818CF8); color: #FFF; box-shadow: 0 4px 12px rgba(99,102,241,0.25); }
    .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 6px 16px rgba(99,102,241,0.35); }
    .btn-success { background: linear-gradient(135deg, #059669, #10B981); color: #FFF; box-shadow: 0 4px 12px rgba(16,185,129,0.25); }
    .btn-success:hover { transform: translateY(-1px); box-shadow: 0 6px 16px rgba(16,185,129,0.35); }
    .btn-danger { background: linear-gradient(135deg, #DC2626, #EF4444); color: #FFF; box-shadow: 0 4px 12px rgba(239,68,68,0.25); }
    .btn-danger:hover { transform: translateY(-1px); box-shadow: 0 6px 16px rgba(239,68,68,0.35); }
    .btn-outline { background: #FFF; color: #475569; border: 1px solid #E2E8F0; box-shadow: none; }
    .btn-outline:hover { background: #F8FAFC; border-color: #CBD5E1; }
    .btn-group { display: flex; gap: 10px; margin-top: 20px; flex-wrap: wrap; }

    /* Menu grid */
    .menu-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(210px, 1fr)); gap: 10px; }
    .menu-item { display: flex; align-items: center; gap: 10px; padding: 12px 14px; border-radius: 10px; border: 1px solid #E2E8F0; background: #FAFBFC; transition: all 0.15s; cursor: pointer; }
    .menu-item:hover { border-color: #CBD5E1; background: #F8FAFC; }
    .menu-item.checked { border-color: #FCA5A5; background: #FEF2F2; }
    .menu-item input[type="checkbox"] { -webkit-appearance: none; appearance: none; width: 18px; height: 18px; border: 2px solid #CBD5E1; border-radius: 5px; cursor: pointer; flex-shrink: 0; position: relative; transition: all 0.15s; }
    .menu-item input[type="checkbox"]:checked { background: #EF4444; border-color: #EF4444; }
    .menu-item input[type="checkbox"]:checked::after { content: '✕'; position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); color: #FFF; font-size: 11px; font-weight: 700; }
    .menu-item-icon { font-size: 16px; }
    .menu-item-label { font-size: 0.85rem; font-weight: 500; }

    /* Section divider */
    .section-label { font-size: 0.75rem; font-weight: 600; color: #94A3B8; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px; margin-top: 16px; }
    .section-label:first-child { margin-top: 0; }
    .card-icon.teal { background: linear-gradient(135deg, #F0FDFA, #CCFBF1); }
    .card-icon.purple { background: linear-gradient(135deg, #F5F3FF, #EDE9FE); }

    /* Footer */
    .footer { text-align: center; padding: 24px; color: #94A3B8; font-size: 0.8rem; }
    .footer a { color: #6366F1; text-decoration: none; }

    /* Preferences */
    .pref-row { display: flex; align-items: center; gap: 16px; margin-bottom: 16px; }
    .pref-label { font-size: 0.85rem; font-weight: 600; color: #334155; min-width: 140px; }
    .pref-input { flex: 1; padding: 10px 14px; border: 1px solid #E2E8F0; border-radius: 8px; font-size: 0.9rem; font-family: inherit; color: #1E293B; transition: border-color 0.2s; outline: none; }
    .pref-input:focus { border-color: #6366F1; box-shadow: 0 0 0 3px rgba(99,102,241,0.1); }
    input[type=color].pref-color { width: 48px; height: 40px; border: 2px solid #E2E8F0; border-radius: 8px; cursor: pointer; padding: 2px; background: #FFF; }
    input[type=color].pref-color:hover { border-color: #6366F1; }
    .color-preview { font-size: 0.8rem; color: #64748B; font-family: monospace; }

    /* Icon Manager */
    .icon-table { width: 100%; border-collapse: separate; border-spacing: 0; }
    .icon-table th { background: #F8FAFC; padding: 10px 12px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; color: #64748B; letter-spacing: 0.04em; text-align: left; border-bottom: 2px solid #E2E8F0; }
    .icon-table td { padding: 10px 12px; border-bottom: 1px solid #F1F5F9; vertical-align: middle; }
    .icon-table tr:hover td { background: #FAFBFC; }
    .icon-table .menu-key { font-weight: 600; color: #334155; font-size: 0.85rem; }
    .icon-table .fa-preview { width: 32px; height: 32px; background: #312C81; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.9); font-size: 14px; }
    .icon-table input[type=text] { padding: 7px 10px; border: 1px solid #E2E8F0; border-radius: 6px; font-size: 0.85rem; font-family: inherit; width: 100%; outline: none; transition: border-color 0.2s; }
    .icon-table input[type=text]:focus { border-color: #6366F1; box-shadow: 0 0 0 2px rgba(99,102,241,0.08); }
    .icon-table .toggle-switch { position: relative; width: 40px; height: 22px; }
    .icon-table .toggle-switch input { opacity: 0; width: 0; height: 0; }
    .icon-table .toggle-slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background: #CBD5E1; border-radius: 22px; transition: 0.2s; }
    .icon-table .toggle-slider::before { content: ''; position: absolute; width: 16px; height: 16px; left: 3px; top: 3px; background: #FFF; border-radius: 50%; transition: 0.2s; }
    .icon-table .toggle-switch input:checked + .toggle-slider { background: #EF4444; }
    .icon-table .toggle-switch input:checked + .toggle-slider::before { transform: translateX(18px); }
    .native-badge { font-size: 0.65rem; background: #DCFCE7; color: #166534; padding: 1px 6px; border-radius: 4px; font-weight: 600; margin-left: 6px; }
    .extra-badge { font-size: 0.65rem; background: #E0E7FF; color: #3730A3; padding: 1px 6px; border-radius: 4px; font-weight: 600; margin-left: 6px; }
</style>
</head>
<body>

<!-- Top Bar -->
<div class="topbar">
    <div class="topbar-logo">F</div>
    <h1>Flavor Setup</h1>
    <span class="version">v1.1</span>
</div>

<div class="container">
    <?php echo $message; ?>

    <!-- ────────────────────────────────────────────────────────────────────── -->
    <!-- CARD 0: Preferences -->
    <!-- ────────────────────────────────────────────────────────────────────── -->
    <div class="card">
        <div class="card-header">
            <div class="card-icon indigo">⚙️</div>
            <div>
                <div class="card-title">Preferences</div>
                <div class="card-subtitle">Topbar title and theme color configuration</div>
            </div>
        </div>

        <form method="POST" action="?action=saveprefs">
            <input type="hidden" name="token" value="<?php echo newToken(); ?>">

            <div class="pref-row">
                <span class="pref-label">Topbar Title</span>
                <input type="text" name="topbar_title" class="pref-input" value="<?php echo htmlspecialchars($topbarTitle); ?>" placeholder="e.g. Dolisys, Your Company...">
            </div>

            <div class="pref-row">
                <span class="pref-label">Primary Color</span>
                <input type="color" name="primary_color" class="pref-color" value="<?php echo htmlspecialchars($primaryColor); ?>" onchange="document.getElementById('color-hex').textContent = this.value">
                <span class="color-preview" id="color-hex"><?php echo htmlspecialchars($primaryColor); ?></span>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">💾 Save Preferences</button>
            </div>
        </form>
    </div>

    <!-- ────────────────────────────────────────────────────────────────────── -->
    <!-- CARD 0.5: Icon Manager -->
    <!-- ────────────────────────────────────────────────────────────────────── -->
    <div class="card">
        <div class="card-header">
            <div class="card-icon purple">🎯</div>
            <div>
                <div class="card-title">Icon Manager</div>
                <div class="card-subtitle">Customize FontAwesome icons and labels for each sidebar menu</div>
            </div>
        </div>

        <form method="POST" action="?action=saveicons">
            <input type="hidden" name="token" value="<?php echo newToken(); ?>">
            <table class="icon-table">
                <thead>
                    <tr>
                        <th style="width:36px">Preview</th>
                        <th>Menu</th>
                        <th>FA Icon Class</th>
                        <th>Custom Label</th>
                        <th style="width:60px">Hide</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nativeKeys = array('home','companies','products','commercial','compta','accountancy','bank','project','hrm','ticket','tools','members');
                    foreach ($iconConfig as $key => $cfg):
                        $isNative = in_array($key, $nativeKeys);
                    ?>
                    <tr>
                        <td>
                            <div class="fa-preview" id="preview_<?php echo $key; ?>">
                                <i class="<?php echo htmlspecialchars($cfg['fa_icon']); ?>"></i>
                            </div>
                        </td>
                        <td>
                            <span class="menu-key"><?php echo htmlspecialchars($key); ?></span>
                            <?php if ($isNative): ?><span class="native-badge">native</span><?php else: ?><span class="extra-badge">module</span><?php endif; ?>
                        </td>
                        <td>
                            <input type="hidden" name="icon_keys[]" value="<?php echo htmlspecialchars($key); ?>">
                            <input type="text" name="fa_<?php echo $key; ?>" value="<?php echo htmlspecialchars($cfg['fa_icon']); ?>" placeholder="fas fa-icon" oninput="document.querySelector('#preview_<?php echo $key; ?> i').className = this.value">
                        </td>
                        <td>
                            <input type="text" name="label_<?php echo $key; ?>" value="<?php echo htmlspecialchars($cfg['custom_label']); ?>" placeholder="Label">
                        </td>
                        <td>
                            <label class="toggle-switch">
                                <input type="checkbox" name="hidden_<?php echo $key; ?>" value="1" <?php echo $cfg['is_hidden'] ? 'checked' : ''; ?>>
                                <span class="toggle-slider"></span>
                            </label>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="btn-group" style="margin-top: 16px;">
                <button type="submit" class="btn btn-primary">💾 Save Icons</button>
            </div>
        </form>
    </div>

    <!-- ────────────────────────────────────────────────────────────────────── -->
    <!-- CARD 1: White-labeling Status -->
    <!-- ────────────────────────────────────────────────────────────────────── -->
    <div class="card">
        <div class="card-header">
            <div class="card-icon indigo">🎨</div>
            <div>
                <div class="card-title">Theme Status</div>
                <div class="card-subtitle">White-labeling & branding configuration</div>
            </div>
        </div>

        <ul class="checklist">
            <li><span class="check-icon ok">✓</span> Theme files deployed</li>
            <li><span class="check-icon ok">✓</span> Logo files in theme/flavor/img/</li>
            <li><span class="check-icon ok">✓</span> CSS white-labeling active</li>
            <li>
                <span class="check-icon <?php echo $jsEnabled ? 'ok' : 'pending'; ?>"><?php echo $jsEnabled ? '✓' : '○'; ?></span>
                JS text replacement (Dolibarr → Dolisys):
                <strong><?php echo $jsEnabled ? 'Active' : 'Pending'; ?></strong>
            </li>
        </ul>

        <?php if (!$jsEnabled): ?>
        <div class="btn-group">
            <a href="?action=activate&token=<?php echo newToken(); ?>" class="btn btn-primary">🚀 Activate White-labeling</a>
        </div>
        <?php else: ?>
        <div class="btn-group">
            <a href="<?php echo DOL_URL_ROOT; ?>/index.php" class="btn btn-outline">← Back to Dashboard</a>
        </div>
        <?php endif; ?>
    </div>

    <!-- ────────────────────────────────────────────────────────────────────── -->
    <!-- CARD 2: Menu Manager -->
    <!-- ────────────────────────────────────────────────────────────────────── -->
    <div class="card">
        <div class="card-header">
            <div class="card-icon amber">📋</div>
            <div>
                <div class="card-title">Menu Manager</div>
                <div class="card-subtitle">Select menus to hide from the sidebar navigation</div>
            </div>
        </div>

        <form method="POST" action="?action=savemenus">
            <input type="hidden" name="token" value="<?php echo newToken(); ?>">
            <div class="menu-grid">
                <?php foreach ($availableMenus as $key => $menu):
                    $isChecked = !empty($currentlyHidden[$key]);
                ?>
                <label class="menu-item <?php echo $isChecked ? 'checked' : ''; ?>" onclick="this.classList.toggle('checked')">
                    <input type="checkbox" name="hide_<?php echo $key; ?>" value="1" <?php echo $isChecked ? 'checked' : ''; ?>>
                    <span class="menu-item-icon"><?php echo $menu['icon']; ?></span>
                    <span class="menu-item-label"><?php echo htmlspecialchars($menu['label']); ?></span>
                </label>
                <?php endforeach; ?>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-success">💾 Save Menu Visibility</button>
                <?php if (file_exists($cssFile)): ?>
                <span style="color: #94A3B8; font-size: 0.8rem; align-self: center;">
                    Last saved: <?php echo date('d/m/Y H:i', filemtime($cssFile)); ?>
                </span>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!-- ────────────────────────────────────────────────────────────────────── -->
    <!-- CARD 3: Admin Tools Submenu Manager -->
    <!-- ────────────────────────────────────────────────────────────────────── -->
    <div class="card">
        <div class="card-header">
            <div class="card-icon teal">🛠️</div>
            <div>
                <div class="card-title">Admin Tools — Submenu Control</div>
                <div class="card-subtitle">Granular control over each Admin Tools sidebar item</div>
            </div>
        </div>

        <form method="POST" action="?action=saveadmintools">
            <input type="hidden" name="token" value="<?php echo newToken(); ?>">
            <div class="section-label">System Information</div>
            <div class="menu-grid">
                <?php foreach ($adminToolsSubmenus as $key => $item):
                    $isChecked = !empty($currentlyHiddenAT[$key]);
                    // Group label
                    if ($key === 'admin_tools_listevents') echo '</div><div class="section-label">Security & Sessions</div><div class="menu-grid">';
                    if ($key === 'admin_tools_dolibarr_export') echo '</div><div class="section-label">Maintenance</div><div class="menu-grid">';
                    if ($key === 'product_admin_product_tools') echo '</div><div class="section-label">Utilities</div><div class="menu-grid">';
                ?>
                <label class="menu-item <?php echo $isChecked ? 'checked' : ''; ?>" onclick="this.classList.toggle('checked')">
                    <input type="checkbox" name="hide_at_<?php echo $key; ?>" value="1" <?php echo $isChecked ? 'checked' : ''; ?>>
                    <span class="menu-item-icon"><?php echo $item['icon']; ?></span>
                    <span class="menu-item-label"><?php echo htmlspecialchars($item['label']); ?></span>
                </label>
                <?php endforeach; ?>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-success">💾 Save Admin Tools Visibility</button>
            </div>
        </form>
    </div>

    <!-- ────────────────────────────────────────────────────────────────────── -->
    <!-- CARD 4: Module Setup Tabs Manager -->
    <!-- ────────────────────────────────────────────────────────────────────── -->
    <div class="card">
        <div class="card-header">
            <div class="card-icon purple">🧩</div>
            <div>
                <div class="card-title">Module Setup Tabs</div>
                <div class="card-subtitle">Hide tabs from the Modules/Application setup page</div>
            </div>
        </div>

        <form method="POST" action="?action=savemoduletabs">
            <input type="hidden" name="token" value="<?php echo newToken(); ?>">
            <div class="menu-grid">
                <?php foreach ($moduleTabs as $key => $tab):
                    $isChecked = !empty($currentlyHiddenMT[$key]);
                ?>
                <label class="menu-item <?php echo $isChecked ? 'checked' : ''; ?>" onclick="this.classList.toggle('checked')">
                    <input type="checkbox" name="hide_mt_<?php echo $key; ?>" value="1" <?php echo $isChecked ? 'checked' : ''; ?>>
                    <span class="menu-item-icon"><?php echo $tab['icon']; ?></span>
                    <span class="menu-item-label"><?php echo htmlspecialchars($tab['label']); ?></span>
                </label>
                <?php endforeach; ?>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-success">💾 Save Tab Visibility</button>
            </div>
        </form>
    </div>

    <!-- ────────────────────────────────────────────────────────────────────── -->
    <!-- CARD 5: Security Lock -->
    <!-- ────────────────────────────────────────────────────────────────────── -->
    <div class="card">
        <div class="card-header">
            <div class="card-icon red">🔐</div>
            <div>
                <div class="card-title">Security Lock</div>
                <div class="card-subtitle">Lock this setup page after configuration is complete</div>
            </div>
        </div>

        <p style="color: #64748B; font-size: 0.9rem; line-height: 1.6; margin-bottom: 16px;">
            Once you've finished configuring, lock this page to prevent unauthorized changes.
            To unlock later, delete the <code style="background: #F1F5F9; padding: 2px 6px; border-radius: 4px; font-size: 0.85em;">flavor.lock</code> file from the <code style="background: #F1F5F9; padding: 2px 6px; border-radius: 4px; font-size: 0.85em;">theme/flavor/</code> directory.
        </p>

        <a href="?action=lock&token=<?php echo newToken(); ?>" class="btn btn-danger" onclick="return confirm('Are you sure? This will lock the setup page. You will need file system access to unlock it.');">🔒 Lock Setup Page</a>
    </div>

    <div class="footer">
        Flavor Theme v1.1 for <a href="<?php echo DOL_URL_ROOT; ?>/index.php">Dolisys</a> • <a href="https://novadx.pt" target="_blank">NovaDX</a>
    </div>
</div>

</body>
</html>
