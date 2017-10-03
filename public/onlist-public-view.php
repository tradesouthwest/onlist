<?php 
/*
@since ver: 1.0.0
Author: Tradesouthwest
Author URI: http://tradesouthwest.com
@package onlist
@subpackage public/onlist-public-view
*/
 ! defined( 'ABSPATH' ) and exit;

//public view
function onlist_display_public_view( $atts = null, $content = null ) 
{ 

?>
       <div class="onlist-container">
<?php 

//metadata of posts    
global $post;    
$loop = new WP_Query( array( 'post_type' => 'onlist_post' ) );
    if ( $loop->have_posts() ) :
        while ( $loop->have_posts() ) : $loop->the_post(); 
 
$onlist_country = onlist_get_custom_field( 'onlist_country' );
$onlist_country = onlist_get_custom_field( 'onlist_country' );
$onlist_address = onlist_get_custom_field( 'onlist_address' );
$onlist_city    = onlist_get_custom_field( 'onlist_city' );
$onlist_state   = onlist_get_custom_field( 'onlist_state' );
$onlist_zipcode = onlist_get_custom_field( 'onlist_zipcode' );
$onlist_phone   = onlist_get_custom_field( 'onlist_phone' );
$onlist_email   = onlist_get_custom_field( 'onlist_email' );
$onlist_website = onlist_get_custom_field( 'onlist_website' );
$onlist_other   = onlist_get_custom_field( 'onlist_other' );

//option groups 
$onlist_options = get_option('onlistadmin');
$onlist_configs = get_option('onlistinfo');
$onlist_lists   = get_option('onlistlists');

//admin options
$onlist_ppp            = $onlist_options['onlist_perpg'];               //listing/pg
$onlist_before_content = $onlist_configs['onlist_before_content'];
$onlist_after_content  = $onlist_configs['onlist_after_content'];
$onlist_othername = $onlist_options['onlist_othername']; //other field
$onlist_introline = $onlist_options['onlist_introline']; //read more

//listing fields
$onlist_acountry = $onlist_lists['onlist_acountry'];
?>

                <div class="onlist-entry">
                
                <?php if ( has_post_thumbnail() ) { ?>
                
                    <div class="onlist-thumb">
                        <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?></a>
                    </div>
              
                <div class="onlist-title">
                    <h2> <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                </div>
                  <?php } else { ?>
                <div class="onlist-title-wide">
                    <h2> <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                </div> 
                <?php } ?> 
                <div class="entry-excerpt">
        
                    <?php echo esc_html( onlist_custom_excerpt() ); ?>

                </div>
                
                <div class="onlist-page-fields">
                    <div class="onlist-info">
            
                        <?php if( $onlist_acountry != '' ) : ?>
                    <p><span class="onlist_country"><strong><?php 
                    echo esc_html( $onlist_acountry ); ?></strong><br>
                        <?php echo esc_html( $onlist_country ); ?></span></p>              
                        <?php endif; ?>
            
                    <?php if( $onlist_address != '' ) : ?>
                    <p><label><?php echo esc_html_e( 'Address ', 
                                                     'onlist' ); ?></label>
                    <span class="onlist_address"><?php echo esc_html( 
                                                $onlist_address ); ?> </span>
                    <span class="onlist_city"><?php echo esc_html( 
                                                $onlist_city ); ?> </span>
                    <span class="onlist_state"><?php echo esc_html( 
                                                $onlist_state ); ?> </span>
                    <span class="onlist_zipcode"><?php echo esc_html( 
                                                $onlist_zipcode ); ?></span></p>
                    <?php endif; ?> 
            
                    <p><label><?php echo esc_html($onlist_othername); ?> </label>
            <span class="onlist_other"><?php echo esc_html( $onlist_other ); ?></span></p>
            <p><label><?php esc_html_e( 'Listed under ', 'onlist' ); ?></label> 
            <span class="onlist_cat">
            <?php //$id, $taxonomy, $before, $sep, $after 
                    printf( get_the_term_list( $post->ID, 
                    'onlist-taxonomy', '<em>', ' | ', '</em>' )); ?></span></p>
                        <?php //if( $onlist_introline != '' ) : ?>
                        <span class="alignright">
                        <a class="readon-link" href="<?php the_permalink(); ?>">
                        <?php echo esc_html( $onlist_introline ); ?></a></span>              
                        <?php //endif; ?>

                    </div>
                </div>
            
            </div>
        <?php endwhile; ?>
            <?php 
            if ( next_posts_link() || previous_posts_link() ) : 
            ?>
            <div id="nav-below" class="navigation">
                <div class="nav-previous"><?php next_posts_link( 
                __( '<span class="meta-nav">&larr;</span> <<- ', 
                    'onlist' ) ); ?></div>
                <div class="nav-next"><?php previous_posts_link( 
                __( '+>> <span class="meta-nav">&rarr;</span>', 
                    'onlist' ) ); ?></div>
            </div>
            <?php 
            endif; 
            ?>
    <?php 
    endif;
    wp_reset_postdata();
    print ('</div>');
} 

