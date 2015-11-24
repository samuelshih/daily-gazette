<!-- Start the Loop. -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>  
        <!-- ---------------Post starts ---------------- -->
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post-heading">
                <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
            </div>
            <div class="post-meta">
                <ul>
                    <li class="meta-admin"><?php the_author_posts_link(); ?></li>
                    <li class="meta-date"><?php echo get_the_time('M j, Y') ?></li>
                    <li class="meta-cat"><?php the_category(', '); ?></li>
                    <li class="meta-comm"><?php comments_popup_link('0', '1', '%'); ?></li>
                </ul>
            </div>
            <div class="thumb clear">
                <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                    <?php
                } else {
                    echo woodpecker_main_image();
                }
                ?>	
            </div>
            <div class="post-content clear">
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink() ?>" class="wpanch"><?php _e('Read More...', 'woodpecker'); ?></a>
            </div>
        </div>
        <?php
    endwhile;
else:
    ?>
    <div>
        <p>
            <?php _e('Sorry no post matched your criteria', 'woodpecker'); ?>
        </p>
    </div>
<?php endif; ?>
<!--End Loop-->
<!----------------------Post 2-------------------------->