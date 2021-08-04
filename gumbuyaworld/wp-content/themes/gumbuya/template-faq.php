<?php /* Template Name: Faq Template */ ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<div class="faq-section">
	<div class="container">
		<h2><?php echo get_field('title');?></h2>
		<?php if(have_rows('item')):while(have_rows('item')):the_row();?>
		<h3><?php echo get_sub_field('title');?></h3>
		<p><?php echo get_sub_field('copy');?></p>
		<?php endwhile; endif;?>
		<h2><a href="<?php echo get_home_url();?>">Go back</a></h2>
	</div>
</div>