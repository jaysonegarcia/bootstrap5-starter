<?php
/**
 * Functions which enhance the theme by hooking into WordPress core.
 *
 * @package Bootstrap5_Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array Filtered classes.
 */
function bs5_starter_body_classes( $classes ) {
	// Helper class so CSS can target the sidebar layout.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Helper class so CSS can target sites with no active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'bs5_starter_body_classes' );

/**
 * Add a pingback URL auto-discovery header for single posts, pages, or attachments.
 *
 * @return void
 */
function bs5_starter_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'bs5_starter_pingback_header' );

/**
 * Style the WordPress-generated password protected post form with Bootstrap classes.
 *
 * @param string $output Original form HTML.
 * @return string Modified form HTML.
 */
function bs5_starter_password_form( $output ) {
	$output = str_replace( '<input name="post_password"', '<input class="form-control" name="post_password"', $output );
	$output = str_replace( '<input type="submit"', '<input class="btn btn-primary" type="submit"', $output );
	return $output;
}
add_filter( 'the_password_form', 'bs5_starter_password_form' );

/**
 * Wrap WordPress galleries in a Bootstrap row by adding column classes.
 *
 * Kept simple — overriding too much breaks the block editor preview.
 *
 * @param string $excerpt The post excerpt.
 * @return string
 */
function bs5_starter_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}
	return '&hellip;';
}
add_filter( 'excerpt_more', 'bs5_starter_excerpt_more' );
