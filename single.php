<?php
/**
 * The template for displaying all single posts.
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

			get_template_part( 'template-parts/content', get_post_type() );

			// Previous/next post navigation.
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( '&laquo; Previous', 'bootstrap5-starter' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next &raquo;', 'bootstrap5-starter' ) . '</span> <span class="nav-title">%title</span>',
					'class'     => 'post-navigation my-4',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
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
