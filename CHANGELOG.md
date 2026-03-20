# Changelog

All notable changes to the **Flavor Theme** will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/).

---

## [1.1.0] — 2026-03-20

### Added

#### Topbar Title System

- Page title moved from body to a fixed topbar element
- CSS-only hiding of body title (no JS flash on refresh)
- Responsive: hides topbar title on mobile (≤1024px)

#### Unique Sidebar Icons

- 12 native menus now have creative, non-repeating FontAwesome icons
- 27+ auto-detected modules get contextual icons (no more `fa-puzzle-piece`)
- Smart `$moduleIconDefaults` map with icon + label pairs
- Unknown modules fall back to `fa-layer-group` instead of `fa-puzzle-piece`

#### Theme-Colored Action Buttons

- Quick-add (+) button: indigo filled circle with scale + shadow hover
- List/Kanban view toggles: ghost indigo style with border
- Selected toggle: filled indigo with white icon
- Hover darkens (#4F46E5), active goes deeper (#3730A3)

### Improved

#### Icon Manager (`setup.php`)

- Pre-seed loop ensures all 12 native menus always appear in config
- Auto-detect inserts both icon AND human-readable label from defaults map
- Works even when modules are not active in `llx_menu`

#### Content Area

- Eliminated persistent gap caused by hidden title elements
- Reduced `#id-right` top padding to 8px
- Title bar kept visible (compact) to preserve action buttons

### Fixed

- Action buttons (+, list/kanban) no longer hidden with title
- Topbar title no longer overlaps sidebar indigo background
- No more title flash on page refresh

---

## [1.0.0] — 2026-03-18

### Added

#### NovaDX Design System

- Modern SaaS-style UI with glassmorphism, gradients, and rounded corners
- Inter + Plus Jakarta Sans font stack
- Curated color palette with indigo, emerald, teal, and slate tones
- Micro-animations and smooth hover transitions across all components

#### Login Page

- Premium glassmorphism card with frosted-glass effect
- Gradient background with animated floating particles
- Custom brand logo integration
- Modern input fields with focus states and icons

#### Top Bar & Sidebar

- Clean white top bar with colorized icons (star, printer, help, user photo)
- Rounded sidebar with NovaDX-styled menu items
- Smooth hover and active state transitions

#### Cards & Forms

- Unified white card appearance across view and edit modes
- Consistent rounded corners including edit mode (overflow: hidden fix)
- Modern input fields, selects, and textareas with focus ring effects
- Custom checkbox styling with green checkmark indicator

#### TakePOS Modernization

- Payment modal: modern numpad (slate design), color-coded payment methods
- Split sale modal: indigo gradient card headers, zebra row hover effects
- Discount modal: refined action buttons with NovaDX gradients
- All modal styles scoped to popup iframes only (`body:not(.bodytakepos)`)

#### Notification System

- Unified modern notifications via jNotify (legacy `div.error` hidden)
- Color-coded notification types (red/amber/green accent borders)
- Slide-in animation from right
- Accessible close button with hover state

#### White-labeling

- `flavor.js` — JavaScript text replacement (Dolibarr → Dolisys)
- `dolisaas-ui.js` — Additional UI enhancements
- CSS-only branding with no core file modifications

#### Setup Panel (`setup.php`)

- One-click white-labeling activation (ALLOW_THEME_JS)
- Menu Manager — hide/show 12 main sidebar menus
- Admin Tools Submenu Control — granular visibility for 19 items
- Module Setup Tabs Manager — hide Find external, Deploy, Develop tabs
- Security Lock — `flavor.lock` blocks access after configuration
- Modern SaaS-style UI with card layout and interactive checkboxes

#### Time & Date Fields

- Explicit visibility fix for time selector fields (dark text, white background)

#### Title & Spacing

- Improved title margin/padding for better visual separation
- Unified title bar and content area into single white card appearance
