(function($){
  'use strict';
  
    jQuery(document).ready(function($){
     // Defining a function to set size for #hero 
        /* ========== Background image height equal to the browser height.==========*/
      $('header').css({ 'height': $(window).height() });
         $(window).on('resize', function() {
            $('header').css({ 'height': $(window).height() });
         });

    });


    /*------Contact form-----*/
    $('#contactform').bootstrapValidator({
      container: 'tooltip',
      feedbackIcons: {
        valid: 'fa fa-check',
        invalid: 'fa fa-times',
        validating: 'fa fa-refresh'
      },
      fields: {            
        fullName: {
          validators: {
            notEmpty: {
              message: 'Name is required. Please enter name.'
            }
          }
        },
        phoneNo: {
          validators: {
            notEmpty: {
              message: 'Phone is required. Please enter phone number.'
            }
          }
        },
        email: {
          validators: {
            notEmpty: {
              message: 'Email is required. Please enter email.'
            },
            email: {
              message: 'Please enter a correct email address.'
            }
          }
        },
        zipCode: {
          validators: {
            notEmpty: {
              message: 'ZIP Code Is required Please Enter Valid ZIP Code.'
            }                    
          }
        }
      }
    })
    .on('success.form.bv', function(e) {
            
      var data = $('#contactform').serialize();
      
      $.ajax({
          type: "POST",
          url: "php/process.php",         
          data: $('#contactform').serialize(),
          success: function(msg){           
            $('.form-message').html(msg);
            $('.form-message').show();
            submitButton.removeAttr("disabled");
            resetForm($('#contactform'));           
          },
          error: function(msg){           
            $('.form-message').html(msg);
            $('.form-message').show();
            submitButton.removeAttr("disabled");
            resetForm($('#contactform'));
          }
       });
       
      return false;
    });
    function resetForm($form) {
      $form.find('input:text, input:password, input, input:file, select, textarea').val('');
      $form.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
      $form.find('.form-control-feedback').css('display', 'none');
    }



    // Smooth scroll to anchor links
    $(function() {
      $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    });


})(jQuery);