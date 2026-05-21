<?php
/**
 * The template for displaying the footer.
 *
 * Closes off the main / page wrappers opened in header.php and renders
 * the site footer with an optional footer menu.
 *
 * @package Bootstrap5_Starter
 */

?>
		</div><!-- .container -->
	</main><!-- #primary -->

	<footer id="colophon" class="site-footer mt-auto">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<p class="mb-2">
						<?php
						printf(
							/* translators: 1: year, 2: site name */
							esc_html__( '&copy; %1$s %2$s. All rights reserved.', 'bootstrap5-starter' ),
							esc_html( gmdate( 'Y' ) ),
							esc_html( get_bloginfo( 'name' ) )
						);
						?>
					</p>
					<p class="small text-muted mb-0">
						<?php
						printf(
							/* translators: %s: theme name with link */
							esc_html__( 'Powered by WordPress &middot; Theme: %s', 'bootstrap5-starter' ),
							'<a href="https://github.com/jaysonegarcia/bootstrap5-starter">Bootstrap 5 Starter</a>'
						);
						?>
					</p>
				</div>

				<?php if ( has_nav_menu( 'footer' ) ) : ?>
					<div class="col-md-6">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
								'container'      => 'nav',
								'container_class' => 'footer-navigation',
								'menu_class'     => 'list-inline mb-0 text-md-end',
								'depth'          => 1,
								'fallback_cb'    => false,
								'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
								'link_before'    => '<span class="list-inline-item me-3">',
								'link_after'     => '</span>',
							)
						);
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
