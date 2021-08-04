<div class="container">
<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

?>


<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
<div class="row">
		<div class="col-md-6 col-6 ">
						
				<div class="campaign-summary margin-top margin-bot"><h3 id="order_review_heading"><?php _e( 'Order Summary', 'woocommerce' ); ?></h3></div>

				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

				<div id="order_review" class="woocommerce-checkout-review-order">
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>

				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

		</div>

	

	

		<div class="col-md-6 col-6 ">

				<!-- <div class="campaign-summary margin-top margin-bot"><h3><?php _e( 'Billing Information', 'woocommerce' ); ?></h3></div>

				<div class="billing-info" > 
				<?php $user = wp_get_current_user();
				
				$user_id = $user->ID;?>	
					<div>
						<span>Name:</span>
						<span> <?php echo $user->first_name?> <?php echo $user->last_name?></span>
					</div>
					<div>
						<span>Company:</span>
						<span> <?php echo get_user_meta( $user_id, 'billing_company', true );?></span>
					</div>
					<div>
						<span>Billing Address:</span>
						<span> <?php echo get_user_meta( $user_id, 'billing_address_1', true );echo get_user_meta( $user_id, 'billing_address_2', true );?>, 
						<?php echo get_user_meta( $user_id, 'billing_state', true );?> <?php echo get_user_meta( $user_id, 'billing_postcode', true );?>,
						<?php
							global $woocommerce;
							$countries_obj   = new WC_Countries();
							$countries   = $countries_obj->__get('countries');
						
							// var_dump($countries);
							foreach ($countries as $key => $value) {
								if($key == 'AU'){
									echo $value;
								}
							}
							
							?>

						
					</span>
					</div>
					<div>
						<span>Payment Method:</span>
					</div>
					<div class="button-box">
						<a class="edit-billing-info" href="<?php echo get_home_url()?>/edit-details-user">Edit</a>  
					</div>
				</div> -->

		<?php if ( $checkout->get_checkout_fields() ) : ?>

			<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

			<div class="" id="customer_details">

					
									
							<div class="campaign-summary margin-top"><h3><?php _e( 'Billing Information', 'woocommerce' ); ?></h3></div>

							<div class="">
							<?php do_action( 'woocommerce_checkout_billing' ); ?>
						</div>
					
			

			<!-- <div class="col-md-5">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div> -->
			</div>

				<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

		<?php endif; ?>
	</div>

</div>
	
</form>

</div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
