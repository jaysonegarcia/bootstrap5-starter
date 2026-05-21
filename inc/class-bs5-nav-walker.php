<?php
/**
 * Bootstrap 5 Nav Walker.
 *
 * Renders a wp_nav_menu() output that matches Bootstrap 5's collapsible
 * navbar markup (dropdowns, dividers, headers, disabled items).
 *
 * Usage in a template:
 *   wp_nav_menu(
 *       array(
 *           'theme_location' => 'primary',
 *           'container'      => false,
 *           'menu_class'     => 'navbar-nav ms-auto',
 *           'walker'         => new BS5_Nav_Walker(),
 *       )
 *   );
 *
 * To create a dropdown: in Appearance → Menus, indent a menu item under
 * a parent. The parent will become a Bootstrap dropdown toggle.
 *
 * Special CSS classes you can add to a menu item (Screen Options → CSS Classes):
 *   - "divider" or "dropdown-divider"  → renders an <hr> inside a dropdown
 *   - "dropdown-header"                → renders a non-clickable header
 *   - "disabled"                       → renders a disabled item
 *
 * @package Bootstrap5_Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'BS5_Nav_Walker' ) ) :

	/**
	 * Walker class for Bootstrap 5 navbar menus.
	 */
	class BS5_Nav_Walker extends Walker_Nav_Menu {

		/**
		 * Starts the list before the elements are added (the <ul> for a sub-menu).
		 *
		 * @param string   $output Used to append additional content (passed by reference).
		 * @param int      $depth  Depth of the menu item.
		 * @param stdClass $args   An object of wp_nav_menu() arguments.
		 */
		public function start_lvl( &$output, $depth = 0, $args = null ) {
			$indent  = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
		}

		/**
		 * Starts the element output (one <li> for one menu item).
		 *
		 * @param string   $output            Used to append additional content (passed by reference).
		 * @param WP_Post  $data_object       Menu item data object.
		 * @param int      $depth             Depth of menu item.
		 * @param stdClass $args              An object of wp_nav_menu() arguments.
		 * @param int      $current_object_id Current object ID.
		 */
		public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
			$item   = $data_object;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			// Handle dropdown dividers and headers as special menu items.
			if ( in_array( 'divider', $classes, true ) || in_array( 'dropdown-divider', $classes, true ) ) {
				$output .= $indent . '<li><hr class="dropdown-divider"></li>';
				return;
			}

			if ( in_array( 'dropdown-header', $classes, true ) ) {
				$output .= $indent . '<li><h6 class="dropdown-header">' . esc_html( $item->title ) . '</h6></li>';
				return;
			}

			$has_children = in_array( 'menu-item-has-children', $classes, true );

			// Build <li> classes.
			$li_classes = array( 'nav-item' );
			if ( $depth > 0 ) {
				// Sub-menu items are <li>s without nav-item.
				$li_classes = array();
			}
			if ( $has_children && 0 === $depth ) {
				$li_classes[] = 'dropdown';
			}
			if ( in_array( 'current-menu-item', $classes, true ) ) {
				$li_classes[] = 'active';
			}

			$class_names = implode( ' ', array_filter( $li_classes ) );
			$class_attr  = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $class_attr . '>';

			// Build <a> attributes.
			$atts           = array();
			$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
			$atts['target'] = ! empty( $item->target ) ? $item->target : '';
			if ( '_blank' === $item->target && empty( $item->xfn ) ) {
				$atts['rel'] = 'noopener noreferrer';
			} else {
				$atts['rel'] = ! empty( $item->xfn ) ? $item->xfn : '';
			}
			$atts['href'] = ! empty( $item->url ) ? $item->url : '';

			// Build <a> class.
			$a_classes = array();
			if ( 0 === $depth ) {
				$a_classes[] = 'nav-link';
			} else {
				$a_classes[] = 'dropdown-item';
			}
			if ( $has_children && 0 === $depth ) {
				$a_classes[] = 'dropdown-toggle';
			}
			if ( in_array( 'current-menu-item', $classes, true ) ) {
				$a_classes[] = 'active';
			}
			if ( in_array( 'disabled', $classes, true ) ) {
				$a_classes[] = 'disabled';
			}
			$atts['class'] = implode( ' ', array_filter( $a_classes ) );

			// Dropdown toggle attributes for top-level parents with children.
			if ( $has_children && 0 === $depth ) {
				$atts['data-bs-toggle'] = 'dropdown';
				$atts['aria-haspopup']  = 'true';
				$atts['aria-expanded']  = 'false';
				$atts['role']           = 'button';
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$title = apply_filters( 'the_title', $item->title, $item->ID );
			$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

			$item_output  = isset( $args->before ) ? $args->before : '';
			$item_output .= '<a' . $attributes . '>';
			$item_output .= ( isset( $args->link_before ) ? $args->link_before : '' ) . $title . ( isset( $args->link_after ) ? $args->link_after : '' );
			$item_output .= '</a>';
			$item_output .= isset( $args->after ) ? $args->after : '';

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

endif;
