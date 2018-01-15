<?php
/**
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Skeleton-frame
 */

get_header(); ?>


<div class="container">
   <div class="row">
	
	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

	
			<?php
			    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
			    $args = array('post_type' => 'produs', 
			    	          'posts_per_page' => 20,
			    	          'paged' => $paged);
			    $loop = new WP_Query( $args );
			    while ( $loop->have_posts() ) : $loop->the_post();
			?>
            
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
				<header class="entry-header">

			   <?php the_title( sprintf( '<h2 class="entry-title-produs"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</header><!-- .entry-header -->
				<div class="entry-content">
				 <?php the_content(); ?> 
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'skeleton-frame' ),
							'after'  => '</div>',
						) );
					?>


						 
				</div><!-- .entry-content -->

			  
			</article><!-- #post-## -->

			<?php endwhile;
			 wp_reset_postdata(); 
			 ?>

			<div class="postnavcustom">
			 <?php next_posts_link( '&larr; Older Entries', $loop->max_num_pages );
             previous_posts_link( '&rarr; Newer Entries' ); ?>
			</div>


		</main><!-- #main -->
	</div><!-- #primary -->


 </div><!-- end .row -->
</div><!-- end .container -->

<?php get_footer(); ?>