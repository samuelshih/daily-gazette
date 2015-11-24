<?php
/*
  The template for displaying attachments.
 */
get_header();
?>
<div class="page-top-bg">
    <div class="container">
        <div class="row">
            <div class="brd-crm"><h1>Attachments</h1></div>
        </div>
    </div>
    <?php if (woodpecker_get_option('woodpecker_headbg') != '') { ?>
        <img src="<?php echo woodpecker_get_option('woodpecker_headbg'); ?>">
    <?php } else { ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/page-top-bg.jpg">
    <?php } ?>
    <div class="top-bg-mask">
        <?php if (woodpecker_get_option('woodpecker_headbg') != '') { ?>
            <img src="<?php echo woodpecker_get_option('woodpecker_headbg'); ?>">
        <?php } else { ?><img src="<?php echo get_template_directory_uri(); ?>/images/page-top-bg.jpg"><?php } ?>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="page-post-container-wrapper">
            <div class="col-lg-16 col-md-16 col-sm-16">

                <!-- ----------------Post loop starts --------------------- -->

                <div class="post">
                    <div class="post-heading">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <p>
                        <a href="<?php echo get_permalink($post->post_parent); ?>" title="<?php esc_attr(printf(WOODPECKER_RETURN_TO_PREVIUS, get_the_title($post->post_parent))); ?>" rel="gallery">
                            <?php
                            /* translators: %s - title of parent post */
                            printf(__('<span>&larr;</span> %s', 'woodpecker'), get_the_title($post->post_parent));
                            ?>
                        </a>
                    </p>
                    <p>
                        <?php
                        printf(WOODPECKER_BY_AUTHOR, 'meta-prep meta-prep-author', sprintf('<a class="url fn n" href="%1$s" title="%2$s">%3$s</a>', get_author_posts_url(get_the_author_meta('ID')), sprintf(esc_attr__('Post View View', 'woodpecker'), get_the_author()), get_the_author()
                        ));
                        ?>
                        <span>|</span>
                        <?php
                        printf(WOODPECKER_PUBLISHED_BY_AUTHOR, 'meta-prep meta-prep-entry-date', sprintf('<abbr title="%1$s">%2$s</abbr>', esc_attr(get_the_time()), get_the_date()
                        ));
                        if (wp_attachment_is_image()) {
                            echo ' | ';
                            $metadata = wp_get_attachment_metadata();
                            printf(WOODPECKER_FULL_SIZE_IS_PIXEL, sprintf('<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>', wp_get_attachment_url(), esc_attr(WOODPECKER_LINK_TO_FULL_SIZE), $metadata['width'], $metadata['height']));
                        }
                        ?>
                        <?php edit_post_link(WOODPECKER_EDIT, '', ''); ?>
                    </p>
                    <!-- ---------------------------------- -->
                    <?php
                    if (wp_attachment_is_image()) {
                        $attachments = array_values(get_children(array('post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID')));
                        foreach ($attachments as $k => $attachment) {
                            if ($attachment->ID == $post->ID) {
                                break;
                            }
                        }
                        $k++;
                        // If there is more than 1 image attachment in a gallery
                        if (count($attachments) > 1) {
                            if (isset($attachments[$k])) { // get the URL of the next image attachment
                                $next_attachment_url = get_attachment_link($attachments[$k]->ID);
                            } else { // or get the URL of the first image attachment
                                $next_attachment_url = get_attachment_link($attachments[0]->ID);
                            }
                        } else {
                            // or, if there's only 1 image attachment, get the URL of the image
                            $next_attachment_url = wp_get_attachment_url();
                        }
                        ?>
                        <p><a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr(get_the_title()); ?>" data-lightbox="roadtrip">
                                <?php
                                $attachment_size = apply_filters('buessnessgrow_attachment_size', 900);
                                echo wp_get_attachment_image($post->ID, array($attachment_size, 9999)); // filterable image width with, essentially, no limit for image height.
                                ?>
                            </a></p>


                        <nav id="nav-single"> <span class="nav-previous">
                                <?php next_posts_link(WOODPECKER_OLDER_POSTS); ?>
                            </span> <span class="nav-next">
                                <?php previous_posts_link(WOODPECKER_NEWER_POSTS); ?>
                            </span> </nav>

                    <?php } else { ?>
                        <p>
                            <a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr(get_the_title()); ?>" data-lightbox="roadtrip"><?php echo basename(get_permalink()); ?></a></p>
                    <?php } ?>
                    <?php wp_link_pages(array('before' => '' . WOODPECKER_PAGES_COLON, 'after' => '')); ?>
                    <?php woodpecker_posted_in(); ?>
                    <?php edit_post_link(WOODPECKER_EDIT, ' ', ''); ?>
                </div>

                <!-- ------------------Post loop ends----------------------- -->
                <!-- ------------------Comment starts ----------------------- -->
                <?php comments_template(); ?>
                <!-- ------------------Comment Ends----------------------- -->


            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>