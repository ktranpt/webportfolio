<?php
/**
 * The template for displaying 404 pages (Not Found)
 * Template Name: 404 Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>


<div id="fullpage-no">
  <div class="section bg-white foot">
    <div class="menu">
      <div class="logo-menu">
        <a href="<?php echo get_home_url();?>"><img src="<?php echo get_template_directory_uri();?>/dist/images/logo.png"></a>
      </div>
      <div class="right-menu">
        <p><a href="<?php echo get_permalink('107');?>">coffee subscription</a><p>
          <p><button><a href="<?php echo get_permalink('14');?>">membership</a></button></p>
      </div>
    </div>
    <div class="text text-center flexend"><h1 style="color:black">OOPS<br />The requested page can't be FOUND</h1></div> 
    <div class="footer">
      <div class="logo-foot">
        <img src="<?php echo get_template_directory_uri();?>/dist/images/logo-foot.png">
      </div>
      <div class="par hi">
        <p>say hi!</p>
        <p>@collectiveroastingsolutions</p>
        <p>info@crs.business</p>
      </div>
      <div class="footer-right">
        <div class="par flex-left">
          <p>roastery 1</p>
          <p>8/47 applebee st</p>
          <p>st peters nsw</p>
        </div>
        <div class="par flex-right">
          <p>roastery 2</p>
          <p>42/112 mcevoy st</p>
          <p>alexandria</p>
        </div>
        <div class="par social">
          <p><a style="color:black;" href="#">facebook</a></p>
          <p><a style="color:black;" href="#">instagram</a></p>
        </div>
    </div>
    </div> 
  </div>
  
    <!-- <div class="section bg-white sec-f">
     
  </div> -->
</div>
<div class="back-up">
  <a href="#section1">
    <img src="<?php echo get_template_directory_uri();?>/dist/images/up.png">
  </a>
</div>
<script>
  var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>