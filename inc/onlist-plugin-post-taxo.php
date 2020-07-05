<?php 
// Register Custom Taxonomy
defined( 'ABSPATH' ) or die( 'X' );
//set some options for our new custom taxonomy
$args = array(
        'label'        => __( 'Listings Categories', 'onlist' ),
        'desc'         => __( 'Start typing to match a location', 'onlist' ), 
        
        'hierarchical'        => true,
        'sort'                => true,
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'query_var'           => true,
        'args'                => array( 
            'orderby'    => 'term_order' ),
        'rewrite'             => array( 
            'slug'       => 'categorized' ),
        'capabilities'        => array(
            // allow only editor and higher to assign terms
            'edit_terms' => 'administrator'
            ), 
        'show_admin_column'   => true,
        'show_ui'             => true
        );
