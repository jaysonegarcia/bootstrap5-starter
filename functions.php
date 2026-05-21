<?php
/**
 * Bootstrap 5 Starter — functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bootstrap5_Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define theme version constant for cache busting on enqueued assets.
 * Bumping the version invalidates browser caches for theme CSS/JS.
 */
if ( ! defined( 'BS5_STARTER_VERSION' ) ) {
	define( 'BS5_STARTER_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Hooked to after_setup_theme so it runs before init.
 *
 * @return void
 */
function bs5_starter_setup() {
	/*
	 * Make the theme available for translation.
	 * Translations can be placed in the /languages/ folder.
	 */
	load_theme_textdomain( 'bootstrap5-starter', get_template_directory() . '/languages' );

	// Let WordPress manage the document title via wp_head.
	add_theme_support( 'title-tag' );

	// Enable featured images on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Switch core markup (search form, comment form, etc.) to valid HTML5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Custom logo support (uploadable from Appearance → Customize).
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	// Block editor: wide and full alignments.
	add_theme_support( 'align-wide' );

	// Block editor: responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Block editor: default core block styles (button hover, gallery, etc.).
	add_theme_support( 'wp-block-styles' );

	// Block editor: load editor stylesheet inside the editor iframe.
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor-style.css' );

	// WooCommerce support — see woocommerce.php for the wrapper template.
	add_theme_support( 'woocommerce' );

	// Register the primary navigation menu location.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'bootstrap5-starter' ),
			'footer'  => esc_html__( 'Footer Menu', 'bootstrap5-starter' ),
		)
	);
}
add_action( 'after_setup_theme', 'bs5_starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function bs5_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bs5_starter_content_width', 1140 );
}
add_action( 'after_setup_theme', 'bs5_starter_content_width', 0 );

/**
 * Register the sidebar widget area.
 *
 * @return void
 */
function bs5_starter_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bootstrap5-starter' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'bootstrap5-starter' ),
			'before_widget' => '<section id="%1$s" class="widget mb-4 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title h5">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'bs5_starter_widgets_init' );

/**
 * Enqueue scripts and styles.
 *
 * Bootstrap 5 is loaded from jsDelivr CDN — no build step required.
 * To bundle Bootstrap locally, download the files into /assets/ and
 * swap the URLs below for local ones via get_template_directory_uri().
 *
 * @return void
 */
function bs5_starter_scripts() {
	// Bootstrap 5 CSS (from CDN).
	wp_enqueue_style(
		'bootstrap',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
		array(),
		'5.3.3'
	);

	// Theme stylesheet (style.css). Depends on Bootstrap so it loads after.
	wp_enqueue_style(
		'bootstrap5-starter-style',
		get_stylesheet_uri(),
		array( 'bootstrap' ),
		BS5_STARTER_VERSION
	);

	// Bootstrap 5 JS bundle (includes Popper) — loaded in footer.
	wp_enqueue_script(
		'bootstrap',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
		array(),
		'5.3.3',
		true
	);

	// Threaded comments support — only loaded on singular posts/pages with comments open.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bs5_starter_scripts' );

/**
 * Custom Bootstrap 5 nav walker for wp_nav_menu().
 */
require get_template_directory() . '/inc/class-bs5-nav-walker.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Miscellaneous theme functions and tweaks.
 */
require get_template_directory() . '/inc/template-functions.php';
