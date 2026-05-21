<?php
/**
 * Template for displaying the search form, styled with Bootstrap input group.
 *
 * @package Bootstrap5_Starter
 */

?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="search-field-<?php echo esc_attr( wp_unique_id() ); ?>">
		<?php echo esc_html_x( 'Search for:', 'label', 'bootstrap5-starter' ); ?>
	</label>
	<div class="input-group">
		<input
			type="search"
			id="search-field-<?php echo esc_attr( wp_unique_id() ); ?>"
			class="form-control search-field"
			placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'bootstrap5-starter' ); ?>"
			value="<?php echo get_search_query(); ?>"
			name="s"
		/>
		<button type="submit" class="btn btn-primary search-submit">
			<?php echo esc_html_x( 'Search', 'submit button', 'bootstrap5-starter' ); ?>
		</button>
	</div>
</form>
