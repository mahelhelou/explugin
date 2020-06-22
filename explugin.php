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

// Default plugin options
function explugin_options_default() {
  return array(
    'custom_url'      => 'https://wordpress.org/',
    'custom_title'    => 'Powered by WordPress',
    'custom_style'    => 'disable',
    'custom_message'  => '<p class="custom-message"My custom message</p>',
    'custom_footer'   => 'Special message for user',
    'custom_toolbar'  => 'false',
    'custom_scheme'   => 'default'
  );
}