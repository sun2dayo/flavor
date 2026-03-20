# 🎨 Flavor Theme for Dolibarr ERP/CRM

A modern SaaS-style theme that transforms the Dolibarr interface with a premium, polished design system — **NovaDX**.

![Dolibarr](https://img.shields.io/badge/Dolibarr-22.0.4+-blue?style=flat-square)
![License](https://img.shields.io/badge/License-GPL--3.0-green?style=flat-square)
![Version](https://img.shields.io/badge/Version-1.1.0-orange?style=flat-square)

---

## ✨ Features

### Design System (NovaDX)

- **Glassmorphism & Gradients** — Subtle frosted-glass effects with vibrant, curated color palettes
- **Rounded Corners** — Consistent `border-radius` across cards, inputs, buttons, and modals
- **Modern Typography** — Inter + Plus Jakarta Sans font stack
- **Micro-animations** — Smooth hover effects, transitions, and slide-in animations
- **Dark Vibrant Top Bar Icons** — Colorized icons for maximum visibility

### Topbar Title System

- **Smart Title Relocation** — Page title moves from body to fixed topbar element
- **CSS-only Hiding** — No JavaScript flash on refresh; pure CSS approach
- **Action Buttons Preserved** — Quick-add (+), list/kanban view toggles stay visible

### Unique Sidebar Icons

- **39 Creative Icons** — 12 native menus + 27 known modules with unique, contextual FontAwesome icons
- **Smart Auto-detect** — New modules get intelligent icon suggestions instead of generic puzzle-piece
- **User Customizable** — Default icons can be changed anytime via the Icon Manager

### Theme-Colored Action Buttons

- **Quick-add (+)** — Indigo filled circle with scale + shadow hover animation
- **View Toggles** — Ghost indigo list/kanban buttons with hover and active states
- **Selected State** — Filled indigo with white icon for active view mode

### White-labeling

- **Text Replacement** — Replaces all "Dolibarr" references with your brand name via `flavor.js`
- **Custom Logo Support** — Drop your logos in `img/` directory
- **CSS-only Branding** — All visual changes are CSS-driven, no core files modified

### TakePOS Modernization

- **Payment Modal** — Modern numpad with slate design, color-coded payment methods (cash, check, card, transfer)
- **Split Sale Modal** — Clean card layout with indigo gradient headers
- **Discount Modal** — Refined action buttons with NovaDX styling
- *All modal styles scoped to popups only — main sales page untouched*

### Advanced Setup Panel (`setup.php`)

- **Icon Manager** — Customize FontAwesome icons and labels for all sidebar menus
- **Menu Manager** — Hide/show any of the 12 main sidebar menus
- **Admin Tools Control** — Granular visibility for all 19 Admin Tools submenu items
- **Module Tabs Manager** — Hide external modules, deploy, and develop tabs
- **Security Lock** — Lock the setup page with `flavor.lock` after configuration

### Notification System

- **Unified Alerts** — Single modern notification (jNotify) with slide-in animation
- **Color-coded Types** — Red for errors, amber for warnings, green for success
- **Close Button** — Accessible `×` button with hover effects

---

## 📦 Installation

1. **Copy** the `flavor/` folder into your Dolibarr `htdocs/theme/` directory:

   ```
   htdocs/theme/flavor/
   ```

2. **Activate** the theme in Dolibarr:
   - Go to **Home → Setup → Display**
   - Select **Flavor** as the active theme

3. **Run Database Installer** (required, one-time):
   - Visit `http://your-dolibarr/theme/flavor/install.php`
   - Creates the `llx_flavor_config` table and seeds default icon mappings
   - Auto-locks after successful installation

4. **Run Setup** (optional but recommended):
   - Visit `http://your-dolibarr/theme/flavor/setup.php`
   - Customize sidebar icons and labels
   - Activate white-labeling
   - Configure menu visibility
   - Lock the setup page when done

---

## 🗂️ File Structure

```
flavor/
├── global.inc.php          # Main CSS — all NovaDX styles
├── style.css.php           # CSS entry point (loads global.inc.php)
├── theme_vars.inc.php      # Color & font variable definitions
├── setup.php               # Admin setup panel (Icon + Menu Manager)
├── install.php             # One-time DB installer (creates llx_flavor_config)
├── install.lock            # Install lock (auto-created after install)
├── flavor.js               # JS white-labeling + sidebar icon replacement
├── dolisaas-ui.js           # Additional UI enhancements
├── flavor_hidden.css        # Auto-generated menu visibility rules
├── flavor.lock              # Security lock file (created via setup)
├── thumb.png               # Theme thumbnail
├── img/                    # Theme images & icons
├── tpl/                    # Template overrides
└── *.inc.php               # Component-specific style includes
```

---

## ⚙️ Configuration

### Menu Visibility

The setup panel allows hiding menus by generating `flavor_hidden.css` with CSS `display: none` rules. The file is loaded automatically by `style.css.php`.

### Security Lock

After configuration, create `flavor.lock` to block access to `setup.php`. Delete the file to regain access.

---

## 🔧 Compatibility

| Component   | Version     |
|-------------|-------------|
| Dolibarr    | 22.0.4+     |
| PHP         | 7.4+        |
| Browsers    | Chrome, Firefox, Edge, Safari (latest) |

---

## 📄 License

This theme is distributed under the **GNU General Public License v3.0**.

---

## 👨‍💻 Author

**Octavio Daio** — [NovaDX](https://novadx.pt)
📧 [ola@novadx.pt](mailto:ola@novadx.pt)
