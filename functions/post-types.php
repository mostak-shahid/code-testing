<?php
//Projects
add_action( 'init', 'forclient_post_types_init' );
function forclient_post_types_init() {
	$labels = array(
		'name'               => _x( 'Projects', 'post type general name', 'excavator-template' ),
		'singular_name'      => _x( 'Project', 'post type singular name', 'excavator-template' ),
		'menu_name'          => _x( 'Projects', 'admin menu', 'excavator-template' ),
		'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'excavator-template' ),
		'add_new'            => _x( 'Add New', 'project', 'excavator-template' ),
		'add_new_item'       => __( 'Add New Project', 'excavator-template' ),
		'new_item'           => __( 'New Project', 'excavator-template' ),
		'edit_item'          => __( 'Edit Project', 'excavator-template' ),
		'view_item'          => __( 'View Project', 'excavator-template' ),
		'all_items'          => __( 'All Projects', 'excavator-template' ),
		'search_items'       => __( 'Search Projects', 'excavator-template' ),
		'parent_item_colon'  => __( 'Parent Projects:', 'excavator-template' ),
		'not_found'          => __( 'No Projects found.', 'excavator-template' ),
		'not_found_in_trash' => __( 'No Projects found in Trash.', 'excavator-template' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'excavator-template' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'project' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'menu_icon' => 'dashicons-format-gallery',
		'supports'           => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
	);

	register_post_type( 'project', $args );
}
add_action( 'after_switch_theme', 'flush_rewrite_rules' );
