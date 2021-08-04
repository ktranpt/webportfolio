<?php
/**
 * Template Name: Focus Template
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
  		<span style="padding: 5px; height: 50px;"><?php echo get_field('subtitle');?></span>
  	</div>
  	</div>
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
									<div class="cta"><span style="border-color: #212529;"><a target="_blank" style="color:#212529;" href="<?php if(get_sub_field('cta_link') != ""){
											echo get_sub_field('cta_link');
									}else{
										 echo get_home_url()."/report/?re_code=eYIHKTA";
									}?>"><?php echo get_sub_field('cta'); ?></a></span></div>
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
								<?php if(get_sub_field('cta') != ""){ ?>
								<div class="cta"><span><a href="<?php if (get_sub_field('cta_link')!= ""){
											echo get_sub_field('cta_link');
									}else{
										 echo get_home_url()."/report/?re_code=eYIHKTA";
									}?>"><?php echo get_sub_field('cta'); ?></a></span></div>
								<?php } ?>
							
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
  
  
  
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
