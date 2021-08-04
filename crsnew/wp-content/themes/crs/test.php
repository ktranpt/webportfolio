<?php
function add_support() {
  
  global $wpdb;
  $table_name = "support_bl";

  // $user_id = get_current_user_id();
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $subject = $_POST['subject'];
  // $vimeo_seconds = sanitize_text_field($_POST['progress_seconds']);
  // $xxx_course_id = sanitize_text_field($_POST['course_id']);


 wp_mail( 'fariz@itcurator.com', 'haha', 'haha', 'haha', 'haha' );


die();
return false;
  }
?>