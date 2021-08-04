<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');
remove_filter ('acf_the_content', 'wpautop');

function gg_short_title( $title ) {
	if ( ! is_admin() ) {
     $explode = explode(" ",$title);

	 if(count($explode) == 0){
		 return $title;
	 }
	
	
	if(strtolower($explode[0]) != 'get' && strtolower($explode[0]) != 'the'){
		$test = '<span class="white-bar">'.$explode[0].'</span>';
		$aa = array_shift($explode);
	}else{
		$test = '<span class="white-bar">'.$explode[0].' '.$explode[1].'</span>';
		$aa = array_shift($explode);
		$aaa = array_shift($explode);
	}
	   return $test.' '.join(" ",$explode);
	} else {
			return $title;
	}
}

function wpse_19692_registration_redirect() {
    return home_url('/thankyou');
}

add_filter( 'woocommerce_registration_redirect', __NAMESPACE__ . '\\wpse_19692_registration_redirect', 2 );
add_filter( 'the_title', __NAMESPACE__ . '\\gg_short_title', 10, 1 );

function set_empty_cart(){
	global $woocommerce;

	WC()->cart->empty_cart();
   }
   add_action( 'wp_ajax_mw_empty_cart', __NAMESPACE__ . '\\set_empty_cart' );
   add_action( 'wp_ajax_nopriv_mw_empty_cart', __NAMESPACE__ . '\\set_empty_cart' );

//end test 2 field for product

function get_number_items(){
 global $woocommerce;

  echo WC()->cart->get_cart_contents_count();
  wp_die();
}
add_action( 'wp_ajax_mw_number_items', __NAMESPACE__ . '\\get_number_items' );
add_action( 'wp_ajax_nopriv_mw_number_items', __NAMESPACE__ . '\\get_number_items' );

function get_last_item_id(){
	global $woocommerce;
	$items = $woocommerce->cart->get_cart();
	$ids = array();
	foreach($items as $cart_item_key => $cart_item) { 
		   //  $_product = $values['data']->post; 
			$ids[] = $cart_item_key; 
	} 

	echo end($ids);

	wp_die();
}

add_action( 'wp_ajax_mw_last_item_id', __NAMESPACE__ . '\\get_last_item_id' );
add_action( 'wp_ajax_nopriv_mw_last_item_id', __NAMESPACE__ . '\\get_last_item_id' );

function update_add_ons(){
	global $woocommerce;

	$cart_id = $_POST['item_id'];

	$items = $woocommerce->cart->get_cart();
	foreach($items as $cart_item_key => $cart_item) { 
		if($cart_item_key == $cart_id){

			$addons = WC()->cart->get_cart_item($cart_item_key)["addons"] ; 

			// array_push($addons,(object)array());
		}
	} 

	WC()->cart->persistent_cart_update();
	wp_die();
}

add_action( 'wp_ajax_mw_update_add_ons', __NAMESPACE__ . '\\update_add_ons' );
add_action( 'wp_ajax_nopriv_mw_update_add_ons', __NAMESPACE__ . '\\update_add_ons' );


