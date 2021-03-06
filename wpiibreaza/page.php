<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package meetup_wp
 */

get_header(); ?>



<header class="entry-header-page">
  <div class="container">
	<?php the_title( '<h1 class="entry-title-page">', '</h1>' ); ?>
	<?php the_breadcrumb(); ?>
  </div>	
</header><!-- .entry-header -->


<div class="container">
  <div class="row">

	<div id="primary" class="content-area col-lg-9 col-md-9">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

    <?php get_sidebar(); ?>

  </div><!-- end .row -->
</div><!-- end .container -->

<?php get_footer(); ?>