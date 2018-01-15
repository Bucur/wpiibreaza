<?php
/**
 * Template for Woocommerce
 */

get_header(); ?>

  <header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->


		<section id="main" class="site-main" role="main">
		
			<?php woocommerce_content(); ?>

		</section><!-- #section -->
	

<?php get_footer(); ?>