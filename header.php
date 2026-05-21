<?php
/**
 * The header for our theme.
 *
 * Displays everything up to and including the <main> opening tag,
 * plus the Bootstrap 5 navbar populated by the "Primary" menu.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootstrap5_Starter
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site d-flex flex-column min-vh-100">

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'bootstrap5-starter' ); ?></a>

	<header id="masthead" class="site-header">
		<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
			<div class="container">

				<?php if ( has_custom_logo() ) : ?>
					<div class="site-logo me-3">
						<?php the_custom_logo(); ?>
					</div>
				<?php endif; ?>

				<a class="navbar-brand site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>

				<button
					class="navbar-toggler"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#primary-navigation"
					aria-controls="primary-navigation"
					aria-expanded="false"
					aria-label="<?php esc_attr_e( 'Toggle navigation', 'bootstrap5-starter' ); ?>"
				>
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="primary-navigation">
					<?php
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container'       => false,
								'menu_class'      => 'navbar-nav ms-auto mb-2 mb-lg-0',
								'fallback_cb'     => false,
								'depth'           => 2,
								'walker'          => new BS5_Nav_Walker(),
							)
						);
					} else {
						echo '<ul class="navbar-nav ms-auto">';
						echo '<li class="nav-item"><a class="nav-link" href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Set up a menu in Appearance → Menus', 'bootstrap5-starter' ) . '</a></li>';
						echo '</ul>';
					}
					?>
				</div>
			</div>
		</nav>
	</header><!-- #masthead -->

	<main id="primary" class="site-main flex-grow-1 py-4">
		<div class="container">
