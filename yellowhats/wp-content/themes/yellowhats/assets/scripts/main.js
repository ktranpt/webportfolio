/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  /*global $, jQuery */
/* Contents
// ------------------------------------------------>
	1.  Loading Screen
	2.  Mobile Menu
	3.  TOOLTIP
	4.  Background
	5.  NAVBAR SPY
	6.  HEADER AFFIX
	7.  Smoothly Scroll
	8.  TESTIMONIAL CAROUSEL
	9.  Counter Up
	10. COUNTDOWN DATE
	11. Ajax Mailchimp
	12. Ajax Campaignmonito
	13. Ajax Contact Form
	14. Ajax Quote Form
	15. Ajax POPUP Quote Form 
	16. Ajax POPUP Quote Form 2
	17. Ajax Header POPUP Quote Form
	18. MAGNIFIC POPUP
	19. PROJECTS FLITER / SHOP FLITER
	20. Shop Pricing Range
*/	
jQuery(document).ready(function() {
  "use strict";

  /* ------------------  1.Loading Screen ------------------ */

  $(window).on("load", function() {
      $(".preloader").fadeOut("slow");
      $(".preloader").remove();
  });

  var $img = $(".img-popup");
  $img.magnificPopup({
    type: "image"
});
  /* ------------------  2.Mobile Menu ------------------ */

  var $dropToggle = $("ul.dropdown-menu [data-toggle=dropdown]"),
      $module = $(".module");
  $dropToggle.on("click", function(event) {
      event.preventDefault();
      event.stopPropagation();
      $(this).parent().siblings().removeClass("open");
      $(this).parent().toggleClass("open");
  });
  $module.on("click", function() {
      $(this).toggleClass("toggle-module");
  });
  $module.find("input.form-control", ".btn", ".cancel").on("click", function(e) {
      e.stopPropagation();
  });

  /* ------------------  3.TOOLTIP ------------------ */

  var $tooltip = $("[data-toggle='tooltip']"),
      $modelQuote = $("#model-quote"),
      $modelQuote2 = $("#model-quote2");
  $tooltip.tooltip({
      container: "body"
  });
  $modelQuote.appendTo("body");
  $modelQuote2.appendTo("body");

  /* ------------------  4.Background ------------------ */

  var $bgSection = $(".bg-section");
  var $bgPattern = $(".bg-pattern");
  var $colBg = $(".col-bg");

  $bgSection.each(function() {
      var bgSrc = $(this).children("img").attr("src");
      var bgUrl = 'url(' + bgSrc + ')';
      $(this).parent().css("backgroundImage", bgUrl);
      $(this).parent().addClass("bg-section");
      $(this).remove();
  });

  $bgPattern.each(function() {
      var bgSrc = $(this).children("img").attr("src");
      var bgUrl = 'url(' + bgSrc + ')';
      $(this).parent().css("backgroundImage", bgUrl);
      $(this).parent().addClass("bg-pattern");
      $(this).remove();
  });

  $colBg.each(function() {
      var bgSrc = $(this).children("img").attr("src");
      var bgUrl = 'url(' + bgSrc + ')';
      $(this).parent().css("backgroundImage", bgUrl);
      $(this).parent().addClass("col-bg");
      $(this).remove();
  });

  /* ------------------  5.NAVBAR SPY ------------------ */

  var HeaderID = "#navbar-spy",
      Body = $("body");
  if ($("header").has(HeaderID)) {
      Body.attr("data-spy", "scroll").attr("data-target", HeaderID);
      Body.scrollspy({
          target: HeaderID
      });
  };

  /* ------------------ 6.HEADER ------------------ */

  

  /* ------------------  7.Smoothly Scroll  ------------------ */

  var aScroll = $('a[data-scroll="scrollTo"]');
  aScroll.on('click', function(event) {
      var target = $($(this).attr('href'));

      if (target.length) {
          event.preventDefault();
          $('html, body').animate({
              scrollTop: target.offset().top
          }, 1000);
      }
  });

  /* ------------------ 8.TESTIMONIAL CAROUSEL ------------------ */

 

  /* ------------------  9.Counter Up ------------------ */

  var counter = $(".counter");
  counter.counterUp({
      delay: 10,
      time: 1000
  });

  /* ------------------ 10.COUNTDOWN DATE ------------------ */

  var newDate = new Date(2016, 10, 31),
      $countDown = $("#countdown");
  $countDown.countdown({
      until: newDate,
      format: "smSMHD"
  });

  /* ------------------  11.Ajax Mailchimp  ------------------ */

  $('.mailchimp').ajaxChimp({
      url: "http://wplly.us5.list-manage.com/subscribe/post?u=91b69df995c1c90e1de2f6497&amp;id=aa0f2ab5fa", //Replace with your own mailchimp Campaigns URL.
      callback: chimpCallback
  });

  function chimpCallback(resp) {
      if (resp.result === 'success') {
          $('.subscribe-alert').html('<h5 class="alert alert-success">' + resp.msg + '</h5>').fadeIn(1000);
          //$('.subscribe-alert').delay(6000).fadeOut();
      } else if (resp.result === 'error') {
          $('.subscribe-alert').html('<h5 class="alert alert-danger">' + resp.msg + '</h5>').fadeIn(1000);
      }
  }

  /* ------------------  12.Ajax Campaignmonitor  ------------------ */

  $('#campaignmonitor').submit(function(e) {
      e.preventDefault();
      $.getJSON(
          this.action + "?callback=?",
          $(this).serialize(),
          function(data) {
              if (data.Status === 400) {
                  alert("Error: " + data.Message);
              } else { // 200
                  alert("Success: " + data.Message);
              }
          });
  });

  /* ------------------  13.Ajax Contact Form  ------------------ */

  var contactForm = $("#contact-form");
  var contactResult = $('#contact-result');
  contactForm.validate({
      debug: false,
      submitHandler: function(contactForm) {
          $(contactResult, contactForm).html('Please Wait...');
          $.ajax({
              type: "POST",
              url: "assets/php/sendmail.php",
              data: $(contactForm).serialize(),
              timeout: 20000,
              success: function(msg) {
                  $(contactResult, contactForm).html('<div class="alert alert-success" role="alert"><strong>Thank you. We will contact you shortly.</strong></div>').delay(3000).fadeOut(2000);
              },
              error: $('.thanks').show()
          });
          return false;
      }
  });

  /* ------------------  14.Ajax Quote Form  ------------------ */

  var quoteForm = $("#quote-form");
  var quoteResult = $('#quote-result');
  quoteForm.validate({
      debug: false,
      submitHandler: function(quoteForm) {
          $(quoteResult, quoteForm).html('Please Wait...');
          $.ajax({
              type: "POST",
              url: "assets/php/sendquote.php",
              data: $(quoteForm).serialize(),
              timeout: 20000,
              success: function(msg) {
                  $(quoteResult, quoteForm).html('<div class="alert alert-success" role="alert"><strong>Thank you. We will contact you shortly.</strong></div>').delay(3000).fadeOut(2000);
              },
              error: $('.thanks').show()
          });
          return false;
      }
  });

  /* ------------------  15.Ajax POPUP Quote Form  ------------------ */

  var popQuoteForm = $("#pop-quote-form");
  var popQuoteResult = $('#pop-quote-result');
  popQuoteForm.validate({
      debug: false,
      submitHandler: function(popQuoteForm) {
          $(popQuoteResult, popQuoteForm).html('Please Wait...');
          $.ajax({
              type: "POST",
              url: "assets/php/sendpopquote.php",
              data: $(popQuoteForm).serialize(),
              timeout: 20000,
              success: function(msg) {
                  $(popQuoteForm).fadeOut((500, function() {
                      $(popQuoteForm).html('<div class="alert alert-success text-center" role="alert"><strong>Thank you.<br/> We will contact you shortly.</strong></div>').fadeIn();
                  }));
              },
              error: $('.thanks').show()
          });
          return false;
      }
  });

  /* ------------------  16.Ajax POPUP Quote Form 2 ------------------ */

  var popQuoteForm2 = $("#pop-quote-form2");
  var popQuoteResult2 = $('#pop-quote-result2');
  popQuoteForm2.validate({
      debug: false,
      submitHandler: function(popQuoteForm2) {
          $(popQuoteResult2, popQuoteForm2).html('Please Wait...');
          $.ajax({
              type: "POST",
              url: "assets/php/sendpopquote2.php",
              data: $(popQuoteForm2).serialize(),
              timeout: 20000,
              success: function(msg) {
                  $(popQuoteForm2).fadeOut((500, function() {
                      $(popQuoteForm2).html('<div class="alert alert-success text-center" role="alert"><strong>Thank you.<br/> We will contact you shortly.</strong></div>').fadeIn();
                  }));
              },
              error: $('.thanks').show()
          });
          return false;
      }
  });

  /* ------------------  17.Ajax Header POPUP Quote Form  ------------------ */

  var headQuoteForm = $("#head-quote-form");
  var headQuoteResult = $('#head-quote-result');
  headQuoteForm.validate({
      debug: false,
      submitHandler: function(headQuoteForm) {
          $(headQuoteResult, headQuoteForm).html('Please Wait...');
          $.ajax({
              type: "POST",
              url: "assets/php/sendheadquote.php",
              data: $(headQuoteForm).serialize(),
              timeout: 20000,
              success: function(msg) {
                  $(headQuoteForm).fadeOut((500, function() {
                      $(headQuoteForm).html('<div class="alert alert-success text-center" role="alert"><strong>Thank you.<br/> We will contact you shortly.</strong></div>').fadeIn();
                  }));
              },
              error: $('.thanks').show()
          });
          return false;
      }
  });

  /* ------------------ 18.MAGNIFIC POPUP ------------------ */

  jQuery(document).ready(function() {
	
});

  /* ------------------ 19.PROJECTS FLITER ------------------ */

  var $ProjectsFilter = $(".projects-filter"),
      ProjectLength = $ProjectsFilter.length,
      $shopFilter = $(".shop-filter"),
      shopLength = $shopFilter.length,
      $projectsAll = $("#projects-all"),
      $shopAll = $("#shop-all");

  // init Isotope For Projects
  $ProjectsFilter.find("a").click(function(e) {
      e.preventDefault();
      $ProjectsFilter.find("a.active-filter").removeClass("active-filter");
      $(this).addClass("active-filter");
  });

  if (ProjectLength > 0) {
      $projectsAll.imagesLoaded().progress(function() {
          $projectsAll.isotope({
              filter: "*",
              animationOptions: {
                  duration: 750,
                  itemSelector: ".project-item",
                  easing: "linear",
                  queue: false,
              }
          });
      });
  }
  $ProjectsFilter.find("a").click(function(e) {
      e.preventDefault();
      var $selector = $(this).attr("data-filter");
      $projectsAll.imagesLoaded().progress(function() {
          $projectsAll.isotope({
              filter: $selector,
              animationOptions: {
                  duration: 750,
                  itemSelector: ".project-item",
                  easing: "linear",
                  queue: false,
              }
          });
          return false;
      });
  });

  // init Isotope For Shop
  $shopFilter.find("a").click(function(e) {
      e.preventDefault();
      $shopFilter.find("a.active-filter").removeClass("active-filter");
      $(this).addClass("active-filter");
  });
  if (shopLength > 0) {
      $shopAll.imagesLoaded().progress(function() {
          $shopAll.isotope({
              filter: "*",
              animationOptions: {
                  duration: 750,
                  itemSelector: ".product-item",
                  easing: "linear",
                  queue: false,
              }
          });
      });
  }
  $shopFilter.find("a").click(function(e) {
      e.preventDefault();
      var $selector = $(this).attr("data-filter");
      $shopAll.imagesLoaded().progress(function() {
          $shopAll.isotope({
              filter: $selector,
              animationOptions: {
                  duration: 750,
                  itemSelector: ".product-item",
                  easing: "linear",
                  queue: false,
              }
          });
          return false;
      });
  });

  /* ------------------ 20.Shop Pricing Range ------------------ */

  var $sliderRange = $("#slider-range"),
      $sliderAmount = $("#amount");
  $sliderRange.slider({
      range: true,
      min: 0,
      max: 500,
      values: [50, 300],
      slide: function(event, ui) {
          $sliderAmount.val("$" + ui.values[0] + " - $" + ui.values[1]);
      }
  });
  $sliderAmount.val("$" + $sliderRange.slider("values", 0) + " - $" + $sliderRange.slider("values", 1));
});
})(jQuery); // Fully reference jQuery after this point.
