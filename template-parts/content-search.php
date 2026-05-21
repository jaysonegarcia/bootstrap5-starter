<?php
/**
 * Template part for displaying results in search.php.
 *
 * @package Bootstrap5_Starter
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-4 pb-3 border-bottom' ); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title h4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta small text-muted mb-2">
				<?php bs5_starter_posted_on(); ?>
			</div>
		<?php endif; ?>
	</header>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
</article>
