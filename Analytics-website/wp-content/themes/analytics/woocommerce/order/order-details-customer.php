<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>


<!-- <div class="col-md-12 col-12 campaign-summary margin-top"><h3><?php _e( 'Customer details', 'woocommerce' ); ?></h3></div>

<section class="woocommerce-customer-details">

	<table class="woocommerce-table woocommerce-table--customer-details shop_table customer_details">

		<?php if ( $order->get_customer_note() ) : ?>
			<tr>
				<th><?php _e( 'Note:', 'woocommerce' ); ?></th>
				<td><?php echo wptexturize( $order->get_customer_note() ); ?></td>
			</tr>
		<?php endif; ?>

		

		<?php if ( $order->get_billing_first_name() ) : ?>
			<tr>
				<th><?php _e( 'First Name:', 'woocommerce' ); ?></th>
				<td><?php echo esc_html( $order->get_billing_first_name() ); ?></td>
			</tr>
		<?php endif; ?>

		<?php if ( $order->get_billing_last_name() ) : ?>
			<tr>
				<th><?php _e( 'Last Name:', 'woocommerce' ); ?></th>
				<td><?php echo esc_html( $order->get_billing_last_name() ); ?></td>
			</tr>
		<?php endif; ?>

		<?php if ( $order->get_billing_email() ) : ?>
			<tr>
				<th><?php _e( 'Email:', 'woocommerce' ); ?></th>
				<td><?php echo esc_html( $order->get_billing_email() ); ?></td>
			</tr>
		<?php endif; ?>

		<?php if ( $order->get_billing_phone() ) : ?>
			<tr>
				<th><?php _e( 'Phone:', 'woocommerce' ); ?></th>
				<td><?php echo esc_html( $order->get_billing_phone() ); ?></td>
			</tr>
		<?php endif; ?>
		<?php if ( $order->get_billing_address_1() ) : ?>
			<tr>
				<th><?php _e( 'Address:', 'woocommerce' ); ?></th>
				<td><?php echo esc_html( $order->get_billing_address_1() );?></td>
			</tr>
			<?php endif; ?>

			<?php if ( $order->get_billing_city() ) : ?>
			<tr>
				<th><?php _e( 'City:', 'woocommerce' ); ?></th>
				<td><?php echo esc_html( $order->get_billing_city() );?></td>
			</tr>
			<?php endif; ?>

			<?php if ( $order->get_billing_state() ) : ?>
			<tr>
				<th><?php _e( 'State:', 'woocommerce' ); ?></th>
				<td><?php echo esc_html( $order->get_billing_state() );?></td>
			</tr>
			<?php endif; ?>

			<?php if ( $order->get_billing_postcode() ) : ?>
			<tr>
				<th><?php _e( 'Postcode:', 'woocommerce' ); ?></th>
				<td><?php echo esc_html( $order->get_billing_postcode() );?></td>
			</tr>
			<?php endif; ?>

			<?php if ( $order->get_billing_country() ) : ?>
			<tr>
				<th><?php _e( 'Country:', 'woocommerce' ); ?></th>
				<td><?php echo esc_html( $order->get_billing_country() );?></td>
			</tr>
			<?php endif; ?>
			
		<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>

	</table>

	<div class="row campaign-summary margin-top">

<div class="col-md-12 col-12">			<h3 class="woocommerce-column__title"><?php _e( 'Billing address', 'woocommerce' ); ?></h3>
</div>
</div>

	<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>

	

	<section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">

		<div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">

			<?php endif; ?>

			<h3 class="woocommerce-column__title"><?php _e( 'Billing address', 'woocommerce' ); ?></h3>

			<address>
				<?php echo ( $address = $order->get_formatted_billing_address() ) ? $address : __( 'N/A', 'woocommerce' ); ?>
			</address>

			<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>

		</div>

		<div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">

			<h3 class="woocommerce-column__title"><?php _e( 'Shipping address', 'woocommerce' ); ?></h3>

			<address>
				<?php echo ( $address = $order->get_formatted_shipping_address() ) ? $address : __( 'N/A', 'woocommerce' ); ?>
			</address>

		</div>

	</section>

	<?php endif; ?>

</section> -->
