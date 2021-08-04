<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

/**
 * My Account navigation.
 * @since 2.6.0
 */
// do_action( 'woocommerce_account_navigation' );

?>

<style>
	p > span:nth-child(odd){
		font-weight:bold;
	}

</style>

<!-- <div class="woocommerce-MyAccount-content">
	<?php
		/**
		 * My Account content.
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_content' );
	?>
</div> -->
	<?php $current_user = wp_get_current_user(); 
	if (wcs_user_has_subscription( '', '', 'active' )) {
		// echo 'true';
	}else{
		// echo'false';
	}

	$is_subcriber = false;

	$item = "NO PLAN";
	$date = date("Y/m/d");

	$total_opens = 0;
	$topup_total = 0; 
	if (wcs_user_has_subscription( '', '', 'active' )) {
		// echo 'true';
		$is_subcriber = true;
		

		// echo $current_user->ID;

		$subscriptions = wcs_get_users_subscriptions( $current_user->ID );
		$currentsub;



		
		foreach ($subscriptions as $subscription){
			// echo $subscription->get_parent_id();

			
			// die();

			if($subscription->get_status() == 'active'){
				$currentsub = $subscription;

			}
		}

		
		$order_ids = $currentsub->get_related_orders();
		// var_dump((object)$order_ids);

		foreach ($currentsub->get_related_orders() as $key => $value) {
			$order = wc_get_order( $value );
			$order_data = $order->get_data(); // The Order data

			$order_status = $order_data['status'];

			// echo $order_status;
			if($order_status == 'completed'){
				foreach ($order->get_items() as $item_id => $item_data) {
					// print_r($order->ID);
					$item = $item_data['name'];
					$variation_id = $item_data["variation_id"];
					break;
					// $single_variation = new WC_Product_Variation($item_data["variation_id"]);
					// // var_dump($single_variation->description);
					// $total_opens += (int)$single_variation->description;
				}
				break;
			}
		}

		$start = $currentsub->get_date( 'start' );

		$next_payment = $currentsub->get_date( 'next_payment' );

		// $date1 = '2000-01-25';
		// $date2 = '2010-02-20';
		
		$ts1 = strtotime($start);
		$ts2 = strtotime($next_payment);
		
		$year1 = date('Y', $ts1);
		$year2 = date('Y', $ts2);
		
		$month1 = date('m', $ts1);
		$month2 = date('m', $ts2);
		
		$diff = (($year2 - $year1) * 12) + ($month2 - $month1);


		$date = date_create($next_payment);
		
		
		$order = wc_get_order( $currentsub->get_parent_id() );

		// var_dump($order);
		
		$order_items = $currentsub->get_items();
		// Iterating through each item in the order

	}else{
		// $query = new WC_Order_Query();
		// $query->set(
		// 	'customer', 'ngogiakhanhcr@gmail.com'
		// 	// 'status' => 'completed'
		// );
		// $orders = $query->get_orders();

		// // $args = array(
		// // 	'customer' => 'nestor202@merchantwise.com',
		// // 	'status' => 'completed'
		// // );
		// // $orders = wc_get_orders( $args );
		// // var_dump($orders);
		
		// foreach ($orders as $order) {
		// 	$order_data = $order->get_data(); // The Order data
			
			// $item = $item_data["name"];
			$variation_id = 0;
			// $_product = wc_get_product( $item_data["product_id"] );

			// $single_variation = new WC_Product_Variation($item_data["variation_id"]);

			// $opens_monthly = trim($single_variation->click);	

			// $opens_monthly = (int)explode(" ", $opens_monthly)[0];

		// 				// $topup_total += (int)$item_data["quantity"];
		// 			// }
		// 		}
		// 	}
		// }

	}

		$query = new WC_Order_Query(array(
			'customer' => $current_user->user_email,
			'limit' => -1,
			'status' => 'completed'
		));

		$orders = $query->get_orders();

		
		foreach ($orders as $order) {
			// $order_data = $order->get_data(); // The Order data
			
			// $order_status = $order_data['status'];
			// if($order_status == 'completed'){
				if((int)$order->total != 0){
					foreach ($order->get_items() as $item_id => $item_data) {

					
					
						$single_variation = new WC_Product_Variation($item_data["variation_id"]);
						if ($item_data["product_id"] == 464 && (int)$order->total != 0){
							// var_dump((int)$order->total);
							
							// echo $single_variation->click .'<br>';
							$total_opens += (int)$single_variation->description;
	
							// $topup_total += (int)$item_data["quantity"];
						}else{
							$topup_total += (int)$single_variation->click;
						}
					}
				}
				
			// }
		}
		
		$topup_total += 1000;

	// if(count($orders) == 0){
	// 	$topup_total = 1000;
	// }

	$email = $current_user->user_email;
	$base_api = "http://mwiseapps.com/analytics/";
	
	$json_url = $base_api. "api/mastercampaign/get_campaigns";
	
	$post = ['email'=> $email];

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL,$json_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
	$response = curl_exec($ch);
	curl_close($ch);

	$object = json_decode($response);

	$data = json_decode($object->response);

	$total_remaining = 0;
	foreach ($data as $row) {

		$total_remaining += (int)$row->total_opens_assigned + (int)$row->mc_opens;
	}
	$total_assigned = $total_remaining;

	// echo $total_opens + $topup_total;
	

	$total_remaining = ($total_opens + $topup_total) -  $total_remaining;

	// echo $total_remaining;
		// echo json_encode($subscriptions);
	// var_dump($current_user);

	$camp = $_GET['myCamp'];

	if(!isset($camp)){
		$show = "style='display:none'";
		$isCamp = 0;
	}else{
		$show2 = "style='display:none'";

		$isCamp = 1;
	}

	?>
	<div class="container">



		<div class="row campaign-summary margin-top">
						
				<div class="col-md-12 col-12">PLAN DETAILS</div>

				
		</div>
		<div class="row bg-color">
				<div class="col-md-6 col-12 border-right">
							<div class="my-account-box ">
								<p><span class="personal-details">Personal Details </span> <span><a href="<?php echo get_home_url().'/'.'edit-details-user/'?>">Edit</a></span></p>
								<p><span>Name: </span> <span><?php echo $current_user->first_name." ".$current_user->last_name ;?></span></p>
								<p><span>Company: </span> <span><?php 
								
								// echo $current_user->ID;
								
								$args = array(
									// WC orders post type
									'post_type'   => 'shop_order',
									// Only orders with status "completed" (others common status: 'wc-on-hold' or 'wc-processing')
									'post_status' => 'wc-completed', 
									// all posts
									'numberposts' => 1,
									// for current user id
									'meta_key'    => '_customer_user',
									'meta_value'  => $current_user->ID
									
								);
							
								// Get all customer orders
								$customer_orders = get_posts( $args );

								$order = null;
								if(!empty($customer_orders)){
									$order_id = $customer_orders[0]->ID;
									$order = wc_get_order( $order_id );
									
									$order_data = $order->get_data();
									// echo $order_data['billing']['company'];
								}else{
									// $topup_total = $total_remaining = 1000;
								}
								echo get_user_meta($current_user->ID)['billing_company'][0];
								
								


								// var_dump(get_post_meta( $order->id, '_payment_method', true ));
								;?></span></p>
								<!-- <p><span>Payment Method: </span> <span><?php if($order != null){echo $order->get_payment_method_title( );}?></span></p> -->
								<p><span>Email: </span> <span><?php echo $current_user->user_email ;?></span></p>
								<p><span>Password: </span> <span>******</span></p>
								<p><span>Payment: </span> <span></span></p>

							</div>

						</div>

						<div class="col-md-6 col-12">
							<div class="my-account-box">
							<p><span class="personal-details">PLAN DETAILS </span> <span><a href="<?php echo get_home_url().'/pricing'?>">Edit</a></span></p>
								<p><span>Plan: </span> <span style="    text-transform: uppercase;"><?php if($variation_id == 0){echo "NO PLAN";}echo explode("-",$item)[1].' '; if($variation_id > 496){ echo "Annually";}elseif($variation_id > 0){ echo 'Monthly';}?></span></p>
								<p><span>Current Billing Period Ends: </span> <span><?php if($is_subcriber == true) {echo date_format($date,"d M Y");}else{echo "NO ENDING TIME";}?></span></p>
								<p><span>Remaining Credits This Period: </span> <span class="total_remaining"><?php echo $total_remaining;?></span></p>
								<!-- <p><span>Total Assigned Credit: </span> <span class="total_assigned"><?php echo $total_assigned;?></span></p>
								<p><span>Total: </span> <span class="totals"><?php echo ($total_opens + $topup_total);?></span></p> -->
								<p>
									<a href="<?php echo get_home_url()?>/pricing/?myPlan"><input type="submit" class="login-button woocommerce-Button button " name="login" value="<?php esc_attr_e( 'Change Plans', 'woocommerce' ); ?>"/></a>
									<a href="<?php echo get_home_url()?>/pricing"><input type="submit" class="login-button woocommerce-Button button " name="login" value="<?php esc_attr_e( 'Top Up For This Period', 'woocommerce' ); ?>"/></a>
								</p>
							
							</div>
						</div>
		</div>
		
		
		
		
<div class="plain-text-tracker" style="display:none">
	<div class="container no-pad-rl">
		<div class="alcent product ">
			<div>
				<img src="<?php echo get_template_directory_uri();?>/dist/images/link.png">
			</div>
			<div class="description">

				<div class="title"><h3>Add Ad Tracker</h3></div>
				<div class="text"><p>Short summary of the product. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p></div>
			</div>
			<div>
				<button class="open-prod">Select</button>
			</div>
		</div>
		<div class="form-drop">
			<div class="greenback">
				<span>Step 2: Just a few more details are needed for this tracker</span>
			</div>
			<div class="form-content">
				<h3>KEY CAMPAIGN DETAILS</h3>
				<span>Name your campaign and give your link an identifying nickname. Then choose how many clicks you want to track. <br>This amount will be deducted from your monthly allocation. </span>
			</div>
		<form>
				<div class="items">
					<label>Campaign Name:</label><div class="input-area"><input type="text" placeholder="Campaign name" id="ad_camp_name"></div>
				</div>
				<div class="items">
					<label>Link Name:</label><div class="input-area"><input type="text" placeholder="Link name" id="ad_link_name"></div>
				</div>
				<div class="items">
					<label>Link Address:</label><div class="input-area"><input type="text" placeholder="Link address" id="ad_link_address"></div>
				</div>

				<!-- <div class="items">
					<label>Distribute Opens / Clicks</label><div class="input-area"><input type="text" placeholder="ex: 10000" id="ad_opens"></div>
				</div> -->
				<div class="spacer"></div>
				<div class="form-content">
					<h3>ANALYTICS</h3>
					<span>Tell us a bit more about this ad, to help improve the quality of analytics available to you.</span>
				</div>
				<div class="items">
					<label>Your Industry:</label><div class="input-area">
						<!-- <input type="text" placeholder="enter name" id="ad_industry"> -->
					    <select class="form-control industry">
							<?php 
								
								$base_api = "http://mwiseapps.com/analytics/";
								
								$json_url = $base_api. "api/mastercampaign/get_industries";
								$post = array();

								$ch = curl_init();

								curl_setopt($ch, CURLOPT_URL,$json_url);
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
								$response = curl_exec($ch);

								curl_close($ch);
							
								$object = json_decode($response);
							
								$industry = json_decode($object->response);

								foreach ($industry as $row) {
									echo "<option value=".$row->ind_id.">".$row->ind_name."</option>";
								}
							
							?>
						</select>
					</div>
				</div>
				<div class="items">
					<label>Type of Ad:</label><div class="input-area"><input type="text" placeholder="Ad name" id="ad_type_add"></div>
				</div>

				<div class="items">
					<input type="button" class="add-new-button" id="ad_add_new" value="Add Campaign"/>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="plain-text-tracker" style="display:none">
	<div class="container no-pad-rl">
		<div class="alcent product ">
			<div>
				<img src="<?php echo get_template_directory_uri();?>/dist/images/email.png">
			</div>
			<div class="description">

				<div class="title"><h3>Add Email Tracker</h3></div>
				<div class="text"><p>Short summary of the product. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p></div>
			</div>
			<div>
				<button class="open-prod">Select</button>
			</div>
		</div>
		<div class="form-drop">
			<div class="greenback">
				<span>Step 2: Just a few more details are needed for this tracker</span>
			</div>
			<div class="form-content">
				<h3>KEY CAMPAIGN DETAILS</h3>
				<span>Name your campaign and give your link an identifying nickname. Then choose how many clicks you want to track. <br>This amount will be deducted from your monthly allocation. </span>
			</div>
		<form>
				<div class="items">
					<label>Campaign Name:</label><div class="input-area"><input type="text" placeholder="Campaign name" id="email_camp_name"></div>
				</div>
				<!-- <div class="items">
					<label>Link Name:</label><div class="input-area"><input placeholder="enter name" id="email_link_name"></div>
				</div>
				<div class="items">
					<label>Link Address:</label><div class="input-area"><input placeholder="enter name" id="email_link_address"></div>
				</div> -->
				<!-- <div class="items">
					<label>How many clicks do you want tracked?</label><div class="input-area"><input placeholder="enter name"></div>
				</div> -->
				<!-- <div class="items">
					<label>Distribute Opens / Clicks</label><div class="input-area"><input type="text" placeholder="ex: 10000" id="email_opens"></div>
				</div> -->
				<div class="form-content product-addon-link">
				<h3>LINKS</h3><span class="linksy">Do you want to track when readers click on any links in this email? <label class="addon-name"></label><div class="addon-description"><p>description here</p></div><input id="link_1" type="radio" value="Yes" name="links_more">Yes<input type="radio" value="No"  name="links_more" checked>No</span>
				</div>
				<div class="spacer"></div>
				<div class="form-content">
					<h3>ANALYTICS</h3>
					<span>Tell us a bit more about this ad, to help improve the quality of analytics available to you.</span>
				</div>
				<div class="items">
					<label>Your Industry:</label><div class="input-area">
						<!-- <input type="text" placeholder="enter name" id="email_industry"> -->
					
						<select class="form-control industry">
							<?php 
								foreach ($industry as $row) {
									echo "<option value=".$row->ind_id.">".$row->ind_name."</option>";
								}
							
							?>
						</select>
					</div>
				</div>
				<div class="items">
					<label>Type of Ad:</label><div class="input-area"><input type="text" placeholder="Ad name" id="email_type_add"></div>
				</div>
				

				<div class="items">
					<input type="button" class="add-new-button" id="email_add_new" value="Add Campaign"/>
				</div>
			</form>
		</div>
	</div>
</div>

				<!-- <div class="row">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#home">CAMPAIGN HISTORY</a></li>
							<li><a data-toggle="tab" href="#menu1">BILLING HISTORY</a></li>
							<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
						</ul>

						<div class="tab-content">
							<div id="home" class="tab-pane fade in active">
							
							

							</div>

							<div id="menu1" class="tab-pane fade">
								
							

							</div>
					
						</div>

				</div> -->

				<div <?php echo $show2;?>>

				<div class="row campaign-summary margin-top">
						
						<div class="col-md-12 col-12">BILLING HISTORY</div>
		
						
				</div>

				<div class="row">
			<table id='tb_master_camp__' class="pure-table pure-table-bordered tb_master" style=" font-size:15px;   width: 100%;   " align="center">  
				<thead style=" vertical-align: middle;">
					<tr>
						<td>Date</td>
						<td>Receipt Number</td>
						<td>Status</td>
						<td>Amount</td>
						<td>Invoice</td>
					</tr>
				</thead>
				<tbody>
					
							
						<?php 

								$customer_orders = get_posts( array(
									'numberposts' => 10,
									'meta_key'    => '_customer_user',
									'meta_value'  => get_current_user_id(),
									'post_type'   => wc_get_order_types(),
									'post_status' => array_keys( wc_get_order_statuses() ),
								) );

								foreach ($customer_orders as $order) {
									
									$order_id = $order->ID;

									$order = wc_get_order( $order_id );

									$order_data = $order->get_data();

									$order_status = $order_data['status'];

									$order_date_created = $order_data['date_created']->date('Y-m-d H:i:s');

									$order_total = $order_data['cart_tax'];

									$date = date_create($order_date_created);
									$date =  date_format($date,"d M y");

									if($order_status == "completed"){

										$order_status = "<i class='fa fa-check-circle' aria-hidden='true' style='color:green'></i>"." ".$order_status;
									}elseif($order_status == "cancelled"){

										$order_status = "<i class='fa fa-remove order-status' aria-hidden='true' style='color:#FFF'></i>"." ".$order_status;
									}elseif($order_status == "pending"){

										$order_status = "<i class='fa fa-clock-o' aria-hidden='true' style='color:yellow'></i>"." ".$order_status;
									}

									
									
									echo "<tr><td>".$date."</td><td>".$order_id."</td><td>".$order_status."</td><td>$".(int)$order->get_total()."</td><td><a href='".get_home_url()."/wp-admin/post.php?post=".$order_id."&action=edit&pdfid=".$order_id."' style='text-decoration:underline'>Print Invoice</a></td></tr>";
								}
				
						?>
			
			</tbody>
			
		</table>

			</div>

							</div>
							<div <?php echo $show;?>>
		<div class="row campaign-summary margin-top">
						
				<div class="col-md-12 col-12">CAMPAIGN HISTORY</div>

				
		</div>

		<div class="row">
			<table id='tb_master_camp' class="pure-table pure-table-bordered tb_master" style=" font-size:15px;   width: 100%;   " align="center">
				<thead style=" vertical-align: middle;">
					<tr>
						<td>Name</td>
						<td>Launch Date</td>
						<td>Opens/Clicks<br><span style=" font-size:12px;  ">(Actual/Purchased)</span></td>
						<td>Notes</td>
						<td>Tracking Data</td>
					</tr>
				</thead>
				<tbody>
					
				
			<?php 
				

				// var_dump($data);

				$actual = 0;
				foreach ($data as $row) {
					
					$order_id = $row->mc_order_id;
					$order;
						// echo $order_id . "<br>";
						// if((int)$order_id != 0){
						// 	$order = wc_get_order( $order_id );
						// 	foreach( $order-> get_items() as $item_key => $item_values ):
								
						// 			$item_data = $item_values->get_data();
							
						// 			$meta_data = $item_data['meta_data'];

									
						// 			for ($i=0; $i < count($meta_data); $i++) { 
										
						// 				if($meta_data[$i]->key == 'how-many-clicks-do-you-want-to-track'){
						// 					$actual = $meta_data[$i]->value;
						// 				}
										
						// 			}

						// 	endforeach;
						// }else{

							
							$actual = (int)$row->total_opens_assigned + (int)$row->mc_opens;

							// $total_assigned_opens += $actual;
						// }
						// echo $row->total_opens_assigned;
						$total = $row->total;
						$warning="";
						$style="";
						$title="";
						
	
						$date=date_create($row->mc_created_date);
						$date =  date_format($date,"d M y");
						// if((int)$order_id != 0){
						// 	$home_url = get_home_url(). "/tracker-codes/?order_id=".$order_id;
						// }else{
							$home_url = get_home_url(). "/tracker-codes/?camp_id=".urlencode(base64_encode($row->mc_id));
						// }
						
						$order = wc_get_order($order_id);

						
						if($order == false){
							continue;
						}
						$order_items = $order->get_items();
						
						// Iterating through each WC_Order_Item_Product objects
						$status = false;
						foreach ($order_items as $item_key => $item_values){

							$has_auto_topup = "";
						$temp_auto = "";

							$item_data = $item_values->get_data();
							// var_dump($item_data);
							// $item_data = $item_values->get_data();
							$product_id = $item_data['product_id'];
							// var_dump($item_data);
							if($product_id == 55 || $product_id = 308)
							{
									$item_data = $item_values->get_data();
									$meta_data = $item_data["meta_data"];
									// echo json_encode($item_data["meta_data"]);
									// var_dump($meta_data);
									for ($i=0; $i < count ($meta_data); $i++) { 

										if( $meta_data[$i]->value == "Add Auto Top-Up" ){
											// echo "has auto top-up";
											$status = true;
											
										}
										if( $meta_data[$i]->key == "unique id" ){
												if( $meta_data[$i]->value == $row->mc_order_hash){
													if($status == true){
														// $bonus = (int)($actual*25/100);
														$bonus = $row->mc_bonus;
														$has_auto_topup = "class='has-auto-topup' data-bonus='".$bonus."'";
														$temp_auto = "<span style='font-weight:300'>(*)</span>";
														break;
													}
												}
										}
										
									}
									// break;
									// echo json_encode($item_data["meta_data"]);return;
							}

						}
						// die();

						// $total = 78000;
						$style2="";
						if($total >= $actual){

							$actual = $actual + $bonus;

							$overused = (int)$total - (int)$actual;
							$title = "YOU’RE MISSING OUT! You have reached your purchased limit of credits for this campaign, and are currently missing out on data of ".$overused." customers. Top-up credits for this campaign to access full & updated analytics.";
							$warning = "Top Up Credits to get<br> updated analytics.";
							// $warning .= "<br> Missing out on <br> data of ".$overused." customers";
							$style="class='tooltip-box' style='color:#83181c'";

							$style2=" style='color:#83181c' ";
							
						}

	
						echo "<tr>
						<td>".$row->mc_name." ".$temp_auto."</td>
						<td>".$date."</td><td $style><span id='total-actual-".$row->mc_id."' ".$has_auto_topup.$style2." >".$total."/".$actual."</span> <span style='float:right'><a href='#' class='add-opens' data-mc-name='".$row->mc_name."' data-mc-id='".$row->mc_id."' ".$style2."><i class='fa fa-rocket' aria-hidden='true'></i> Boost</a></span></td>
						<td $style title='$title' data-toggle='tooltip'>".$warning."</td>
						<td><a href='".$home_url."' style='text-decoration:underline'>View Tracking</a></td>
						</tr>";
					
					

					

				}

				// echo $total_assigned_opens;
			?>
			
			</tbody>
			
		</table>

			</div>

			<div class="row" style="font-size:12px">(*): activate auto topup when the credits have run out</div>
	</div>

			</div>

	<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Message</h5>
      </div>
      <div class="modal-body">
		  You can no change this opens / clicks value after you have added campaign successfully. 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Agree</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="assign-opens-dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 125%;font-size: 15px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">BOOST CAMPAIGN</h5>
      </div>
      <div class="modal-body">
		
			<div class='boost-camp'>There are tracking results available for [xxx] credits beyond your current purchase limit. Boost this campaign to unlock this data or track future credits.</div>

			<div class='boost-camp'>How many additional credits do you want to see tracking results for <span class='mc_name'></span> campaign ?</div>
	
		  <div class="row">
				<div class="col-md-12">
					<input type="text" data-validation="digit" class="input-text form-control boost-textinput" placeholder='Enter number of addtional Opens/Click to track: ex 100000'/>
					<span class='boost_error_message'>The value is not correct</span>
				</div>
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id='agree_add'>Boost <i class="fa fa-circle-o-notch fa-spin"></i></button>
      </div>
    </div>
  </div>
</div> -->
<!-- Generated markup by the plugin -->
<!-- <div class="tooltip tooltip-top" role="tooltip">
  <div class="tooltip-arrow"></div>
  <div class="tooltip-inner">
    Some tooltip text!
  </div>
</div> -->

<style>
	.ui-tooltip {
		/* padding: 10px 20px;
		color: white;
		border-radius: 20px; */
		font-size: 15px ;
		/* text-transform: uppercase; */
		/* box-shadow: 0 0 7px black; */
  }
