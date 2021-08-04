<?php
/**
 * Template Name: Edit Details Template
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
<?php 

// if(!is_user_logged_in()){
// 	auth_redirect();
// }

while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <div class="fluid-container back-kv">
  	<div class="container">
  	<div class="heading-kv">
  	<?php /*?><h1><span class="white-bar">THE EDGE </span> FOR <?php echo get_field('the_edge_for');?></h1><?php */?>
  	<h1 class="lato"><?php echo get_the_title();?></h1>
  	</div>
  	<!-- <div class="cta-kv">
  		<span><?php echo get_field('subtitle');?></span>
  	</div> -->
  	</div>
  </div>

  <?php 

	$user = wp_get_current_user();
	
	$user_id = $user->ID;
	// var_dump($user);
	// var_dump(get_user_meta($user->ID));

	$user_metadata = get_user_meta($user->ID);


	// echo var_dump(wp_check_password( 'sdfdsf', $user->user_pass, $user_id ));
 ?>
  <div class='fluid-container'>
	<div class="container container-pad-50">
		<div class='box-details user_info_box'>
				<div class="row margin-bottom header-details">PERSONAL DETAILS</div>
				<div class="row margin-bottom">
					<div class='col-xl-2'>First Name:</div>
					<div class='col-xl-10'><input type='text' class='form-control bgcolor-edit' id='first_name' value='<?php echo $user->first_name?>'/></div>
				</div>
				<div class="row margin-bottom">
					<div class='col-xl-2'>Last Name:</div>
					<div class='col-xl-10'><input type='text' class='form-control bgcolor-edit' id='last_name' value='<?php echo $user->last_name?>'/></div>
				</div>
				<div class="row margin-bottom">
					<div class='col-xl-2'>Company:</div>
					<div class='col-xl-10'><input type='text' class='form-control bgcolor-edit' id='company' value='<?php echo get_user_meta( $user_id, 'billing_company', true );?>'/></div>
				</div>
				<div class="row margin-bottom">
					<div class='col-xl-2'>Email:</div>
					<div class='col-xl-10'><input type='text' class='form-control bgcolor-edit' id='email' value='<?php echo $user->user_email?>' disabled/></div>
				</div>
				<div class="row margin-bottom">
				<div class='col-xl-10'></div>
					<div class='col-xl-2'><input type="button" class="add-new-button float-right" data-value='user_info' value="Save Changes"></div>
				</div>
		</div>


		<div class='box-details'>
				<div class="row margin-bottom header-details">PASSWORD DETAILS</div>
				<div class="row margin-bottom">
					<div class='col-xl-2'>Current Password:</div>
					<div class='col-xl-10'><input type='password' id='current_password' class='form-control bgcolor-edit'/></div>
				</div>
				<div class="row margin-bottom">
					<div class='col-xl-2'>New Password:</div>
					<div class='col-xl-10'><input type='password' id='new_password' class='form-control bgcolor-edit'/></div>
				</div>
				<div class="row margin-bottom">
					<div class='col-xl-2'>Re-type New Password:</div>
					<div class='col-xl-10'><input type='password' id='retype_new_password' class='form-control bgcolor-edit'/></div>
				</div>
				<div class="row margin-bottom">
				<div class='col-xl-10'></div>
					<div class='col-xl-2'><input type="button" class="add-new-button float-right" data-value='password' value="Save Changes"></div>
				</div>
		</div>

		<div class='box-details'>
				<div class="row margin-bottom header-details">ADDRESS DETAILS</div>
				<div class="row margin-bottom">
					<div class='col-xl-2'>Billing Address:</div>
					<div class='col-xl-10'><input type='text' class='form-control bgcolor-edit' id='billing_address' value='<?php echo get_user_meta( $user_id, 'billing_address_1', true );echo get_user_meta( $user_id, 'billing_address_2', true );?>'/></div>
				</div>
				<div class="row margin-bottom">
					<div class='col-xl-2'>City/Town:</div>
					<div class='col-xl-10'><input type='text' class='form-control bgcolor-edit' id='billing_city' value='<?php echo get_user_meta( $user_id, 'billing_city', true );?>'/></div>
				</div>
				<div class="row margin-bottom">
					<div class='col-xl-2'>State:</div>
					<div class='col-xl-10'><select class='form-control' id='billing_state'>
					<option value='VIC'>VIC</option>
					<option value='NSW'>NSW</option>
					<option value='QLD'>QLD</option>
					<option value='SA'>SA</option>
					<option value='TAS'>TAS</option>
					<option value='WA'>WA</option>		
				</select></div>
				</div>
				<div class="row margin-bottom">
					<div class='col-xl-2'>Postcode:</div>
					<div class='col-xl-10'><input type='text' class='form-control bgcolor-edit' id='billing_postcode' value='<?php echo get_user_meta( $user_id, 'billing_postcode', true );?>'/></div>
				</div>
				<div class="row margin-bottom">
					<div class='col-xl-2'>Country:</div>
					<div class='col-xl-10'>
						
					<!-- <input type='text' class='form-control bgcolor-edit' id='billing_country' value='<?php echo get_user_meta( $user_id, 'billing_country', true );?>'/> -->
					<select class="form-control woocommerce-Input woocommerce-Input--text country-select" name="country" id="billing_country">
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
				</div>
				</div>
				<div class="row margin-bottom">
				<div class='col-xl-10'></div>
					<div class='col-xl-2'><input type="button" class="add-new-button float-right" data-value='address' value="Save Changes"></div>
				</div>
		</div>
	</div>
