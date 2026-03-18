<?php
/* Copyright (C) 2025-2026  Octavio Daio                <ola@novadx.pt>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 */

/**
 *		\file       htdocs/theme/flavor/global.inc.php
 *		\brief      Main CSS output for the Flavor SaaS theme (Phase 1 — Foundation only)
 */
if (!defined('ISLOADEDBYSTEELSHEET')) {
	die('Must be called by steelsheet');
}

'
@phan-var-force string $colorbackbody
@phan-var-force string $colorbackhmenu1
@phan-var-force string $colorbackvmenu1
@phan-var-force string $colorbacktitle1
@phan-var-force string $colorbacktabcard1
@phan-var-force string $colorbacktabactive
@phan-var-force string $colorbacklineimpair1
@phan-var-force string $colorbacklineimpair2
@phan-var-force string $colorbacklinepair1
@phan-var-force string $colorbacklinepair2
@phan-var-force string $colorbacklinepairhover
@phan-var-force string $colorbacklinepairchecked
@phan-var-force string $colorbacklinebreak
@phan-var-force string $colortexttitlenotab
@phan-var-force string $colortexttitlenotab2
@phan-var-force string $colortexttitle
@phan-var-force string $colortexttitlelink
@phan-var-force string $colortext
@phan-var-force string $colortextlink
@phan-var-force string $colortextbackhmenu
@phan-var-force string $colortextbackvmenu
@phan-var-force string $colortextbacktab
@phan-var-force string $colortopbordertitle1
@phan-var-force string $colorshadowtitle
@phan-var-force string $fontlist
@phan-var-force string $fontsize
@phan-var-force string $heightrow
@phan-var-force string $toolTipBgColor
@phan-var-force string $toolTipFontColor
@phan-var-force string $butactionbg
@phan-var-force string $textbutaction
@phan-var-force string $left
@phan-var-force string $right
@phan-var-force string $path
@phan-var-force string $theme
@phan-var-force string $img_button
@phan-var-force string $badgeStatus4
@phan-var-force string $badgeDanger
@phan-var-force string $badgeWarning
@phan-var-force string $textDanger
@phan-var-force string $textSuccess
@phan-var-force string $textWarning
@phan-var-force int $heightmenu
@phan-var-force int $minwidthtmenu
@phan-var-force int $nbtopmenuentries
@phan-var-force int $nbtopmenuentriesreal
@phan-var-force string $maxwidthloginblock
@phan-var-force string $borderwidth
@phan-var-force int $useboldtitle
@phan-var-force int $userborderontable
@phan-var-force int $disableimages
@phan-var-force int $dol_hide_topmenu
@phan-var-force int $dol_hide_leftmenu
@phan-var-force int $dol_optimize_smallscreen
@phan-var-force int $dol_no_mouse_hover
@phan-var-force array $colortextlinkHsla
';

$leftmenuwidth = 260;
$borderradius = getDolGlobalString('THEME_ELDY_USEBORDERONTABLE') ? getDolGlobalInt('THEME_ELDY_BORDER_RADIUS', 8) : 0;

?>
/* ============================================================================== */
/* Flavor SaaS Theme v1.0.0 — Phase 1 Foundation                                 */
/* ============================================================================== */

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

/* ==========================================================================
   1. CSS CUSTOM PROPERTIES (:root)
   ========================================================================== */

:root {
	/* -- Dolibarr core variables (injected from PHP) -- */
	--colorbackhmenu1: rgb(<?php print $colorbackhmenu1; ?>);
	--colorbackvmenu1: rgb(<?php print $colorbackvmenu1; ?>);
	--colorbacktitle1: rgb(<?php print $colorbacktitle1; ?>);
	--colorbacktabcard1: rgb(<?php print $colorbacktabcard1; ?>);
	--colorbacktabactive: rgb(<?php print $colorbacktabactive; ?>);
	--colorbacklineimpair1: rgb(<?php print $colorbacklineimpair1; ?>);
	--colorbacklineimpair2: rgb(<?php print $colorbacklineimpair2; ?>);
	--colorbacklinepair1: rgb(<?php print $colorbacklinepair1; ?>);
	--colorbacklinepair2: rgb(<?php print $colorbacklinepair2; ?>);
	--colorbacklinepairhover: rgb(<?php print $colorbacklinepairhover; ?>);
	--colorbacklinepairchecked: rgb(<?php print $colorbacklinepairchecked; ?>);
	--colorbacklinebreak: rgb(<?php print $colorbacklinebreak; ?>);
	--colorbackbody: rgb(<?php print $colorbackbody; ?>);
	--colorbackmobilemenu: #f8f8f8;
	--colorbackgrey: #F1F5F9;
	--colortexttitlenotab: rgb(<?php print $colortexttitlenotab; ?>);
	--colortexttitlenotab2: rgb(<?php print $colortexttitlenotab2; ?>);
	--colortexttitle: rgba(<?php print $colortexttitle; ?>, 0.95);
	--colortexttitlelink: rgba(<?php print $colortexttitlelink; ?>, 0.95);
	--colortext: rgb(<?php print $colortext; ?>);
	--colortextlink: rgb(<?php print $colortextlink; ?>);
	--colortextlink-h: <?php print $colortextlinkHsla['h']; ?>;
	--colortextlink-l: <?php print $colortextlinkHsla['l']; ?>%;
	--colortextlink-s: <?php print $colortextlinkHsla['s']; ?>%;
	--colortextlink-a: 1;
	--colortextbackhmenu: #<?php print $colortextbackhmenu; ?>;
	--colortextbackvmenu: #<?php print $colortextbackvmenu; ?>;
	--colortopbordertitle1: rgb(<?php print $colortopbordertitle1; ?>);
	--colortextbacktab: #<?php print $colortextbacktab; ?>;
	--colorblack: #0F172A;
	--colorwhite: #fff;
	--heightrow: <?php print $heightrow; ?>;

	/* -- Dolibarr UI variables -- */
	--listetotal: #6366F1;
	--inputbackgroundcolor: #FFFFFF;
	--inputbackgroundcolordisabled: #F1F5F9;
	--inputcolordisabled: rgb(100, 116, 139);
	--inputbordercolor: rgba(148, 163, 184, 0.4);
	--tooltipbgcolor: <?php print $toolTipBgColor; ?>;
	--tooltipfontcolor: <?php print $toolTipFontColor; ?>;
	--oddevencolor: #1E293B;
	--colorboxstatsborder: #E2E8F0;
	--dolgraphbg: rgba(255,255,255,0);
	--fieldrequiredcolor: #7C3AED;
	--colorboxiconbg: #EEF2FF;
	--refidnocolor: #334155;
	--tableforfieldcolor: #64748B;
	--amountremaintopaycolor: #DC2626;
	--amountpaymentcomplete: #059669;
	--amountremaintopaybackcolor: none;
	--productlinestockod: #065F46;
	--productlinestocktoolow: #92400E;
	--infoboxmoduleenabledbgcolor: linear-gradient(135deg, #fff 0%, #EEF2FF 100%);
	--tablevalidbgcolor: #FFFBEB;

	/* -- SaaS Design Tokens -- */
	--flavor-primary-50:  #EEF2FF;
	--flavor-primary-100: #E0E7FF;
	--flavor-primary-200: #C7D2FE;
	--flavor-primary-300: #A5B4FC;
	--flavor-primary-400: #818CF8;
	--flavor-primary-500: #6366F1;
	--flavor-primary-600: #4F46E5;
	--flavor-primary-700: #4338CA;

	--flavor-slate-50:  #F8FAFC;
	--flavor-slate-100: #F1F5F9;
	--flavor-slate-200: #E2E8F0;
	--flavor-slate-300: #CBD5E1;
	--flavor-slate-400: #94A3B8;
	--flavor-slate-500: #64748B;
	--flavor-slate-600: #475569;
	--flavor-slate-700: #334155;
	--flavor-slate-800: #1E293B;
	--flavor-slate-900: #0F172A;

	--flavor-success-500: #10B981;
	--flavor-success-600: #059669;
	--flavor-warning-500: #F59E0B;
	--flavor-warning-600: #D97706;
	--flavor-danger-500:  #EF4444;
	--flavor-danger-600:  #DC2626;
	--flavor-info-500:    #0EA5E9;

	--flavor-font-sans: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
	--flavor-radius-sm: 4px;
	--flavor-radius-md: 6px;
	--flavor-radius-lg: 8px;
	--flavor-radius-xl: 12px;
	--flavor-shadow-sm: 0 1px 3px 0 rgba(0,0,0,0.06), 0 1px 2px -1px rgba(0,0,0,0.06);
	--flavor-shadow-md: 0 4px 6px -1px rgba(0,0,0,0.07), 0 2px 4px -2px rgba(0,0,0,0.05);
	--flavor-shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.08), 0 4px 6px -4px rgba(0,0,0,0.04);
	--flavor-transition-fast: 150ms cubic-bezier(0.4, 0, 0.2, 1);
	--flavor-transition-normal: 200ms cubic-bezier(0.4, 0, 0.2, 1);

	--butactionbg: rgba(<?php print $butactionbg; ?>);
	--textbutaction: rgb(<?php print $textbutaction; ?>);
}

<?php
if (getDolGlobalInt('THEME_DARKMODEENABLED')) {
	if (getDolGlobalInt('THEME_DARKMODEENABLED') != 2) {
		print "@media (prefers-color-scheme: dark) {\n";
	} else {
		print "@media not print {\n";
	}
	print ":root {
		--colorbackhmenu1: #1E293B;
		--colorbackvmenu1: #0F172A;
		--colorbacktitle1: #1E293B;
		--colorbacktabcard1: #0F172A;
		--colorbacktabactive: rgb(51, 65, 85);
		--colorbacklineimpair1: #1E293B;
		--colorbacklineimpair2: #1E293B;
		--colorbacklinepair1: #0F172A;
		--colorbacklinepair2: #0F172A;
		--colorbacklinepairhover: #1E293B;
		--colorbacklinepairchecked: #312E81;
		--colorbackbody: #020617;
		--colorbackmobilemenu: #0F172A;
		--colorbackgrey: #0F172A;
		--colortexttitlenotab: #A5B4FC;
		--colortexttitlenotab2: #C7D2FE;
		--colortexttitle: #E2E8F0;
		--colortext: #CBD5E1;
		--colortextlink: #818CF8;
		--colortexttitlelink: #818CF8;
		--colortextbackhmenu: #E2E8F0;
		--colortextbackvmenu: #CBD5E1;
		--tooltipbgcolor: #1E293B;
		--tooltipfontcolor: #CBD5E1;
		--listetotal: #A5B4FC;
		--inputbackgroundcolor: #1E293B;
		--inputbackgroundcolordisabled: #0F172A;
		--inputcolordisabled: #64748B;
		--inputbordercolor: rgba(148, 163, 184, 0.25);
		--oddevencolor: #E2E8F0;
		--colorboxstatsborder: #334155;
		--dolgraphbg: #020617;
		--fieldrequiredcolor: #A78BFA;
		--colortextbacktab: #E2E8F0;
		--colorboxiconbg: #1E293B;
		--refidnocolor: #CBD5E1;
		--tableforfieldcolor: #94A3B8;
		--amountremaintopaycolor: #FCA5A5;
		--amountpaymentcomplete: #6EE7B7;
		--amountremaintopaybackcolor: none;
		--infoboxmoduleenabledbgcolor: linear-gradient(135deg, #0F172A 0%, #1E1B4B 100%);
		--tablevalidbgcolor: #1C1917;
		--colorblack: #F1F5F9;
		--colorwhite: #0F172A;
	}
	body, button { color: #CBD5E1; }\n";
	print "}\n";
}
?>


/* ==========================================================================
   2. MODERN CSS RESET
   ========================================================================== */

*, *::before, *::after { box-sizing: border-box; }

html {
	-moz-text-size-adjust: none;
	-webkit-text-size-adjust: none;
	text-size-adjust: none;
}

img, picture, video, canvas, svg { display: block; max-width: 100%; }
p, h1, h2, h3, h4, h5, h6 { overflow-wrap: break-word; }


/* ==========================================================================
   3. BODY & BASE TYPOGRAPHY
   ========================================================================== */

body {
<?php if (GETPOST('optioncss', 'aZ09') == 'print') { ?>
	background-color: #FFFFFF;
<?php } ?>
	font-size: <?php print is_numeric($fontsize) ? $fontsize.'px' : $fontsize; ?>;
	line-height: 1.5;
	font-family: <?php print $fontlist; ?>;
	font-weight: 400;
	color: var(--colortext);
	background-color: var(--colorbackbody);
	margin: 0;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	text-rendering: optimizeLegibility;
	<?php print 'direction: '.$langs->trans("DIRECTION").";\n"; ?>
}

.sensiblehtmlcontent * { position: static !important; }


/* ==========================================================================
   4. LINKS
   ========================================================================== */

a:link, a:visited, a:hover, a:active, .classlink {
	color: var(--colortextlink);
	text-decoration: none;
}
a:hover { text-decoration: underline; color: var(--colortextlink); }
a.commonlink { color: var(--colortextlink) !important; text-decoration: none; }

.thumbstat { font-weight: bold !important; }
th a { font-weight: <?php echo ($useboldtitle ? 'bold' : 'normal'); ?> !important; }
a.tab { font-weight: 500 !important; }

th.liste_titre a div div:hover, th.liste_titre_sel a div div:hover { text-decoration: underline; }
tr.liste_titre th.liste_titre_sel:not(.maxwidthsearch), tr.liste_titre td.liste_titre_sel:not(.maxwidthsearch),
tr.liste_titre th.liste_titre:not(.maxwidthsearch), tr.liste_titre td.liste_titre:not(.maxwidthsearch) { opacity: 0.8; }
tr.liste_titre_filter th.liste_titre:not(.center), tr.liste_titre_filter th.liste_titre_sel:not(.center) { text-align: unset; }
.liste_titre.trheight5em { height: 4em !important; }


/* ==========================================================================
   5. FORM ELEMENTS
   ========================================================================== */

input { font-size: unset; box-sizing: border-box; }
select.vmenusearchselectcombo { background-color: unset; }

select#date_startday, select#date_startmonth, select#date_endday, select#date_endmonth, select#reday, select#remonth,
input, input.flat, form.flat select, select, select.flat, .dataTables_length label select {
	border: none;
}

input, input.flat, textarea, textarea.flat, form.flat select, select, select.flat, .dataTables_length label select {
	color: var(--colortext);
	border-radius: 3px;
	font-family: <?php print $fontlist; ?>;
	outline: none;
	margin: 0px 0px 0px 0px;
	background-color: var(--inputbackgroundcolor);
	<?php if (!getDolGlobalString('THEME_ADD_BACKGROUND_ON_INPUT')) { ?>
		border<?php echo !getDolGlobalString('THEME_SHOW_BORDER_ON_INPUT') ? '-bottom' : ''; ?>: solid 1px var(--inputbordercolor);
	<?php } ?>
}

.liste_titre input, .liste_titre select {
	border: none;
	border<?php echo !getDolGlobalString('THEME_SHOW_BORDER_ON_INPUT') ? '-bottom' : ''; ?>: solid 1px var(--inputbordercolor);
}

.divadvancedsearchfieldcompinput,
div.tabBar input, div.tabBar input.flat, div.tabBar textarea, div.tabBar textarea.flat,
div.tabBar form.flat select, div.tabBar select, div.tabBar select.flat,
div.tabBar .dataTables_length label select {
	border<?php echo !getDolGlobalString('THEME_SHOW_BORDER_ON_INPUT') ? '-bottom' : ''; ?>: solid 1px var(--inputbordercolor);
	<?php if (getDolGlobalString('THEME_ADD_BACKGROUND_ON_INPUT')) { ?>
		background-color: #f8f8fa;
		border-bottom-left-radius: 0;
		border-bottom-right-radius: 0;
	<?php } ?>
}
.divadvancedsearchfieldcompinput {
	background: #fff;
	border-bottom: solid 1px var(--inputbordercolor);
	border-radius: 3px;
}

input[name=duration_value], input[name=durationhour] { margin-right: 4px !important; }
input[type=submit], input[type=submit]:hover { margin-left: 5px; }
input[type=checkbox], input[type=radio] { margin: 0 5px 0 1px; transform: scale(1.25); }
.kanban input.checkforselect { margin-right: 0px; margin-top: 5px; }
input { padding: 4px; padding-left: 5px; }
.liste_titre input { line-height: 1.3em; }
.tableforfield input { padding-left: 2px; }
.refidno input { margin-top: 0 !important; padding: 0; }
.refidno .button.smallpaddingimp { padding: 3px !important; padding-left: 6px !important; padding-right: 6px !important; }

select { padding-top: 4px; padding-right: 4px; padding-bottom: 5px; padding-left: 2px; }
input, select { margin-left: 0px; margin-bottom: 1px; margin-top: 1px; }

#mainbody input.button:not(.buttongen):not(.bordertransp), #mainbody a.button:not(.buttongen):not(.bordertransp) {
	background: var(--butactionbg);
	color: var(--textbutaction);
	border-radius: var(--flavor-radius-md);
	border-collapse: collapse;
	border: none;
}
#mainbody span.websitetools input.button:not(.buttongen):not(.bordertransp) { color: #000 !important; }
#mainbody input.buttongen, #mainbody button.buttongen { padding: 3px 4px; }
input.button:hover { box-shadow: 0px 0px 6px 1px rgb(50 50 50 / 40%), 0px 0px 0px rgb(60 60 60 / 10%); }
input.button:focus { border-bottom: 0; }
input.button.massactionconfirmed { margin: 4px; }

