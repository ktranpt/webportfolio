<header class="banner">
  <div id="promo" class="promo">
    <div class="text"><h2 class="desktop">GRAND OPENING 18<sup>th</sup> DECEMBER 2017</h2><h2 class="mobile">GRAND OPENING 18<sup>th</sup> DEC 2017</h2></div>
    <button class="sub desktop" data-toggle="modal" data-target="#exampleModal">Subscribe to our Newsletter</button>
    <button class="sub mobile" data-toggle="modal" data-target="#exampleModal">Subscribe</button>
    <!-- <button class="close" type="button"><span id="close_promo" aria-hidden="true">&times;</span></button> -->
  </div>
<nav id="navbar" class=" navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="<?php echo get_home_url();?>"><img src="<?php echo get_template_directory_uri();?>/dist/images/logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
   <?php
        if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 
               'menu_class' => 'navbar-nav',
               'menu' => 'menu 2',
              'depth'           => 2,
              'walker'          => new bs4_walker_nav_menu,
              'container'=> false
              ]);
        endif;
        ?>
  </div>
</nav>
</header>