<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package meetup_wp
 */

?>

<section class="container no-results not-found">
	<header class="page-header">
		<h1><?php esc_html_e( 'Nu sa gasit nimic', 'meetup_wp' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'meetup_wp' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Ne pare dar nu sunt rezultate!', 'meetup_wp' ); ?></p>
			<br>
			<?php
				get_search_form();

		else : ?>

			<p><?php esc_html_e( 'Mai incerca!', 'meetup_wp' ); ?></p>
			<br>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