input:invalid, select:invalid, input.--error, select.--error { border-color: #ea1212; }
.field-error-icon { color: #ea1212 !important; }

/* Focus */
div.tabBar textarea:focus:not(.textarea-ai_feature):not(.cke_source) { border: 1px solid #aaa !important; }
input:focus:not(.button):not(.buttonwebsite):not(.buttonreset):not(.select2-search__field):not(#top-bookmark-search-input):not(.search_component_input):not(.input-nobottom),
select:focus, .select2-container--open [aria-expanded="false"].select2-selection--single,
.select2-container--focus span.selection span.select2-selection {
	border-bottom: 1px solid #666 !important;
	border-bottom-left-radius: 0 !important;
	border-bottom-right-radius: 0 !important;
}
textarea.cke_source:focus { box-shadow: none; }
div#cke_dp_desc { margin-top: 5px; }

textarea {
	border-radius: 3px;
	border-top: solid 1px var(--inputbordercolor);
	border-left: solid 1px var(--inputbordercolor);
	border-right: solid 1px var(--inputbordercolor);
	border-bottom: solid 1px var(--inputbordercolor);
	padding: 8px; margin-left: 0px; margin-bottom: 1px; margin-top: 1px;
}

input.removedassigned, input.removedassignedresource { padding: 2px !important; vertical-align: text-bottom; margin-bottom: -3px; }
input.smallpadd { padding-left: 0px !important; padding-right: 0px !important; }
input.buttongen { vertical-align: middle; }
input.short { width: 40px; }
input.shortbis { width: 48px; }
.nofocusvisible:focus-visible { outline: none; }

input:disabled, textarea:disabled, select[disabled='disabled'] {
	background: var(--inputbackgroundcolordisabled);
	color: var(--inputcolordisabled);
}
input.liste_titre { box-shadow: none !important; }
input.removedfile { padding: 0px !important; border: 0px !important; vertical-align: text-bottom; }
input[type=file] {
	background-color: transparent; box-shadow: none;
	<?php if (!getDolGlobalString('THEME_SHOW_BORDER_ON_INPUT')) { ?>
	border-top: none; border-left: none; border-right: none;
	<?php } ?>
	border<?php echo !getDolGlobalString('THEME_SHOW_BORDER_ON_INPUT') ? '-bottom' : ''; ?>: solid 1px var(--inputbordercolor);
}
input[type=checkbox] { background-color: transparent; border: none; box-shadow: none; }
input[type=radio]    { background-color: transparent; border: none; box-shadow: none; }
input[type=image]    { background-color: transparent; border: none; box-shadow: none; }
input:-webkit-autofill {
	background-color: #FDFFF0 !important;
	background-image: none !important;
	-webkit-box-shadow: 0 0 0 50px #FDFFF0 inset;
}

.placeholder { color: #ccc; }
select.placeholder { color: #ccc; }
.select2-selection__choice .placeholder { color: #aaa; }
::-webkit-input-placeholder { color: #ccc; }
input:-moz-placeholder { color: #ccc; }
select.placeholder option:not(.opacitymediumbycolor):not(.opacitymedium) { color: var(--colortext); }

select:invalid, select.--error { color: gray; }
select.flat, form.flat select, .pageplusone { font-weight: normal; font-size: unset; }
input.pageplusone { padding-bottom: 4px; padding-top: 4px; margin-right: 4px; margin-left: 3px; }
.paginationlastpage a { padding-left: 8px; }

.liste_titre input[name=search_month], .liste_titre input[name=search_month_start], .liste_titre input[name=search_month_end] { margin-right: 4px; }


/* ==========================================================================
   6. BUTTONS — Payments
   ========================================================================== */

input.buttonpayment, button.buttonpayment, div.buttonpayment {
	min-width: 290px; margin-bottom: 15px; margin-top: 15px; height: 60px;
	background-image: none; line-height: 24px; padding: 8px; background: none;
	text-align: center; border: 0; background-color: #9999bb; white-space: normal;
	box-shadow: 1px 1px 4px #bbb; color: #fff; border-radius: 4px; cursor: pointer; max-width: 350px;
}
div.buttonpayment input:focus { color: #008; }
.buttonpaymentsmall { font-size: 0.65em; padding-left: 5px; padding-right: 5px; }
div.buttonpayment input {
	background-color: unset; color: #fff; border-bottom: unset; font-weight: bold; text-transform: uppercase; cursor: pointer;
}
input.buttonpaymentcb { background-image: url(<?php echo dol_buildpath($path.'/theme/common/credit_card.png', 1); ?>); background-size: 26px; background-repeat: no-repeat; background-position: 5px 11px; }
input.buttonpaymentcheque { background-image: url(<?php echo dol_buildpath($path.'/theme/common/cheque.png', 1); ?>); background-size: 24px; background-repeat: no-repeat; background-position: 5px 8px; }
input.buttonpaymentpaypal { background-image: url(<?php echo dol_buildpath($path.'/paypal/img/object_paypal.png', 1); ?>); background-repeat: no-repeat; background-position: 8px 11px; }
input.buttonpaymentpaybox { background-image: url(<?php echo dol_buildpath($path.'/paybox/img/object_paybox.png', 1); ?>); background-repeat: no-repeat; background-position: 8px 11px; }
input.buttonpaymentstripe { background-image: url(<?php echo dol_buildpath($path.'/stripe/img/object_stripe.png', 1); ?>); background-repeat: no-repeat; background-position: 8px 11px; }

.logopublicpayment #dolpaymentlogo { max-height: 80px; max-width: 300px; image-rendering: -webkit-optimize-contrast; border-radius: 4px; }

a.butStatus {
	padding-left: 5px; padding-right: 5px; background-color: transparent;
	color: var(--colortext) !important; border: 1px solid #888 !important; margin: 0 0.45em !important;
}

span.userimg.notfirst, div.userimg.notfirst { margin-left: -5px; }
div.userimg.notfirst { display: block-inline; }


/* ==========================================================================
   7. AMOUNTS & VALUES
   ========================================================================== */

td.amount, span.amount, div.amount, b.amount { color: #006666; }
td.amountneg, span.amountneg, div.amountneg, b.amountneg { color: #660000; }
td.amount, span.amount, div.amount, b.amount,
td.amountneg, span.amountneg, div.amountneg, b.amountneg,
span.amount, span.amountneg { white-space: nowrap; }

td.amount.amountbadge, span.amount.amountbadge, div.amount.amountbadge, b.amount.amountbadge {
	background-color: <?php echo $badgeStatus4; ?>; color: #FFF; padding: 4px; border-radius: 4px;
}
td.amountneg.amountbadge, span.amountneg.amountbadge, div.amountneg.amountbadge, b.amountneg.amountbadge {
	background-color: #660000; color: #FFF; padding: 4px; border-radius: 4px;
}

td.actionbuttons a { padding-left: 6px; }


/* ==========================================================================
   8. TIMESHEETS / HOLIDAYS
   ========================================================================== */

span.timesheetalreadyrecorded input { border: none; border-bottom: solid 1px rgba(0,0,0,0.4); margin-right: 1px !important; }
td.onholidaymorning, td.onholidayafternoon { background-color: #fdf6f2; }
td.onholidayallday { background-color: #f4eede; }
td.onholidayallday:not(.weekend) input { background-color: #f8f7f0; }
td.weekend { background-color: #f8f4f4; }
tr:hover td.weekend { background: var(--colorbacklinepairhover) !important; }
td.rightborder { border-right: 1px solid #ccc; }
td.linecoldescription.bomline { width: 400px; }


/* ==========================================================================
   9. UTILITY CLASSES
   ========================================================================== */

.saturatemedium { filter: saturate(0.8); }
.optionblue { color: var(--colortextlink); }
.optiongrey, .opacitymedium { opacity: 0.4; }
.opacitymediumbycolor { color: rgba(0,0,0,0.4); }
.opacitylow { opacity: 0.6; }
.opacityhigh { opacity: 0.24; }
.opacitytransp { opacity: 0; }
.colorwhite { color: var(--colorwhite); }
.colorgrey { color: #888 !important; }
.colorblack { color: var(--colorblack); }
.colorblack.totalnboflines { font-size: 90%; opacity: 0.5; }
.fontsizeunset { font-size: unset !important; }
.vmirror { transform: scale(1, -1); }
.hmirror { transform: scale(-1, 1); }

section.setupsection { padding: 20px; background-color: var(--colorbackgrey); border-radius: 5px; }
section.setupsection:hover { box-shadow: 0 0 5px #aaa; }

table.liste th.wrapcolumntitle.liste_titre:not(.maxwidthsearch), table.liste td.wrapcolumntitle.liste_titre:not(.maxwidthsearch),
table.liste th.wrapcolumntitle.liste_titre_sel:not(.maxwidthsearch), table.liste td.wrapcolumntitle.liste_titre_sel:not(.maxwidthsearch) {
	overflow: hidden; white-space: nowrap; max-width: 100px; text-overflow: ellipsis;
}
th.wrapcolumntitle dl dt a span.fas.fa-list { vertical-align: middle; padding-bottom: 1px; }


/* ==========================================================================
   10. INCLUDE ELDY global.inc.php FOR FULL LAYOUT
   ========================================================================== */

<?php
include __DIR__.'/../eldy/global.inc.php';
?>


/* ============================================================================== */
/*                                                                                */
/*   PHASE 2.2 — DUAL-SIDEBAR LAYOUT (Vendus Style)                              */
/*   Col 1: 80px icon bar (tmenudiv)  |  Col 2: 220px submenu (side-nav)         */
/*   Topbar: white, offset 300px      |  Content: offset 300px                    */
/*                                                                                */
/* ============================================================================== */



/* ==========================================================================
   P2-1. HEADER#id-top — TRANSPARENT SHELL
   We make the parent transparent; children positioned independently.
   ========================================================================== */

#mainbody #id-top,
#id-top,
header#id-top,
.side-nav-vert {
	position: fixed !important;
	top: 0 !important;
	left: 0 !important;
	right: 0 !important;
	height: 56px !important;
	background: transparent !important;
	background-color: transparent !important;
	background-image: none !important;
	border: none !important;
	box-shadow: none !important;
	z-index: 1050 !important;
	display: block !important;
	pointer-events: none !important; /* let clicks pass through transparent areas */
}

/* Re-enable clicks on actual children */
#id-top > *,
#id-top div.tmenudiv,
#id-top div.login_block {
	pointer-events: auto !important;
}

/* White topbar band — spans from 300px to right edge */
#id-top::after {
	content: '' !important;
	position: absolute !important;
	top: 0 !important;
	left: 300px !important;
	right: 0 !important;
	height: 56px !important;
	background: #FFFFFF !important;
	border-bottom: 1px solid #E2E8F0 !important;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04) !important;
	z-index: -1 !important;
	pointer-events: none !important;
}


/* ==========================================================================
   P2-2. ICON COLUMN (80px) — div.tmenudiv
   Fixed left column with centered module icons, labels hidden.
   ========================================================================== */

#mainbody div.tmenudiv,
div.tmenudiv,
.tmenudiv {
	position: fixed !important;
	left: 0 !important;
	top: 0 !important;
	width: 80px !important;
	height: 100vh !important;
	background: #2D2776 !important;
	background-color: #2D2776 !important;
	background-image: none !important;
	border: none !important;
	border-right: 1px solid rgba(255, 255, 255, 0.05) !important;
	z-index: 1060 !important;
	overflow-x: hidden !important;
	overflow-y: auto !important;
	display: flex !important;
	flex-direction: column !important;
	align-items: center !important;
	padding-top: 8px !important;
	padding-bottom: 12px !important;
}

/* Scrollbar for icon column */
div.tmenudiv::-webkit-scrollbar { width: 0; height: 0; }

/* tmenu_tooltip container inside tmenudiv — remove old padding/sizing */
div#tmenu_tooltip {
	width: 80px !important;
	padding: 0 !important;
	margin: 0 !important;
	display: flex !important;
	flex-direction: column !important;
	align-items: center !important;
	flex: 1 !important;
}

/* =====  UL.TMENU  ===== */
/* UN-HIDE the tmenu (was display:none in Phase 2.1) */
div.tmenudiv ul.tmenu {
	display: flex !important;
	flex-direction: column !important;
	align-items: center !important;
	list-style: none !important;
	padding: 0 !important;
	margin: 0 !important;
	width: 80px !important;
	gap: 2px !important;
}

/* =====  LI items  ===== */
ul.tmenu li,
li.tmenu,
li.tmenusel {
	float: none !important;
	display: flex !important;
	align-items: center !important;
	justify-content: center !important;
	width: 64px !important;
	height: 48px !important;
	margin: 0 auto !important;
	padding: 0 !important;
	position: relative !important;
	border-radius: 12px !important;
	transition: background 150ms ease !important;
	border: none !important;
}

li.tmenu:hover {
	background: rgba(255, 255, 255, 0.08) !important;
}

li.tmenusel {
	background: transparent !important;
}

/* Remove eldy's ::after triangle indicators */
li.tmenusel::after,
li.tmenu::after,
li.tmenu:hover::after {
	display: none !important;
	content: none !important;
}

/* Selected indicator — left bar */
li.tmenusel::before {
	content: '' !important;
	position: absolute !important;
	left: -8px !important;
	top: 50% !important;
	transform: translateY(-50%) !important;
	width: 3px !important;
	height: 24px !important;
	background: var(--flavor-primary-500) !important;
	border-radius: 0 3px 3px 0 !important;
	display: block !important;
}

/* =====  TMENUCENTER  ===== */
.tmenucenter {
	display: flex !important;
	flex-direction: column !important;
	align-items: center !important;
	justify-content: center !important;
	width: 100% !important;
	height: 100% !important;
	padding: 0 !important;
}

/* =====  ICONS  ===== */
a.tmenuimage,
.tmenuimage {
	display: flex !important;
	align-items: center !important;
	justify-content: center !important;
	width: 100% !important;
	height: 100% !important;
	padding: 0 !important;
	margin: 0 !important;
}

/* Icon sizing — both img and font icons */
.tmenuimage .mainmenu,
.topmenuimage .mainmenu {
	width: 24px !important;
	height: 24px !important;
	max-width: 24px !important;
	max-height: 24px !important;
	background-size: 24px 24px !important;
	filter: brightness(0) invert(0.65) !important;
	opacity: 0.8 !important;
	transition: all 150ms ease !important;
}

li.tmenu:hover .tmenuimage .mainmenu,
li.tmenu:hover .topmenuimage .mainmenu {
	filter: brightness(0) invert(1) !important;
	opacity: 1 !important;
}

li.tmenusel .tmenuimage .mainmenu,
li.tmenusel .topmenuimage .mainmenu {
	filter: brightness(0) invert(1) !important;
	opacity: 1 !important;
}

/* FontAwesome icons in tmenu */
.tmenuimage .mainmenu .fas,
.tmenuimage .mainmenu .far,
.tmenuimage .mainmenu .fa,
.topmenuimage .fas,
.topmenuimage .far,
.topmenuimage .fa {
	font-size: 18px !important;
	color: rgba(255,255,255,0.6) !important;
}
li.tmenu:hover .fas,
li.tmenu:hover .far,
li.tmenu:hover .fa,
li.tmenusel .fas,
li.tmenusel .far,
li.tmenusel .fa {
	color: #FFFFFF !important;
}

/* =====  HIDE label text  ===== */
a.tmenulabel,
.tmenulabel,
span.mainmenuaspan,
.mainmenuaspan {
	display: none !important;
	width: 0 !important;
	height: 0 !important;
	overflow: hidden !important;
	font-size: 0 !important;
}

/* =====  Menu hider (hamburger) — HIDDEN, replaced by logo  ===== */
li#mainmenutd_menu,
a.menuhider {
	display: none !important;
	width: 0 !important;
	height: 0 !important;
	overflow: hidden !important;
}

/* =====  Company Logo — top of icon sidebar  ===== */
li#mainmenutd_companylogo {
	order: -1 !important;
	margin-bottom: 12px !important;
	padding: 12px 0 12px 0 !important;
	border-bottom: 1px solid rgba(255,255,255,0.1) !important;
	border-radius: 0 !important;
}
li#mainmenutd_companylogo a {
	display: flex !important;
	align-items: center !important;
	justify-content: center !important;
}
li#mainmenutd_companylogo img {
	max-width: 36px !important;
	max-height: 36px !important;
	filter: brightness(1) invert(0) !important;
}

/* Tooltip for icon hover */
li.tmenu[title],
li.tmenusel[title] {
	/* Browser native tooltip */
}


/* ==========================================================================
   P2-3. SUBMENU COLUMN (220px) — .side-nav
   Fixed second column for contextual submenus.
   ========================================================================== */

#mainbody .side-nav,
.side-nav {
	position: fixed !important;
	left: 80px !important;
	top: 0 !important;
	width: 220px !important;
	min-width: 220px !important;
	max-width: 220px !important;
	height: 100vh !important;
	background: #312C81 !important;
	background-color: #312C81 !important;
	background-image: none !important;
	border-right: 1px solid rgba(255,255,255,0.06) !important;
	border-left: none !important;
	box-shadow: none !important;
	z-index: 1040 !important;
	overflow-y: auto !important;
	overflow-x: hidden !important;
	flex-shrink: 0 !important;
}

/* Dark scrollbar */
.side-nav::-webkit-scrollbar { width: 4px; }
.side-nav::-webkit-scrollbar-track { background: transparent; }
.side-nav::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.15); border-radius: 4px; }

/* #id-left inside side-nav — use flex to push admin block to bottom */
#mainbody #id-left,
#id-left {
	display: flex !important;
	flex-direction: column !important;
	min-height: 100vh !important;
	padding-top: 12px !important;
	padding-bottom: 16px !important;
	background: transparent !important;
	background-color: transparent !important;
}

/* vmenu also flex so children stack properly */
#id-left div.vmenu,
div.vmenu,
td.vmenu {
	display: flex !important;
	flex-direction: column !important;
	flex: 1 !important;
	padding: 0 !important;
	background: transparent !important;
	background-color: transparent !important;
}

/* --- Text: force all sidebar text white/light --- */
div.vmenu a,
div.vmenu span,
div.vmenu font,
td.vmenu a,
td.vmenu span,
#id-left a,
#id-left span,
#id-left font {
	color: #E2E8F0 !important;
}

/* --- Remove ALL borders/backgrounds from blockvmenu --- */
div.blockvmenupair,
div.blockvmenuimpair,
div.blockvmenuend,
div.blockvmenubookmarks,
div.blockvmenulogo {
	border: none !important;
	padding-left: 0 !important;
	background: transparent !important;
	background-color: transparent !important;
	background-image: none !important;
}

/* --- Menu section titles (Accordion-ready — Phase 8.2 Hotfix) --- */
.blockvmenu .menu_titre {
	margin-top: 8px !important;
	margin-bottom: 0 !important;
	cursor: pointer !important;
	position: relative !important;
	user-select: none !important;
	display: flex !important;
	align-items: center !important;
	justify-content: flex-start !important;
	text-align: left !important;
	padding: 10px 16px !important;
}

.blockvmenu .menu_titre a.vmenu,
.blockvmenu .menu_titre span.vmenu,
.menu_titre a.vmenu,
.menu_titre span.vmenu {
	display: flex !important;
	align-items: center !important;
	justify-content: flex-start !important;
	flex-grow: 1 !important;
	padding: 0 !important;
	font-size: 0.75rem !important;
	font-weight: 600 !important;
	letter-spacing: 0.05em !important;
	text-transform: uppercase !important;
	color: rgba(255, 255, 255, 0.6) !important;
	background: transparent !important;
	background-color: transparent !important;
	border: none !important;
	text-decoration: none !important;
	cursor: pointer !important;
	text-align: left !important;
}
.blockvmenu .menu_titre a.vmenu:hover,
.blockvmenu .menu_titre span.vmenu:hover {
	color: rgba(255, 255, 255, 0.85) !important;
}

/* Category icon (.pictotitle or FA) — left-aligned, harmonic spacing */
.vmenu .menu_titre .pictotitle,
.vmenu .menu_titre span[class*="fa-"],
.vmenu .menu_titre img {
	margin-right: 10px !important;
	margin-left: 0 !important;
	display: inline-block !important;
	font-size: 1rem !important;
	flex-shrink: 0 !important;
}

/* Chevron arrow — pushed to far right via auto margin */
.blockvmenu .menu_titre a.vmenu::after,
.blockvmenu .menu_titre span.vmenu::after {
	content: "\f107" !important;
	font-family: "Font Awesome 5 Free" !important;
	font-weight: 900 !important;
	font-size: 0.7rem !important;
	color: rgba(255, 255, 255, 0.35) !important;
	transition: transform 0.25s ease !important;
	flex-shrink: 0 !important;
	margin-left: auto !important;
}
/* Collapsed state — chevron rotates right */
.blockvmenu.collapsed .menu_titre a.vmenu::after,
.blockvmenu.collapsed .menu_titre span.vmenu::after {
	transform: rotate(-90deg) !important;
}

/* --- Menu content container (crush phantom spacing) --- */
.blockvmenu .menu_contenu {
	padding: 0 0 6px 16px !important;
	margin: 0 !important;
	overflow: hidden !important;
}
/* Kill <br> tags injected by Dolibarr */
.vmenu .blockvmenu .menu_contenu br,
.blockvmenu .menu_contenu br {
	display: none !important;
}
/* Collapsed state — hide content */
.blockvmenu.collapsed .menu_contenu {
	display: none !important;
}

/* --- Menu item links (extreme density + guide line) --- */
.blockvmenu .menu_contenu a.vmenu,
.blockvmenu .menu_contenu a.vsmenu,
.blockvmenu a.vmenu,
.blockvmenu a.vsmenu,
div.vmenu a.vmenu,
div.vmenu a.vsmenu {
	display: block !important;
	padding: 4px 12px !important;
	font-size: 0.85rem !important;
	font-weight: 400 !important;
	color: rgba(255, 255, 255, 0.7) !important;
	text-decoration: none !important;
	border-left: 1px solid rgba(255, 255, 255, 0.1) !important;
	border-right: none !important;
	border-top: none !important;
	border-bottom: none !important;
	margin: 0 !important;
	min-height: 0 !important;
	background: transparent !important;
	background-color: transparent !important;
	transition: all 0.2s ease !important;
	line-height: 1.2 !important;
}

/* Hover */
.blockvmenu .menu_contenu a.vmenu:hover,
.blockvmenu .menu_contenu a.vsmenu:hover,
div.vmenu a.vmenu:hover,
div.vmenu a.vsmenu:hover {
	background: rgba(255, 255, 255, 0.03) !important;
	background-color: rgba(255, 255, 255, 0.03) !important;
	color: #FFFFFF !important;
	border-left: 1px solid var(--flavor-primary-500, #6366F1) !important;
	text-decoration: none !important;
}

/* Active/Selected */
.blockvmenu .menu_contenu a.vsmenu.vmenusel,
.blockvmenu .menu_contenu a.vmenu.vmenusel,
div.vmenu a.vmenu.vmenusel,
div.vmenu a.vsmenu.vmenusel,
font.vsmenu.vmenusel {
	background: rgba(99, 102, 241, 0.12) !important;
	background-color: rgba(99, 102, 241, 0.12) !important;
	color: #FFFFFF !important;
	border-left: 2px solid var(--flavor-primary-500, #6366F1) !important;
	font-weight: 500 !important;
}

/* Font tags */
font.vsmenu {
	color: rgba(255, 255, 255, 0.7) !important;
}
font.vsmenu.vmenusel {
	color: #FFFFFF !important;
}

/* Menu contenu container */
.blockvmenu .menu_contenu {
	padding: 0 !important;
	background: transparent !important;
	background-color: transparent !important;
	border: none !important;
}

/* --- Sidebar search box (CaFuKa style) --- */
.vmenu .searchform input,
#id-left .searchform input,
#blockvmenusearch input {
	background-color: rgba(59, 53, 160, 0.4) !important;
	color: #FFFFFF !important;
	border: 1px solid rgba(255,255,255,0.12) !important;
	border-radius: 24px !important;
	padding: 10px 16px 10px 36px !important;
	font-size: 0.8125rem !important;
	width: calc(100% - 32px) !important;
	margin: 8px 16px 16px 16px !important;
	transition: all 0.2s ease !important;
}
.vmenu .searchform input::placeholder,
#blockvmenusearch input::placeholder {
	color: rgba(255, 255, 255, 0.45) !important;
}
.vmenu .searchform input:focus,
#id-left .searchform input:focus,
#blockvmenusearch input:focus {
	background-color: rgba(59, 53, 160, 0.6) !important;
	border-color: rgba(255, 255, 255, 0.25) !important;
	box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.25) !important;
	outline: none !important;
}

/* Search icon alignment */
#blockvmenusearch,
.blockvmenusearch {
	position: relative !important;
}
#blockvmenusearch img,
.blockvmenusearch img {
	position: absolute !important;
	left: 28px !important;
	top: 50% !important;
	transform: translateY(-50%) !important;
	width: 14px !important;
	height: 14px !important;
	filter: brightness(0) invert(1) !important;
	opacity: 0.5 !important;
	z-index: 1 !important;
}

/* Search autocomplete dropdown — match CaFuKa purple */
.ui-autocomplete,
.ui-menu,
#blockvmenusearch .ui-autocomplete,
.search_component_result,
.blockvmenusearch .autocomplete-results {
	background: #3B35A0 !important;
	background-color: #3B35A0 !important;
	border: 1px solid rgba(255,255,255,0.15) !important;
	border-radius: 12px !important;
	box-shadow: 0 8px 25px rgba(0,0,0,0.3) !important;
	padding: 4px !important;
	margin-top: 4px !important;
}
.ui-autocomplete .ui-menu-item,
.ui-menu .ui-menu-item {
	padding: 0 !important;
}
.ui-autocomplete .ui-menu-item a,
.ui-autocomplete .ui-menu-item .ui-menu-item-wrapper,
.ui-menu .ui-menu-item a,
.ui-menu .ui-menu-item .ui-menu-item-wrapper {
	color: #E2E8F0 !important;
	background: transparent !important;
	padding: 8px 14px !important;
	border-radius: 8px !important;
	font-size: 0.8125rem !important;
}
.ui-autocomplete .ui-menu-item a:hover,
.ui-autocomplete .ui-menu-item .ui-menu-item-wrapper.ui-state-active,
.ui-autocomplete .ui-menu-item .ui-menu-item-wrapper:hover,
.ui-menu .ui-menu-item a:hover,
.ui-state-active, .ui-widget-content .ui-state-active {
	background: rgba(99,102,241,0.25) !important;
	color: #FFFFFF !important;
	border: none !important;
}
/* "Enter 1 or more character" hint text */
.ui-autocomplete .ui-menu-item em,
.ui-autocomplete em,
.search_component_result em {
	color: rgba(255,255,255,0.5) !important;
	font-style: normal !important;
}

/* --- Sidebar icons (invert for dark bg) --- */
.blockvmenu img,
div.vmenu img,
#id-left img:not(.userphoto):not(.userphotopublicvcard):not(.photo) {
	filter: brightness(0) invert(0.7) !important;
}
.blockvmenu a:hover img,
div.vmenu a:hover img {
	filter: brightness(0) invert(1) !important;
}
.blockvmenu .pictofixedwidth,
div.vmenu .pictofixedwidth,
#id-left .pictofixedwidth {
	filter: brightness(0) invert(0.7) !important;
	opacity: 0.8 !important;
}
.blockvmenu a:hover .pictofixedwidth,
div.vmenu a:hover .pictofixedwidth {
	filter: brightness(0) invert(1) !important;
	opacity: 1 !important;
}

/* --- Select2 in sidebar --- */
#id-left .select2-container .select2-selection,
.vmenu .select2-container .select2-selection {
	background-color: rgba(255,255,255,0.06) !important;
	border-color: rgba(255,255,255,0.1) !important;
	color: #E2E8F0 !important;
}
#id-left .select2-container .select2-selection__rendered {
	color: #E2E8F0 !important;
}

/* --- Push last blockvmenu (Admin/Config) to bottom --- */
div.vmenu > .blockvmenu:last-of-type,
div.vmenu > .blockvmenuimpair:last-of-type {
	margin-top: auto !important;
	padding-top: 12px !important;
	border-top: 1px solid rgba(255,255,255,0.06) !important;
}


/* ==========================================================================
   P2-4. WHITE TOPBAR — Login Block
   Positioned in the white area from 300px to 100%.
   ========================================================================== */

div.login_block {
	position: fixed !important;
	top: 0 !important;
	right: 0 !important;
	left: 300px !important;
	display: flex !important;
	align-items: center !important;
	justify-content: flex-end !important;
	height: 56px !important;
	padding: 0 20px !important;
	background: transparent !important;
	background-color: transparent !important;
	z-index: 1055 !important;
	line-height: normal !important;
}

div.login_block a {
	color: #475569 !important;
	display: inline-flex !important;
	align-items: center !important;
}
div.login_block a:hover {
	color: #6366F1 !important;
}
div.login_block a .atoploginusername {
	color: #334155 !important;
	font-weight: 500 !important;
	max-width: 120px !important;
}
div.login_block span.aversion {
	color: #94A3B8 !important;
	font-size: 0.7rem !important;
	filter: none !important;
}

div.login_block_tools,
div.login_block_other,
div.login_block_user {
	display: inline-flex !important;
	align-items: center !important;
	vertical-align: unset !important;
	line-height: normal !important;
	height: auto !important;
}

.login_block_elem {
	float: none !important;
	display: inline-flex !important;
	align-items: center !important;
}

.atoplogin, .atoplogin:hover {
	color: #475569 !important;
}
.atoplogin:hover {
	color: #6366F1 !important;
}

/* Login block icons — colorful on white topbar */
.login_block .fa,
.login_block .fas,
.login_block .far,
div.login_block img {
	color: #64748B !important;
	filter: none !important;
	font-weight: 900 !important;
	transition: all 0.2s ease !important;
}
.login_block a:hover .fa,
.login_block a:hover .fas,
.login_block a:hover .far {
	color: #6366F1 !important;
}

.dropdown-user-image {
	border-radius: 50% !important;
	width: 32px !important;
	height: 32px !important;
}


/* ==========================================================================
   P2-5. CONTENT AREA — #id-container + #id-right
   Offset by 300px (80 + 220) to clear the dual sidebar.
   ========================================================================== */

#mainbody #id-container,
#id-container {
	display: block !important;
	margin-left: 300px !important;
	margin-top: 56px !important;
	width: auto !important;
	min-height: calc(100vh - 56px) !important;
	table-layout: unset !important;
}

#mainbody #id-right,
#id-right {
	display: block !important;
	float: none !important;
	width: 100% !important;
	padding: 1.5rem 2rem 2rem 2rem !important;
	background: var(--colorbackbody) !important;
	overflow-y: auto !important;
	vertical-align: unset !important;
}

/* Since .side-nav is position:fixed, remove it from normal flow */
#id-container > .side-nav {
	/* Already positioned fixed; just ensure it doesn't take space */
}

#mainbody div.fiche,
div.fiche {
	max-width: 1600px !important;
	margin-left: auto !important;
	margin-right: auto !important;
}


/* ==========================================================================
   P2-6. RESPONSIVE OVERRIDES
   ========================================================================== */

@media only screen and (max-width: 1200px) {
	/* Collapse submenu column on medium screens */
	.side-nav {
		left: 80px !important;
		width: 0 !important;
		min-width: 0 !important;
		overflow: hidden !important;
		border: none !important;
		transition: width 200ms ease !important;
	}
	.side-nav:hover,
	.side-nav:focus-within {
		width: 220px !important;
		min-width: 220px !important;
		overflow-y: auto !important;
		border-right: 1px solid rgba(255,255,255,0.06) !important;
	}
	#id-container {
		margin-left: 80px !important;
	}
	div.login_block {
		left: 80px !important;
	}
	#id-top::after {
		left: 80px !important;
	}
}

