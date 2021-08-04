<?php
/**
 * Template Name: Basket Template
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
  	<h1 class="lato"><?php if(is_user_logged_in()){echo get_the_title();}else{echo '<span class="white-bar">Your</span> Basket';}?></h1>
  	</div>
  	<!-- <div class="cta-kv">
  		<span><?php echo get_field('subtitle');?></span>
  	</div> -->
  	</div>
	
  </div>

  <div class="container">
  <?php get_template_part('templates/content', 'page'); ?>
</div>
<?php endwhile;?>