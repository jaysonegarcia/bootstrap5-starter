<?php
/**
 * The template for displaying archive pages.
 *
 * Used for category, tag, author, date, and custom post type archives.
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

			<header class="page-header mb-4">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description lead text-muted">', '</div>' );
				?>
			</header>

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
