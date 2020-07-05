<?php 
get_header(); ?>

<div class="olclearfix"></div>

<div id="onlist-entry">
<hr><br>

<?php include( plugin_dir_path( __FILE__ ) . '/onlist-global-options.php'); ?>
<?php // starts if category or taxonomy 

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

            $query = new WP_Query( $args ); ?>

    <ul class="onlist-catlist">

    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    
        <?php include( plugin_dir_path( __FILE__ ) . '/content-category.php'); ?>
    
    <?php endwhile; ?>
    </ul><?php        
    // Restore original post data.
    wp_reset_postdata();
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
