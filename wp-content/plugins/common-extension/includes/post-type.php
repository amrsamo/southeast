<?php 

/*******************************************************************
Register Post Type
********************************************************************/

function common_slider_post_type() 
{
	$labels = array(
		'name'               => _x( 'Sliders', 'post type general name', 'common' ),
		'singular_name'      => _x( 'Slider', 'post type singular name', 'common' ),
		'menu_name'          => _x( 'Slider', 'admin menu', 'common' ),
		'name_admin_bar'     => _x( 'Slider', 'add new on admin bar', 'common' ),
		'add_new'            => _x( 'Add New', 'slider', 'common' ),
		'add_new_item'       => __( 'Add New Slider', 'common' ),
		'new_item'           => __( 'New Slider', 'common' ),
		'edit_item'          => __( 'Edit Slider', 'common' ),
		'view_item'          => __( 'View Slider', 'common' ),
		'all_items'          => __( 'All Slider', 'common' ),
		'search_items'       => __( 'Search Slider', 'common' ),
		'parent_item_colon'  => __( 'Parent Slider:', 'common' ),
		'not_found'          => __( 'No sliders found.', 'common' ),
		'not_found_in_trash' => __( 'No sliders found in Trash.', 'common' )
	);
	
	$args = array(
		
	
		'labels'             => $labels,
		'public'             => true,
		'menu_icon'             => 'dashicons-format-gallery',
		'exclude_from_search'=> true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'em_slider' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','page-attributes')
	);
	
	register_post_type( 'em_slider' , $args );
	
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'common' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'common' ),
		'search_items'      => __( 'Search Categories', 'common' ),
		'all_items'         => __( 'All Categories', 'common' ),
		'parent_item'       => __( 'Parent Category', 'common' ),
		'parent_item_colon' => __( 'Parent Category:', 'common' ),
		'edit_item'         => __( 'Edit Category', 'common' ),
		'update_item'       => __( 'Update Category', 'common' ),
		'add_new_item'      => __( 'Add New Category', 'common' ),
		'new_item_name'     => __( 'New Category Name', 'common' ),
		'menu_name'         => __( 'Categories', 'common' ),
	);

	$args = array(
		'public'            => false,
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'query_var'         => false,
		'rewrite'           => array( 'slug' => 'slider-category' ),
	);
	
	register_taxonomy( 'em_slider_cat', array( 'em_slider' ), $args );
}
add_action('init', 'common_slider_post_type');



function common_team_post_type() 
{
	$labels = array(
		'name'               => _x( 'Teams', 'post type general name', 'common' ),
		'singular_name'      => _x( 'Team', 'post type singular name', 'common' ),
		'menu_name'          => _x( 'Teams', 'admin menu', 'common' ),
		'name_admin_bar'     => _x( 'Team', 'add new on admin bar', 'common' ),
		'add_new'            => _x( 'Add New', 'team', 'common' ),
		'add_new_item'       => __( 'Add New Team', 'common' ),
		'new_item'           => __( 'New Team', 'common' ),
		'edit_item'          => __( 'Edit Team', 'common' ),
		'view_item'          => __( 'View Team', 'common' ),
		'all_items'          => __( 'All Teams', 'common' ),
		'search_items'       => __( 'Search Teams', 'common' ),
		'parent_item_colon'  => __( 'Parent Teams:', 'common' ),
		'not_found'          => __( 'No teams found.', 'common' ),
		'not_found_in_trash' => __( 'No teams found in Trash.', 'common' )
	);
	
	$args = array(
		
	
		'labels'             => $labels,
		'public'             => true,
		'menu_icon'             => 'dashicons-admin-users',		
		'exclude_from_search'=> true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'em_team' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes')
	);
	
	register_post_type( 'em_team' , $args );
	
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'common' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'common' ),
		'search_items'      => __( 'Search Categories', 'common' ),
		'all_items'         => __( 'All Categories', 'common' ),
		'parent_item'       => __( 'Parent Category', 'common' ),
		'parent_item_colon' => __( 'Parent Category:', 'common' ),
		'edit_item'         => __( 'Edit Category', 'common' ),
		'update_item'       => __( 'Update Category', 'common' ),
		'add_new_item'      => __( 'Add New Category', 'common' ),
		'new_item_name'     => __( 'New Category Name', 'common' ),
		'menu_name'         => __( 'Categories', 'common' ),
	);

	$args = array(
		'public'            => false,
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'query_var'         => false,
		'rewrite'           => array( 'slug' => 'team-category' ),
	);
	
	register_taxonomy( 'em_team_cat', array( 'em_team' ), $args );
}
add_action('init', 'common_team_post_type');



