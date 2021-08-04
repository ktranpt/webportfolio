<?php $frontpage_id = get_option( 'page_on_front' ); ;?>
<!-- Modal Video Gallery-->

<!-- <?php for($i = 1; $i<=3; $i++){ ?>
<div class="modal fade" id="videoModal<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none;">
	<div class="modal-dialog" role="document" style="max-width: 50%;">
	<div class="modal-content" style="padding-bottom: 35px;">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true" style="float: right; margin-right: 5px;">&times;</span>
		</button>

		<video poster="<?php echo get_template_directory_uri();?>/video/gumbuya.jpg" id="bgvid<?=$i?>" controls playsinline loop>
			<source src="<?php echo get_template_directory_uri();?>/video/video_gallery_<?=$i?>.mp4" type="video/mp4">
		</video>

		<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-top:10px;">Close</button>
      </div>

	</div>
	</div>
</div>
<?php  } ?> -->
<!-- Modal Email-->
<div class="modal fade" id="careerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
	        Careers
		</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
					<div class="message">Your email have been sent. We will contact you soon</div>  
					<div class="error-message">The value is not valid</div>
        	<input class="full form-control" placeholder="First name" id="car_first_name">
        	<input class="full form-control" placeholder="Surname" id="car_sure_name">
        	<input class="full form-control" placeholder="Email" id="car_email">
					<textarea class="full form-control" placeholder="Description" style="height:200px" id="car_description"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary green" id="car_send_email">Send</button>
      </div>
  	</form>
    </div>
  </div>
</div>


<!-- Modal Email-->
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
	        Email Us
		</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
					<div class="message">Your email have been sent. We will contact you soon</div>  
					<div class="error-message">The value is not valid</div>
        	<input class="full form-control" placeholder="First name" id="first_name">
        	<input class="full form-control" placeholder="Surname" id="sure_name">
        	<input class="full form-control" placeholder="Email" id="email">
					<input class="full form-control" placeholder="Subject" id="subject">
					<textarea class="full form-control" placeholder="Description" style="height:200px" id="description"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary green" id="send_email">Send</button>
      </div>
  	</form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
	        Be the first to know about news, competitions and events from Gumbuya World
		</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
					<div class="message">Thank You for subscribing to Gumbuya World!</div> 
					<div class="error-message">The value is not valid</div> 
        	<input class="full form-control" placeholder="First name" id='sub_first_name'>
        	<input class="full form-control" placeholder="Surname" id='sub_sure_name'>
        	<input class="half form-control left" placeholder="DOB (dd/mm/yyyy)" id='sub_dob'>
        	<input class="half form-control right" placeholder="Postcode" id='sub_post_code'>
        	<input class="full form-control" placeholder="Email" id='sub_email'> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary green" id='subscribe'>Subscribe</button>
      </div>
  	</form>
    </div>
  </div>
