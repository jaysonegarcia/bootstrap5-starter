<?php
/**
 * The template for displaying all WooCommerce pages.
 *
 * Wraps WooCommerce-rendered content (shop, single product, cart,
 * checkout, account) in this theme's container/layout so it inherits
 * the site header, footer, and overall styling.
 *
 * Individual product / cart / checkout templates are NOT overridden —
 * they fall back to WooCommerce defaults so the theme stays in sync
 * with WooCommerce updates.
 *
 * @link https://woocommerce.com/document/template-structure/
 *
 * @package Bootstrap5_Starter
 */

get_header();
?>

<div class="row">
	<div class="<?php echo is_active_sidebar( 'sidebar-1' ) && is_shop() ? 'col-lg-8' : 'col-12'; ?>">

		<?php woocommerce_content(); ?>

	</div>

	<?php if ( is_shop() ) get_sidebar(); ?>
</div>

<?php
get_footer();
