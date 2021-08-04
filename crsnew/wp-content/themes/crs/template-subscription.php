<?php
/**
 * Template Name: subscription Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
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

    

    .img-size{
        width:20px;
        height:20px;
    }
    .center{
      text-align:center;
    }

    .padding{
      padding-top: 5em;
padding-bottom: 5em;
    }
    .padding_2{
      padding-top: 10em;
padding-bottom: 10em;
    }
    .padding_3{
      /* padding-top: 5em; */
padding-bottom: 1em;
    }
    .banner-padding-top{
      padding-top: 30em;
          }

          .btn-signup{
            background-color: red;
color: #FFF !important;
padding: 2.5px 20px 2.5px 20px;
text-decoration: none;
          }
          .btn-signup-2{
            background-color: red;
color: #FFF !important;
padding: 1px 20px 5px 20px;
text-decoration: none;
          }
          

          .text-title{
            font-size: 38px;
            margin-bottom: 20px;
          }
          .text-sub-title{
            font-size: 24px;
          }

          .image-res{
            width: 50%;
height: auto;
          }

          .margin-tb{
            text-align:center;
            margin-top: 8em;
margin-bottom: 8em;
          }
          .email-bor{
            width: 200px;
border: 1px solid;
border-color: red;
          }

          .marg-bot{
             margin-bottom:15px;
          }

          .banner_top{
            color: #FFFFFF;
bottom: 2em;
font-size: 20px;
          }

          .banner{
            color: #FFFFFF;
bottom: 2em;
font-size: 20px;
          }

          .right-padding{
              text-align: right;
              padding: 0;
          }

          .left-padding{
              text-align: left;
              padding: 0;
          }

          body{
            font-size:20px;
          }

        .banner-text3-1{
            font-size:30px;
            margin-bottom: 30px;
        }
        .banner-text3-2{
          
        }

        .banner-text-4-1{
          font-size:30px;
            margin-bottom: 30px;
        }

        .banner-text-5-1{
          

        }

        .banner-text-5-2{
              margin-top:10em;
              text-decoration: underline;
    text-decoration-color: red;
        }

        @media only screen and (max-device-width : 640px) {
        /* Styles */
                .email-us{
                      display:none;
                }

                .banner_top{
                   font-size: 16px;
                }
        }

        @media only screen and (max-device-width: 768px) {
        /* Styles */
        .email-us{
                      display:none;
                }
        }

        .reddd{
            color:red;
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

  <!-- <div class="section bg-white">
  <div class="container s-2 flex"> -->
    <div class="row image-tile text-center banner-padding-top" style="background-image:url('<?php echo get_field('banner_image');?>')">
          <div class="col-12 banner_top">  
              <?php echo get_field('banner_text_1');?>
          </div>
    </div>
    <!-- </div>
  </div> -->

  <!-- <div class="section bg-white">
  <div class="container s-2 flex"> -->
  <div class="row">
      <div class="col-12 center padding" ><img src="<?php echo get_field('arrow_down');?>" class='img-size'></div>  
  </div>
  <div class="container">
    <div class="row padding">
    
      <div class="col-md-6">
      <?php echo get_field('subscription_text');?>
          <div style="margin-top: 20px;"><a href="#" class="btn-signup" style="text-decoration: none;">SIGN ME UP</a></div>
      </div>
      <div class="col-md-6">
              <img src="<?php echo get_field('subscription_img');?>" style="width: 100%;">
      </div>
    
    </div>
    </div>
    <!-- </div>
  </div> -->   

  <div class="row image-tile text-center banner-padding-top" style="background-image:url('<?php echo get_field('banner_image_2');?>')">
  <div class="col-12 banner">
  <?php echo get_field('banner_text_2');?>

   
  </div>
</div>


  <div class="row image-tile text-center padding_2">
    <div class="col-12 text-center">
        <div>“I LOVE THIS STUFF MAN.”</div>
        <div style="color:red">JENNIFER — FACEBOOK</div>
        
    </div>
  </div>

  <div class="row padding_3">
      <div class="col-12 text-center">THANKS JENNIFER</div>
  </div>

  <div class="row image-tile text-center banner-padding-top" style="background-image:url('<?php echo get_field('banner_image_3');?>')">
  <div class="col-12" style="color:#FFFFFF;bottom:27em">

  <?php echo get_field('banner_text_3');?>
  
    
  </div>
</div>

  <div class="row image-tile text-center padding_2">
    <div class="col-12 text-center">
        <div>“THE BEST THING THATS EVER</div>
        <div>HAPPENED TO ME”</div>
        <div style="color:red">JENNIFER — FACEBOOK</div>
        
    </div>
  </div>

  <div class="row padding_3">
      <div class="col-12 text-center" style='color: #b3b3b3;'>THANKS AGAIN JENNIFER
</div>
  </div>

  <div class="row image-tile text-center banner-padding-top" style="background-image:url('<?php echo get_field('banner_image_4');?>')">
  <div class="col-12" style="color:#FFFFFF;bottom:27em">
  <?php echo get_field('banner_text_4');?>

    
  </div>
</div>
      <!-- Add Here -->
          <div class="container">
              <div class="row margin-tb">   
                  <div class="col-xl-4">
                    <img src="<?php echo get_field('img_1');?>" class="image-res">
                    <div class="reddd">THE PICK OF THE CROP</div>
                  </div>
                  <!-- <div class="col-xl-1">
                  </div> -->
                  <div class="col-xl-4"><img src="<?php echo get_field('img_2');?>" class="image-res">
                  <div class="reddd">ROASTED BY ONE<br> OF SYDNEYS BEST</div>

                  </div>
                  <!-- <div class="col-xl-1">
                  </div> -->
                  <div class="col-xl-4"><img src="<?php echo get_field('img_3');?>" class="image-res">
                  <div class="reddd"> DELIVERED TO YOU<br> EACH FORTNIGHT</div>

                  </div>

              </div>
          </div>

      <div class="row image-tile text-center banner-padding-top" style="background-image:url('<?php echo get_field('banner_image_5');?>'); padding-top:15em">
      <div class="col-12" style="color:#FFFFFF;bottom:12em">

      <?php echo get_field('banner_text_5');?>

        
       
      </div>
</div>

<div class="row image-tile text-center padding">
  <div class="col-12" >
      <?php echo get_field('banner_text_6');?>
       
    </div>
</div>

<div class="row image-tile text-center padding email-us" style="background-color: #dfdfdf;margin-bottom:50px">
  <div class="col-12" >
    <div style="color:red;margin-bottom:15px">FANCY AN EMAIL EVERY NOW AND THEN?</div>
    <div class="row">
    
      <div class="col-12 col-md-6 right-padding"><input placeholder="EMAIL ADDRESS" class="email-bor"/></div>
      <div class="col-12 col-md-6 left-padding"><a href="#" class="btn-signup-2" style="text-decoration: none;">KEEP ME IN THE LOOP</a></div>
      </div>

    </div>
</div>

  
    <div class="footer" style="margin-bottom: 2em;">
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
<!-- <div class="back-up">
  <a href="#section1">
    <img src="<?php echo get_template_directory_uri();?>/dist/images/up.png">
  </a>
</div> -->

<div class="modal fade" id="message-alert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="    padding: 10px;">
            <div class="modal-header">
                <h4 class="name-folder-alert">You have already subscribed .</h4>
								<span class="camp_id" style="display:none"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php 

          $current_user = wp_get_current_user(); 
          $is_subscribe = 0;
          if($current_user->ID != 0){   

                  $subscriptions = wcs_get_users_subscriptions( $current_user->ID );

                  if(count($subscriptions) != 0){

                    $is_subscribe = 1;

                  }

                  // foreach ($subscriptions as $subscription){
                  //   if($subscription->get_status() == 'active' || 
                  //       $subscription->get_status() == 'pending-cancel' ||
                  //       $subscription->get_status() == 'pending-cancel' ||){
                  //     // $currentsub = $subscription;
                  //     $is_subscribe = 1;
                  //     break;
                  //   }
                  // }

          }
  ?>
<script>

  var is_subscribed =  <?php echo $is_subscribe;?>;

  var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
  var base_url = "<?php echo get_home_url();?>";



  jQuery(document).ready(function() {  

    // jQuery("#fullpage-no").setAutoScrolling(false);     
    
    jQuery(".btn-signup").click(function(){

            if( is_subscribed == 1 ){
            // jQuery(".btn-signup").css({"cursor":" not-allowed","pointer-events": "none"});

                  // jQuery('#message-alert').modal({
                  //   backdrop: 'static',
                  //   keyboard: false
                  // });
                  window.location = base_url + "/my-account/subscriptions";

                  return;
          }

            var ajax_url = base_url + "/product/subscription";

            jQuery.ajax({
                data: {
              'action' : 'mw_subcribe_add_to_card',
              'product_id' : 172, 
              'add-to-cart' : 172,
              'quantity' : 1

            },
            url: ajax_url,
            type:"post"
              }).done(function(response){
              
                  window.location = base_url + "/checkout/";

              });

      })

  })
  
</script>