<?php
  /**
   * Changes the default Gravity Forms AJAX spinner.
   *
   * @since 1.0.0
   *
   * @param string $src  The default spinner URL.
   * @return string $src The new spinner URL.
   */
  function tgm_io_custom_gforms_spinner( $src ) {
    return get_stylesheet_directory_uri() . '/img/svgsprite.svg#ajax-loader';
  }

  /*
   * Custom Gravity Forms Ajax Spinner
   * https://thomasgriffin.io/change-default-gravity-forms-ajax-spinner
   */
  add_filter( 'gform_ajax_spinner_url', 'tgm_io_custom_gforms_spinner' );


  /**
   * Changes the default Gravity Forms Error Message
   *
   * @since 1.0.0
   *
   * @param string $src  The default spinner URL.
   * @return string $src The new spinner URL.
   */
  function validationMsg() {
    //return 'Something’s not quite right. Check out the errors highlighted below.';
    return "<div class='validation_error'>" . esc_html__( 'Something’s not quite right.', 'gravityforms' ) . ' ' . esc_html__( 'Check out the errors highlighted below.', 'gravityforms' ) . '</div>';
  }

  add_filter( 'gform_validation_message', 'validationMsg');


  /**
   * Load jQuery for GF in Footer
   * https://bjornjohansen.no/load-gravity-forms-js-in-footer
   *
   * @since 1.0.0
   */

  function wrap_gform_cdata_open( $content = '' ) {
    $content = 'document.addEventListener( "DOMContentLoaded", function() { ';
    return $content;
  }

  function wrap_gform_cdata_close( $content = '' ) {
    $content = ' }, false );';
    return $content;
  }

  add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close' );
  add_filter( 'gform_validation_message', 'validationMsg');
  add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open' );
?>
