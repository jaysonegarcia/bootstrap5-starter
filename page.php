<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages and that other "pages" on your
 * WordPress site may use a different template.
 *
 * @package Bootstrap5_Starter
 */

get_header();
?>

<div class="row">
	<div class="<?php echo is_active_sidebar( 'sidebar-1' ) ? 'col-lg-8' : 'col-lg-10 mx-auto'; ?>">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

		endwhile;
		?>

	</div>

	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
