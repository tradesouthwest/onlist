<?php 
/**
 * @since ver: 1.0.6
 * Author: Tradesouthwest
 * Author URI: http://tradesouthwest.com
 * @package onlist
 * @subpackage inc/onlist-page-helpers
 */
// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'X' );

/** 
 * Custom post type onlist_post.
 * Outputs for meta box fields
 * @since 1.0.0
 */
if( !function_exists( 'onlist_get_custom_field' ) ) : 
// Function to return a custom field value
function onlist_get_custom_field( $value )
{
        $custom_field = get_post_meta( get_the_ID(), $value, true );
        if ( $custom_field !='' ) : 
        return sanitize_text_field( $custom_field );
        else:
            return '';
            endif;
}
endif;
//Remove listview from author upload page
add_action( 'admin_head', 'onlist_remove_media_listview' );
function onlist_remove_media_listview() {

    //$pagenow holds the name of the current page being viewed
    global $pagenow;
    
    if(!current_user_can('administrator') && current_user_can('edit_posts') ) {

        if( 'upload.php' == $pagenow )  {
            echo '<style type="text/css">.media-toolbar.wp-filter .view-switch {display: none;}.media-frame.mode-grid .media-toolbar {padding-top: 7px;}</style>';
            }
    } else { return false; } 
} 
// same but for edit page views
add_action( 'admin_head', 'onlist_remove_posts_listview' );
function onlist_remove_posts_listview() {

    //$pagenow holds the name of the current page being viewed
    global $pagenow;
    
    if(!current_user_can('administrator') && current_user_can('edit_posts') ) {

        if( 'edit.php' == $pagenow )  {
            echo '<style type="text/css">body.edit-php ul.subsubsub li.all a, body.edit-php ul.subsubsub li.publish a{display: none !important;}</style>';
            }
    } else { return false; } 
}
   
/**
 * Get taxonomies terms links.
 * displays list of tags and categorized terms
 * @see get_object_taxonomies()
 */
function onlist_get_taxo_terms( ) { 

    // Get post by post ID.
    if ( ! $post = get_post() ) {
        return '';
    }
 
    // Get post type by post.
    $post_type = $post->post_type;
 
    // Get post type taxonomies.
    $taxonomies = get_object_taxonomies( $post_type, 'categorized' );
 
    $out = array();
 
    foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
 
        // Get the terms related to post.
        $terms = get_the_terms( $post->ID, $taxonomy_slug );
 
        if ( ! empty( $terms ) ) {
            $out[] = "<h6>" . $taxonomy->label . "</h6>\n<ul>";
            foreach ( $terms as $term ) {
                $out[] = sprintf( '<li><a href="%1$s">%2$s</a></li>',
                    esc_url( get_term_link( $term->slug, $taxonomy_slug ) ),
                    esc_html( $term->name )
                );
            }
            $out[] = "\n</ul>\n";
        }
    }
    return implode( '', $out );
}

//onlist-categories shortcode callback
// https://codex.wordpress.org/Function_Reference/get_terms
function onlist_display_category_widget( $atts = null, $content = null ) 
{ 
    $hiterms = get_terms("onlist-taxonomy", array(
                         "orderby" => "slug", "parent" => 0)); ?>
    
    <ul class="onlist-list-unstyled">
    <?php foreach($hiterms as $key => $hiterm) : ?>
        <li><?php echo '<a href="' . esc_url( get_term_link( $hiterm->slug, 
                      $hiterm->taxonomy ) ) . '">' . $hiterm->name . '</a>'; ?>
            <?php //echo $hiterm->name; ?>
            <?php $loterms = get_terms("onlist-taxonomy", 
            array("orderby" => "slug", "parent" => $hiterm->term_id)); ?>
            <?php if($loterms) : ?>
                <ul class="has-children"><?php 
                    foreach($loterms as $key => $loterm) :  
                    echo '<li><a href="' . esc_url( get_term_link( $loterm->slug, 
                         $loterm->taxonomy ) ) . '">' . $loterm->name . '</li>';  
                    endforeach; ?> 
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>
<?php 
}

//display cats on pages
function onlist_show_children_cats($class) {

   $hiterms = get_terms( "onlist-taxonomy", array(
                         "orderby" => "slug", "parent" => 0)); ?>

   <ul class="<?php echo $class; ?>">
    <?php foreach($hiterms as $key => $hiterm) : ?>
        <li><?php echo '<a href="' . esc_url( get_term_link( $hiterm->slug, 
                                   $hiterm->taxonomy ) ) . '">' . $hiterm->name . '</a>'; ?>
            <?php //echo $hiterm->name; ?>
            <?php $loterms = get_terms("onlist-taxonomy", array("orderby" => "slug", "parent" => $hiterm->term_id)); ?>
            <?php if($loterms) : ?>
                <ul><?php 
                    foreach($loterms as $key => $loterm) :  
                    echo '<li><a href="' . esc_url( get_term_link( $loterm->slug, 
                                   $loterm->taxonomy ) ) . '">' . $loterm->name . '</li>';  
                    endforeach; ?> 
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>
<?php 
}

//add hellipsis to end of post excerpt
function onlist_custom_excerpt() 
{ 
    $options = get_option('onlistadmin');
    $length  = ( $options['onlist_excerpt'] !='') ? $options['onlist_excerpt'] : '55';

    $excerpt = get_the_excerpt();
        return substr( $excerpt, 0, $length ) . '&hellip;'; 
}
 
// turn on comments for CPT    
function onlist_default_comments_on( $data ) {
    if( $data['post_type'] == 'onllist_post' ) {
        $data['comment_status'] = 1;
    }

    return $data;
}
add_filter( 'wp_insert_post_data', 'onlist_default_comments_on' );    
