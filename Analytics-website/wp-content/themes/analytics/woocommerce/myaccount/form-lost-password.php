<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
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
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div id="woo" class="woo-extend auto center">
	<p class="intro"><?php echo apply_filters( 'woocommerce_lost_password_message', __( 'Please fill in your email address and we will email you a link to reset your password', 'woocommerce' ) ); ?></p>
	<form method="post" class="woocommerce-ResetPassword lost_reset_password">

	<?php wc_print_notices(); ?>

	<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first woo-input">
		<!-- <label for="user_login"><?php _e( 'Username or email', 'woocommerce' ); ?></label> -->
		<input class="form-control woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" placeholder="Enter Email Address"/>
	</p>

	<div class="clear"></div>

	<?php do_action( 'woocommerce_lostpassword_form' ); ?>

	<p class="woocommerce-form-row form-row">
		<input type="hidden" name="wc_reset_password" value="true" />
		<input type="submit" class="login-button woocommerce-Button button" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>" />
	</p>

	<?php wp_nonce_field( 'lost_password' ); ?>

	</form>
</div>