<?php
  edit_post_link(
    sprintf(
      esc_html__( 'Edit %s', 'droidpress' ),
      the_title( '<span class="screen-reader-text">"', '"</span>', false )
    ),
    '<span class="edit-link">',
    '</span>'
  );
?>
