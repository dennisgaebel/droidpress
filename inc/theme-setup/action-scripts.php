<?php

  /**
   * Enqueue scripts and styles.
   */
  function droidpress_scripts() {
    wp_enqueue_style( 'droidpress-style', get_stylesheet_uri() );

    wp_enqueue_script( 'droidpress-navigation', get_template_directory_uri() . '/js/src/navigation.js', array(), '20160104', true );

    wp_enqueue_script( 'droidpress-skip-link-focus-fix', get_template_directory_uri() . '/js/src/skip-link-focus-fix.js', array(), '20160104', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

    // Load WordPress' jQuery. Must be registered first before wp_enqueue_script()
    // http://css-tricks.com/snippets/wordpress/include-jquery-in-wordpress-theme
    // http://digwp.com/2009/06/use-google-hosted-javascript-libraries-still-the-right-way
    //
    // if ( ! is_admin() ) {
    //  wp_deregister_script( 'jquery' );
    //  wp_register_script( 'jquery', 'http' . ( $_SERVER['SERVER_PORT'] == 443 ? 's' : '' ) . "://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js", false, null );
    //  wp_enqueue_script( 'jquery' );
    // }
  }

  add_action( 'wp_enqueue_scripts', 'droidpress_scripts' );

?>
