<?php 
/**
 * @since ver: 1.0.0
 * Author: Tradesouthwest
 * Author URI: http://tradesouthwest.com
 * @package onlist
 * @subpackage public/onlist-public-view
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
        while ( $loop->have_posts() ) : $loop->the_post(); ?>

<?php include( plugin_dir_path( __FILE__ ) . '/onlist-public-options.php'); ?>

                <div class="onlist-entry">
                
               <div class="onlist-title-wide">
                    <h2> <a href="<?php the_permalink(); ?>">
                    <?php echo get_the_title(); ?></a></h2>
                </div> 
                <?php if ( has_post_thumbnail() ) { ?>
                
                    <div class="onlist-thumb">
                        <a href="<?php the_permalink(); ?>" 
                        title="<?php the_title_attribute(); ?>">
                               <?php the_post_thumbnail(array(150, 9999)); ?></a>
                    </div>
              <div class="entry-excerpt">
        
                    <?php echo esc_html( onlist_custom_excerpt() ); ?>

                </div>
                
                  <?php } else { ?>
               

                <div class="entry-excerpt">
        
                    <?php echo esc_html( onlist_custom_excerpt() ); ?>

                </div>
                                <?php } ?> 
                <div class="onlist-page-fields">
                    <div class="onlist-info">

                    <p><span class="onlist_country"><strong><?php 
                    echo esc_html( $onlist_acountry ); ?> &gt; </strong>
                        <?php echo $onlist_country; ?></span></p>
            
                    <?php if( $onlist_address != '' ) : ?>
                    <p><label class="onlist-address-lable"><?php echo esc_html( 
                                                $onlist_aaddress); ?> </label>
                    <span class="onlist_address"> <?php echo esc_html( 
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
                        <span class="onlist-readon">
                        <a class="readon-link" href="<?php the_permalink(); ?>">
                        <?php echo esc_html( $options_introline ); ?></a></span>              
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
