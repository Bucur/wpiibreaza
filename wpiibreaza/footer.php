<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package meetup_wp
 */

?>

</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

     <?php if( get_theme_mod( 'hide_widget_footer' ) == '') { ?>

        <div class="container">
		  <div class="row">
		    <div class="col-md-4">
		       <?php dynamic_sidebar( 'footer-left' ); ?>
		    </div><!-- end .col-md-4 -->
		    <div class="col-md-4">
		       <?php dynamic_sidebar( 'footer-center' ); ?>
		    </div><!-- end .col-md-4 -->
		    <div class="col-md-4">
		       <?php dynamic_sidebar( 'footer-right' ); ?>
		    </div><!-- end .col-md-4 -->
		  </div><!-- end .row -->
		</div><!-- end .container -->

	<?php } // end if ?>

		<div class="site-info">
		 <div class="container">
		  <div class="row">
		    <div class="col-md-12">

		     &copy; <?php echo date("Y"); ?> <?php echo get_theme_mod('copyright_footer'); ?>
		       
		    </div><!-- end .col-md-12 -->
		  </div><!-- end .row -->
		 </div><!-- end .container -->
		</div><!-- .site-info -->

	</footer><!-- #colophon -->

<a href="#" id="back-to-top" title="Back to top"><img src="/wp-content/themes/iibreaza/images/top.png"></a>

<?php wp_footer(); ?>

<script type="text/javascript">
jQuery(document).ready(function($) {
    jQuery("ul.sub-menu").parents().addClass('parent');  
});

jQuery(window).scroll(function(){
  if (jQuery("body").scrollTop() > 100) {
    jQuery("#masthead").addClass("fix");
  } else {
    jQuery("#masthead").removeClass("fix");
  }
});

// Get the modal
var modal = document.getElementById('myModal');
// Get the button that opens the modal
var btn = document.getElementById("btn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>

</body>
</html>
