<?php 

function wp_theme_setup() {
	/**
	 * Load translation identity
	 * add default WordPress support for title, feed and enable post thumbnail in post/page.
	 */
	load_theme_textdomain( 'jindatheme' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	add_theme_support( 'post-formats', array(
		'image', 'video', 'quote',
	) );

	/**
	 * un comment these lines if you want to register your own image size
	 * it's effect when uploading new image.
	 */
	add_image_size( 'grid', 600, 400, array('center', 'center') );
	// add_image_size( 'wp-theme-prototype-600', 600, 300, true );

	/**
	 * Register menu 
	 * It will show up in Appearance > Menus
	 */
	register_nav_menus( array(
		'navigation'    => __( 'Left Navigation', 'jindatheme' ),
	// 	'social' => __( 'Footer Sitemap', 'wp-theme-prototype' ),
	) );
	
	/**
	 * Enable html5 power for comment, gallery and caption element.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
add_action( 'after_setup_theme', 'wp_theme_setup' );

function wp_theme_register_script() {
	/**
	 * Enqueue stylesheet that generated from gulp
	 * first is vendor, second is your style.css
	 */
	wp_enqueue_style('champee-style', get_stylesheet_uri(), array(), '1.1.3');
	
	/**
	 * Register js script file(js/client.js) 
	 * dependency on jQuery, and place this before close body tag
	 */
	wp_register_script('champee-client', get_theme_file_uri('/js/clients.js'), array('jquery'), '1.1.3', true);

	/**
	 * Uncomment if you want to pass an php variebles to js-script
	 * for example, you can use homeURL in main.js(its return root url).
	 */
	// $js_variables = array('homeURL' => home_url());
	// wp_localize_script( 'wp-client', 'themeVariables', $js_variables );
	wp_enqueue_script('champee-client');
}
add_action('wp_enqueue_scripts', 'wp_theme_register_script');

function remove_website_field_in_comment($fields) {
	if (isset($fields['url'])) {
		unset($fields['url']);
		return $fields;
	}
}
add_filter('comment_form_default_fields', 'remove_website_field_in_comment');

/**
 * Including acf free plugin
 */
add_filter('acf/settings/path', 'add_acf_settings_path');
function add_acf_settings_path($path) {
	$path = get_template_directory_uri() . '/plugins/acf/';
	return $path;
}

add_filter('acf/settings/dir', 'add_acf_settings_dir');
function add_acf_settings_dir( $dir ) {
	$dir = get_template_directory_uri() . '/plugins/acf/';
	return $dir;
}

/**
 * Save settings to JSON file
 */
add_filter('acf/settings/save_json', 'save_acf_json_file');
function save_acf_json_file( $path ) {
	$path = get_stylesheet_directory() . '/acf-json';
	return $path;
}

/**
 * Load settings from JSON file
 */
add_filter('acf/settings/load_json', 'load_acf_settings_from_json');
function load_acf_settings_from_json( $paths ) {
	unset($paths[0]);
	$paths[] = get_stylesheet_directory() . '/acf-json';
	return $paths;
}

include_once('plugins/acf/acf.php' );

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'champee-settings',
		'capability'	=> 'edit_posts',
		'icon_url'    => 'dashicons-album',
		'redirect'		=> true
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'General',
		'menu_title'	=> 'General',
		'parent_slug'	=> 'champee-settings',
	));
}

add_filter('acf/settings/show_admin', '__return_false');

?>
