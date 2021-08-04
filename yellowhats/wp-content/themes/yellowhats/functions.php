<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

add_theme_support( 'post-thumbnails' ); 

function create_post_type() {
  register_post_type( 'service',
    array(
      'labels' => array(
        'name' => __( 'Services' ),
        'singular_name' => __( 'Service' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'editor','thumbnail' )
    )
  );

  register_post_type( 'project',
  array(
    'labels' => array(
      'name' => __( 'Projects' ),
      'singular_name' => __( 'Project' )
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array( 'title', 'editor','thumbnail' ),
    'taxonomies' => array( 'post_tag', 'category' ),
  )
  );

  register_post_type( 'TESTIMONIALS',
    array(
      'labels' => array(
        'name' => __( 'TESTIMONIALS' ),
        'singular_name' => __( 'TESTIMONIALS' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'editor','thumbnail' )
    )
  );
  register_post_type( 'Stroy',
    array(
      'labels' => array(
        'name' => __( 'Stroys' ),
        'singular_name' => __( 'Stroy' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'editor','thumbnail' )
    )
  );
}

add_action( 'init', 'create_post_type' );
/* Theme setup */
add_action( 'after_setup_theme', 'wpt_setup' );
    if ( ! function_exists( 'wpt_setup' ) ):
        function wpt_setup() {  
            register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
        } endif;


        // Register Custom Navigation Walker
        require_once get_template_directory() . '/wp-bootstrap-navwalker.php';
add_theme_support('post_thumbnails');



?>
