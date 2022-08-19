<?php 

function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );


if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
/* add html5 support */
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

/* add title tag support */
add_theme_support( 'title-tag' );

/* add custom thumbnail support */
add_theme_support( 'post-thumbnails' );

/* add custom logo support */
add_theme_support( 'custom-logo', array(
    'height'               => 100,
    'width'                => 400,
    'flex-height'          => true,
    'flex-width'           => true,
    'header-text'          => array( 'site-title', 'site-description' ),
    'unlink-homepage-logo' => true,
) );
/* Function to display logo in header */ 
function site_logo()
    {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

        if ( has_custom_logo() ) {
        echo '<a href="'.get_home_url().'" ><img class="custom-logo" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '"></a>';
        } else {
        echo '<a href="'.get_home_url().'" ><h3>' . get_bloginfo('name') . '</h3></a>';
        }
    }
/* load styles and scripts */
   function tp_scripts() {
    wp_enqueue_style( 'default', get_stylesheet_uri() );
    wp_enqueue_style( 'bootstrap-min', get_template_directory_uri().'/bootstrap/css/bootstrap.min.css' );
    wp_enqueue_script( 'jquery-local', get_template_directory_uri() . '/bootstrap/js/jquery.min.js', array(), '1.0.0', false );
    wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/bootstrap/js/bootstrap.bundle.min.js', array(), '1.0.0', true ); 
}
add_action( 'wp_enqueue_scripts', 'tp_scripts' );
/* custom excerpt length */
function tp_custom_excerpt_length( $length ) {
return 20;
}
add_filter( 'excerpt_length', 'tp_custom_excerpt_length', 999 );

/* Custom Excerpt read more text */
function tp_custom_excerpt_more($more) {
    global $post;
    return ' ...';
}
add_filter('excerpt_more', 'tp_custom_excerpt_more');

/* Custom Shortcode */

function hello_world() {
    return '<a class ="follow" title="Follow me on facebook" href="https://www.facebook.com" rel="nofollow" target="_blank">Follow me on facebook</a>';
}

function register_shortcodes(){
   add_shortcode('helloworld', 'hello_world');
}

add_action( 'init', 'register_shortcodes');

/* include Nav Walker file */
require_once('inc/bs5-navwalker.php');
/* include subscribe_link file */
require_once('custom-shortcodes.php');
?>