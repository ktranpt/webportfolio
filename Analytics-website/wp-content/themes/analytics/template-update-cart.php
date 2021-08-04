<?php
/**
 * Template Name: Update Cart Template
 */
?>
<style>
	body{
		background-color: #f3f3f3;
	}
	.back-kv{
		background-image: url('<?php echo get_field('background_kv');?>');
		background-repeat: no-repeat;
		background-size: cover;
		min-height: 465px;
		background-position: center center;
		position: relative;
	}
</style>
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <div class="fluid-container back-kv no-bottom normal-text">
  	<div class="container">
  	<div class="heading-kv">
  	<?php /*?><h1><span class="white-bar">THE EDGE </span> FOR <?php echo get_field('the_edge_for');?></h1><?php */?>
  	<h1 class="lato"><?php echo get_field('title');?></h1>
  	</div>
  	<div class="3steps stepp">
  	<div class="row auto gotham">
  	<?php if(have_rows('step_icon')):while(have_rows('step_icon')):the_row() ?>
  		<div class="col-lg-4 col-12 step-i"><img src="<?php echo get_sub_field('image');?>"><div class="mt1-l"><p><?php echo get_sub_field('text');?></p></div></div>
  		<?php endwhile; endif;?>
  	</div>
  		
  	</div>
  	<!-- <div class="cta-kv">
  		<span><?php echo get_field('subtitle');?></span>
  	</div> -->
  	</div>

  </div>
	
				
			
		
<div class="plain-text-tracker">

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
	<div class="container no-pad-rl">
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
		<div class="form-drop">
			<div class="greenback">
			</div>
			<div class="form-content"></div>
			<?php global $product;
			echo "<div id=".$product->get_id()."></div>";

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
<!--
			<form>
				<div class="items">
					<label>Campaign Name:</label><div class="input-area"><input placeholder="enter name"></div>
				</div>
				<div class="items">
					<label>Link Name:</label><div class="input-area"><input placeholder="enter name"></div>
				</div>
				<div class="items">
					<label>Link Address:</label><div class="input-area"><input placeholder="enter name"></div>
				</div>
				<div class="items">
					<label>How many clicks do you want tracked?</label><div class="input-area"><input placeholder="enter name"></div>
				</div>
				
			</form>
-->
<!--
			<div class="spacer"></div>
			<div class="form-content">
				<h3>ANALYTICS</h3>
				<span>Tell us a bit more about this ad, to help improve the quality of analytics available to you.</span>
			</div>
			<form>
				<div class="items">
					<label>Your Industry:</label><div class="input-area"><input placeholder="enter name"></div>
				</div>
				<div class="items">
					<label>Type of Ad:</label><div class="input-area"><input placeholder="enter name"></div>
				</div>
			</form>
-->
		</div>
		
	</div>
	<?php	endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>
</div>


 <div class="fluid-container section"> 
		 <?php if(have_rows('repeater_basic')):
		$i=1;
		while(have_rows('repeater_basic')):the_row();
			if ($i % 2 == 0) {?>

		  <div class="content-items-b <?php echo $i;?>">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-8 auto ">
						<div class="row alcent">
							<div class="col-md-5"><img src='<?php echo get_sub_field('image'); ?>'></div>
							<div class="col-md-7">
								<div class="title"><h2><?php echo get_sub_field('title'); ?></h2></div>
								<div class="text"><span><?php echo get_sub_field('text'); ?></span></div>
								<?php if(get_sub_field('cta') != ""){ ?>
								<div class="cta"><span><?php echo get_sub_field('cta'); ?></span></div>
								<?php } ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		<?php }else{ ?>
			<div class="content-items-a <?php echo $i;?>">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-8 auto">
						<div class="row alcent">
							<div class="col-md-5"><img src='<?php echo get_sub_field('image'); ?>'></div>
							<div class="col-md-7">
								<div class="title"><h2><?php echo get_sub_field('title'); ?></h2></div>
								<div class="text"><span><?php echo get_sub_field('text'); ?></span></div>
								<div class="cta"><span><?php echo get_sub_field('cta'); ?></span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		<?php } $i++;endwhile; endif;?>
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
</div>
	
</div> -->
  
  
<?php endwhile; ?>
<input id="total_items" type="hidden" value='<?php global $woocommerce;
	$items = $woocommerce->cart->get_cart();
	echo count($items) ?>' />

<script>


jQuery(document).ready(function() {
	// jQuery(".single_add_to_cart_button").click(function(e) {
	// 	e.preventDefault();

	// 	console.log('clicked');	
	// });

	// jQuery('.variations_form').submit(function(e){

	// 	e.preventDefault();

	// 	console.log(jQuery(this));	

	// 	var form = jQuery(this);

	// 	var status = true;


	// 	form.find(".input-text.addon.addon-custom").each(function(){

	// 		console.log(jQuery(this));
	// 		var val = jQuery(this).val();

	// 		if(val == "" && jQuery(this).is(':visible') == true){
	// 			jQuery(this).addClass("wrong");
	// 			status = false;
	// 		}else{
	// 			jQuery(this).removeClass("wrong");
	// 		}
	// 	}).promise().done(function(){


	// 		console.log("DONE ***" + status);

	// 		form.find(".addon.addon-select").each(function(){

	// 			var select = jQuery(this).val();
	// 			console.log("DONE ***" + select);
	// 				if(select == "" && jQuery(this).is(':visible') == true){
	// 					jQuery(this).addClass('wrong');
	// 					status = false;
	// 				}else{
	// 					jQuery(this).removeClass('wrong');
	// 				}

	// 		}).promise().done(function(){

	// 			form.find(".input-text.input-link").each(function() {
      
	// 				var link = jQuery(this).val();

	// 				console.log("DONE ***" + link);
	// 				if(link == "" && jQuery(this).is(':visible') == true){
	// 					jQuery(this).addClass('wrong');
	// 					status = false;
	// 				}else{
	// 					jQuery(this).removeClass('wrong');
	// 				}
	// 				// asd = asd + link +', ' ;

	// 		}).promise().done(function(){

	// 			// console.log("DONE ***" + status2);

	// 			if(status == false){
	// 				return false;
	// 			}else{
	// 					// var name = $("#name").val();
	// 				jQuery.ajax({ 
	// 					data: form.serialize(),
	// 					type: 'post',
	// 					url: form.attr('action')	
	// 				}).done(function(response){

	// 					var total = jQuery("#total_items").val();
	// 						alertify.confirm('You have ' + total + ' item(s) in the basket' ).set('labels', {ok:'Alright!', cancel:'Naa!'}); 

	// 				}).fail(function(response){

	// 				});
	// 			}
	// 		});
	// 		});
			
	// 	});
		
		

    

	// });
	if(jQuery( '.page-template-template-getstarted-php' ).length > 0){
		console.log('exists');
		jQuery(document.body).on( 'added_to_cart wc_update_cart', function(e){
			console.log(e);
		});	
	}
		
});
</script>


<div class="modal fade" id="thanks" tabindex="-1" role="dialog" aria-labelledby="thanksmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="thanksmodal"><strong>THANKS!</strong></h3>
      </div>
      <div class="modal-body">
		  <span>You have <span id="total"></span> item(s) in the basket</span>
      </div>
    </div>
  </div>
</div>