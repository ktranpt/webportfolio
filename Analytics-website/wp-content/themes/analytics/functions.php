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

// function remove_item_from_cart() {
//     $cart = WC()->instance()->cart;
//     // $id = $_POST['product_id'];
//     $cartItemKey = $_POST['cart_item_key'];
//     $cart->remove_cart_item($cartItemKey);
//     // $cart_id = $cart->generate_cart_id($id);
//     // $cart_item_id = $cart->find_product_in_cart($cart_id);
    
//     // if($cart_item_id){
//     //   $cart->set_quantity($cart_item_id,0);
//     // }

//     echo WC()->cart->get_cart_contents_count();die();
//   }

//   add_action('wp_ajax_remove_item_from_cart', 'remove_item_from_cart');
//   add_action('wp_ajax_nopriv_remove_item_from_cart', 'remove_item_from_cart');

add_action( 'woocommerce_new_order', 'check_user_email_exist',  10, 1  );
function check_user_email_exist($order_id){

      $current_user = wp_get_current_user();
      $email = $current_user->user_email;

      $order = new WC_Order( $order_id );

      $base_api = "http://mwiseapps.com/analytics/";

			$json_url = $base_api . "api/user";
      
      $post = ['email'=> $email];
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$json_url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
      $response = curl_exec($ch);
      curl_close($ch);

      $object = json_decode($response);

      // var_dump($object);die();
      if($object->response == 0){
        // $name = $current_user->first_name. " " . $current_user->last_name;

        $json_url = $base_api . "api/user/create";
        
        $post = ['email'=> $email,'name'=> "Default" ,'profile' => 1, 'active'=> 1, 'password' => ''];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$json_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        $response = curl_exec($ch);
        curl_close($ch);

      }else{
        // echo 'NOT WORK';
      
      }
      
      
}

add_filter( 'woocommerce_price_trim_zeros', 'wc_hide_trailing_zeros', 10, 1 );
function wc_hide_trailing_zeros( $trim ) {
    
    return true;
    
}

add_action( 'woocommerce_payment_complete', 'update_after_payment_complete',  10, 1  );

function update_after_payment_complete($order_id){

}  

add_action( 'woocommerce_before_my_account', 'get_campaign_details',  10, 0  );

function get_campaign_details(){

    $current_user = wp_get_current_user();
    $email = $current_user->user_email;

    $json_url = $base_api . "api/campaigns";
    
    $post = ['email'=> $email];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$json_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    $response = curl_exec($ch);
    curl_close($ch);

    $object = json_decode($response);

    $camp = json_decode($object->response);

    foreach ($camp as $row) {
      echo $row->Camp_Name."<br>";
    }

}  

add_action( 'woocommerce_payment_complete', 'custom_woocommerce_auto_complete_order' );
function custom_woocommerce_auto_complete_order( $order_id ) { 
    if ( ! $order_id ) {
        return;
    }

    $order = wc_get_order( $order_id );
    $order->update_status( 'completed' );
}
add_action( 'woocommerce_order_status_completed', 'mysite_woocommerce_order_status_completed', 10, 1 );
// add_action( 'woocommerce_payment_complete', 'mysite_woocommerce_order_status_completed', 10, 1 );

