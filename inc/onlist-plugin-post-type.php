<?php 
/** 
 * Register Custom Post Type
 * $obj = get_post_type_object( 'your_post_type_name' ); 
 * echo esc_html( $obj->description );
 * @since ver: 1.0.0
 *
 * @package onlist
 * @subpackage admin/onlist-plugin-post-type
 */
defined( 'ABSPATH' ) or die( 'X' ); 
// Register Custom Post Type
register_post_type( 'onlist_post', 
    array( 
    'labels' => array( 
        'name'               => 'OnList Listings',
        'singular_name'      => 'OnList Listing',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Listing',
        'edit_item'          => 'Edit Listing',
        'new_item'           => 'New Listing',
        'view_item'          => 'View Listing',
        'search_items'       => 'Search Listing',
        'not_found'          => 'No custom listings found',
        'not_found_in_trash' => 'No custom listings found in Trash',
        'parent_item_colon'  => '',
        'menu_name'          => 'OnList Listings'
        ),
        'hierarchical'  => true,
        'description'   => 'OnList directory listing application.',
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt',
                                  'comments' ), 
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'taxonomies'    => array( 'post_tag' ), 
        'public'        => true,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'menu_position' => 45,
        'menu_icon'     => 'dashicons-admin-post',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => true,
       
	    'hierarchical'        => true,
        'rewrite'             => array('slug' => 'details',
                                        'with_front' => false ),
        'query_var'           => true,
	    'delete_with_user'    => true,
        'can_export'          => true,
       
        )
    );
