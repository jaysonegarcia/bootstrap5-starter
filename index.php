<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme — used when
 * no more specific template matches a given query (per the template hierarchy).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootstrap5_Starter
 */

get_header();
?>

<div class="row">
	<div class="<?php echo is_active_sidebar( 'sidebar-1' ) ? 'col-lg-8' : 'col-12'; ?>">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header class="page-header mb-4">
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );
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
