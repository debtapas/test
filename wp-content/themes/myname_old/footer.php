<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package my_name
 */

?>

<footer>
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-6 col-12">
                  <div class="footer_blog_section">
                     <img src="imgs/logo.png" alt="#" />
                     <p style="margin-top: 5px;">It is a long established fact that a reader will be distracted by the readable content..</p>
                  </div>
               </div>
               <div class="col-lg-2 col-md-6 col-12">
                  <div class="item">
                     <h4 class="text-uppercase">Navigation</h4>
                     <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Location</a></li>
                        <li><a href="#">Service</a></li>
                        <li><a href="#">Features</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-12">
                  <div class="item">
                     <h4 class="text-uppercase">Contact Info</h4>
                     <p><strong>Corporate Office Address:</strong></p>
                     <p><img src="imgs/phone_icon.png" alt="#" /> 1234 River Street New York, NY 36524</p>
                     <p><strong>Customer Service:</strong></p>
                     <p><img src="imgs/location.png" alt="#" /> 987 654 3210</p>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-12">
                  <div class="item">
                     <h4 class="text-uppercase">Discover</h4>
                     <ul>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">How It Works</a></li>
                        <li><a href="#">Subscribe</a></li>
                        <li><a href="#">Contact Us</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="copyright text-center">
            <p>Copyright 2019  Design by <a href="https://html.design">Free Html Templates</a></p>
         </div>
      </footer>
      <script>
         $(function () {
             
             'use strict';
             
             var winH = $(window).height();
             
             $('header').height(winH);  
             
             $('header .container > div').css('top', (winH / 2) - ( $('header .container > div').height() / 2));
             
             $('.navbar ul li a.search').on('click', function (e) {
                 e.preventDefault();
             });
             $('.navbar a.search').on('click', function () {
                 $('.navbar form').fadeToggle();
             });
             
             $('.navbar ul.navbar-nav li a').on('click', function (e) {
                 
                 var getAttr = $(this).attr('href');
                 
                 e.preventDefault();
                 $('html').animate({scrollTop: $(getAttr).offset().top}, 1000);
             });
         })
      </script>


<script>
/* Jquery Portfolio wall by Mohamed Abo El-Ghranek - fb.com/midoghranek no need to plugins */

$(document).ready(function(){

  $('.hidden').css('display','none');

  $( "#filter button" ).each(function() {

    $(this).on("click", function(){

         var filter = $(this).attr('class');         

      if ( $(this).attr('class') == 'all' ) {
         $('.hidden').contents().appendTo('#posts').hide().show('slow');
         $( "#filter button" ).removeClass('active');
         $(this).addClass('active');
         $("#filter button").attr("disabled", false);
         $(this).attr("disabled", true);
      }
      else {
         $('.post').appendTo('.hidden');
         $('.hidden').contents().appendTo('#posts').hide().show('slow');
         $('.post:not(.' + filter + ')').appendTo('.hidden').hide('slow');
         $( "#filter button" ).removeClass('active');
         $(this).addClass('active');
         $("#filter button").attr("disabled", false);
         $(this).attr("disabled", true);
      };
      
      });

  });

});
</script>

<?php wp_footer(); ?>

</body>
</html>
