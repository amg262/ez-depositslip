/*
* Function that parses input fields
*/
jQuery(document).ready(function($) {
    //<script type="text/javascript" charset="utf-8">
      //$(window).load(function() {
    
      //});
      var i, j;
      var s, t;
      var tab_id;
      s = true;
      t = true;
      i = 0;
      j = 0;
      
     
      $('#screen200').click(function(){
       
          if (s == true) {
          $('#screen200').attr('src', '/wp-content/themes/ez-depositslip/20/06/screen200.png');
          $('#screens-wrap').css('display', 'none');
          $('#show').html('<br>');
          tab_id = 'ui-id-9';
          s = false;

          $('#table200').attr('src', '/wp-content/themes/ez-depositslip/inc/06/table200_h.png');
          $('#tables-wrap').css('display', 'block');
          $('#show-odd').text('Tables');
          t = false;

        } else {
          $('#screen200').attr('src', '/wp-content/themes/ez-depositslip/inc/06/screen200_h.png');
          $('#screens-wrap').css('display', 'block');
          $('#show').text('Screens');
          tab_id = 'ui-id-1';
          s = true;

          $('#table200').attr('src', '/wp-content/themes/ez-depositslip/inc/06/table200.png');
          $('#tables-wrap').css('display', 'none');
          $('#show-odd').html('<br>');
          t = true;
        }
      });
    

      $('#table200').click(function(){
        if (t == true) {
          

          $('#table200').attr('src', '/wp-content/themes/ez-depositslip/inc/06/table200_h.png');
          $('#tables-wrap').css('display', 'block');
          $('#show-odd').text('Tables');
          t = false;
          tab_id = 'ui-id-9';
          $('#screen200').attr('src', '/wp-content/themes/ez-depositslip/inc/06/screen200.png');
          $('#screens-wrap').css('display', 'none');
          $('#show').html('<br>');
          s = false;
        } else {

          $('#table200').attr('src', '/wp-content/themes/ez-depositslip/inc/06/table200.png');
          $('#tables-wrap').css('display', 'none');
          $('#show-odd').html('<br>');
          t = true;
          tab_id = 'ui-id-1';

          $('#screen200').attr('src', '/wp-content/themes/ez-depositslip/inc/06/screen200_h.png');
          $('#screens-wrap').css('display', 'block');
          $('#show').text('Screens');
          s = true;
          
        }
      });

      if (window.location.href.indexOf('#') > -1) {
        $('#screen200').trigger('click');
 // $("html, body").animate({ scrollTop: 0 }, "slow");
     }
          
  
      
      /*$('#show-screens').click(function(){
        if (i == 0) {
           // alert('hi');
           //$(this).attr('value', 'true');

           $('#screens-wrap').css('display', 'none');
           i++;

        } else if (i > 0) {

            //$(this).attr('value', 'false');
           $('#screens-wrap').css('display', 'block');
           i--;
        }

                //console.log('1');

      });

      $('#show-tables').click(function(){
       if (j == 0) {
           // alert('hi');
           //$(this).attr('value', 'true');

           $('#tables-wrap').css('display', 'none');
           j++;

        } else if (j > 0) {

            //$(this).attr('value', 'false');
           $('#tables-wrap').css('display', 'block');
           j--;
        }
      });*/

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