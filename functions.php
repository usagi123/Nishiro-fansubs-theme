<?php

//redirect after logout
add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
  wp_redirect( home_url() );
  exit();
}

//increase upload size
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

function movies_script_enqueue() {

	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/movies.css', array(), '1.0.0', 'all');
	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/movies.js', array(), '1.0.0', true);

}
add_action( 'wp_enqueue_scripts', 'movies_script_enqueue');

function movies_theme_setup(){

    add_theme_support('menus');

    register_nav_menu('primary', 'Primary header navigation');
}
add_action('init', 'movies_theme_setup');

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size('thumbnails');
add_theme_support('html5', array('search-form'));

//custom login part
function my_custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-styles.css" />';
}
add_action('login_head', 'my_custom_login');

function my_login_logo_url() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
	return 'Movies On The Go';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function login_error_override(){
	return 'Incorrect login details.';
}
add_filter('login_errors', 'login_error_override');

function admin_login_redirect( $redirect_to, $request, $user ){
	global $user;
	if( isset( $user->roles ) && is_array( $user->roles ) ) {
		if( in_array( "administrator", $user->roles ) ) {
			return $redirect_to;
		}
		else {
			return home_url();
		}
	}
		else{
		return $redirect_to;
		}
}
add_filter("login_redirect", "admin_login_redirect", 10, 3);

//add searchbox to be with ul li header nav
add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );
function add_search_box( $items, $args ) {
	$items .= '<li class="searchbox-position">' . get_search_form( false ) . '</li>';
	return $items;
}

//display all child pages into parent page
function wpb_list_child_pages() {
	global $post;
	if ( is_page() && $post->post_parent )
	    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
	else
	    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
	if ( $childpages ) {
	    $string = '<ul>' . $childpages . '</ul>';
	}
	return $string;
}
add_shortcode('wpb_childpages', 'wpb_list_child_pages');

add_filter('widget_text','do_shortcode');

add_image_size( 'portrait_thumbnail', 150, 200, false );


add_filter( 'ccchildpages_inner_template', 'change_inner_template' );

function change_inner_template () {
	return '<div class="ccchildpage {{page_class}}">{{thumbnail}}<h3{{title_class}}>{{title}}</h3>{{meta}}{{excerpt}}{{more}}</div>';
}

?>
