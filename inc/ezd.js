/*
* Function that parses input fields
*/
jQuery(document).ready(function($) {
    //<script type="text/javascript" charset="utf-8">
      //$(window).load(function() {
    
      //});

      $('.midrow_block .mid_block_content .block_img img').each(function() {
        
        if ( ($(this).attr('alt')) == 'list' ) {
            $(this).wrap('<a class="hover_bucket" href="/updates/" />');

        } else {
            $(this).wrap('<a class="hover_bucket" href="#hotlink_items" />');

        }

      });

      $('#optimizer_front_blocks-1 .midrow h3').each(function() {
        var obj = $(this).html();
        //console.log(obj);
        if ( obj == 'Features' ) {
            $(this).wrap('<a class="hover_bucket" href="#hotlink_items" />');

        } else if ( obj == 'Benefits' ) {
            $(this).wrap('<a class="hover_bucket" href="#hotlink_items" />');

        } else if ( obj == 'Support' ) {
            $(this).wrap('<a class="hover_bucket" href="/updates/" />');
        }
        //console.log('here '+ $(this).val());
      });
   /* $('.gform_wrapper form').click(function() {
        
        var price = 0;
        var version = null;
        version = $('#input_2_10').attr('value');
        var users = null;
        users = $('#input_2_12').attr('value');

        if (version == 'std') {
            version = 'std';
            if (users == '5') {
                price = 79.00;
            } else if (users == '10') {
                price = 158.00;
            }


        } else if (version == 'pro') {
            version = 'pro';
            if (users == '5') {
                price = 199.00;
            } else if (users == '10') {
                price = 398.00;  
            }

        } else {

        }
        
        //console.log(version);
        //console.log(price);
        $('#finalprice').attr('value', '$'+price+'.00');
        $('#finalprice').text('$'+price+'.00');
        $('#input_2_14').attr('value', version);
        $('#input_2_13').attr('value', price);
       
       //return false;
    });*/

    /*$('.gform_wrapper form').submit(function() {
        
        var price = 0;
        var version = null;
        version = $('#input_2_10').attr('value');
        var users = null;
        users = $('#input_2_12').attr('value');

        if (version == 'std') {
            version = 'std';
            if (users == '5') {
                price = 79.00;
            } else if (users == '10') {
                price = 158.00;
            }


        } else if (version == 'pro') {
            version = 'pro';
            if (users == '5') {
                price = 199.00;
            } else if (users == '10') {
                price = 398.00;  
            }

        } else {

        }
        
        //console.log(version);
        //console.log(price);
        $('#finalprice').attr('value', price);
        $('#finalprice').text(price);
        $('#input_2_14').attr('value', version);
        $('#input_2_13').attr('value', price);
       
       //return false;
    });*/

}); //.ready