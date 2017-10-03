<?php 
get_header(); ?>

<?php if ( $onlist_before_content != '' ) 
{ ?>
<div class="onlist-before-content">

    <?php echo trim($onlist_before_content); ?>

</div>
<?php 
} ?>
<?php 
 
//options and meta post data
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
$onlist_ppp       = $onlist_options['onlist_perpg'];               //listing/pg
$onlist_before_content = $onlist_configs['onlist_before_content'];
$onlist_after_content  = $onlist_configs['onlist_after_content'];
$onlist_options_1 = 'block';                                  // map display/not 
$onlist_options_2 = $onlist_options['onlist_mapwidth'];      // map w
$onlist_options_3 = $onlist_options['onlist_mapheight'];     // map h
$onlist_options_4 = $onlist_options['onlist_gapikey'];     // gmaps key
$onlist_othername = $onlist_options['onlist_othername'];  //other field
$onlist_introline = $onlist_options['onlist_introline']; //read more

//listing fields
$onlist_acountry = $onlist_lists['onlist_acountry'];
$onlist_aaddress = $onlist_lists['onlist_aaddress'];
$onlist_acity = $onlist_lists['onlist_acity'];
$onlist_astate = $onlist_lists['onlist_astate'];
$onlist_azip = $onlist_lists['onlist_azip']; 
?>

<div id="onlist-entry">
<hr><br>

<?php 
if( is_single() ) : 
?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
        <?php include( plugin_dir_path( __FILE__ ) . '/content-single.php'); ?>

    <?php 
    endwhile; //ends while loop
       // Restore original post data.
    wp_reset_postdata();
    else : 
    
        echo esc_html__( 'Nothing found', 'onlist' );

    endif; 
    ?>
   
    <?php 
    // ends if single
    // starts if category or taxonomy 
    elseif( is_tax() ) : 
    ?> 
    <?php 
    $categories = get_the_terms($post->ID, 'onlist-taxonomy');
    foreach($categories as $category)
        //if($category->slug != 'categories' && $category->slug != 'category')
        
            echo '<h3>'.$category->name .'</h3><br>'; 

            $args = array('post_type' => 'onlist_post',
                        'posts_per_page' => -1,
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'tax_query'=> array(
                            array(
                            'taxonomy'=>'onlist-taxonomy',
                            'field' =>'slug',
                            'terms' => $category
                            ) )
                    );

            $query = new WP_Query( $args );
    ?>
    <ul class="onlist-catlist">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    
        <?php include( plugin_dir_path( __FILE__ ) . '/content-category.php'); ?>
    
    <?php endwhile; 
    //ends while loop
    echo '</ul>';       
    // Restore original post data.
    wp_reset_postdata();
    print('<div class="olblock">');

    //printf( onlist_show_children_cats());   

    print('</div>');
    ?>

<?php endif; 
      //ends page choice 
?>

<br><hr> 
</div>
<div class="olclearfix"></div>

<?php if ( $onlist_after_content != '' ) { ?>
<div class="onlist-after-content">
<?php echo trim($onlist_after_content); ?>
</div>
<?php } ?>


<?php get_footer(); ?>
