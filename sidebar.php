<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Bootstrap5_Starter
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

?>
<aside id="secondary" class="widget-area col-lg-4">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
