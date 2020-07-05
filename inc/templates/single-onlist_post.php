<?php 
get_header(); ?>

<div class="olclearfix"></div>

<div id="onlist-entry">
<hr><br>

<?php include( plugin_dir_path( __FILE__ ) . '/onlist-global-options.php'); ?>

    <?php 
    if (have_posts()) : 
              while (have_posts()) : the_post(); ?>

        <?php include( plugin_dir_path( __FILE__ ) . '/content-single.php'); ?>

    <?php 
    endwhile; //ends while loop
       // Restore original post data.
    wp_reset_postdata(); ?>
    <?php else : 
    
        echo esc_html__( 'Nothing found', 'onlist' ); ?>

    <?php endif; ?>
  

<br><hr> 
</div>
<div class="olclearfix"></div>

<?php if ( $onlist_after_content != '' ) { ?>
<div class="onlist-after-content">
<?php echo trim($onlist_after_content); ?>
</div>
<?php } ?>

<?php get_footer(); ?>
