<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package my_name
 */

get_header();

?>
  <div id="home" class="slider">
         <div id="main_slider" class="carousel slide" data-ride="carousel">

            <?php
             /**
             * Setup query to show the ‘services’ post type with ‘8’ posts.
             * Output the title with an excerpt.
             */

               $args = array(  
                  'post_type' => 'Slide',
                  'post_status' => 'publish',
                  'posts_per_page' => 8, 
                  'orderby' => 'title', 
                  'order' => 'DSC',
               );

               $loop = new WP_Query( $args );    
            ?>  

            <ol class="carousel-indicators">
               <li data-target="#main_slider" data-slide-to="0" class="active"></li>
               <li data-target="#main_slider" data-slide-to="1"></li>
               <li data-target="#main_slider" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">             
              
                   <?php    
                   $i = 0;
              while ( $loop->have_posts() ) : $loop->the_post();
                     $i++;
                  ?>
                    <div class="carousel-item
                        <?php echo ($i == 1 ? 'active' : ''); ?>">

                         <!--  <img class="d-block w-100" <?php// echo the_post_thumbnail(); ?> alt="slider_img"> -->
                          <?php 
                            the_post_thumbnail('full', ['class' => 'd-block w-100', 'title' => 'Feature image']);
                          ?>
                          <div class="ovarlay_slide_cont">
                             <h2><?php the_title(); ?></h2>


                             <h4><?php echo slider_titles_filelds_get_meta( 'slider_titles_filelds_slide_subtitle' ) ; ?></h4>
                             <p><?php the_content(); ?></p>
                             <a class="blue_bt" href="><?php echo slider_titles_filelds_get_meta( 'slider_titles_filelds_button_url' ) ; ?>"><?php echo slider_titles_filelds_get_meta( 'slider_titles_filelds_button_name' ); ?></a>
                          </div>
                       </div>
                  <?php
              endwhile;
              wp_reset_postdata(); 
                ?>

              <!--  <div class="carousel-item">
                  <img class="d-block w-100" src="<?php //echo get_template_directory_uri() . '/imgs/slide1.jpg'; ?>" alt="slider_img">
                  <div class="ovarlay_slide_cont">
                     <h2>We love working</h2>
                     <h4>Maintenance service</h4>
                     <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years</p>
                     <a class="blue_bt" href="#">See Our Service</a>
                  </div>
               </div> -->
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <img src="<?php echo get_template_directory_uri() . '/imgs/left.png'; ?>" alt="#" />
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <img src="<?php echo get_template_directory_uri() . '/imgs/right.png' ; ?>" alt="#" />
            </a>
         </div>
      </div>
      <div id="about" class="about_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <h4>ABOUT BLUESKY</h4>
                  <h3 style="text-transform: none !important">We Build for Your Comfort</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
               </div>
               <div class="col-md-6 offset-md-1">
                  <div class="full text_align_center">
                     <img class="img-responsive" src="<?php echo get_template_directory_uri() . '/imgs/about.png'; ?>" alt="#" />
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="hiw" class="hiw_section layout_padding" style="background: #1a2428;">
         <div class="container">
            <div class="row">
               <div class="col-md-7">
                  <h3 class="white_font">How it's Works</h3>
                  <p class="white_font">adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
               </div>
               <div class="col-md-5">
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">                  
                  <img class="margin_top_30 img-responsive" src="<?php echo get_template_directory_uri() . '/imgs/blog1.jpg'; ?>" alt="#" />
                  <h3 class="blog_head">Book Online</h3>
               </div>
               <div class="col-md-4">
                  <img class="margin_top_30 img-responsive" src="<?php echo get_template_directory_uri() . '/imgs/blog2.jpg'; ?>" alt="#" />
                  <h3 class="blog_head">Confirmation</h3>
               </div>
               <div class="col-md-4">
                  <img class="margin_top_30 img-responsive" src="<?php echo get_template_directory_uri() . '/imgs/blog3.jpg'; ?>" alt="#" />
                  <h3 class="blog_head">Work Status</h3>
               </div>
            </div>
         </div>
      </div>
      <div id="service" class="hiw_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-7">
                  <h3>OUR SERVICES</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
               </div>
               <div class="col-md-5">
               </div>
            </div>
            <div class="row">
                <?php
                  $args = array(  
                  'post_type' => 'services',
                  'post_status' => 'publish',
                  'posts_per_page' => 5, 
                  'orderby' => 'title', 
                  'order' => 'ASC',
               );

               $loop = new WP_Query( $args ); 
                    $i = 0;
                     while ( $loop->have_posts() ) : $loop->the_post();
                        $i++;
                        if($i <= 1){ ?>
                           <div class="col-md-8 service_blog">
                              <img class="margin_top_30 img-responsive" src="<?php echo get_the_post_thumbnail(); ?>" />
                              <h3 class="blog_head"><?php echo get_the_title(); ?></h3>
                           </div>
                        <?php }else{
                        ?>
                        <div class="col-md-4 service_blog">
                           <img class="margin_top_30 img-responsive" src="<?php echo get_the_post_thumbnail(); ?>" />
                           <h3 class="blog_head"><?php echo get_the_title(); ?></h3>
                        </div>
                     <?php }
                  endwhile;
                  ?>
             
            <!--    <div class="col-md-4 service_blog">
                  <img class="margin_top_30 img-responsive" src="imgs/s3.jpg" alt="#" />
                  <h3 class="blog_head">Work Status</h3>
               </div>
               <div class="col-md-4 service_blog">
                  <img class="margin_top_30 img-responsive" src="imgs/s4.jpg" alt="#" />
                  <h3 class="blog_head">Work Status</h3>
               </div>
               <div class="col-md-4 service_blog">
                  <img class="margin_top_30 img-responsive" src="imgs/s5.jpg" alt="#" />
                  <h3 class="blog_head">Work Status</h3>
               </div> -->
            </div>
         </div>
      </div>
   <?php
      if (isset($_POST['submit'])) {
         $name = $_POST['name'];
         $email = $_POST['email'];
         $phone = $_POST['phone'];
         $service = $_POST['service'];
         $message = $_POST['message'];

         print_r($name);die;
      }
      ?>
      <div id="contact" class="hiw_section layout_padding" style="background: #eeefef;">
         <div class="container">
            <div class="row">
               <div class="col-md-7">
                  <h3>Booking Online</h3>
               </div>
               <div class="col-md-5">
               </div>
            </div>
            <div class="row">
               <div class="col-md-7">
                  <div class="contact-form">                                              
                     <form method="POST" action="" >
                        <input type="text" name="name" placeholder="Name" />
                        <input type="email" name="email" placeholder="Email" />
                        <input type="text" name="phone" placeholder="Phone Number" />
                        <input type="text" name="service" placeholder="Type of Service">
                        <textarea name="message" placeholder="Message"></textarea>
                        <input type="submit" name="submit" value="SEND">
                     </form>
                     
                  </div>
               </div>
               <div class="col-md-5 text_align_center">
                  <img class="img-responsive" src="<?php echo get_template_directory_uri() . '/imgs/man_cartoon.png' ?>" alt="#" />
               </div>
            </div>
         </div>
      </div>
      <div id="wcs" class="hiw_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text_align_center">
                  <h3>Our Client Say</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
               </div>
               <div class="col-md-5">
               </div>
            </div>
            <div class="row">
               <div class="col-md-11">
                  <div class="full testimonial_blog">
                     <p>Jackrok</p>
                     <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscureContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="subcribe">
         <div class="container">
            <div class="row">
               <div class="col-md-4 col-sm-6">
                  <h3>Newsletter</h3>
                  <p>dolor sit amet, consectetur adipiscing elit.<br>Ut elit tellus, luctus nec ullamcorper</p>
               </div>
               <div class="col-md-8 col-sm-6">
                  <form>
                     <input type="email" name="email" placeholder="Enter Your Email Address" />
                     <button>Subscribe</button>
                  </form>
               </div>
            </div>
         </div>
      </div>

      <?php 
        $terms = get_terms('gallery-cat');
        // $d = wp_list_pluck( $terms, 'count' ); 
        // $max_count = max($d);
        // echo "<pre>";
        // print_r($terms); exit();
      ?>
      <div class="row">
         <div class="container-fluid">
              <div id='filter'>
                  <button class="all active">All</button>
              <?php foreach ($terms as $key => $value) { 
                ?>
                <button class="<?php echo $value->slug; ?>"><?php echo $value->name; ?></button>
                <?php
              } ?>
              </div> 
              <div id='posts'>
                <?php
                  $args = array(  
                    'post_type' => 'gallery',
                    'post_status' => 'publish',
                    'posts_per_page' => -1, 
                    'orderby' => 'title', 
                    'order' => 'ASC'
                  );
                $loop = new WP_Query( $args );

                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <div class='post all'><img src="<?php echo get_the_post_thumbnail(); ?>"/>
                      <div class='post-content'>
                        <h2><?php echo get_the_title(); ?></h2>
                        <p><?php echo the_content(); ?></p>
                        <a href="#">View more</a> </div>
                    </div>
                  <?php endwhile ?>

              <?php foreach ($terms as $key => $value) { 
                  $args = array(  
                        'post_type' => 'gallery',
                        'tax_query' => array(
                                array(
                                    'taxonomy' => 'gallery-cat',
                                    // 'field' => '12',
                                    'terms' => $value->term_id,
                                )
                            ),
                        'post_status' => 'publish',
                        'posts_per_page' => -1, 
                        'orderby' => 'title', 
                        'order' => 'ASC',
                  );

                  $loop = new WP_Query( $args );

                  while ($loop->have_posts() ) : $loop->the_post(); ?>
                    <div class='post <?php echo $value->slug; ?>'><img src="<?php echo get_the_post_thumbnail(); ?>"/>
                      <div class='post-content'>
                        <h2><?php echo get_the_title(); ?></h2>
                        <p><?php echo the_content(); ?></p>
                        <a href="#">View more</a> </div>
                    </div>
                    <?php
                    endwhile;
                  }
                ?>
                                             
                </div>
                <div class='hidden'></div>
                
          </div>
      </div>

<?php
get_sidebar();
get_footer();
