<?php
/* Copyright (C) 2025       DoliSaaS Theme             <dolisaas@custom.dev>
 *
 * Theme Name:    Flavor
 * Theme URI:     https://github.com/dolisaas/flavor
 * Description:   A modern SaaS-style theme for Dolibarr ERP/CRM.
 * Version:       1.0.0
 * Author:        DoliSaaS
 * Compatibility: Dolibarr 22.0.4+
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 */

/**
 *		\file       htdocs/theme/flavor/style.css.php
 *		\brief      Main CSS entry point for the Flavor SaaS theme
 */

//if (! defined('NOREQUIREUSER')) define('NOREQUIREUSER','1');
//if (! defined('NOREQUIREDB'))   define('NOREQUIREDB','1');
if (!defined('NOREQUIRESOC')) {
	define('NOREQUIRESOC', '1');
}
//if (! defined('NOREQUIRETRAN')) define('NOREQUIRETRAN','1');
if (!defined('NOCSRFCHECK')) {
	define('NOCSRFCHECK', 1);
}
if (!defined('NOTOKENRENEWAL')) {
	define('NOTOKENRENEWAL', 1);
}
if (!defined('NOLOGIN')) {
	define('NOLOGIN', 1);
}
//if (!defined('NOREQUIREMENU'))   define('NOREQUIREMENU',1);
if (!defined('NOREQUIREHTML')) {
	define('NOREQUIREHTML', 1);
}
if (!defined('NOREQUIREAJAX')) {
	define('NOREQUIREAJAX', '1');
}

define('ISLOADEDBYSTEELSHEET', '1');

require __DIR__.'/theme_vars.inc.php';
if (defined('THEME_ONLY_CONSTANT')) {
	return;
}

session_cache_limiter('public');

// Suppress PHP warnings during CSS generation (they inject HTML into CSS output)
$_original_error_reporting = error_reporting(E_ERROR | E_PARSE);
@ini_set('display_errors', '0');

require_once __DIR__.'/../../main.inc.php';
require_once DOL_DOCUMENT_ROOT.'/core/lib/functions2.lib.php';

// Re-suppress after main.inc.php which may reset these values
error_reporting(E_ERROR | E_PARSE);
@ini_set('display_errors', '0');

// Load user to have $user->conf loaded
if (empty($user->id) && !empty($_SESSION['dol_login'])) {
	$user->fetch(0, $_SESSION['dol_login'], '', 1);
	$user->loadRights();
	$menumanager = new MenuManager($db, empty($user->socid) ? 0 : 1);
	$menumanager->loadMenu();
}

// Define css type
top_httphead('text/css');
// During theme development, always send no-cache to force browser reload
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

if (GETPOST('theme', 'aZ09')) {
	$conf->theme = GETPOST('theme', 'aZ09');
}
if (GETPOST('lang', 'aZ09')) {
	$langs->setDefaultLang(GETPOST('lang', 'aZ09'));
}
if (GETPOSTISSET('THEME_DARKMODEENABLED')) {
	$conf->global->THEME_DARKMODEENABLED = GETPOSTINT('THEME_DARKMODEENABLED');
}

$langs->load("main", 0, 1);
$right = ($langs->trans("DIRECTION") == 'rtl' ? 'left' : 'right');
$left = ($langs->trans("DIRECTION") == 'rtl' ? 'right' : 'left');

$path = '';
$theme = 'flavor';
if (getDolGlobalString('MAIN_OVERWRITE_THEME_RES')) {
	$path = '/' . getDolGlobalString('MAIN_OVERWRITE_THEME_RES');
	$theme = getDolGlobalString('MAIN_OVERWRITE_THEME_RES');
}

// Font
$fontlist = '"Inter", "Plus Jakarta Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
if (getDolGlobalString('THEME_FONT_FAMILY')) {
	$fontlist = getDolGlobalString('THEME_FONT_FAMILY').', '.$fontlist;
}

$img_head = '';
$img_button = dol_buildpath($path.'/theme/'.$theme.'/img/button_bg.png', 1);
$dol_hide_topmenu = $conf->dol_hide_topmenu;
$dol_hide_leftmenu = $conf->dol_hide_leftmenu;
$dol_optimize_smallscreen = $conf->dol_optimize_smallscreen;
$dol_no_mouse_hover = $conf->dol_no_mouse_hover;

