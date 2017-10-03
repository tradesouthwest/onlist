<li><article id="post-<?php the_ID(); ?>" class="onlist-excerpt">
        <header>
            <h2 class="onlist-entry-title"><?php the_title(); ?></h2>
        </header>
        <figure class="onlist-featured-image">
            <span><?php the_post_thumbnail('thumbnail'); ?></span>
        </figure>
        <div class="content-cats">
        
                <?php the_excerpt(); ?>
                
        </div>
        
        <div class="alignright">
            <a class="readon-link" href="<?php the_permalink(); ?>">
            <?php echo esc_html( $onlist_introline ); ?></a>
        </div>              
        
    </article></li>
