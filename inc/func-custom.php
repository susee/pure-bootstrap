<?php
/**
 * Theme: Pure Bootstrap
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */

  /**
  * This function is used to check for the custom directory. If it doesn't
  * exist, it will create it and create the custom files for the user to edit.
  */
  function create_empty_custom_files( ) {
    global  $custom_dir, $custom_style, $custom_script, $custom_functions;

    if ( !file_exists($custom_dir) ) {
      mkdir($custom_dir, 0755, true);
      file_put_contents( $custom_functions, '<?php /** Custom functions */ ?>');
      file_put_contents( $custom_style, "
/*
Theme Name: Pure Bootstrap
Description: Custom stylesheet - will NOT be overwritten on updates.
*/");


      file_put_contents( $custom_script, "
/*
Theme Name: Pure Bootstrap
Description: Custom script - will NOT be overwritten on updates.
*/

(function($) {
  $(document).ready(function() {
    

  });
}(jQuery));
");
    }
  }

  /**
  * This function will que the custom script, stylesheet, and custom functions
  * file.
  */
  function custom_scripts( ) {

    global $custom_dir_name, $custom_style_file, $custom_script_file, $custom_style, $custom_script, $custom_functions;

    /** create empty script and stylesheet files */
    create_empty_custom_files();
    $theme_dir_uri = get_template_directory_uri();
    
    /** include the users custom functions */
    if ( file_exists($custom_functions) ) include( $custom_functions );

    /** Custom script and stylesheet for the user to edit. */
    if ( file_exists($custom_style) )
      wp_enqueue_style( 'custom-stylesheet', $theme_dir_uri . '/' . $custom_dir_name . '/' . $custom_style_file, false  );

    if ( file_exists($custom_script) )
      wp_enqueue_script( 'custom-script', $theme_dir_uri . '/' . $custom_dir_name . '/' . $custom_script_file, array('jquery') );
  }

  if (function_exists('add_action')) {
    add_action( 'wp_enqueue_scripts', 'custom_scripts' );
  }

?>