$useboldtitle = getDolGlobalInt('THEME_ELDY_USEBOLDTITLE');
$userborderontable = getDolGlobalInt('THEME_ELDY_USEBORDERONTABLE');
$borderwidth = 1;

// Case of option always editable
if (!isset($conf->global->THEME_ELDY_BACKBODY)) {
	$conf->global->THEME_ELDY_BACKBODY = $colorbackbody;
}
if (!isset($conf->global->THEME_ELDY_TOPMENU_BACK1)) {
	$conf->global->THEME_ELDY_TOPMENU_BACK1 = $colorbackhmenu1;
}
if (!isset($conf->global->THEME_ELDY_VERMENU_BACK1)) {
	$conf->global->THEME_ELDY_VERMENU_BACK1 = $colorbackvmenu1;
}
if (!isset($conf->global->THEME_ELDY_BACKTITLE1)) {
	$conf->global->THEME_ELDY_BACKTITLE1 = $colorbacktitle1;
}
if (!isset($conf->global->THEME_ELDY_USE_HOVER)) {
	$conf->global->THEME_ELDY_USE_HOVER = $colorbacklinepairhover;
}
if (!isset($conf->global->THEME_ELDY_USE_CHECKED)) {
	$conf->global->THEME_ELDY_USE_CHECKED = $colorbacklinepairchecked;
}
if (!isset($conf->global->THEME_ELDY_LINEBREAK)) {
	$conf->global->THEME_ELDY_LINEBREAK = $colorbacklinebreak;
}
if (!isset($conf->global->THEME_ELDY_TEXTTITLENOTAB)) {
	$conf->global->THEME_ELDY_TEXTTITLENOTAB = $colortexttitlenotab;
}
if (!isset($conf->global->THEME_ELDY_TEXTLINK)) {
	$conf->global->THEME_ELDY_TEXTLINK = $colortextlink;
}
if (!isset($conf->global->THEME_ELDY_BTNACTION)) {
	$conf->global->THEME_ELDY_BTNACTION = $butactionbg;
}
if (!isset($conf->global->THEME_ELDY_TEXTBTNACTION)) {
	$conf->global->THEME_ELDY_TEXTBTNACTION = $textbutaction;
}
if (!getDolGlobalString('THEME_ELDY_ENABLE_PERSONALIZED')) {
	$conf->global->THEME_ELDY_BACKTABCARD1 = '255,255,255';
	$conf->global->THEME_ELDY_BACKTABACTIVE = '238,242,255';
	$conf->global->THEME_ELDY_TEXT = '30,41,59';
	$conf->global->THEME_ELDY_FONT_SIZE1 = $fontsize;
	$conf->global->THEME_ELDY_FONT_SIZE2 = '0.75em';
}

