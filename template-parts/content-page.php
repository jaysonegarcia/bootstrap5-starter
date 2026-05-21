<?php
/**
 * Template part for displaying a single page.
 *
 * @package Bootstrap5_Starter
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header mb-4">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<?php bs5_starter_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links mt-3">' . esc_html__( 'Pages:', 'bootstrap5-starter' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer mt-3">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: page title */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'bootstrap5-starter' ),
						array( 'span' => array( 'class' => array() ) )
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer>
	<?php endif; ?>
</article>
