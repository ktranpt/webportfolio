<?php
/**
 * Template Name: Privacy Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
<script>
    jQuery('.button-special a').append('<img class="timer" src="http://www.emarketingtools.com.au/Mashrlab/Gumbuya/4/Members.php">');
</script>
<style>
	nav#navbar li.menu-item {
		align-self:center;
	}
	.button-special a.nav-link{
		font-size: 9px;
		padding-top: 7px;
		padding-bottom: 5px;
		overflow: hidden;
		padding-left: 15px;
		padding-right: 15px;
		display: flex;
		align-items:center;
	}
	nav#navbar .nav-item.button-special .timer{
		display: inline-flex;
		margin-left: 8px;
	}nav#navbar .nav-item.button-special p{
		display: inline-flex;
		margin-bottom: 0;
	}
	.button-ticket button{
		overflow: hidden;
		padding-top: 12px !important;
		padding-bottom: 10px !important;
    	font-size: inherit !important;

	}
	.button-ticket button a img{
		max-width: 150px;
		margin-left: 15px;
	}
	.button-ticket button a{
		font-size: 3vw !important;
		padding-top: 0;
		padding-bottom: 0;
		overflow: hidden;
		padding-left: 15px;
		padding-right: 15px;
		display: flex;
		align-items:center;
	}

	.button-ticket button a p{
		display: inline-flex;
	    margin-bottom: 0;
	    line-height: 1.3;
	}.button-ticket button a img{
		display: inline-flex;
	}
	@media (min-width:578px){
	.button-ticket button a{
		font-size: 3vw !important;
		padding-top: 0;
		padding-bottom: 0;
		overflow: hidden;
		padding-left: 15px;
		padding-right: 15px;
	}
	.button-ticket button a img{
		max-width: 200px;
	}
	}
	@media (min-width:768px){
	.button-ticket button a{
		font-size: 18px !important;
		padding-top: 0;
		padding-bottom: 0;
		overflow: hidden;
		padding-left: 15px;
		padding-right: 15px;
	}
	.button-ticket button a img{
		max-width: 250px;
	}
	}
</style>
<div class="term-section">
	<div class="container"> 
		<h2><?php echo get_field('title');?></h2>
		<?php echo get_the_content();?>
		<h2><a href="<?php echo get_home_url();?>">Go back</a></h2>
	</div>
</div>