</div>
<!-- Modal -->
<footer class="footer">
	<div class="flex-container">
		<div class="footer-item footer-mobile margin-bt logo">
			<img src="<?php echo get_template_directory_uri();?>/dist/images/logo.png">
		</div>
		<div class="footer-item footer-xs margin-bt foot-right text">
			<div class="header"><h3 style="font-size:1.7em;">GUMBUYA</h3></div>
			<div class="list">
				<p><a target="_blank" href="https://www.google.com.au/maps/place/Gumbuya+World/@-38.0719135,145.6556429,15z/data=!4m15!1m9!2m8!1sHotels!3m6!1sHotels!2s-38.0719498,+145.6555176!3s0x6b29e7f034230413:0xe46c32ddce0323ec!4m2!1d145.6555176!2d-38.0719498!3m4!1s0x6b29e73c20aafabd:0x21410bf9caa9da7!8m2!3d-38.0715969!4d145.6555219">2705 Princes Highway</a></p>
				<p><a target="_blank" href="https://www.google.com.au/maps/place/Gumbuya+World/@-38.0719135,145.6556429,15z/data=!4m15!1m9!2m8!1sHotels!3m6!1sHotels!2s-38.0719498,+145.6555176!3s0x6b29e7f034230413:0xe46c32ddce0323ec!4m2!1d145.6555176!2d-38.0719498!3m4!1s0x6b29e73c20aafabd:0x21410bf9caa9da7!8m2!3d-38.0715969!4d145.6555219">Tynong, Victoria 3813</a></p>
				<?php if(have_rows('gumbuya',$frontpage_id)):while(have_rows('gumbuya',$frontpage_id)):the_row();?>
				<?php if(get_sub_field('link') === true){ ;?>
				<p><a href="<?php echo get_sub_field('url');?>"><?php echo get_sub_field('menu');?></a></p>
				<?php }else{ ;?>
				<p><?php echo get_sub_field('menu');?></p>
				<?php } endwhile; endif;?>
				<p data-toggle="modal" data-target="#emailModal"  style="cursor:pointer;">Email: info@gumbuya.com.au</p>
			</div>
		</div>
		<div class="footer-item footer-xs margin-bt foot-right text">
			<div class="header"><h3 style="font-size:1.7em;">Support</h3></div>
			<div class="list">
				<?php if(have_rows('support',$frontpage_id)):while(have_rows('support',$frontpage_id)):the_row();?>
				<?php if(get_sub_field('link') === true){    
					if(get_sub_field('menu') == "Careers"){    
						 echo '<p data-toggle="modal" data-target="#careerModal" style="cursor:pointer;">Careers</p>';
					}else{
					?>
				<p><a href="<?php echo get_sub_field('url');?>"><?php echo get_sub_field('menu');?></a></p>
				<?php }}else{ ;?>
				<p><?php echo get_sub_field('menu');?></p>
				<?php } endwhile; endif;?>
			</div>
		</div>
		<div class="footer-item footer-xs margin-bt foot-right text">
			<div class="header"><h3 style="font-size:1.7em;">Park Info</h3></div>
			<div class="list">
				<?php if(have_rows('park_info',$frontpage_id)):while(have_rows('park_info',$frontpage_id)):the_row();?>
				<?php if(get_sub_field('link') === true){ ;?>
				<p><a href="<?php if(get_sub_field('custom') === true){ echo get_sub_field('custom_url'); }else{ echo get_sub_field('url'); } ?>"><?php echo get_sub_field('menu');?></a></p>
				<?php }else{ ;?>
				<p><?php echo get_sub_field('menu');?></p>
				<?php } endwhile; endif;?>
			</div>
		</div>
		<div class="footer-item footer-xs margin-bt foot-right text">
			<div class="header"><h3 style="font-size:1.7em;">Connect</h3></div>
			<div class="list">
				<a target="_blank" href="<?php echo get_field('fb_link',$frontpage_id);?>"><p class="facebook">Facebook</p></a>
				<a target="_blank" href="<?php echo get_field('insta_link',$frontpage_id);?>"><p class="instagram">Instagram</p></a>
			</div>
		</div>
	<div class="copyright"><p>&copy; <?php echo date('Y');?> Tynong North Operations Pty Ltd (Gumbuya World)</p></div> 
	</div>
