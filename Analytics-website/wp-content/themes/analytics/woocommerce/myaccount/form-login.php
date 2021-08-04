<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<?php wc_print_notices(); ?>
<div class="container" id="customer_login">
	<div class="row">


<?php do_action( 'woocommerce_before_customer_login_form' ); ?>



	<div class="col-lg-6 col-12 ">
	
		<div class="login-box bg-color">


		<h2 class="login-title">
			<?php _e( 'Login', 'woocommerce' ); ?>
		</h2>

		<form class="woocomerce-form woocommerce-form-login login none-border" method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>
		
				<p class="row woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide login-row">
					<label for="username" class='col-4'>
						<?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span>
					</label>
					<input type="text" class="col-8 form-control woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>"/>
				</p>
				
				
				
				
				
			<p class="row woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide login-row">
				<label for="password" class='col-4'>
					<?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span>
				</label>
				<input class="col-8 form-control  woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password"/>
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>
			<p class="woocommerce-LostPassword lost_password" style="text-align:center">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>">
					<?php _e( 'I forgot my Username/Password ', 'woocommerce' ); ?>
				</a>
			</p>
			<p class="form-row" style="text-align:center">
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<input type="submit" class="login-button woocommerce-Button button margin-auto" name="login" value="<?php esc_attr_e( 'Log In', 'woocommerce' ); ?>"/>

			</p>
			<!-- <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php _e( 'Remember me', 'woocommerce' ); ?></span>
				</label> -->


			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>
		</div>
	</div>
	<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>



	<div class="col-lg-6 col-12 ">
		<div class="login-box bg-color">
		<h2 class="login-title">
			<?php _e( 'SIGN UP', 'woocommerce' ); ?>
		</h2>

		<form method="post" class="register none-border">

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

			<p class="row woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide ">
				<label for="reg_username" class='col-4'>
					<?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span>
				</label>
				<input type="text" class="col-8 form-control woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>"/>
			</p>

			<?php endif; ?>
			<p class="row woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide login-row">
				<label for="reg_email" class='col-4'>
					 <?php _e( 'Email address', 'woocommerce' ); ?><span class="required">*</span>
				</label>
				<input type="email" class="col-8 form-control woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( $_POST['email'] ) : ''; ?>"/>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

			<p class="row woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide login-row">
				<label for="reg_password" class='col-4'>
					 <?php _e( 'Password', 'woocommerce' ); ?><span class="required">*</span>
				</label>
				<input type="password" class="col-8 form-control woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password"/>
			</p>

			<p class="row woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide login-row">
				<label for="reg_password_2" class='col-4'>
					 <?php _e( 'Confirm Password', 'woocommerce' ); ?><span class="required">*</span>
				</label>
				<input type="password" class="col-8 form-control woocommerce-Input woocommerce-Input--text input-text" name="password_2" id="reg_password_2"/>
			</p>

			<!-- <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide login-row">
				<label for="country">
					 <?php _e( 'Country', 'woocommerce' ); ?><span class="required">*</span>
				</label>
				<input type="text" class="form-control woocommerce-Input woocommerce-Input--text input-text" name="country" id="country"/>
			</p> -->
			<p class="row woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide login-row">
						<label for="country" class='col-4'>
								<?php _e( 'Country', 'woocommerce' ); ?><span class="required">*</span>
							</label>
				<select class="col-8 form-control woocommerce-Input woocommerce-Input--text country-select" name="country" id="country">
					<?php
					global $woocommerce;
					$countries_obj   = new WC_Countries();
					$countries   = $countries_obj->__get('countries');
				
					// var_dump($countries);
					foreach ($countries as $key => $value) {
						echo "<option value='".$key."'>".$value."</option>";
					}
					
					?>
				</select>
			</p>
			<?php endif; ?>

			<!-- Spam Trap -->
			<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;">
				<label for="trap">
					<?php _e( 'Anti-spam', 'woocommerce' ); ?>
				</label><input type="text" name="email_2" id="trap" tabindex="-1" autocomplete="off"/>
			</div>

			<?php do_action( 'woocommerce_register_form' ); ?>

				<div class="checkbox">

					<div class="squaredThree">
							<input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox" name="receive"  id="receive" value="forever" checked> 
							<label for="receive" ></label> 
							<span><?php _e( 'Yes, I want to receive newsletters & special offers', 'woocommerce' ); ?></span>
<!--						</label>-->
					</div>

					<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
					<div class="submit"><input type="submit" class="login-button woocommerce-Button button" name="register" value="Submit"/></div>
				</div>
			
			</form>
			</div>
		
			<?php do_action( 'woocommerce_register_form_end' ); ?>

		
	</div>
	</div>


	<?php endif; ?>
</div>
</div>
<?php do_action( 'woocommerce_after_customer_login_form' ); ?>