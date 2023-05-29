<?php

/**
 * Register the Custom Content post type
 *
 * @since    1.0.0
 */
function mindwile_register_personlized_content() {

	$labels = [
		"name" => esc_html__( "Personlized content", "mindwile" ),
		"singular_name" => esc_html__( "Personlized content", "mindwile" ),
		"menu_name" => esc_html__( "Personlized content", "mindwile" ),
		"all_items" => esc_html__( "All Personlized content", "mindwile" ),
		"add_new" => esc_html__( "Add new", "mindwile" ),
		"add_new_item" => esc_html__( "Add new Personlized content", "mindwile" ),
		"edit_item" => esc_html__( "Edit Personlized content", "mindwile" ),
		"new_item" => esc_html__( "New Personlized content", "mindwile" ),
		"view_item" => esc_html__( "View Personlized content", "mindwile" ),
		"view_items" => esc_html__( "View Personlized content", "mindwile" ),
		"search_items" => esc_html__( "Search Personlized content", "mindwile" ),
		"not_found" => esc_html__( "No Personlized content found", "mindwile" ),
		"not_found_in_trash" => esc_html__( "No Personlized content found in trash", "mindwile" ),
		"parent" => esc_html__( "Parent Personlized content:", "mindwile" ),
		"featured_image" => esc_html__( "Featured image for this Personlized content", "mindwile" ),
		"set_featured_image" => esc_html__( "Set featured image for this Personlized content", "mindwile" ),
		"remove_featured_image" => esc_html__( "Remove featured image for this Personlized content", "mindwile" ),
		"use_featured_image" => esc_html__( "Use as featured image for this Personlized content", "mindwile" ),
		"archives" => esc_html__( "Personlized content archives", "mindwile" ),
		"insert_into_item" => esc_html__( "Insert into Personlized content", "mindwile" ),
		"uploaded_to_this_item" => esc_html__( "Upload to this Personlized content", "mindwile" ),
		"filter_items_list" => esc_html__( "Filter Personlized content list", "mindwile" ),
		"items_list_navigation" => esc_html__( "Personlized content list navigation", "mindwile" ),
		"items_list" => esc_html__( "Personlized content list", "mindwile" ),
		"attributes" => esc_html__( "Personlized content attributes", "mindwile" ),
		"name_admin_bar" => esc_html__( "Personlized content", "mindwile" ),
		"item_published" => esc_html__( "Personlized content published", "mindwile" ),
		"item_published_privately" => esc_html__( "Personlized content published privately.", "mindwile" ),
		"item_reverted_to_draft" => esc_html__( "Personlized content reverted to draft.", "mindwile" ),
		"item_scheduled" => esc_html__( "Personlized content scheduled", "mindwile" ),
		"item_updated" => esc_html__( "Personlized content updated.", "mindwile" ),
		"parent_item_colon" => esc_html__( "Parent Personlized content:", "mindwile" ),
	];

	$args = [
		"label" => esc_html__( "Personlized content", "mindwile" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "personlized_content", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-star-filled",
		"supports" => [ "title" ],
		"show_in_graphql" => false,
	];

	register_post_type( "personlized_content", $args );
}

add_action( 'init', 'mindwile_register_personlized_content' );