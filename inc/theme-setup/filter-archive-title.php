<?php

  /*
   * Customize Text for Archive Page Titles
   * http://wordpress.stackexchange.com/questions/175884/how-to-customize-the-archive-title
   */
  add_filter( 'get_the_archive_title', function ( $title ) {
    if( is_category() ) :
      $title = single_cat_title( '', false );
      return $title;
    endif;
  });

?>