<?php
/**
 * Template Name: home 2 Template
 */
?> 

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>


<div id="fullpage">
	<div class="section bg-img bg-black">
    <div class="menu">
      <div class="logo-menu">
        <a href="<?php echo get_home_url();?>"><img src="<?php echo get_template_directory_uri();?>/dist/images/logo.png"></a>
      </div>
      <div class="right-menu">
        <p><a href="<?php echo get_permalink('107');?>">coffee subscription</a><p>
          <p><button><a href="<?php echo get_permalink('14');?>">membership</a></button></p>
      </div>
    </div>
    <!-- <div class="container s-1 flex text-center">
      <div class="text text-center auto backtext">
      </div>
    </div> -->  
    <div class="s-1 flex text-center relative">
      
      <div class="slideshow">
        <div class="container">
            <div class="text text-center auto backtext abs">
          <?php echo get_field('text_1');?>
          </div>
      </div>
        <ul>
          <li><span></span></li>
          <li><span></span></li>
          <li><span></span></li>
          <li><span></span></li>
        </ul>
      </div>
    </div>
  </div>
	<div class="section bg-white">
    <div class="container s-2 flex">
        <div class="text flexstart ">
          <p>some of our members</p>
        </div>
        <div class="row row-cus">
          <?php if(have_rows('member_logo',12)):$i=1;while(have_rows('member_logo',12)):the_row();
            if($i <= 15){ ?>

          <div class="col-cus"><img src="<?php echo get_sub_field('logo');?>"></div>
          <?php }$i++;endwhile;endif;?>

        </div>
        <div class="text flexend text-center">
          <span><a href="<?php echo get_permalink('12');?>">meet the whole family</a></span>
        </div>
    </div>  
  </div>
	<div class="section bg-black">
    <div class="container s-2 flex">
        <div class="text flexstart ">
          <p><a href="<?php echo get_permalink('14');?>">roasting service</a></p>
        </div>
        <div class="image"><img src="<?php echo get_template_directory_uri();?>/dist/images/roast.png"></div>
        <div class="text flexend text-center">
        <p><a href="<?php echo get_permalink('14');?>">what's involved?</a></p>
        </div>
    </div>  
  </div>
	<div class="section bg-white foot">
    <div class="container s-2 flex">
        <div class="text flexstart ">
          <p>become a member</p>
        </div>
        <div class="row w-100 auto">
          <div class="col-12">
            <form>
              <p>tell us what your looking for:*</p>
              <div>
                <div class="flex tickgroup flexflow">
                  <div class="nowrap">
                  i am a:
                </div>
                <div class="flex">
                  <div class="flex tick checkboxFive">
                    <input id="1" type="checkbox" class="radio" value="barista" name="fooby[1][]" />
                    <label class="abs" for="1"></label>
                    <label class="flex label">barista</label>
                  </div>

                  <div class="flex tick checkboxFive">
                    <input id="2" type="checkbox" class="radio" value="roaster" name="fooby[1][]" />
                    <label class="abs" for="2"></label>
                    <label class="flex label">roaster</label>
                  </div>
                  <div class="flex tick checkboxFive">
                    <input id="3" type="checkbox" class="radio" value="business owner" name="fooby[1][]" />
                    <label class="abs" for="3"></label>
                    <label class="flex label">business owner</label>
                  </div>
                  <div class="flex tick checkboxFive">
                    <input id="4" type="checkbox" class="radio" value="enthusiast" name="fooby[1][]" />
                    <label class="abs" for="4"></label>
                    <label class="flex label">enthusiast</label>
                  </div>
                </div>
              </div>
              </div>
              <div><p>im looking for:</p></div>
              <div>
                <select id="select">
                  <option value="1">more information about roasting services or CRS</option>
                  <option value="2">Education on Roasting</option>
                  <option value="3">Invitation to your events, trainings and cuppings</option>					
                </select>
              </div>
              <div>
                <input id="name" name="name" type="text" placeholder="name">
              </div>
              <div>
                <input id="company" name="company" type="text" placeholder="company">
              </div>
              <div>
                <input id="email" name="email" id="name" name="name" type="text" placeholder="email">
              </div>
              <div>
                <input id="phone" name="phone" type="number" placeholder="phone">
              </div>
              <div>
                <textarea id="message" name="message"  placeholder="tell us a little about how we can help you"></textarea>
              </div>
              <div class="text flexend text-center">
          <span><button id="send-contact" type="submit">submit</button></span>
        </div>
            </form>
          </div>
        </div>
    </div>
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
          <p><a href="#">facebook</a></p>
          <p><a href="#">instagram</a></p>
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