<?php
/**
 * Template part for displaying a message when posts are not found.
 *
 * @package Bootstrap5_Starter
 */

?>
<section class="no-results not-found alert alert-info">
	<header class="page-header">
		<h2 class="page-title h4"><?php esc_html_e( 'Nothing Found', 'bootstrap5-starter' ); ?></h2>
	</header>

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p>
				<?php
				printf(
					wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'bootstrap5-starter' ),
						array( 'a' => array( 'href' => array() ) )
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
				?>
			</p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bootstrap5-starter' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bootstrap5-starter' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div>
</section>
