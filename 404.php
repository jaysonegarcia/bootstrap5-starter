<?php
/**
 * The template for displaying 404 (page-not-found) pages.
 *
 * @package Bootstrap5_Starter
 */

get_header();
?>

<section class="error-404 not-found text-center py-5">
	<header class="page-header">
		<h1 class="display-1 fw-bold">404</h1>
		<h2 class="page-title h3 mb-4"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bootstrap5-starter' ); ?></h2>
	</header>

	<div class="page-content">
		<p class="lead mb-4">
			<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'bootstrap5-starter' ); ?>
		</p>

		<div class="row justify-content-center">
			<div class="col-md-6">
				<?php get_search_form(); ?>
			</div>
		</div>

		<p class="mt-4">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-outline-primary">
				<?php esc_html_e( '&larr; Back to Home', 'bootstrap5-starter' ); ?>
			</a>
		</p>
	</div>
</section>

<?php
get_footer();
