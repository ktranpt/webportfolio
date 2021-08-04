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

  // Load Events
  $(document).ready(UTIL.loadEvents);
	
	WebFontConfig = { 
  google: {
    families: ['Lato:100, 300, 700, 900', 'sans-serif'],
    text: 'abcdefghijklmnopqrstuvwxyz!'
  }
};

	

	$('button.open-prod').click(function(){
//		console.log('open');
		$(this).parents('.product').siblings('.form-drop').slideToggle(); 
	})
  $('.product-addon-campaign-name').after('<div class="spacer"></div><div class="form-content"><h3>ANALYTICS</h3><span>Tell us a bit more about this ad, to help improve the quality of analytics available to you.</span></div>');
  $('.product-addon-campaign-name').first().after('<div class="spacer"></div><div class="form-content product-addon-link"><h3>LINKS</h3><span class="linksy">Do you want to track when readers click on any links in this email? <label class="addon-name"></label><div class="addon-description"><p>description here</p></div><input id="link_1" type="radio" value="Yes" name="links_more">Yes<input type="radio" value="No"  name="links_more" checked>No</span></div>');
  $('.product-addon-link-address').after('<div class="spacer"></div><div class="form-content"><h3>ANALYTICS</h3><span>Tell us a bit more about this ad, to help improve the quality of analytics available to you.</span></div>');
  

    $('button.open-prod').click(function(){
      $('.quantity').hide()
    });
  $('input[name=links_more]').bind('click',function(event){
      console.log(this.value);
      if(this.value == 'Yes'){

        $('.auto_input').remove();
        $('.product-addon-link').after('<div class="auto_input"><div id="p_scents"><div class="product-addon items product-addon-campaign-name"><label class="addon-name">Link  </label><div class="input-area input-link"><p class="form-row form-row-wide addon-wrap-308-campaign-name-0"></p><input type="text" class="input-text input-link" id="input-link-"></div><div class="clear"></div><a style="color:black;" href="#" id="remScnt"></a></div></div><p><a class="clone" href="#" id="addScnt">+ Add another tracked link</a></p></div>')
        ;
        $('.auto_input').slideDown();
        // $(this).attr('disabled', true);
      }else{
        $('.auto_input').slideUp();
        $('.auto_input').remove();
        // $('input[disabled=disabled]').attr('disabled', false);
      }
    
  });
  // $('label.addon-name').on('mouseover', function(){
  //   //		console.log('well');
  //       $(this).siblings('.addon-description').show();
  //     });
  //     $('label.addon-name').on('mouseleave', function(){
  //   //		console.log('well');
  //       $(this).siblings('.addon-description').hide();
  //     });
  //     $('label').on('mouseover', function(){
  //   //		console.log('well');
  //       $(this).siblings('.addon-description').show();
  //     });
  //     $('label').on('mouseleave', function(){
  //   //		console.log('well');
  //       $(this).siblings('.addon-description').hide();
  //     });
// var product_n = "2";
// $('#show_next').bind('click', function(){
//   var product_n_class = '.product-addon-link-'+product_n;
//   var product_n_name_class = '.product-addon-link-'+product_n+'-name';
//   $(product_n_class).slideDown();
//   $(product_n_name_class).slideDown();
//   product_n+1;
// });
$(function() {
  var scntDiv = $('#p_scents'); 
  var i = $('#p_scents p').size() + 1;
  
  $('#addScnt').live('click', function() {
    console.log('log');
          $('#p_scents').append('<div class=" product-addon items product-addon-campaign-name"><label class="addon-name">Link  </label><div class="input-area"><p class="form-row form-row-wide addon-wrap-308-campaign-name-0"></p><input type="text" class="input-text input-link id="input-link-'+i+'"></div><div class="clear"></div><a style="color:black;" href="#" id="remScnt"></a></div>');
          i++;
          return false;
  });
  
  $('#remScnt').live('click', function() { 
          // if( i > 2 ) {
                  $(this).parents('.items').remove();
          //         i--;
          // }
          return false;
  });

  

});

$('.product-addon-add-auto-top-up').hide();  

// $('input[name*=addon-55-add-auto-top-up]').on('click', function(){

//     if($(this).attr('checked') != undefined){
//       $(this).data("price", 1);
//     }else{
//       $(this).data("price", 0 );
//     }
// })

