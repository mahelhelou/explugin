<?php // ExPlugin - Core Functionality

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Custom login logo url
function explugin_custom_login_url( $url ) {
  $options = get_option( 'explugin_options', explugin_options_default() );

  if ( isset( $options['custom_url'] ) && !empty( $options['custom_url'] ) ) {
    $url = esc_url( $options['custom_url'] );
  }

  return $url;
}

add_filter( 'login_headerurl', 'explugin_custom_login_url' );

// Custom login logo title
function explugin_custom_login_title( $title ) {
  $options = get_option( 'explugin_options', explugin_options_default() );

  if ( isset( $options['custom_title'] ) && !empty( $options['custom_title'] ) ) {
    $title = esc_attr( $options['custom_title'] );
  }

  return $title;
}

add_filter( 'login_title', 'explugin_custom_login_title' );

// Custom style
function explugin_custom_login_styles() {
  $styles = false;
  $options = get_option( 'explugin_options', explugin_options_default() );

  if ( isset( $options['custom_style'] ) && !empty( $options['custom_style'] ) ) {
    $styles = sanitize_text_field( $options['custom_style'] );
  }

  if ( 'enable' === $styles ) {
    wp_enqueue_style(
      'explugin-custom-login-css',
      plugin_dir_url( dirname( __FILE__ ) ) . 'public/css/explugin-login.css',
      array(),
      null,
      'screen' );
  }
}

add_action( 'login_enqueue_scripts', 'explugin_custom_login_styles' );

// Custom login message
function explugin_custom_login_message( $message ) {
  $options = get_option( 'explugin_options', explugin_options_default() );

  if ( isset( $options['custom_message'] ) && !empty( $options['custom_message'] ) ) {
    $message = wp_kses_post( $options['custom_message'] ) . $message;
  }

  return $message;
}

add_filter( 'login_message', 'explugin_custom_login_message' );

// Custom admin footer
function explugin_custom_admin_footer( $message ) {
  $options = get_option( 'explugin_options', explugin_options_default() );

  if ( isset( $options['custom_footer'] ) && !empty( $options['custom_footer'] ) ) {
    $message = sanitize_text_field( $options['custom_footer'] );
  }

  return $message;
}

add_filter( 'admin_footer_text', 'explugin_custom_admin_footer' );

// Custom toolbar items
function explugin_custom_admin_toolbar() {
  $toolbar = false;

  $options = get_option( 'explugin_options', explugin_options_default() );

  if ( isset( $options['custom_toolbar'] ) && !empty( $options['custom_toolbar'] ) ) {
    $toolbar = (bool) $options['custom_toolbar'];
  }

  if ( $toolbar ) {
    global $wp_admin_bar;

    $wp_admin_bar->remove_menu( 'comments' );
    $wp_admin_bar->remove_menu( 'new-content' );
  }
}

add_action( 'wp_before_admin_bar_render', 'explugin_custom_admin_toolbar', 9999 );

// Custom admin color scheme
function explugin_custom_admin_scheme( $user_id ) {
  $options = get_option( 'explugin_options', explugin_options_default() );

  if ( isset( $options['custom_scheme'] ) && !empty( $options['custom_scheme'] ) ) {
    $scheme = sanitize_text_field( $options['custom_scheme'] );
  }

  $args = array(
    'ID'          => $user_id,
    'admin_color' => $scheme
  );

  // applies only to new registered users
  wp_update_user( $args );
}

add_action( 'user_register', 'explugin_custom_admin_scheme' );