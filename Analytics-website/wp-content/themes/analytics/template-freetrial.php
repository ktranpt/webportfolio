<?php
/**
 * Template Name: Free Trial Template
 */
?>
<style>
	.back-kv{
		background-image: url('<?php echo get_field('background_kv');?>');
		background-repeat: no-repeat;
		background-size: cover;
		min-height: 332px;
		background-position: center center;
	}
</style>
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <div class="fluid-container back-kv">
  	<div class="container">
  	<div class="heading-kv">
  	<?php /*?><h1><span class="white-bar">THE EDGE </span> FOR <?php echo get_field('the_edge_for');?></h1><?php */?>
  	<h1 class="lato"><?php echo get_the_title();?></h1>
  	</div>
  	<div class="cta-kv">
		  <span style='    border: none;'><?php echo get_field('title');?></span>
  		<span><?php echo get_field('subtitle');?></span>
  	</div>
  	</div>
  </div>
  <?php wc_print_notices(); ?>
<div class="container" id="customer_login">
	<div class="row alcent">
	<div class="marg-top"><?php echo get_field('title_sign_up');?></div>
	<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>



	<div class="col-md-6 col-12 ">
		<div class="login-box bg-color">
		<h2 class="login-title">
			<?php _e( 'SIGN UP', 'woocommerce' ); ?>
		</h2>

		<form method="post" class="register none-border">

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide ">
				<label for="reg_username">
					<?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span>
				</label>
				<input type="text" class="form-control woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>"/>
			</p>

			<?php endif; ?>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide login-row">
<!--
				<label for="reg_email">
					 <span class="required">*</span>
				</label>
-->
				<input placeholder="<?php _e( 'Email address', 'woocommerce' ); ?>" type="email" class="form-control woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( $_POST['email'] ) : ''; ?>"/>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide login-row">
<!--
				<label for="reg_password">
					 <span class="required">*</span>
				</label>
-->
				<input placeholder="<?php _e( 'Password', 'woocommerce' ); ?>" type="password" class="form-control woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password"/>
			</p>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide login-row">
<!--
				<label for="reg_password_2">
					 <span class="required">*</span>
				</label>
-->
				<input placeholder="<?php _e( 'Confirm Password', 'woocommerce' ); ?>" type="password" class="form-control woocommerce-Input woocommerce-Input--text input-text" name="password_2" id="reg_password_2"/>
			</p>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide login-row">
<!--
				<label for="country">
					 <span class="required">*</span>
				</label>
-->
				<input placeholder="<?php _e( 'Country', 'woocommerce' ); ?>" type="text" class="form-control woocommerce-Input woocommerce-Input--text input-text" name="country" id="country"/>
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
<!-- <div class="subscribe">
<div class="container">
	<div class="row">
	 	<div class="col-md-8 auto">
	 		<div><h3 class="gotham">SIGN UP TO OUR NEWSLETTER FOR TIPS &amp; SPECIAL OFFERS</h3></div>
	 		<div class="row">
	 		<div class="col-md-9"><input placeholder="Enter your email address here."></div>
	 		<div class="col-md-3 no-lm"><button>Submit</button></div>
	 		
	 		</div>
	 	</div>
	</div>
</div> -->
	
</div>
  
  
  
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
