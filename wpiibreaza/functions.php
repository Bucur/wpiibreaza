<?php
/**
 * meetup_wp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package meetup_wp
 */



if ( ! function_exists( 'meetup_wp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function meetup_wp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on meetup_wp, use a find and replace
	 * to change 'meetup_wp' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'meetup_wp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
   
    add_theme_support( 'post-thumbnails' );

    set_post_thumbnail_size( 450, 9999, true );
 
    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size( 'articole', 450, 9999 ); // 300 pixels wide (and unlimited height)
    add_image_size( 'articole-single', 300, 9999 );

	// the_post_thumbnail( 'medium' ); 


	add_theme_support( 'woocommerce' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'meetup_wp' ),
		'mobile' => esc_html__( 'Mobile', 'meetup_wp' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'meetup_wp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'meetup_wp_setup' );

function theme_prefix_setup() {
 add_theme_support( 'custom-logo', array(
   'height'      => 75,
   'width'       => 300,
   'flex-width'  => true,
) );
}
add_action( 'after_setup_theme', 'theme_prefix_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function meetup_wp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'meetup_wp_content_width', 640 );
}
add_action( 'after_setup_theme', 'meetup_wp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function meetup_wp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'meetup_wp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'meetup_wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Top Header Social', 'meetup_wp' ),
		'id'            => 'header-social',
		'description'   => esc_html__( 'Add widgets here.', 'meetup_wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer left', 'meetup_wp' ),
		'id'            => 'footer-left',
		'description'   => esc_html__( 'Add widgets here.', 'meetup_wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title-footer">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer center', 'meetup_wp' ),
		'id'            => 'footer-center',
		'description'   => esc_html__( 'Add widgets here.', 'meetup_wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title-footer">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer right', 'meetup_wp' ),
		'id'            => 'footer-right',
		'description'   => esc_html__( 'Add widgets here.', 'meetup_wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title-footer">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'meetup_wp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function meetup_wp_scripts() {

	wp_enqueue_style( 'meetup_wp-style', get_stylesheet_uri() );
	wp_enqueue_style ( 'meetup_wp-custom', get_template_directory_uri() . '/css/custom.css');

    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'meetup_wp-to-top', get_template_directory_uri() . '/js/to-top.js', array(), '20171215', true );
	wp_enqueue_script( 'meetup_wp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'meetup_wp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'meetup_wp_scripts' );


function the_breadcrumb() {
		echo '<ul id="crumbs">';
	if (!is_home()) {
		echo '<li><a href="';
		echo get_option('home');
		echo '">';
		echo 'Acasa  <i class="fa fa-angle-double-right" aria-hidden="true"></i>';
		echo "</a></li>";
		if (is_category() || is_single()) {
			echo '<li>';
			the_category(' </li><li> ');
			if (is_single()) {
				echo "</li><li>";
				the_title();
				echo '</li>';
			}
		} elseif (is_page()) {
			echo '<li>';
			echo the_title();
			echo '</li>';
		}
	}
	elseif (is_tag()) {single_tag_title();}
	elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
	elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
	elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
	elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
	elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
	echo '</ul>';
}


function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
         'post', 'nav_menu_item', 'produs'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );


function sp_cpt_shortcode( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		"limit" => '',
		'category' => '',
		'posts' => -1,
	), $atts));


	// Define limit
	if( $limit ) { 
		$posts_per_page = $limit; 
	} else {
		$posts_per_page = '-1';
	}

	
	ob_start();

	// Create the Query
	$post_type 		= 'post';
	$orderby 		= 'post_date';
	$order 			= 'DESC';
	$posts_per_page = -1;
				
	$query = new WP_Query( 
         array ( 
				'post_type'      => $post_type,
				'posts_per_page' => $posts_per_page,
				'orderby'        => $orderby, 
				'order'          => $order,
				'category__in'   => '',
				'no_found_rows'  => 1
				) 

		);
	
	//Get post type count
	$post_count = $query->post_count;
	
	
	// Displays Custom post info
	if( $post_count > 0) : ?>
	
    <ul class="products-grid products-grid--max-3-col first last odd">

     <?php
		// Loop
		while ($query->have_posts()) : $query->the_post(); ?>

       <li class="item">
         <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
           <h3><?php the_title(); ?></h3>
         </a>

        <?php if ( has_post_thumbnail() ) : ?>
        <div class="has_post_thumbnail">
           <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
             <?php the_post_thumbnail('articole'); ?>
           </a>
        </div>
        <?php endif; ?>
       
        <?php the_excerpt(); ?>
 
       </li>

      <?php  
      endwhile;
	  endif;
	
	// Reset query to prevent conflicts
	wp_reset_query();
	?>
	 </li>

	</ul>
	
	<?php
	
	return ob_get_clean();

}

