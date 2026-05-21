# Bootstrap 5 Starter — WordPress Theme

A clean, minimal **WordPress starter theme** built with **Bootstrap 5**.
Designed for beginners — no build tools, no Composer, no npm. Just drop it into your `wp-content/themes/` folder and go.

> Think of it as a friendly, well-commented blank canvas. Read the code, change what you need, and you'll learn how WordPress themes work along the way.

---

## Table of Contents

1. [Features](#features)
2. [Requirements](#requirements)
3. [Installation](#installation)
4. [Quick Start (your first 5 minutes)](#quick-start-your-first-5-minutes)
5. [What's Inside (file by file)](#whats-inside-file-by-file)
6. [Customizing the Theme](#customizing-the-theme)
   - [Change colors and fonts](#change-colors-and-fonts)
   - [Add a logo](#add-a-logo)
   - [Set up menus](#set-up-menus)
   - [Add widgets to the sidebar](#add-widgets-to-the-sidebar)
   - [Switch from CDN to local Bootstrap](#switch-from-cdn-to-local-bootstrap)
7. [Translation Ready](#translation-ready)
8. [WordPress Standards Compliance](#wordpress-standards-compliance)
9. [Frequently Asked Questions](#frequently-asked-questions)
10. [Roadmap / Ideas](#roadmap--ideas)
11. [Contributing](#contributing)
12. [License](#license)

---

## Features

- **Bootstrap 5.3** loaded from jsDelivr CDN (zero build step)
- Fully **responsive** layout out of the box
- **Bootstrap 5 Nav Walker** — your WordPress menu becomes a real Bootstrap navbar with working dropdowns
- **Threaded comments** with a Bootstrap-styled comment form
- **Featured image** support on posts and pages
- **Custom logo** support (set it from Appearance → Customize)
- **Two menu locations**: Primary (header) and Footer
- **Sidebar widget area** with Bootstrap-friendly markup
- **Bootstrap-styled pagination** for archives
- **Translation ready** (`/languages/` folder, full text domain `bootstrap5-starter`)
- **Accessibility**: skip link, screen-reader-text utilities, ARIA attributes
- **Block editor support**: wide alignments, responsive embeds
- Follows **[WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/)**
- Heavily commented PHP — read the source to learn

---

## Requirements

| Requirement     | Minimum  | Recommended |
| --------------- | -------- | ----------- |
| WordPress       | 6.0      | 6.7+        |
| PHP             | 7.4      | 8.1+        |
| MySQL / MariaDB | 5.7 / 10 | latest      |
| Browser         | any modern browser (Chrome, Firefox, Safari, Edge) |

No Node, npm, Composer, or build tools required.

---

## Installation

### Option A — Upload via the WordPress admin (easiest)

1. Download or zip this folder so you have `bootstrap5-starter.zip`.
2. In WordPress: **Appearance → Themes → Add New → Upload Theme**.
3. Choose `bootstrap5-starter.zip` and click **Install Now**.
4. Click **Activate**.

### Option B — Copy the folder manually

1. Copy the entire `bootstrap5-starter/` folder into your WordPress installation at:
   ```
   wp-content/themes/bootstrap5-starter/
   ```
2. In WordPress: **Appearance → Themes** → hover over "Bootstrap 5 Starter" → **Activate**.

### Option C — Clone with git (developer-friendly)

```bash
cd wp-content/themes/
git clone https://github.com/jaysonegarcia/bootstrap5-starter.git
```

Then activate from **Appearance → Themes**.

---

## Quick Start (your first 5 minutes)

1. **Activate the theme** (see above).
2. **Create a Primary menu**: go to **Appearance → Menus**, add some pages, set its "Display location" to **Primary Menu**, and save.
3. **Visit your site** — you'll see a Bootstrap navbar with your menu, your posts in cards, and a sidebar.
4. **Add widgets** (optional): go to **Appearance → Widgets** and drop a Search widget into the Sidebar area.
5. **Add a logo** (optional): go to **Appearance → Customize → Site Identity** and upload one.

You now have a working Bootstrap 5 site. Read on to customize.

---

## What's Inside (file by file)

```
bootstrap5-starter/
├── style.css                    Theme header (required by WordPress) + custom CSS
├── functions.php                Theme setup, asset enqueuing, menu/widget registration
├── index.php                    Default template (fallback for any view)
├── header.php                   Site header + Bootstrap navbar
├── footer.php                   Site footer + copyright + footer menu
├── sidebar.php                  Sidebar widget area
├── single.php                   Single blog post view
├── page.php                     Single page view
├── archive.php                  Category/tag/author/date archive view
├── search.php                   Search results view
├── searchform.php               Bootstrap-styled search form
├── 404.php                      "Page not found" view
├── comments.php                 Comment list and comment form
├── README.md                    You are here
├── LICENSE                      GPL v2 (same as WordPress)
├── .gitignore
├── inc/
│   ├── class-bs5-nav-walker.php   Converts WP menus to Bootstrap navbar markup
│   ├── template-tags.php          Reusable display functions (date, author, pagination)
│   └── template-functions.php     Hook-based tweaks (body classes, password form, etc.)
├── template-parts/
│   ├── content.php                Post card markup (used by index/archive/single)
│   ├── content-page.php           Page markup
│   ├── content-search.php         Search result markup
│   └── content-none.php           "Nothing found" message
├── assets/
│   ├── css/                       (Optional) place local Bootstrap CSS here
│   └── js/                        (Optional) place local Bootstrap JS here
└── languages/                     Translation files (.pot, .po, .mo) go here
```

Every PHP file has a docblock at the top explaining what it does. **Open them and read** — they're short and friendly.

---

## Customizing the Theme

### Change colors and fonts

The fastest path:

- Use the **WordPress Customizer**: **Appearance → Customize → Additional CSS** and add overrides:
  ```css
  :root {
    --bs-primary: #6f42c1;   /* change Bootstrap's primary color */
  }
  body { font-family: 'Georgia', serif; }
  ```

For more control, edit `style.css` directly.

### Add a logo

**Appearance → Customize → Site Identity → Select Logo**. The theme already supports it via `add_theme_support( 'custom-logo' )` in `functions.php`.

### Set up menus

1. **Appearance → Menus**
2. Click **Create a new menu**, name it (e.g. "Main Nav"), then **Create**.
3. Add pages or custom links from the left.
4. Under **Menu Settings → Display location**, check **Primary Menu** (or **Footer Menu**).
5. **Save Menu**.

**Dropdowns:** drag a menu item slightly to the right under a parent — it'll become a Bootstrap dropdown.

**Special menu item classes** (Screen Options → CSS Classes):
- `divider` or `dropdown-divider` — adds a horizontal rule inside a dropdown
- `dropdown-header` — turns the item into a non-clickable header
- `disabled` — visually disables the item

### Add widgets to the sidebar

**Appearance → Widgets → Sidebar**. Drop in any widget — Bootstrap's spacing is applied automatically. The sidebar appears on the right (1/3 column) on archive and single views when at least one widget is active.

### Switch from CDN to local Bootstrap

If your site needs to work offline or you don't want to depend on a CDN:

1. Download Bootstrap 5.3.x from <https://getbootstrap.com/docs/5.3/getting-started/download/>
2. Copy `bootstrap.min.css` into `assets/css/`
3. Copy `bootstrap.bundle.min.js` into `assets/js/`
4. Open `functions.php` and find `bs5_starter_scripts()`. Replace the CDN URLs:

   ```php
   wp_enqueue_style(
       'bootstrap',
       get_template_directory_uri() . '/assets/css/bootstrap.min.css',
       array(),
       '5.3.3'
   );

   wp_enqueue_script(
       'bootstrap',
       get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js',
       array(),
       '5.3.3',
       true
   );
   ```

That's it — no rebuild needed.

---

## Translation Ready

The text domain is `bootstrap5-starter`. To translate the theme into your language:

1. Use a tool like **[Poedit](https://poedit.net/)** or **[Loco Translate](https://wordpress.org/plugins/loco-translate/)** (WordPress plugin).
2. Generate a `.po` / `.mo` file (e.g., `bootstrap5-starter-es_ES.po`).
3. Place it in the `languages/` folder.

All user-facing strings in the theme are wrapped in `__()`, `_e()`, `esc_html__()`, etc.

---

## WordPress Standards Compliance

This theme aims to follow the [WordPress Theme Handbook](https://developer.wordpress.org/themes/) requirements:

- **Required files**: `style.css` (with proper header), `index.php`
- **Standard template hierarchy**: single, page, archive, search, 404, comments
- **`get_template_part()`** for reusable markup
- **`wp_head()` and `wp_footer()`** hooks called
- **`wp_body_open()`** hook called immediately after `<body>`
- **All output escaped** with `esc_html()`, `esc_attr()`, `esc_url()`, `wp_kses_post()`, etc.
- **Internationalized**: text domain on every string, loaded via `load_theme_textdomain()`
- **Pluggable functions** wrapped in `function_exists()` checks
- **Defined constants** for theme version
- **`ABSPATH` guard** at the top of every PHP file (prevents direct access)
- **No deprecated functions**
- **`add_theme_support()`** for title-tag, post-thumbnails, html5, automatic-feed-links, custom-logo, align-wide, responsive-embeds
- **Content width** declared
- **GPL v2-or-later license**

---

## Frequently Asked Questions

**Q: Do I need to know PHP to use this theme?**
A: No, but a tiny bit helps if you want to customize templates. The HTML is plain enough to tweak.

**Q: Can I use this for a client project / commercial site?**
A: Yes. GPL v2 lets you use, modify, and redistribute, even commercially.

**Q: Where do I put my custom CSS?**
A: For small tweaks, **Appearance → Customize → Additional CSS** is perfect. For larger changes, edit `style.css` — but consider creating a **[child theme](https://developer.wordpress.org/themes/advanced-topics/child-themes/)** so updates don't overwrite your changes.

**Q: How do I add a custom page template (e.g. a full-width landing page)?**
A: Create a new file at `templates/page-landing.php` (or any name starting with `page-`), add this header:
```php
<?php
/**
 * Template Name: Landing Page
 */
```
Then select it from the **Page Attributes** box when editing a page.

**Q: Bootstrap's JS isn't working — why?**
A: Open your browser DevTools → Console. The most common cause is a plugin loading an old jQuery + Bootstrap 4 alongside. Bootstrap 5 doesn't need jQuery; check that no other plugin is bundling Bootstrap 4.

**Q: Is this theme compatible with WooCommerce / Elementor / [plugin X]?**
A: It's plain WordPress, so generally yes. WooCommerce works out of the box but won't have themed product templates — you'd need to add `woocommerce.php` or override individual templates. Elementor and other builders work fine since they replace the content area.

---

## Roadmap / Ideas

- [ ] Optional `woocommerce.php` template for shop sites
- [ ] Block patterns (hero, feature grid, testimonials)
- [ ] `theme.json` for global styles in the block editor
- [ ] Dark mode toggle using Bootstrap 5.3's color modes
- [ ] CLI scaffolder (`npx create-bootstrap5-starter my-theme`)

Open an issue or PR if you'd like to contribute!

---

## Contributing

1. Fork the repository
2. Create a branch (`git checkout -b feat/my-feature`)
3. Make your changes following [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/)
4. Run `php -l` on any PHP file you changed to check for syntax errors
5. Submit a pull request

---

## License

This theme is licensed under the **GNU General Public License v2 or later** — the same license as WordPress itself.

See the [LICENSE](LICENSE) file for the full text, or read it online: <https://www.gnu.org/licenses/gpl-2.0.html>

**Bootstrap 5** is distributed separately under the MIT License — © Twitter, Inc. & The Bootstrap Authors. See <https://github.com/twbs/bootstrap/blob/main/LICENSE>.

---

Made with care for the WordPress community.
Have fun building!