@media only screen and (max-width: 768px) {
	/* Collapse everything on mobile */
	div.tmenudiv {
		width: 56px !important;
	}
	.side-nav {
		display: none !important;
	}
	#id-container {
		margin-left: 56px !important;
		margin-top: 48px !important;
	}
	div.login_block {
		left: 56px !important;
		height: 48px !important;
	}
	#id-top::after {
		left: 56px !important;
		height: 48px !important;
	}
	#id-right {
		padding: 0.75rem !important;
	}
	li.tmenu, li.tmenusel {
		width: 44px !important;
		height: 40px !important;
	}
}

@media print {
	div.tmenudiv,
	.side-nav,
	#id-top,
	.side-nav-vert {
		display: none !important;
	}
	#id-container {
		margin-left: 0 !important;
		margin-top: 0 !important;
	}
	#id-right {
		padding: 0 !important;
	}
}


/* ============================================================================== */
/*                                                                                */
/*   PHASE 3 — DATA UI (Cards, Tables, Forms & Buttons)                          */
/*   Modernize the internal Dolibarr pages: listings, records, forms.             */
/*                                                                                */
/* ============================================================================== */


/* ==========================================================================
   P3-1. CARD CONTAINERS
   div.fiche, div.tabBar, div.fichecenter — white cards with shadow
   ========================================================================== */

div.fiche {
	padding: 0 !important;
}

div.tabBar,
div.tabBarWithBottom,
div.fichecenter,
div.fichehalfleft,
div.fichehalfright,
div.ficheaddleft {
	background-color: #FFFFFF !important;
	border-radius: 0 0 12px 12px !important;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06), 0 1px 2px rgba(0, 0, 0, 0.04) !important;
	border: 1px solid #F1F5F9 !important;
	border-top: none !important;
	padding: 24px !important;
	margin-top: 0 !important;
	margin-bottom: 16px !important;
	overflow: hidden !important;
}

/* Half-width sections side by side */
div.fichehalfleft {
	border-radius: 0 0 0 12px !important;
	margin-right: 0 !important;
}
div.fichehalfright {
	border-radius: 0 0 12px 0 !important;
	margin-left: 0 !important;
}

/* Inner containers should not double-up styling */
div.tabBar div.tabBar,
div.fichecenter div.fichecenter {
	box-shadow: none !important;
	border: none !important;
	padding: 0 !important;
	border-radius: 0 !important;
	margin-bottom: 0 !important;
	margin-top: 0 !important;
}

/* Page title bar — white TOP of the unified card */
table.centpercent.notopnoleftnoright.table-fiche-title {
	background-color: #FFFFFF !important;
	background: #FFFFFF !important;
	border-radius: 12px 12px 0 0 !important;
	box-shadow: 0 -1px 3px rgba(0, 0, 0, 0.04) !important;
	border: 1px solid #F1F5F9 !important;
	border-bottom: none !important;
	padding: 16px 24px !important;
	margin-bottom: 0 !important;
}

/* Title text inside the page title bar */
.table-fiche-title .titre,
.table-fiche-title td.titre {
	font-size: 1.25rem !important;
	font-weight: 600 !important;
	color: var(--flavor-slate-900) !important;
	padding: 4px 0 !important;
}

/* Colored top-border accent on title bars */
tr.titre td {
	border-top: 3px solid var(--flavor-primary-500) !important;
	border-radius: 12px 12px 0 0 !important;
}


/* ==========================================================================
   P3-2. TABLE HEADERS
   .liste_titre, tr.liste_titre — subtle, modern column headers
   ========================================================================== */

/* Table wrapper — white card */
table.tagtable,
table.noborder,
table.liste,
table.border,
table.formleftarea {
	border-collapse: separate !important;
	border-spacing: 0 !important;
	width: 100% !important;
	background: #FFFFFF !important;
	border-radius: 12px !important;
	overflow: hidden !important;
	box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04) !important;
	border: 1px solid #F1F5F9 !important;
	margin-bottom: 16px !important;
}

/* Nested tables: no double card */
table.noborder table.noborder,
table.liste table.liste,
table.border table.border,
div.tabBar table.noborder,
div.tabBar table.border,
div.fichecenter table.noborder {
	box-shadow: none !important;
	border: none !important;
	border-radius: 0 !important;
	margin-bottom: 0 !important;
}

/* Header row */
tr.liste_titre,
tr.liste_titre_bydiv {
	background-color: #F8FAFC !important;
	background-image: none !important;
	border-bottom: 2px solid #E2E8F0 !important;
}

/* Header cells */
tr.liste_titre td,
tr.liste_titre th,
tr.liste_titre_bydiv td,
th.liste_titre {
	text-transform: uppercase !important;
	font-size: 0.6875rem !important;
	font-weight: 600 !important;
	color: var(--flavor-slate-500) !important;
	letter-spacing: 0.05em !important;
	padding: 12px 16px !important;
	border-bottom: 2px solid #E2E8F0 !important;
	border-right: none !important;
	border-left: none !important;
	background-color: #F8FAFC !important;
	background-image: none !important;
	white-space: nowrap !important;
	vertical-align: middle !important;
}

/* Sort icons */
tr.liste_titre td a,
th.liste_titre a {
	color: var(--flavor-slate-500) !important;
	text-decoration: none !important;
	text-transform: uppercase !important;
	font-size: 0.6875rem !important;
	font-weight: 600 !important;
	letter-spacing: 0.05em !important;
}
tr.liste_titre td a:hover,
th.liste_titre a:hover {
	color: var(--flavor-primary-600) !important;
}

/* Filter row (search inputs in table header) */
tr.liste_titre_filter td {
	padding: 8px 12px !important;
	background-color: #FFFFFF !important;
	border-bottom: 1px solid #E2E8F0 !important;
	border-right: none !important;
}


/* ==========================================================================
   P3-3. TABLE ROWS
   .oddeven, tr.impair, tr.pair — clean rows with hover
   ========================================================================== */

tr.oddeven,
tr.impair,
tr.pair {
	background-color: #FFFFFF !important;
	transition: background-color 150ms ease !important;
}

tr.oddeven td,
tr.impair td,
tr.pair td {
	padding: 12px 16px !important;
	border-bottom: 1px solid #F1F5F9 !important;
	border-right: none !important;
	border-left: none !important;
	border-top: none !important;
	color: var(--flavor-slate-700) !important;
	font-size: 0.8125rem !important;
	vertical-align: middle !important;
	line-height: 1.5 !important;
}

/* Hover state */
tr.oddeven:hover,
tr.impair:hover,
tr.pair:hover {
	background-color: #F8FAFC !important;
}

/* Checked/selected row */
tr.highlight,
tr.oddeven.highlight {
	background-color: #EEF2FF !important;
}

/* Total row */
tr.liste_total td {
	font-weight: 600 !important;
	color: var(--flavor-slate-900) !important;
	border-top: 2px solid #E2E8F0 !important;
	border-bottom: none !important;
	padding: 14px 16px !important;
	background-color: #F8FAFC !important;
}

/* Links inside table cells */
tr.oddeven td a,
tr.impair td a,
tr.pair td a {
	color: var(--flavor-primary-600) !important;
	text-decoration: none !important;
	font-weight: 500 !important;
}
tr.oddeven td a:hover,
tr.impair td a:hover,
tr.pair td a:hover {
	color: var(--flavor-primary-700) !important;
	text-decoration: underline !important;
}

/* No-result row */
tr.oddeven.opacitymedium td {
	color: var(--flavor-slate-400) !important;
	font-style: italic !important;
	text-align: center !important;
}


/* ==========================================================================
   P3-4. FORM FIELDS & INPUTS
   input, select, textarea, .flat — modern input styling
   ========================================================================== */

