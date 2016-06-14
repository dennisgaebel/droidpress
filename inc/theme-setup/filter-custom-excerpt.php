<?php

  /*
   * Customize Excerpt Read More Text
   * https://codex.wordpress.org/Function_Reference/the_excerpt
   */
  function new_excerpt_more( $more ) {
    return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Full Story', 'your-text-domain' ) . '</a>';
  }

  add_filter( 'excerpt_more', 'new_excerpt_more' );

?>
