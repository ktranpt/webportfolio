<?php
/**
 * Template Name: homepage Template
 */
?>
<style>
	.home-kv-1{
		background-image: url('<?php echo get_field('background_kv');?>');
		background-repeat: no-repeat;
		background-size: cover;
		min-height: 677px;
		background-position: center center;
	}
</style>
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <div class="fluid-container home-kv-1">
  	<div class="container"> 
  	<div class="heading-kv">
  	<?php /*?><h1><span class="white-bar">THE EDGE </span> FOR <?php echo get_field('the_edge_for');?></h1><?php */?>
  	<h1 class="gotham"><?php echo get_field('title');?></h1>
  	</div>
  	<div class="subtitle">
  		<span><?php echo get_field('subtitle');?></span>
  	</div>
  	<div class="gotham cta-kv cta-home">
  		<a href="<?php echo get_field('cta_link');?>"><span>start your <strong>free trial</strong></span></a>
  	</div>
  	<div class="disclaim"><span>No commitments. Cancel at any time.</span></div>
  	</div>
  </div>
<div class="home-first-content">
	<div class="container">
			<div class="col-12 col-xl-10 auto nopad-left nopad-right">
			
		<div class="row ">
			<?php if(have_rows('repeater')):while(have_rows('repeater')):the_row() ?>
				<div class="col-12 col-md-6 left nopad-left">
					<h2 class="white-bar"><?php echo get_sub_field('title');?></h2>
					<div class="subtitle"><?php echo get_sub_field('subtitle');?></div>
					<div class="text"><?php echo get_sub_field('text');?></div>
					<div class="left"><a href="<?php echo get_sub_field('cta_link');?>/report/?re_code=eYIHKTA" target="_blank" class="a-home"><?php echo get_sub_field('cta');?></a></div>

				</div>
				<div class="col-12 col-md-6 center nopad-right">
					<div class="content-img"><img src="<?php echo get_sub_field('image');?>"></div>
				</div>
				<?php endwhile; endif;?>
			</div>
		</div>
	</div>
</div>
 <div class="home-2nd-content">
 	<div class="container">
		<div class="col-12 col-xl-10 auto nopad-left nopad-right">
			<div class="row">
			<?php if(have_rows('repeater_2')):while(have_rows('repeater_2')):the_row() ?>
				<div class="col-12 col-md-12 ">
					<h2 class="white-bar"><?php echo get_sub_field('title');?></h1>
					<div class="text"><?php echo get_sub_field('text');?></div>
				
				</div>
				<div class="col-12">
					<div class="row alstart">
					<?php if(have_rows('tile')):while(have_rows('tile')):the_row() ?>
							<div class="col-12 col-md-4 mtop-20">
								<div><img src="<?php echo get_sub_field('image');?>"></div>
								<div class="title"><h3><?php echo get_sub_field('title');?></h3></div>
								<div class="text"><?php echo get_sub_field('text');?></div>
								<div class="cta"><a href="<?php echo get_sub_field('cta_link');?>" class="a-home"><?php echo get_sub_field('cta');?></a></div>

							</div>
					<?php endwhile; endif;?>
					</div>
				</div>
				<?php endwhile; endif;?>
			</div>	
		</div>
	 </div>
 </div>
 
 <div class="home-3rd-content">
	<?php if(have_rows('repeater_3')):while(have_rows('repeater_3')):the_row() ?>
		<div class="container">
			<div class="row">
			<div class="col-xl-1 hidden-md-down"></div>
			<div class="col-md-7 col-sm-9 col-12 col-xl-6 auto padd">
				
					
						<h2 class="white-bar"><?php echo get_sub_field('title');?></h1>
						<div class="subtitle"><?php echo get_sub_field('subtitle');?></div>
						<div class="text"><?php echo get_sub_field('text');?></div>
						<div class="cta"><a href="<?php echo get_sub_field('cta_link');?>" class="a-home"><?php echo get_sub_field('cta');?></a></div>
					
					
				</div>
				<div class="col-xl-5 col-md-5 col-12 no-pad-rl" style="margin:auto">
						<img src="<?php echo get_sub_field('image');?>">
					</div>

			</div>
		</div>
		
	<?php endwhile; endif;?>
 </div>
  
 
  
<div class="home-3rd-content second">
<?php if(have_rows('repeater_5')):while(have_rows('repeater_5')):the_row() ?>
	<div class="container">
		<div class="row reverse-column">
		<div class="col-xl-1 hidden-md-down"></div>
		<div class="col-xl-5 col-md-5 col-12 no-pad-rl" >
					<img src="<?php echo get_sub_field('image');?>">
				</div>
		<div class="col-md-7 col-sm-9 col-12 col-xl-6 auto padd">


					<h2 class="white-bar"><?php echo get_sub_field('title');?></h1>
					<div class="subtitle"><?php echo get_sub_field('subtitle');?></div>
					<div class="text"><?php echo get_sub_field('text');?></div>
					<div class="cta"><a href="<?php echo get_sub_field('cta_link');?>/report/?re_code=eYIHKTA" class="a-home"><?php echo get_sub_field('cta');?></a></div>


			</div>
			

		</div>
	</div>

<?php endwhile; endif;?>
</div>
 <div class="home-3rd-content switch newbg">
