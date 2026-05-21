<?php
/**
 * Custom template tags for this theme.
 *
 * These are reusable functions used in template files to display
 * post meta information (date, author, categories, tags, comments).
 * Keeping them here keeps templates clean and easy to read.
 *
 * @package Bootstrap5_Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'bs5_starter_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function bs5_starter_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on">%1$s <a href="%2$s" rel="bookmark">%3$s</a></span>',
			esc_html_x( 'Posted on', 'post date', 'bootstrap5-starter' ),
			esc_url( get_permalink() ),
			$time_string // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped above.
		);
	}
endif;

if ( ! function_exists( 'bs5_starter_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function bs5_starter_posted_by() {
		printf(
			'<span class="byline"> %1$s <span class="author vcard"><a class="url fn n" href="%2$s">%3$s</a></span></span>',
			esc_html_x( 'by', 'post author', 'bootstrap5-starter' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
endif;

if ( ! function_exists( 'bs5_starter_entry_footer' ) ) :
	/**
	 * Prints categories, tags, and comment link for the current post.
	 */
	function bs5_starter_entry_footer() {
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'bootstrap5-starter' ) );
			if ( $categories_list ) {
				printf(
					'<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'bootstrap5-starter' ) . '</span>',
					$categories_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- WP core output.
				);
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'bootstrap5-starter' ) );
			if ( $tags_list ) {
				printf(
					' <span class="tags-links">' . esc_html__( 'Tagged %1$s', 'bootstrap5-starter' ) . '</span>',
					$tags_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- WP core output.
				);
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo ' <span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'bootstrap5-starter' ),
						array( 'span' => array( 'class' => array() ) )
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'bootstrap5-starter' ),
					array( 'span' => array( 'class' => array() ) )
				),
				wp_kses_post( get_the_title() )
			),
			' <span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'bs5_starter_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor on archive views, but not on singular.
	 */
	function bs5_starter_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>
			<div class="post-thumbnail mb-4">
				<?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid rounded' ) ); ?>
			</div>
		<?php else : ?>
			<a class="post-thumbnail d-block mb-3" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					'medium_large',
					array(
						'class' => 'img-fluid rounded',
						'alt'   => the_title_attribute( array( 'echo' => false ) ),
					)
				);
				?>
			</a>
		<?php
		endif;
	}
endif;

if ( ! function_exists( 'bs5_starter_pagination' ) ) :
	/**
	 * Displays Bootstrap-styled pagination for post archives.
	 */
	function bs5_starter_pagination() {
		$pagination = paginate_links(
			array(
				'type'      => 'array',
				'prev_text' => esc_html__( '&laquo; Previous', 'bootstrap5-starter' ),
				'next_text' => esc_html__( 'Next &raquo;', 'bootstrap5-starter' ),
			)
		);

		if ( empty( $pagination ) ) {
			return;
		}

		echo '<nav aria-label="' . esc_attr__( 'Posts pagination', 'bootstrap5-starter' ) . '"><ul class="pagination">';
		foreach ( $pagination as $page ) {
			$active = strpos( $page, 'current' ) !== false ? ' active' : '';
			$dots   = strpos( $page, 'dots' ) !== false ? ' disabled' : '';
			echo '<li class="page-item' . esc_attr( $active . $dots ) . '">' . str_replace( array( "class='page-numbers", 'class="page-numbers' ), array( "class='page-link", 'class="page-link' ), $page ) . '</li>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- WP core output.
		}
		echo '</ul></nav>';
	}
endif;
