<?php
/**
 * Template Name: all Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>


<div id="fullpage">
	<div class="section bg-black">
    <div class="menu">
      <div class="logo-menu">
        <img src="<?php echo get_template_directory_uri();?>/dist/images/logo.png">
      </div>
      <div class="right-menu">
        <p><a href="#">coffee subscription</a><p>
          <p><button><a href="#">membership</a></button></p>
      </div>
    </div>
    <div class="container s-1 flex text-center">
      <div class="text flexend ">
      <?php echo get_field('text_1');?>
      </div>
    </div>
  </div>
	<div class="section bg-white">
    <div class="container s-2 flex">
        <div class="text flexstart ">
          <p>some of our members</p>
        </div>
        <div class="text flexend text-center">
          <span><a href="#">meet the whole family</a></span>
        </div>
    </div>  
  </div>
	<div class="section bg-black">
    <div class="container s-3 flex">
        <div class="text flexstart ">
          <p>roasting service</p>
        </div>
        <div class="image"><img src="<?php echo get_template_directory_uri();?>/dist/images/roast.png"></div>
        <div class="text flexend text-center">
        <p>what's involved?</p>
        </div>
    </div>  
  </div>
	<div class="section bg-white">
    <div class="container s-2 flex">
        <div class="text flexstart ">
          <p>become a member</p>
        </div>
        <div class="row w-100 auto">
          <div class="col-12">
            <form>
              <p>tell us what your looking for:*</p>
              <div>
                <div class="flex tickgroup">i am a:
                  <div class="flex tick checkboxFive">
                    <input id="1" type="checkbox" class="radio" value="1" name="fooby[1][]" />
                    <label class="abs" for="1"></label>
                    <label class="flex label">barista</label>
                  </div>

                  <div class="flex tick checkboxFive">
                    <input id="2" type="checkbox" class="radio" value="1" name="fooby[1][]" />
                    <label class="abs" for="2"></label>
                    <label class="flex label">roaster</label>
                  </div>
                  <div class="flex tick checkboxFive">
                    <input id="3" type="checkbox" class="radio" value="1" name="fooby[1][]" />
                    <label class="abs" for="3"></label>
                    <label class="flex label">business owner</label>
                  </div>
                  <div class="flex tick checkboxFive">
                    <input id="4" type="checkbox" class="radio" value="1" name="fooby[1][]" />
                    <label class="abs" for="4"></label>
                    <label class="flex label">enthusiast</label>
                  </div>
              </div>
              </div>
              <div><p>im looking for:</p></div>
              <div>
                <select>
                  <option>more information about roasting services</option>
                </select>
              </div>
              <div>
                <input type="text" placeholder="name">
              </div>
              <div>
                <input type="text" placeholder="company">
              </div>
              <div>
                <input type="text" placeholder="email">
              </div>
              <div>
                <input type="text" placeholder="phone">
              </div>
              <div>
                <textarea placeholder="tell us a little about how we can help you"></textarea>
              </div>
              <div class="text flexend text-center">
          <span><a href="#">submit</a></span>
        </div>
            </form>
          </div>
        </div>
    </div>  
  </div>
  <div class="section bg-white">
    <div class="container s-2 flex">
        <div class="text flexstart">
          <p>roasting service</p>
        </div>
        <div class="small-text row text-center">
          <div class="col-md-7 auto">
            <p>Our service offers you the opportunity to start your own roasting operation. You will be given access to all the materials, equipment and support you need to become a successful roaster. Members in our collective range from experienced professionals to novice baristas. Everyone is welcome.<p>
          </div>
        </div>
        <div class="row small-text">
          <div class="col-md-4">
            <div class="image-tile"><img src="<?php echo get_template_directory_uri();?>/dist/images/bag.jpg"></div>
            <p>Just like making your own jam is cheaper than buying it. Our roasting service offers an economically sustainable solution to your coffee business.</p>
          </div>
          <div class="col-md-4">
            <div class="image-tile"><img src="<?php echo get_template_directory_uri();?>/dist/images/cup.jpg"></div>
            <p>Just like making your own jam is cheaper than buying it. Our roasting service offers an economically sustainable solution to your coffee business.</p>
          </div>
          <div class="col-md-4">
            <div class="image-tile"><img src="<?php echo get_template_directory_uri();?>/dist/images/hands.jpg"></div>
            <p>Just like making your own jam is cheaper than buying it. Our roasting service offers an economically sustainable solution to your coffee business.</p>
          </div>

        
        </div>
    </div>  
  </div>
  <div class="section bg-white">
    <div class="container s-2 flex">
        <div class="text flexstart ">
          <p>our members</p>
        </div>
    </div>  
    <div class="footer">
      <div class="logo-foot">
        <img src="<?php echo get_template_directory_uri();?>/dist/images/logo-foot.png">
      </div>
      <div class="par">
        <p>say hi!</p>
        <p>@collectiveroastingsolutions</p>
        <p>info@crs.business</p>
      </div>
      <div class="footer-right">
        <div class="par">
          <p>roastery 1</p>
          <p>8/47 applebee st</p>
          <p>st peters nsw</p>
        </div>
        <div class="par">
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
  
</div>