<?php
/**
 * Template Name: Press Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<div class="term-section">
	<div class="container"> 
		<?php echo get_the_content();?>
		<!-- <h2><a href="<?php echo get_home_url();?>">Go back</a></h2> -->
	</div>
</div>