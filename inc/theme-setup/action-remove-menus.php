<?php
  function removeMenus() {
    remove_menu_page( 'edit-comments.php' );
  }

  add_action( 'admin_menu', 'removeMenus' );
?>
