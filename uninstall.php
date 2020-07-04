<?php // ExPlugin - Uninstall Functionality

/**
 * uninstall.php
 * Fires when the plugin is uninstalled via the plugins screen
 */

// Exit if uninstall constant is not defined
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit;

// Delete the plugin options from DB
delete_option( 'explugin_options' );