=== Bootstrap 5 Starter ===
Contributors: hallowichig0
Tags: blog, one-column, two-columns, right-sidebar, custom-menu, featured-images, threaded-comments, translation-ready, block-styles, wide-blocks
Requires at least: 6.0
Tested up to: 6.7
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A clean, minimal WordPress starter theme built with Bootstrap 5. Perfect for beginners learning WordPress theme development.

== Description ==

Bootstrap 5 Starter is a classic, beginner-friendly WordPress theme that pairs the familiar WordPress template hierarchy with the popular Bootstrap 5 CSS framework. It is designed to be a clear, well-commented starting point — no build tools, no Composer, no npm required. Drop the folder into wp-content/themes/, activate, and start building.

= Highlights =

* Bootstrap 5.3 loaded from a public CDN — zero build step
* Custom Bootstrap 5 Nav Walker with dropdown support
* Two menu locations: Primary (header) and Footer
* Sidebar widget area with Bootstrap-friendly markup
* Bootstrap-styled pagination, search form, comment form
* Featured images, custom logo, threaded comments
* Block editor: theme.json with Bootstrap-colored palette, wide/full alignments, responsive embeds
* Translation ready (text domain: bootstrap5-starter)
* Accessibility: skip link, screen-reader-text utilities, ARIA attributes
* All output escaped, follows WordPress Coding Standards
* Heavily commented PHP — read the source to learn

== Installation ==

1. In your WordPress admin, go to Appearance > Themes > Add New > Upload Theme.
2. Upload bootstrap5-starter.zip and click Install Now.
3. Click Activate.

Alternatively, upload the bootstrap5-starter folder to /wp-content/themes/ via FTP, then activate from Appearance > Themes.

After activation:

* Go to Appearance > Menus and assign a menu to the "Primary Menu" location.
* Optionally add widgets in Appearance > Widgets.
* Optionally set a logo in Appearance > Customize > Site Identity.

== Frequently Asked Questions ==

= Does this theme require Bootstrap to be installed separately? =

No. Bootstrap 5.3 is loaded from a public CDN (jsDelivr) automatically. If you prefer to bundle Bootstrap locally, download bootstrap.min.css and bootstrap.bundle.min.js into the assets/css/ and assets/js/ folders and update the URLs in functions.php — instructions are in README.md.

= How do I add a dropdown menu? =

In Appearance > Menus, drag a menu item slightly to the right under a parent item. The parent automatically becomes a Bootstrap dropdown toggle.

= Is this theme compatible with WooCommerce? =

Yes. The theme declares WooCommerce support and ships with a woocommerce.php wrapper that places shop pages inside the theme container. Individual product templates fall back to WooCommerce defaults.

= How do I customize colors? =

Use Appearance > Customize > Additional CSS for small tweaks, or override Bootstrap CSS variables like --bs-primary. For block editor color presets, edit theme.json.

= Where do I report bugs or suggest features? =

Open an issue at the GitHub repository linked in the theme description.

== Changelog ==

= 1.0.0 - 2026-05-21 =
* Initial release.

== Copyright ==

Bootstrap 5 Starter, (C) 2026 Jayson Garcia.
Bootstrap 5 Starter is distributed under the terms of the GNU GPL v2 or later.

This theme bundles no third-party assets. It loads Bootstrap from a remote CDN:

* Bootstrap (https://getbootstrap.com/), Copyright 2011-2024 The Bootstrap Authors, licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE).