input.flat,
input[type="text"],
input[type="email"],
input[type="password"],
input[type="number"],
input[type="tel"],
input[type="url"],
input[type="search"],
input[type="date"],
input[type="datetime-local"],
select.flat,
select,
textarea.flat,
textarea,
.multiselect {
	height: 40px !important;
	padding: 0 12px !important;
	border: 1px solid #D1D5DB !important;
	border-radius: 6px !important;
	background-color: #FFFFFF !important;
	color: var(--flavor-slate-700) !important;
	font-size: 0.875rem !important;
	font-family: var(--flavor-font-family) !important;
	transition: border-color 200ms ease, box-shadow 200ms ease !important;
	outline: none !important;
	-webkit-appearance: none !important;
	box-sizing: border-box !important;
}

textarea.flat,
textarea {
	height: auto !important;
	min-height: 80px !important;
	padding: 10px 12px !important;
	resize: vertical !important;
}

select.flat,
select {
	padding-right: 32px !important;
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%2364748b' d='M6 8L1 3h10z'/%3E%3C/svg%3E") !important;
	background-repeat: no-repeat !important;
	background-position: right 10px center !important;
	cursor: pointer !important;
}

/* Focus State — indigo ring */
input.flat:focus,
input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
input[type="number"]:focus,
input[type="search"]:focus,
input[type="date"]:focus,
select.flat:focus,
select:focus,
textarea.flat:focus,
textarea:focus {
	border-color: var(--flavor-primary-500) !important;
	box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15) !important;
	outline: none !important;
}

/* Disabled */
input:disabled,
input.flat:disabled,
select:disabled,
textarea:disabled {
	background-color: #F9FAFB !important;
	color: var(--flavor-slate-400) !important;
	cursor: not-allowed !important;
	opacity: 0.7 !important;
}

/* Placeholder */
input::placeholder,
textarea::placeholder {
	color: var(--flavor-slate-400) !important;
	font-style: normal !important;
}

/* Checkboxes and radios — slightly larger */
input[type="checkbox"],
input[type="radio"] {
	width: 16px !important;
	height: 16px !important;
	cursor: pointer !important;
	accent-color: var(--flavor-primary-500) !important;
	padding: 0 !important;
	border-radius: 3px !important;
}

/* Select2 dropdowns */
.select2-container .select2-selection {
	height: 40px !important;
	border: 1px solid #D1D5DB !important;
	border-radius: 6px !important;
	background-color: #FFFFFF !important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
	line-height: 40px !important;
	padding-left: 12px !important;
	color: var(--flavor-slate-700) !important;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
	height: 38px !important;
}
.select2-container--focus .select2-selection,
.select2-container--open .select2-selection {
	border-color: var(--flavor-primary-500) !important;
	box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15) !important;
}

/* Select2 dropdown panel */
.select2-dropdown {
	border-radius: 8px !important;
	border: 1px solid #E2E8F0 !important;
	box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05) !important;
	margin-top: 4px !important;
}
.select2-results__option--highlighted {
	background-color: var(--flavor-primary-500) !important;
	color: #FFFFFF !important;
}

/* Labels */
td.titlefield,
td.titlefieldcreate,
.fieldrequired,
label {
	font-size: 0.8125rem !important;
	font-weight: 500 !important;
	color: var(--flavor-slate-600) !important;
}
.fieldrequired {
	color: var(--flavor-slate-800) !important;
	font-weight: 600 !important;
}

/* Form record table — the 2-column field layout */
table.border td {
	padding: 10px 16px !important;
	border-bottom: 1px solid #F1F5F9 !important;
	border-right: none !important;
	border-left: none !important;
	border-top: none !important;
	vertical-align: middle !important;
}
table.border tr:last-child td {
	border-bottom: none !important;
}
table.border td.titlefield,
table.border td.titlefieldcreate {
	background-color: #F8FAFC !important;
	color: var(--flavor-slate-600) !important;
	font-weight: 500 !important;
	width: 25% !important;
	min-width: 180px !important;
}


/* ==========================================================================
   P3-5. BUTTONS
   .button, .butAction, .butActionDelete, .butActionRefused
   ========================================================================== */

/* Base button reset */
a.butAction,
a.butActionDelete,
a.butActionRefused,
a.button,
span.butAction,
span.butActionDelete,
span.butActionRefused,
.btn,
input.button,
input[type="submit"].button {
	display: inline-flex !important;
	align-items: center !important;
	justify-content: center !important;
	gap: 6px !important;
	padding: 9px 18px !important;
	font-size: 0.8125rem !important;
	font-weight: 500 !important;
	font-family: var(--flavor-font-family) !important;
	line-height: 1.4 !important;
	border-radius: 8px !important;
	cursor: pointer !important;
	text-decoration: none !important;
	transition: all 200ms ease !important;
	border: none !important;
	white-space: nowrap !important;
	letter-spacing: 0.01em !important;
}

/* Primary Action — Indigo */
a.butAction,
span.butAction,
input.button[type="submit"] {
	background: var(--flavor-primary-500) !important;
	background-color: var(--flavor-primary-500) !important;
	color: #FFFFFF !important;
	box-shadow: 0 1px 2px rgba(99, 102, 241, 0.3) !important;
}
a.butAction:hover,
span.butAction:hover,
input.button[type="submit"]:hover {
	background: var(--flavor-primary-600) !important;
	background-color: var(--flavor-primary-600) !important;
	color: #FFFFFF !important;
	box-shadow: 0 4px 6px rgba(99, 102, 241, 0.25) !important;
	transform: translateY(-1px) !important;
}
a.butAction:active,
span.butAction:active {
	transform: translateY(0) !important;
	box-shadow: 0 1px 2px rgba(99, 102, 241, 0.3) !important;
}

/* Delete/Danger Action — Red */
a.butActionDelete,
span.butActionDelete {
	background: #EF4444 !important;
	background-color: #EF4444 !important;
	color: #FFFFFF !important;
	box-shadow: 0 1px 2px rgba(239, 68, 68, 0.3) !important;
}
a.butActionDelete:hover,
span.butActionDelete:hover {
	background: #DC2626 !important;
	background-color: #DC2626 !important;
	color: #FFFFFF !important;
	box-shadow: 0 4px 6px rgba(239, 68, 68, 0.25) !important;
	transform: translateY(-1px) !important;
}

/* Refused/Disabled Action — Gray */
a.butActionRefused,
span.butActionRefused {
	background: #F1F5F9 !important;
	background-color: #F1F5F9 !important;
	color: var(--flavor-slate-400) !important;
	cursor: not-allowed !important;
	box-shadow: none !important;
	opacity: 0.8 !important;
}

/* Secondary / neutral .button — outlined style */
a.button,
input.button {
	background: #FFFFFF !important;
	background-color: #FFFFFF !important;
	color: var(--flavor-slate-700) !important;
	border: 1px solid #D1D5DB !important;
	box-shadow: 0 1px 2px rgba(0,0,0,0.05) !important;
}
a.button:hover,
input.button:hover {
	background: #F9FAFB !important;
	background-color: #F9FAFB !important;
	border-color: var(--flavor-slate-400) !important;
	color: var(--flavor-slate-900) !important;
}

/* Button group spacing */
div.tabsAction {
	padding: 16px 0 !important;
	margin: 0 !important;
	display: flex !important;
	flex-wrap: wrap !important;
	gap: 8px !important;
	justify-content: flex-end !important;
	border-top: 1px solid #F1F5F9 !important;
	background: transparent !important;
}


/* ==========================================================================
   P3-6. TABS (div.tabs, .tabTitle, .tabactive)
   ========================================================================== */

div.tabs,
div.tabBar div.tabs {
	background: transparent !important;
	border-bottom: 2px solid #E2E8F0 !important;
	padding: 0 !important;
	margin-bottom: 0 !important;
	display: flex !important;
	gap: 0 !important;
}

a.tab,
a.tabactive,
a.tabunactive {
	display: inline-flex !important;
	align-items: center !important;
	gap: 6px !important;
	padding: 10px 16px !important;
	font-size: 0.8125rem !important;
	font-weight: 500 !important;
	color: var(--flavor-slate-500) !important;
	text-decoration: none !important;
	border: none !important;
	border-bottom: 2px solid transparent !important;
	margin-bottom: -2px !important;
	transition: all 150ms ease !important;
	background: transparent !important;
	white-space: nowrap !important;
}

a.tab:hover,
a.tabunactive:hover {
	color: var(--flavor-slate-700) !important;
	border-bottom-color: var(--flavor-slate-300) !important;
}

a.tabactive {
	color: var(--flavor-primary-600) !important;
	border-bottom-color: var(--flavor-primary-500) !important;
	font-weight: 600 !important;
}

/* Tab with title */
.tabTitle {
	display: inline-flex !important;
	align-items: center !important;
	padding: 10px 16px !important;
	font-size: 1rem !important;
	font-weight: 600 !important;
	color: var(--flavor-slate-900) !important;
}


/* ==========================================================================
   P3-7. INFO BOXES & BADGES
   ========================================================================== */

/* Info boxes (dashboard cards) */
div.info-box {
	border-radius: 12px !important;
	border: 1px solid #F1F5F9 !important;
	box-shadow: 0 1px 3px rgba(0,0,0,0.06) !important;
	background: #FFFFFF !important;
	transition: box-shadow 200ms ease, transform 200ms ease !important;
}
div.info-box:hover {
	box-shadow: 0 4px 12px rgba(0,0,0,0.08) !important;
	transform: translateY(-2px) !important;
}
.info-box-content {
	padding: 12px 16px !important;
}
.info-box-text {
	text-transform: uppercase !important;
	font-size: 0.6875rem !important;
	font-weight: 600 !important;
	letter-spacing: 0.05em !important;
	color: var(--flavor-slate-500) !important;
}
.info-box-number {
	font-size: 1.375rem !important;
	font-weight: 700 !important;
	color: var(--flavor-slate-900) !important;
}

/* Badges */
.badge {
	display: inline-flex !important;
	align-items: center !important;
	padding: 3px 10px !important;
	font-size: 0.6875rem !important;
	font-weight: 600 !important;
	border-radius: 999px !important;
	letter-spacing: 0.02em !important;
	white-space: nowrap !important;
	line-height: 1.4 !important;
}


/* ==========================================================================
   P3-8. BREADCRUMBS & MISC
   ========================================================================== */

/* Breadcrumb */
div.titre {
	font-size: 1.25rem !important;
	font-weight: 600 !important;
	color: var(--flavor-slate-900) !important;
	padding: 4px 0 !important;
}

/* Pagination */
.pagination a,
.paginationafterarrows a {
	display: inline-flex !important;
	align-items: center !important;
	justify-content: center !important;
	min-width: 32px !important;
	height: 32px !important;
	padding: 0 8px !important;
	border-radius: 6px !important;
	font-size: 0.8125rem !important;
	color: var(--flavor-slate-600) !important;
	text-decoration: none !important;
	transition: background 150ms ease !important;
}
.pagination a:hover {
	background: #F1F5F9 !important;
	color: var(--flavor-primary-600) !important;
}

/* Warning/Info boxes */
div.warning,
div.info {
	border-radius: 8px !important;
	padding: 12px 16px !important;
	font-size: 0.8125rem !important;
	margin-bottom: 12px !important;
}

/* Tooltips */
.classfortooltip {
	cursor: help !important;
}

/* Scrollable tables on small screens */
@media only screen and (max-width: 1200px) {
	table.noborder,
	table.liste {
		display: block !important;
		overflow-x: auto !important;
		-webkit-overflow-scrolling: touch !important;
	}
}


/* ============================================================================== */
/*                                                                                */
/*   PHASE 3.1 — HOTFIXES (Button contrast, Select2, Form labels)                */
/*   Overrides that fix regressions from Phase 3.                                 */
/*                                                                                */
/* ============================================================================== */


/* ==========================================================================
   H3-1. BUTTON CONTRAST FIX
   ========================================================================== */

/* Primary: Indigo bg + white text — absolute override */
a.butAction,
span.butAction,
a.butAction:link,
a.butAction:visited,
div.tabsAction a.butAction {
	background: #6366F1 !important;
	background-color: #6366F1 !important;
	color: #FFFFFF !important;
	border: 1px solid #6366F1 !important;
}
a.butAction:hover,
span.butAction:hover,
div.tabsAction a.butAction:hover {
	background: #4F46E5 !important;
	background-color: #4F46E5 !important;
	color: #FFFFFF !important;
	border-color: #4F46E5 !important;
}

/* Cancel button */
a.butActionCancel,
span.butActionCancel,
a.butActionCancel:link,
a.butActionCancel:visited {
	background: #FFFFFF !important;
	background-color: #FFFFFF !important;
	color: var(--flavor-slate-700) !important;
	border: 1px solid #D1D5DB !important;
	display: inline-flex !important;
	align-items: center !important;
	justify-content: center !important;
	padding: 9px 18px !important;
	font-size: 0.8125rem !important;
	font-weight: 500 !important;
	border-radius: 8px !important;
	cursor: pointer !important;
	text-decoration: none !important;
	transition: all 200ms ease !important;
}
a.butActionCancel:hover,
span.butActionCancel:hover {
	background: #F9FAFB !important;
	background-color: #F9FAFB !important;
	border-color: #9CA3AF !important;
	color: var(--flavor-slate-900) !important;
}

/* Generic .button — secondary outlined */
a.button,
a.button:link,
a.button:visited,
input.button,
input[type="submit"].button {
	background: #FFFFFF !important;
	background-color: #FFFFFF !important;
	color: var(--flavor-slate-700) !important;
	border: 1px solid #D1D5DB !important;
}
a.button:hover,
input.button:hover {
	background: #F9FAFB !important;
	background-color: #F9FAFB !important;
	border-color: #9CA3AF !important;
	color: var(--flavor-slate-900) !important;
}

/* Delete: Red contrast */
a.butActionDelete,
a.butActionDelete:link,
a.butActionDelete:visited,
span.butActionDelete {
	background: #EF4444 !important;
	background-color: #EF4444 !important;
	color: #FFFFFF !important;
	border: 1px solid #EF4444 !important;
}
a.butActionDelete:hover,
span.butActionDelete:hover {
	background: #DC2626 !important;
	background-color: #DC2626 !important;
	border-color: #DC2626 !important;
}

/* Refused/Disabled */
a.butActionRefused,
span.butActionRefused {
	background: #F1F5F9 !important;
	background-color: #F1F5F9 !important;
	color: #94A3B8 !important;
	border: 1px solid #E2E8F0 !important;
	cursor: not-allowed !important;
}

/* Submit inputs without .button class */
input[type="submit"]:not(.button) {
	background: #6366F1 !important;
	background-color: #6366F1 !important;
	color: #FFFFFF !important;
	border: 1px solid #6366F1 !important;
	padding: 9px 18px !important;
	font-size: 0.8125rem !important;
	font-weight: 500 !important;
	border-radius: 8px !important;
	cursor: pointer !important;
	transition: all 200ms ease !important;
}
input[type="submit"]:not(.button):hover {
	background: #4F46E5 !important;
	background-color: #4F46E5 !important;
	border-color: #4F46E5 !important;
}


/* ==========================================================================
   H3-2. SELECT2 FIX
   ========================================================================== */

/* Single select container */
.select2-container--default .select2-selection--single {
	height: 40px !important;
	border: 1px solid #D1D5DB !important;
	border-radius: 6px !important;
	background-color: #FFFFFF !important;
	display: flex !important;
	align-items: center !important;
}

/* Rendered value — DARK and readable */
.select2-container--default .select2-selection--single .select2-selection__rendered {
	color: var(--flavor-slate-900) !important;
	line-height: normal !important;
	padding-left: 12px !important;
	padding-right: 28px !important;
}

/* Placeholder */
.select2-container--default .select2-selection--single .select2-selection__placeholder {
	color: var(--flavor-slate-400) !important;
}

/* Arrow */
.select2-container--default .select2-selection--single .select2-selection__arrow {
	height: 38px !important;
	right: 4px !important;
}

/* Multi-select */
.select2-container--default .select2-selection--multiple {
	min-height: 40px !important;
	border: 1px solid #D1D5DB !important;
	border-radius: 6px !important;
	background-color: #FFFFFF !important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
	background-color: #EEF2FF !important;
	border: 1px solid #C7D2FE !important;
	border-radius: 4px !important;
	color: var(--flavor-slate-700) !important;
}

/* Focus/Open state */
.select2-container--default.select2-container--focus .select2-selection,
.select2-container--default.select2-container--open .select2-selection--single,
.select2-container--default.select2-container--open .select2-selection--multiple {
	border-color: #6366F1 !important;
	box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15) !important;
	outline: none !important;
}

/* Dropdown panel */
.select2-dropdown {
	border: 1px solid #E2E8F0 !important;
	border-radius: 8px !important;
	box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05) !important;
	background-color: #FFFFFF !important;
	z-index: 99999 !important;
}

/* Search field INSIDE dropdown — CRITICAL FIX: text must be visible */
.select2-container--default .select2-search--dropdown .select2-search__field,
.select2-search__field,
.select2-search input[type="search"],
.select2-search input {
	color: var(--flavor-slate-900) !important;
	background-color: #FFFFFF !important;
	border: 1px solid #D1D5DB !important;
	border-radius: 6px !important;
	padding: 8px 12px !important;
	font-size: 0.875rem !important;
	height: 36px !important;
	outline: none !important;
	width: 100% !important;
	box-sizing: border-box !important;
}
.select2-container--default .select2-search--dropdown .select2-search__field:focus {
	border-color: #6366F1 !important;
	box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.15) !important;
}

/* Dropdown result items */
.select2-results__option {
	padding: 8px 12px !important;
	font-size: 0.8125rem !important;
	color: var(--flavor-slate-700) !important;
}
.select2-container--default .select2-results__option--highlighted[aria-selected],
.select2-container--default .select2-results__option--highlighted {
	background-color: #6366F1 !important;
	color: #FFFFFF !important;
}
.select2-container--default .select2-results__option[aria-selected="true"] {
	background-color: #EEF2FF !important;
	color: var(--flavor-slate-900) !important;
}

/* Select2 hidden accessible — don't style the invisible native select */
.select2-hidden-accessible {
	height: 1px !important;
	padding: 0 !important;
	border: none !important;
	overflow: hidden !important;
}


/* ==========================================================================
   H3-3. FORM TABLE LABEL CONTRAST
   ========================================================================== */

/* First cell = label column — light gray bg */
table.border > tbody > tr > td:first-child,
table.border > tbody > tr > td.titlefield,
table.border > tbody > tr > td.titlefieldcreate,
table.border tr td:first-child {
	background-color: #F8FAFC !important;
	color: var(--flavor-slate-700) !important;
	font-weight: 500 !important;
	font-size: 0.8125rem !important;
	width: 25% !important;
	min-width: 160px !important;
	border-right: 1px solid #F1F5F9 !important;
	vertical-align: top !important;
	padding: 12px 16px !important;
}

/* Value column — stays white */
table.border > tbody > tr > td:nth-child(2),
table.border tr td.valuefield {
	background-color: #FFFFFF !important;
	color: var(--flavor-slate-900) !important;
	padding: 10px 16px !important;
}

/* Row separators */
table.border > tbody > tr > td {
	border-bottom: 1px solid #F1F5F9 !important;
}
table.border > tbody > tr:last-child > td {
	border-bottom: none !important;
}

