<?php
/**
 * Template part for displaying posts.
 *
 * Used by index.php, archive.php, and single.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootstrap5_Starter
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'card mb-4 shadow-sm' ); ?>>

	<?php bs5_starter_post_thumbnail(); ?>

	<div class="card-body">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title card-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title card-title h4"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta mb-3">
					<?php
					bs5_starter_posted_on();
					bs5_starter_posted_by();
					?>
				</div>
			<?php endif; ?>
		</header>

		<div class="entry-content">
			<?php
			if ( is_singular() ) {
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: post title */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bootstrap5-starter' ),
							array( 'span' => array( 'class' => array() ) )
						),
						wp_kses_post( get_the_title() )
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links mt-3">' . esc_html__( 'Pages:', 'bootstrap5-starter' ),
						'after'  => '</div>',
					)
				);
			} else {
				the_excerpt();
				echo '<a class="btn btn-outline-primary btn-sm mt-2" href="' . esc_url( get_permalink() ) . '">' . esc_html__( 'Read more', 'bootstrap5-starter' ) . '</a>';
			}
			?>
		</div>

		<footer class="entry-footer mt-3">
			<?php bs5_starter_entry_footer(); ?>
		</footer>
	</div>
</article>
