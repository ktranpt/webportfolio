<?php
/**
 * Template Name: Pricing Template
 */
?> 



<?php $current_user = wp_get_current_user(); 
	$switch_subscription_id =0;
	$variation_id = 0;
	$variation_name;
	if($current_user->ID != 0){

		$subscriptions = wcs_get_users_subscriptions( $current_user->ID );
		$currentsub;

		foreach ($subscriptions as $subscription){

			if($subscription->get_status() == 'active'){
				$currentsub = $subscription;
				break;
			}
		}

		// var_dump($currentsub->ID);
		$switch_subscription_id = $currentsub->ID;
	

	// $switch = new WC_Subscriptions_Switcher();

	// var_dump($switch->get_switch_url());
	// echo json_encode($currentsub);
	// var_dump($currentsub);
	$item_id ;
	$item;

	if($currentsub != NULL){
		foreach ( $currentsub->get_items() as $line_item_id => $line_item ) {
			// if ( $line_item['product_id'] == $product->get_id() || $line_item['variation_id'] == $product->get_id() ) {
			// 	$item_id = $line_item_id;
			$item    = $line_item;
			// 	break;
			// }
			$item_id = $line_item_id;
	
	
		}
	
		$url = WC_Subscriptions_Switcher::get_switch_url($item_id, $item, $currentsub);
		// var_dump(wcs_get_switch_orders_for_subscription($currentsub->ID));
		// echo $url;
	
		// $subscription = wc_get_order($subscription_id); // Or: new WC_Subscription($subscription_id); 
		
		// Iterating through subscription items
		
		foreach( $currentsub->get_items() as $item_id => $product_subscription ){
			// Get the name
			$variation_id = $product_subscription["variation_id"];
			$variation_name = $product_subscription["name"];
		}
	}


}
// $variation_id = 625;
// echo $variation_id;

$myPlan = $_GET['myPlan'];

if(isset($myPlan)){
	$hide = "style='display:none'";
}
?>

<style>
	.back-kv{
		background-image: url('<?php if($variation_id != 0) {echo get_field('background_kv_2');}else {echo get_field('background_kv');}?>');
		background-repeat: no-repeat;
		background-size: cover;
		min-height: 332px;
		background-position: center center;
		position:relative;
	}
	body{
		background-color: #f3f3f3;
	}
</style>


<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <div class="fluid-container back-kv" >
		<div class="container">

				<div class="heading-kv">
				<?php /*?><h1><span class="white-bar">THE EDGE </span> FOR <?php echo get_field('the_edge_for');?></h1><?php */
					
				?>
					<h1 class="lato">
					
						<?php if($variation_id != 0){
							echo '<span class="white-bar">your plan</span> details';
						} else{
							echo get_the_title();
						}?>
					</h1>
				</div>
				
				<?php if($variation_id != 0){ ?>
						
				<?php } else {?>
					<div class="cta-kv">
					<span><?php echo get_field('subtitle');?></span>
				</div>

				<?php }?>
		

		</div>
		<div class="promo gotham">
				<div class="container">1 credit = 1 open/click</div>
			</div>
  </div>

 