/* Sidebar native selects */
#id-left select,
.vmenu select,
.side-nav select {
	height: 32px !important;
	background-color: rgba(255,255,255,0.06) !important;
	color: #E2E8F0 !important;
	border: 1px solid rgba(255,255,255,0.1) !important;
	border-radius: 6px !important;
	font-size: 0.8125rem !important;
}


/* ============================================================================== */
/*                                                                                */
/*   PHASE 3.2 — AJUSTES FINOS (Ghost Buttons + Compact Filters)                 */
/*                                                                                */
/* ============================================================================== */


/* ==========================================================================
   H3-4. GHOST BUTTON FIX — Force Indigo on ALL submit/primary states
   ========================================================================== */

/* Submit buttons & .butAction — ALWAYS Indigo */
input[type="submit"].button,
input[type="submit"],
.butAction,
a.butAction,
span.butAction {
	background-color: #6366F1 !important;
	background: #6366F1 !important;
	color: #FFFFFF !important;
	border: none !important;
	transition: all 0.2s ease !important;
}

input[type="submit"].button:hover,
input[type="submit"].button:focus,
input[type="submit"]:hover,
input[type="submit"]:focus,
.butAction:hover,
.butAction:focus,
a.butAction:hover,
a.butAction:focus,
span.butAction:hover,
span.butAction:focus {
	background-color: #4F46E5 !important;
	background: #4F46E5 !important;
	color: #FFFFFF !important;
	box-shadow: 0 4px 6px -1px rgba(99, 102, 241, 0.4) !important;
	border: none !important;
}

/* Cancel button — always outlined white */
.button[name="cancel"],
a.butActionCancel,
span.butActionCancel {
	background-color: #FFFFFF !important;
	background: #FFFFFF !important;
	color: var(--flavor-slate-700) !important;
	border: 1px solid #D1D5DB !important;
}
.button[name="cancel"]:hover,
.button[name="cancel"]:focus,
a.butActionCancel:hover,
a.butActionCancel:focus,
span.butActionCancel:hover,
span.butActionCancel:focus {
	background-color: #F3F4F6 !important;
	background: #F3F4F6 !important;
	color: var(--flavor-slate-900) !important;
	border: 1px solid #9CA3AF !important;
	box-shadow: none !important;
}


/* ==========================================================================
   H3-5. COMPACT TABLE FILTER INPUTS
   Restore smaller inputs inside .liste_titre (From/To date filters, etc.)
   ========================================================================== */

tr.liste_titre input[type="text"],
tr.liste_titre input[type="date"],
tr.liste_titre input[type="number"],
tr.liste_titre select,
tr.liste_titre_filter input[type="text"],
tr.liste_titre_filter input[type="date"],
tr.liste_titre_filter input[type="number"],
tr.liste_titre_filter select {
	height: 32px !important;
	padding: 0 8px !important;
	font-size: 0.8125rem !important;
	border-radius: 5px !important;
}

/* Date wrapper (From/To) — flex side by side */
tr.liste_titre .nowrap,
tr.liste_titre_filter .nowrap {
	display: flex !important;
	align-items: center !important;
	gap: 4px !important;
	flex-wrap: wrap !important;
}

/* Compact Select2 in table filter rows */
tr.liste_titre .select2-container .select2-selection--single,
tr.liste_titre_filter .select2-container .select2-selection--single {
	height: 32px !important;
	min-height: 32px !important;
}
tr.liste_titre .select2-container .select2-selection--single .select2-selection__rendered,
tr.liste_titre_filter .select2-container .select2-selection--single .select2-selection__rendered {
	line-height: 30px !important;
	font-size: 0.8125rem !important;
}


/* ============================================================================== */
/*                                                                                */
/*   PHASE 4 — UX POLISH (Toasts, Dashboard Boxes, Modals)                       */
/*   Modern SaaS feel for dynamic UI elements.                                    */
/*                                                                                */
/* ============================================================================== */


/* ==========================================================================
   P4-1. TOAST & BANNER NOTIFICATIONS
   div.ok / div.error / div.warning → Floating toasts (temporary feedback)
   div.info → Inline banner (persistent info, stays in content flow)
   ========================================================================== */

/* Keyframe animation */
@keyframes flavorSlideInRight {
	0% {
		opacity: 0;
		transform: translateX(80px);
	}
	100% {
		opacity: 1;
		transform: translateX(0);
	}
}
@keyframes flavorFadeIn {
	0%   { opacity: 0; transform: translateY(-8px); }
	100% { opacity: 1; transform: translateY(0); }
}

/* ---- FLOATING TOASTS (div.ok, div.error, div.warning) ---- */
div.ok,
div.error,
div.warning {
	position: fixed !important;
	top: 72px !important;
	right: 24px !important;
	left: auto !important;
	z-index: 99999 !important;
	width: auto !important;
	max-width: 420px !important;
	min-width: 280px !important;
	background: #FFFFFF !important;
	background-color: #FFFFFF !important;
	border-radius: 10px !important;
	padding: 14px 18px 14px 22px !important;
	box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.12), 0 4px 6px -2px rgba(0, 0, 0, 0.06) !important;
	border: 1px solid #F1F5F9 !important;
	border-left: 4px solid #94A3B8 !important;
	color: var(--flavor-slate-700) !important;
	font-size: 0.875rem !important;
	line-height: 1.5 !important;
	animation: flavorSlideInRight 0.35s ease-out !important;
}

/* Success toast — green left border */
div.ok {
	border-left-color: #22C55E !important;
}
div.ok::before {
	content: '✓' !important;
	display: inline-flex !important;
	align-items: center !important;
	justify-content: center !important;
	width: 22px !important;
	height: 22px !important;
	background: #DCFCE7 !important;
	color: #16A34A !important;
	border-radius: 50% !important;
	font-size: 0.75rem !important;
	font-weight: 700 !important;
	margin-right: 10px !important;
	flex-shrink: 0 !important;
	float: left !important;
}

/* Error toast — red left border */
div.error {
	border-left-color: #EF4444 !important;
}
div.error::before {
	content: '✕' !important;
	display: inline-flex !important;
	align-items: center !important;
	justify-content: center !important;
	width: 22px !important;
	height: 22px !important;
	background: #FEE2E2 !important;
	color: #DC2626 !important;
	border-radius: 50% !important;
	font-size: 0.75rem !important;
	font-weight: 700 !important;
	margin-right: 10px !important;
	flex-shrink: 0 !important;
	float: left !important;
}

/* Warning toast — amber left border */
div.warning {
	border-left-color: #F59E0B !important;
}
div.warning::before {
	content: '!' !important;
	display: inline-flex !important;
	align-items: center !important;
	justify-content: center !important;
	width: 22px !important;
	height: 22px !important;
	background: #FEF3C7 !important;
	color: #D97706 !important;
	border-radius: 50% !important;
	font-size: 0.75rem !important;
	font-weight: 700 !important;
	margin-right: 10px !important;
	flex-shrink: 0 !important;
	float: left !important;
}

/* Stack multiple toasts */
div.ok + div.ok,
div.ok + div.error,
div.ok + div.warning,
div.error + div.ok,
div.error + div.error,
div.error + div.warning,
div.warning + div.ok,
div.warning + div.error,
div.warning + div.warning {
	top: 140px !important;
}

/* Toast links */
div.ok a,
div.error a,
div.warning a {
	color: var(--flavor-primary-600) !important;
	font-weight: 500 !important;
	text-decoration: underline !important;
}

/* ---- INLINE INFO BANNER (div.info) ---- */
/* Modern glass-morphism card that stays in content flow */
div.info {
	position: relative !important;
	top: auto !important;
	right: auto !important;
	left: auto !important;
	z-index: auto !important;
	display: flex !important;
	align-items: flex-start !important;
	gap: 12px !important;
	width: auto !important;
	max-width: 100% !important;
	min-width: auto !important;
	background: linear-gradient(135deg, rgba(59, 130, 246, 0.06) 0%, rgba(99, 102, 241, 0.04) 100%) !important;
	background-color: transparent !important;
	border: 1px solid rgba(59, 130, 246, 0.15) !important;
	border-left: 4px solid #3B82F6 !important;
	border-radius: 10px !important;
	padding: 14px 18px !important;
	margin: 0 0 16px 0 !important;
	color: var(--flavor-slate-600) !important;
	font-size: 0.8125rem !important;
	line-height: 1.6 !important;
	box-shadow: 0 1px 3px rgba(59, 130, 246, 0.08) !important;
	animation: flavorFadeIn 0.3s ease-out !important;
}
div.info::before {
	content: 'ℹ' !important;
	display: inline-flex !important;
	align-items: center !important;
	justify-content: center !important;
	width: 24px !important;
	min-width: 24px !important;
	height: 24px !important;
	background: rgba(59, 130, 246, 0.12) !important;
	color: #2563EB !important;
	border-radius: 50% !important;
	font-size: 0.8rem !important;
	font-weight: 700 !important;
	flex-shrink: 0 !important;
	float: left !important;
	margin-top: 1px !important;
}
div.info a {
	color: #2563EB !important;
	font-weight: 500 !important;
	text-decoration: none !important;
	border-bottom: 1px dashed rgba(37, 99, 235, 0.4) !important;
	transition: border-color 200ms ease !important;
}
div.info a:hover {
	border-bottom-color: #2563EB !important;
}

/* Responsive: on small screens, toasts take full width */
@media only screen and (max-width: 768px) {
	div.ok,
	div.error,
	div.warning {
		right: 8px !important;
		left: 8px !important;
		max-width: calc(100vw - 16px) !important;
		top: 56px !important;
	}
}


/* ==========================================================================
   P4-2. DASHBOARD BOXES (.box, .boxhead, .boxbody)
   ========================================================================== */

/* Box container — white card */
div.box,
.box {
	background: #FFFFFF !important;
	background-color: #FFFFFF !important;
	border-radius: 12px !important;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06), 0 1px 2px rgba(0, 0, 0, 0.04) !important;
	border: 1px solid #F1F5F9 !important;
	margin-bottom: 20px !important;
	overflow: hidden !important;
}

/* Box header */
tr.boxhead td,
.boxhead,
.liste_titre.box_titre {
	background: transparent !important;
	background-color: transparent !important;
	background-image: none !important;
	border-bottom: 1px solid #E2E8F0 !important;
	border-top: none !important;
	border-left: none !important;
	border-right: none !important;
	padding: 14px 16px !important;
	font-weight: 600 !important;
	font-size: 0.8125rem !important;
	color: var(--flavor-slate-900) !important;
	text-transform: none !important;
	letter-spacing: normal !important;
}

/* Box header title text */
.boxhead a.valignmiddle,
tr.boxhead a,
.box_titre a {
	color: var(--flavor-slate-900) !important;
	font-weight: 600 !important;
	font-size: 0.875rem !important;
	text-decoration: none !important;
}
.boxhead a.valignmiddle:hover,
tr.boxhead a:hover,
.box_titre a:hover {
	color: var(--flavor-primary-600) !important;
}

/* Box header icons — drag/close */
.boxhead .imglt,
.boxhead .imgrt,
.boxhead img,
tr.boxhead img {
	filter: none !important;
	opacity: 0.4 !important;
	transition: opacity 150ms ease !important;
}
.boxhead:hover .imglt,
.boxhead:hover .imgrt,
.boxhead:hover img,
tr.boxhead:hover img {
	opacity: 0.7 !important;
}

/* Box body */
.boxbody,
div.boxcontent {
	padding: 0 !important;
}

/* Box table rows */
.box tr.oddeven td,
.box tr.impair td,
.box tr.pair td {
	padding: 10px 16px !important;
	font-size: 0.8125rem !important;
	border-bottom: 1px solid #F8FAFC !important;
}
.box tr.oddeven:hover,
.box tr.impair:hover,
.box tr.pair:hover {
	background-color: #FAFBFD !important;
}

/* Box footer / "show more" link */
.box tr.liste_total td,
.box .tdoverflowmax200 {
	padding: 10px 16px !important;
}

/* Remove old box gradients */
.fichehalfright .box,
.fichehalfleft .box {
	box-shadow: none !important;
	border: 1px solid #F1F5F9 !important;
}


/* ==========================================================================
   P4-3. JQUERY UI DIALOGS (Modals)
   Override jQuery UI's default ugly theme.
   ========================================================================== */

/* Overlay — dark glassmorphism */
.ui-widget-overlay {
	background: rgba(15, 23, 42, 0.55) !important;
	backdrop-filter: blur(4px) !important;
	-webkit-backdrop-filter: blur(4px) !important;
	opacity: 1 !important;
	position: fixed !important;
	top: 0 !important;
	left: 0 !important;
	right: 0 !important;
	bottom: 0 !important;
	z-index: 10000 !important;
}

/* Dialog box */
.ui-dialog {
	border-radius: 16px !important;
	border: none !important;
	box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25) !important;
	padding: 0 !important;
	overflow: hidden !important;
	background: #FFFFFF !important;
	z-index: 10001 !important;
}

/* Dialog title bar */
.ui-dialog .ui-dialog-titlebar {
	background: #FFFFFF !important;
	background-color: #FFFFFF !important;
	background-image: none !important;
	border: none !important;
	border-bottom: 1px solid #F1F5F9 !important;
	border-radius: 16px 16px 0 0 !important;
	padding: 16px 20px !important;
	font-weight: 600 !important;
	color: var(--flavor-slate-900) !important;
}

/* Dialog title text */
.ui-dialog .ui-dialog-title {
	font-size: 1rem !important;
	font-weight: 600 !important;
	color: var(--flavor-slate-900) !important;
	font-family: var(--flavor-font-family) !important;
}

/* Close button */
.ui-dialog .ui-dialog-titlebar-close {
	background: transparent !important;
	border: none !important;
	border-radius: 8px !important;
	width: 32px !important;
	height: 32px !important;
	top: 50% !important;
	right: 12px !important;
	margin-top: -16px !important;
	cursor: pointer !important;
	transition: background 150ms ease !important;
	display: flex !important;
	align-items: center !important;
	justify-content: center !important;
}
.ui-dialog .ui-dialog-titlebar-close:hover {
	background: #F1F5F9 !important;
}
.ui-dialog .ui-dialog-titlebar-close .ui-icon {
	filter: none !important;
}

/* Dialog content area */
.ui-dialog .ui-dialog-content {
	padding: 20px 24px !important;
	font-size: 0.875rem !important;
	color: var(--flavor-slate-700) !important;
	line-height: 1.6 !important;
	background: #FFFFFF !important;
}

/* Dialog button pane (bottom) */
.ui-dialog .ui-dialog-buttonpane {
	background: #F8FAFC !important;
	border-top: 1px solid #F1F5F9 !important;
	padding: 12px 20px !important;
	margin: 0 !important;
	border-radius: 0 0 16px 16px !important;
}

/* Dialog buttons */
.ui-dialog .ui-dialog-buttonpane button,
.ui-dialog .ui-dialog-buttonpane .ui-button {
	background: #6366F1 !important;
	color: #FFFFFF !important;
	border: none !important;
	border-radius: 8px !important;
	padding: 8px 18px !important;
	font-size: 0.8125rem !important;
	font-weight: 500 !important;
	cursor: pointer !important;
	transition: all 200ms ease !important;
	font-family: var(--flavor-font-family) !important;
}
.ui-dialog .ui-dialog-buttonpane button:hover,
.ui-dialog .ui-dialog-buttonpane .ui-button:hover {
	background: #4F46E5 !important;
	box-shadow: 0 4px 6px rgba(99, 102, 241, 0.25) !important;
}

/* Secondary dialog button (usually Cancel) */
.ui-dialog .ui-dialog-buttonpane button:last-child {
	background: #FFFFFF !important;
	color: var(--flavor-slate-700) !important;
	border: 1px solid #D1D5DB !important;
}
.ui-dialog .ui-dialog-buttonpane button:last-child:hover {
	background: #F3F4F6 !important;
	box-shadow: none !important;
}

/* Remove all jQuery UI widget nonsense */
.ui-widget {
	font-family: var(--flavor-font-family) !important;
}
.ui-widget-header {
	border: none !important;
	background: transparent !important;
}
.ui-widget-content {
	border: none !important;
}
.ui-corner-all {
	border-radius: 8px !important;
}


/* ==========================================================================
   P4-4. PROGRESS BARS & STATUS INDICATORS
   ========================================================================== */

/* Progress bar */
.progress {
	background-color: #F1F5F9 !important;
	border-radius: 999px !important;
	overflow: hidden !important;
	height: 8px !important;
}
.progress-bar,
.progress .bar {
	background: linear-gradient(90deg, #6366F1, #818CF8) !important;
	border-radius: 999px !important;
	height: 100% !important;
	transition: width 0.6s ease !important;
}

/* Status dot indicators */
.status4,
.status5,
.status6 {
	font-weight: 600 !important;
}

/* Refine the "Enabled" / "Activated" badges */
.badge-status4,
.badge-status5,
.badge-status6 {
	border-radius: 999px !important;
	padding: 2px 10px !important;
	font-size: 0.6875rem !important;
	font-weight: 600 !important;
}


/* ==========================================================================
   H3-6. CANCEL BUTTON — ABSOLUTE PRIORITY FIX
   Must come LAST to override the global input[type="submit"] Indigo rule.
   Doubled selectors for maximum specificity.
   ========================================================================== */

input[type="submit"][name="cancel"],
input[type="submit"].button[name="cancel"],
input.button[name="cancel"],
input[type="submit"][value="Cancel"],
input[type="submit"].butActionCancel,
a.butActionCancel,
a.butActionCancel:link,
a.butActionCancel:visited,
span.butActionCancel {
	background: #FFFFFF !important;
	background-color: #FFFFFF !important;
	color: var(--flavor-slate-700) !important;
	border: 1px solid #D1D5DB !important;
	box-shadow: 0 1px 2px rgba(0,0,0,0.05) !important;
}

input[type="submit"][name="cancel"]:hover,
input[type="submit"][name="cancel"]:focus,
input[type="submit"].button[name="cancel"]:hover,
input[type="submit"].button[name="cancel"]:focus,
input.button[name="cancel"]:hover,
input[type="submit"][value="Cancel"]:hover,
input[type="submit"][value="Cancel"]:focus,
input[type="submit"].butActionCancel:hover,
a.butActionCancel:hover,
a.butActionCancel:focus,
span.butActionCancel:hover {
	background: #F3F4F6 !important;
	background-color: #F3F4F6 !important;
	color: var(--flavor-slate-900) !important;
	border: 1px solid #9CA3AF !important;
	box-shadow: none !important;
	transform: none !important;
}


/* ==========================================================================
   P4-5. TOOLTIP / POPOVER MODERN DESIGN
   Fix dark-on-dark contrast bug + give tooltips a clean SaaS look.
   ========================================================================== */

/* Tooltip animation */
@keyframes flavorTooltipFadeIn {
	0%   { opacity: 0; transform: translateY(4px); }
	100% { opacity: 1; transform: translateY(0); }
}

/* jQuery UI Tooltip — main container */
.ui-tooltip,
div.ui-tooltip,
.ui-widget.ui-tooltip,
.ui-tooltip.ui-widget-content {
	background: #FFFFFF !important;
	background-color: #FFFFFF !important;
	color: var(--flavor-slate-700) !important;
	border: 1px solid #E2E8F0 !important;
	border-radius: 10px !important;
	padding: 0 !important;
	box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1),
	            0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
	font-family: var(--flavor-font-family) !important;
	font-size: 0.8125rem !important;
	line-height: 1.55 !important;
	max-width: 380px !important;
	z-index: 99999 !important;
	animation: flavorTooltipFadeIn 0.2s ease-out !important;
	opacity: 1 !important;
}