add_shortcode("articole", "sp_cpt_shortcode");



/**
 * function to return a custom field value.
 * Tutorial
 * https://wpshed.com/wordpress/create-custom-meta-box-easy-way/
 */

function wpshed_get_custom_field( $value ) {
	global $post;

    $custom_field = get_post_meta( $post->ID, $value, true );
    if ( !empty( $custom_field ) )
	    return is_array( $custom_field ) ? stripslashes_deep( $custom_field ) : stripslashes( wp_kses_decode_entities( $custom_field ) );

    return false;
}

/**
 * Register the Meta box
 */
function wpshed_add_custom_meta_box() {
	add_meta_box( 'wpshed-meta-box', __( 'Pret produs', 'wpshed' ), 'wpshed_meta_box_output', 'produs', 'side', 'high' );
	//add_meta_box( 'wpshed-meta-box', __( 'Metabox Example', 'wpshed' ), 'wpshed_meta_box_output', 'page', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'wpshed_add_custom_meta_box' );

/**
 * Output the Meta box
 */
function wpshed_meta_box_output( $post ) {
	// create a nonce field
	wp_nonce_field( 'my_wpshed_meta_box_nonce', 'wpshed_meta_box_nonce' ); ?>
	
	<p>
		<label for="wpshed_textfield"><?php _e( 'Pret afisat ex: 220,00 RON', 'wpshed' ); ?>:</label>
		<input type="text" style="width:250px;" name="wpshed_textfield" id="wpshed_textfield" value="<?php echo wpshed_get_custom_field( 'wpshed_textfield' ); ?>" size="50" />
  </p>
	<?php
}

/**
 * Save the Meta box values
 */
function wpshed_meta_box_save( $post_id ) {
	// Stop the script when doing autosave
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// Verify the nonce. If insn't there, stop the script
	if( !isset( $_POST['wpshed_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['wpshed_meta_box_nonce'], 'my_wpshed_meta_box_nonce' ) ) return;

	// Stop the script if the user does not have edit permissions
	if( !current_user_can( 'edit_post', get_the_id() ) ) return;

    // Save the textfield
	if( isset( $_POST['wpshed_textfield'] ) )
		update_post_meta( $post_id, 'wpshed_textfield', esc_attr( $_POST['wpshed_textfield'] ) );

    // Save the textarea
	if( isset( $_POST['wpshed_textarea'] ) )
		update_post_meta( $post_id, 'wpshed_textarea', esc_attr( $_POST['wpshed_textarea'] ) );
}
add_action( 'save_post', 'wpshed_meta_box_save' );


// Numbered Pagination
if ( !function_exists( 'wpex_pagination' ) ) {
	
	function wpex_pagination() {
		
		$prev_arrow = is_rtl() ? '→' : '←';
		$next_arrow = is_rtl() ? '←' : '→';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
	
}





/**
* Implement the Custom code.
**/

require get_template_directory() . '/inc/script.php';

/**
* Implement the Custom code.
**/

require get_template_directory() . '/inc/meta-box.php';


/**
* Implement Options.
**/
require get_template_directory() . '/inc/options.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
