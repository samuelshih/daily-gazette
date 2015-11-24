<?php
/**
 * The template for displaying Category pages
 *
 */
get_header();
?>
<!-- ----------------------------------------------- -->
<!-- ---------------Blog template ------------------ -->
<!-- ----------------------------------------------- -->

<!----------------------Post 1-------------------------->
<div class="page-top-bg">
    <div class="container">
        <div class="row">
            <div class="brd-crm"><h1><?php printf('' . single_cat_title('', true) . ''); ?></h1></div>
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
                <!-- ----------------Category Page starts --------------------- -->
                <?php if (have_posts()): ?>

                    <?php
                    /* Since we called the_post() above, we need to
                     * rewind the loop back to the beginning that way
                     * we can run the loop properly, in full.
                     */
                    rewind_posts();
                    /* Run the loop for the archives page to output the posts.
                     * If you want to overload this in a child theme then include a file
                     * called loop-archives.php and that will be used instead.
                     */
                    ?>
                    <?php get_template_part('loop', 'category'); ?> 
                    <nav id="nav-single"> <span class="nav-previous">
                            <?php next_posts_link(WOODPECKER_OLDER_POSTS); ?>
                        </span> <span class="nav-next">
                            <?php previous_posts_link(WOODPECKER_NEWER_POSTS); ?>
                        </span> </nav>
                <?php endif; ?>
                <!-- ------------------Category loop ends----------------------- -->

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