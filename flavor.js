/**
 * Flavor SaaS Theme - White-labeling & Mobile Menu
 * 1. Replaces "Dolibarr" with "Dolisys" across the entire UI
 * 2. Hides "Powered by" sections on public pages
 * 3. Creates a dedicated mobile menu on screens ≤ 1024px
 *
 * To activate: run theme/flavor/setup.php once from the browser
 */
document.addEventListener("DOMContentLoaded", function () {

	// =====================================================================
	// PART 1: WHITE-LABELING (Dolibarr → Dolisys)
	// =====================================================================

	// 1. Change the browser tab title
	document.title = document.title.replace(/Dolibarr/gi, "Dolisys");

	// 2. Walk ALL text nodes and replace "Dolibarr" → "Dolisys"
	var walker = document.createTreeWalker(
		document.body,
		NodeFilter.SHOW_TEXT,
		{
			acceptNode: function (node) {
				var tag = node.parentElement ? node.parentElement.tagName : '';
				if (tag === 'SCRIPT' || tag === 'STYLE' || tag === 'TEXTAREA' || tag === 'INPUT' || tag === 'SELECT') {
					return NodeFilter.FILTER_REJECT;
				}
				return NodeFilter.FILTER_ACCEPT;
			}
		},
		false
	);
	var node;
	while (node = walker.nextNode()) {
		if (node.nodeValue && node.nodeValue.indexOf("Dolibarr") !== -1) {
			node.nodeValue = node.nodeValue.replace(/Dolibarr/gi, "Dolisys");
		}
	}

	// 3. Update <title>
	var titleEl = document.querySelector('title');
	if (titleEl && titleEl.textContent.indexOf("Dolibarr") !== -1) {
		titleEl.textContent = titleEl.textContent.replace(/Dolibarr/gi, "Dolisys");
	}

	// 4. Redirect dolibarr.org links
	var links = document.getElementsByTagName('a');
	for (var i = 0; i < links.length; i++) {
		if (links[i].href && links[i].href.indexOf('dolibarr.org') !== -1) {
			links[i].href = 'https://www.novadx.pt';
			links[i].target = '_blank';
		}
	}

	// 5. Hide "Powered by" images and containers
	var poweredImgs = document.querySelectorAll('img.poweredbyimg, img[src*="dolibarr_logo"]');
	for (var j = 0; j < poweredImgs.length; j++) {
		if (poweredImgs[j].id !== 'dolpaymentlogo') {
			poweredImgs[j].style.display = 'none';
		}
	}
	var poweredDivs = document.querySelectorAll('.poweredbypublicpayment');
	for (var k = 0; k < poweredDivs.length; k++) {
		poweredDivs[k].style.display = 'none';
	}

	// 6. Hide "ERP/CRM" badge
	var allSpans = document.querySelectorAll('span, b, strong');
	for (var m = 0; m < allSpans.length; m++) {
		if (allSpans[m].textContent.trim() === 'ERP/CRM') {
			allSpans[m].style.display = 'none';
		}
	}

	// =====================================================================
	// PART 2: ACCORDION MENU (collapse/expand sidebar sections)
	// =====================================================================

	(function initAccordion() {
		var menuTitles = document.querySelectorAll('.vmenu .menu_titre');
		for (var i = 0; i < menuTitles.length; i++) {
			var title = menuTitles[i];
			var parentBlock = title.closest('.blockvmenu, div[class*="blockvmenu"]');
			if (!parentBlock) continue;

			var hasContenu = parentBlock.querySelector('.menu_contenu');

			// Only auto-collapse sections that HAVE content and do NOT contain the active page
			if (hasContenu) {
				var hasActive = parentBlock.querySelector('.vmenusel, a.vmenusel');
				if (!hasActive) {
					parentBlock.classList.add('collapsed');
				}
			}

			// Click handler on the title
			title.addEventListener('click', function (e) {
				var block = this.closest('.blockvmenu, div[class*="blockvmenu"]');
				var contenu = block ? block.querySelector('.menu_contenu') : null;

				if (contenu) {
					// Has sub-items → toggle accordion, block navigation
					e.preventDefault();
					e.stopPropagation();
					block.classList.toggle('collapsed');
				}
				// No sub-items → let the link navigate normally (e.g. "Setup")
			});
		}
	})();

	// =====================================================================
	// PART 2.5: TOPBAR TITLE — DYNAMIC PAGE TITLE
	// =====================================================================

	(function initTopbarTitle() {
		// Skip login, public pages, and TakePOS
		if (document.body.classList.contains('bodylogin') ||
			document.body.classList.contains('bodytakepos') ||
			document.querySelector('.backgreypublicpayment') ||
			document.querySelector('.publicnewmemberform')) {
			return;
		}

		var topbar = document.getElementById('id-top');
		if (!topbar) return;

		// Extract page title from content area
		var pageTitle = '';
		var titleEl = document.querySelector('.fiche .titre.inline-block') ||
					  document.querySelector('.fiche h1') ||
					  document.querySelector('#id-right h1') ||
					  document.querySelector('.titre');
		if (titleEl) {
			pageTitle = titleEl.textContent.trim();
		}

		if (!pageTitle) return;

		var titleDiv = document.createElement('div');
		titleDiv.id = 'flavor-topbar-title';
		titleDiv.textContent = pageTitle;

		// Insert before the login block
		var loginBlock = topbar.querySelector('.login_block');
		if (loginBlock) {
			topbar.insertBefore(titleDiv, loginBlock);
		} else {
			topbar.appendChild(titleDiv);
		}

		// Hide the original title in the body to prevent duplication
		if (titleEl) {
			// Try to hide the parent container (.fiche-head) for cleaner look
			var ficheHead = titleEl.closest('.fiche-head');
			if (ficheHead) {
				ficheHead.style.display = 'none';
			} else {
				titleEl.style.display = 'none';
			}
		}
	})();

	// =====================================================================
	// PART 2.7: VENDUS-STYLE COLLAPSIBLE SIDEBAR
	// =====================================================================

	(function initCollapsibleSidebar() {
		// Skip login, public pages, TakePOS
		if (document.body.classList.contains('bodylogin') ||
			document.body.classList.contains('bodytakepos') ||
			document.querySelector('.backgreypublicpayment')) {
			return;
		}

		var leftSidebar = document.getElementById('id-left');
		if (!leftSidebar) return;

		var sideNav = leftSidebar.closest('.side-nav') || leftSidebar.parentElement;
		// The icon bar (vertical strip with icons) is .tmenudiv (80px × full height)
		var iconBar = document.querySelector('.tmenudiv') ||
					  document.querySelector('ul.tmenu') ||
					  document.getElementById('tmenu_tooltip');

		var STORAGE_KEY = 'flavor_sidebar_pinned';
		var isPinned = localStorage.getItem(STORAGE_KEY) !== 'false'; // default: pinned (open)

		// Create toggle button
		var toggleBtn = document.createElement('div');
		toggleBtn.id = 'flavor-sidebar-toggle';
		toggleBtn.innerHTML = '<span class="flavor-toggle-arrow">‹</span>';
		toggleBtn.title = 'Collapse sidebar';

		// Insert toggle at the top of sidebar
		leftSidebar.insertBefore(toggleBtn, leftSidebar.firstChild);

		// Apply saved state immediately
		if (!isPinned) {
			document.body.classList.add('flavor-sidebar-collapsed');
			toggleBtn.classList.add('collapsed');
			toggleBtn.title = 'Pin sidebar';
		}

		// Toggle click — expand/collapse
		toggleBtn.addEventListener('click', function(e) {
			e.stopPropagation();
			e.preventDefault();
			var isCollapsed = document.body.classList.contains('flavor-sidebar-collapsed');

			if (isCollapsed) {
				// Expand & pin
				document.body.classList.remove('flavor-sidebar-collapsed');
				leftSidebar.classList.remove('flavor-sidebar-hover');
				toggleBtn.classList.remove('collapsed');
				toggleBtn.title = 'Collapse sidebar';
				localStorage.setItem(STORAGE_KEY, 'true');
			} else {
				// Collapse & unpin
				document.body.classList.add('flavor-sidebar-collapsed');
				toggleBtn.classList.add('collapsed');
				toggleBtn.title = 'Pin sidebar';
				localStorage.setItem(STORAGE_KEY, 'false');
			}
		});

		// ---- Hover-to-reveal when collapsed ----
		// Uses direct inline styles to bypass all CSS specificity issues
		var hoverTimeout = null;
		var HOVER_STYLES = 'width:220px!important;min-width:220px!important;max-width:220px!important;' +
			'opacity:1!important;position:fixed!important;top:52px!important;left:62px!important;' +
			'bottom:0!important;z-index:999!important;box-shadow:6px 0 20px rgba(0,0,0,0.25)!important;' +
			'overflow-y:auto!important;overflow-x:hidden!important;background:#312C81!important;' +
			'padding:8px 0!important;';

		function showSidebar() {
			if (document.body.classList.contains('flavor-sidebar-collapsed')) {
				clearTimeout(hoverTimeout);
				leftSidebar.style.cssText = HOVER_STYLES;
			}
		}

		function hideSidebar() {
			hoverTimeout = setTimeout(function() {
				leftSidebar.style.cssText = '';
			}, 200); // small delay so mouse can travel from icon bar to sidebar
		}

		function cancelHide() {
			clearTimeout(hoverTimeout);
		}

		// Trigger: hovering over the icon bar reveals the sidebar
		if (iconBar) {
			iconBar.addEventListener('mouseenter', showSidebar);
			iconBar.addEventListener('mouseleave', hideSidebar);
		}

		// Keep sidebar open while mouse is over it
		leftSidebar.addEventListener('mouseenter', function() {
			if (document.body.classList.contains('flavor-sidebar-collapsed')) {
				cancelHide();
				leftSidebar.style.cssText = HOVER_STYLES;
			}
		});
		leftSidebar.addEventListener('mouseleave', hideSidebar);

		// Also trigger when hovering over the .side-nav area
		if (sideNav) {
			sideNav.addEventListener('mouseenter', showSidebar);
			sideNav.addEventListener('mouseleave', hideSidebar);
		}
	})();

	// =====================================================================
	// PART 2.8: SMOOTH PAGE TRANSITIONS
	// =====================================================================

	(function initPageTransitions() {
		// Skip login and public pages
		if (document.body.classList.contains('bodylogin') ||
			document.body.classList.contains('bodytakepos')) {
			return;
		}

		// On internal link click, fade out content before navigating
		document.addEventListener('click', function(e) {
			var link = e.target.closest('a[href]');
			if (!link) return;

			var href = link.getAttribute('href');
			if (!href || href === '#' || href.startsWith('javascript:')) return;
			if (link.target === '_blank' || e.ctrlKey || e.metaKey || e.shiftKey) return;
			if (href.startsWith('http') && !href.startsWith(window.location.origin)) return;

			// Add fade-out class
			document.body.classList.add('flavor-page-leaving');

			// Let the fade-out animation play, then navigate
			e.preventDefault();
			setTimeout(function() {
				window.location.href = link.href;
			}, 150);
		});
	})();

	// =====================================================================
	// PART 2.6: ICON MANAGER — SWAP FA CLASSES FROM llx_flavor_config
	// =====================================================================

	(function initIconManager() {
		// Skip login, public pages, and TakePOS
		if (document.body.classList.contains('bodylogin') ||
			document.body.classList.contains('bodytakepos')) {
			return;
		}

		// Read icon map from CSS variable (set by style.css.php from llx_flavor_config)
		var rootStyles = getComputedStyle(document.documentElement);
		var mapValue = rootStyles.getPropertyValue('--flavor-icon-map').trim();

		// Remove wrapping quotes
		if (mapValue && mapValue.length > 2) {
			mapValue = mapValue.replace(/^['"]|['"]$/g, '');
		}

		if (!mapValue || mapValue === 'none') return;

		var iconMap;
		try {
			iconMap = JSON.parse(mapValue);
		} catch (e) {
			return; // Invalid JSON, skip silently
		}

		// For each menu key, find the native FA span and swap its class
		Object.keys(iconMap).forEach(function(menuKey) {
			var customClass = iconMap[menuKey]; // e.g. "fas fa-building"
			if (!customClass) return;

			var container = document.getElementById('mainmenutd_' + menuKey);
			if (!container) return;

			var span = container.querySelector('.mainmenu.topmenuimage > span[class*="fa-"]');
			if (!span) return;

			// Strip all existing FA icon classes (fa-xxx) but keep fas/far/fab/fa
			var currentClasses = span.className.split(' ');
			var newClasses = [];
			for (var i = 0; i < currentClasses.length; i++) {
				var cls = currentClasses[i].trim();
				// Keep utility classes (fa-fw, pictofixedwidth, etc) but remove the icon class
				if (cls.match(/^fa-/) && !cls.match(/^fa-fw$/)) {
					continue; // Remove old icon class like fa-building, fa-cube, etc.
				}
				if (cls === 'fas' || cls === 'far' || cls === 'fab' || cls === 'fa') {
					continue; // We'll re-add the prefix from customClass
				}
				if (cls) newClasses.push(cls);
			}

			// Add the custom classes (e.g. "fas fa-building" → ["fas", "fa-building"])
			var customParts = customClass.split(' ');
			for (var j = 0; j < customParts.length; j++) {
				if (customParts[j].trim()) {
					newClasses.push(customParts[j].trim());
				}
			}

			span.className = newClasses.join(' ');
		});
	})();

	// =====================================================================
	// PART 3: MOBILE MENU (only on internal pages)
	// =====================================================================

	(function initMobileMenu() {
		// Skip login and public pages
		if (document.body.classList.contains('bodylogin') ||
			document.querySelector('.backgreypublicpayment') ||
			document.querySelector('.publicnewmemberform')) {
			return;
		}

		// Icon mapping for main menu items (mainmenu class → FontAwesome)
		var iconMap = {
			'home': 'fas fa-home',
			'companies': 'fas fa-building',
			'commercial': 'fas fa-handshake',
			'billing': 'fas fa-file-invoice-dollar',
			'accountancy': 'fas fa-calculator',
			'bank': 'fas fa-university',
			'products': 'fas fa-cube',
			'projects': 'fas fa-project-diagram',
			'hrm': 'fas fa-users',
			'ticket': 'fas fa-ticket-alt',
			'tools': 'fas fa-wrench',
			'members': 'fas fa-id-card',
			'agenda': 'fas fa-calendar-alt',
			'ecm': 'fas fa-folder-open',
			'website': 'fas fa-globe'
		};

		// ---- 1. Read menu items from the desktop tmenu ----
		var menuItems = [];
		var desktopMenuItems = document.querySelectorAll('li.tmenu, li.tmenusel');

		for (var idx = 0; idx < desktopMenuItems.length; idx++) {
			var li = desktopMenuItems[idx];
			var link = li.querySelector('a');
			if (!link) continue;

			var href = link.getAttribute('href') || '#';
			var isActive = li.classList.contains('tmenusel');

			// Extract label: try <a title>, then <span.mainmenuaspan>, then <li title>
			var label = '';
			var labelSpan = li.querySelector('.mainmenuaspan');
			if (link.getAttribute('title')) {
				label = link.getAttribute('title');
			} else if (labelSpan && labelSpan.textContent.trim()) {
				label = labelSpan.textContent.trim();
			} else if (li.getAttribute('title')) {
				label = li.getAttribute('title');
			}
			if (!label) label = 'Menu';

			// Detect icon from mainmenu class
			var iconClass = 'fas fa-circle';
			var mainmenuSpan = li.querySelector('[class*="mainmenu"]');
			if (mainmenuSpan) {
				var classes = mainmenuSpan.className.split(/\s+/);
				for (var c = 0; c < classes.length; c++) {
					if (classes[c].indexOf('mainmenu') === 0 && classes[c] !== 'mainmenu') {
						var menuKey = classes[c].replace('mainmenu', '');
						if (iconMap[menuKey]) {
							iconClass = iconMap[menuKey];
						}
						break;
					}
				}
			}

			// Also try to find FA icon directly
			var faIcon = li.querySelector('.fas, .far, .fa');
			if (faIcon && faIcon.className) {
				iconClass = faIcon.className;
			}

			menuItems.push({
				href: href,
				label: label,
				icon: iconClass,
				active: isActive
			});
		}

		// ---- 2. Build the mobile menu panel ----
		var panel = document.createElement('div');
		panel.id = 'flavor-mobile-menu';

		// Logo at top
		var logoDiv = document.createElement('div');
		logoDiv.style.cssText = 'padding: 0 24px 16px; margin-bottom: 8px; border-bottom: 1px solid rgba(255,255,255,0.06);';
		var logoImg = document.createElement('img');
		logoImg.src = (document.querySelector('link[rel="stylesheet"][href*="flavor"]') || {}).href ?
			document.querySelector('link[rel="stylesheet"][href*="flavor"]').href.replace(/style\.css\.php.*/, 'img/gradient.png') :
			'theme/flavor/img/gradient.png';
		logoImg.style.cssText = 'height: 28px; width: auto;';
		logoDiv.appendChild(logoImg);
		panel.appendChild(logoDiv);

		// Section header
		var section = document.createElement('div');
		section.className = 'fm-section';
		section.textContent = 'Navegação';
		panel.appendChild(section);

		// Menu items
		if (menuItems.length === 0) {
			// Fallback if no menu items found
			var noItems = document.createElement('div');
			noItems.style.cssText = 'padding: 16px 24px; color: #64748B; font-size: 0.875rem;';
			noItems.textContent = 'Menu items not available';
			panel.appendChild(noItems);
		} else {
			for (var mi = 0; mi < menuItems.length; mi++) {
				var item = menuItems[mi];
				var a = document.createElement('a');
				a.href = item.href;
				if (item.active) a.className = 'active';

				var iconSpan = document.createElement('span');
				iconSpan.className = 'fm-icon';
				var iconI = document.createElement('i');
				iconI.className = item.icon;
				iconSpan.appendChild(iconI);

				var textSpan = document.createElement('span');
				textSpan.textContent = item.label;

				a.appendChild(iconSpan);
				a.appendChild(textSpan);
				panel.appendChild(a);
			}
		}

		// Divider + Quick links
		var divider = document.createElement('div');
		divider.className = 'fm-divider';
		panel.appendChild(divider);

		var section2 = document.createElement('div');
		section2.className = 'fm-section';
		section2.textContent = 'Atalhos';
		panel.appendChild(section2);

		// Logout link
		var logoutLink = document.querySelector('a[href*="logout"]');
		if (logoutLink) {
			var logoutA = document.createElement('a');
			logoutA.href = logoutLink.href;
			logoutA.innerHTML = '<span class="fm-icon"><i class="fas fa-sign-out-alt"></i></span><span>Terminar Sessão</span>';
			panel.appendChild(logoutA);
		}

		document.body.appendChild(panel);

		// ---- 3. Create Hamburger Button ----
		var burger = document.createElement('div');
		burger.id = 'flavor-hamburger';
		burger.innerHTML = '<span></span>';
		burger.title = 'Menu';
		document.body.appendChild(burger);

		// ---- 4. Toggle Logic ----
		burger.addEventListener('click', function (e) {
			e.stopPropagation();
			document.body.classList.toggle('flavor-menu-open');
		});

		// Close on click outside
		document.addEventListener('click', function (e) {
			if (document.body.classList.contains('flavor-menu-open')) {
				if (!panel.contains(e.target) && !burger.contains(e.target)) {
					document.body.classList.remove('flavor-menu-open');
				}
			}
		});

		// Close on Escape
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape') {
				document.body.classList.remove('flavor-menu-open');
			}
		});
	})();
});
