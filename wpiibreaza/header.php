<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package meetup_wp
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="shortcut icon" href="<?php echo get_theme_mod( 'html5_favicon' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p><?php echo do_shortcode('[contact-form-7 id="258" title="Cerere oferta"]'); ?></p>
  </div>

</div>

<div class="top_site">
 <div class="container">
  <div class="row">
    <div class="col-md-6">

		<div class="contact_info">
		  <?php echo get_theme_mod('header_text'); ?>
		</div>
			
		</div><!-- end .col-md-6 -->

        <div class="col-lg-6 col-md-6">

             <div class="facebook">
              <?php dynamic_sidebar('header-social'); ?>
             </div>
             <div class="header_html">
           	   <?php get_search_form(); ?>
             </div>

		</div><!-- end .col-md-6 -->

		
  </div><!-- end .row -->
</div><!-- end .container -->

</div>

	<header id="masthead" class="site-header" role="banner">
     <div class="container">
      
		   <div class="site-branding">
			    <?php
			     $custom_logo_id = get_theme_mod( 'custom_logo' );
	             $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	             
				 if ($image == TRUE) { ?>
	               <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
	                <img src="<?php echo $image[0]; ?>" alt="logo">
	               </a> 
	             <?php } else { ?>
	             <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
	            <?php 
	              }
	             ?>
		    </div><!-- .site-branding -->

		    <div class="nav-right">
			 <?php get_template_part('meniu'); ?>
		    </div>

         <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
 
            <?php wp_nav_menu( array( 'theme_location' => 'mobile',
							          'menu_class' => 'navmenu',
              ) ); ?>

           </div>
         <!-- Use any element to open the sidenav -->
         <span class="newmeniu" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i> MENIU</span>

		<script>
			function openNav() {
				document.getElementById("mySidenav").style.width = "250px";
			}

			function closeNav() {
				document.getElementById("mySidenav").style.width = "0";
			}
		</script>

        </div><!-- end .container-->
	</header><!-- #masthead -->
   

   <div class="clear"></div>

   <?php if ( is_front_page() ) { ?>
      <div class="rev_slider">
    	<?php echo do_shortcode('[rev_slider alias="home"]'); ?>
      </div>
	<?php } ?>

	
	<div id="content" class="site-content">