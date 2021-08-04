<?php
/**
 * Template Name: Home 2 Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
<script type="text/javascript">
    jQuery('.funzone a').attr('id', 'funzone_scroll');
    jQuery('.pricing a').attr('id', 'pricing_scroll');
    jQuery('.open a').attr('id', 'opennlocation_scroll');
    jQuery('.info a').attr('id', 'opennlocation2_scroll');
</script>
 <!-- <div class="container-fluid no-pad full-height"> -->
 <div class="container-fluid no-pad" style="padding-bottom: 9px; background-color: #2e3032;">
	<video poster="<?php echo get_template_directory_uri();?>/video/gumbuya.jpg" id="bgvid" controls playsinline autoplay muted loop>
		<!-- <source src="<?php echo get_template_directory_uri();?>/video/gumbuya.webm" type="video/webm"> -->
		<source src="<?php echo get_template_directory_uri();?>/video/gumbuya.mp4" type="video/mp4">
	</video>
	<!-- <div class="scroll-gif"><img id="scroll" src="<?php echo get_template_directory_uri();?>/dist/images/scroll-icon.png"></div> -->
</div> 


<div id="section1" class="section-1">
	<div class="custom-container ">
		<div class="text text-center">
			<h2 style="text-transform: uppercase;"> <?php echo get_field('heading_blue');?></h2>
			<?php echo get_field('copy');?>
			 <div id="funzone" class="separator"></div>
			<h2  class="black"><?php echo get_field('heading_black');?></h2>
		</div>
		<div class="row margin-rl-0">
			<?php if(have_rows('tile')):$i=1;while(have_rows('tile')):the_row();?>
			<style>
			.bg-<?php echo $i;?>{
				background-image: url('<?php echo get_sub_field('bg');?>');
			}
			</style>
			<div class="col-sm-6 col-12 grey overlay bg bg-<?php echo $i;?>">
				<img src="<?php echo get_sub_field('logo');?>">
				<div class="rollover">
					<h3><?php echo get_sub_field('heading');?></h3>
					<p><?php echo get_sub_field('copy');?></p>
				</div>
			</div>
			<?php $i++;endwhile; endif;?>
		</div>
	</div>
</div>
<div id="pricing" class="section-2">
	<div class="container" style="max-width:1200px;">
        <h2 style="color: #ffffff; text-align: center; font-size: 2.6em; margin-bottom: 0.8em;">E-Ticket Prices - Admission via online bookings only</h2>
		<!-- <p style="color: #ffffff; text-align: center; font-size: 1.3em; margin-bottom: 0.8em;"></p> -->
		   <p style="color: white; text-align: center; font-size: 25px; margin-bottom: 35px;">Your E-Ticket gives you unlimited all day access to four worlds of fun;<br /> including Oasis Springs, Oz Adventure, Outback Explorer's and Wildlife Trail.</p>
		<div class="row">
			<?php if(have_rows('price')):while(have_rows('price')):the_row();?>
			
			<?php if(get_sub_field('name') != 'Gift Vouchers'){?>
				<div class="col-6 price col-sm-3">
				<?php }else{?>
				<div class="col-6 price col-sm-33" style="margin: 0 auto;">
				<?php } ?>
			<a href="<?php echo get_site_url(); ?>/buy-ticket">
				<div class="round-price auto">
					<?php if(get_sub_field('name') != 'Gift Vouchers'){?>
					<p><?php echo get_sub_field('name');?></p>
					<span>(<?php echo get_sub_field('info');?>)</span>
					<h2><?php echo get_sub_field('price');?><h2>
				<?php }else{?>
					<h5><?php echo get_sub_field('name');?><h5>
				<?php } ?>
				</div>
				</a>
			</div>
				
			<?php endwhile; endif;?>
		</div>
		<div class="button-ticket text-center"><button><a href="<?php echo get_permalink('64');?>">Buy E-Tickets</a></button></div>
		<!-- <div class="button-ticket text-center"><button><a><p>E-TICKETS<br>ON SALE</p>
		<img class="timer" src="http://www.emarketingtools.com.au/Mashrlab/Gumbuya/4/Members.php"></a></button></div>-->
		<div class="cond"><p>Additional activities available at an extra cost</p></div>
	</div>
</div>
<!-- <div class="section-3 text-center"  style="padding-top:0px; margin-top:20px; padding-bottom:20px;">
	<h2><a href="https://www.instagram.com/gumbuya_world/" target="_blank" />Video Gallery</a></h2>
	<div class="container insta-section">
		<div class="photo">
			<img src="<?php echo get_template_directory_uri();?>/video/video1.jpg" alt="video-photo-1" data-toggle="modal" data-target="#videoModal1" style="cursor:pointer;"> 
		</div>
		<div class="photo">
		<img src="<?php echo get_template_directory_uri();?>/video/video2.jpg" alt="video-photo-2" data-toggle="modal" data-target="#videoModal2" style="cursor:pointer;"> 
		</div>
		<div class="photo">
		<img src="<?php echo get_template_directory_uri();?>/video/video3.jpg" alt="video-photo-3" data-toggle="modal" data-target="#videoModal3" style="cursor:pointer;"> 
		</div>
	</div>
</div> -->
<div id="OpenNLocation" class="section-4 getting-here">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-6 text">
				<h2><?php echo get_field('title');?></h2>
				<?php echo get_field('text');?>
				<p class="address"><?php echo get_field('address_gh');?></p>
				<button><a href="<?php echo get_field('urlgh');?>" target="_blank">Find Us</a></button>
			</div>
			<div class="col-12 col-sm-6 map">
				<a href="<?php echo get_field('urlgh');?>" target="_blank">
					<img src="<?php echo get_field('map');?>" style="border-radius: 10px;">
				</a>
			</div>
		</div>
	</div>
</div>
<div class="section-5 info">
	<div class="grey"></div>
	<div class="grey"></div>
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-6 hour pt">
				<h2><?php echo get_field('title_oh');?></h2>
				<?php if(have_rows('schedule')):while(have_rows('schedule')):the_row();?>
				<p><strong><?php echo get_sub_field('day');?> <?php echo get_sub_field('hours');?></strong></p>
				<?php endwhile; endif;?>
				<p class="cond">Admission via online bookings only</p>
				<p class="cond">*Closed Christmas Day.</p>
			</div>
			<div class="col-12 col-sm-6 info pt">
				<h2><?php echo get_field('title_sub');?></h2>
				<button data-toggle="modal" data-target="#exampleModal">subscribe</button>
			</div>
		</div>
	</div>
</div>


<div class="section-3 text-center" style="padding-top:0px; margin-top:0px; padding-bottom:10px;">
	<h2><a href="https://www.instagram.com/gumbuya_world/" target="_blank" />@gumbuya_world</a></h2>
	
	<div class="container">
	<?php echo get_field('ins');?>
		<!-- <div class="photo">
			<a href="https://www.instagram.com/gumbuya_world/" target="_blank" /><img src="<?php echo get_template_directory_uri();?>/dist/images/insta-photo-4.jpg" alt="insta-photo-4"> </a>
		</div>
		<div class="photo">
			<a href="https://www.instagram.com/gumbuya_world/" target="_blank" /><img src="<?php echo get_template_directory_uri();?>/dist/images/insta-photo-2.jpg" alt="insta-photo-3"></a>
		</div>
		<div class="photo">
			<a href="https://www.instagram.com/gumbuya_world/" target="_blank" /><img src="<?php echo get_template_directory_uri();?>/dist/images/insta-photo-1.jpg" alt="insta-photo-3"></a>
		</div> -->
	</div>
</div>