/* Tooltip content wrapper */
.ui-tooltip .ui-tooltip-content,
.ui-tooltip-content {
	background: transparent !important;
	background-color: transparent !important;
	color: var(--flavor-slate-600) !important;
	padding: 12px 16px !important;
	font-size: 0.8125rem !important;
	line-height: 1.55 !important;
	border: none !important;
}

/* Dolibarr "mytooltip" variant */
.ui-tooltip.mytooltip,
div.ui-tooltip.mytooltip {
	background: #FFFFFF !important;
	background-color: #FFFFFF !important;
	color: var(--flavor-slate-700) !important;
	border: 1px solid #E2E8F0 !important;
}
.ui-tooltip.mytooltip .ui-tooltip-content {
	color: var(--flavor-slate-600) !important;
	background: transparent !important;
}

/* Bold text inside tooltips */
.ui-tooltip b,
.ui-tooltip strong,
.ui-tooltip-content b,
.ui-tooltip-content strong {
	color: var(--flavor-slate-900) !important;
	font-weight: 600 !important;
}

/* Links inside tooltips */
.ui-tooltip a,
.ui-tooltip-content a {
	color: var(--flavor-primary-500) !important;
	text-decoration: underline !important;
}

/* ---- Dolibarr native classfortooltip / classtooltip ---- */
.classfortooltip[title],
.classtooltip[title],
span.classfortooltip,
img.classfortooltip {
	cursor: help !important;
}

/* Override the CSS custom property so all Dolibarr code using it gets the fix */
:root {
	--tooltipbgcolor: #FFFFFF;
	--tooltipfontcolor: #475569;
}

/* Ensure no dark background leaks into tooltip from .ui-widget-content */
.ui-widget-content.ui-tooltip,
.ui-corner-all.ui-tooltip {
	background: #FFFFFF !important;
	color: var(--flavor-slate-700) !important;
}


/* ==========================================================================
   PHASE 4.2 — Modal / Dialog Z-Index Fix
   jQuery UI dialogs and Dolibarr confirmation modals must appear above
   all themed elements (sidebar, topbar, content cards).
   The overlay and dialog use extreme z-index to beat everything.
   ========================================================================== */

/* jQuery UI overlay — full-screen dark background */
.ui-widget-overlay {
	z-index: 999999 !important;
	background: rgba(15, 23, 42, 0.6) !important;
	position: fixed !important;
	top: 0 !important;
	left: 0 !important;
	right: 0 !important;
	bottom: 0 !important;
	width: 100vw !important;
	height: 100vh !important;
}

/* jQuery UI dialog — match exact base theme selector for specificity war */
.ui-dialog,
.ui-dialog.ui-corner-all.ui-widget.ui-widget-content.ui-front.ui-draggable,
.ui-dialog.highlight.ui-widget.ui-widget-content.ui-front {
	z-index: 1000000 !important;
	border-radius: 12px !important;
	box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35) !important;
	border: none !important;
	background: #fff !important;
}

.ui-dialog .ui-dialog-titlebar {
	background: transparent !important;
	border: none !important;
	border-bottom: 1px solid var(--flavor-slate-200) !important;
	border-radius: 12px 12px 0 0 !important;
	padding: 16px 20px !important;
	font-weight: 600 !important;
	color: var(--flavor-slate-900) !important;
}

.ui-dialog .ui-dialog-content {
	padding: 20px !important;
	overflow-y: auto !important;
}

.ui-dialog .ui-dialog-buttonpane {
	border-top: 1px solid var(--flavor-slate-200) !important;
	padding: 12px 20px !important;
	background: var(--flavor-slate-50) !important;
	border-radius: 0 0 12px 12px !important;
}

/* Force close button visible and clickable */
.ui-dialog .ui-dialog-titlebar-close {
	z-index: 1000001 !important;
}


/* ============================================================================== */
/*                                                                                */
/*   PHASE 4.1.3 — SNIPER CSS (Precision Title, Icon, Compact Submenu)            */
/*                                                                                */
/* ============================================================================== */


/* ==========================================================================
   SNIPER 1. TITLE — Clean In-Content Styling
   position:fixed fails due to CSS stacking contexts on parent elements.
   Style the title cleanly in its natural flow position instead.
   ========================================================================== */

/* 1.1 Style the page title table — unified card top (matches card containers below) */
table.centpercent.notopnoleftnoright.table-fiche-title,
table.table-fiche-title {
	background: #FFFFFF !important;
	padding: 20px 24px !important;
	margin: 12px 0 0 0 !important;
	border: 1px solid #F1F5F9 !important;
	border-bottom: none !important;
	box-shadow: none !important;
	border-collapse: separate !important;
	border-spacing: 0 !important;
	border-radius: 12px 12px 0 0 !important;
}

/* 1.1b Time/hour selects — ensure visible dark text */
select.flat.valignmiddle.maxwidth50,
select[class*="1hour"],
select[class*="1min"],
select[id$="hour"],
select[id$="min"] {
	color: #1E293B !important;
	background-color: #FFFFFF !important;
	border: 1px solid #D1D5DB !important;
	border-radius: 8px !important;
	padding: 4px 8px !important;
	font-size: 0.9rem !important;
	font-weight: 500 !important;
	-webkit-appearance: auto !important;
	appearance: auto !important;
}
select.flat.valignmiddle.maxwidth50 option,
select[class*="1hour"] option,
select[class*="1min"] option,
select[id$="hour"] option,
select[id$="min"] option {
	color: #1E293B !important;
	background-color: #FFFFFF !important;
}

/* 1.1d Custom checkboxes inside badges (Prospect/Customer/Vendor) */
input.checkforselect {
	-webkit-appearance: none !important;
	appearance: none !important;
	width: 18px !important;
	height: 18px !important;
	border: 2px solid rgba(255, 255, 255, 0.7) !important;
	border-radius: 4px !important;
	background-color: rgba(255, 255, 255, 0.2) !important;
	cursor: pointer !important;
	position: relative !important;
	vertical-align: middle !important;
	margin-left: 6px !important;
	transition: all 0.15s ease !important;
}
input.checkforselect:checked {
	background-color: rgba(255, 255, 255, 0.95) !important;
	border-color: rgba(255, 255, 255, 1) !important;
}
input.checkforselect:checked::after {
	content: '✓' !important;
	position: absolute !important;
	top: 50% !important;
	left: 50% !important;
	transform: translate(-50%, -50%) !important;
	font-size: 13px !important;
	font-weight: 700 !important;
	color: #059669 !important;
	line-height: 1 !important;
}
/* Badges wrapper */
span.spannature {
	padding: 6px 10px !important;
	border-radius: 6px !important;
	font-size: 0.85rem !important;
	font-weight: 600 !important;
	display: inline-flex !important;
	align-items: center !important;
	gap: 4px !important;
}

/* 1.1e Top bar icons — colorful accents on WHITE topbar */

/* Star/Bookmark icon — golden amber */
.login_block a .fa-star,
#topmenu-bookmark-dropdown .fa-star {
	color: #D97706 !important;
	transition: all 0.2s ease !important;
}
.login_block a:hover .fa-star,
#topmenu-bookmark-dropdown:hover .fa-star {
	color: #F59E0B !important;
}

/* Printer icon — indigo blue */
.login_block a .fa-print,
.login_block .fa-print {
	color: #4F46E5 !important;
	transition: all 0.2s ease !important;
}
.login_block a:hover .fa-print {
	color: #6366F1 !important;
}

/* Help/question icon — teal */
.login_block a .fa-question-circle,
.login_block .fa-question-circle,
.login_block a .fa-question,
.login_block .fa-info-circle {
	color: #0D9488 !important;
	transition: all 0.2s ease !important;
}
.login_block a:hover .fa-question-circle,
.login_block a:hover .fa-question,
.login_block a:hover .fa-info-circle {
	color: #14B8A6 !important;
}

/* Version number text */
.login_block .aversion {
	color: #94A3B8 !important;
	font-size: 0.7rem !important;
	letter-spacing: 0.5px !important;
}

/* Default user photo — indigo accent ring */
img.userphoto,
img.photouserphoto {
	border: 2px solid #C7D2FE !important;
	border-radius: 50% !important;
	box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2) !important;
	transition: all 0.2s ease !important;
}
img.userphoto:hover,
img.photouserphoto:hover {
	border-color: #818CF8 !important;
	box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.3) !important;
	transform: scale(1.05) !important;
}

/* User login name */
.login_block .login_block_other .atoplogin,
.login_block .login_block_user a {
	color: #334155 !important;
	font-weight: 500 !important;
	transition: color 0.2s ease !important;
}
.login_block .login_block_user a:hover {
	color: #6366F1 !important;
}
/* 1.2 Style the title text — clean, modern typography */
table.table-fiche-title .titre,
table.table-fiche-title .titre span,
table.table-fiche-title td.col-title {
	font-size: 1.5rem !important;
	font-weight: 700 !important;
	color: var(--flavor-slate-900) !important;
	background: transparent !important;
	border: none !important;
	padding: 4px 0 !important;
	line-height: 1.3 !important;
}

/* 1.3 Hide the pictotitle icon column for clean look */
table.table-fiche-title td.col-picto {
	display: none !important;
}


/* ==========================================================================
   SNIPER 2. ICON — Active Menu: White Icon, No Background
   Active icon is white (full opacity). Inactive icons are gray (0.6 opacity).
   The indigo left bar (::before) provides the visual active indicator.
   ========================================================================== */

/* Active FA icons — white */
li.tmenusel span.fas,
li.tmenusel span.far,
li.tmenusel span.fa,
li.tmenusel span[class*="fa-"],
li.tmenusel a.tmenusel span.fas,
li.tmenusel a.tmenusel span.far,
li.tmenusel a.tmenusel span.fa,
li.tmenusel a span[class*="fa-"],
a.tmenusel span.fas,
a.tmenusel span.far,
a.tmenusel span.fa,
a.tmenusel span[class*="fa-"],
a.tmenusel .pictofixedwidth {
	color: #FFFFFF !important;
	text-shadow: none !important;
	opacity: 1 !important;
}

/* Active .mainmenu sprite icons — white via filter */
li.tmenusel .tmenuimage .mainmenu,
li.tmenusel .topmenuimage .mainmenu,
a.tmenusel .tmenuimage .mainmenu,
a.tmenusel .topmenuimage .mainmenu,
a.tmenusel img {
	filter: brightness(0) invert(1) !important;
	opacity: 1 !important;
}

/* Keep the background clean on the active link */
a.tmenusel {
	background: transparent !important;
	box-shadow: none !important;
}


/* ==========================================================================
   SNIPER 3. SUBMENU — Extreme Compaction (Vendus Density)
   ========================================================================== */

/* Reduce vertical space in the menu content blocks */
.vmenu .blockvmenu .menu_contenu {
	padding: 4px 16px !important;
}

/* Menu links — ultra-compact */
.vmenu .blockvmenu .menu_contenu a {
	padding: 2px 0 !important;
	font-size: 0.8125rem !important;
	line-height: 1.2 !important;
	display: block !important;
}

/* Category titles — tighter margins */
.vmenu .menu_titre {
	margin-top: 12px !important;
	margin-bottom: 2px !important;
}


/* text-transform reset (carried from FIX 2) */
.menu_titre,
.vmenu a,
.blockvmenu a,
.blockvmenu .menu_contenu a,
#id-left a {
	text-transform: none !important;
	letter-spacing: normal !important;
}


/* ============================================================================== */
/*                                                                                */
/*   PHASE 5 - LOGIN SCREEN & MOBILE RESPONSIVENESS                              */
/*                                                                                */
/* ============================================================================== */


/* ==========================================================================
   P5-1. LOGIN - Position Fixed 50/50 Split (CSS Ninja)
   Rips #login_left out with position:fixed to the left 50vw.
   Fixes form#login to the right 50vw.
   ========================================================================== */

/* 1. Reset Total da Tela */
body.bodylogin,
.bodylogin .login_center,
.bodylogin .login_vertical_align {
	display: block !important;
	width: 100vw !important;
	height: 100vh !important;
	margin: 0 !important;
	padding: 0 !important;
	background: #FFFFFF !important;
	overflow: hidden !important;
	max-width: none !important;
}
.bodylogin .login_center {
	background-image: none !important;
}

/* 2. Formulario Inteiro = Metade Direita (50vw) */
.bodylogin form#login {
	position: fixed !important;
	right: 0 !important;
	top: 0 !important;
	width: 50vw !important;
	height: 100vh !important;
	display: flex !important;
	flex-direction: column !important;
	justify-content: center !important;
	align-items: center !important;
	background: #FFFFFF !important;
	margin: 0 !important;
	padding: 0 40px !important;
	box-sizing: border-box !important;
	border: none !important;
	box-shadow: none !important;
	overflow-y: auto !important;
}

/* 3. Destruir a tabela nativa */
.bodylogin .login_table,
.bodylogin .login_table tbody,
.bodylogin #login_line1,
.bodylogin #login_right,
.bodylogin td#login_right,
.bodylogin div#login_right {
	display: block !important;
	width: 100% !important;
	max-width: 340px !important;
	border: none !important;
	padding: 0 !important;
	margin: 0 auto !important;
	background: transparent !important;
	box-shadow: none !important;
	border-radius: 0 !important;
	height: auto !important;
}
.bodylogin .login_table td,
.bodylogin .login_table tr,
.bodylogin .login_table .tagtable,
.bodylogin .login_table .tagtd {
	display: block !important;
	width: 100% !important;
	border: none !important;
	background: transparent !important;
	padding: 0 !important;
}

/* 4. ARRANCAR O LOGO PARA A ESQUERDA */
.bodylogin #login_left,
.bodylogin div#login_left,
.bodylogin td#login_left {
	position: fixed !important;
	left: 0 !important;
	top: 0 !important;
	width: 50vw !important;
	height: 100vh !important;
	background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%) !important;
	display: flex !important;
	justify-content: center !important;
	align-items: center !important;
	z-index: 1000 !important;
	border: none !important;
	box-shadow: none !important;
	border-radius: 0 !important;
	max-width: none !important;
	margin: 0 !important;
	padding: 0 !important;
	overflow: hidden !important;
}
.bodylogin #login_left::before {
	content: '' !important;
	position: absolute !important;
	top: -60px !important;
	left: -60px !important;
	width: 220px !important;
	height: 220px !important;
	background: rgba(255,255,255,0.08) !important;
	border-radius: 50% !important;
	display: block !important;
}
.bodylogin #login_left::after {
	content: '' !important;
	position: absolute !important;
	bottom: -40px !important;
	right: -40px !important;
	width: 180px !important;
	height: 180px !important;
	background: rgba(255,255,255,0.05) !important;
	border-radius: 50% !important;
	display: block !important;
}
.bodylogin #login_left img,
.bodylogin #login_left #img_logo {
	max-width: 250px !important;
	height: auto !important;
	filter: brightness(0) invert(1) !important;
	position: relative !important;
	z-index: 1 !important;
}

/* 5. Heading "Welcome back" */
.bodylogin #login_right::before,
.bodylogin div#login_right::before,
.bodylogin td#login_right::before {
	content: 'Welcome back' !important;
	display: block !important;
	font-size: 1.75rem !important;
	font-weight: 700 !important;
	color: #1E293B !important;
	margin-bottom: 32px !important;
	width: 100% !important;
	text-align: left !important;
}

/* Hide BR and version title */
.bodylogin #login_line1 br { display: none !important; }
.bodylogin .login_table_title { display: none !important; }

/* 6. Input rows */
.bodylogin .trinputlogin {
	margin-bottom: 18px !important;
	width: 100% !important;
}
.bodylogin .tdinputlogin {
	width: 100% !important;
	position: relative !important;
}
.bodylogin .tdinputlogin > .fa,
.bodylogin .tdinputlogin > .fas,
.bodylogin .tdinputlogin > span.fa,
.bodylogin .tdinputlogin > span.fas {
	position: absolute !important;
	left: 14px !important;
	top: 50% !important;
	transform: translateY(-50%) !important;
	z-index: 2 !important;
	pointer-events: none !important;
	color: #94A3B8 !important;
	font-size: 0.9rem !important;
}

/* 7. Input Fields */
.bodylogin input[type="text"],
.bodylogin input[type="password"],
.bodylogin input.flat {
	width: 100% !important;
	box-sizing: border-box !important;
	height: 48px !important;
	border: 1px solid #CBD5E1 !important;
	border-radius: 8px !important;
	padding: 0 16px 0 40px !important;
	font-size: 1rem !important;
	background: #F8FAFC !important;
	color: #0F172A !important;
	outline: none !important;
	transition: all 200ms ease !important;
	-webkit-box-shadow: inset 0 0 0 50px #F8FAFC !important;
}
.bodylogin input[type="text"]:focus,
.bodylogin input[type="password"]:focus {
	border-color: var(--flavor-primary-500) !important;
	box-shadow: 0 0 0 3px rgba(99,102,241,0.12) !important;
	background: #FFFFFF !important;
	-webkit-box-shadow: inset 0 0 0 50px #FFF, 0 0 0 3px rgba(99,102,241,0.12) !important;
}

/* 8. Alinhar o Botao (fora da tabela) */
.bodylogin form#login .center {
	display: block !important;
	width: 100% !important;
	max-width: 340px !important;
	margin: 0 auto !important;
}
.bodylogin form#login input[type="submit"],
.bodylogin form#login input[type="submit"].button {
	width: 100% !important;
	height: 48px !important;
	background: linear-gradient(135deg, var(--flavor-primary-500), #818CF8) !important;
	color: #FFFFFF !important;
	border-radius: 8px !important;
	font-size: 1rem !important;
	font-weight: 600 !important;
	border: none !important;
	margin-top: 10px !important;
	cursor: pointer !important;
	transition: all 0.2s !important;
	box-shadow: 0 4px 14px rgba(99,102,241,0.3) !important;
}
.bodylogin input[type="submit"]:hover {
	background: linear-gradient(135deg, #4F46E5, #6366F1) !important;
	transform: translateY(-2px) !important;
	box-shadow: 0 10px 15px -3px rgba(99,102,241,0.4) !important;
}

/* 9. Links (Forgot Password) */
.bodylogin form#login div.urllogin,
.bodylogin form#login .center:last-child {
	margin-top: 24px !important;
	text-align: center !important;
	max-width: 340px !important;
	margin-left: auto !important;
	margin-right: auto !important;
}
.bodylogin a {
	color: var(--flavor-primary-500) !important;
	font-size: 0.8125rem !important;
	text-decoration: none !important;
}
.bodylogin a:hover {
	color: #4F46E5 !important;
	text-decoration: underline !important;
}

