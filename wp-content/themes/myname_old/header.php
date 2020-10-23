<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package my_name
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <title>BlueSky</title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

      <div id="header" class="header">
         <nav class="navbar navbar-expand-lg navbar-light text-capitalize">
            <div class="container">
               <a class="navbar-brand" href="#"><img src="<?php the_field('site_logo', 'option'); ?>" alt="Site Logo" /></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#show-menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="show-menu">        

               <?php wp_nav_menu( array(
                         // 'sort_column' => 'menu_order',
                         'theme_location' => 'menu-1',
                         'menu_class' => 'navbar-nav ml-auto',
                         // 'title_li' => '<div class="l"></div>',
                         // 'link_before' => '<span class="l">',
                         // 'link_after' => '</span>'
                     ) ); ?>


              <!-- <ul class="navbar-nav ml-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="#home">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#service">Service</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#hiw">How it's Works</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#wcs">What Clients Say</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                     </li> -->
                     <li class="nav-item .search-container">
                        <a class="nav-link search" href="#"><i class="fas fa-search"></i></a>
                        <form>
                           <input type="search" placeholder="Search">
                        </form>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
      </div>