<div class="container container-pad-50">
	<div class="row">
	
	<?php if($variation_id == 0){?>
		<div class="col-lg-3 col-md-4 no-pad-rl">
			<div class="price-list" <?php echo $hide;?>>
			
				<div class="price-list-head lato">CASUAL USER <span>Buy trackers with no commitment</span></div>
				<?php 

$product_id = '940';
$handle=new WC_Product_Variable($product_id);
        $variations1=$handle->get_children();
        foreach ($variations1 as $value) {
		$single_variation=new WC_Product_Variation($value);
            echo '<div class="price-list-item"><span class="text-1">'.implode(" / ", $single_variation->get_variation_attributes()).'</span><span class="text-2">'.get_woocommerce_currency_symbol().$single_variation->price.'<a href="#" class="buy_now" data-product-name="'.implode('-',explode(' ',$handle->get_title())).'" data-product-id="'.$product_id.'" data-variation-id="'.$value.'" data-attribute-plan="'.implode(" / ", $single_variation->get_variation_attributes()).'" >Buy Now</a></span></div>';
}
;?>
			</div>
		</div>

		<?php }else{ 
			
			$title = "";
			if($variation_id == 496){
				$product_id = 774;
				$title = 'Starter Monthly';
			}elseif($variation_id == 465)
			{
				$product_id = 656;
				$title = 'Growing Monthly';
			}elseif($variation_id == 466)
			{
				$product_id = 775;
				$title = 'Pro Monthly';
				// $addon_auto = "addon-775-add-addon-top-up-0[]";
			}
			elseif($variation_id == 624)
			{
				$product_id = 776;
				$title = 'Starter Annually';
			}
			elseif($variation_id == 625)
			{
				$product_id = 777;
				$title = 'Growing Annually';
			}
			elseif($variation_id == 626)
			{
				$product_id = 778;
				$title = 'Pro Annually';
			}
			?>
	
	
	<div class="col-lg-3 col-md-4 no-pad-rl">
			<div class="price-list" <?php echo $hide;?>>
			
				<div class="price-list-head lato"><?php echo $title.' Price';?> <span>Choose the amount of top-up</span></div>
				<?php 
				// $product_id = '656';
$handle=new WC_Product_Variable($product_id);
        $variations1=$handle->get_children();
        foreach ($variations1 as $value) {
		$single_variation = new WC_Product_Variation($value);
            echo '<div class="price-list-item"><span class="text-1">'.implode(" / ", $single_variation->get_variation_attributes()).'</span><span class="text-2">'.get_woocommerce_currency_symbol().$single_variation->price.'<a href="#" class="buy_now" data-product-name="'.implode('-',explode(' ',$handle->get_title())).'" data-product-id="'.$product_id.'" data-variation-id="'.$value.'" data-attribute-plan="'.implode(" / ", $single_variation->get_variation_attributes()).'">Buy Now</a></span></div>';
}
;?>
			</div>
		</div>
	
	
	
<?php } ?>