// Resolve final color values
$colorbackbody        = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_BACKBODY') ? $colorbackbody : $conf->global->THEME_ELDY_BACKBODY) : (empty($user->conf->THEME_ELDY_BACKBODY) ? $colorbackbody : $user->conf->THEME_ELDY_BACKBODY);
$colorbackhmenu1      = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_TOPMENU_BACK1') ? $colorbackhmenu1 : $conf->global->THEME_ELDY_TOPMENU_BACK1) : (empty($user->conf->THEME_ELDY_TOPMENU_BACK1) ? $colorbackhmenu1 : $user->conf->THEME_ELDY_TOPMENU_BACK1);
$colorbackvmenu1      = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_VERMENU_BACK1') ? $colorbackvmenu1 : $conf->global->THEME_ELDY_VERMENU_BACK1) : (empty($user->conf->THEME_ELDY_VERMENU_BACK1) ? $colorbackvmenu1 : $user->conf->THEME_ELDY_VERMENU_BACK1);
$colortopbordertitle1 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_TOPBORDER_TITLE1') ? $colortopbordertitle1 : $conf->global->THEME_ELDY_TOPBORDER_TITLE1) : (empty($user->conf->THEME_ELDY_TOPBORDER_TITLE1) ? $colortopbordertitle1 : $user->conf->THEME_ELDY_TOPBORDER_TITLE1);
$colorbacktitle1      = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_BACKTITLE1') ? $colorbacktitle1 : $conf->global->THEME_ELDY_BACKTITLE1) : (empty($user->conf->THEME_ELDY_BACKTITLE1) ? $colorbacktitle1 : $user->conf->THEME_ELDY_BACKTITLE1);
$colorbacktabcard1    = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_BACKTABCARD1') ? $colorbacktabcard1 : $conf->global->THEME_ELDY_BACKTABCARD1) : (empty($user->conf->THEME_ELDY_BACKTABCARD1) ? $colorbacktabcard1 : $user->conf->THEME_ELDY_BACKTABCARD1);
$colorbacktabactive   = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_BACKTABACTIVE') ? $colorbacktabactive : $conf->global->THEME_ELDY_BACKTABACTIVE) : (empty($user->conf->THEME_ELDY_BACKTABACTIVE) ? $colorbacktabactive : $user->conf->THEME_ELDY_BACKTABACTIVE);
$colorbacklineimpair1 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_LINEIMPAIR1') ? $colorbacklineimpair1 : $conf->global->THEME_ELDY_LINEIMPAIR1) : (empty($user->conf->THEME_ELDY_LINEIMPAIR1) ? $colorbacklineimpair1 : $user->conf->THEME_ELDY_LINEIMPAIR1);
$colorbacklineimpair2 = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_LINEIMPAIR2') ? $colorbacklineimpair2 : $conf->global->THEME_ELDY_LINEIMPAIR2) : (empty($user->conf->THEME_ELDY_LINEIMPAIR2) ? $colorbacklineimpair2 : $user->conf->THEME_ELDY_LINEIMPAIR2);
$colorbacklinepair1   = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_LINEPAIR1') ? $colorbacklinepair1 : $conf->global->THEME_ELDY_LINEPAIR1) : (empty($user->conf->THEME_ELDY_LINEPAIR1) ? $colorbacklinepair1 : $user->conf->THEME_ELDY_LINEPAIR1);
$colorbacklinepair2   = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_LINEPAIR2') ? $colorbacklinepair2 : $conf->global->THEME_ELDY_LINEPAIR2) : (empty($user->conf->THEME_ELDY_LINEPAIR2) ? $colorbacklinepair2 : $user->conf->THEME_ELDY_LINEPAIR2);
$colorbacklinebreak   = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_LINEBREAK') ? $colorbacklinebreak : $conf->global->THEME_ELDY_LINEBREAK) : (empty($user->conf->THEME_ELDY_LINEBREAK) ? $colorbacklinebreak : $user->conf->THEME_ELDY_LINEBREAK);
$colortexttitlenotab  = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_TEXTTITLENOTAB') ? $colortexttitlenotab : $conf->global->THEME_ELDY_TEXTTITLENOTAB) : (empty($user->conf->THEME_ELDY_TEXTTITLENOTAB) ? $colortexttitlenotab : $user->conf->THEME_ELDY_TEXTTITLENOTAB);
$colortexttitle       = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_TEXTTITLE') ? $colortexttitle : $conf->global->THEME_ELDY_TEXTTITLE) : (empty($user->conf->THEME_ELDY_TEXTTITLE) ? $colortexttitle : $user->conf->THEME_ELDY_TEXTTITLE);
$colortexttitlelink   = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_TEXTTITLELINK') ? $colortexttitlelink : $conf->global->THEME_ELDY_TEXTTITLELINK) : (empty($user->conf->THEME_ELDY_TEXTTITLELINK) ? $colortexttitlelink : $user->conf->THEME_ELDY_TEXTTITLELINK);
$colortext            = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_TEXT') ? $colortext : $conf->global->THEME_ELDY_TEXT) : (empty($user->conf->THEME_ELDY_TEXT) ? $colortext : $user->conf->THEME_ELDY_TEXT);
$colortextlink        = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_TEXTLINK') ? $colortextlink : $conf->global->THEME_ELDY_TEXTLINK) : (empty($user->conf->THEME_ELDY_TEXTLINK) ? $colortextlink : $user->conf->THEME_ELDY_TEXTLINK);
$colortextlinkHsla    = colorHexToHsl($colortextlink, false, true);
$butactionbg          = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_BTNACTION') ? $butactionbg : $conf->global->THEME_ELDY_BTNACTION) : (empty($user->conf->THEME_ELDY_BTNACTION) ? $butactionbg : $user->conf->THEME_ELDY_BTNACTION);
$textbutaction        = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_TEXTBTNACTION') ? $textbutaction : $conf->global->THEME_ELDY_TEXTBTNACTION) : (empty($user->conf->THEME_ELDY_TEXTBTNACTION) ? $textbutaction : $user->conf->THEME_ELDY_TEXTBTNACTION);
$fontsize             = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_FONT_SIZE1') ? $fontsize : $conf->global->THEME_ELDY_FONT_SIZE1) : (empty($user->conf->THEME_ELDY_FONT_SIZE1) ? $fontsize : $user->conf->THEME_ELDY_FONT_SIZE1);
$fontsizesmaller      = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_FONT_SIZE2') ? $fontsize : $conf->global->THEME_ELDY_FONT_SIZE2) : (empty($user->conf->THEME_ELDY_FONT_SIZE2) ? $fontsize : $user->conf->THEME_ELDY_FONT_SIZE2);
$heightrow            = empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED) ? (!getDolGlobalString('THEME_ELDY_USECOMOACTROW') ? '155%' : '300%') : (empty($user->conf->THEME_ELDY_USECOMOACTROW) ? '155%' : '300%');
$colorbacklinepairhover = ((!isset($conf->global->THEME_ELDY_USE_HOVER) || (string) $conf->global->THEME_ELDY_USE_HOVER === '255,255,255') ? '' : ($conf->global->THEME_ELDY_USE_HOVER === '1' ? 'e6edf0' : $conf->global->THEME_ELDY_USE_HOVER));
$colorbacklinepairchecked = ((!isset($conf->global->THEME_ELDY_USE_CHECKED) || (string) $conf->global->THEME_ELDY_USE_CHECKED === '255,255,255') ? '' : ($conf->global->THEME_ELDY_USE_CHECKED === '1' ? 'e6edf0' : $conf->global->THEME_ELDY_USE_CHECKED));
if (!empty($user->conf->THEME_ELDY_ENABLE_PERSONALIZED)) {
	$colorbacklinepairhover = ((!isset($user->conf->THEME_ELDY_USE_HOVER) || $user->conf->THEME_ELDY_USE_HOVER === '0') ? '' : ($user->conf->THEME_ELDY_USE_HOVER === '1' ? 'e6edf0' : $user->conf->THEME_ELDY_USE_HOVER));
	$colorbacklinepairchecked = ((!isset($user->conf->THEME_ELDY_USE_CHECKED) || $user->conf->THEME_ELDY_USE_CHECKED === '0') ? '' : ($user->conf->THEME_ELDY_USE_CHECKED === '1' ? 'e6edf0' : $user->conf->THEME_ELDY_USE_CHECKED));
}

