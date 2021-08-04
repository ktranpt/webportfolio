<?php
/**
 * Template Name: tickets Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

	<div class="container"> 

		<div class="text text-center" style="margin-top: 2em; color: #006DB7;">
			<h2 style=" margin-bottom:0em;  font-size:3.3em;">1 Ticket for 4 Worlds Of Adventure</h2> <br />
			<h2 style=" margin-bottom:0em; font-size:2.7em;">Select your dates below</p>
		</div>
<iframe id="roller-widget" src="https://www.rollerdigital.com/gumbuyaworld/products/all-park-access?date=20171218"></iframe>
<script src="//cdn.rollerdigital.com/scripts/widget/responsive_iframe.js"></script>
  <p style="padding-left:2em; font-size:20px;">Admission via online bookings only</p>
</div>