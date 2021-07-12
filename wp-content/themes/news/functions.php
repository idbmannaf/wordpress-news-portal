<?php
function news_bootstrapping()
{
	load_theme_textdomain('news');  // Deafult Thakbe
	add_theme_support("post-thumbnails"); // Feautured Image in admin panel
	add_theme_support("title-tag"); // Title support dibe
	add_theme_support('custom-logo');
	add_theme_support('custom-background');
	$custom_header_details_with_coloor = array(
		'header-text' => true,
		'default-text-color' => '#222',
		'width' => '1200',
		'height' => '600'
	);
	add_theme_support("custom-header", $custom_header_details_with_coloor); // Custom Header added
}
add_action("after_setup_theme", "news_bootstrapping");

function news_assets()
{
	wp_enqueue_style("alpha", get_stylesheet_uri());
}
add_action("wp_enqueue_scripts", "news_assets");

function news_sidebar()
{
	register_sidebar(
		array(
			'name' => __('Left Rss', 'news'),
			'id' => 'sidebar-rss',
			'description' => __('left Sidebar', 'news'),
			'before-_widget' => '<ul id="%1$s" class="widget %2$s">',
			'after-_widget' => '</ul>',
			'before-title' => '<h2 class="widget-title">',
			'after-title' => '<h2>',
		)
	);
	register_sidebar(
		array(
			'name' => __('SP Adds', 'news'),
			'id' => 'single-left-ads',
			'description' => __('SP Adds', 'news'),
			'before-_widget' => '<ul id="%1$s" class="widget %2$s">',
			'after-_widget' => '</ul>',
			'before-title' => '<h2 class="widget-title">',
			'after-title' => '<h2>',
		)
	);
	register_sidebar(
		array(
			'name' => __('search Calender', 'news'),
			'id' => 'search-side-calender',
			'description' => __('Search Calender', 'news'),
			'before-_widget' => '<ul id="%1$s" class="widget %2$s">',
			'after-_widget' => '</ul>',
			'before-title' => '<h2 class="widget-title">',
			'after-title' => '<h2>',
		)
	);
	register_sidebar(
		array(
			'name' => __('Left Footer', 'news'),
			'id' => 'left-footer',
			'description' => __('Left Footer', 'news'),
			//			'before-_widget' => '<ul id="%1$s" class="widget %2$s">',
			//			'after-_widget' => '</ul>',
			//			'before-title' => '<h2 class="widget-title">',
			//			'after-title' => '<h2>',
		)
	);
	register_sidebar(
		array(
			'name' => __('Right Footer', 'news'),
			'id' => 'right-footer',
			'description' => __('Right Footer', 'news'),
			'before-_widget' => '<ul id="%1$s" class="widget %2$s">',
			'after-_widget' => '</ul>',
			//			'before-title' => '<h2 class="widget-title">',
			//			'after-title' => '<h2>',
		)
	);
	register_sidebar(
		array(
			'name' => __('After Middle Footer', 'news'),
			'id' => 'after-middle-footer',
			'description' => __('After Middle Footer', 'news'),
			'before-_widget' => '<ul id="%1$s" class="widget %2$s">',
			'after-_widget' => '</ul>',
			'before-title' => '<h2 class="widget-title">',
			'after-title' => '<h2>',
		)
	);
	register_sidebar(
		array(
			'name' => __('After left Footer', 'news'),
			'id' => 'after-left-footer',
			'description' => __('After left Footer', 'news'),
			'before-_widget' => '<ul id="%1$s" class="widget %2$s">',
			'after-_widget' => '</ul>',
			'before-title' => '<h2 class="widget-title">',
			'after-title' => '<h2>',
		)
	);
}

add_action("widgets_init", 'news_sidebar');

//Menu Register

function register_my_menus()
{
	register_nav_menus(
		array(
			'top-left-header-menu' => __('Top Left Header Menu'),
			'main-menu' => __('Main Menu'),
			'sp-left-cat-side' => __('SP Cat Menu'),
			'footer-bottom-menu' => __('Footer Bottom Menu'),
		)
	);
}
add_action('init', 'register_my_menus');

function wpdocs_my_search_form($form)
{
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url('/') . '" >
    <div>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search here" />
    </div>
    </form>';
	return $form;
}
add_filter('get_search_form', 'wpdocs_my_search_form');

//Attachement
function demo_shortcode_callback_function( $atts ){
	return "Welcome to WordPress";
}
add_shortcode( 'demo_shortcode', 'demo_shortcode_callback_function' );
