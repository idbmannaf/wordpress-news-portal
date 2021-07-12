<?php
/*
Plugin Name: Custom Post
Plgin URL: https://mannaf.me/plugin/slider/tax
Description: All the_content Word Count
Version: 1.0
Author: Mannaf
Author URL: https://mannaf.me/auth/tax
License: GPLv2 or Later
Text Domain: custom-post
 */
function cptui_register_my_cpts_movie() {

	/**
	 * Post Type: Movie.
	 */

	$labels = [
		"name" => __( "Movie", "alpha" ),
		"singular_name" => __( "movies", "alpha" ),
		"menu_name" => __( "Movie", "alpha" ),
		"all_items" => __( "All Movie", "alpha" ),
		"add_new" => __( "Add New Movie", "alpha" ),
		"edit_item" => __( "Edit Movie", "alpha" ),
		"view_item" => __( "View Movie", "alpha" ),
	];

	$args = [
		"label" => __( "Movie", "alpha" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "movie", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 20,
		"menu_icon" => "dashicons-playlist-video",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "comments", "author" ],
		"taxonomies" => [ "actor", "moviecategory" ],
		"show_in_graphql" => false,
	];

	register_post_type( "movie", $args );
}

add_action( 'init', 'cptui_register_my_cpts_movie' );

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Actor.
	 */

	$labels = [
		"name" => __( "Actor", "alpha" ),
		"singular_name" => __( "Actors", "alpha" ),
		"menu_name" => __( "Actors", "alpha" ),
		"all_items" => __( "All Actors", "alpha" ),
		"edit_item" => __( "Edit Actor", "alpha" ),
		"view_item" => __( "View Actor", "alpha" ),
		"update_item" => __( "Update Actor Name", "alpha" ),
		"add_new_item" => __( "Add New Actor", "alpha" ),
	];


	$args = [
		"label" => __( "Actor", "alpha" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'actor', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "actor",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "actor", [ "movie" ], $args );

	/**
	 * Taxonomy: Category.
	 */

	$labels = [
		"name" => __( "Category", "alpha" ),
		"singular_name" => __( "Categories", "alpha" ),
	];


	$args = [
		"label" => __( "Category", "alpha" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		'all_items' => __( 'All Event Categories', 'alpha' ),
		'parent_item' => __( 'Parent Event Category', 'alpha' ),
		'parent_item_colon' => __( 'Parent Event Category:', 'alpha' ),
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'moviecategory', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "moviecategory",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "moviecategory", [ "movie" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );

add_action( 'init', 'create_tag_taxonomies', 0 );

//create two taxonomies, genres and tags for the post type "tag"
function create_tag_taxonomies()
{
	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name' => _x( 'MTags', 'taxonomy general name' ),
		'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Tags' ),
		'popular_items' => __( 'Popular Tags' ),
		'all_items' => __( 'All Tags' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Tag' ),
		'update_item' => __( 'Update Tag' ),
		'add_new_item' => __( 'Add New Tag' ),
		'new_item_name' => __( 'New Tag Name' ),
		'separate_items_with_commas' => __( 'Separate tags with commas' ),
		'add_or_remove_items' => __( 'Add or remove tags' ),
		'choose_from_most_used' => __( 'Choose from the most used tags' ),
		'menu_name' => __( 'Tags' ),
	);

	register_taxonomy('mtag',[ "movie" ],array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'mtag' ),
	));
}