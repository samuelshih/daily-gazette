<?php
/**
  /**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Fourteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 *
 */
get_header();
?>
<!-- ----------------------------------------------- -->
<!-- ---------------Archive template ------------------ -->
<!-- ----------------------------------------------- -->

<!----------------------Post 1-------------------------->
<div class="page-top-bg">
    <div class="container">
        <div class="row">
            <div class="brd-crm"><h1><?php printf('' . single_tag_title('', true) . ''); ?></h1></div>
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
                <!-- ----------------Archives loop starts --------------------- -->

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
                    get_template_part('loop', 'tag');
                    ?>
                    <nav id="nav-single"> <span class="nav-previous">
                            <?php next_posts_link(WOODPECKER_OLDER_POSTS); ?>
                        </span> <span class="nav-next">
                            <?php previous_posts_link(WOODPECKER_NEWER_POSTS); ?>
                        </span> </nav>
                <?php endif; ?>
                <!-- ------------------Archives loop ends----------------------- -->

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