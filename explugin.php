<?php
/*
Plugin Name: ExPlugin
Description: A simple plugin made for learning purposes
Author: Mahmoud El Helou
Version: 1.0
Text Domain: exsplugin
Domain Path: /languages
License: GPL v2 or later
License URL: https://gnu.org/licenses/gpl-2.0.txt
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Load text domain
function explugin_load_textdomain() {
  load_plugin_textdomain( 'explugin', false, plugin_dir_path(  __FILE__ ) . '/languages' );
}

add_action( 'plugins_loaded', 'explugin_load_textdomain' );

// Include dependencies
if ( is_admin() ) {
  require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
  require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
  require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
  require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';
  require_once plugin_dir_path( __FILE__ ) . 'admin/settings-validate.php';
}

// Include dependencies: admin and public
require_once plugin_dir_path( __FILE__ ) . 'inc/core-functions.php';

// Default plugin options/settings values
function explugin_options_default() {
  return array(
    'custom_url'      => 'https://wordpress.org/',
    'custom_title'    => esc_html__( 'Powered by WordPress', 'explugin' ),
    'custom_style'    => 'disable',
    'custom_message'  => '<p class="custom-message">'. esc_html__( 'My custom message', 'explugin' ) .'</p>',
    'custom_footer'   => esc_html__( 'Special message for user', 'explugin' ),
    'custom_toolbar'  => 'false',
    'custom_scheme'   => 'default'
  );
}

// Remove options on uninstall
function explugin_on_uninstall() {
  if ( ! current_user_can( 'activate_plugins' ) ) return;

  delete_option( 'explugin_options' );
}

register_uninstall_hook( __FILE__, 'explugin_on_uninstall' );