function update_cart_info(){ 
	global $woocommerce;
	   // $items = $woocommerce->cart->get_cart();
	//  var_dump(WC()->cart->get_cart());
	// echo "sdfdsf";
	$cart_id = $_POST['item_id'];
	// echo $cart_id;
	 foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		if($cart_item_key == $cart_id){
			// echo $cart_item['addons'][0]['value'] = "Van Hieu";
			// echo "HERE -- ". $cart_item_key;
			WC()->cart->remove_cart_item($cart_item_key); 
			// var_dump($cart_item->cart_contents[ $cart_item_key ]);
		}
	 }
	 
	

	WC()->cart->persistent_cart_update();
	wp_die();
	// wp_redirect( get_home_url()."/cart" );
   }
   add_action( 'wp_ajax_mw_update_cart_info', __NAMESPACE__ . '\\update_cart_info' );
   add_action( 'wp_ajax_nopriv_mw_update_cart_info', __NAMESPACE__ . '\\update_cart_info' );
   

   function update_user_info(){

		// echo "COME HERE";

		// var_dump(wp_get_current_user());

		$user_id = (int)$_POST['user_id'];

		if($_POST['update'] == 0){
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$company = $_POST['company'];
	
			update_user_meta($user_id, 'first_name', $first_name, $prev_value = '');
			update_user_meta($user_id, 'last_name', $last_name, $prev_value = '');
			update_user_meta($user_id, 'billing_company', $company, $prev_value = '');
		}elseif($_POST['update'] == 2){
			update_user_meta($user_id, 'billing_address_1', $_POST['billing_address'], $prev_value = '');
			update_user_meta($user_id, 'billing_city', $_POST['billing_city'], $prev_value = '');
			update_user_meta($user_id, 'billing_state', $_POST['billing_state'], $prev_value = '');
			update_user_meta($user_id, 'billing_postcode', $_POST['billing_postcode'], $prev_value = '');
			update_user_meta($user_id, 'billing_country', $_POST['billing_country'], $prev_value = '');
		}elseif($_POST['update'] == 1){

			$current_password = $_POST['current_password'];
			$new_password = $_POST['new_password'];

			$user = wp_get_current_user();
		
		
			if(wp_check_password( $current_password, $user->user_pass, $user_id )){

				wp_set_password($new_password, $user_id);
				
				echo 1;
			}else{
				echo 0;
			}

		}
	
		die();

   }


   add_action( 'wp_ajax_mw_update_user_info', __NAMESPACE__ . '\\update_user_info' );
   add_action( 'wp_ajax_nopriv_mw_update_user_info', __NAMESPACE__ . '\\update_user_info' );

   function send_subscribe(){

		$email = $_POST['email'];

		$to = "vanh@mechantwise.com";

		$subject = 'SIGN UP TO OUR NEWSLETTER FOR TIPS & SPECIAL OFFERS';

		$body = "";
		$body .= "<html><body>";
		$body .= "<div>Email: ".$email."</div>";
		$body .= "</body></html>";

		
		$headers = array('Content-Type: text/html; charset=UTF-8');
		 
		wp_mail( $to, $subject, $body, $headers );


	}
	add_action( 'wp_ajax_mw_send_subscribe', __NAMESPACE__ . '\\send_subscribe' );
	add_action( 'wp_ajax_nopriv_mw_send_subscribe', __NAMESPACE__ . '\\send_subscribe' );


	function send_developer(){
		
				$email = $_POST['email'];
				$first_name = $_POST['first_name'];
				$sur_name = $_POST['sur_name'];
		
				$to = "vanh@mechantwise.com";
		
				$subject = 'SIGN UP TO OUR NEWSLETTER FOR TIPS & SPECIAL OFFERS';
		
				$body = "";
				$body .= "<html><body>";
				$body .= "<div>Name: ".$first_name." ".$sur_name."</div>";
				$body .= "<div>Email: ".$email."</div>";
				$body .= "</body></html>";
		
				
				$headers = array('Content-Type: text/html; charset=UTF-8');
				 
				wp_mail( $to, $subject, $body, $headers );
		
		
			}
			add_action( 'wp_ajax_mw_send_developer', __NAMESPACE__ . '\\send_developer' );
			add_action( 'wp_ajax_nopriv_mw_send_developer', __NAMESPACE__ . '\\send_developer' );



function cancel_subscription(){


	
	$sub_id        = $_POST['sub_id'];
	// echo $user_id  ;(
	$sub = wcs_get_subscription((int)$sub_id);

	var_dump($sub['next_payment']);
	// die();

	// $sub->update_status( 'cancelled', $note = '', $manual = false );
	// wcs_make_user_inactive( $user_id );
	// wcs_maybe_make_user_inactive_for($subscription)
}
add_action( 'wp_ajax_mw_cancel_subscription', __NAMESPACE__ . '\\cancel_subscription' );
add_action( 'wp_ajax_nopriv_mw_cancel_subscription', __NAMESPACE__ . '\\cancel_subscription' );

function subcribe_add_to_card(){
	
	ob_start();
	
	$product_id        = $_POST['product_id'];
	$quantity          = 1;
	$variation_id = $_POST['variation_id'];
	$attribute_plan = $_POST['attribute_plan'];
	
	$passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );
	$product_status    = get_post_status( $product_id );

	if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity, $variation_id, $attribute_plan ) && 'publish' === $product_status ) {

		do_action( 'woocommerce_ajax_added_to_cart', $product_id );

		wc_add_to_cart_message( $product_id );

	} else {

		// If there was an error adding to the cart, redirect to the product page to show any errors
		$data = array(
			'error'       => true,
			'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id )
		);

		wp_send_json( $data );

	}



}
add_action( 'wp_ajax_mw_subcribe_add_to_card', __NAMESPACE__ . '\\subcribe_add_to_card' );
add_action( 'wp_ajax_nopriv_mw_subcribe_add_to_card', __NAMESPACE__ . '\\subcribe_add_to_card' );