function mysite_woocommerce_order_status_completed( $order_id ) {

        $current_user = wp_get_current_user();
        // $email = $current_user->user_email;

        $order = wc_get_order( $order_id );
        
        $order_data = $order->get_data(); // The Order data

        // var_dump($order->get_user()->user_email);die();
        
        $order_id = $order_data['id'];
        // $order_parent_id = $order_data['parent_id'];
        $order_status = $order_data['status'];

        $email = $order->get_user()->user_email;

        foreach( $order-> get_items() as $item_key => $item_values ):
          
              ## Using WC_Order_Item methods ##
          
              // Item ID is directly accessible from the $item_key in the foreach loop or
              $item_id = $item_values->get_id();
          
              ## Using WC_Order_Item_Product methods ##
          
              $item_name = $item_values->get_name(); // Name of the product
              $item_type = $item_values->get_type(); // Type of the order item ("line_item")
          
              // $product_id = $item_values->get_product_id(); // the Product id
              // $wc_product = $item_values->get__product(); // the WC_Product object
          
              ## Access Order Items data properties (in an array of values) ##
              $item_data = $item_values->get_data();


              // echo json_encode( $item_data);die();
              
          
              $product_name = $item_data['name'];
              $product_id = $item_data['product_id'];

              $meta_data = $item_data['meta_data'];

              $camp_name;
              $link_name;
              $link_address;

              $email_name;

              $unique_id = "";

              $pro_variation = new WC_Product_Variation($item_data['variation_id']);

              
              // $the_click = $pro_variation->click; 
              // $product = new WC_Product_Variable( $product_id );
              // $variations = $product->get_available_variations();

              $clicks = $pro_variation->click;
              
              // echo $the_click;die();
              // $meta_data
              // print_r($product_id);

              // $opens = trim(explode("-",$product_name)[1]);
              // $opens explode(" ",$open)[0];
              $links = array();

              $bonus = false;
              for ($i=0; $i < count($meta_data); $i++) {     

                  if($meta_data[$i]->key == 'Campaign Name'){
                      $camp_name = $meta_data[$i]->value;
                  }
                  if($meta_data[$i]->key == 'Link Name'){
                      $link_name = $meta_data[$i]->value;
                  }
                  if($meta_data[$i]->key == 'Link Address'){
                    $link_address = $meta_data[$i]->value;
                  }

                  if($meta_data[$i]->key == 'Email Name'){
                    $email_name = $meta_data[$i]->value;
                  }

                  if($meta_data[$i]->key == 'Link Group'){
                    $link_group = $meta_data[$i]->value;

                    $links = array_filter(explode(',',$link_group), function($value) { return $value !== " "; });
                    // var_dump($links);die();
                    // $links = explode(',',$link_group);
                  }

                  if($meta_data[$i]->key == 'unique id'){
                    $unique_id = $meta_data[$i]->value;
                  }

                  if( $meta_data[$i]->key == "Add Auto Top-Up" && $meta_data[$i]->value == "Add Auto Top-Up"){
                    // echo "has auto top-up";
                    $bonus = true;
                    
                  }

              }

              $base_api = "http://mwiseapps.com/analytics/";
              
              $json_url = $base_api . "api/mastercampaign";

              

              if( $product_id == 308){ // Ad Link Tracker

                    if($link_name != "" && $link_address != ""){

                        $post = ['email'=> $email, 'order_id' => $order_id, 'name' => $camp_name, 
                                  'link_name' => $link_name, 'link_address' => $link_address, 
                                  'product_id' => $product_id, 'unique_id' => $unique_id, 'opens' => $clicks, 'bonus' => $bonus];
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL,$json_url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
                        $response = curl_exec($ch);
                        curl_close($ch);
                    
                        $object = json_decode($response);

                        // var_dump($object);die();

                        $hash_value = json_decode($object->response);
                        
                        

                        wc_update_order_item_meta($item_id,"unique id",$hash_value->order_hash,'');

                    }

                    // echo $hash_value->order_hash;
                    // echo $item_data['meta_data'][count($meta_data)-1]->value;
                    
                    // var_dump($hash_value);

                    // var_dump($item_data['meta_data'][count($meta_data)-1]->value);

              }else{    // Email Tracker

                    if($camp_name != ""){

                        $post = ['email'=> $email, 'order_id' => $order_id, 'name' => $camp_name, 
                                  'email_name' => $camp_name, 'product_id' => $product_id, 'unique_id' => $unique_id, 
                                  'links' => $links, 'opens' => $clicks, 'bonus' => $bonus];
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL,$json_url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
                        $response = curl_exec($ch);
                        curl_close($ch);
                    
                        $object = json_decode($response);
    
                        $hash_value = json_decode($object->response);
    
                        wc_update_order_item_meta($item_id,"unique id",$hash_value->order_hash,'');
                    }

                    
              }
              // var_dump($object);

          
          endforeach;


         
}

