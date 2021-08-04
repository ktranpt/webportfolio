<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<!-- <thead>
			<tr>
				<th class="product-remove">&nbsp;</th>
				<th class="product-thumbnail">&nbsp;</th>
				<th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
				<th class="product-price"><?php _e( 'Price', 'woocommerce' ); ?></th>
				<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
				<th class="product-subtotal"><?php _e( 'Total', 'woocommerce' ); ?></th>
			</tr>
		</thead> -->
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php $total = 0;

			// var_dump( WC()->cart->get_cart());
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
				$pro_variation = new WC_Product_Variation($_product->get_id());
				
				// echo $cart_item['product_id'];
				$addons = $cart_item['addons'];
				$auto_topup = 0;

				// var_dump($addons[4]);
				if(count($addons) >= 4 &&  $addons[count($addons) -1]['name']  == "Add Auto Top-Up"){
					$auto_topup = 1;
					
				}
				// var_dump($addons);
				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

						<td class="product-remove" width="5%">
							<!-- <a class="remove remove-cart" data-product-id="<?php echo $product_id;?>" data-cart-item-key="<?php echo $cart_item_key;?>"><i class="fa fa-times" aria-hidden="true"></i></a> -->
							<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove remove-cart" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fa fa-times" aria-hidden="true"></i></i></a>',
									esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
									__( 'Remove this item', 'woocommerce' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
							?>
						</td>
						<td width="5%">
							<?php if((int)$cart_item['product_id'] == 55){ ?>

								<?php echo '<a class="remove edit" data-auto-topup="'.$auto_topup.'" data-campaign="'.$addons[0]['value'].'" data-industry="'.$addons[1]['value'].'" data-ad="'.$addons[2]['value'].'" data-link-group="'.$addons[3]['value'].'" data-clicks="'.$pro_variation->click.'" data-item-id='.$cart_item_key.' data-product-id='.$cart_item['product_id'].' data-variation-id='.$pro_variation->get_id().'><i class="fa fa-wrench" aria-hidden="true"></i></a>';?>
							<?php }else if((int)$cart_item['product_id'] == 308){

										echo '<a class="remove edit" data-auto-topup="'.$auto_topup.'" data-campaign="'.$addons[0]['value'].'" data-link-name="'.$addons[1]['value'].'" data-link-address="'.$addons[2]['value'].'" data-industry="'.$addons[3]['value'].'" data-ad="'.$addons[4]['value'].'" data-clicks='.$pro_variation->click.' data-item-id='.$cart_item_key.' data-product-id='.$cart_item['product_id'].' data-variation-id='.$pro_variation->get_id().'><i class="fa fa-wrench" aria-hidden="true"></i></a>';
							}else{
								echo '<a class="remove edit noclick"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>';	
							}?>
						
						</td>

						<td width="10%">

						
						

							<?php if((int)$cart_item['product_id'] == 55){ ?>

							
								<?php if( get_field('email_icon') ): ?>

									<img src="<?php the_field('email_icon'); ?>" />

								<?php endif; ?>




							<?php }else if((int)$cart_item['product_id'] == 308){ ?>

								<?php if( get_field('link_icon') ): ?>

									<img src="<?php the_field('link_icon'); ?>" />

								<?php endif; ?>
							
							<?php }else  {?>

								<!-- $pro_variation = new WC_Product_Variation('496');

								var_dump($handle->get_parent_data()["title"]);   -->

								
							<?php
							//  echo $pro_variation->name;
							// echo strtoupper($_product->get_title());
							 } 
							
							
							?>

						</td>

						<!-- <td class="product-thumbnail">
							<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

								if ( ! $product_permalink ) {
									echo $thumbnail;
								} else {
									printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
								}
							?>
						</td> -->

						<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">

						<?php if((int)$cart_item['product_id'] == 464) {

								$pro_variation = new WC_Product_Variation($_product->get_id());
								
								// echo $pro_variation->get_parent_data()["title"]; 
								echo strtoupper($pro_variation->get_name());
								
						}
						
							
							if((int)$cart_item['product_id'] != 55 && (int)$cart_item['product_id'] != 308 && (int)$cart_item['product_id'] != 464){
								echo strtoupper($_product->get_title());
							}
							
							
							
							
							
							


								// if ( ! $product_permalink ) {
								// 	echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
								// } else {
								// 	echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
								// }

								// Meta data
								echo WC()->cart->get_item_data( $cart_item );

								// Backorder notification
								if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
									echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
								}
							?>
						</td>
						
						<td>
						<?php
						 ?>
							
							
							<!-- <td>topup yea</td> -->
							<?php 
									
									// echo strtoupper(explode("-",$_product->get_name())[1]);

									if((int)$cart_item['product_id'] == 464) {
										
											$pro_variation = new WC_Product_Variation($_product->get_id());
											
											// echo $pro_variation->get_parent_data()["title"]; 
											echo strtoupper($pro_variation->click);

											$total += $pro_variation->description;
											
									}else{
										$the_click = $pro_variation->click; 
										echo $the_click.' CREDITS'; 
										// echo $_product->get_click();
	
										$total += (int)explode(" ",$the_click)[0];
									}
									
									
							?> 
							
							
							
							
							
							<?php 
						 ?>
						</td>

						<?php if((int)$cart_item['product_id'] == 464) { ?>

							<td class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							?>
						</td>
						<?php } ?>

						

						<!-- <td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
							<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input( array(
										'input_name'  => "cart[{$cart_item_key}][qty]",
										'input_value' => $cart_item['quantity'],
										'max_value'   => $_product->get_max_purchase_quantity(),
										'min_value'   => '0',
									), $_product, false );
								}

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
							?>
						</td> -->

						<!-- <td class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
							?>
						</td> -->
					</tr>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<!-- <tr>
				<td colspan="6" class="actions">

					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="coupon">
							<label for="coupon_code"><?php _e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" />
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</div>
					<?php } ?>

					<input type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>" />

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart' ); ?>
				</td>
			</tr> -->

			<tr>
			
					<td colspan="6" class="actions" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php _e( 'Total', 'woocommerce' ); ?> : 
					
					<?php if((int)$cart_item['product_id'] == 464) { ?>

							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							?>
						<?php } else {?>


					
					<?php echo strtoupper($total." credits"); ?>
					
						<?php } ?>
					
					</td>

					
			</tr>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</tbody>
	</table>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<div class="buy-now">
