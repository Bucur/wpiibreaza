<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package meetup_wp
 */

get_header(); ?>

<div class="container">
  <div class="row">

	<div id="primary" class="content-area col-lg-12 col-md-12">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
			the_title( '<h1 class="entry-title-single">', '</h1>' );
		
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php meetup_wp_posted_on(); ?>
		</div><!-- .entry-meta -->
		
		<?php
		endif; ?>
	</header><!-- .entry-header -->

<div class="media_shortcode">
 <?php
   $slide = get_post_meta( $post->ID, '_global_notice', true );
   if (!empty($slide)) {
   echo do_shortcode($slide); 
   } else {
	   the_post_thumbnail();
   }
?>
</div>

	<div class="content-produs">

        <?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'meetup_wp' ),
				'after'  => '</div>',
			) );
		?>

      <div class="width100">
		<button id="btn">Cerere oferta</button>
	  </div>

	  <?php if(function_exists('the_ratings')) { the_ratings(); } ?>


	</div><!-- .entry-content -->

	
</article><!-- #post-## -->


	<?php	
		the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->


   <?php // get_sidebar(); ?>

 </div><!-- end .row -->
</div><!-- end .container -->

<?php get_footer(); ?>