</footer>
<style>
.required{
	border-color:red;  
}
.message{
	color: #88af90;
	display:none;
	margin-bottom:10px;
}
.error-message{
		color: red;
    font-size: 12px;
		margin-bottom: 10px;
		display:none; 
}
</style>
<script>

		jQuery('#careers').click(function(){
			jQuery('#careerModal').modal('show'); 
			jQuery('.error-message').hide();
			jQuery('.required').removeClass('required'); 
		})

		jQuery('.contact').click(function(){
			jQuery('#emailModal').modal('show'); 
			jQuery('.error-message').hide();  
			jQuery('.required').removeClass('required'); 
		})

		jQuery('button[data-toggle=modal]').click(function(){
			jQuery('.error-message').hide(); 
			jQuery('.required').removeClass('required'); 
		})   

		// jQuery( "#exampleModal" ).on('shown', function(){
		// 	jQuery('.error-message').hide();    
		// });

		var base_url = '<?php echo get_home_url();?>';

		jQuery("#car_send_email").click(function(){
				var first_name = jQuery("#car_first_name").val();
				var sure_name = jQuery("#car_sure_name").val();
				var email = jQuery("#car_email").val();
				var description = jQuery("#car_description").val();
				
				if(first_name == ''){
					jQuery("#car_first_name").addClass('required');
					jQuery(".error-message").html('First name is required').fadeIn();  
					return false;
				}else{
					jQuery("#car_first_name").removeClass('required');
					jQuery(".error-message").fadeOut();  
				}

				if(sure_name == ''){
					jQuery("#car_sure_name").addClass('required');
					jQuery(".error-message").html('Surname is required').fadeIn();
					return false;
				}else{
					jQuery("#car_sure_name").removeClass('required');
					jQuery(".error-message").fadeOut();
				}

				if(email == '' || validateEmail(email) == false){   
					jQuery("#car_email").addClass('required');
					jQuery(".error-message").html('Email is not valid').fadeIn();
					return false;
				}else{
					jQuery("#car_email").removeClass('required');
					jQuery(".error-message").fadeOut();
				}

				if(description == ''){
					jQuery("#car_description").addClass('required');
					jQuery(".error-message").html('Description is required').fadeIn();
					return false;
				}else{
					jQuery("#car_description").removeClass('required');    
					jQuery(".error-message").fadeOut();  
				}


				jQuery.ajax({
								data: {'action' : 'mw_send_email_career',
									'first_name':first_name,
									'sure_name':sure_name,
									'email':email,
									'description':description
								},
								url: base_url +  '/wp-admin/admin-ajax.php',
								type:"post"
						}).done(function(response){

							jQuery(".message").fadeIn();

							jQuery(".error-message").fadeOut();   

							setTimeout(() => {
								jQuery(".message").fadeOut();
								jQuery('#careerModal').modal('toggle');
							}, 5000);    
							
							// jQuery('#emailModal').modal('toggle');   

							jQuery("#car_first_name").val('');
							jQuery("#car_sure_name").val('');
							jQuery("#car_email").val('');
							jQuery("#car_description").val('');
						})


		})
		jQuery("#send_email").click(function(){

				var first_name = jQuery("#first_name").val();
				var sure_name = jQuery("#sure_name").val();
				var email = jQuery("#email").val();
				var description = jQuery("#description").val();
				var subject = jQuery("#subject").val();

				if(first_name == ''){
					jQuery("#first_name").addClass('required');
					jQuery(".error-message").html('First name is required').fadeIn();  
					return false;
				}else{
					jQuery("#first_name").removeClass('required');
					jQuery(".error-message").fadeOut();
				}

				if(sure_name == ''){
					jQuery("#sure_name").addClass('required');
					jQuery(".error-message").html('Surname is required').fadeIn();
					return false;
				}else{
					jQuery("#sure_name").removeClass('required');
					jQuery(".error-message").fadeOut();
				}

				if(email == '' || validateEmail(email) == false){   
					jQuery("#email").addClass('required');
					jQuery(".error-message").html('Email is not valid').fadeIn();
					return false;
				}else{
					jQuery("#email").removeClass('required');
					jQuery(".error-message").fadeOut();
				}

				if(subject == ''){
					jQuery("#subject").addClass('required');
					jQuery(".error-message").html('Subject is required').fadeIn();
					return false;
				}else{
					jQuery("#subject").removeClass('required');
					jQuery(".error-message").fadeOut();
				}

				if(description == ''){
					jQuery("#description").addClass('required');
					jQuery(".error-message").html('Description is required').fadeIn();
					return false;
				}else{
					jQuery("#description").removeClass('required');
					jQuery(".error-message").fadeOut();
				}

				
		

						jQuery.ajax({
								data: {'action' : 'mw_send_email',
									'first_name':first_name,
									'sure_name':sure_name,
									'email':email,
									'description':description,
									'subject':subject
								},
								url: base_url +  '/wp-admin/admin-ajax.php',
								type:"post"
						}).done(function(response){

							jQuery(".message").fadeIn();

							setTimeout(() => {
								jQuery(".message").fadeOut();
								jQuery('#emailModal').modal('toggle');
							}, 5000);    
							
							// jQuery('#emailModal').modal('toggle');

							jQuery("#first_name").val('');
							jQuery("#sure_name").val('');
							jQuery("#email").val('');
							jQuery("#description").val('');
							jQuery("#subject").val('');
						})
			 
		})

		jQuery('#subscribe').click(function(){
			
					var first_name = jQuery('#sub_first_name').val();
					var sure_name = jQuery('#sub_sure_name').val();
					var dob = jQuery('#sub_dob').val();
					var post_code = jQuery('#sub_post_code').val();
					var email = jQuery('#sub_email').val();  
					
					if(first_name == ''){
					jQuery("#sub_first_name").addClass('required');
					jQuery(".error-message").html('First name is required').fadeIn();  
					return false;
					}else{
						jQuery("#sub_first_name").removeClass('required');
						jQuery(".error-message").fadeOut();
					}

					if(sure_name == ''){
						jQuery("#sub_sure_name").addClass('required');
						jQuery(".error-message").html('Surname is required').fadeIn(); 
						return false;
					}else{
						jQuery("#sub_sure_name").removeClass('required');
						jQuery(".error-message").fadeOut();
					}

					if(dob == '' || validateDOB(dob) == false){
						jQuery("#sub_dob").addClass('required');
						jQuery(".error-message").html('DOB is not valid').fadeIn(); 
						return false;
					}else{
						jQuery("#sub_dob").removeClass('required');
						jQuery(".error-message").fadeOut();
					}

					if(post_code == '' || validatePostcode(post_code) == false){      
						jQuery("#sub_post_code").addClass('required');
						jQuery(".error-message").html('Postcode is not valid').fadeIn();
						return false;
					}else{
						jQuery("#sub_post_code").removeClass('required');  
						jQuery(".error-message").fadeOut();
					}

					if(email == '' || validateEmail(email) == false){   
						jQuery("#sub_email").addClass('required');
						jQuery(".error-message").html('Email is not valid').fadeIn();
						return false;
					}else{
						jQuery("#sub_email").removeClass('required');
						jQuery(".error-message").fadeOut();
					}
   

					jQuery.ajax({ 
              data: {
								'cm-name': first_name,
								'cm-f-vllkjt': sure_name,
								'cm-f-vllkji': dob,
								'cm-f-vllkjd': post_code,
								'cm-auduyt-auduyt': email
							},
              type: 'post',
							url: 'https://merchantwiseau.createsend.com/t/t/s/auduyt/'
						}).done(function(response){

									jQuery(".message").fadeIn();   

									setTimeout(() => {
										jQuery(".message").fadeOut();    
										jQuery('#exampleModal').modal('toggle');
									}, 5000);
									
									jQuery('#sub_first_name').val('');
									jQuery('#sub_sure_name').val('');
									jQuery('#sub_dob').val('');
									jQuery('#sub_post_code').val('');
									jQuery('#sub_email').val('');  
						
						})
		})

		function validateEmail(email) {
				var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(email);
		}

		function validatePostcode(post_code){   

			var re = /^[0-9]{4}$/;
			return re.test(post_code);
		}

		function validateDOB(dob){
			var re =/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/;

			if(re.test(dob) == true){
				var data = dob.split("/");
				// using ISO 8601 Date String
				if (isNaN(Date.parse(data[2] + "-" + data[1] + "-" + data[0]))) {
						return false;
				}

				return true;
			}  
			return re.test(dob);
		}
</script>   

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107995044-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
 
  gtag('config', 'UA-107995044-1');
</script>