<!-- <?php if($variation_id == 465 || $variation_id == 625){ ?>

	<?php
		$args = array(
			'post_type' => 'product',
			'product_cat' => 'topup',
			'product_type' => 'variable-subscription',
			'posts_per_page' => 12,
			'orderby' => 'menu_order',
			'order' => 'ASC'
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
			?>
		<div class="col-lg-3 col-md-4 no-pad-rl input-pricing-type">
			<div class="price-list">

				<div class="price-list-head lato">TOP UP <br> CREDITS</div>
				<div class="black">On current plan, top up is $X.00 per credits</div>
				<form class="cart  a" method="post" enctype='multipart/form-data'>
		<?php 
		// global $product;
			/**
			 * @since 2.1.0.
			 */
			do_action( 'woocommerce_before_add_to_cart_button' );

			/**
			 * @since 3.0.0.
			 */
			do_action( 'woocommerce_before_add_to_cart_quantity' );

			woocommerce_quantity_input( array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				// 'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
				'input_value' => '10000',
				
			) );

			/**
			 * @since 3.0.0.
			 */
			do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>
		
		<div class="black">$[cost auto calculated]</div>
		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="button alt">Buy Now</button>
		
			</div>
		</div>
		
			

		<?php	endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>

<?php } ?> -->

		<div class="col-lg-9 col-md-8">
			<?php if($variation_id == 0){?>
				<div class="plan-list-head"><h2>saver plans</h2><span> to a plan to save with our best rates! Choose between monthly and annual.</span></div>
			<?php } else{ ?> 
				<div class="auto marg-bot"><span>You are currently on our <strong><?php echo explode("-",$variation_name)[1].' '; if($variation_id > 496){ echo "Annually";}else{ echo 'Monthly';}?></strong> plan</span></div>
				<div class="plan-list-head"><h2>upgrade your plan</h2><span>Upgrade your plan to get more opens / clicks and enjoy better savings every day! 1 credits = 1 open/click</span></div>

			<?php } ?>
			<div class="plan-item">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active blue" href="#profile" role="tab" data-toggle="tab"><h2>MONTHLY</h2></a>
					</li>
					<li class="nav-item">
						<a class="nav-link purple" href="#buzz" role="tab" data-toggle="tab"><h2>ANNUAL<font> (SAVE 20%)</font></h2></a>
					</li>
				</ul>
				<div class="tab-content">
				  <div role="tabpanel" class="tab-pane fade in active show" id="profile">
				  <div class="col-md-12 pricing-board blue">
			  		<div class="row no-margin-rl">
				  				<?php 
								$handle=new WC_Product_Variable('464');
								$variations1=$handle->get_children();
								$i = 1;
								foreach ($variations1 as $value) {
								
								if($i > 3){
									$single_variation=new WC_Product_Variation($value);
									?>
									
								<div class="col-md-3 pad-rl-5">
											<div class="plan-item-list">
												<div class="overlay <?php if($variation_id == $value){echo "current-used";}?>" data-variation-id="<?php echo $value;?>" data-product-id="464" data-attribute-plan="<?php echo implode(" / ", $single_variation->get_variation_attributes());?>">
													<span><img src="<?php echo home_url().$single_variation->image_link;?>-blue.png"></span>
													<span class="plan-title"><?php if($variation_id == $value){echo "Current Plan";}else{echo "Subscribe";}?></span>
													<span class="spining"><i class="fa fa-circle-o-notch fa-spin"></i></span>

												</div>
												<span><img src="<?php echo home_url().$single_variation->image_link;?>.png"></span>
												<span class="plan-title"><?php echo implode(" / ", $single_variation->get_variation_attributes());?></span>
												<span class="margin-bottom-sub"><strong><font>&#36;</font><?php echo $single_variation->price ;?></strong> /month</span>
												<?php if($single_variation->click != ""){ ?>
												<span class="margin-bottom-sub"><?php echo $single_variation->click ;?></span>
												<?php	}?>
												<?php if($single_variation->info_1 != ""){ ?>
												<span class="margin-bottom-sub"><?php echo $single_variation->info_1 ;?></span>
												<?php	}?>
												<?php if($single_variation->info_2 != ""){ ?>
												<span class="margin-bottom-sub"><?php echo $single_variation->info_2 ;?></span>
												<?php	}?>
												<?php if($single_variation->info_3 != ""){ ?>
												<span class="margin-bottom-sub"><?php echo $single_variation->info_3 ;?></span>
												<?php	}?>
												
											</div>

								</div>
											<?php
												}
											$i++;
										}
								?>
								<div class="col-md-3 pad-rl-5">
									<div class="plan-item-list" data-toggle="modal" data-target="#support">
										<div class="overlay" data-variation-id="0" >
											<span><img src="<?php echo get_template_directory_uri();?>/dist/images/trees-blue.png"></span>
											<span class='talk-to-us'>Talk to us</span>
											<span class="plan-title">
												<!-- <?php if($variation_id == $value){echo "Current Used";}else{echo "Subscribe";}?> -->
												</span>
										</div>
										<span><img src="<?php echo get_template_directory_uri();?>/dist/images/trees.png"></span>
										<span class="plan-title last">Enterprise</span>
										<span>Talk to us about high volume plans</span>
									</div>
								</div>
				  	</div>
				  </div>
				  </div>
				  <div role="tabpanel" class="tab-pane fade" id="buzz">
						<div class="col-md-12 pricing-board purple">
							<div class="row no-margin-rl">
								<?php 
								$handle=new WC_Product_Variable('464');
								$variations1=$handle->get_children();
								$i = 1;
								foreach ($variations1 as $value) {
								if($i <= 3){
								$single_variation=new WC_Product_Variation($value);
									
									?>
									
								<div class="col-md-3 pad-rl-5">
											<div class="plan-item-list">
												<div class="overlay <?php if($variation_id == $value){echo "current-used";}?>" data-variation-id="<?php echo $value;?>" data-product-id="464" data-attribute-plan="<?php echo implode(" / ", $single_variation->get_variation_attributes());?>">
													<span><img src="<?php echo home_url().$single_variation->image_link;?>-purple.png"></span>
													<span class="plan-title"><?php if($variation_id == $value){echo "Current Plan";}else{echo "Subscribe";}?></span>
													<span class="spining"><i class="fa fa-circle-o-notch fa-spin"></i></span>

													</div>
												<span><img src="<?php echo home_url().$single_variation->image_link;?>.png"></span>
												<span class="plan-title"><?php echo implode(" / ", $single_variation->get_variation_attributes());?></span>
												<span class="margin-bottom-sub"><strong><font>&#36;</font><?php echo $single_variation->price / 12;?></strong> /month</span>
												<?php if($single_variation->click != ""){ ?>
												<span class="margin-bottom-sub"><?php echo $single_variation->click ;?></span>
												<?php	}?>
												<?php if($single_variation->info_1 != ""){ ?>
												<span class="margin-bottom-sub"><?php echo $single_variation->info_1 ;?></span>
												<?php	}?>
												<?php if($single_variation->info_2 != ""){ ?>
												<span class="margin-bottom-sub"><?php echo $single_variation->info_2 ;?></span>
												<?php	}?>
												<?php if($single_variation->info_3 != ""){ ?>
												<span class="margin-bottom-sub"><?php echo $single_variation->info_3 ;?></span>
												<?php	}?>
											</div>

								</div>
											<?php
												}
											$i++;
										}
								?>
								<div class="col-md-3 pad-rl-5">
									<div class="plan-item-list" data-toggle="modal" data-target="#support">
										<div class="overlay" data-variation-id="0" >
											<span><img src="<?php echo get_template_directory_uri();?>/dist/images/trees-purple.png"></span>
											<span class='talk-to-us-anual'>Talk to us</span>
											<span class="plan-title">
											<!-- <?php if($variation_id == $value){echo "Current Used";}else{echo "Subscribe";}?> -->
											</span>
										</div>
										<span><img src="<?php echo get_template_directory_uri();?>/dist/images/trees.png"></span>
										<span class="plan-title last">Enterprise</span>
										<span>Talk to us about high volume plans</span>
									</div>
								</div>
							</div>
					  </div>	
				  </div>
				</div> 
			</div>

			<?php if($variation_id != 0){?>
				<div class="auto marg-top"><a id="cancel" href="#">Cancel your plan</a></div>
				<div class="auto"><a id="terminate" href="#">Terminate your account</a></div>

			<?php }?> 
		</div>
	</div>
