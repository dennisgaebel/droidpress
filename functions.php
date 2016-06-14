<?php

  /**
   * DroidPress functions and definitions.
   *
   * @link https://developer.wordpress.org/themes/basics/theme-functions/
   *
   * @package DroidPress
   */
  if ( ! function_exists( 'droidpress_setup' ) ) :

    function droidpress_setup() {
      /*
       * Make theme available for translation.
       * Translations can be filed in the /languages/ directory.
       * If you're building a theme based on DroidPress, use a find and replace
       * to change 'droidpress' to the name of your theme in all the template files.
       */
      load_theme_textdomain( 'droidpress', get_template_directory() . '/languages' );
      require_once locate_template('/inc/theme-setup/theme-support.php');
      require_once locate_template('/inc/theme-setup/register.php');
    }

  endif;

  add_action( 'after_setup_theme', 'droidpress_setup' );


  // Filters
  require_once locate_template('/inc/theme-setup/filter-archive-title.php');
  require_once locate_template('/inc/theme-setup/filter-custom-excerpt.php');
  require_once locate_template('/inc/theme-setup/filter-admin-footer.php');

  // Actions
  require_once locate_template('/inc/theme-setup/action-remove-menus.php');
  require_once locate_template('/inc/theme-setup/action-content-width.php');
  require_once locate_template('/inc/theme-setup/action-widgets.php');
  require_once locate_template('/inc/theme-setup/action-scripts.php');


  // Defaults
  require get_template_directory() . '/inc/custom-header.php';
  require get_template_directory() . '/inc/template-tags.php';
  require get_template_directory() . '/inc/extras.php';
  require get_template_directory() . '/inc/customizer.php';
  require get_template_directory() . '/inc/jetpack.php';

  // Dev Functions Files
  foreach (glob(get_template_directory().'/functions-dev/*.php') as $devFilename):
      include_once $devFilename;
  endforeach;

  // Functions Files
  foreach (glob(get_template_directory().'/functions/*.php') as $filename):
      include_once $filename;
  endforeach;

  add_filter( 'document_title_separator', 'editTitleTagSeparator' );

  function editTitleTagSeparator( $sep ) {
    $sep = "|";
    return $sep;
  }
