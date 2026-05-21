<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains
 * both the current comments and the comment form.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/comments-php/
 *
 * @package Bootstrap5_Starter
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password, return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

?>
<div id="comments" class="comments-area mt-5">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title h4 mb-4">
			<?php
			$comment_count = get_comments_number();
			if ( '1' === $comment_count ) {
				printf(
					/* translators: %s: post title */
					esc_html__( 'One thought on &ldquo;%s&rdquo;', 'bootstrap5-starter' ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count, 2: post title */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'bootstrap5-starter' ) ),
					number_format_i18n( $comment_count ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 48,
				)
			);
			?>
		</ol>

		<?php
		the_comments_navigation(
			array(
				'prev_text' => esc_html__( '&laquo; Older Comments', 'bootstrap5-starter' ),
				'next_text' => esc_html__( 'Newer Comments &raquo;', 'bootstrap5-starter' ),
			)
		);

		if ( ! comments_open() ) :
			?>
			<p class="no-comments alert alert-secondary"><?php esc_html_e( 'Comments are closed.', 'bootstrap5-starter' ); ?></p>
			<?php
		endif;

	endif;

	comment_form(
		array(
			'class_form'         => 'comment-form',
			'class_submit'       => 'btn btn-primary submit',
			'comment_field'      => '<div class="comment-form-comment mb-3"><label for="comment">' . esc_html_x( 'Comment', 'noun', 'bootstrap5-starter' ) . '</label><textarea id="comment" name="comment" class="form-control" rows="6" required></textarea></div>',
			'fields'             => array(
				'author' => '<div class="row"><div class="comment-form-author col-md-4 mb-3"><label for="author">' . esc_html__( 'Name', 'bootstrap5-starter' ) . ' <span class="required">*</span></label><input id="author" name="author" type="text" class="form-control" required></div>',
				'email'  => '<div class="comment-form-email col-md-4 mb-3"><label for="email">' . esc_html__( 'Email', 'bootstrap5-starter' ) . ' <span class="required">*</span></label><input id="email" name="email" type="email" class="form-control" required></div>',
				'url'    => '<div class="comment-form-url col-md-4 mb-3"><label for="url">' . esc_html__( 'Website', 'bootstrap5-starter' ) . '</label><input id="url" name="url" type="url" class="form-control"></div></div>',
			),
		)
	);

	?>
</div><!-- #comments -->
