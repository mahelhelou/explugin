<?php // ExPlugin - Settings Page

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Display the plugin settings page
function explugin_display_settings_page() {

  // check if user allowed to access
  if ( ! current_user_can( 'manage_options' ) ) return;
  ?>

  <div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <form action="options.php" method="post">

      <?php
      // output security fields
      settings_fields( 'explugin_options' );

      // output setting sections
      do_settings_sections( 'explugin' );

      // submit button
      submit_button();

      ?>
    </form>
  </div>

<?php } ?>