</div>
  
  
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>


<script>
var var_id = '<?php echo $variation_id?>';
var current_user_id = <?php echo $current_user->ID?>;
var base_url = '<?php echo get_home_url();?>';
var sub_id = '<?php echo $switch_subscription_id?>';
var item_id = '<?php echo $item_id?>';
var url = '<?php echo $url?>';
jQuery(document).ready(function() {  

	// jQuery('#cancel').click(function(){
	// 	jQuery.ajax({
    //       data: {
	// 		  'action' : 'mw_cancel_subscription',
	// 		  'sub_id' : sub_id},
	// 	  url: base_url +  '/wp-admin/admin-ajax.php',
	// 	  type:"post"
    //     }).done(function(response){

    //     });
	// })

	jQuery('.buy_now').click(function(){
		var anchor = jQuery(this);
		var product_id = anchor.data('product-id');
		var variation_id = anchor.data('variation-id');
		var attribute_plan = jQuery(this).data('attribute-plan');
		var product_name = jQuery(this).data('product-name');

		// var addons = jQuery(this).data('addons');

		var ajax_url = base_url + "/product/"+product_name+"/";

		var thisss = jQuery(this);
		jQuery('.buy_now').addClass("a_disable");
		jQuery.ajax({
			data: {
				// 'action' : 'mw_subcribe_add_to_card',
				'variation_id' : variation_id, 
				'product_id' : product_id, 
				'add-to-cart' : product_id,
				'quantity' : 1,
			  'attribute_how-many-clicks-do-you-want-to-track' : attribute_plan
			},
			url: ajax_url,
			type:"post"
		  }).done(function(response){

			jQuery.ajax({
                data: {'action' : 'mw_number_items'},
                url: base_url +  '/wp-admin/admin-ajax.php'
              }).done(function(response){
				jQuery('.buy_now').removeClass("a_disable");
				
				var total = response;

				jQuery('.cart-items-number').hide().html(total).fadeIn();
				

			// 	if(!alertify.topup){
            //       //define a new dialog
            //       alertify.dialog('topup',function factory(){
            //         return{
            //           main:function(message){
            //             this.message = message;
            //             this.setHeader('');
            //           },
            //           setup:function(){
            //               return { 
            //                 // buttons:[{text: "cool!", key:27/*Esc*/}],
            //                 // focus: { element:0 }
            //               };
            //           },
            //           prepare:function(){
            //             this.setContent(this.message);
            //           },
            //           build:function(){
            //             this.elements.root.classList.add("topups");
            //           }
            //       }}); 
            //     }
            //   alertify.topup("<div class='alertify-basket'><div class='blue'>Never miss a customer!</div><div class='normal'>Select Auto Top-Up to automatically boost the number of credits tracked by an additional <strong>25%</strong> whenever purchased limit is reached.</div><div class='normal'>Now you’ll never miss a moment of analytics!</div><div class='button-basket'><a href='' class='light'>Yes please, add<br>Auto Top-Up</a><a href='javascript:showConfirm();' class='dark'>No Thanks</a></div></div>");
              if(!alertify.check_or){
                //define a new dialog
                alertify.dialog('check_or',function factory(){
                  return{
                    main:function(message){
                      this.message = message;
                      this.setHeader('');
                    },
                    setup:function(){
                        return { 
                          // buttons:[{text: "cool!", key:27/*Esc*/}],
                          // focus: { element:0 }
                        };
                    },
                    prepare:function(){
                      this.setContent(this.message);
                    },
                    build:function(){
                      this.elements.root.classList.add("check_or_continue");
                    }
                }}); 
              }
            
              
            // window.showConfirm = function(){
            //   alertify.topup().close();
              alertify.check_or("<div class='alertify-basket'><div class='blue'>Item added to your basket!</div><div class='normal'>You have <strong>"+total+"</strong> item in your basket.</div><div class='button-basket'><a href='"+base_url_new+"/pricing' class='dark'>Continue Shopping</a><a href='"+base_url_new+"/checkout' class='light'>Checkout</a></div></div>");
            // }
				
			
			  
		  })
	})
});

	jQuery(".overlay").click(function(){

		if(jQuery(this).hasClass("current-used")){
			return false;
		}
		console.log("ddfdsfdsfdsfdsf");
		var ajax_url;
		if(current_user_id == 0 || sub_id == ''){
			ajax_url = base_url + "/product/subscriptions";
		}else{
			ajax_url = url + '&auto-switch=true';
		}
		console.log(ajax_url);
		var variation_id = jQuery(this).data('variation-id');
		var product_id = jQuery(this).data('product-id');
		var attribute_plan = jQuery(this).data('attribute-plan');

		if(variation_id == "0"){
			return false;
		}

		jQuery(this).children('.plan-title').html("Added to cart");
		jQuery.ajax({
          data: {
			  'action' : 'mw_subcribe_add_to_card',
			  'variation_id' : variation_id, 
			  'product_id' : product_id, 
			  'add-to-cart' : product_id,
			  'quantity' : 1,
			'attribute_plan' : attribute_plan},
		  url: ajax_url,
		  type:"post"
        }).done(function(response){
			if(current_user_id != 0){
				window.location = base_url + "/checkout/";
			}else{
				window.location = base_url + "/cart/";
			}
        });
	})
})

