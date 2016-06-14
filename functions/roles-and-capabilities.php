<?php

  //========================================================
  // REMOVE EDITOR CAPABILITIES
  //========================================================
  function remove_admin_menus_for_editors() {

    $CurrentUser = wp_get_current_user();

    if( $CurrentUser->roles[0] == 'editor' ):
      // remove_menu_page( 'index.php' );                  //Dashboard
      // remove_menu_page( 'edit.php' );                   //Posts
      // remove_menu_page( 'upload.php' );                 //Media
      // remove_menu_page( 'edit.php?post_type=page' );    //Pages
      remove_menu_page( 'edit-comments.php' );          //Comments
      remove_menu_page( 'themes.php' );                 //Appearance
      // remove_menu_page( 'plugins.php' );                //Plugins
      // remove_menu_page( 'users.php' );                  //Users
      remove_menu_page( 'tools.php' );                  //Tools
      remove_menu_page( 'options-general.php' );        //Settings
    endif;
  }

  add_action( 'admin_menu', 'remove_admin_menus_for_editors' );

  //========================================================
  // ADD EDITOR CAPABILITIES
  //========================================================
  function add_editor_caps()
  {
      $role = get_role( 'editor' );
      $role->add_cap( 'gform_full_access' );
      $role->add_cap('edit_theme_options');
  }

  add_action( 'admin_init', 'add_editor_caps' );