/* 10. Esconder elementos desnecessarios */
.bodylogin .login_main_message,
.bodylogin .login_main_message_help {
	display: none !important;
}
.bodylogin .backgroundforloginpage {
	background: none !important;
	background-image: none !important;
}

/* 11. Notifications & Alerts — unified modern system */

/* 11a. HIDE legacy inline fixed notifications (they duplicate jnotify) */
div.error,
div.ok,
div.warning {
	display: none !important;
}

/* 11b. jNotify container — positioned top-right as a card */
.jnotify-container {
	position: fixed !important;
	top: 72px !important;
	right: 24px !important;
	left: auto !important;
	width: 420px !important;
	max-width: calc(100vw - 48px) !important;
	z-index: 100000 !important;
	pointer-events: auto !important;
}
.bodylogin .jnotify-container {
	top: 20px !important;
	right: 20px !important;
}

/* 11c. Individual notification card */
.jnotify-notification {
	background: #FFFFFF !important;
	border-radius: 12px !important;
	box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1),
	            0 8px 10px -6px rgba(0, 0, 0, 0.1) !important;
	padding: 16px 44px 16px 20px !important;
	margin-bottom: 12px !important;
	border: 1px solid #E2E8F0 !important;
	border-left: 4px solid #6366F1 !important;
	position: relative !important;
	overflow: hidden !important;
	animation: slideInRight 0.3s ease-out !important;
}

/* Error notification — red accent */
.jnotify-notification-error {
	border-left-color: #EF4444 !important;
	background: linear-gradient(135deg, #FFF5F5 0%, #FFFFFF 100%) !important;
}

/* Warning notification — amber accent */
.jnotify-notification-warning {
	border-left-color: #F59E0B !important;
	background: linear-gradient(135deg, #FFFBEB 0%, #FFFFFF 100%) !important;
}

/* Success/OK notification — green accent */
.jnotify-notification-success,
.jnotify-notification:not(.jnotify-notification-error):not(.jnotify-notification-warning) {
	border-left-color: #10B981 !important;
	background: linear-gradient(135deg, #ECFDF5 0%, #FFFFFF 100%) !important;
}

/* 11d. Notification text styling */
.jnotify-message {
	color: #1E293B !important;
	font-size: 0.875rem !important;
	line-height: 1.5 !important;
	font-weight: 400 !important;
	padding: 0 !important;
	margin: 0 !important;
}
.jnotify-message b,
.jnotify-message strong {
	font-weight: 600 !important;
}

/* 11e. Close button (×) — prominent and accessible */
.jnotify-close {
	position: absolute !important;
	top: 12px !important;
	right: 14px !important;
	font-size: 20px !important;
	line-height: 1 !important;
	color: #94A3B8 !important;
	cursor: pointer !important;
	opacity: 0.7 !important;
	transition: all 0.2s ease !important;
	text-decoration: none !important;
	font-weight: 300 !important;
	width: 24px !important;
	height: 24px !important;
	display: flex !important;
	align-items: center !important;
	justify-content: center !important;
	border-radius: 6px !important;
	background: transparent !important;
}
.jnotify-close:hover {
	opacity: 1 !important;
	color: #475569 !important;
	background: #F1F5F9 !important;
}

/* 11f. Slide-in animation */
@keyframes slideInRight {
	from {
		transform: translateX(100%);
		opacity: 0;
	}
	to {
		transform: translateX(0);
		opacity: 1;
	}
}


/* ============================================================================== */
/*                                                                                */
/*   PHASE 6.1 - PUBLIC PAGES WHITE-LABELING                                     */
/*   (Online signatures, payment links, public proposals)                         */
/*   HTML: header > .backgreypublicpayment > .logopublicpayment > img#dolpaymentlogo */
/*         + .poweredbypublicpayment > a.poweredbyhref > img.poweredbyimg          */
/*                                                                                */
/* ============================================================================== */

/* 1. Hide "Powered by Dolibarr" section entirely */
.poweredbypublicpayment {
	display: none !important;
}

/* 2. Replace Dolibarr fallback logo with NovaDX gradient (hi-res) */
#dolpaymentlogo {
	content: url('img/gradient.png') !important;
	max-height: 40px !important;
	width: auto !important;
	object-fit: contain !important;
}

/* 3. Public page header — logo TOP-LEFT, inline with title */
.backgreypublicpayment {
	background: #FFFFFF !important;
	border-bottom: 1px solid #E2E8F0 !important;
	padding: 16px 32px !important;
	display: flex !important;
	align-items: center !important;
	justify-content: flex-start !important;
}
.logopublicpayment {
	display: flex !important;
	align-items: center !important;
	gap: 16px !important;
	text-align: left !important;
}
.logopublicpayment .clearboth {
	display: none !important;
}
.logopublicpayment strong {
	font-size: 1.125rem !important;
	font-weight: 600 !important;
	color: #1E293B !important;
}
.logopublicpayment a {
	display: flex !important;
	align-items: center !important;
	line-height: 1 !important;
}

/* 4. Public page body background */
body.onlinepaymentbody {
	background-color: #F8FAFC !important;
}

/* 5. Public content area — Stripe Checkout card style */
body.onlinepaymentbody .fiche {
	background: #FFFFFF !important;
	border-radius: 16px !important;
	box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
	border: none !important;
	padding: 40px !important;
	max-width: 640px !important;
	margin: 40px auto !important;
}

/* 6. Public page buttons — premium gradient */
body.onlinepaymentbody input[type="submit"],
body.onlinepaymentbody button[type="submit"] {
	background: linear-gradient(135deg, var(--flavor-primary-500, #6366F1), #818CF8) !important;
	color: #FFFFFF !important;
	border: none !important;
	border-radius: 8px !important;
	padding: 12px 32px !important;
	font-size: 0.9375rem !important;
	font-weight: 600 !important;
	cursor: pointer !important;
	transition: all 0.2s !important;
	box-shadow: 0 4px 14px rgba(99,102,241,0.3) !important;
}
body.onlinepaymentbody input[type="submit"]:hover,
body.onlinepaymentbody button[type="submit"]:hover {
	background: linear-gradient(135deg, #4F46E5, #6366F1) !important;
	transform: translateY(-2px) !important;
	box-shadow: 0 8px 20px rgba(99,102,241,0.4) !important;
}

/* 7. Sub-image banner under header */
.backimagepublicsubimage img {
	max-width: 100% !important;
	border-radius: 0 !important;
}

/* 8. Footer — clean and subtle */
body.onlinepaymentbody footer {
	color: #94A3B8 !important;
	font-size: 0.75rem !important;
}


/* ==========================================================================
   RESPONSIVE - ALL MOBILE RULES (Consolidated)
   Specificity MATCHES desktop rules: #mainbody #id-container (2 IDs)
   ========================================================================== */

/* Hamburger + Mobile Menu — hidden on desktop, shown only inside @media ≤1024px */
#flavor-hamburger,
#flavor-mobile-menu { display: none; }

/* -- Login mobile (< 768px) -- */
@media only screen and (max-width: 768px) {
	.bodylogin #login_left, .bodylogin div#login_left, .bodylogin td#login_left { display: none !important; }
	.bodylogin form#login { width: 100vw !important; right: 0 !important; left: 0 !important; padding: 0 24px !important; }
}

/* -- Tablet & Mobile internal pages (< 1024px) -- */
@media only screen and (max-width: 1024px) {
	/* 1. Kill ALL fixed margins  — specificity matches #mainbody #id-X (2 IDs) */
	#mainbody #id-container,
	#mainbody #id-container,
	#id-container {
		margin-left: 0 !important;
		width: 100% !important;
		max-width: 100vw !important;
		margin-top: 56px !important;
	}

	#mainbody #id-right,
	#id-right {
		margin-left: 0 !important;
		width: 100% !important;
		max-width: 100vw !important;
		padding: 1rem !important;
	}

	#mainbody #id-top,
	#id-top,
	header#id-top {
		margin-left: 0 !important;
		width: 100% !important;
		left: 0 !important;
	}

	#id-top div.login_block,
	div.login_block {
		margin-left: 0 !important;
		left: 0 !important;
		width: 100% !important;
		justify-content: flex-end !important;
		padding-right: 16px !important;
	}
	#id-top div.login_block * {
		font-size: 0.85rem !important;
	}

	/* 2. Hide ALL desktop sidebars entirely on mobile */
	#mainbody div.tmenudiv,
	#mainbody #id-left,
	#mainbody .side-nav,
	div.tmenudiv,
	div.tmenudiv ul.tmenu,
	.side-nav-vert,
	.side-nav,
	#id-left {
		display: none !important;
		width: 0 !important;
		min-width: 0 !important;
		overflow: hidden !important;
		position: absolute !important;
		left: -9999px !important;
	}

	/* 3. Custom Mobile Menu Panel (built by flavor.js) */
	#flavor-mobile-menu {
		display: block !important;
		position: fixed !important;
		top: 0 !important;
		left: -300px !important;
		width: 280px !important;
		height: 100vh !important;
		background: #312C81 !important;
		z-index: 1000000 !important;
		overflow-y: auto !important;
		transition: left 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
		box-shadow: none !important;
		padding: 72px 0 24px 0 !important;
	}
	body.flavor-menu-open #flavor-mobile-menu {
		left: 0 !important;
		box-shadow: 4px 0 30px rgba(0,0,0,0.5) !important;
	}

	/* Menu item styles */
	#flavor-mobile-menu a {
		display: flex !important;
		align-items: center !important;
		gap: 14px !important;
		padding: 14px 24px !important;
		color: #CBD5E1 !important;
		text-decoration: none !important;
		font-size: 0.9375rem !important;
		font-weight: 500 !important;
		transition: all 0.15s !important;
		border-left: 3px solid transparent !important;
	}
	#flavor-mobile-menu a:hover,
	#flavor-mobile-menu a.active {
		background: rgba(99, 102, 241, 0.1) !important;
		color: #FFFFFF !important;
		border-left-color: #6366F1 !important;
	}
	#flavor-mobile-menu a .fm-icon {
		width: 20px !important;
		text-align: center !important;
		font-size: 1rem !important;
		color: #64748B !important;
	}
	#flavor-mobile-menu a:hover .fm-icon,
	#flavor-mobile-menu a.active .fm-icon {
		color: #818CF8 !important;
	}
	#flavor-mobile-menu .fm-section {
		padding: 8px 24px 4px !important;
		font-size: 0.6875rem !important;
		font-weight: 600 !important;
		text-transform: uppercase !important;
		letter-spacing: 0.08em !important;
		color: #475569 !important;
		margin-top: 12px !important;
	}
	#flavor-mobile-menu .fm-divider {
		height: 1px !important;
		background: rgba(255,255,255,0.06) !important;
		margin: 8px 24px !important;
	}

	/* 4. Overlay backdrop when menu is open */
	body.flavor-menu-open::after {
		content: '' !important;
		position: fixed !important;
		top: 0 !important;
		left: 0 !important;
		width: 100vw !important;
		height: 100vh !important;
		background: rgba(0,0,0,0.4) !important;
		z-index: 999999 !important;
	}

	/* 5. Hamburger Button — visible only on mobile, sits in top-left */
	#flavor-hamburger {
		display: flex !important;
		position: fixed !important;
		top: 12px !important;
		left: 12px !important;
		z-index: 1000001 !important;
		width: 36px !important;
		height: 36px !important;
		align-items: center !important;
		justify-content: center !important;
		background: rgba(255,255,255,0.1) !important;
		border: 1px solid rgba(255,255,255,0.15) !important;
		border-radius: 8px !important;
		cursor: pointer !important;
		transition: all 0.2s !important;
	}
	#flavor-hamburger:hover {
		background: rgba(255,255,255,0.2) !important;
	}
	#flavor-hamburger span {
		display: block !important;
		width: 18px !important;
		height: 2px !important;
		background: #CBD5E1 !important;
		position: relative !important;
		transition: all 0.3s !important;
	}
	#flavor-hamburger span::before,
	#flavor-hamburger span::after {
		content: '' !important;
		display: block !important;
		width: 18px !important;
		height: 2px !important;
		background: #CBD5E1 !important;
		position: absolute !important;
		transition: all 0.3s !important;
	}
	#flavor-hamburger span::before { top: -6px !important; }
	#flavor-hamburger span::after { top: 6px !important; }
	/* Animate to X when open */
	body.flavor-menu-open #flavor-hamburger span {
		background: transparent !important;
	}
	body.flavor-menu-open #flavor-hamburger span::before {
		top: 0 !important;
		transform: rotate(45deg) !important;
	}
	body.flavor-menu-open #flavor-hamburger span::after {
		top: 0 !important;
		transform: rotate(-45deg) !important;
	}

	/* 6. Login block — shift right to make room for hamburger */
	#id-top div.login_block,
	div.login_block {
		padding-left: 56px !important;
	}

	/* 3. Title back to normal flow — match desktop specificity */
	#id-right div.titre:first-child,
	#mainbody #id-right div.titre:first-child,
	#id-right div.fiche > div.titre:first-of-type,
	#mainbody div.titre.inline-block,
	table.table-fiche-title {
		position: static !important;
		margin: 16px 0 !important;
		white-space: normal !important;
		max-width: 100% !important;
		font-size: 1.1rem !important;
	}

	/* 4. Cards and forms for small screens */
	#mainbody div.fiche,
	div.fiche,
	div.tabBar {
		margin: 10px !important;
		padding: 16px !important;
		border-radius: 8px !important;
	}

	/* 5. Horizontal scroll for tables */
	.div-table-responsive,
	.div-table-responsive-no-min,
	div.tabBar table {
		display: block !important;
		width: 100% !important;
		overflow-x: auto !important;
		-webkit-overflow-scrolling: touch;
	}

	/* 6. Top bar pseudo-element reset */
	#id-top::after {
		left: 0 !important;
		width: 100% !important;
	}
}


/* ==========================================================================
   Phase 9 - TakePOS Next-Gen
   Uses CORRECT selectors: .bodytakepos, .calcbutton, .calcbutton2,
   .actionbutton, .wrapper, .wrapper2
   Prefixed with .bodytakepos for specificity over pos.css.php
   ========================================================================== */

/* ---- 9.1 Protection Reset (undo global CSS damage) ---- */
.bodytakepos {
	background-color: #F0F2F5 !important;
	font-family: 'Inter', 'Segoe UI', system-ui, sans-serif !important;
}
.bodytakepos .titre,
.bodytakepos #id-right .titre,
.bodytakepos div.titre {
	position: static !important;
	margin: 0 !important;
	padding: 0 !important;
	width: auto !important;
	z-index: 1 !important;
}
.bodytakepos #id-container,
.bodytakepos #id-right {
	margin-left: 0 !important;
	padding: 0 !important;
}
.bodytakepos div.tmenudiv,
.bodytakepos #id-left,
.bodytakepos .side-nav {
	display: none !important;
}

/* ---- 9.2 POS Top Nav / Header ---- */
.bodytakepos .topnav-terminalhour,
.bodytakepos .topnav {
	background: #FFFFFF !important;
	box-shadow: 0 2px 8px rgba(0,0,0,0.06) !important;
	border-bottom: 1px solid #E2E8F0 !important;
}

/* ---- 9.3 Numpad Keys (.calcbutton = digits) ---- */
.bodytakepos .calcbutton {
	border-radius: 12px !important;
	border: none !important;
	background-color: #1E293B !important;
	color: #FFFFFF !important;
	box-shadow: 0 2px 4px rgba(0,0,0,0.12) !important;
	font-weight: 600 !important;
	font-size: 1.15rem !important;
	transition: all 0.15s ease !important;
	cursor: pointer !important;
}
.bodytakepos .calcbutton:hover {
	background-color: #334155 !important;
	transform: translateY(-1px) !important;
	box-shadow: 0 4px 8px rgba(0,0,0,0.2) !important;
}
.bodytakepos .calcbutton:active {
	transform: translateY(0) !important;
	box-shadow: 0 1px 2px rgba(0,0,0,0.15) !important;
}

/* ---- 9.4 Action Keys (.calcbutton2 = Qty, Price, Line disc.) ---- */
.bodytakepos .calcbutton2 {
	border-radius: 12px !important;
	border: none !important;
	background-color: #4F46E5 !important;
	color: #FFFFFF !important;
	box-shadow: 0 2px 4px rgba(79,70,229,0.3) !important;
	font-weight: 600 !important;
	font-size: 1rem !important;
	transition: all 0.15s ease !important;
	cursor: pointer !important;
}
.bodytakepos .calcbutton2:hover {
	background-color: #4338CA !important;
	transform: translateY(-1px) !important;
	box-shadow: 0 6px 12px rgba(79,70,229,0.35) !important;
}

/* ---- 9.5 Right Panel Buttons (.actionbutton) ---- */
.bodytakepos .actionbutton {
	border-radius: 12px !important;
	border: 1px solid #E2E8F0 !important;
	background-color: #FFFFFF !important;
	color: #1E293B !important;
	box-shadow: 0 2px 4px rgba(0,0,0,0.05) !important;
	font-weight: 500 !important;
	font-size: 0.9rem !important;
	transition: all 0.15s ease !important;
	cursor: pointer !important;
}
.bodytakepos .actionbutton:hover {
	border-color: #4F46E5 !important;
	color: #4F46E5 !important;
	background-color: #F5F3FF !important;
	box-shadow: 0 4px 8px rgba(79,70,229,0.12) !important;
	transform: translateY(-1px) !important;
}

/* ---- 9.6 Color Classes (poscolor*) ---- */
.bodytakepos .poscolor1 {
	background-color: #1E293B !important;
	color: #FFFFFF !important;
	border: none !important;
	border-radius: 12px !important;
}
.bodytakepos .poscolor2 {
	background-color: #4F46E5 !important;
	color: #FFFFFF !important;
	border: none !important;
	border-radius: 12px !important;
}
.bodytakepos .poscolor3 {
	background-color: #FFFFFF !important;
	color: #1E293B !important;
	border: 1px solid #E2E8F0 !important;
	border-radius: 12px !important;
}
.bodytakepos .poscolor3:hover {
	border-color: #4F46E5 !important;
	background-color: #F8FAFC !important;
}
.bodytakepos .poscolor4 {
	background-color: #F1F5F9 !important;
	color: #1E293B !important;
	border: 1px solid #E2E8F0 !important;
	border-radius: 12px !important;
}

/* Clear / C button → Red */
.bodytakepos button[onclick*="Clear"],
.bodytakepos button[onclick*="clear"],
.bodytakepos .poscolorclear {
	background-color: #EF4444 !important;
	color: #FFFFFF !important;
	border: none !important;
	border-radius: 12px !important;
}
.bodytakepos button[onclick*="Clear"]:hover,
.bodytakepos .poscolorclear:hover {
	background-color: #DC2626 !important;
}

