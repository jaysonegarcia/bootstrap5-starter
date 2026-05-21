<?php
/**
 * The template for displaying search results pages.
 *
 * @package Bootstrap5_Starter
 */

get_header();
?>

<div class="row">
	<div class="<?php echo is_active_sidebar( 'sidebar-1' ) ? 'col-lg-8' : 'col-12'; ?>">

		<?php if ( have_posts() ) : ?>

			<header class="page-header mb-4">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'bootstrap5-starter' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header>

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'search' );
			endwhile;

			bs5_starter_pagination();
			?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</div>

	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
