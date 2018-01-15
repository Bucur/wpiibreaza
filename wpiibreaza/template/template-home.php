<?php
/**
 * Template name: Template Home
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package meetup_wp
 */

get_header(); ?>



<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 
   <?php the_content(); ?>

<?php endwhile; else: ?>
    <?php _e( 'Sorry, no pages matched your criteria.', 'textdomain' ); ?>
<?php endif; ?>


<?php get_footer(); ?>