<?php // ExPlugin - Register Settings

/**
 * We build our settings using Settings API because it provides built-in security and visual consistency
 * It handles all form processing
 * We registe plugin options using register_settings
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Register plugin settings
function explugin_register_settings() {

  register_setting(
    'explugin_options', // match settings fields/options group
    'explugin_options', // db name
    'explugin_callback_validate_options'
  );

  // login section options
  add_settings_section(
    'explugin_section_login', // id that holds settings fields
    __( 'Customize Login Page', 'explugin' ), // h2 section heading
    'explugin_callback_section_login', // display description of section
    'explugin' // submenu-slug of add_submenu_page()
  );

  // admin area options
  add_settings_section(
    'explugin_section_admin',
    __( 'Customize Admin Area', 'explugin' ),
    'explugin_callback_section_admin',
    'explugin'
  );

  // All settings fields
  add_settings_field(
    'custom_url', // settings id for db
    __( 'Custom URL', 'explugin' ), // setting field title
    'explugin_callback_field_text', // cb to output markup
    'explugin', // submenu-slug
    'explugin_section_login', // section id
    [ // array of data passed to cb function
      'id'    => 'custom_url',
      'label' => __( 'Custom URL for the login logo link', 'explugin' )
    ]
  );

  add_settings_field(
    'custom_title',
    __( 'Custom Title', 'explugin' ),
    'explugin_callback_field_text',
    'explugin',
    'explugin_section_login',
    [
      'id'    => 'custom_title',
      'label' => __( 'Custom title attribute for the logo link', 'explugin' )
    ]
  );

  add_settings_field(
    'custom_style',
    __( 'Custom Style', 'explugin' ),
    'explugin_callback_field_radio',
    'explugin',
    'explugin_section_login',
    [
      'id'    => 'custom_style',
      'label' => __( 'Custom CSS for login screen', 'explugin' )
    ]
  );

  add_settings_field(
    'custom_message',
    __( 'Custom Message', 'explugin' ),
    'explugin_callback_field_textarea',
    'explugin',
    'explugin_section_login',
    [
      'id'    => 'custom_message',
      'label' => __( 'Custom text and/or markup', 'explugin' )
    ]
  );

  add_settings_field(
    'custom_footer',
    __( 'Custom Footer', 'explugin' ),
    'explugin_callback_field_text',
    'explugin',
    'explugin_section_admin',
    [
      'id'    => 'custom_footer',
      'label' => __( 'Custom footer text', 'explugin' )
    ]
  );

  add_settings_field(
    'custom_toolbar',
    __( 'Custom Toolbar', 'explugin' ),
    'explugin_callback_field_checkbox',
    'explugin',
    'explugin_section_admin',
    [
      'id'    => 'custom_toolbar',
      'label' => __( 'Remove new post and comment links from the toolbar', 'explugin' )
    ]
  );

  add_settings_field(
    'custom_scheme',
    __( 'Custom Scheme', 'explugin' ),
    'explugin_callback_field_select',
    'explugin',
    'explugin_section_admin',
    [
      'id'    => 'custom_scheme',
      'label' => __( 'Default color scheme for new users', 'explugin' )
    ]
  );

}

add_action( 'admin_init', 'explugin_register_settings' );