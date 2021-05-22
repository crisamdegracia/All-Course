<?php
/**
 * UnderStrap enqueue scripts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
function understrap_scripts() {

	//Fictional University fontawesome
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );


	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	// $css_version = $theme_version . '.' . filemtime( get_template_directory() . '/dist/style/main.bundle.css' );
	// $css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
	$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/fictional-styles.css' );
	// $css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/style.css' );
	// wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/css/vendor.bundle.js', array(), $js_version, true );
	// wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/dist/style/styles.bundle.css', array(), $css_version );
	// wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/dist/style/main.bundle.css', array(), $css_version );
	// wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/style.min.css', array(), $css_version );
	// wp_enqueue_style( 'fictional-style', get_template_directory_uri() . '/dist/style/fictionalStyles.bundle.css', array(), $css_version );
	wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/fictional-styles.css', array(), $css_version );
	// wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/style.css', array(), $css_version );
	// wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );
		
	wp_enqueue_script( 'jquery' );
	// $js_version = $theme_version . '.' . filemtime( get_template_directory() . '/dist/vendor.bundle.js' );
	// wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
	// wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js', array(), $js_version, true );
	// wp_enqueue_script( 'understrap-vendor', get_template_directory_uri() . '/dist/js/vendor.bundle.js', array(), $js_version, true );
	$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/dist/main.bundle.js' );
	// wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/dist/js/main.bundle.js', array(), $js_version, true );
	// wp_enqueue_script( 'themeModule-scripts', get_template_directory_uri() . '/dist/js/themeModules.bundle.js', array(), $js_version, true );
	wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/dist/main.bundle.js', array(), $js_version, true );
		
	// wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
	// wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/dist/vendor.bundle.js', array(), $js_version, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


	// Fictional university logo font
	wp_enqueue_style('custom-google-font', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i' ); 
	
}
// } // End of if function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );

// function custom_scripts(){
// wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/dist/vendor.bundle.js', array(), 1 , false );
// }


// add_action( 'wp_enqueue_scripts', 'custom_scripts' );
