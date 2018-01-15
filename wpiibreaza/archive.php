<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package meetup_wp
 */

get_header(); ?>

<div class="container">
  <div class="row">
	<div id="primary" class="content-area col-lg-12 col-md-12">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<ul class="produs-grid">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', get_post_format() );

			endwhile; ?>

            </ul>

			<?php //the_posts_navigation(); ?>
			<?php wpex_pagination(); ?>

		<?php else : ?>

		 <?php

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php // get_sidebar(); ?>

  </div><!-- end .row -->
</div><!-- end .container -->

<?php get_footer();
