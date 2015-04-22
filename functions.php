<?php
/**
 * WP Blank Template theme functions and definitions
 *
 * @link http://WP Blank Template.com
 *
 * @package WordPress
 * @subpackage WP Blank Template
 * @since WP Blank Template 0.1
 */

/**
 * Include functions
 *
 * @since WP Blank Template 0.3
 */
// require_once( get_template_directory() . '/includes/my-include.php' );

/**
 * WP Blank Template setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * @since WP Blank Template 0.1
 */
function wpbt_theme_setup() {

	// This theme styles the visual editor to resemble the theme style - taken from Twenty Fourteen theme.
	add_editor_style( array( 'css/editor-style.css', wpbt_theme_font_url() ) );

	// Enable support for Post Thumbnails, and declare two sizes.
	// add_image_size( 'twentyfourteen-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus( array(
		'primary'   => 'Main menu, appears in the header.',
		'pages_footer' => 'Page menu, appears in the footer',
		'user_footer' => 'User menu, appears in the footer',
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// This theme uses its own gallery styles - taken from Twenty Fourteen theme.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'wpbt_theme_setup' );

/**
 * Register Google font.
 *
 * @since WP Blank Template 0.1
 *
 * @return string
 */
function wpbt_theme_font_url() {
	$font_url = add_query_arg( 'family', urlencode( 'Roboto:300,700,700italic,300italic' ), "//fonts.googleapis.com/css" );

	return $font_url;
}

/**
 * Enqueue scripts and styles for the front end.
 * Javascript script enqueues since 0.2
 *
 * @since WP Blank Template 0.1
 */
function wpbt_scripts() {
	// Add Lato font, used in the main stylesheet.
	wp_enqueue_style( 'wpbt-font', wpbt_theme_font_url(), array(), null );

	// Load our main stylesheet.
	wp_enqueue_style( 'wpbt-main-style', get_template_directory_uri() . '/css/bundle.min.css', array(), '0.1' );

	wp_enqueue_script( 'wpbt-script', get_template_directory_uri() . '/js/min/app.min.js', array( 'jquery' ), '0.1', true );
}
add_action( 'wp_enqueue_scripts', 'wpbt_scripts' );


/**
 * Third party scripts loaders
 *
 * Call them using the function in the place you want to load
 * @since WP Blank Template 0.8
 */

function load_another_plugin() {
	wp_register_style( 'plugin_css', get_template_directory_uri() . '/css/plugin.min.css', false, '1.0.0' );
	wp_register_script( 'plugin_script', get_template_directory_uri() . '/js/min/plugin.min.js', array('jquery'), '1.0.0', true );
	
	wp_enqueue_style( 'plugin_css' );
	wp_enqueue_script( 'plugin_script' );
}


/**
 * Generate title supporting Yoast SEO plugin
 *
 * @since WP Blank Template 0.1
 */

function wpbt_title() {
	if (defined('WPSEO_VERSION')) {
		wp_title('');
	} else {
		
	// Print the <title> tag based on what is being viewed.
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Pág. %s', 'skeleton' ), max( $paged, $page ) );
	}
}

/**
 * Hide some WP information
 *
 * @since WP Blank Template 0.1.1
 */
if (!is_admin()) {
	remove_action( 'wp_head', 'feed_links_extra');
	remove_action( 'wp_head', 'feed_links');
	remove_action( 'wp_head', 'rsd_link');
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'parent_post_rel_link', 10);
	remove_action( 'wp_head', 'start_post_rel_link', 10);
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10);
	remove_action( 'wp_head', 'wp_generator');
}

/**
 * Custom login form
 *
 * Functions to change the style and behavior 
 * for the default Wordpress login form
 *
 * @since WP Blank Template 0.5
 */

// Enqueue custom styles
function wpbt_login_stylesheet() {
    wp_enqueue_style( 'wpbt-login', get_template_directory_uri() . '/css/login.min.css' );
}
add_action( 'login_enqueue_scripts', 'wpbt_login_stylesheet' );

// Change logo URL
function wpbt_login_logo_url() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'wpbt_login_logo_url' );

// Update logo title
function wpbt_login_logo_url_title() {
	return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'wpbt_login_logo_url_title' );

// Hide/Change Message error
function wpbt_login_error_message($error){
    return "Usuario o contraseña incorrecta";
}
add_filter('login_errors','wpbt_login_error_message');


/**
 * Clean HTTP GET/POST elements
 *
 * @since WP Blank Template 0.6
 */
function wpbt_clean($elem) { 
    if(!is_array($elem))
        $elem = htmlentities($elem, ENT_QUOTES, "UTF-8"); 
    else 
        foreach ($elem as $key => $value) 
            $elem[$key] = $this->wpbt_clean($value);
    return $elem; 
} 