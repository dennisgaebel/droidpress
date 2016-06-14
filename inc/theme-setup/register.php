<?php
  // This theme uses wp_nav_menu() in one location.
  register_nav_menus(array(
    'primary' => esc_html__( 'Primary Menu', 'droidpress' ),
    'footer'  => esc_html__( 'Footer Menu', 'droidpress' )
  ));
?>
