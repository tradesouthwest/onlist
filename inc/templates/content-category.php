<li class="onlist-cat-list">
    <article id="post-<?php the_ID(); ?>" class="onlist-excerpt">
        <header class="onlist-archive-heading">
            <h2 class="onlist-entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title( $post_id ) ); ?>"><?php the_title(); ?></a></h2>
        </header>
        <div class="onlist-archive-inner">
            <figure class="onlist-featured-image">
                <span><?php echo '<a href="' . get_permalink( $post_id ) . '" 
                    alt="' . esc_attr( get_the_title( $post_id ) ) . '">'; ?>
                    <?php the_post_thumbnail( array(100, 100) ); ?></a></span>
            </figure>
            <div class="content-cats">
            
                    <?php the_excerpt(); ?>

            </div>  
        </div>          
    </article>
</li>
