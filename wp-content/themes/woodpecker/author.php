<?php
/**
 * The template for displaying Author pages.
 *
 */
get_header();
?>
<!-- ----------------------------------------------- -->
<!-- ---------------Author template ------------------ -->
<!-- ----------------------------------------------- -->

<!----------------------Post 1-------------------------->
<div class="page-top-bg">
    <div class="container">
        <div class="row">
            <div class="brd-crm"><h1><?php if (function_exists('woodpecker_breadcrumbs')) woodpecker_breadcrumbs(); ?></h1></div>
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
                <?php if (have_posts()) : the_post(); ?>
                    <h1><?php printf(WOODPECKER_AUTHOR_ARCHIVES, "<a class='url fn n' href='" . get_author_posts_url(get_the_author_meta('ID')) . "' title='" . esc_attr(get_the_author()) . "' rel='me'>" . get_the_author() . "</a>"); ?></h1>
                    <?php
                    // If a user has filled out their description, show a bio on their entries.
                    if (get_the_author_meta('description')) :
                        ?>
                        <?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('twentyten_author_bio_avatar_size', 60)); ?>
                        <h2><?php printf(WOODPECKER_ABOUT_AUTHOR, get_the_author()); ?></h2>
                        <?php the_author_meta('description'); ?>
                    <?php endif; ?>
                    <?php
                    /* Since we called the_post() above, we need to
                     * rewind the loop back to the beginning that way
                     * we can run the loop properly, in full.
                     */
                    rewind_posts();
                    /* Run the loop for the author archive page to output the authors posts
                     * If you want to overload this in a child theme then include a file
                     * called loop-author.php and that will be used instead.
                     */
                    get_template_part('loop', 'author');
                    ?> 
                <?php endif; ?>
                <!-- ------------------Post loop ends----------------------- -->

            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>

<!-- -----------------------Blog template ------------------------- -->

<!-- --------------- -->
<!-- -FOOTER Starts- -->
<!-- --------------- -->
<?php get_footer(); ?>