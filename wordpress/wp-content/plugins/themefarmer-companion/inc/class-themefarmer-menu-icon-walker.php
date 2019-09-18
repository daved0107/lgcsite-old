<?php
/**
 * Custom Walker for Nav Menu Editor.
 *
 * @package    Orbit_Fox
 */

/**
 * Custom Walker for Nav Menu Editor.
 */

function themefarmer_show_menu_icon($menu_item){
	$icon    = get_post_meta( $menu_item->ID, 'themefarmer_menu_icon', true);
	if(!empty($icon)){
		if(!is_admin()){
			$menu_item->title	= sprintf( '<i class="tf-menu-icon %s"></i> %s', $icon, $menu_item->title );
		}
	}
	return $menu_item;
}
add_filter( 'wp_setup_nav_menu_item', 'themefarmer_show_menu_icon', 10, 1 );

add_filter( 'wp_edit_nav_menu_walker', 'themefarmer_nav_edit_walker', 999);
function themefarmer_nav_edit_walker() {
	return 'ThemeFarmer_Menu_Icons_Walker';
}

if(!class_exists('Walker_Nav_Menu_Edit')){
	require_once( ABSPATH . 'wp-admin/includes/class-walker-nav-menu-edit.php' );
}

class ThemeFarmer_Menu_Icons_Walker extends Walker_Nav_Menu_Edit {

	/**
	 * Start the element output.
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item   Menu item data object.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   Menu item args.
	 * @param int    $id     Nav menu ID.
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		parent::start_el( $output, $item, $depth, $args, $id );
		$icon    = get_post_meta( $item->ID, 'themefarmer_menu_icon', true);
		$output .= sprintf( '<input type="hidden" name="menu-item-icon[%d]" class="menu-item-icon-field" id="menu-item-icon-%d" value="%s">', $item->ID, $item->ID, $icon );
	}
}


add_action( 'wp_update_nav_menu_item', 'themefarmer_save_icon_fields', 10, 3 );
function themefarmer_save_icon_fields( $menu_id, $menu_item_db_id, $menu_item_data ) {
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return;
	}

	if ( ! function_exists( 'get_current_screen' ) ) {
	    return;
    }

	$screen = get_current_screen();
	if ( ! $screen instanceof WP_Screen || 'nav-menus' !== $screen->id ) {
		return;
	}

	check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );
	
	if ( isset( $_POST['menu-item-icon'][ $menu_item_db_id ] ) ) {
		$icon	= sanitize_text_field($_POST['menu-item-icon'][$menu_item_db_id]);
		update_post_meta( $menu_item_db_id, 'themefarmer_menu_icon', $icon );
	}
}