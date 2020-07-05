<?php 
// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'X' );

function onlist_map_meta_cap($caps, $cap, $user_id, $args)
{

    if ( 'edit_onlist_post' == $cap || 'delete_onlist_post' == $cap || 'read_onlist_post' == $cap ) {
        $post = get_post( 'onlist_post' );
        $post_type = get_post_type_object( $post->post_type );
        $caps = array();
    }

    if ( 'edit_onlist_post' == $cap ) {
        if ( $user_id == $post->post_author )
            $caps[] = $post_type->cap->edit_post;
        else
            $caps[] = $post_type->cap->edit_others_post;
    }

    elseif ( 'delete_onlist_post' == $cap ) {
        if ( $user_id == $post->post_author )
            $caps[] = $post_type->cap->delete_post;
        else
            $caps[] = $post_type->cap->delete_others_post;
    }

    elseif ( 'read_onlist_post' == $cap ) {
        if ( 'private' != $post->post_status )
            $caps[] = 'read';
        elseif ( $user_id == $post->post_author )
            $caps[] = 'read';
        else
            $caps[] = $post_type->cap->read_private_posts;
    }

    return $caps;
}

/**
 * sets only user posts as available to edit in admin
 */
add_action('pre_get_posts', 'onlist_filter_posts_list');
function onlist_filter_posts_list($query)
{
    //$pagenow holds the name of the current page being viewed
     global $pagenow;
 
    //$current_user uses the get_currentuserinfo() method gets logged in user's data
     global $current_user;
     wp_get_current_user();

        //any role with the edit_posts capability and on the posts list page
     if(!current_user_can('administrator') && current_user_can('edit_posts') 
     && ('edit.php' == $pagenow) )
     {
        //global $query set() method sets author as the current user's id
        $query->set('author', $current_user->ID); 
        $screen = get_current_screen();
            add_filter('views_'.$screen->id, 'onlist_remove_post_counts');
           
        }
}

/**
 * User Manages their Media Only
 * @WP_User
 */
//add_action('pre_get_posts', 'onlist_filter_query_attachments_args');

function onlist_filter_query_attachments_args( $query = array() ) {
	 $user_id = get_current_user_id();
    if( $user_id ) {
        $query['author'] = $user_id;
    }
    if( $user_id && is_admin() ) { 
    $query['administrator'] = $user_id;
    }
    return $query;
	
}
add_filter( 'ajax_query_attachments_args', 'onlist_filter_query_attachments_args', 10, 1 );


// remove post count for other authors' posts on edit page list
function onlist_remove_post_counts($posts_count_disp)
{
    //$posts_count_disp contains the 3 links, we keep 'Mine'
    unset($posts_count_disp['all']);
    unset($posts_count_disp['publish']);
    
        return $posts_count_disp;
}
// Create a specific hook
add_filter( 'views_edit-post', 'onlist_remove_post_counts', 10, 1);
add_action( 'manage_users_columns','onlist_remove_post_counts' );

//filter out wp_posts to only show author's post
function onlist_filter_author_posts_query( $wp_query ) { 
if ( strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/edit.php' ) !== false ) {
        if ( !current_user_can( 'update_core' ) ) {
            global $current_user;
            $wp_query->set( 'author', $current_user->id );
        }
    }
}
add_filter('parse_query', 'onlist_filter_author_posts_query' ); 
