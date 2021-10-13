<?php
/**
 * u-flow functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package u-flow
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


function my_acf_admin_head()
{
	?>
<style type="text/css"> 
	.d-none, .flex .order, .hiddentitel label, .hiddentitel .note{display: none !important;}
	.acf-flexible-content .layout{width: 100%; border: 0;}
	
	.flex tbody {display: flex; flex-wrap: wrap !important;}
	.flex tr{flex: 1 1 0 !important;}
	.flex td{width: 100%;display: block;}
	.flex .acf-repeater .acf-row-handle .acf-icon.-minus {top: 0%;}
		
	.noflex tbody {display: block;}
	
	
	.underline{box-shadow: inset 0 -3px 0 #63a84c;
    border-bottom: 1px solid #63a84c;
    transition: box-shadow 0.2s ease-in-out;
	text-decoration: none;}
	.underline:hover{box-shadow: inset 0 -28px 0 #7ccc62;}
	
	#publishing-action {position: fixed; right: 7px; bottom: 5px; z-index: 99999;}
	#minor-publishing-actions {position: fixed; z-index: 99999; bottom: 5px;}
	#wpadminbar {position: relative: important;}

</style>


	<?php
}

add_action('acf/input/admin_head', 'my_acf_admin_head');





/**
 * Custom image sizes
 */

add_theme_support( 'post-thumbnails' );
add_image_size( 'umediumq', 658, 658, true ); // MediumQuadrat
add_image_size( 'ularge', 1246, 758, true ); // Large


if ( ! function_exists( 'u_flow_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function u_flow_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on u-flow, use a find and replace
		 * to change 'u-flow' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'u-flow', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'u-flow' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'u_flow_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'u_flow_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function u_flow_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'u_flow_content_width', 640 );
}
add_action( 'after_setup_theme', 'u_flow_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function u_flow_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'u-flow' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'u-flow' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'u_flow_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function u_flow_scripts() {
	wp_enqueue_style( 'u-flow-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'u-flow-style', 'rtl', 'replace' );

	wp_enqueue_script( 'u-flow-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	//Lazyload
	wp_enqueue_script( 'lazysizes', get_template_directory_uri() . '/js/lazysizes.min.js', '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'u_flow_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Performance Booster
 */


// Remove Query String from Static Resources
function remove_cssjs_ver( $src ) {
if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

// Remove Emojis
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Remove Shortlink
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Disable Embed
function disable_embed(){
wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'disable_embed' );

// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// Remove RSD Link
remove_action( 'wp_head', 'rsd_link' ) ;

// Hide Version
remove_action( 'wp_head', 'wp_generator' ) ;

// Remove WLManifest Link
remove_action( 'wp_head', 'wlwmanifest_link' ) ;

// Disable Self Pingback
function disable_pingback( &$links ) {
  foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, get_option( 'home' ) ) )
            unset($links[$l]);
}

add_action( 'pre_ping', 'disable_pingback' );

// Disable Heartbeat
add_action( 'init', 'stop_heartbeat', 1 );
function stop_heartbeat() {
wp_deregister_script('heartbeat');
}

// Disable Dashicons in Front-end
function wpdocs_dequeue_dashicon() {
if (current_user_can( 'update_core' )) {
return;
}
wp_deregister_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );


// Disable Block-Style
function wpassist_remove_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
} 
add_action( 'wp_enqueue_scripts', 'wpassist_remove_block_library_css' );



//JQUERY Deaktivieren
add_filter( 'wp_enqueue_scripts', 'change_default_jquery', PHP_INT_MAX );

function change_default_jquery( ){
    wp_dequeue_script( 'jquery');
    wp_deregister_script( 'jquery');   
}

function my_script() {
    if (!is_admin()) {
        wp_enqueue_script('custom_script', get_bloginfo('template_url').'/js/myScript.js', array('jquery'));
    }
    if(is_admin()){
        wp_enqueue_script('custom_admin_script', get_bloginfo('template_url').'/js/admin_script.js', array('jquery'));
    }   
}


function add_milos_scripts() {
  if (is_admin()) return;

	// enqueue custom style
	wp_enqueue_style('milos_style', get_template_directory_uri().'/milos_style.css');
	// register cdn script
	wp_register_script('@barba/core', 'https://unpkg.com/@barba/core');
	wp_enqueue_script('@barba/core');
	wp_register_script('gsap', 'https://unpkg.com/gsap@latest/dist/gsap.min.js');
	wp_enqueue_script('gsap');
	// enqueue custom script
	wp_enqueue_script('milos_script', get_template_directory_uri().'/js/milos_script.js');
}
add_action('wp_enqueue_scripts', 'add_milos_scripts');