<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>

</div>

<div class="buy-now delete-all" style="display:none;float: left;">
<a href="#" class="checkout-button button alt wc-forward">
	Empty Cart</a>						
</div>

<div class="cart-collaterals">
	<?php
		/**
		 * woocommerce_cart_collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
	 	do_action( 'woocommerce_cart_collaterals' );
	?>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>

<div class="plain-text-tracker edit-container">
		<div class="container no-back">
			</div>
		<?php
				$args = array(
					'post_type' => 'product',
					'product_cat' => 'casual',
					'product_type' => 'variable-subscription',
					'posts_per_page' => 12,
					'orderby' => 'menu_order',
					'order' => 'ASC'
					);
				$loop = new WP_Query( $args );
				if ( $loop->have_posts() ) {
					while ( $loop->have_posts() ) : $loop->the_post();
					?>
			<div class="container no-pad-rl" style="display:none">
			<div class="alcent product ">
				<div>
					<img src="<?php echo get_field('img');?>">
				</div>
					<div class="description">

					<div class="title"><h3><?php the_title();?></h3></div>
					<div class="text"><p>Short summary of the product. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p></div>
				</div>
				<div>
				</div>
				</div>
				<div class="form-drop" style="display:block">
					<div class="greenback">
					</div>
					<div class="form-content">
					</div>
					<?php global $product;

				// Enqueue variation scripts
				wp_enqueue_script( 'wc-add-to-cart-variation' );

				// Get Available variations?
				$get_variations = sizeof( $product->get_children() ) <= apply_filters( 'woocommerce_ajax_variation_threshold', 30, $product );

				// Load the template
				wc_get_template( 'single-product/add-to-cart/update-cart.php', array(
					'available_variations' => $get_variations ? $product->get_available_variations() : false,
					'attributes'           => $product->get_variation_attributes(),
					'selected_attributes'  => $product->get_default_attributes(),
				) ); 
				
				?>
				</div>
				
			</div>
	<?php	endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>
</div>


<div class="container">

<!-- <input type="text" class="input-text form-control" id='campaign_name'> -->
</div>

<script>

var base_url = '<?php echo get_home_url();?>';

jQuery(document).ready(function(){
	// jQuery('.edit-container').hide();

	if(cart_count > 1){
		jQuery(".delete-all").show();
	}

	jQuery(".delete-all").click(function(){

		jQuery.ajax({
                data: {'action' : 'mw_empty_cart'},
                url: woocommerce_addons_params.ajax_url
              }).done(function(response){
				//   if(response == 0){
				// 	jQuery('.cart-items-number').fadeOut();
				//   }else{
				// 	jQuery('.cart-items-number').hide().html(response).fadeIn();
				//   }
				window.location = base_url + "/cart";
			}) 

	})

	jQuery(".remove-cart").live( "click", function() {

		setTimeout(function(){ 
			jQuery.ajax({
                data: {'action' : 'mw_number_items'},
                url: woocommerce_addons_params.ajax_url
              }).done(function(response){
				  if(response == 0){
					jQuery('.cart-items-number').fadeOut();
				  }else{
					jQuery('.cart-items-number').hide().html(response).fadeIn();

					if(response == 1){
						jQuery(".delete-all").hide();
					}
				  }
				
			}) 
		
		}, 2000);

		
			// console.log("asdsad");
			// var thisss = jQuery(this);
			// var product_id = jQuery(this).data("product-id");
			// var cart_item_key = jQuery(this).data("cart-item-key");

			// jQuery.ajax({
			// 			type: "POST",
			// 			url: base_url + '/wp-admin/admin-ajax.php',
			// 			data: {action : 'remove_item_from_cart','product_id' : product_id,'cart_item_key':cart_item_key},
			// 			success: function (res) {
			// 				thisss.parents('tr').first().remove();
			// 				jQuery('.cart-items-number').hide().html(res).fadeIn();
			// 			}
    		// });
	})

	jQuery(".edit").live( "click", function() {

		if(jQuery(this).hasClass('noclick')){
			return false;
		}
		var camp_name = jQuery(this).data('campaign');
		var product_id = jQuery(this).data('product-id');
		var clicks = jQuery(this).data('clicks');

		var industry = jQuery(this).data('industry');
		var ad = jQuery(this).data('ad');


		var item_id = jQuery(this).data('item-id');

		console.log(industry);
		console.log(ad);

		console.log(numberWithCommas(clicks));
		clicks = numberWithCommas(clicks);
		var val = clicks + " credits";

		var status = true;

		var auto_topup = parseInt(jQuery(this).data('auto-topup'));

		if(product_id == 55){
			jQuery('.container.no-pad-rl').first().show();
			jQuery('.container.no-pad-rl').last().hide();

			jQuery('input[name*="addon-55-campaign-name"]').val(camp_name);

			jQuery('.container.no-pad-rl').first().find(".button-add").children().remove();
			jQuery('.container.no-pad-rl').first().find(".button-add").append('<a id="update_email" class="update-cart-btn">Update Cart</a>');

			var form = jQuery('.container.no-pad-rl').first().find("form.variations_form.cart");

			var asd = "";
		  	var real = jQuery('input[name*=addon-55-link-group-]');

			if(auto_topup == 1){
				
				jQuery('input[name*=addon-55-add-auto-top-up]').first().attr('checked',true);
			
			}else{
				jQuery('input[name*=addon-55-add-auto-top-up]').first().attr('checked',false);
			}

		  

		  jQuery('#update_email').click(function(){

						status = true;
						if(jQuery('input[name*="addon-55-campaign-name"]').val() == ''){
							jQuery('input[name*="addon-55-campaign-name"]').addClass('wrong');
							status =  false;
						}else{
							jQuery('input[name*="addon-55-campaign-name"]').removeClass('wrong');
						}

						form.find(".input-text.input-link").each(function() {
					
								var link = jQuery(this).val();
					
								console.log("DONE ***" + link);
								if(link == "" && jQuery(this).is(':visible') == true){
									jQuery(this).addClass('wrong');
								status = false;
								}else{
									jQuery(this).removeClass('wrong');

									asd += link +', ' ;
								}
								
						
						}).promise().done(function(){
						
							real.val(asd);

							if(status == true){

								console.log("GO HERE -- " + item_id);
								
								
								jQuery.ajax({
									data: form.serialize(),
									url: form.attr('action'),
									type:"post"
								}).done(function(response){

									jQuery.ajax({
										data: {'action':'mw_update_cart_info', 'item_id':item_id},
										url: woocommerce_addons_params.ajax_url,
										type: "post"
									}).done(function(response){
										window.location = base_url + "/cart";
									})
									// window.location = base_url + "/cart";
								})

							}
						})

			})

			var link_group = jQuery(this).data('link-group');
			console.log(link_group);
			var $radios = jQuery('input:radio[name=links_more]');
			if(link_group.trim() != ''){
				
				
				if($radios.filter('[value=Yes]').is(':checked') === false){
					$radios.filter('[value=Yes]').prop('checked', true);
					$radios.filter('[value=Yes]').click();
					// jQuery('.clone').click();
				}
				jQuery('#p_scents').children().remove();
				var links = link_group.trim().split(",");
				for (var index = 0; index <= links.length - 1; index++) {
					var element = links[index].trim();
					jQuery('#p_scents').append('<div class=" product-addon items product-addon-campaign-name"><label class="addon-name">Link  </label><div class="input-area"><p class="form-row form-row-wide addon-wrap-308-campaign-name-0"></p><input type="text" class="input-text input-link id=" input-link-1"=""></div><div class="clear"></div><a style="color:black;" href="#" id="remScnt"></a></div>');
					var temp = jQuery('#p_scents').children()[index];
					jQuery(temp).find('.input-text').first().val(element);
					console.log(element);
				}

				jQuery('#p_scents').children().last().remove();
			}else{
				$radios.filter('[value=No]').prop('checked', true);
					$radios.filter('[value=No]').click();
			}


			var select = 'select > option[value="'+clicks+' credits"]';
			
			console.log(select);
			jQuery('.container.no-pad-rl').first().find('select').first().val(val);

			jQuery('select[name="addon-55-your-industry-1"] option').filter(function() {
				//may want to use $.trim in here
				// console.log(jQuery(this).text().trim());
				return jQuery(this).text().trim() == industry; 
			}).prop('selected', true);

			jQuery('select[name="addon-55-type-of-ad-2"] option').filter(function() {
				//may want to use $.trim in here
				// console.log(jQuery(this).text().trim());
				return jQuery(this).text().trim() == ad; 
			}).prop('selected', true);
			

			// jQuery('.container.no-pad-rl').first().find('select[name*="addon-55-your-industry"]').val(industry);
			// jQuery('.container.no-pad-rl').first().find('select[name*="addon-55-your-ad"]').val(ad);

		}
		if(product_id == 308){
			jQuery('.container.no-pad-rl').first().hide();
			jQuery('.container.no-pad-rl').last().show();

			jQuery('.container.no-pad-rl').last().find(".button-add").children().remove();
			jQuery('.container.no-pad-rl').last().find(".button-add").append('<a id="update_ad" class="update-cart-btn">Update Cart</a>');

			var form = jQuery('.container.no-pad-rl').last().find("form.variations_form.cart");

			

			var link_name = jQuery(this).data('link-name');
			var link_address = jQuery(this).data('link-address');

			jQuery('input[name*="addon-308-link-name"]').val(link_name);
			jQuery('input[name*="addon-308-link-address"]').val(link_address);


			jQuery('input[name*="addon-308-campaign-name"]').val(camp_name);

			if(auto_topup == 1){
				
				jQuery('input[name*=addon-308-add-auto-top-up]').first().attr('checked',true);
			
			}else{
				jQuery('input[name*=addon-308-add-auto-top-up]').first().attr('checked',false);
			}

			jQuery('#update_ad').click(function(){
				status = true;

				jQuery.ajax({
						data: form.serialize(),
						url: form.attr('action'),
						type:"post"
					}).done(function(response){

						jQuery.ajax({
							data: {'action':'mw_update_cart_info', 'item_id':item_id},
							url: woocommerce_addons_params.ajax_url,
							type: "post"
						}).done(function(response){
							// location.reload();
						})
					})

				

			})

			jQuery('.container.no-pad-rl').last().find('select').first().val(val);

			jQuery('select[name="addon-308-your-industry-3"] option').filter(function() {
				//may want to use $.trim in here
				// console.log(jQuery(this).text().trim());
				return jQuery(this).text().trim() == industry; 
			}).prop('selected', true);

			jQuery('select[name="addon-308-type-of-ad-4"] option').filter(function() {
				//may want to use $.trim in here
				// console.log(jQuery(this).text().trim());
				return jQuery(this).text().trim() == ad; 
			}).prop('selected', true);
			
		}
	})
})

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}
	
</script>