function filter_wp_setup_nav_menu_item( $post ) { 
  // make filter magic happen here... 

  

  if($post->ID == 323){
    if(is_user_logged_in()){
      // $post->title = '';
    }else{
      $post->title = 'Your Basket';
    }
    
  }
  if($post->ID == 356){
    // $post->url = get_home_url().'/my-account/customer-logout/';
    $post->url = wc_logout_url();
  }
  if($post->object_id == 49){
    if(is_user_logged_in()){

      $current_user = wp_get_current_user();
      
            $query = new WC_Order_Query(array(
              'customer' => $current_user->user_email,
              'limit' => -1,
              'status' => 'completed'
            ));

            $orders = $query->get_orders();

          //  echo '<pre>'. count($orders).'</pre>';
            
            foreach ($orders as $order) {
              // $order_data = $order->get_data(); // The Order data
              
              // $order_status = $order_data['status'];
              if((int)$order->total != 0){
                foreach ($order->get_items() as $item_id => $item_data) {
                  
                  $single_variation = new WC_Product_Variation($item_data["variation_id"]);
                  if ($item_data["product_id"] == 464 && (int)$order->total != 0){
                    // var_dump($item_data['variation_id']);
                    
                    // echo $single_variation->click .'<br>';
                    $total_opens += (int)$single_variation->description;

                    // $topup_total += (int)$item_data["quantity"];
                  }else{
                    $topup_total += (int)$single_variation->click;
                  }
                }
              }
            }
            // if(count($orders) == 0){
            //   $topup_total = 1000;
            // }

            $topup_total += 1000;

            $email = $current_user->user_email;
            $base_api = "http://mwiseapps.com/analytics/";
            
            $json_url = $base_api. "api/mastercampaign/get_campaigns";
            
            $post_data = ['email'=> $email];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$json_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
            $response = curl_exec($ch);
            curl_close($ch);
          
            $object = json_decode($response);
          
            $data = json_decode($object->response);
          
            $total_remaining = 0;
            foreach ($data as $row) {
          
              $total_remaining += (int)$row->total_opens_assigned + (int)$row->mc_opens;
            }
            $total_assigned = $total_remaining;
          
            $total_remaining = ($total_opens + $topup_total) -  $total_remaining;


      $post->title = ucfirst($current_user->display_name). " [".$total_remaining."]";
    }
    else{
      $post->title = "Log In/Sign Up";
    }
    
  }
  return $post; 
}; 
       
// add the filter 
add_filter( 'wp_setup_nav_menu_item', 'filter_wp_setup_nav_menu_item', 10, 1 ); 


add_action( 'user_register', 'create_free_credits', 10, 1 );

function create_free_credits( $user_id ) {

    $current_user = get_user_by('id',$user_id);
    $email = $current_user->user_email;
    // $name = $current_user->first_name. " " . $current_user->last_name;

    $base_api = "http://mwiseapps.com/analytics/";
    
    $json_url = $base_api . "api/user/create";
    
    $post = ['email'=> $email,'name'=> "Default Name" ,'profile' => 1, 'active'=> 1, 'password' => ''];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$json_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    $response = curl_exec($ch);
    curl_close($ch);

}

function bbloomer_split_product_individual_cart_items( $cart_item_data, $product_id ){

    // if($product_id != 668){
      $unique_cart_item_key = uniqid();
      $cart_item_data['unique_key'] = $unique_cart_item_key;
      return $cart_item_data;
    // }
	
}
   
  add_filter( 'woocommerce_add_cart_item_data','bbloomer_split_product_individual_cart_items', 10, 2 );
   
  // -------------------
  // 2. Force add to cart quantity to 1 and disable +- quantity input
   
  add_filter( 'woocommerce_is_sold_individually', '__return_true' );

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


  $wpdb->insert( $table_name, array(
      // 'id' => null,
      'name' => $name,
      'email' => $email,
      'message' => $message,
      'subject' => $subject 
  ), array(
    '%s'

  ));  


die();
return true;
  }
  add_action('wp_ajax_mw_support_add', __NAMESPACE__ . '\\add_support');
  add_action('wp_ajax_nopriv_mw_support_add',  __NAMESPACE__ . '\\add_support'); 
  
  

//   add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
 
// function custom_override_checkout_fields( $fields ) {
//     unset($fields['billing']['billing_first_name']);
//     unset($fields['billing']['billing_last_name']);
//     unset($fields['billing']['billing_company']);
//     unset($fields['billing']['billing_address_1']);
//     unset($fields['billing']['billing_address_2']);
//     unset($fields['billing']['billing_city']);
//     unset($fields['billing']['billing_postcode']);
//     unset($fields['billing']['billing_country']);
//     unset($fields['billing']['billing_state']);
//     unset($fields['billing']['billing_phone']);
//     unset($fields['order']['order_comments']);
//     unset($fields['billing']['billing_address_2']);
//     unset($fields['billing']['billing_postcode']);
//     unset($fields['billing']['billing_company']);
//     unset($fields['billing']['billing_last_name']);
//     unset($fields['billing']['billing_email']);
//     unset($fields['billing']['billing_city']);
//     return $fields;
// }

//   function yourfunction() {
//     if(is_page_template('template-tracking-link.php') || is_page_template('template-tracking-codes.php') || is_page_template('template-ad-tracker.php')){
//        if(!is_user_logged_in()){
//             wp_redirect( home_url('/my-account') );
//        }
//     }
// }
// add_action('template_redirect', __NAMESPACE__ . '\\yourfunction');

// add_action( 'wp', __NAMESPACE__ .'redirect' );
// function redirect() {
//   if ( is_page('my-account') && !is_user_logged_in() ) {
//       wp_redirect( home_url('/login') );
//       die();
//   }
// }