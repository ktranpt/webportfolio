<?php
/**
 * Template Name: Home 3 Template
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
    jQuery('.button-special a').empty();
    jQuery('.button-special a').append('<img class="timer" src="http://staging.mwiseapps.com/disney/staging/test/gumbuyaworld-timer/gif.php">');
</script>
<style>
	/*nav#navbar .nav-item.button-special .timer {
	opacity: 0;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    margin: auto;
    max-width: inherit;;
	}
	nav#navbar .nav-item.button-special a {
	position: relative;
    overflow: hidden;
	}
	nav#navbar .nav-item.button-special a:hover > .timer{
		opacity: 1;
	}*/
	nav#navbar li.menu-item {
		align-self:center;
	}
	.button-special a.nav-link{
		font-size: 9px;
		padding-top: 0;
		padding-bottom: 0;
		overflow: hidden;
		padding-left: 15px;
		padding-right: 15px;
	}
</style>
<div class="container-fluid no-pad full-height">
	<video poster="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg" id="bgvid" playsinline autoplay muted loop>
		<source src="http://thenewcode.com/assets/videos/polina.webm" type="video/webm">
		<source src="http://thenewcode.com/assets/videos/polina.mp4" type="video/mp4">
	</video>
	<div class="scroll-gif"><img id="scroll" src="<?php echo get_template_directory_uri();?>/dist/images/scroll-icon.png"></div>
</div>
<div id="section1" class="section-1">
	<div class="custom-container ">
		<div class="text text-center">
			<h2><?php echo get_field('heading_blue');?></h2>
			<?php echo get_field('copy');?>
			<div class="separator"></div>
			<h2 id="#funzone" class="black"><?php echo get_field('heading_black');?></h2>
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
	<div class="container">
		<div class="row">
			<?php if(have_rows('price')):while(have_rows('price')):the_row();?>
			<div class="col-6 price col-md-3">
				<div class="round-price auto">
					<p><?php echo get_sub_field('name');?></p>
					<span>(<?php echo get_sub_field('info');?>)</span>
					<h2><?php echo get_sub_field('price');?><h2>
				</div>
			</div>
			<?php endwhile; endif;?>
		</div>
		<div class="button-ticket text-center"><button><a href="<?php echo get_permalink('64');?>">Buy Tickets</a></button></div>
		<div class="cond"><p>Admission via online bookings only.</p></div>
	</div>
</div>
<div class="section-3 text-center">
	<h2>#GumbuyaWorld</h2>
	<div class="container insta-section">
		<div class="photo">
			<img src="<?php echo get_template_directory_uri();?>/dist/images/insta-photo-3.jpg">
		</div>
		<div class="photo">
			<img src="<?php echo get_template_directory_uri();?>/dist/images/insta-photo-2.jpg">
		</div>
		<div class="photo">
			<img src="<?php echo get_template_directory_uri();?>/dist/images/insta-photo-1.jpg">
		</div>
	</div>
</div>
<div id="OpenNLocation" class="section-4 getting-here">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-6 text">
				<h2><?php echo get_field('title');?></h2>
				<?php echo get_field('text');?>
				<p class="address"><?php echo get_field('address_gh');?></p>
				<button><a href="<?php echo get_field('urlgh');?>" target="_blank">Plan your trip!</a></button>
			</div>
			<div class="col-12 col-sm-6 map">
				<img src="<?php echo get_field('map');?>">
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
				<p><strong><?php echo get_sub_field('day');?></strong> <?php echo get_sub_field('hours');?></p>
				<?php endwhile; endif;?>
				<p class="cond">*Closed Christmas Day.</p>
			</div>
			<div class="col-12 col-sm-6 info pt">
				<h2><?php echo get_field('title_sub');?></h2>
				<button data-toggle="modal" data-target="#exampleModal">subscribe</button>
			</div>
		</div>
	</div>
</div>