function common_portfolio_post_type() 
{
	$labels = array(
		'name'               => _x( 'Portfolio', 'post type general name', 'common' ),
		'singular_name'      => _x( 'Portfolio', 'post type singular name', 'common' ),
		'menu_name'          => _x( 'Portfolio', 'admin menu', 'common' ),
		'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'common' ),
		'add_new'            => _x( 'Add New', 'Portfolio', 'common' ),
		'add_new_item'       => __( 'Add New Portfolio', 'common' ),
		'new_item'           => __( 'New Portfolio', 'common' ),
		'edit_item'          => __( 'Edit Portfolio', 'common' ),
		'view_item'          => __( 'View Portfolio', 'common' ),
		'all_items'          => __( 'All Portfolio', 'common' ),
		'search_items'       => __( 'Search Portfolio', 'common' ),
		'parent_item_colon'  => __( 'Parent Portfolio:', 'common' ),
		'not_found'          => __( 'No Portfolio found.', 'common' ),
		'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'common' )
	);
	
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'menu_icon'             => 'dashicons-images-alt2',				
		'exclude_from_search'=> true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'em_portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor', 'thumbnail')
	);
	
	register_post_type( 'em_portfolio' , $args );
	
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'common' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'common' ),
		'search_items'      => __( 'Search Categories', 'common' ),
		'all_items'         => __( 'All Categories', 'common' ),
		'parent_item'       => __( 'Parent Category', 'common' ),
		'parent_item_colon' => __( 'Parent Category:', 'common' ),
		'edit_item'         => __( 'Edit Category', 'common' ),
		'update_item'       => __( 'Update Category', 'common' ),
		'add_new_item'      => __( 'Add New Category', 'common' ),
		'new_item_name'     => __( 'New Category Name', 'common' ),
		'menu_name'         => __( 'Categories', 'common' ),
	);

	$args = array(
		'public'            => false,
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'query_var'         => false,
		'rewrite'           => array( 'slug' => 'portfolio-category' ),
	);
	
	register_taxonomy( 'em_portfolio_cat', array( 'em_portfolio' ), $args );
}
add_action('init', 'common_portfolio_post_type');



// pricing
function common_pricing_post_type() 
{
	$labels = array(
		'name'               => _x( 'Pricings', 'post type general name', 'common' ),
		'singular_name'      => _x( 'Pricing', 'post type singular name', 'common' ),
		'menu_name'          => _x( 'Pricing', 'admin menu', 'common' ),
		'name_admin_bar'     => _x( 'Pricing', 'add new on admin bar', 'common' ),
		'add_new'            => _x( 'Add New', 'Pricing', 'common' ),
		'add_new_item'       => __( 'Add New Pricing', 'common' ),
		'new_item'           => __( 'New Pricing', 'common' ),
		'edit_item'          => __( 'Edit Pricing', 'common' ),
		'view_item'          => __( 'View Pricing', 'common' ),
		'all_items'          => __( 'All Pricing', 'common' ),
		'search_items'       => __( 'Search Pricing', 'common' ),
		'parent_item_colon'  => __( 'Parent Pricing:', 'common' ),
		'not_found'          => __( 'No Pricing found.', 'common' ),
		'not_found_in_trash' => __( 'No Pricing found in Trash.', 'common' )
	);
	
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'menu_icon'             => 'dashicons-cart',
		'exclude_from_search'=> true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'em_pricings' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title')
	);
	
	register_post_type( 'em_pricing' , $args );
	
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'common' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'common' ),
		'search_items'      => __( 'Search Categories', 'common' ),
		'all_items'         => __( 'All Categories', 'common' ),
		'parent_item'       => __( 'Parent Category', 'common' ),
		'parent_item_colon' => __( 'Parent Category:', 'common' ),
		'edit_item'         => __( 'Edit Category', 'common' ),
		'update_item'       => __( 'Update Category', 'common' ),
		'add_new_item'      => __( 'Add New Category', 'common' ),
		'new_item_name'     => __( 'New Category Name', 'common' ),
		'menu_name'         => __( 'Categories', 'common' ),
	);

	$args = array(
		'public'            => false,
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'query_var'         => false,
		'rewrite'           => array( 'slug' => 'pricing-category' ),
	);
	
	register_taxonomy( 'em_pricing_cat', array( 'em_pricing' ), $args );
}
add_action('init', 'common_pricing_post_type');


