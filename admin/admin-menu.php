<?php // ExPlugin - Admin Menu

/**
 * Add top-level menu page if the plugin has multiple settings pages
 * Add sub-level menu page if one settings page required
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Add sub-level menu page
function explugin_add_sublevel_menu() {

  add_submenu_page(
    'options-general.php', // general settings
    __( 'ExPlugin Settings', 'explugin' ),
    __( 'ExPlugin', 'explugin' ), // page title
    'manage_options', // capabilities
    'explugin', // menu-slug
    'explugin_display_settings_page' // cb function
  );

}

add_action( 'admin_menu', 'explugin_add_sublevel_menu' );