<?php
/**
 * Template Name: account Template
 */
?>


<style>
    .rred{
      border-bottom: 1px solid red;
    }
    #fullpage-no .bg-white .menu .right-menu p button, #fullpage .bg-white .menu .right-menu p button{
        border-radius:9px;
    }
    #fullpage-no .text.red a, #fullpage-no .text.red button, #fullpage .text.red a, #fullpage .text.red button{
        border-radius:9px;
    }
    #fullpage-no .text.red a.w-bg, #fullpage .text.red a.w-bg{
        background-color:white;
        border: 2px solid red;
        color: red;
    }

    .margin-top-bottom{
      margin-top: 50px;
    margin-bottom: 50px;
    min-height: 600px;
    }

    li{
      color:red;
      
    }

    li > a{
       color : black;
    }
</style>


<div id="fullpage-no">
	<div class="section bg-white sec-f">
    <div class="menu">
      <div class="logo-menu">
        <a href="<?php echo get_home_url();?>"><img src="<?php echo get_template_directory_uri();?>/dist/images/logo.png"></a>
      </div>
      <div class="right-menu">
        <p><a href="<?php echo get_permalink('107');?>">coffee subscription</a><p>
          <p><button><a href="<?php echo get_permalink('14');?>">membership</a></button></p>
      </div>
    </div>
  </div>
<div class="container margin-top-bottom">
  <?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
</div>
  
    <div class="footer" style="    margin-bottom: 1em;">
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
          <p><a href="#">facebook</a></p>
          <p><a href="#">instagram</a></p>
        </div>
    </div>
    </div>  
  </div>  
   <!--  <div class="section bg-white sec-f">
     
  </div> -->

</div>
<script>
  var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';


// console.log("Hello");
  jQuery(document).ready(function() {  
    jQuery("li > a").each(function(){

      // console.log(jQuery(this));
          if(jQuery(this).html() == "Downloads"){
              jQuery(this).parent("li").remove();
          }

    })

    jQuery(".order-again").remove();
    // jQuery(".product-name").html("Subscription ($50.00 every 2 weeks)");

    jQuery(".product-name").find("a").attr("href","#");
        
  })
  
</script>