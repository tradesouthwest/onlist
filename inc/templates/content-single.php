<?php 
/**
 * singular template content
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'onlist-single' ) ?>>
    <div class="entry-details">
    <div class="onlist-topdetails">
    <header>
        <h2 class="onlist-entry-title"><?php the_title(); ?></h2>
    </header>
        <figure class="onlist-featured-image">
            <span><?php the_post_thumbnail('thumbnail'); ?></span>
        </figure>
        <div class="entry_content">
        
                <?php the_content(); ?>

        </div>
    </div>
        <div class="onlist-page-fields">
            <div class="onlist-left">
            <?php if( $onlist_acountry != '' ) : ?>
            <p><span class="onlist_country"><strong><?php 
            echo esc_html( $onlist_acountry ); ?></strong> 
            <?php echo esc_html( $onlist_country ); ?></span></p>
            <?php endif; ?>            
            <?php if( $onlist_phone != '' ) : ?>
            <p><label><?php echo esc_html__( 'Phone ', 'onlist' ); ?></label>
            <span itemprop="telephone" class="onlist_phone">
               <a href="tel:<?php echo esc_attr( $onlist_phone ); ?>" 
                  rel="nofollow" 
            title="<?php echo esc_attr( $onlist_phone ); ?>"><?php echo 
            esc_html( $onlist_phone ); ?></a></span></p>
            <?php endif; ?>
            <p><?php if( $onlist_aaddress != '' ) : ?>
            <label><?php echo esc_html_e( $onlist_aaddress ); ?></label> 
            <span class="onlist_address"><?php echo esc_html( $onlist_address ); ?></span> 
            <?php endif; ?>
            <?php if( $onlist_acity != '' ) : ?> 
            <label><?php echo esc_html_e( $onlist_acity ); ?></label> 
            <span class="onlist_city"><?php echo esc_html( $onlist_city ); ?></span> 
            <?php endif; ?>
            <?php if( $onlist_astate != '' ) : ?> 
            <label><?php echo esc_html_e( $onlist_astate ); ?></label> 
            <span class="onlist_state"><?php echo esc_html( $onlist_state ); ?></span> 
            <?php endif; ?>
            <?php if( $onlist_azip != '' ) : ?> 
            <span class="onlist_zipcode"><?php echo esc_html( $onlist_zipcode ); ?></span>
            <?php endif; ?></p>

            </div>

            <div class="onlist-right">
            
            <p><label><?php echo esc_html__( 'EMail ', 'onlist' ); ?></label>
            <span class="onlist_email"><a href="mailto:<?php echo esc_attr( $onlist_email ); ?>" 
            title="<?php echo esc_attr( $onlist_email ); ?>"><?php echo esc_html( $onlist_email ); ?></a>
            </span></p>

            <p><label><?php echo esc_html__( 'Website ', 'onlist' ); ?></label>
            <span class="onlist_website"><a href="<?php echo esc_url( $onlist_website ); ?>" 
            title="<?php esc_attr( $onlist_website ); ?>" target="_blank">
            <?php echo esc_html( $onlist_website ); ?></a></span></p>
	
            <p><label><?php echo esc_html($onlist_othername); ?> </label>
            <span class="onlist_other"><?php echo esc_html( $onlist_other ); ?></span></p>
            <p><label><?php esc_html_e( 'Listed under ', 'onlist' ); ?></label> 
            <span class="onlist_cat">
            <?php //$id, $taxonomy, $before, $sep, $after 
                    printf( get_the_term_list( $post->ID, 
                    'onlist-taxonomy', '<em>', ' | ', '</em>' )); ?></span></p>
            </div>

        </div>
    <?php if ( $onlist_options['onlist_showmap'] == "yes" ) {  
 
    $gurl = esc_url("https://maps.googleapis.com/maps/api/js?key=$onlist_options_4");  
    ob_start();
    echo '<div class="clearfix"></div>
        <div class="onlist-mapwrapper">
        <br>
        <hr>
        <div class="onlist-mapcontainer" style="height:' . ($onlist_options_3 + 50) .'px;">
        <p>'. $onlist_address . ' ' . $onlist_city .' ' . $onlist_state .' '. $onlist_zipcode . '</p>
        <div id="ezgMaps" style="width:' . $onlist_options_2 .'px; height:' . $onlist_options_3 .'px;" 
        class="'. $onlist_options_1 .'"></div>
        </div><div class="clearfix">
        </div>
        </div>        
   <script src="'.$gurl.'"></script>
    <script type="text/javascript">
    var address = "'. $onlist_address .' '.  $onlist_zipcode .'";

   	var map = new google.maps.Map(document.getElementById("ezgMaps"), { 
        mapTypeId: google.maps.MapTypeId.TERRAIN,
        zoom: 15
    });

    var geocoder = new google.maps.Geocoder();

    geocoder.geocode({
       "address": address
    }, 
    function(results, status) {
       if(status == google.maps.GeocoderStatus.OK) {
          new google.maps.Marker({
             position: results[0].geometry.location,
             map: map
          });
          map.setCenter(results[0].geometry.location);
       }
    });</script>';
    
    $output = ob_get_clean();
    printf( $output ); 
    } 
 
?>
    <footer class="onlist-meta-footer">
    <hr>
    <?php 
    //$onlistcomm =  plugin_dir_path( __FILE__ ) . '/comments.php'; 
     comments_template(); ?>
    <nav class="pagination">
        <?php wp_link_pages(); ?>
    </nav>  
    
    </footer>
    </div>
</article>  
