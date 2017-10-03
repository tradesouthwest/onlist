<?php 


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
 * User Manages their Media Only
 * @WP_User
 */
function onlist_users_own_attachments( $wp_query_obj ) {

    global $current_user, $pagenow;

    if( !is_a( $current_user, 'WP_User->ID') )
        return;

    if( (   'edit.php' != $pagenow ) &&
    (   'upload.php' != $pagenow ) &&
    ( ( 'admin-ajax.php' != $pagenow ) || ( $_REQUEST['action'] != 'query-attachments' ) ) )
    return;

    if( !current_user_can('delete_pages') )
        $wp_query_obj->set('author', $current_user->id );

    return;
}
/**
 * sets only user posts as available to edit in admin
 */
function onlist_posts_for_current_author($query) {
	global $user_level;

	if($query->is_admin && $user_level > 5  ) {
		global $user_ID;
		$query->set('author',  $user_ID);
		unset($user_ID);
	}
	unset($user_level);

	return $query;
}


// below removed ffom admin forms featured listing
//$options = get_option('onlistlists');
//$select_id = $options['onlist_featured']; 

