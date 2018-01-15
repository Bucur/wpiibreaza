<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package meetup_wp
 */

?>

<li class="item-pro">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		
		<?php
		if ( 'post' === get_post_type() ) : ?>
		  <div class="entry-meta">
			<?php meetup_wp_posted_on(); ?>
		  </div><!-- .entry-meta -->
		<?php
		endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
	   <?php if ( has_post_thumbnail() ) : ?>
          <div class="has_post_thumbnail">
           <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
             <?php the_post_thumbnail(); ?>
           </a>
          </div>
        <?php endif; ?>

       <?php
      if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		    else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		  endif;

	   $wpshed = wpshed_get_custom_field( 'wpshed_textfield' ); 
       if(!empty($wpshed)) {
        echo $wpshed;
	   }
?>
<div class="edit_post_link"><?php edit_post_link(); ?></div>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'meetup_wp' ),
				'after'  => '</div>',
			) );
		?>


	</div><!-- .entry-content -->


	<footer class="entry-footer">
		<?php //meetup_wp_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

</li>