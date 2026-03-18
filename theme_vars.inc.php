<?php
/* Copyright (C) 2025       DoliSaaS Theme             <dolisaas@custom.dev>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

/**
 *	\file       htdocs/theme/flavor/theme_vars.inc.php
 *	\brief      File to declare variables of CSS style sheet - Flavor SaaS theme
 *  \ingroup    core
 *
 *  To include file, do this:
 *              $var_file = DOL_DOCUMENT_ROOT.'/theme/'.$conf->theme.'/theme_vars.inc.php';
 *              if (is_readable($var_file)) include $var_file;
 */

// ---------------------------------------------------------------------------
// Graph / Chart data colors (used by dolgraph.class.php)
// ---------------------------------------------------------------------------
global $theme_bordercolor, $theme_datacolor, $theme_bgcolor, $theme_bgcoloronglet;
$theme_bordercolor = array(226, 232, 240);  // Slate 200
$theme_datacolor = array(
	array(99, 102, 241),   // Indigo 500  – primary
	array(14, 165, 233),   // Sky 500
	array(245, 158, 11),   // Amber 500
	array(16, 185, 129),   // Emerald 500
	array(239, 68, 68),    // Red 500
	array(168, 85, 247),   // Purple 500
	array(236, 72, 153),   // Pink 500
	array(20, 184, 166),   // Teal 500
	array(234, 179, 8),    // Yellow 500
	array(59, 130, 246),   // Blue 500
	array(249, 115, 22),   // Orange 500
	array(139, 92, 246),   // Violet 500
	array(6, 182, 212),    // Cyan 500
	array(34, 197, 94),    // Green 500
);
if (!defined('ISLOADEDBYSTEELSHEET')) {
	if (getDolGlobalString('MAIN_OPTIMIZEFORCOLORBLIND')) {
		if (getDolGlobalString('MAIN_OPTIMIZEFORCOLORBLIND') == 'flashy') {
			$theme_datacolor = array(
				array(157, 56, 191), array(0, 147, 183), array(250, 190, 30),
				array(221, 75, 57), array(0, 166, 90), array(140, 140, 220),
				array(190, 120, 120), array(190, 190, 100), array(115, 125, 150),
				array(100, 170, 20), array(150, 135, 125), array(85, 135, 150),
				array(150, 135, 80), array(150, 80, 150),
			);
		} else {
			$theme_datacolor = array(
				array(248, 220, 1), array(9, 85, 187), array(42, 208, 255),
				array(0, 0, 0), array(169, 169, 169), array(253, 102, 136),
				array(120, 154, 190), array(146, 146, 55), array(0, 52, 251),
				array(196, 226, 161), array(222, 160, 41), array(85, 135, 150),
				array(150, 135, 80), array(150, 80, 150),
			);
		}
	}
}

$theme_bgcolor = array(hexdec('F9'), hexdec('FA'), hexdec('FB'));        // #F9FAFB
$theme_bgcoloronglet = array(hexdec('E0'), hexdec('E7'), hexdec('FF'));  // Indigo 100


// ---------------------------------------------------------------------------
// Core color variables (PHP – used by Dolibarr's internal CSS generation)
// ---------------------------------------------------------------------------

// Layout backgrounds
$colorbackhmenu1        = '255, 255, 255';    // Top menu    – White (SaaS: white topbar)
$colorbackvmenu1        = '15, 23, 42';       // Sidebar     – Slate 900 (SaaS: dark sidebar)
$colorbackbody          = '249, 250, 251';    // Body        – #F9FAFB (Gray 50)
$colorbacktitle1        = '255, 255, 255';    // Table title – White card style
$colortopbordertitle1   = '99, 102, 241';     // Top border  – Indigo 500
$colorbacktabcard1      = '255, 255, 255';    // Card bg     – White
$colorbacktabactive     = '238, 242, 255';    // Active tab  – Indigo 50