// Add Variation Settings
add_action( 'woocommerce_product_after_variable_attributes', __NAMESPACE__ . '\\variation_settings_fields', 10, 3 );
// Save Variation Settings
add_action( 'woocommerce_save_product_variation', __NAMESPACE__ . '\\save_variation_settings_fields', 10, 2 );
/**
 * Create new fields for variations
 *
*/
function variation_settings_fields( $loop, $variation_data, $variation ) {
	// Text Field
	woocommerce_wp_text_input(  
		array( 
			'id'          => '_image_link[' . $variation->ID . ']', 
			'label'       => __( 'Image link', 'woocommerce' ), 
			'placeholder' => 'http://',
			'desc_tip'    => 'true',
			'description' => __( 'Enter the number of clicks for this plan', 'woocommerce' ),
			'value'       => get_post_meta( $variation->ID, '_image_link', true )
		)
	);
	woocommerce_wp_text_input(  
		array( 
			'id'          => '_click[' . $variation->ID . ']', 
			'label'       => __( 'Clicks', 'woocommerce' ), 
			'placeholder' => 'Enter number of clicks',
			'desc_tip'    => 'true',
			'description' => __( 'Enter the number of clicks for this plan', 'woocommerce' ),
			'value'       => get_post_meta( $variation->ID, '_click', true )
		)
	);
	woocommerce_wp_text_input( 
		array( 
			'id'          => '_info_1[' . $variation->ID . ']', 
			'label'       => __( 'Info 1', 'woocommerce' ), 
			'placeholder' => 'http://',
			'desc_tip'    => 'true',
			'description' => __( 'Enter the custom value here.', 'woocommerce' ),
			'value'       => get_post_meta( $variation->ID, '_info_1', true )
		)
	);
	woocommerce_wp_text_input( 
		array( 
			'id'          => '_info_2[' . $variation->ID . ']', 
			'label'       => __( 'Info 2', 'woocommerce' ), 
			'placeholder' => 'http://',
			'desc_tip'    => 'true',
			'description' => __( 'Enter the custom value here.', 'woocommerce' ),
			'value'       => get_post_meta( $variation->ID, '_info_2', true )
		)
	);
	woocommerce_wp_text_input( 
		array( 
			'id'          => '_info_3[' . $variation->ID . ']', 
			'label'       => __( 'Info 3', 'woocommerce' ), 
			'placeholder' => 'http://',
			'desc_tip'    => 'true',
			'description' => __( 'Enter the custom value here.', 'woocommerce' ),
			'value'       => get_post_meta( $variation->ID, '_info_3', true )
		)
	);
}
/**
 * Save new fields for variations
 *
*/
function save_variation_settings_fields( $post_id ) {
	// Text Field
	$text_field_image = $_POST['_image_link'][ $post_id ];
	if( ! empty( $text_field_image ) ) {
		update_post_meta( $post_id, '_image_link', esc_attr( $text_field_image ) );
	}
	$text_field_click = $_POST['_click'][ $post_id ];
	if( ! empty( $text_field_click ) ) {
		update_post_meta( $post_id, '_click', esc_attr( $text_field_click ) );
	}
	$text_field_1 = $_POST['_info_1'][ $post_id ];
	if( ! empty( $text_field_1 ) ) {
		update_post_meta( $post_id, '_info_1', esc_attr( $text_field_1 ) );
	}
	$text_field_2 = $_POST['_info_2'][ $post_id ];
	if( ! empty( $text_field_2 ) ) {
		update_post_meta( $post_id, '_info_2', esc_attr( $text_field_2 ) );
	}
	$text_field_3 = $_POST['_info_3'][ $post_id ];
	if( ! empty( $text_field_3 ) ) {
		update_post_meta( $post_id, '_info_3', esc_attr( $text_field_3 ) );
	}
}
add_action( 'template_redirect', __NAMESPACE__ . '\\ultimatewoo_check_user_subscriptions' );
function ultimatewoo_check_user_subscriptions() {
	$has_sub = wcs_user_has_subscription( '', '', 'active' );
	if ( ! $has_sub && is_singular( 'forum' ) ) {
		wp_redirect( get_permalink( 2626 ) );
		exit;
	}
}