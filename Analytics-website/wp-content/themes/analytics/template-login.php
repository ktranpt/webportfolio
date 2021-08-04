<?php
/**
 * Template Name: Login Template
 */
?>

<?php 
$camp = $_GET['myCamp'];

	if(!isset($camp)){
		$show = "style='display:none'";
		$isCamp = 0;
	}else{
		$show2 = "style='display:none'";

		$isCamp = 1;
	}
	$current_url = $_SERVER['REQUEST_URI']; 
	?>

<style>
	.back-kv{
		background-image: url('<?php if(is_user_logged_in()){if($isCamp != 1){ echo get_field('background_kv');}else{ echo get_field('background_kv_2');}}else{echo get_field('background_kv_3');}?>');
		background-repeat: no-repeat;
		background-size: cover;
		min-height: 332px;
		background-position: center center;
	}
</style>
<?php 
while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <div class="fluid-container back-kv no-bottom">
  	<div class="container">
  	<div class="heading-kv">
  	<?php /*?><h1><span class="white-bar">THE EDGE </span> FOR <?php echo get_field('the_edge_for');?></h1><?php */?>
	  <h1 class="lato"><?php
	 
	  if(is_user_logged_in()){
		  if($isCamp == 1){
			echo '<span class="white-bar">MY</span> CAMPAIGN';
		  }else{
			echo get_the_title();
		  }
		  
	  
	  }elseif(strpos($current_url, 'lost-password')){

				if(isset($_GET['show-reset-form'])){

					echo '<span class="white-bar">reset</span> password';
					
				}else{
					echo '<span class="white-bar">lost</span> password';
					
				}
		}else{
			echo '<span class="white-bar">Log</span> In/<span class="white-bar">Sign</span> up';
		}?></h1>
	  <?php ?>
  	</div>
  	<!-- <div class="cta-kv">
		  <span><?php echo get_field('subtitle');?></span>
		  
  	</div> -->
  	</div>
  </div>

<!-- <div class="fluid-container section"> 
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
</div> -->


  
  
  
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>


<script>
var isCamp = <?php echo $isCamp;?>;
	</script>