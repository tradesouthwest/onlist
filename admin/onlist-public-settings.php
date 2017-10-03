<?php
/**
 * Class: OnList_Settings
 * @since 1.0.0
 * Author: Tradesouthwest
 * Author URI: http://tradesouthwest.com
 * @package onlist
 * @subpackage inc/onlist-settings
 * @license GNU GPL version 3 (or later) {@see license.txt}
 */
// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'X' );

// Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'onlist_public_nonce' ] ) && 
    wp_verify_nonce( $_POST[ 'onlist_public_nonce' ], basename( __FILE__ ) ) 
    ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
     
   if( ! current_user_can( 'edit_post', $post_id ) ) 
        {
        return;
        }
   
        if( isset( $_POST[ 'onlist_country' ] ) ) {
            update_post_meta( $post_id, 'onlist_country', 
            sanitize_text_field($_POST[ 'onlist_country' ] ) );
        }
        if( isset( $_POST[ 'onlist_address' ] ) ) {
            update_post_meta( $post_id, 'onlist_address', 
            sanitize_text_field( $_POST[ 'onlist_address' ] ) );
        }    
        if( isset( $_POST[ 'onlist_city' ] ) ) {
            update_post_meta( $post_id, 'onlist_city',
            sanitize_text_field( $_POST[ 'onlist_city' ] ) );
        }    
        if( isset( $_POST[ 'onlist_state' ] ) ) {
            update_post_meta( $post_id, 'onlist_state', 
            sanitize_text_field( $_POST[ 'onlist_state' ] ) );
        }    
        if( isset( $_POST[ 'onlist_zipcode' ] ) ) {
            update_post_meta( $post_id, 'onlist_zipcode',  
            sanitize_text_field( $_POST[ 'onlist_zipcode' ] ) );
        }    
        if( isset( $_POST[ 'onlist_phone' ] ) ) {
            update_post_meta( $post_id, 'onlist_phone', 
            sanitize_text_field( $_POST[ 'onlist_phone' ] ) );
        }    
        if( isset( $_POST[ 'onlist_email' ] ) ) {
            update_post_meta( $post_id, 'onlist_email', 
            sanitize_text_field( $_POST[ 'onlist_email' ] ) );
        }    
        if( isset( $_POST[ 'onlist_website' ] ) ) {
            update_post_meta( $post_id, 'onlist_website', 
            sanitize_text_field( $_POST[ 'onlist_website' ] ) );
        }    
        if( isset( $_POST[ 'onlist_other' ] ) ) {
            update_post_meta( $post_id, 'onlist_other',  
            sanitize_text_field( $_POST[ 'onlist_other' ] ) );
        }    