/* ---- 9.7 Product / Category Grid ---- */
.bodytakepos .wrapper button,
.bodytakepos .wrapper2 button,
.bodytakepos .wrapper div[onclick],
.bodytakepos .wrapper2 div[onclick] {
	background: #FFFFFF !important;
	border-radius: 12px !important;
	border: 1px solid #E2E8F0 !important;
	box-shadow: 0 2px 4px rgba(0,0,0,0.04) !important;
	transition: all 0.15s ease !important;
	cursor: pointer !important;
}
.bodytakepos .wrapper button:hover,
.bodytakepos .wrapper2 button:hover,
.bodytakepos .wrapper div[onclick]:hover,
.bodytakepos .wrapper2 div[onclick]:hover {
	border-color: #4F46E5 !important;
	box-shadow: 0 6px 12px rgba(79,70,229,0.15) !important;
	transform: translateY(-1px) !important;
}

/* ---- 9.8 Receipt Table ---- */
.bodytakepos #tablelines,
.bodytakepos .postablelines {
	background: #FFFFFF !important;
	border-radius: 12px !important;
	box-shadow: 0 2px 6px rgba(0,0,0,0.05) !important;
	border: 1px solid #E2E8F0 !important;
}
.bodytakepos #tablelines tr:hover {
	background: rgba(79,70,229,0.04) !important;
}

/* ---- 9.9 POS Typography ---- */
.bodytakepos .amount,
.bodytakepos .total,
.bodytakepos .pricetag {
	font-weight: 700 !important;
	color: #1E293B !important;
}

/* ---- 9.10 Top Nav Bar — fix invisible items + layout ---- */
.bodytakepos .topnav {
	background: #FFFFFF !important;
	box-shadow: 0 2px 8px rgba(0,0,0,0.06) !important;
	border-bottom: 1px solid #E2E8F0 !important;
	padding: 8px 16px !important;
	display: flex !important;
	align-items: center !important;
	justify-content: space-between !important;
	z-index: 100 !important;
}
.bodytakepos #topnav-left {
	flex: 1 1 auto !important;
	float: none !important;
	display: flex !important;
	align-items: center !important;
	gap: 6px !important;
	color: #1E293B !important;
}
.bodytakepos #topnav-right {
	flex: 0 0 auto !important;
	float: none !important;
	display: flex !important;
	align-items: center !important;
	justify-content: flex-end !important;
	margin-left: auto !important;
	gap: 8px !important;
	color: #1E293B !important;
}
.bodytakepos .topnav a,
.bodytakepos .topnav span {
	color: #1E293B !important;
}
.bodytakepos .topnav .fa,
.bodytakepos .topnav .fas,
.bodytakepos .topnav .far {
	color: #64748B !important;
}
/* Terminal label pill */
.bodytakepos .topnav-terminalhour {
	background: #F1F5F9 !important;
	color: #1E293B !important;
	padding: 6px 14px !important;
	border-radius: 8px !important;
	font-weight: 600 !important;
	font-size: 0.85rem !important;
	text-decoration: none !important;
}
.bodytakepos .topnav-terminalhour:hover {
	background: #E2E8F0 !important;
}

/* ---- 9.11 Search Field (#search) ---- */
.bodytakepos .login_block_other,
.bodytakepos .login_block_other.takepos {
	display: flex !important;
	align-items: center !important;
	justify-content: flex-end !important;
	gap: 8px !important;
	float: none !important;
}
.bodytakepos #search,
.bodytakepos input.input-nobottom {
	background: #F1F5F9 !important;
	border: 1px solid #E2E8F0 !important;
	border-radius: 10px !important;
	padding: 8px 14px !important;
	font-size: 0.9rem !important;
	color: #1E293B !important;
	width: 200px !important;
	outline: none !important;
	transition: all 0.2s ease !important;
}
.bodytakepos #search:focus,
.bodytakepos input.input-nobottom:focus {
	border-color: #4F46E5 !important;
	box-shadow: 0 0 0 3px rgba(79,70,229,0.12) !important;
	background: #FFFFFF !important;
}
.bodytakepos #search::placeholder {
	color: #94A3B8 !important;
}

/* ---- 9.12 C Button (.poscolorblue) → Red ---- */
.bodytakepos .poscolorblue {
	background-color: #EF4444 !important;
	color: #FFFFFF !important;
}
.bodytakepos .poscolorblue:hover {
	background-color: #DC2626 !important;
}

/* ---- 9.13 butAction Buttons (Print ticket, Credit note) ---- */
.bodytakepos .butAction,
.bodytakepos .button,
.bodytakepos a.butAction {
	background-color: #4F46E5 !important;
	color: #FFFFFF !important;
	border: none !important;
	border-radius: 10px !important;
	padding: 8px 20px !important;
	font-weight: 600 !important;
	font-size: 0.85rem !important;
	text-decoration: none !important;
	display: inline-block !important;
	cursor: pointer !important;
	transition: all 0.15s ease !important;
	box-shadow: 0 2px 4px rgba(79,70,229,0.25) !important;
	margin: 4px !important;
}
.bodytakepos .butAction:hover,
.bodytakepos a.butAction:hover {
	background-color: #4338CA !important;
	transform: translateY(-1px) !important;
}
.bodytakepos .butActionDelete,
.bodytakepos a.butActionDelete {
	background-color: #FFFFFF !important;
	color: #EF4444 !important;
	border: 1px solid #FCA5A5 !important;
	border-radius: 10px !important;
	padding: 8px 20px !important;
	font-weight: 600 !important;
	font-size: 0.85rem !important;
	display: inline-block !important;
	cursor: pointer !important;
	transition: all 0.15s ease !important;
	margin: 4px !important;
	text-decoration: none !important;
}
.bodytakepos .butActionDelete:hover {
	background-color: #FEF2F2 !important;
	border-color: #EF4444 !important;
}

/* ---- 9.14 Invoice ref & status ---- */
.bodytakepos .refid,
.bodytakepos .refidno {
	color: #1E293B !important;
	font-weight: 600 !important;
}
.bodytakepos .badge {
	border-radius: 6px !important;
	font-weight: 600 !important;
	font-size: 0.75rem !important;
	padding: 3px 10px !important;
}

/* ---- 9.15 Header & Login block ---- */
.bodytakepos .header {
	background: #FFFFFF !important;
}
.bodytakepos .login_block {
	color: #1E293B !important;
}
.bodytakepos .login_block a {
	color: #4F46E5 !important;
	text-decoration: none !important;
}

/* ---- 9.16 Modal dialogs ---- */
.bodytakepos .ui-dialog {
	border-radius: 16px !important;
	box-shadow: 0 20px 60px rgba(0,0,0,0.15) !important;
	border: none !important;
	overflow: hidden !important;
}
.bodytakepos .ui-dialog-titlebar {
	background: #F8FAFC !important;
	border-bottom: 1px solid #E2E8F0 !important;
	color: #1E293B !important;
	padding: 16px 20px !important;
}
.bodytakepos .ui-dialog-content {
	padding: 20px !important;
}
.bodytakepos .modal-body button.block {
	background-color: #1E293B !important;
	color: #FFFFFF !important;
	border: none !important;
	border-radius: 10px !important;
	padding: 12px 0 !important;
	font-weight: 600 !important;
	margin: 4px 0 !important;
	transition: all 0.15s ease !important;
}
.bodytakepos .modal-body button.block:hover {
	background-color: #334155 !important;
}

/* ---- 9.17 Trash/Delete Button — white icon ---- */
.bodytakepos .poscolordelete {
	background-color: #EF4444 !important;
	color: #FFFFFF !important;
}
.bodytakepos .poscolordelete .fa,
.bodytakepos .poscolordelete .fa-trash,
.bodytakepos .poscolordelete span {
	color: #FFFFFF !important;
}
.bodytakepos .poscolordelete:hover {
	background-color: #DC2626 !important;
	transform: scale(1.05) !important;
	box-shadow: 0 4px 12px rgba(239,68,68,0.4) !important;
}

/* ---- 9.18 TakePOS Modals — Modern Design ---- */
/* Overlay backdrop */
.bodytakepos .modal {
	background: rgba(15, 23, 42, 0.6) !important;
	backdrop-filter: blur(4px) !important;
	-webkit-backdrop-filter: blur(4px) !important;
}
/* Modal card */
.bodytakepos .modal .modal-content {
	background: #FFFFFF !important;
	border-radius: 20px !important;
	border: none !important;
	box-shadow: 0 25px 60px rgba(0,0,0,0.2) !important;
	overflow: hidden !important;
	max-width: 460px !important;
	margin: 12vh auto !important;
	animation: posModalIn 0.25s ease-out !important;
}
@keyframes posModalIn {
	from { opacity: 0; transform: translateY(20px) scale(0.96); }
	to   { opacity: 1; transform: translateY(0) scale(1); }
}
/* Modal header */
.bodytakepos .modal .modal-header {
	background: #F8FAFC !important;
	border-bottom: 1px solid #E2E8F0 !important;
	padding: 20px 24px !important;
	display: flex !important;
	align-items: center !important;
	justify-content: space-between !important;
}
.bodytakepos .modal .modal-header h3 {
	margin: 0 !important;
	font-size: 1.05rem !important;
	font-weight: 700 !important;
	color: #1E293B !important;
}
/* Close button (×) */
.bodytakepos .modal .modal-header .close {
	background: #F1F5F9 !important;
	border: none !important;
	width: 32px !important;
	height: 32px !important;
	border-radius: 8px !important;
	font-size: 1.2rem !important;
	color: #64748B !important;
	cursor: pointer !important;
	display: flex !important;
	align-items: center !important;
	justify-content: center !important;
	transition: all 0.15s ease !important;
	text-decoration: none !important;
	line-height: 1 !important;
}
.bodytakepos .modal .modal-header .close:hover {
	background: #E2E8F0 !important;
	color: #1E293B !important;
}
/* Modal body */
.bodytakepos .modal .modal-body {
	padding: 24px !important;
}
/* Terminal selection buttons */
.bodytakepos .modal .modal-body button.block {
	background: linear-gradient(135deg, #4F46E5, #6366F1) !important;
	color: #FFFFFF !important;
	border: none !important;
	border-radius: 12px !important;
	padding: 14px 20px !important;
	font-weight: 600 !important;
	font-size: 0.95rem !important;
	width: 100% !important;
	margin: 6px 0 !important;
	cursor: pointer !important;
	transition: all 0.2s ease !important;
	box-shadow: 0 4px 12px rgba(79,70,229,0.3) !important;
	text-align: center !important;
	letter-spacing: 0.02em !important;
}
.bodytakepos .modal .modal-body button.block:hover {
	background: linear-gradient(135deg, #4338CA, #4F46E5) !important;
	transform: translateY(-2px) !important;
	box-shadow: 0 6px 20px rgba(79,70,229,0.4) !important;
}
.bodytakepos .modal .modal-body button.block:active {
	transform: translateY(0) !important;
	box-shadow: 0 2px 8px rgba(79,70,229,0.3) !important;
}

/* ============================================================================== */
/*   PHASE 9.22 — TakePOS Payment / Split / Reduction Modals — NovaDX Modern     */
/*   SCOPED to popup iframes only (body WITHOUT .bodytakepos class)              */
/* ============================================================================== */

/* 9.22a Body background for popup pages (payment, split, reduction) */
body:not(.bodytakepos) {
	background: #F1F5F9 !important;
}

/* 9.22b Numpad buttons — modern slate design (popup only) */
body:not(.bodytakepos) button.calcbutton {
	background: linear-gradient(145deg, #F8FAFC, #E2E8F0) !important;
	color: #1E293B !important;
	border: 1px solid #CBD5E1 !important;
	border-radius: 12px !important;
	font-weight: 700 !important;
	font-size: 1.25rem !important;
	transition: all 0.15s ease !important;
	box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05) !important;
}
body:not(.bodytakepos) button.calcbutton:hover {
	background: linear-gradient(145deg, #FFFFFF, #F1F5F9) !important;
	box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08) !important;
	transform: scale(1.02) !important;
}
body:not(.bodytakepos) button.calcbutton:active {
	background: #6366F1 !important;
	color: #FFFFFF !important;
	transform: scale(0.97) !important;
}

/* 9.22c Payment method buttons — vibrant color coding (popup only) */
body:not(.bodytakepos) button.calcbutton.poscolorblue {
	background: linear-gradient(135deg, #4F46E5, #6366F1) !important;
	color: #FFFFFF !important;
	border: none !important;
	border-radius: 12px !important;
	box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25) !important;
	font-weight: 600 !important;
	font-size: 0.85rem !important;
}
body:not(.bodytakepos) button.calcbutton.poscolorblue:hover {
	background: linear-gradient(135deg, #4338CA, #4F46E5) !important;
	box-shadow: 0 6px 16px rgba(79, 70, 229, 0.35) !important;
	transform: scale(1.02) !important;
}
body:not(.bodytakepos) button.calcbutton.poscolorblue:active {
	transform: scale(0.97) !important;
}

/* Specific payment method colors via nth-of-type for diversity */
/* Cash — emerald */
body:not(.bodytakepos) button.calcbutton.poscolorblue:nth-of-type(4n+1) {
	background: linear-gradient(135deg, #059669, #10B981) !important;
	box-shadow: 0 4px 12px rgba(16, 185, 129, 0.25) !important;
}
body:not(.bodytakepos) button.calcbutton.poscolorblue:nth-of-type(4n+1):hover {
	background: linear-gradient(135deg, #047857, #059669) !important;
	box-shadow: 0 6px 16px rgba(16, 185, 129, 0.35) !important;
}
/* Check — sky blue */
body:not(.bodytakepos) button.calcbutton.poscolorblue:nth-of-type(4n+2) {
	background: linear-gradient(135deg, #0284C7, #0EA5E9) !important;
	box-shadow: 0 4px 12px rgba(14, 165, 233, 0.25) !important;
}
body:not(.bodytakepos) button.calcbutton.poscolorblue:nth-of-type(4n+2):hover {
	background: linear-gradient(135deg, #0369A1, #0284C7) !important;
	box-shadow: 0 6px 16px rgba(14, 165, 233, 0.35) !important;
}
/* Credit card — indigo (default) */
body:not(.bodytakepos) button.calcbutton.poscolorblue:nth-of-type(4n+3) {
	background: linear-gradient(135deg, #4F46E5, #6366F1) !important;
	box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25) !important;
}
body:not(.bodytakepos) button.calcbutton.poscolorblue:nth-of-type(4n+3):hover {
	background: linear-gradient(135deg, #4338CA, #4F46E5) !important;
	box-shadow: 0 6px 16px rgba(79, 70, 229, 0.35) !important;
}
/* Bank transfer — teal */
body:not(.bodytakepos) button.calcbutton.poscolorblue:nth-of-type(4n) {
	background: linear-gradient(135deg, #0D9488, #14B8A6) !important;
	box-shadow: 0 4px 12px rgba(20, 184, 166, 0.25) !important;
}
body:not(.bodytakepos) button.calcbutton.poscolorblue:nth-of-type(4n):hover {
	background: linear-gradient(135deg, #0F766E, #0D9488) !important;
	box-shadow: 0 6px 16px rgba(20, 184, 166, 0.35) !important;
}

/* 9.22d Action buttons (%, Amount, OK) — indigo accent (popup only) */
body:not(.bodytakepos) button.calcbutton2 {
	background: linear-gradient(135deg, #4F46E5, #7C3AED) !important;
	color: #FFFFFF !important;
	border: none !important;
	border-radius: 12px !important;
	font-weight: 700 !important;
	font-size: 0.95rem !important;
	box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25) !important;
	transition: all 0.15s ease !important;
}
body:not(.bodytakepos) button.calcbutton2:hover {
	background: linear-gradient(135deg, #4338CA, #6D28D9) !important;
	box-shadow: 0 6px 16px rgba(79, 70, 229, 0.35) !important;
	transform: scale(1.02) !important;
}
body:not(.bodytakepos) button.calcbutton2:active {
	transform: scale(0.97) !important;
}
body:not(.bodytakepos) button.calcbutton2.clicked {
	background: linear-gradient(135deg, #7C3AED, #8B5CF6) !important;
	box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.3) !important;
}

/* 9.22e C (Clear) and X (Close) buttons (popup only) */
body:not(.bodytakepos) button.calcbutton3 {
	background: #F1F5F9 !important;
	color: #475569 !important;
	border: 1px solid #CBD5E1 !important;
	border-radius: 12px !important;
	font-weight: 700 !important;
	font-size: 1.1rem !important;
	transition: all 0.15s ease !important;
}
body:not(.bodytakepos) button.calcbutton3:hover {
	background: #E2E8F0 !important;
	color: #1E293B !important;
}
body:not(.bodytakepos) button.calcbutton3:active {
	background: #CBD5E1 !important;
}

/* Delete button override (popup only) */
body:not(.bodytakepos) button.calcbutton2.poscolordelete,
body:not(.bodytakepos) button.calcbutton3.poscolordelete {
	background: linear-gradient(135deg, #FEE2E2, #FECACA) !important;
	color: #991B1B !important;
	border: 1px solid #FCA5A5 !important;
}
body:not(.bodytakepos) button.calcbutton2.poscolordelete:hover,
body:not(.bodytakepos) button.calcbutton3.poscolordelete:hover {
	background: linear-gradient(135deg, #FECACA, #FCA5A5) !important;
	color: #7F1D1D !important;
}

/* Debit/special action buttons (popup only) */
body:not(.bodytakepos) button.calcbutton2.poscolorgreen {
	background: linear-gradient(135deg, #059669, #10B981) !important;
	color: #FFFFFF !important;
	border: none !important;
}

/* 9.22f Payment input & totals — refined look (popup only) */
body:not(.bodytakepos) .takepospay {
	font-size: 1.5em !important;
	border: 2px solid #E2E8F0 !important;
	border-radius: 12px !important;
	padding: 10px 16px !important;
	background: #FFFFFF !important;
	color: #1E293B !important;
	font-weight: 600 !important;
	transition: border-color 0.2s ease !important;
}
body:not(.bodytakepos) .takepospay:focus {
	border-color: #6366F1 !important;
	outline: none !important;
	box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15) !important;
}

/* Total and received display bars (popup only) */
body:not(.bodytakepos) .paymentbordline {
	background: linear-gradient(135deg, #F8FAFC, #F1F5F9) !important;
	border: 1px solid #E2E8F0 !important;
	border-radius: 12px !important;
	color: #1E293B !important;
	padding: 10px 16px !important;
	font-weight: 600 !important;
	margin-bottom: 8px !important;
}

/* 9.22g Split sale modal — clean card layout (popup only) */
body.takepossplitphp .headersplit,
body:not(.bodytakepos) .headersplit {
	padding-top: 12px !important;
	padding-bottom: 4px !important;
}
body.takepossplitphp .headercontent,
body:not(.bodytakepos) .headercontent {
	border: 2px solid #6366F1 !important;
	border-radius: 12px !important;
	background: linear-gradient(135deg, #EEF2FF, #E0E7FF) !important;
	color: #4338CA !important;
	font-weight: 700 !important;
	font-size: 1.1rem !important;
	padding: 10px 0 !important;
}
body.takepossplitphp .headercontent:hover,
body:not(.bodytakepos) .headercontent:hover {
	background: linear-gradient(135deg, #E0E7FF, #C7D2FE) !important;
}

body.takepossplitphp .splitsale {
	border-radius: 12px !important;
	overflow: hidden !important;
}

