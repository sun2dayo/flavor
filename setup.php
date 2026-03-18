<?php
/**
 * Flavor Theme - One-time Setup Script
 * 
 * Run this once after deploying the Flavor theme to enable:
 * - ALLOW_THEME_JS: Loads flavor.js for Dolibarr→Dolisys text replacement
 * 
 * Usage: Visit http://your-dolibarr/theme/flavor/setup.php in your browser
 *        (you must be logged in as admin)
 */

// Dolibarr bootstrap
define('NOCSRFCHECK', 1);
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

$action = GETPOST('action', 'aZ');
$message = '';

if ($action === 'activate') {
	// Enable theme JS loading
	$res1 = dolibarr_set_const($db, 'ALLOW_THEME_JS', '1', 'chaine', 0, 'Allow theme-level JS files (required for Flavor white-labeling)', 0);
	
	if ($res1 > 0) {
		$message = '<div style="background:#10B981;color:#fff;padding:16px;border-radius:8px;margin:20px 0;font-size:1rem;">
			✅ <strong>Flavor theme activated successfully!</strong><br>
			ALLOW_THEME_JS has been enabled. The Dolibarr→Dolisys text replacement is now active.<br>
			<a href="'.DOL_URL_ROOT.'/index.php" style="color:#fff;text-decoration:underline;">Go to Dashboard →</a>
		</div>';
	} else {
		$message = '<div style="background:#EF4444;color:#fff;padding:16px;border-radius:8px;margin:20px 0;">
			❌ <strong>Error:</strong> Could not save configuration. Check database permissions.
		</div>';
	}
}

// Check current status
$jsEnabled = getDolGlobalString('ALLOW_THEME_JS');

?>
<!DOCTYPE html>
<html>
<head>
<title>Flavor Theme Setup - Dolisys</title>
<style>
	body { font-family: 'Inter', -apple-system, sans-serif; background: #F8FAFC; margin: 0; padding: 40px; color: #1E293B; }
	.container { max-width: 600px; margin: 0 auto; }
	.card { background: #fff; border-radius: 16px; padding: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
	h1 { font-size: 1.5rem; margin-bottom: 8px; }
	.subtitle { color: #64748B; margin-bottom: 32px; }
	.status { padding: 12px 16px; border-radius: 8px; margin-bottom: 24px; font-weight: 500; }
	.status.ok { background: #ECFDF5; color: #065F46; }
	.status.pending { background: #FEF3C7; color: #92400E; }
	.btn { display: inline-block; background: linear-gradient(135deg, #6366F1, #818CF8); color: #fff; border: none;
		   padding: 12px 32px; border-radius: 8px; font-size: 1rem; font-weight: 600; cursor: pointer;
		   text-decoration: none; transition: all 0.2s; }
	.btn:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(99,102,241,0.3); }
	.checklist { list-style: none; padding: 0; }
	.checklist li { padding: 8px 0; border-bottom: 1px solid #F1F5F9; }
	.checklist li::before { content: "✓"; color: #10B981; font-weight: bold; margin-right: 8px; }
	.checklist li.pending::before { content: "○"; color: #F59E0B; }
</style>
</head>
<body>
<div class="container">
	<div class="card">
		<h1>🎨 Flavor Theme Setup</h1>
		<p class="subtitle">One-time configuration for white-labeling</p>
		
		<?php echo $message; ?>
		
		<h3>Status</h3>
		<ul class="checklist">
			<li>Theme files deployed</li>
			<li>Logo files in theme/flavor/img/</li>
			<li>CSS white-labeling active</li>
			<li class="<?php echo $jsEnabled ? '' : 'pending'; ?>">
				JS text replacement (Dolibarr → Dolisys): 
				<strong><?php echo $jsEnabled ? 'Active' : 'Pending activation'; ?></strong>
			</li>
		</ul>
		
		<?php if (!$jsEnabled): ?>
		<p style="margin-top:24px;">Click below to enable the JavaScript white-labeling (replaces all "Dolibarr" text with "Dolisys"):</p>
		<a href="?action=activate" class="btn">🚀 Activate White-labeling</a>
		<?php else: ?>
		<p style="margin-top:24px;color:#10B981;font-weight:600;">All set! White-labeling is fully active.</p>
		<a href="<?php echo DOL_URL_ROOT; ?>/index.php" class="btn">Go to Dashboard →</a>
		<?php endif; ?>
	</div>
</div>
</body>
</html>