// testimonial
function common_testimonial_post_type() 
{
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name', 'common' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name', 'common' ),
		'menu_name'          => _x( 'Testimonial', 'admin menu', 'common' ),
		'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'common' ),
		'add_new'            => _x( 'Add New', 'Testimonial', 'common' ),
		'add_new_item'       => __( 'Add New Testimonial', 'common' ),
		'new_item'           => __( 'New Testimonial', 'common' ),
		'edit_item'          => __( 'Edit Testimonial', 'common' ),
		'view_item'          => __( 'View Testimonial', 'common' ),
		'all_items'          => __( 'All Testimonial', 'common' ),
		'search_items'       => __( 'Search Testimonial', 'common' ),
		'parent_item_colon'  => __( 'Parent Testimonial:', 'common' ),
		'not_found'          => __( 'No Testimonials found.', 'common' ),
		'not_found_in_trash' => __( 'No Testimonials found in Trash.', 'common' )
	);
	
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'menu_icon'=> 'dashicons-format-chat',
		'exclude_from_search'=> true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'em_testimonial' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor', 'thumbnail')
	);
	
	register_post_type( 'em_testimonial' , $args );
	
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'common' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'common' ),
		'search_items'      => __( 'Search Categories', 'common' ),
		'all_items'         => __( 'All Categories', 'common' ),
		'parent_item'       => __( 'Parent Category', 'common' ),
		'parent_item_colon' => __( 'Parent Category:', 'common' ),
		'edit_item'         => __( 'Edit Category', 'common' ),
		'update_item'       => __( 'Update Category', 'common' ),
		'add_new_item'      => __( 'Add New Category', 'common' ),
		'new_item_name'     => __( 'New Category Name', 'common' ),
		'menu_name'         => __( 'Categories', 'common' ),
	);

	$args = array(
		'public'            => false,
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'query_var'         => false,
		'rewrite'           => array( 'slug' => 'testimonial-category' ),
	);
	
	register_taxonomy( 'em_testimonial_cat', array( 'em_testimonial' ), $args );
}
add_action('init', 'common_testimonial_post_type');


// brand
function common_brand_post_type() 
{
	$labels = array(
		'name'               => _x( 'Brand', 'post type general name', 'common' ),
		'singular_name'      => _x( 'Brand', 'post type singular name', 'common' ),
		'menu_name'          => _x( 'Brand', 'admin menu', 'common' ),
		'name_admin_bar'     => _x( 'Brand', 'add new on admin bar', 'common' ),
		'add_new'            => _x( 'Add New', 'Brand', 'common' ),
		'add_new_item'       => __( 'Add New Brand', 'common' ),
		'new_item'           => __( 'New Brand', 'common' ),
		'edit_item'          => __( 'Edit Brand', 'common' ),
		'view_item'          => __( 'View Brand', 'common' ),
		'all_items'          => __( 'All Brand', 'common' ),
		'search_items'       => __( 'Search Brand', 'common' ),
		'parent_item_colon'  => __( 'Parent Brand:', 'common' ),
		'not_found'          => __( 'No Brand found.', 'common' ),
		'not_found_in_trash' => __( 'No Brand found in Trash.', 'common' )
	);
	
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'menu_icon'=> 'dashicons-networking',
		'exclude_from_search'=> true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'em_brands' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','thumbnail')
	);
	
	register_post_type( 'em_brand' , $args );
	
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'common' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'common' ),
		'search_items'      => __( 'Search Categories', 'common' ),
		'all_items'         => __( 'All Categories', 'common' ),
		'parent_item'       => __( 'Parent Category', 'common' ),
		'parent_item_colon' => __( 'Parent Category:', 'common' ),
		'edit_item'         => __( 'Edit Category', 'common' ),
		'update_item'       => __( 'Update Category', 'common' ),
		'add_new_item'      => __( 'Add New Category', 'common' ),
		'new_item_name'     => __( 'New Category Name', 'common' ),
		'menu_name'         => __( 'Categories', 'common' ),
	);

	$args = array(
		'public'            => false,
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'query_var'         => false,
		'rewrite'           => array( 'slug' => 'brand-category' ),
	);
	
	register_taxonomy( 'em_brand_cat', array( 'em_brand' ), $args );
}
add_action('init', 'common_brand_post_type');