</div>



	

  
  
  
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>


<script>
		var baseurl = '<?php echo get_home_url();?>';
		var ajaxurl = baseurl + '/wp-admin/admin-ajax.php';

		var logout_url = '<?php echo wc_logout_url();?>'; 

		var user_id = '<?php echo $user_id;?>';

		var country = '<?php echo get_user_meta( $user_id, 'billing_country', true );?>';
		jQuery(document).ready(function(){

			jQuery('#billing_country').val(country);
				
			jQuery('.add-new-button').click(function(){
				var save_change = jQuery(this);
				console.log(save_change.data('value'));
				var value = save_change.data('value');
				
				if(value == 'user_info'){

					var first_name = jQuery('#first_name').val();
					var last_name = jQuery('#last_name').val();

					var company = jQuery('#company').val();
					var email = jQuery('#email').val();

					if(first_name == ''){
						jQuery('#first_name').addClass('wrong');
						return false;
					}else{
						jQuery('#first_name').removeClass('wrong');	
					}
					if(last_name == ''){
						jQuery('#last_name').addClass('wrong');
						return false;
					}else{
						jQuery('#last_name').removeClass('wrong');	
					}
					if(company == ''){
						jQuery('#company').addClass('wrong');
						return false;
					}else{
						jQuery('#company').removeClass('wrong');	
					}
					

					jQuery.ajax({
							data: {'action' : 'mw_update_user_info',
									'user_id' : user_id,
									'first_name' : first_name, 
									'last_name' : last_name, 
									'company' : company,
									'email': email,
									'update' : 0},
							url: ajaxurl,
							type:'post'
					}).done(function(response){

							showDialog();
            
						
				
					})

					

				}else if(value == 'password'){

					var current_password = jQuery('#current_password').val();
					var new_password = jQuery('#new_password').val();
					var retype_new_password = jQuery('#retype_new_password').val();

					if(current_password.trim() == ''){
						jQuery('#current_password').addClass('wrong');
						return false;
					}else{
						jQuery('#current_password').removeClass('wrong');
					}

					if(new_password.trim() != retype_new_password.trim() || new_password.trim() == current_password.trim() || new_password.trim() == ''){
						jQuery('#new_password').addClass('wrong');
						jQuery('#retype_new_password').addClass('wrong');
						return false;
					}else{
						jQuery('#new_password').removeClass('wrong');
						jQuery('#retype_new_password').removeClass('wrong');
					}



					jQuery.ajax({
							data: {'action' : 'mw_update_user_info',
									'user_id' : user_id,
									'current_password' : current_password,
									'new_password' : new_password,
									'update' : 1},
							url: ajaxurl,
							type:'post'
					}).done(function(response){
						if(response == 0){
							jQuery('#current_password').addClass('wrong');
						}else{
							jQuery('#current_password').removeClass('wrong');
							showDialog();
						}
				
					})

				}else if(value == 'address'){
					var billing_address = jQuery('#billing_address').val();
					var billing_city = jQuery('#billing_city').val();
					var billing_state = jQuery('#billing_state').val();
					var billing_postcode = jQuery('#billing_postcode').val();
					var billing_country = jQuery('#billing_country').val();

					if(billing_address == ''){
						jQuery('#billing_address').addClass('wrong');
						return false;
					}else{
						jQuery('#billing_address').removeClass('wrong');	
					}
					if(billing_city == ''){
						jQuery('#billing_city').addClass('wrong');
						return false;
					}else{
						jQuery('#billing_city').removeClass('wrong');	
					}
					if(billing_postcode == ''){
						jQuery('#billing_postcode').addClass('wrong');
						return false;
					}else{
						jQuery('#billing_postcode').removeClass('wrong');	
					}
					if(billing_country == ''){
						jQuery('#billing_country').addClass('wrong');
						return false;
					}else{
						jQuery('#billing_country').removeClass('wrong');	
					}

					jQuery.ajax({
							data: {'action' : 'mw_update_user_info',
									'user_id' : user_id,
									'billing_address' : billing_address,
									'billing_city' : billing_city,
									'billing_state' : billing_state,
									'billing_postcode' : billing_postcode,
									'billing_country' : billing_country,
									'update' : 2},
							url: ajaxurl,
							type:'post'
					}).done(function(response){
						showDialog();
					})

				}

				
			
			})
			
		})

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
						  alertify.thank("Update user info successfully");
		}
	
</script>
