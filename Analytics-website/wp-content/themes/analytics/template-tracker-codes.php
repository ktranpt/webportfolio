<?php
/**
 * Template Name: Tracker Codes Template
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
  	<!-- <div class="cta-kv">
  		<span><?php echo get_field('subtitle');?></span>
  	</div> -->
  	</div>
  </div>

  <div class="container ins-text">

 
		

	<div class="row" style="margin-top: 20px;margin-bottom: 10px;"><div class="col-xl-12 center-auto"><?php echo $value = get_field( "thank_you" );?></div></div>
	<div class="row" style="margin-bottom: 4px;"><div class="col-xl-12 center-auto" style="background-color:#FFFFFF"><?php echo $value = get_field( "instructions" );?></div></div>
	



	<div class="row margin" style="background-color:#FFFFFF">
			<div class="col-xl-1 tracker-icon">
			<?php 

				$email_tracker_image = get_field('email_tracker_image');
				$email_tracker_image_2 = get_field('email_tracker_image_2');

				if( !empty($email_tracker_image) ): ?>

					<img src="<?php echo $email_tracker_image; ?>" />

				<?php endif; ?>
			</div>
			<div class="col-xl-5 border-right-code"> 
				<?php echo $value = get_field( "email_tracker_steps" );?>
			</div>
			<div class="col-xl-1 tracker-icon"> <?php 

				$ad_tracker_image = get_field('ad_tracker_image');

				$ad_tracker_image_2 = get_field('ad_tracker_image_2');

				if( !empty($ad_tracker_image) ): ?>

					<img src="<?php echo $ad_tracker_image; ?>" />

				<?php endif; ?></div>
			<div class="col-xl-5">
				<?php echo $value = get_field( "ad_tracker_steps" );?>
			
			</div>
	</div>

  <div class="row campaign-summary">
				  
		  <!-- <div class="col-md-12 col-12">Email Tracker</div> -->

		  
  </div>

		<?php

				$base_api = "http://mwiseapps.com/analytics/";

				$camp_id = base64_decode(urldecode($_GET['camp_id'])) ;
		
				// $current_user = wp_get_current_user();
				// $email = $current_user->user_email;
			
				$json_url = $base_api . "api/mastercampaign/email_trackers";
				$post = ['camp_id'=> $camp_id];
				
				// $post = ['email'=> $email];
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$json_url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
				$response = curl_exec($ch);
				curl_close($ch);
			
				$object = json_decode($response);

				// var_dump($response);
			
				$camp = json_decode($object->response);

			
				$id = 1;
				foreach ($camp as $row) { foreach ($row as $row2) { ?>
					
					<div class="row email-tracker">
						<div class="col-xl-8 col-md-8 margin-auto">
							<span class="margin-right"><i class="fa fa-check" aria-hidden="true"></i></span> 
							<span><img src="<?php echo $email_tracker_image_2; ?>" style='width:3%'/></span>
							<span class="camp-name">[<?php echo $row2->Camp_Name;?>]</span> | Email Tracker
						</div>
						<div class="col-xl-2 col-md-2"><a class="get-code" data-code="<?php echo $id;?>" data-active=1>Get Code</a></div>
						<div class="col-xl-2 col-md-2"><a class="get-code" target='_blank' data-code="<?php echo $id;?>" data-active=0 href='<?php echo get_home_url()."/tracking-link?camp_id=".urlencode(base64_encode($row2->Camp_Code_Id)).""?>'>View Data</a></div>
					</div>
					<div class="row track-code-<?php echo $id;?>" style="display:none;background-color:#FFFFFF">
						<div class="col-xl-10 col-md-10 margin-auto" style="padding:  2em;">
							<div class="embed-code">Your tracking pixel embeded code</div>
							<textarea class="form-control" style="height:200px" readonly="readonly"><?php echo $row2->Tracking_Code;?></textarea>
					
						</div>
						<div class="col-xl-2 col-md-2" style="margin:auto;text-align:center;"><input type="button" class="add-new-button" value="Copy"></div>

					</div>
				
				<?php $id ++; } }
		
		?>

		<div class="row" style="    margin-bottom: 1.5em;"></div>

  <div class="row campaign-summary">
				  
		  <!-- <div class="col-md-12 col-12">Link Tracker</div> -->
		  
		  
  </div>
  <?php
		
				// $current_user = wp_get_current_user();
				// $email = $current_user->user_email;
			
				$json_url = $base_api . "api/mastercampaign/ad_trackers";
				$post = ['camp_id'=> $camp_id];
				// $post = ['email'=> $email];
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$json_url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
				$response = curl_exec($ch);
				curl_close($ch);
			
				$object = json_decode($response);
			
				$camp = json_decode($object->response);
				// var_dump($camp);die();
				$id = 1;
				foreach ($camp as $row) { 
					foreach ($row as $row2) { ?>

						<div class="row email-tracker">
						<div class="col-xl-8 col-md-8 margin-auto">
							<span class="margin-right"><i class="fa fa-check" aria-hidden="true"></i></span>
							<span>
							<?php 

				

				

				
				?>	<img src="<?php echo $ad_tracker_image_2; ?>" style='width:3%'/>  
				
							</span>
							<span class="camp-name">[<?php echo $row2->li_name;?>]</span> | Ad Tracker</div>
						<div class="col-xl-2 col-md-2"><a class="get-link-code" data-code="<?php echo $id;?>" data-active=1>Get Code</a></div>
						<div class="col-xl-2 col-md-2"><a class="get-code" target='_blank' data-code="<?php echo $id;?>" data-active=0 href='<?php echo get_home_url()."/ad-tracking/?link_id=".urlencode(base64_encode($row2->li_id)).""?>'>View Data</a></div>

						</div>
						<div class="row track-link-code-<?php echo $id;?>" style="display:none;margin-bottom:15px;background-color:#FFFFFF">
								<div class="col-xl-10 col-md-10 margin-auto" style="padding:  2em;">

								<div class="embed-code">Your link embeded code</div>
									<textarea class="form-control" style="height:50px" readonly="readonly"><?php echo "https://mwd.world/".$row2->li_unique;?></textarea></div>
								<div class="col-xl-2 col-md-2" style="margin:auto;text-align:center"><input type="button" class="add-new-button" value="Copy"></div>

						</div>

				<?php $id ++; } }
		
		?>
	<div class="row forward-bg no-pad-rl  center-auto ">
		
				<div class="col-xl-12"><span>FORWARD TO DEVELOPER</span>
<div>If a developer will be completing your campaign for you, insert their email address below to send the embed codes to them.	</div>	<?php echo get_field( "forward_developer" );?>
				</div>
				
					<div class="col-xl-6">	<input type='text' class='form-control input-border' placeholder='First Name' id="first_name">	
					</div>
					<div class="col-xl-6">		<input type='text' class='form-control input-border' placeholder='Surname' id="sur_name">
					</div>
				
					<div class="col-xl-12">	<input type='text' class='form-control input-border' placeholder='Developer Email Address' id="email">	
					</div>
		
		
				<div class="col-xl-12" align="center">	<span>
					<!-- <a class="track-code-copy" href="#" id="send_developer">Send Email</a> -->
					<input type="button" class="add-new-button" id="send_developer" value="Send Email">
				</span>
				</div>
		
	</div>
</div>


	

  
  
  
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>


<script>

	jQuery(".get-code").click(function(){
		var id = jQuery(this).data('code');
		var active = jQuery(this).attr('data-active');

		if(active == '0'){
			jQuery(".track-code-" + id).slideUp();
			jQuery(this).attr('data-active',1)
		}else{
			jQuery(".track-code-" + id).slideDown();
			jQuery(this).attr('data-active',0)
		}

	});

	jQuery(".get-link-code").click(function(){
		var id = jQuery(this).data('code');
		var active = jQuery(this).attr('data-active');

		if(active == '0'){
			jQuery(".track-link-code-" + id).slideUp();
			jQuery(this).attr('data-active',1)
		}else{
			jQuery(".track-link-code-" + id).slideDown();
			jQuery(this).attr('data-active',0)
		}

	})

	jQuery('#send_developer').click(function(){

			var first_name = jQuery('#first_name').val();
			var sur_name = jQuery('#sur_name').val();
			var email = jQuery('#email').val();

			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


			if(first_name == '' || sur_name == '' || email == '' || re.test(email) == false){

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
								alertify.thank("Please to make sure the field's value is valid");


				return false;
			}

			jQuery.ajax({  type: 'post',
                    data: {'action' : 'mw_send_developer', "email":email,"first_name":first_name,"sur_name":sur_name },  
                    url: base_url_new +  '/wp-admin/admin-ajax.php'
                  }).done(function(response){

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
								alertify.thank("Your email has been sent to developer");

								jQuery('#first_name').val("");
								jQuery('#sur_name').val("");
								jQuery('#email').val("");
				  
				})

	})

	
</script>
