<?php // ExPlugin - Admin Menu

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Add sub-level menu page
function explugin_add_sublevel_menu() {

  add_submenu_page(
    'options-general.php', // general settings
    __( 'ExPlugin Settings', 'explugin' ),
    __( 'ExPlugin', 'explugin' ),
    'manage_options',
    'explugin',
    'explugin_display_settings_page'
  );

}

add_action( 'admin_menu', 'explugin_add_sublevel_menu' );