<?php
/**
 * The template for displaying Comments
 * @subpackage OnList
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
defined( 'ABSPATH' ) or die( 'X' ); 
if ( post_password_required() )
    return;
        ?><ul class="commentlist" 
               itemscope="commentText" 
               itemtype="http://schema.org/UserComments">
        <?php 
            wp_list_comments( array(
                'style'      => 'ul',
				'short_ping' => true,
				'post_type' => 'onlist_post',
				'avatar_size'=> 44,
			) );  
        ?></ul>
howdy
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<ul id="comment-nav-below" class="navigation comment-navigation">
		<ul class="pager">
			<li class="previous"><?php previous_comments_link(
                    __("&laquo; Older Comments", "onlist") ); ?></li>
			<li class="next"><?php next_comments_link(
                    __("Newer Comments &raquo;", "onlist") ); ?></li>
		</ul>
	</ul>
	<?php endif; ?>
howdy
 <?php $comment_args = array(
        // Change the title of send button
        'label_submit' => __( 'Send', 'onlist' ),

        // Change the title of the reply section
        'title_reply' => __( 'Request Infomation', 'onlist' ),

        // Remove "Text or HTML to be displayed after the set of comment fields".
        'comment_notes_after' => '<p class="form-allowed-tags">'
                                 . sprintf( __( 'You may use these
                                 <abbr title="HyperText Markup Language">HTML</abbr>
                                 tags and attributes: %s', 'onlist' ), ' <code>'
                                 . allowed_tags() . '</code>' ) . '</p>',

        // Redefine default textarea (the comment body).
        'comment_field' => '<p class="comment-form-comment">
                            <label for="comment">'
                            . __( 'Respond', 'onlist' )
                            . '<span class="screen-reader-text">'
                            . __( 'Comment textarea box', 'onlist' ) . '</label>
                            <br /><textarea id="comment" name="comment" aria-required="true">
                            </textarea></p>',

        //logged in check
        'must_log_in' => '<p class="must-log-in">' .
        sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.',
                 'cards' ),
                 wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
               ) . '</p>',


        'comment_notes_before' => '<p class="comment-notes">' .
                                   __( 'Your email address will not be published.', 'onlist' ) . '</p>',

);
                comment_form( $comment_args ); ?> 
