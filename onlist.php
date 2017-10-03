<?php
/*
Plugin Name: OnList
Description:  Online Listing and Business Directory
Version: 1.0.0
Author: Tradesouthwest
Author URI: http://tradesouthwest.com
 * Filters and Actions hooks are loaded on this page.
*/
// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'X' );

if (!defined('ONLIST_VER')) { define('ONLIST_VER', '1.0.0'); }

if (!defined('ONLIST_URL')) { define( 'ONLIST_URL', plugin_dir_url(__FILE__)); }

/*----------------------------------------------------------------------------*
 * * * ATTENTION! * * *
 * FOR DEVELOPMENT ONLY
 * SHOULD BE DISABLED ON PRODUCTION
 *----------------------------------------------------------------------------*/
//error_reporting(E_ALL);
//ini_set('display_errors', );
/*----------------------------------------------------------------------------*/

/**
 * Upon plugin activation, always make sure init hook for a CPT 
 * has ran first or you will have to run `flush_rewrite()`.
*/
//create custom post type
function onlist_custom_post_type() 
{
    include( 'inc/onlist-plugin-post-type.php' );
}
    add_action( 'init', 'onlist_custom_post_type' );
         
//create custom taxonomy 
function onlist_custom_tax_init()
{
    include( 'inc/onlist-plugin-post-taxo.php' );
    register_taxonomy( 'onlist-taxonomy', 'onlist_post', $args);
}
    add_action( 'init', 'onlist_custom_tax_init' );

    //group terms functions
    include 'inc/onlist-manage-terms.php'; 
    remove_filter( 'map_meta_cap', 'onlist_map_meta_cap', 11, 4 ); 
    remove_action('pre_get_posts', 'onlist_users_own_attachments');
    remove_filter('pre_get_posts', 'onlist_posts_for_current_author'); 

//enqueue or localise scripts
function onlist_public_style() 
{
    wp_enqueue_style( 'onlist-style', ONLIST_URL 
                      . '/css/onlist-style.css',array(), ONLIST_VER, false );
}
    add_action( 'wp_enqueue_scripts', 'onlist_public_style' );
    
//load language scripts     
function onlist_load_text_domain() 
{
    load_plugin_textdomain( 'onlist', false, 
                            basename( dirname( __FILE__ ) ) . '/languages' ); 
}
    
//activate plugin
function onlist_plugin_activate() 
{  
        $t=time();
        $time = date("Y-m-d",$t);
        add_option( 'onlist_date_plugin_activated' );
        update_option( 'onlist_date_plugin_activated', $time );
        flush_rewrite_rules();      
}
//activate plugin
function onlist_plugin_reactivate() 
{ 
        flush_rewrite_rules();          
}
//deactivation settings
function onlist_plugin_deactivate() 
{
        delete_option( 'onlist_date_plugin_activated' );
        /* Flush rewrite rules for custom post types. */
        flush_rewrite_rules();
            return false;
} 
    //ready, set, go
    register_activation_hook(__FILE__,   'onlist_plugin_activate');
    register_deactivation_hook(__FILE__, 'onlist_plugin_deactivate');
	add_action( 'after_switch_theme',    'onlist_plugin_reactivate' );
	
	/** 
     * Admin side specific
     * @since 1.0.0 
     *
     * top level menu
     */
if( is_admin() ) : 
function onlist_admin_style() 
{
    wp_enqueue_style( 'onlist-admin', ONLIST_URL 
                      . '/css/onlist-admin.css',array(), ONLIST_VER, false );
}
    add_action( 'admin_enqueue_scripts', 'onlist_admin_style' );

    require_once 'admin/onlist-plugin-admin.php';
endif;
	
// Register the Metabox
function onlist_add_custom_meta_box()
{
    add_meta_box(   'onlist-meta-box',           // Unique ID
                __( 'OnList Entry', 'onlist' ), // Title
                'onlist_meta_box_output',      // Callback function
                'onlist_post',                // Admin page (or post type)
                'normal',                    // Context
                'high'                      // Priority
               );
}
    add_action( 'add_meta_boxes', 'onlist_add_custom_meta_box' );
    
/** 
 * Custom post type onlist_post.
 * Outputs for meta box fields
 * @since 1.0.0
 */
if( !function_exists( 'onlist_get_custom_field' ) ) : 
// Function to return a custom field value
function onlist_get_custom_field( $value )
{
    global $post;
        $custom_field = get_post_meta( $post->ID, $value, true );
        if ( !empty( $custom_field ) )
        return is_array( $custom_field ) ? stripslashes_deep( $custom_field ) :
                       stripslashes( wp_kses_decode_entities( $custom_field ) );
            return false;
}
endif;

//output metabox to editor pages   
function onlist_meta_box_output() 
{
    //setup the editor post pages and display
    //include 'inc/onlist-option-groups.php';
    include 'admin/onlist-editor-page.php';
}   
 
//save the meta data
function onlist_save_postdata($post_id)
{   

    include 'admin/onlist-public-settings.php';   
}    
    add_action( 'save_post', 'onlist_save_postdata', 10, 2 );
    //add_action( 'save_post', 'onlist_assign_parent_terms', 10, 2 );

// check for thumbnail support 
if ( !current_theme_supports( 'post-thumbnails' ) ) {
    add_theme_support( 'post-thumbnails' );
    add_post_type_support( 'onlist_post', 'thumbnail' );    
}

//and the rest of the files 
    include 'public/onlist-public-view.php'; 

    //include templater    
    include 'inc/onlist-templater.php';
    include 'inc/onlist-page-helpers.php';
    
    //register shortcodes
function onlist_register_shortcodes() {
    add_shortcode( 'onlist-listings', 'onlist_display_public_view' );
    add_shortcode( 'onlist-categories', 'onlist_display_category_widget' );
}
    add_action( 'init', 'onlist_register_shortcodes' );

    include 'inc/Onlist_Widget.php';
?>
