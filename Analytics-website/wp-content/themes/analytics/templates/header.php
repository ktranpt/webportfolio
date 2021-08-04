 <header class="banner">

	<div id="app" class="fluid-container">
		<nav class=" navbar navbar-expand-md navbar-light bg-black">
			<div class="container">
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand" href="<?php echo get_home_url();?>">Logo</a>
				<div id="navbarNavDropdown" class="navbar-collapse collapse">
					<?php
				if (has_nav_menu('primary_navigation')) :
				wp_nav_menu(['theme_location' => 'primary_navigation', 
							 'menu_class' => 'navbar-nav',
							'depth'           => 2,
							'walker'          => new bs4_walker_nav_menu
							]);
				endif;
				?>
				</div>
			</div>
		</nav>
	</div>
</header>



<script>

	var cart_count = <?php echo WC()->cart->get_cart_contents_count(); ?>;
	var isLoggin = '<?php echo is_user_logged_in();?>';

	
	jQuery(document).ready(function(){
				
			var anchor = jQuery('.nav-item-900 > a')
			anchor.empty();
			
			anchor.append('<span style="padding:10px"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span><div class="cart-items-number">'+cart_count+'</div>');
			jQuery('.nav-item-900').show();

			jQuery('.cart-items-number').css('display','none');
			if(cart_count > 0){
				jQuery('.cart-items-number').fadeIn();
			}else{
				jQuery('.cart-items-number').fadeOut();
			}   

			// 
	})

	
	
</script>