var new_form;
var dialog;
var dialog_2;
$(document).on('click','.single_add_to_cart_button',function(e){
    
  e.preventDefault();
  
      console.log($(this));	

      // $(this).prop('disabled',true);

      // var butt = $(this);
      
      var form = new_form = $(this).parents('form.variations_form').first();
  
      var status = true;
  
  
      form.find(".input-text.addon.addon-custom").each(function(){
  
        console.log($(this));
        var val = $(this).val();
  
        if(val == "" && $(this).is(':visible') == true){
          $(this).addClass("wrong");
          status = false;
        }else{
          $(this).removeClass("wrong");
        }
      }).promise().done(function(){
  
  
        console.log("DONE ***" + status);
  
        form.find(".addon.addon-select").each(function(){
  
          var select = $(this).val();
          console.log("DONE ***" + select);
            if(select == "" && $(this).is(':visible') == true){
              $(this).addClass('wrong');
              status = false;
            }else{
              $(this).removeClass('wrong');
            }
  
        }).promise().done(function(){

          

          
          var asd = "";
          var real = $('input[name*=addon-55-link-group-]');
  
          form.find(".input-text.input-link").each(function() {
        
            var link = $(this).val();
  
            console.log("DONE ***" + link);
            if(link == "" && $(this).is(':visible') == true){
              $(this).addClass('wrong');
              status = false;
            }else{
              $(this).removeClass('wrong');
              asd += link +', ' ;
            }
            
            
        }).promise().done(function(){
         
            real.val(asd);

            var link_address = form.find('input[name*=addon-308-link-address-]').first();
            
            var link_adress_value = link_address.val();

            console.log("HHHHHHHHEHEHEEHHEEH" + link_address.val());

            // var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            
            var re = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;

            
            if(link_adress_value != undefined){

                  if(re.test(link_adress_value) == false){
                    status = false;
                    link_address.addClass('wrong');
                  }else{
                    link_address.removeClass('wrong');
                    status = true;
                  }

            }

            

          console.log("DONE ***" + real.val());
  
          if(status == false){
            return false;
          }else{
              // var name = $("#name").val();

              // var product_id = form.data("product_id");
              // var product_variations  = form.data("product_variations");
              form.children('button[type="submit"]').first().prop("disable",true);
            // $.ajax({ 
            //   data: form.serialize(),
            //   type: 'post',
            //   url: form.attr('action')	
            // }).done(function(response){

            //   $.ajax({
            //     data: {'action' : 'mw_number_items'},
            //     url: woocommerce_addons_params.ajax_url
            //   }).done(function(response){

            //     form.children('button[type="submit"]').first().prop("disable",false);


            //     var total = response;

            //     $('.cart-items-number').hide().html(total).fadeIn();

                if(!alertify.topup){
                  //define a new dialog
                  dialog = alertify.dialog('topup',function factory(){
                    return{
                      main:function(message){
                        this.message = message;
                        this.setHeader('');
                      },
                      setup:function(){
                          return { 
                            // buttons:[{text: "cool!", key:27/*Esc*/}],
                            // focus: { element:0 }
                          };
                      },
                      prepare:function(){
                        this.setContent(this.message);
                      },
                      build:function(){
                        this.elements.root.classList.add("topups");
                      }
                  }}); 
                }

                
            //     $.ajax({
            //       data: {'action' : 'mw_last_item_id'},
            //       url: woocommerce_addons_params.ajax_url
            //     }).done(function(response){
            //           console.log(response);

                      alertify.topup("<div class='alertify-basket'><div class='blue'>Never miss a customer!</div><div class='normal'>Select Auto Top-Up to automatically boost the number of credits tracked by an additional <strong>25%</strong> whenever purchased limit is reached.</div><div class='normal'>Now you’ll never miss a moment of analytics!</div><div class='button-basket'><a href='#' class='add-top-up light' data-top=1>Yes please, add<br>Auto Top-Up</a><a href='#' class='add-top-up dark' data-top=0>No Thanks</a></div></div>");
              if(!alertify.check_or){
                //define a new dialog
                alertify.dialog('check_or',function factory(){
                  return{
                    main:function(message){
                      this.message = message;
                      this.setHeader('');
                    },
                    setup:function(){
                        return { 
                          // buttons:[{text: "cool!", key:27/*Esc*/}],
                          // focus: { element:0 }
                        };
                    },
                    prepare:function(){
                      this.setContent(this.message);
                    },
                    build:function(){
                      this.elements.root.classList.add("check_or_continue");
                    }
                }}); 
              }
                // })

              
            
              
            // window.showConfirm = function(){
            //   alertify.topup().close();
            //   alertify.check_or("<div class='alertify-basket'><div class='blue'>Item added to your basket!</div><div class='normal'>You have <strong>"+total+"</strong> item in your basket.</div><div class='button-basket'><a href='"+base_url_new+"/pricing' class='dark'>Continue Shopping</a><a href='"+base_url_new+"/checkout' class='light'>Checkout</a></div></div>");
            // }
            // });
               
                
  
            // }).fail(function(response){
  
            // });
          }
        });
        });
        
      });
});