// Compute contrast text colors
$colorbackhmenu1 = implode(',', colorStringToArray($colorbackhmenu1));
$tmppart = explode(',', $colorbackhmenu1);
$tmpval = (!empty($tmppart[0]) ? $tmppart[0] : 0) + (!empty($tmppart[1]) ? $tmppart[1] : 0) + (!empty($tmppart[2]) ? $tmppart[2] : 0);
if ($tmpval <= 460) {
	$colortextbackhmenu = 'FFFFFF';
} else {
	$colortextbackhmenu = '000000';
}

$colorbackvmenu1 = implode(',', colorStringToArray($colorbackvmenu1));
$tmppart = explode(',', $colorbackvmenu1);
$tmpval = (!empty($tmppart[0]) ? $tmppart[0] : 0) + (!empty($tmppart[1]) ? $tmppart[1] : 0) + (!empty($tmppart[2]) ? $tmppart[2] : 0);
if ($tmpval <= 460) {
	$colortextbackvmenu = 'FFFFFF';
} else {
	$colortextbackvmenu = '222222';
}

$colortopbordertitle1 = implode(',', colorStringToArray($colortopbordertitle1));

$colorbacktitle1 = implode(',', colorStringToArray($colorbacktitle1));
$tmppart = explode(',', $colorbacktitle1);
if ($colortexttitle == '') {
	$tmpval = (!empty($tmppart[0]) ? $tmppart[0] : 0) + (!empty($tmppart[1]) ? $tmppart[1] : 0) + (!empty($tmppart[2]) ? $tmppart[2] : 0);
	if ($tmpval <= 460) {
		$colortexttitle = 'FFFFFF';
		$colorshadowtitle = '888888';
	} else {
		$colortexttitle = '000000';
		$colorshadowtitle = 'FFFFFF';
	}
} else {
	$colorshadowtitle = '888888';
}