// Table row backgrounds
$colorbacklineimpair1   = '255, 255, 255';    // Odd row     – White
$colorbacklineimpair2   = '255, 255, 255';    // Odd row alt
$colorbacklinepair1     = '249, 250, 251';    // Even row    – Gray 50
$colorbacklinepair2     = '249, 250, 251';    // Even row alt
$colorbacklinepairhover = '238, 242, 255';    // Row hover   – Indigo 50
$colorbacklinepairchecked = '224, 231, 255';  // Row checked – Indigo 100
$colorbacklinebreak     = '241, 245, 249';    // Row break   – Slate 100

// Text colors
$colortexttitlenotab    = '99, 102, 241';     // Title notab – Indigo 500
$colortexttitlenotab2   = '79, 70, 229';      // Title notab2– Indigo 600
$colortexttitle         = '15, 23, 42';       // Title text  – Slate 900
$colortexttitlelink     = '67, 56, 202';      // Title link  – Indigo 700
$colortext              = '30, 41, 59';       // Body text   – Slate 800
$colortextlink          = '99, 102, 241';     // Links       – Indigo 500

// Typography
$fontsize               = '0.875em';          // 14px base
$fontsizesmaller        = '0.75em';           // 12px
$topMenuFontSize        = '0.875em';

// UI elements
$toolTipBgColor         = 'rgba(15, 23, 42, 0.96)'; // Dark tooltip
$toolTipFontColor       = '#F1F5F9';                 // Slate 100
$butactionbg            = '99, 102, 241, 0.95';      // Indigo 500
$textbutaction          = '255, 255, 255';            // White

// Semantic text colors
$textSuccess            = '#10B981';           // Emerald 500
$colorblind_deuteranopes_textSuccess = '#37de5d';
$textWarning            = '#F59E0B';           // Amber 500
$textDanger             = '#EF4444';           // Red 500
$colorblind_deuteranopes_textWarning = '#e4e411';

// Badge colors
$badgePrimary           = '#6366F1';           // Indigo 500
$badgeSecondary         = '#94A3B8';           // Slate 400
$badgeInfo              = '#0EA5E9';           // Sky 500
$badgeSuccess           = '#10B981';           // Emerald 500
$badgeWarning           = '#F59E0B';           // Amber 500
$badgeDanger            = '#EF4444';           // Red 500
$badgeDark              = '#1E293B';           // Slate 800
$badgeLight             = '#F1F5F9';           // Slate 100

// Badge color-blind adjustments
$colorblind_deuteranopes_badgeSuccess = '#37de5d';
$colorblind_deuteranopes_badgeSuccess_textColor7 = '#000';
$colorblind_deuteranopes_badgeWarning = '#e4e411';
$colorblind_deuteranopes_badgeDanger  = $badgeDanger;

// Status badge colors
$badgeStatus0           = '#CBD5E1';           // Draft       – Slate 300
$badgeStatus1           = '#F59E0B';           // Validated   – Amber 500
$badgeStatus1b          = '#F59E0B';
$badgeStatus2           = '#0EA5E9';           // Approved    – Sky 500
$badgeStatus3           = '#EAB308';           // In progress – Yellow 500
$badgeStatus4           = '#10B981';           // OK/Done     – Emerald 500
$badgeStatus4b          = '#10B981';
$badgeStatus5           = '#CBD5E1';           // Slate 300
$badgeStatus6           = '#94A3B8';           // Slate 400
$badgeStatus7           = '#10B981';           // Emerald 500
$badgeStatus8           = '#EF4444';           // Error       – Red 500
$badgeStatus9           = '#F1F5F9';           // Slate 100
$badgeStatus10          = '#EF4444';           // Red 500
$badgeStatus11          = '#10B981';           // Emerald 500

// Status color-blind adjustments
$colorblind_deuteranopes_badgeStatus4 = $colorblind_deuteranopes_badgeStatus7 = $colorblind_deuteranopes_badgeSuccess;
$colorblind_deuteranopes_badgeStatus_textColor4 = $colorblind_deuteranopes_badgeStatus_textColor7 = '#000';
$colorblind_deuteranopes_badgeStatus1 = $colorblind_deuteranopes_badgeWarning;
$colorblind_deuteranopes_badgeStatus_textColor1 = '#000';
