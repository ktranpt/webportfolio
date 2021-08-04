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
  'lib/customizer.php', // Theme customizer
  'lib/walker.php', 
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

function send_email(){
  
    $first_name = $_POST['first_name'];
    $sure_name = $_POST['sure_name'];

    $from = $_POST['email'];
    // $to = 'info@gumbuya.com.au';
    $to = 'info@gumbuya.com.au';
    $description = $_POST['description'];
    $subject = $_POST['subject'];
    $body = '';
    $body .= "<html><body>";
    $body .= "<div>You have got a new email.</div>";
    $body .= "<div>Name: ".$first_name." ".$sure_name."</div>";
    $body .= "<div>Email: ".$from."</div>";
    $body .= "<div>Description: ".$description."</div>";
    $body .= "</body></html>";  
    // $body = $description;

    $headers = array('Content-Type: text/html; charset=UTF-8');
     
    wp_mail( $to, $subject, $body, $headers );
  
  
     // print_r($_POST);
   }
   add_action( 'wp_ajax_mw_send_email', __NAMESPACE__ . '\\send_email' );
   add_action( 'wp_ajax_nopriv_mw_send_email', __NAMESPACE__ . '\\send_email' );

   function send_email_career(){
    
      $first_name = $_POST['first_name'];
      $sure_name = $_POST['sure_name'];
  
      $from = $_POST['email'];
      // $to = 'recruitment@gumbuya.com.au';   
      $to = 'info@gumbuya.com.au';
      
      $description = $_POST['description'];
      $subject = "Careers New Application via Website";  
      $body = '';
      $body .= "<html><body>";
      $body .= "<div>You have got a new email.</div>";
      $body .= "<div>Name: ".$first_name." ".$sure_name."</div>";
      $body .= "<div>Email: ".$from."</div>";
      $body .= "<div>Description: ".$description."</div>";
      $body .= "</body></html>";  
      // $body = $description;
  
      $headers = array('Content-Type: text/html; charset=UTF-8');
       
      wp_mail( $to, $subject, $body, $headers );
    
    
       // print_r($_POST);
     }
     add_action( 'wp_ajax_mw_send_email_career', __NAMESPACE__ . '\\send_email_career' );
     add_action( 'wp_ajax_nopriv_mw_send_email_career', __NAMESPACE__ . '\\send_email_career' );