// $(document).on('click','.overlay',function(e){

 
// })
jQuery('a#cancel').click(function(e){
  console.log('thisone');
  e.preventDefault();
		if(!alertify.topup){
			//define a new dialog
			alertify.dialog('topup',function factory(){
			return{
				main:function(message){
				this.message = message;
				this.setHeader('<h3>CANCELLATION</h3>');
				},
				setup:function(){
					return { 
					// buttons:[{text: "cool!", key:27/*Esc*/}],
					// focus: { element:0 }
					};
				},
				prepare:function(){
				this.setContent(this.message);
				},
				build:function(){
				this.elements.root.classList.add("topups");
				}
			}}); 
		}
		if(!alertify.cancel){
			//define a new dialog
			alertify.dialog('cancel',function factory(){
				return{
				main:function(message){
					this.message = message;
					this.setHeader('<h3>COME BACK SOON!</h3>');
				},
				setup:function(){
					return { 
						// buttons:[{text: "cool!", key:27/*Esc*/}],
						// focus: { element:0 }
					};
				},
				prepare:function(){
					this.setContent(this.message);
				},
				build:function(){
					this.elements.root.classList.add("topups");
				}
			}}); 
			}
		 alertify.topup("<div class='alertify-basket'><div class='black'>Are you sure you want to cancel your current plan ?</div><div class='normal'>All opens will expire at the end of your current billing period</div><div class='button-basket'><a href='javascript:showCancel();' class='light'>Cancel Plan</a><a href='' class='light'>I've changed my mind,<br>Don't change anything</a></div></div>");
		 window.showCancel = function(){
			  alertify.topup().close();

					jQuery.ajax({
				data: {
					'action' : 'mw_cancel_subscription',
					'sub_id' : sub_id},
				url: base_url +  '/wp-admin/admin-ajax.php',
				type:"post"
				}).done(function(response){
					alertify.cancel("<div class='alertify-basket'><div class='normal'>Your plan will be cancelled from the end of the current billing period.</div><div class='normal'>Your account will be maintained, should you wish to buy tools under our commitment-free Casual Checkout or subscribe to a new plan in the future.</div><div class='normal'>If you wish to terminate your account completely, <a>click here</a>.</div></div>");

				});
            }
});
jQuery('a#terminate').click(function(e){
  console.log('thisone');
  e.preventDefault();
		if(!alertify.topup){
			//define a new dialog
			alertify.dialog('topup',function factory(){
			return{
				main:function(message){
				this.message = message;
				this.setHeader('<h3>CLOSING YOUR ACCOUNT</h3>');
				},
				setup:function(){
					return { 
					// buttons:[{text: "cool!", key:27/*Esc*/}],
					// focus: { element:0 }
					};
				},
				prepare:function(){
				this.setContent(this.message);
				},
				build:function(){
				this.elements.root.classList.add("topups");
				}
			}}); 
		}
		if(!alertify.close){
			//define a new dialog
			alertify.dialog('close',function factory(){
				return{
				main:function(message){
					this.message = message;
					this.setHeader("<h3>WE'RE SORRY TO SEE YOU GO!</h3><p>Your account has been deleted.</p>");
				},
				setup:function(){
					return { 
						// buttons:[{text: "cool!", key:27/*Esc*/}],
						// focus: { element:0 }
					};
				},
				prepare:function(){
					this.setContent(this.message);
				},
				build:function(){
					this.elements.root.classList.add("topups");
				}
			}}); 
			}
         alertify.topup("<div class='alertify-basket'><div class='black'>Are you sure you want to close your account ?</div><div class='normal'>All opens and stored assets will be deleted immidiately.</div><div class='button-basket'><a href='javascript:showClose();' class='light'>Close Account</a><a href='' class='light'>I've changedmy mind,<br>keep my account</a></div></div>");
		 window.showClose = function(){
              alertify.topup().close();
              alertify.close("");
            }
		});
</script>