</style>

	<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css">

	<script>
		
		

		var newbg = '<?php echo get_field("background_kv_2")?>';

  		var total_opens = '<?php echo $total_opens + $topup_total;?>';
		
		var total_remaining = parseInt(jQuery('.total_remaining').text());

		// jQuery('.nav-item-541 a').html(total_remaining);
	
		// jQuery(".tooltip-box").hover(function(){
		// 		jQuery(this).
		// })
		var base_url = 'http://mwiseapps.com/analytics';

		var email = '<?php echo $current_user->user_email;?>';

		var home_url = '<?php echo get_home_url();?>';
		var mc_id, mc_name;
		jQuery(document).ready(function(){

			// jQuery(".active").removeClass("active");

			// jQuery(".nav-item").click(function(){
			// 	jQuery(".active").removeClass("active");
			// 	jQuery(this).addClass("active");
			// 	console.log("HERE HERE HERE HERE");

			
			// })

			if(jQuery(jQuery(".nav-item").get(4)).hasClass("active")){
				jQuery(jQuery(".nav-item").get(5)).removeClass("active");

				// if(isCamp == 1){
				// 	jQuery(".back-kv").css("background-image","url("+newbg+")");

				// 	jQuery(".lato").empty();

				// 	jQuery(".lato").append('<span class="white-bar">My</span> Campaign');
					


				// 	// console.log(jQuery(".back-kv").css("background-image"));
				// }
			}

			jQuery('#agree_add').click(function(){
				var opens = jQuery('*[data-validation="digit"]').val();
				if(opens == '' || parseInt(opens) > parseInt(total_remaining)){
					jQuery('*[data-validation="digit"]').addClass('wrong');
					jQuery('.boost_error_message').fadeIn();
					return false;
				}else{
					jQuery('*[data-validation="digit"]').removeClass('wrong');
					jQuery('.boost_error_message').fadeOut();

				}
				var agree_button = jQuery(this);
				agree_button.prop("disabled",true);

				jQuery(".fa-circle-o-notch").show();
				jQuery.ajax({
								url: base_url + "/api/mastercampaign/add_opens_credit",
								type:"post",
								data:{	
									mc_id: mc_id,
									opens: opens 
									}
							}).done(function(response){

								jQuery.ajax({
									url: base_url + "/api/mastercampaign/get_campaigns",
									type:"post",
									data:{	
										email: email
										}
								}).done(function(response){
									var res = JSON.parse(response.response);
									var total = 0;

									var total_opend_camp = 0;
									var total_limit_camp = 0;
									for (var index = 0; index < res.length; index++) {

										console.log(res[index].total_opens_assigned);
										total  += parseInt(res[index].total_opens_assigned) + parseInt(res[index].mc_opens);
										if(parseInt(res[index].mc_id) == mc_id){
											total_opend_camp = res[index].total;
											total_limit_camp += parseInt(res[index].total_opens_assigned) + parseInt(res[index].mc_opens);
										}
									}
									console.log(total);
									console.log(parseInt(total_opens) - total);

									jQuery('.total_remaining').text(parseInt(total_opens) - total);
									jQuery('.total_assigned').text(total);
									jQuery('.totals').text(parseInt(total_opens));

									
									var id="#total-actual-" + mc_id;
									jQuery(id).text(total_opend_camp + "/" + total_limit_camp);

									jQuery('#assign-opens-dialog').modal('hide');
									agree_button.prop("disabled",false);
									agree_button.val("");

									jQuery(".fa-circle-o-notch").hide();

									var temp = jQuery('.nav-item-541 a').html();

									var tt_r = parseInt(total_opens) - total;
									var old_val = temp.split(" ")[2];
									var new_val = "[" + tt_r + "]";
									console.log(old_val);
									console.log(new_val);
									temp = temp.replace(old_val, new_val);
									jQuery('.nav-item-541 a').html(temp);

									window.location = home_url + "/my-account";
								})
			
								 

							})
			})

			jQuery('*[data-validation="digit"]').keydown(function (e) {
					if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
							(e.keyCode == 65 && e.ctrlKey === true) ||
							(e.keyCode >= 35 && e.keyCode <= 40)) {
						return;
					}
					if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
						e.preventDefault();
					}
				});

			jQuery("#ad_opens").focusout(function(){
				jQuery('#exampleModal').modal('show'); 

			})
			jQuery("#email_opens").focusout(function(){
				jQuery('#exampleModal').modal('show'); 

			})
			
			jQuery("#email_add_new").click(function(){
				console.log("HEREEEE");
				
				var email_camp_name = jQuery("#email_camp_name").val();

				var email_opens = jQuery("#email_opens").val();

				
				

				var add_button = jQuery(this);
				var status = true;
				var input = jQuery(this).parents("form").first().find("input[type=text]");

				

				input.each(function(){
					console.log(jQuery(this));
					if(jQuery(this).val().trim() == ""){
						jQuery(this).addClass("wrong");
						status = false;
						add_button.prop("disabled",false);
						add_button.css("background-color","#00c8ca");
					}else{
						jQuery(this).removeClass("wrong");
					}
				}).promise().done(function(){

					// if(isNormalInteger(email_opens)){
					// 	jQuery("#email_opens").removeClass("wrong");
						
					// }else{
					// 	jQuery("#email_opens").addClass("wrong");
						
					// 	add_button.prop("disabled",false);
					// 	add_button.css("background-color","#00c8ca");
					// 	status = false;

					// }

					if(status == true){

							add_button.prop("disabled",true);
							add_button.css("background-color","#74bcbc");

							var radio_seleted = jQuery('input[name=links_more]:checked').val();
							var links=[];
							if(radio_seleted == "Yes"){
								jQuery("input.input-link").each(function(){
									links.push(jQuery(this).val());
								})
							}

							console.log(links);

							var industry = jQuery('.industry').last().val();

							jQuery.ajax({
								url: base_url + "/api/mastercampaign",
								type:"post",
								data:{	email: email,
										order_id: 0,  
										name: email_camp_name,
										email_name: email_camp_name, 
										link_name:"", 
										link_address:"",
										product_id:"55", 
										unique_id:"",
										links:links,
										opens: 0,
										industry:industry	
									}
							}).done(function(response){

								showDialog();
			
								console.log(response);

								var obj = JSON.parse(response.response);
								var camp = obj.master_camp[0];

								jQuery('#tb_master_camp > tbody').prepend("<tr><td>" + camp.mc_name + "</td><td>" + camp.mc_created_date + "</td><td><span id='total-actual-" + camp.mc_id + "'>0/0</span> <span style='float:right'><a href='#' class='add-opens' data-mc-name='" + camp.mc_name + "' data-mc-id='" + camp.mc_id + "'><i class='fa fa-rocket' aria-hidden='true'></i> Boost</a></span></td>"+
								"<td $style title='$title' data-toggle='tooltip'></td><td><a href='" + home_url + "/tracker-codes/?camp_id="+camp.mc_id+"'>View Tracking</a></td></tr>").find('tr:first').hide().fadeIn(1000); 
								
								add_button.prop("disabled",false);
								add_button.css("background-color","#00c8ca");

								jQuery('.add-opens').click(function(){
									var object = jQuery(this);
									mc_id = object.data("mc-id");
									mc_name = object.data("mc-name");

									jQuery('.mc_name').text(mc_name);
									jQuery('#assign-opens-dialog').modal('show'); 

									jQuery(".fa-circle-o-notch").hide();
								})

							})
				

					}else{
						return false;
					}
				})
			})


			jQuery("#ad_add_new").click(function(){
				// console.log("HEREEEE");
				var ad_camp_name = jQuery("#ad_camp_name").val();
				var ad_link_name = jQuery("#ad_link_name").val();
				var ad_link_address = jQuery("#ad_link_address").val();
				var ad_industry = jQuery("#ad_industry").val();
				var email_type_add = jQuery("#email_type_add").val();

				var ad_opens = jQuery("#ad_opens").val();


				var add_button = jQuery(this);
				var status = true;
				var input = jQuery(this).parents("form").first().find("input[type=text]");
				
				console.log(input);
				
				input.each(function(){
					console.log(jQuery(this));
					if(jQuery(this).val().trim() == ""){
						jQuery(this).addClass("wrong");
						status = false;
						add_button.prop("disabled",false);
						add_button.css("background-color","#00c8ca");
					}else{
						jQuery(this).removeClass("wrong");
					}
				}).promise().done(function(){


					if(status == true){
								// console.log("HERERERE");

								add_button.prop("disabled",true);
						add_button.css("background-color","#74bcbc");

						var industry = jQuery('.industry').first().val();

								jQuery.ajax({
												url: base_url + "/api/mastercampaign",
												type:"post",
												data:{	email: email,
														order_id: 0,  
														name: ad_camp_name,
														link_name:ad_link_name, 
														link_address:ad_link_address,
														product_id:"308", 
														unique_id:"",
														opens: 	0,
														industry:industry}
								}).done(function(response){

									showDialog();
									console.log(response);
									
									add_button.prop("disabled",false);
									add_button.css("background-color","#00c8ca");

									var obj = JSON.parse(response.response);
								var camp = obj.master_camp[0];

									jQuery('#tb_master_camp > tbody').prepend("<tr><td>" + camp.mc_name + "</td><td>" + camp.mc_created_date + "</td><td><span id='total-actual-" + camp.mc_id + "'>0/0</span> <span style='float:right'><a href='#' class='add-opens' data-mc-name='" + camp.mc_name + "' data-mc-id='" + camp.mc_id + "'><i class='fa fa-plus' aria-hidden='true'></i></a></span></td>"+
										"<td $style title='$title' data-toggle='tooltip'></td><td><a href='" + home_url + "/tracker-codes/?camp_id="+camp.mc_id+"'>View Data</a></td></tr>").find('tr:first').hide().fadeIn(1000);;
								
									add_button.prop("disabled",false);
									add_button.css("background-color","#00c8ca");

									jQuery('.add-opens').click(function(){
										var object = jQuery(this);
										mc_id = object.data("mc-id");
										mc_name = object.data("mc-name");

										jQuery('.mc_name').text(mc_name);
										jQuery('#assign-opens-dialog').modal('show'); 

										jQuery(".fa-circle-o-notch").hide();
									})
								})

					}else{
						return false;
					}
				})
				

			})

			jQuery('.add-opens').click(function(){
				var object = jQuery(this);
				mc_id = object.data("mc-id");
				mc_name = object.data("mc-name");

				jQuery('.mc_name').text(mc_name);
				jQuery('#assign-opens-dialog').modal('show'); 

				jQuery(".fa-circle-o-notch").hide();
			})
		})

		function isNormalInteger(str) {
			return /^\+?(0|[1-9]\d*)$/.test(str);
		}

		function showDialog(){
			if(!alertify.thank){
							//define a new dialog
							alertify.dialog('thank',function factory(){
							  return{
								main:function(message){
								  this.message = message;
								  this.setHeader('<h4>Message</h4>');
								},
								setup:function(){
									return { 
									  // buttons:[{text: "cool!", key:27/*Esc*/}],
									  // focus: { element:0 }
									  header:[
										{attrs:{id:'test'}}
									  ]
									};
								},
								prepare:function(){
								  this.setContent(this.message);
								},
								build:function(){
								  this.elements.root.classList.add("update-user-message");
								}
							}}); 
						  }
						  alertify.thank("Campaign has been created successfully");
		}
		
	
		jQuery( function() {

			// alertify.alert("This is an alert dialog.", function(){
			// 	// alertify.message('OK');
			// });			
			jQuery('[data-toggle="tooltip"]').tooltip();



			
  		} );
	</script>
<!-- <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?> -->