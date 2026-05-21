<?php
/**
 * Customizer settings for the theme.
 *
 * Adds an admin-editable "Footer" section under Appearance > Customize so
 * site owners can change the footer copyright text and toggle the theme
 * credit line without editing PHP.
 *
 * @package Bootstrap5_Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Customizer panels, sections, settings, and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager instance.
 * @return void
 */
function bs5_starter_customize_register( $wp_customize ) {

	// Footer section.
	$wp_customize->add_section(
		'bs5_starter_footer',
		array(
			'title'       => __( 'Footer', 'bootstrap5-starter' ),
			'description' => __( 'Edit the text shown in the site footer.', 'bootstrap5-starter' ),
			'priority'    => 130,
		)
	);

	// Setting: copyright text.
	$wp_customize->add_setting(
		'bs5_starter_footer_copyright',
		array(
			'default'           => '&copy; [year] [site_name]. All rights reserved.',
			'sanitize_callback' => 'wp_kses_post',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'bs5_starter_footer_copyright',
		array(
			'label'       => __( 'Copyright text', 'bootstrap5-starter' ),
			'description' => __( 'Use [year] for the current year and [site_name] for your Site Title. Basic HTML is allowed.', 'bootstrap5-starter' ),
			'section'     => 'bs5_starter_footer',
			'type'        => 'textarea',
		)
	);

	// Setting: show theme credit.
	$wp_customize->add_setting(
		'bs5_starter_footer_credit',
		array(
			'default'           => true,
			'sanitize_callback' => 'bs5_starter_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'bs5_starter_footer_credit',
		array(
			'label'       => __( 'Show "Powered by WordPress" credit', 'bootstrap5-starter' ),
			'description' => __( 'Uncheck to hide the small theme attribution line below the copyright.', 'bootstrap5-starter' ),
			'section'     => 'bs5_starter_footer',
			'type'        => 'checkbox',
		)
	);
}
add_action( 'customize_register', 'bs5_starter_customize_register' );

/**
 * Sanitize a checkbox value to a strict boolean.
 *
 * @param mixed $checked Raw input value from the Customizer.
 * @return bool
 */
function bs5_starter_sanitize_checkbox( $checked ) {
	return ( isset( $checked ) && true === (bool) $checked );
}

/**
 * Return the footer copyright text with [year] and [site_name] tokens replaced.
 *
 * @return string Safe HTML ready for echo.
 */
function bs5_starter_get_footer_copyright() {
	$default = '&copy; [year] [site_name]. All rights reserved.';
	$text    = (string) get_theme_mod( 'bs5_starter_footer_copyright', $default );

	$text = str_replace(
		array( '[year]', '[site_name]' ),
		array( esc_html( gmdate( 'Y' ) ), esc_html( get_bloginfo( 'name' ) ) ),
		$text
	);

	return wp_kses_post( $text );
}

/**
 * Whether to render the "Powered by WordPress" credit line.
 *
 * @return bool
 */
function bs5_starter_show_footer_credit() {
	return (bool) get_theme_mod( 'bs5_starter_footer_credit', true );
}