$colorbacktabcard1 = implode(',', colorStringToArray($colorbacktabcard1));
$tmppart = explode(',', $colorbacktabcard1);
$tmpval = (!empty($tmppart[0]) ? $tmppart[0] : 0) + (!empty($tmppart[1]) ? $tmppart[1] : 0) + (!empty($tmppart[2]) ? $tmppart[2] : 0);
if ($tmpval <= 460) {
	$colortextbacktab = 'FFFFFF';
} else {
	$colortextbacktab = '000000';
}

// Normalize all color formats
$colorbackhmenu1 = implode(',', colorStringToArray($colorbackhmenu1));
$colorbackvmenu1 = implode(',', colorStringToArray($colorbackvmenu1));
$colorbacktitle1 = implode(',', colorStringToArray($colorbacktitle1));
$colorbacktabcard1 = implode(',', colorStringToArray($colorbacktabcard1));
$colorbacktabactive = implode(',', colorStringToArray($colorbacktabactive));
$colorbacklineimpair1 = implode(',', colorStringToArray($colorbacklineimpair1));
$colorbacklineimpair2 = implode(',', colorStringToArray($colorbacklineimpair2));
$colorbacklinepair1 = implode(',', colorStringToArray($colorbacklinepair1));
$colorbacklinepair2 = implode(',', colorStringToArray($colorbacklinepair2));
if ($colorbacklinepairhover != '') {
	$colorbacklinepairhover = implode(',', colorStringToArray($colorbacklinepairhover));
}
if ($colorbacklinepairchecked != '') {
	$colorbacklinepairchecked = implode(',', colorStringToArray($colorbacklinepairchecked));
}
$colorbackbody = implode(',', colorStringToArray($colorbackbody));
$colortexttitlenotab = implode(',', colorStringToArray($colortexttitlenotab));
$colortexttitle = implode(',', colorStringToArray($colortexttitle));
$colortext = implode(',', colorStringToArray($colortext));
$colortextlink = implode(',', colorStringToArray($colortextlink));

// Menu entries count
$nbtopmenuentries = $menumanager->showmenu('topnb');
$nbtopmenuentriesreal = $nbtopmenuentries;
if (!empty($conf->browser) && !empty($conf->browser->layout) && $conf->browser->layout == 'phone') {
	$nbtopmenuentries = max($nbtopmenuentries, 10);
}

$minwidthtmenu = 66;
$heightmenu = 48;
$heightmenu2 = 46;
$disableimages = 0;
$maxwidthloginblock = 180;
if (getDolGlobalInt('THEME_TOPMENU_DISABLE_IMAGE') == 1 || !empty($user->conf->MAIN_OPTIMIZEFORTEXTBROWSER)) {
	$disableimages = 1;
	$maxwidthloginblock += 50;
	$minwidthtmenu = 0;
}
if (getDolGlobalString('MAIN_USE_TOP_MENU_QUICKADD_DROPDOWN')) {
	$maxwidthloginblock += 55;
}
if (getDolGlobalString('MAIN_USE_TOP_MENU_SEARCH_DROPDOWN')) {
	$maxwidthloginblock += 55;
}
if (isModEnabled('bookmark')) {
	$maxwidthloginblock += 55;
}

print '/* Flavor SaaS Theme 1.0.0 */'."\n";

// Include the global.inc.php that outputs the actual CSS
require __DIR__.'/global.inc.php';

// PHASE 10 — Load auto-generated menu visibility CSS (from setup.php Menu Manager)
$hidden_css_file = __DIR__ . '/flavor_hidden.css';
if (file_exists($hidden_css_file)) {
    echo "\n/* Flavor Menu Visibility (auto-generated by setup.php) */\n";
    echo file_get_contents($hidden_css_file);
}

// Restore original error reporting
error_reporting($_original_error_reporting);

if (is_object($db)) {
	$db->close();
}