<?php if(have_rows('repeater_6')):while(have_rows('repeater_6')):the_row() ?>
	<div class="container">
		<div class="row alcent padd">
		<div class="col-xl-1 hidden-md-down"></div>
		
			
		<div class="col-xl-5 col-md-5 col-12 auto marg-bottom">


					<h2 class="white-bar"><?php echo get_sub_field('title');?></h1>
					<div class="subtitle"><?php echo get_sub_field('subtitle');?></div>
					<div class="text"><?php echo get_sub_field('text');?></div>
					<div class="cta"><a href="<?php echo get_sub_field('cta_link');?>" class="a-home"><?php echo get_sub_field('cta');?></a></div>


			</div>
			<div class="col-md-7 col-12 col-xl-6" >
					<img src="<?php echo get_sub_field('image');?>">
				</div>

		</div>
	</div>
 
<?php endwhile; endif;?>
</div>

<div class="home-3rd-content switch pple">
<?php if(have_rows('repeater_8')):while(have_rows('repeater_8')):the_row() ?>
	<div class="container">
		<div class="row alcent padd reverse-column">
		<div class="col-xl-0 hidden-md-down"></div>

		<div class="col-xl-6 col-md-5 col-12 auto">
					<img src="<?php echo get_sub_field('image');?>">

					


			</div>
		
			<div class="col-md-7 col-12 col-xl-5 marg-bottom" >
					<h2 class="white-bar"><?php echo get_sub_field('title');?></h1>
					<div class="subtitle"><?php echo get_sub_field('subtitle');?></div>
					<div class="text"><?php echo get_sub_field('text');?></div>
					<div class="cta"><a href="<?php echo get_sub_field('cta_link');?>" class="a-home"><?php echo get_sub_field('cta');?></a></div>
				</div>
		

		</div>
	</div>
 
<?php endwhile; endif;?>
</div>
<div class="home-4th-content second">
 	<div class="container">
			<div class="row alstart">
			<div class="col-xl-1 hidden-md-down"></div>
			<?php if(have_rows('repeater_7')):while(have_rows('repeater_7')):the_row() ?>
				<div class="col-12 col-xl-4 col-md-4">
					<h2 class="white-bar"><?php echo get_sub_field('title');?></h1>
					<div class="text"><?php echo get_sub_field('text');?></div>
				
				</div>
				<div class="col-12 col-xl-7 col-md-7">
					<div class="row alstart auto">
					<?php if(have_rows('tile')):$i=1;while(have_rows('tile')):the_row() ?>
						<style>
							.iceno-<?php echo $i;?>{
								display: flex;
								flex-direction: column;
/*								justify-content: center;*/
							}
							.iceno-<?php echo $i;?>::before{
								content:"";
								background-image: url('<?php echo get_sub_field('image');?>');
								background-size: cover;
								background-position: center;
								background-repeat: no-repeat;
								width: 105px;
								height: 105px;
								display: inline-table;
								margin-bottom: 1em;
							}
							@media (max-width:556px){
								.iceno-<?php echo $i;?>::before{
									width: 14vw;
									height: 14vw;
								margin-bottom: 2vw;
								}
								.iceno-<?php echo $i;?>{  
								justify-content: center;
							}
							} 
						</style>
							<div class="col-12 col-md-4 iceno-<?php echo $i;?> no-pad-rl alcent tog-par">
								<div class="tog center">
									<div class="title"><h3><a href="<?php echo get_sub_field('cta_link');?>"><?php echo get_sub_field('title');?></a></h3></div>
									<div class="text"><?php echo get_sub_field('text');?><a href="<?php echo get_sub_field('cta_link');?>">Learn More</a></div>
								</div>
							</div>
					<?php $i++; endwhile; endif;?>
					</div>
				</div>
				<?php endwhile; endif;?>
			</div>
			
	 </div>
 </div>

 <div class="home-4th-content">
 	<div class="container">
			<div class="row">
			<div class="col-xl-1 hidden-md-down"></div>
			<?php if(have_rows('repeater_4')):while(have_rows('repeater_4')):the_row() ?>
				<div class="col-12 col-xl-11">
					<h2 class="white-bar"><?php echo get_sub_field('title');?></h1>
					<div class="text"><?php echo get_sub_field('text');?></div>
				
				</div>
				
				<div class="col-xl-1 hidden-md-down"></div>
				<div class="col-12 col-xl-11">
					<div class="row alstart auto">
					<?php if(have_rows('tile')):$i=1;while(have_rows('tile')):the_row() ?>
						<style>
							.icono-<?php echo $i;?>{
								display: flex;
								align-items: flex-start;    
/*								justify-content: center;*/
							}
							.icono-<?php echo $i;?>::before{
								content:"";
								background-image: url('<?php echo get_sub_field('image');?>');
								background-size: cover;
								background-position: center;
								background-repeat: no-repeat;
								width: 76px;
								height: 76px;
								display: inline-table;
								margin-right: 1.5em;
							}
							@media (max-width:556px){
								.icono-<?php echo $i;?>::before{
									width: 14vw;
									height: 14vw;
								margin-right: 3.5vw;
								}
								.icono-<?php echo $i;?>{  
								justify-content: center;
							}
							}
						</style>
							<div class="col-12 col-lg-6 mtop-4em icono-<?php echo $i;?> no-pad-rl">
								<div class="tog">
									<div class="title"><h3><?php echo get_sub_field('title');?></h3></div>
									<div class="text"><?php echo get_sub_field('text');?></div>
								</div>
							</div>
					<?php $i++; endwhile; endif;?>
					</div>
					<div class="cta"><button><a href="<?php echo get_sub_field('cta_link');?>"><?php echo get_sub_field('cta');?></a></button></div>
				</div>
				<?php endwhile; endif;?>
			</div>
			
	 </div>
 </div>
   	
	
</div>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