$(document).on("click",".add-top-up", function(){

  console.log($(this));

  console.log(new_form.find(".addon-checkbox").html());

  if(parseInt($(this).data("top")) == 1){
            new_form.find(".addon-checkbox").first().attr('checked',true);

  }else{
    new_form.find(".addon-checkbox").first().attr('checked',false);

  }
  

  alertify.topup().close();
  $.ajax({ 
              data: new_form.serialize(),
              type: 'post',
              url: new_form.attr('action')	
            }).done(function(response){

              $.ajax({
                    data: {'action' : 'mw_number_items'},
                    url: woocommerce_addons_params.ajax_url
                  }).done(function(response){
    
                    // form.children('button[type="submit"]').first().prop("disable",false);
    
    
                    var total = response;
    
                    $('.cart-items-number').hide().html(total).fadeIn();

                    
                    alertify.check_or("<div class='alertify-basket'><div class='blue'>Item added to your basket!</div><div class='normal'>You have <strong>"+total+"</strong> item in your basket.</div><div class='button-basket'><a href='"+base_url_new+"/pricing' class='dark'>Continue Shopping</a><a href='"+base_url_new+"/checkout' class='light'>Checkout</a></div></div>");

                    // window.showConfirm = function(){
                     
                    // }
            // });
              })
                

            })

      // $.ajax({
      //   data: {'action' : 'mw_update_add_ons'},
      //   url: woocommerce_addons_params.ajax_url,
      //   type:'post'
      // }).done(function(response){
      
      
      // })


})


 $("#send-support").live('click',function(){
      console.log("All good!");
      var name = $("#name").val();
      var email = $("#email_support").val();
      var subject = $("#subject").val();
      var message = $("#message").val();

      if(name == ''){
        $("#name").addClass('wrong');
        return;
      }else{
        $("#name").removeClass('wrong');
      }

      if(email == ''){
        $("#email_support").addClass('wrong');
        return;
      }else{
        $("#email_support").removeClass('wrong');
      }
      
      if(subject == ''){
        $("#subject").addClass('wrong');
        return;
      }else{
        $("#subject").removeClass('wrong');
      }
      
      if(message == ''){
        $("#message").addClass('wrong');
        return;
      }else{
        $("#message").removeClass('wrong');
      }

      $.ajax({  type: 'post',
                data: {'action' : 'mw_support_add', "name":name, "email":email, "subject":subject, "message":message},  
                url: base_url_new +  '/wp-admin/admin-ajax.php'
              }).done(function(response){

                $("#name").val('');
                $("#email_support").val('');
                $("#subject").val('');
                $("#message").val('');

                $('#support').modal('toggle');
                if(!alertify.thank){
                  //define a new dialog
                  alertify.dialog('thank',function factory(){
                    return{
                      main:function(message){
                        this.message = message;
                        this.setHeader('<h3>THANKS!</h3>');
                      },
                      setup:function(){
                          return { 
                            // buttons:[{text: "cool!", key:27/*Esc*/}],
                            // focus: { element:0 }
                            header:[
                              {attrs:{id:'test'}}
                            ]
                          };
                      },
                      prepare:function(){
                        this.setContent(this.message);
                      },
                      build:function(){
                        this.elements.root.classList.add("thanks");
                      }
                  }}); 
                }
                alertify.thank("We have received your query and will respond within 48 hours");
              });
    })

    // $('.buy_now').click(function(){
    //   var anchor = $(this);
    //   anchor.addClass('disabled');
    //   var product_id = anchor.data('product-id');
    //   var variation_id = anchor.data('variation-id');
    //   var attribute_plan = $(this).data('attribute-plan');
    //   var product_name = $(this).data('product-name');
    //   var ajax_url = base_url_new + "/product/"+product_name+"/";
    //   $.ajax({
    //     data: {
    //       // 'action' : 'mw_subcribe_add_to_card',
    //       'variation_id' : variation_id, 
    //       'product_id' : product_id, 
    //       'add-to-cart' : product_id,
    //       'quantity' : 1,
    //       'attribute_how-many-clicks-do-you-want-to-track' : attribute_plan},
    //     url: ajax_url,
    //     type:"post"
    //     }).done(function(response){
  
    //     $.ajax({
    //               data: {'action' : 'mw_number_items'},
    //               url: base_url_new +  '/wp-admin/admin-ajax.php'
    //             }).done(function(response){
          
    //       var total = response;
    //       anchor.removeClass('disabled');
    //       $('.cart-items-number').hide().html(total).fadeIn();
  
    //       if(!alertify.check_or){
    //               //define a new dialog
    //               alertify.dialog('check_or',function factory(){
    //                 return{
    //                   main:function(message){
    //                     this.message = message;
    //                     this.setHeader('');
    //                   },
    //                   setup:function(){
    //                       return { 
    //                         // buttons:[{text: "cool!", key:27/*Esc*/}],
    //                         // focus: { element:0 }
    //                       };
    //                   },
    //                   prepare:function(){
    //                     this.setContent(this.message);
    //                   },
    //                   build:function(){
    //                     this.elements.root.classList.add("check_or_continue");
    //                   }
    //               }}); 
    //       }
          
    //       window.showConfirm = function(){
    //         // alertify.topup().close();
    //         alertify.check_or("<div class='alertify-basket'><div class='blue'>Item added to your basket!</div><div class='normal'>You have <strong>"+total+"</strong> item in your basket.</div><div class='button-basket'><a href='' class='dark'>Continue Shopping</a><a href='/cart' class='light'>Checkout</a></div></div>");
    //             }
    //     })
          
    //     });
    // })

    $('.submit_btn').click(function(){
      // console.log('Subscribe');

      var email = $(this).parents('.subscribe').find('input').first();

      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if(re.test(email.val()) == true){
          var e_val = email.val();
              $.ajax({  type: 'post',
                    data: {'action' : 'mw_send_subscribe', "email":e_val },  
                    url: base_url_new +  '/wp-admin/admin-ajax.php'
                  }).done(function(response){
            
                      if(!alertify.thank){
                        //define a new dialog
                        alertify.dialog('thank',function factory(){
                          return{
                          main:function(message){
                            this.message = message;
                            this.setHeader('<h4>THANKS</h4>');
                          },
                          setup:function(){
                            return { 
                              // buttons:[{text: "cool!", key:27/*Esc*/}],
                              // focus: { element:0 }
                              header:[
                              {attrs:{id:'test'}}
                              ]
                            };
                          },
                          prepare:function(){
                            this.setContent(this.message);
                          },
                          build:function(){
                            this.elements.root.classList.add("update-user-message");
                          }
                        }}); 
                        }
                        alertify.thank("You are now signed up to our newsletter");
                        
                        email.val("");
                 })

      }else{

        if(!alertify.thank){
          //define a new dialog
          alertify.dialog('thank',function factory(){
            return{
            main:function(message){
              this.message = message;
              this.setHeader('<h4>THANKS</h4>');
            },
            setup:function(){
              return { 
                // buttons:[{text: "cool!", key:27/*Esc*/}],
                // focus: { element:0 }
                header:[
                {attrs:{id:'test'}}
                ]
              };
            },
            prepare:function(){
              this.setContent(this.message);
            },
            build:function(){
              this.elements.root.classList.add("update-user-message");
            }
          }}); 
          }
          alertify.thank("The email is not valid");
      }
      console.log(email.val());
})



    
    
})(jQuery); // Fully reference jQuery after this point. 

