<?php
/**
 * Template Name: homepage Template  
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  
  <section id="hero-2" class="hero-2">
  <div id="hero-slider" class="hero-slider owl-carousel owl-theme">
	  
	  <!-- Slide Item #1 -->
	  <div class="item">
		  <div class="item-bg bg-overlay">
			  <div class="bg-section">
				  <img src="<?php the_field('slide1')?>" alt="Background"/>
			  </div>
		  </div>
		  <div class="container">
			  <div class="row">
				  <div class="col-xs-12 col-sm-12 col-md-12">
					  <div class="hero-slide">
						  <div class="slide-heading">
							  <p>The Best Construction Company</p>
						  </div>
						  <div class="slide-title">
							  <h2>We do only what we are great on !</h2>
						  </div>
						  <div class="slide-action">
							  <a class="btn btn-primary" href="#">read more</a>
							  <a class="btn btn-secondary pull-right" href="#">get started</a>
						  </div>
					  </div>
				  </div>
				  <!-- .col-md-12 end -->
			  </div>
			  <!-- .row end -->
		  </div>
		  <!-- .container end -->
	  </div>
	  <!-- .item end -->
	  
	  <!-- Slide Item #2 -->
	  <div class="item">
		  <div class="item-bg bg-overlay">
			  <div class="bg-section">
				  <img src="<?php the_field('slide2')?>" alt="Background"/>
			  </div>
		  </div>
		  <div class="container">
			  <div class="row">
				  <div class="col-xs-12 col-sm-12 col-md-12">
					  <div class="hero-slide">
						  <div class="slide-heading">
							  <p>delivering professional expertise</p>
						  </div>
						  <div class="slide-title">
							  <h2>Our promise is to build value into every project</h2>
						  </div>
						  <div class="slide-action">
							  <a class="btn btn-primary" href="#">read more</a>
							  <a class="btn btn-secondary pull-right" href="#">get started</a>
						  </div>
					  </div>
				  </div>
				  <!-- .col-md-12 end -->
			  </div>
			  <!-- .row end -->
		  </div>
		  <!-- .container end -->
	  </div>
	  <!-- .item end -->
	  
	  <!-- Slide Item #3 -->
	  <div class="item">
		  <div class="item-bg bg-overlay">
			  <div class="bg-section">
				  <img src="<?php the_field('slide3')?>" alt="Background"/>
			  </div>
		  </div>
		  <div class="container">
			  <div class="row">
				  <div class="col-xs-12 col-sm-12 col-md-12">
					  <div class="hero-slide">
						  <div class="slide-heading">
							  <p>we innovate & design</p>
						  </div>
						  <div class="slide-title">
							  <h2>We have a team capable of maximizing the result</h2>
						  </div>
						  <div class="slide-action">
							  <a class="btn btn-primary" href="#">read more</a>
							  <a class="btn btn-secondary pull-right" href="#">get started</a>
						  </div>
					  </div>
				  </div>
				  <!-- .col-md-12 end -->
			  </div>
			  <!-- .row end -->
		  </div>
		  <!-- .container end -->
	  </div>
	  <!-- .item end -->
  </div>
  <!-- #hero-slider end -->
</section>

<section id="cta-2" class="cta pb-0 pt-0">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="cta-2 bg-theme">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-7">
							<div class="cta-icon">
								<i class="fa fa-building-o"></i>
							</div>
							<div class="cta-devider">
							</div>
							<div class="cta-desc">
								<p>Have Any Questions !</p>
								<h5>Don’t Hesitate To Contact Us ANy Time.</h5>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-5 cta-action text-right pull-right pull-none-xs">
							<a class="btn btn-primary btn-white mr-sm" href="#" data-toggle="modal" data-target="#model-quote" id="modelquote">rquest a quote</a>
							<a class="btn btn-secondary" href="contact-1.html">contact us</a>
							<!-- Modal -->
							<div class="modal fade model-quote" id="model-quote" tabindex="-1" role="dialog" aria-labelledby="modelquote">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
											<div class="model-icon">
												<i class="fa fa-building-o"></i>
											</div>
											<div class="model-divider">
												<div class="model-title">
													<p>Don’t Hesitate To ask</p>
													<h6>rquest a quote</h6>
												</div>
											</div>
										</div>
										<!-- .model-header end -->
										<div class="modal-body">
											<form id="pop-quote-form" action="assets/php/sendpopquote.php" method="post">
												<input type="text" class="form-control" name="quote-name" id="name" placeholder="Your Name" required/>
												<input type="email" class="form-control" name="quote-email" id="email" placeholder="Email" required/>
												<input type="text" class="form-control" name="quote-telephone" id="telephone" placeholder="Telephone" required/>
												<textarea class="form-control" name="quote-message"  id="quote" placeholder="Quote Details" rows="2" required></textarea>
												<button type="submit" class="btn btn-primary btn-black btn-block">Submit Inquiry</button>
												<!--Alert Message-->
												<div id="pop-quote-result" class="mt-xs">
												</div>
											</form>
										</div>
										<!-- .model-body end -->
									</div>
								</div>
							</div>
							<!-- .model-quote end -->
						</div>
					</div>
				</div>
				<!-- .cta-1 end -->
			</div>
			<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>
<section id="service-1" class="service service-1">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
				<div class="heading heading-2 text-center">
					<div class="heading-bg">
						<p class="mb-0">what we can do ?</p>
						<h2>our services</h2>
					</div>
					<p class="mb-0 mt-md">Yellow Hats is a leading developer of A-grade commercial, industrial and residential projects in USA. Since its foundation the company has doubled its turnover year on year, with its staff numbers swelling accordingly.</p>
				</div>
				<!-- .heading end -->
			</div>
			<!-- .col-md-6 end -->
		</div>
		<!-- .row end -->
		<div class="row">

			<?php
			$args = array( 'post_type' => 'service', 'posts_per_page' => 10 );
			$loop = new WP_Query( $args );?>
			<?php while ( $loop->have_posts() ) : $loop->the_post();
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
			?>

			<div class="col-xs-12 col-sm-4 col-md-4 service-block">
					<div class="service-img">
						<img src="<?php echo $featured_img_url;?>" alt="service">
					</div>
					<div class="service-content">
						<img src="<?php echo get_field('service_icon')?>" alt="icons"/>
						<div class="service-desc">
							<h4><?php the_title();?></h4>
							<p><?php the_content();?></p>
							<a class="read-more" href="#"><i class="fa fa-plus"></i>
								<span>read more</span>
							</a>
						</div>
					</div>
				</div>
			<?php endwhile;?>
		</div>
		<!-- .row end -->
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<a class="btn btn-secondary mt-50" href="#">All Services <i class="fa fa-plus ml-xs"></i></a>
			</div>
			<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

      <!-- </div>
	</div> -->
	<section id="projects" class="projects-fullwidth projects-4col bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
				<div class="heading heading-3 text-center mb-0">
					<div class="heading-bg">
						<p class="mb-0">great &amp; awesome works</p>
						<h2>our projects</h2>
					</div>
				</div>
				<!-- .heading end -->
			</div>
			<!-- .col-md-8 end -->
		</div>
	</div>
	<!-- .container end -->
	<div class="container-fluid">
		<div class="row">
			<!-- Projects Filter
			============================================= -->
			<div class="col-xs-12 col-sm-12 col-md-12 projects-filter">
				<ul class="list-inline">
					<li>
						<a class="active-filter" href="#" data-filter="*">All Projects</a>
					</li>
					<li>
						<a href="#" data-filter=".interior">Interior</a>
					</li>
					<li>
						<a href="#" data-filter=".renovation">Renovation</a>
					</li>
					<li>
						<a href="#" data-filter=".architecture">Architecture</a>
					</li>
					<li>
						<a href="#" data-filter=".landscaping">Landscaping</a>
					</li>
					<li>
						<a href="#" data-filter=".gardening">Gardening</a>
					</li>
				</ul>
			</div>
			<!-- .projects-filter end -->
		</div>
		<!-- .row end -->
		
		<!-- Projects Item
		============================================= -->
		<div id="projects-all" class="row">
			<!-- Project Item #1 -->
			<?php
			$args = array( 'post_type' => 'project', 'posts_per_page' => 10 );
			$loop = new WP_Query( $args );?>
			<?php while ( $loop->have_posts() ) : $loop->the_post();
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
			?>
			<div class="col-xs-12 col-sm-6 col-md-3 project-item">
				<div class="project-img">
					<img class="" src="<?php echo $featured_img_url;?>"/>
					<div class="project-hover">
						<div class="project-meta">
							<h6><?php the_category();?></h6>
							<h4>
								<a href="#"><?php the_title();?></a>
							</h4>
						</div>
						<div class="project-zoom">
							<a class="img-popup" href="<?php echo get_field('popup_img')?>" title="New Office Room"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					<!-- .project-hover end -->
				</div>
				<!-- .project-img end -->
				
			</div>
			<?php endwhile;?>	
			<!-- .project-item end -->
			
			
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

<!-- Shortcode #5 
============================================= -->
<section id="shortcode-5" class="shortcode-5 pb-50">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
				<div class="heading heading-2 text-center">
					<div class="heading-bg">
						<p class="mb-0">all about me</p>
						<h2>my stroy</h2>
					</div>
					<p class="mb-0">Yellow Hats is a leading developer of A-grade commercial, industrial and residential projects in USA. Since its foundation the company has doubled its turnover year on year, with its staff numbers swelling accordingly.</p>
				</div>
				<!-- .heading end -->
			</div>
		</div>
		<!-- .row end -->
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-6">	
				<div class="panel-group accordion" id="accordion02" role="tablist" aria-multiselectable="">
					<!-- Panel -->
					<div class="panel panel-default">
					<?php
					$args = array( 'post_type' => 'Stroy', 'posts_per_page' => 10 );
					$loop = new WP_Query( $args );
					?>
					<?php while ( $loop->have_posts() ) : $loop->the_post();
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
					?>		
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a class="accordion-toggle" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse-<?php the_ID(); ?>" aria-expanded="true"> <?php the_title();?> </a>
								<span class="icon"></span>
							</h4>
						</div>
						<div id="collapse-<?php the_ID(); ?>" class="panel-collapse" role="tabpanel" aria-labelledby="">
							<div class="panel-body">
							<?php the_content();?>
							</div>
						</div>
						<?php endwhile;?>		
					</div>
				</div>
				<!-- End .Accordion-->
			</div>
			<div class="col-xs-12 col-sm-4 col-md-3 hidden-xs">
				<div class="feature">
					<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/assets/images/features/1.jpg" alt="feature">
				</div>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-3">
				<div class="feature">
					<h4 class="text-uppercase">Reliability</h4>
					<p>Yellow Hats has a cutting edge quality management system which ensures high quality standards at all sites.</p>
				</div>
				<div class="feature">
					<h4 class="text-uppercase">Expertise</h4>
					<p>We have a team of specialists capable of maximizing the result and delivering the projects of any complexity.</p>
				</div>
				<div class="feature last">
					<h4 class="text-uppercase">Quality</h4>
					<p>The control mechanism allows secure &amp; integrated monitoring of all stages of the works.</p>
				</div>
			</div>
			
		</div>
	</div>
</section>

<!-- Call To Action #3
============================================= -->
<section id="cta-3" class="cta cta-3 bg-overlay bg-overlay-theme text-center">
	<div class="bg-section" >
		<img src="<?php echo get_template_directory_uri();?>/assets/images/call/2.jpg" alt="Background"/>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
				<h2>Quality Comes First</h2>
				<p>Cutting-edge construction quality management system LATISTA ensures high quality standards at all of the company’s sites. The control mechanism allows integrated monitoring of works at all stages of construction and includes over 100 quality assessment benchmarks.</p>
				<div class="signiture">
					<img src="<?php echo get_template_directory_uri();?>/assets/images/call/sign.png" alt="signiture"/>
				</div>
			</div>
			<!-- .col-md-8 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>
<!-- #cta-3 end -->

<!-- Shortcode #8 
============================================= -->
<section id="shortcode-8" class="shortcode-8 pb-0 pb-60-sm">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="heading heading-2 mb-0 text-center">
					<div class="heading-bg">
						<p class="mb-0">Great &amp; Awesome Features</p>
						<h2>Why Yellow Hats</h2>
					</div>
				</div>
				<!-- .heading end -->
			</div>
		</div>
		<!-- .row end -->
		<div class="clearfix mb-50">
		</div>
		<div class="row">
			<!-- .col-md-12 end -->
			<div class="col-xs-12 col-sm-6 col-md-4 text-right">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 feature">
						<div class="feature-icon right">
							<i class="fa fa-calendar"></i>
						</div>
						<h4 class="text-uppercase">Always Available</h4>
						<p>all construction sites open for visitors, with 24/7 video surveillance being conducted at all objects</p>
					</div>
					<!-- .col-md-12 end -->
					<div class="col-xs-12 col-sm-12 col-md-12 feature">
						<div class="feature-icon right">
							<i class="fa fa-database"></i>
						</div>
						<h4 class="text-uppercase">Fair Prices</h4>
						<p>you can be 100% sure that it will be delivered right on time, within the set budget limits</p>
					</div>
					<!-- .col-md-12 end -->
					
				</div>
				<!-- .row end -->
			</div>
			<!-- .col-md-4 end -->
			<div class="col-xs-12 col-sm-4 col-md-4 hidden-xs hidden-sm">
				<div class="feature-img">
					<img src="<?php echo get_template_directory_uri();?>/assets/images/features/3.png" alt="image"/>
				</div>
			</div>
			<!-- .col-md-4 end -->
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 feature">
						<div class="feature-icon">
							<i class="fa fa-briefcase"></i>
						</div>
						<h4 class="text-uppercase">Qualified Agents</h4>
						<p>We have a team of specialists capable of maximizing the result and delivering the projects</p>
					</div>
					<!-- .col-md-4 end -->
					<div class="col-xs-12 col-sm-12 col-md-12 feature">
						<div class="feature-icon">
							<i class="fa fa-cart-arrow-down"></i>
						</div>
						<h4 class="text-uppercase">Best Offers</h4>
						<p>All aspects of the operations being transparent and clear for clients and partners</p>
					</div>
				</div>
				<!-- .row end -->
			</div>
			<!-- .col-md-4 end-->
		</div>
	</div>
</section>

<!-- Testimonials #1
============================================= -->
<section id="testimonials" class="testimonial testimonial-1 bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="heading heading-3 text-center">
					<div class="heading-bg">
						<p class="mb-0">what people say ?</p>
						<h2>testimonials</h2>
					</div>
				</div>
				<!-- .heading end -->
			</div>
			
				
				<div class="col-xs-12 col-sm-12 col-md-12">
				
					<div id="testimonial-oc" class="testimonial-carousel owl-carousel owl-theme">
					<?php
					$args = array( 'post_type' => 'TESTIMONIALS', 'posts_per_page' => 10 );
					$loop = new WP_Query( $args );
					?>
					<?php while ( $loop->have_posts() ) : $loop->the_post();
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
					?>	
						<!-- testimonial item #1 -->
						<div class="testimonial-item">
							<div class="testimonial-content">
								<div class="testimonial-img">
									<i class="fa fa-quote-left"></i>
									<img src="<?php echo $featured_img_url;?>" alt="author"/>
								</div>
								<p><?php the_content();?></p>
							</div>
							<div class="testimonial-divider">
							</div>
							<div class="testimonial-meta">
								<strong><?php the_title();?></strong>, <?php echo get_field('job_title')?>
							</div>	
						</div>
						<!-- .testimonial-item end -->
					<?php endwhile;?>						
					</div>
				</div>
				<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
		
	</div>
	<!-- .container end -->
	
</section>
<!-- #testimonials end -->

<!-- Shortcode #9 
============================================= -->
<section id="clients" class="shortcode-9">
<div class="col-xs-12 col-sm-12 col-md-6">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="heading heading-2 text-center">
					<div class="heading-bg">
						<p class="mb-0">They Always Trust Us</p>
						<h2>Our Clients</h2>
					</div>
				</div>
				<!-- .heading end -->
			</div>
			<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
		<div class="row">
			<!-- Client Item -->
			<div class="col-xs-12 col-sm-4 col-md-2">
				<div class="brand last">
					<img class="img-responsive center-block" src="<?php echo get_template_directory_uri();?>/assets/images/clients/6.png" alt="brand">
				</div>
			</div>
			<!-- .col-md-2 end -->
		</div>
		<!-- .row End -->
	</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="heading heading-2 text-center">
					<div class="heading-bg">
						<p class="mb-0">They Always Trust Us</p>
						<h2>Our Clients</h2>
					</div>
				</div>
				<!-- .heading end -->
			</div>
			<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
		<div class="row">
			<!-- Client Item -->
			<div class="col-xs-12 col-sm-4 col-md-2">
				<div class="brand last">
					<img class="img-responsive center-block" src="<?php echo get_template_directory_uri();?>/assets/images/clients/6.png" alt="brand">
				</div>
			</div>
			<!-- .col-md-2 end -->
		</div>
		<!-- .row End -->
	</div>
	</div>
	<!-- .container end -->
</section>
<!-- #clients end-->
<!-- <?php get_template_part('templates/content', 'page'); ?> -->
<?php endwhile; ?>
<script>
jQuery(document).ready(function() {
			  var owl = jQuery('#hero-slider');
			  
              owl.owlCarousel({
              		animateOut: "fadeOutLeft",
					animateIn: "fadeInRight",
					autoplay: false,
					loop: true,
					margin: 22,
					nav: true,
					dots: false,
					dotsSpeed: 200,
					navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
					items: 1,
				});
});

jQuery(document).ready(function() {
	var    $testimonialCarousel = jQuery("#testimonial-oc");
	$testimonialCarousel.owlCarousel({
		loop: false,
        margin: 22,
        nav: false,
        dots: true,
		dotsSpeed: 300,
		items: 3,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
  	});
});
			


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js" integrity="sha256-wk7QMTzYE7BJvko9BsywPzRmKzhCtIQKTuN6/B9sRmw=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha256-P93G0oq6PBPWTP1IR8Mz/0jHHUpaWL0aBJTKauisG7Q=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" integrity="sha256-RdH19s+RN0bEXdaXsajztxnALYs/Z43H/Cdm1U4ar24=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha256-PZLhE6wwMbg4AB3d35ZdBF9HD/dI/y4RazA3iRDurss=" crossorigin="anonymous" />