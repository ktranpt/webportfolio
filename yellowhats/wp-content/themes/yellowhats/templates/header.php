<header id="navbar-spy" class="full-header">
	<div id="top-bar" class="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 hidden-xs">
					<ul class="list-inline top-contact">
						<li>
							<p>Phone:
								<span>+ 2 0106 5370701</span>
							</p>
						</li>
						<li>
							<p>Email:
								<span>7oroof@7oroof.com</span>
							</p>
						</li>
					</ul>
				</div>
				<!-- .col-md-6 end -->
				<div class="col-xs-12 col-sm-6 col-md-6 text-right">
					<ul class="list-inline top-widget">
						<li class="top-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-vimeo"></i></a>
							<a href="#"><i class="fa fa-linkedin"></i></a>
							<a href="#"><i class="fa fa-rss"></i></a>
						</li>
						<li>
							<a class="button-quote" href="#" data-toggle="modal" data-target="#hmodel-quote" id="hmodelquote">Get A Quote</a>
							<!-- Modal -->
							<div class="modal fade model-quote" id="hmodel-quote" tabindex="-1" role="dialog" aria-labelledby="hmodelquote">
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
											<form id="head-quote-form" action="assets/php/sendheadquote.php" method="post">
												<input type="text" class="form-control" name="quote-name" id="quote-name" placeholder="Your Name" required/>
												<input type="email" class="form-control" name="quote-email" id="quote-email" placeholder="Email" required/>
												<input type="text" class="form-control" name="quote-telephone" id="quote-telephone" placeholder="Telephone" required/>
												<textarea class="form-control" name="quote-message"  id="quote-message" placeholder="Quote Details" rows="2" required></textarea>
												<button type="submit" class="btn btn-primary btn-black btn-block">Submit Inquiry</button>
												<!--Alert Message-->
												<div id="head-quote-result" class="mt-xs">
												</div>
											</form>
										</div>
										<!-- .model-body end -->
									</div>
								</div>
							</div>
							<!-- .model-quote end -->
						</li>
					</ul>
				</div>
				<!-- .col-md-6 end -->
			</div>
		</div>
	</div>
	<nav id="primary-menu" class="navbar navbar-fixed-top style-1">
		<div class="row">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="logo" href="index.html">
						<img src="<?php echo get_template_directory_uri();?>/assets/images/logo/logo-dark.png" alt="Yellow Hats">
					</a>
				</div>
				
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-left">
						<li class="has-dropdown active">
							<a href="#" data-toggle="dropdown">Home</a>
							<ul class="mega-menu">
								<li>
									<ul>
										<li>
											<a href="home-1.html">home page 1</a>
										</li>
										<li>
											<a href="home-2.html">home page 2</a>
										</li>
										<li>
											<a href="home-3.html">home page 3</a>
										</li>
										<li>
											<a href="home-4.html">home page 4</a>
										</li>
										<li>
											<a href="home-5.html">home page 5</a>
										</li>
										<li>
											<a href="home-6.html">home page 6</a>
										</li>
									</ul>
								</li>
								<li>
									<ul>
										<li>
											<a href="home-7.html">home page 7</a>
										</li>
										<li>
											<a href="home-8.html">home page 8</a>
										</li>
										<li>
											<a href="home-9.html">home one page</a>
										</li>
										<li>
											<a href="home-10.html">home shop page</a>
										</li>
										<li>
											<a href="home-11.html">home architect</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<!-- li end -->
						<li class="has-dropdown">
							<a href="#" data-toggle="dropdown" >about</a>
							<ul class="dropdown-menu">
								<li class="dropdown-submenu">
									<a href="#" data-toggle="dropdown" >about us</a>
									<ul class="dropdown-menu">
										<li>
											<a href="about-1.html">about us 1</a>
										</li>
										<li>
											<a href="about-2.html">about us 2</a>
										</li>
										<li>
											<a href="about-me.html">about me</a>
										</li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a href="#" data-toggle="dropdown" >our team</a>
									<ul class="dropdown-menu">
										<li>
											<a href="team-1.html">team 1</a>
										</li>
										<li>
											<a href="team-2.html">team 2</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="testimonials.html">testimonials</a>
								</li>
								<li>
									<a href="faq.html">FAQS</a>
								</li>
							</ul>
						</li>
						<!-- li end -->
						<li class="has-dropdown">
							<a href="#" data-toggle="dropdown" >services</a>
							<ul class="dropdown-menu">
								<li class="dropdown-submenu">
									<a href="#" data-toggle="dropdown" >our services</a>
									<ul class="dropdown-menu">
										<li>
											<a href="services-1.html">service 1</a>
										</li>
										<li>
											<a href="services-2.html">service 2</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="services-single.html">single service</a>
								</li>
								<li>
									<a href="services-blocks.html">blocks</a>
								</li>
								<li>
									<a href="pricing.html">pricing</a>
								</li>
							</ul>
						</li>
						<!-- li end -->
						<li class="has-dropdown">
							<a href="#" data-toggle="dropdown" >projects</a>
							<ul class="dropdown-menu">
								<li class="dropdown-submenu">
									<a href="#" data-toggle="dropdown" >project grid</a>
									<ul class="dropdown-menu">
										<li>
											<a href="projects-grid-2col.html">2 column</a>
										</li>
										<li>
											<a href="projects-grid-3col.html">3 column</a>
										</li>
										<li>
											<a href="projects-grid-4col.html">4 column</a>
										</li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a href="#" data-toggle="dropdown" >project fullwidth</a>
									<ul class="dropdown-menu">
										<li>
											<a href="projects-fullwidth-2col.html">2 column</a>
										</li>
										<li>
											<a href="projects-fullwidth-3col.html">3 column</a>
										</li>
										<li>
											<a href="projects-fullwidth-4col.html">4 column</a>
										</li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a href="#" data-toggle="dropdown" >single project</a>
									<ul class="dropdown-menu">
										<li>
											<a href="project-single-1.html">single 1</a>
										</li>
										<li>
											<a href="project-single-2.html">single 2</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<!-- li end -->
						<li class="has-dropdown">
							<a href="#" data-toggle="dropdown" >features</a>
							<ul class="dropdown-menu">
								<li class="dropdown-submenu">
									<a href="#" data-toggle="dropdown" >pages</a>
									<ul class="dropdown-menu">
										<li>
											<a href="404.html">404</a>
										</li>
										<li>
											<a href="soon.html">coming soon</a>
										</li>
										<li>
											<a href="maintenance.html">maintenance</a>
										</li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a href="#" data-toggle="dropdown" >Headers</a>
									<ul class="mega-menu left">
										<li>
											<ul>
												<li>
													<a href="header-1.html">header 1</a>
												</li>
												<li>
													<a href="header-2.html">header 2</a>
												</li>
												<li>
													<a href="header-3.html">header 3</a>
												</li>
												<li>
													<a href="header-4.html">header 4</a>
												</li>
												<li>
													<a href="header-5.html">header 5</a>
												</li>
												<li>
													<a href="header-6.html">header 6</a>
												</li>
												<li>
													<a href="header-7.html">header 7</a>
												</li>
											</ul>
										</li>
										<li>
											<ul>
												<li>
													<a href="header-8.html">header 8</a>
												</li>
												<li>
													<a href="header-9.html">header 9</a>
												</li>
												<li>
													<a href="header-10.html">header 10</a>
												</li>
												<li>
													<a href="header-11.html">header 11</a>
												</li>
												<li>
													<a href="header-12.html">header 12</a>
												</li>
												<li>
													<a href="header-13.html">header 13</a>
												</li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a href="#" data-toggle="dropdown" >Footers</a>
									<ul class="dropdown-menu">
										<li>
											<a href="footer-1.html#footer">Footer 1</a>
										</li>
										<li>
											<a href="footer-2.html#footer">Footer 2</a>
										</li>
										<li>
											<a href="footer-3.html#footer">Footer 3</a>
										</li>
										<li>
											<a href="footer-4.html#footer">Footer 4</a>
										</li>
										<li>
											<a href="footer-5.html#footer">Footer 5</a>
										</li>
										<li>
											<a href="footer-6.html#footer">Footer 6</a>
										</li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a href="#" data-toggle="dropdown" >page title</a>
									<ul class="dropdown-menu">
										<li>
											<a href="elements-page-title-1.html">page title 1</a>
										</li>
										<li>
											<a href="elements-page-title-2.html">page title 2</a>
										</li>
										<li>
											<a href="elements-page-title-3.html">page title 3</a>
										</li>
										<li>
											<a href="elements-page-title-4.html">page title 4</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="elements-cta.html">call to action</a>
								</li>
								<li>
									<a href="elements-heading.html">heading</a>
								</li>
								<li>
									<a href="elements-shortcodes.html">shortcodes</a>
								</li>
								<li>
									<a href="elements-testimonials.html">testimonials</a>
								</li>
								<li>
									<a href="elements-typography.html">typogrpahy</a>
								</li>
								<li>
									<a href="elements-widget.html">widgets</a>
								</li>
							</ul>
						</li>
						<!-- li end -->
						<li class="has-dropdown">
							<a href="#" data-toggle="dropdown" >blog</a>
							<ul class="dropdown-menu">
								<li class="dropdown-submenu">
									<a href="#" data-toggle="dropdown" >grid</a>
									<ul class="dropdown-menu">
										<li>
											<a href="blog-grid-left-sidebar.html">left sidebar</a>
										</li>
										<li>
											<a href="blog-grid-right-sidebar.html">right sidebar</a>
										</li>
										<li>
											<a href="blog-grid-full-width.html">full width</a>
										</li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a href="#" data-toggle="dropdown" >standard</a>
									<ul class="dropdown-menu">
										<li>
											<a href="blog-standard-left-sidebar.html">left sidebar</a>
										</li>
										<li>
											<a href="blog-standard-right-sidebar.html">right sidebar</a>
										</li>
										<li>
											<a href="blog-standard-full-width.html">full width</a>
										</li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a href="#" data-toggle="dropdown" >single</a>
									<ul class="dropdown-menu left">
										<li>
											<a href="blog-single-left-sidebar.html">single left sidebar</a>
										</li>
										<li>
											<a href="blog-single-right-sidebar.html">single right sidebar</a>
										</li>
										<li>
											<a href="blog-single-full-width.html">single full width</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<!-- li end -->
						<li class="has-dropdown">
							<a href="#" data-toggle="dropdown">shop</a>
							<ul class="dropdown-menu">
								<li class="dropdown-submenu">
									<a href="#" data-toggle="dropdown" >shop products</a>
									<ul class="dropdown-menu left">
										<li>
											<a href="shop-right-sidebar.html">shop right sidebar</a>
										</li>
										<li>
											<a href="shop-left-sidebar.html">shop left sidebar</a>
										</li>
										<li>
											<a href="shop-full-width.html">shop fullwidth</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="shop-category.html">shop category</a>
								</li>
								<li>
									<a href="shop-single.html">shop single</a>
								</li>
								<li>
									<a href="shop-cart.html">shop cart</a>
								</li>
							</ul>
						</li>
						<!-- li end -->
						<li class="has-dropdown pull-left">
							<a href="#" data-toggle="dropdown" >contact</a>
							<ul class="dropdown-menu">
								<li>
									<a href="contact-1.html">contact 1</a>
								</li>
								<li>
									<a href="contact-2.html">contact 2</a>
								</li>
							</ul>
						</li>
						<!-- li end -->
					</ul>
					
					<!-- Mod-->
					<div class="module module-search pull-left">
						<div class="search-icon">
							<i class="fa fa-search"></i>
							<span class="title">search</span>
						</div>
						<div class="search-box">
							<form class="search-form">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Type Your Search Words">
									<span class="input-group-btn">
									<button class="btn" type="button"><i class="fa fa-search"></i></button>
									</span>
								</div>
								<!-- /input-group -->
							</form>
						</div>
					</div>
					<!-- .module-search-->
					<!-- .module-cart -->
					<div class="module module-cart pull-left toggle-module">
						<div class="cart-icon">
							<i class="fa fa-shopping-cart"></i>
							<span class="title">shop cart</span>
							<span class="cart-label">2</span>
						</div>
						<div class="cart-box">
							<div class="cart-overview">
								<ul class="list-unstyled">
									<li>
										<img class="img-responsive" src="assets/images/shop/thumb/1h.png" alt="product">
										<div class="product-meta">
											<h5 class="product-title">CST/Berger</h5>
											<p class="product-price">Price: $68.00 </p>
											<p class="product-quantity">Quantity: 1</p>
										</div>
										<a class="cancel" href="#">cancel</a>
									</li>
									<li>
										<img class="img-responsive" src="assets/images/shop/thumb/2h.png" alt="product">
										<div class="product-meta">
											<h5 class="product-title">Charger/Radio</h5>
											<p class="product-price">Price: $180.00 </p>
											<p class="product-quantity">Quantity: 1</p>
										</div>
										<a class="cancel" href="#">cancel</a>
									</li>
								</ul>
							</div>
							<div class="cart-total">
								<div class="total-desc">
									<h5>CART SUBTOTAL :</h5>
								</div>
								<div class="total-price">
									<h5>$248.00</h5>
								</div>
							</div>
							<div class="clearfix">
							</div>
							<div class="cart-control">
								<a class="btn btn-primary" href="#">view cart</a>
								<a class="btn btn-secondary pull-right" href="#">check out</a>
							</div>
						</div>
					</div>
					<!-- .module-cart end -->
					
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</div>
	</nav>
</header>
<script> 
jQuery(document).ready(function() {
 var HeaderID = "#navbar-spy",
        Body = $("body");
    if ($("header").has(HeaderID)) {
        Body.attr("data-spy", "scroll").attr("data-target", HeaderID);
        Body.scrollspy({
            target: HeaderID
        });
    };

    /* ------------------ 6.HEADER ------------------ */

    var $navAffix = $("nav");
    $navAffix.affix({
        offset: {
            top: 50/* Change offset form top */
        }
	});
});
</script>