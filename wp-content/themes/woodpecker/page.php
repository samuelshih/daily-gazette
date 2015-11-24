<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 */
get_header();
?>
<!-- ----------------------------------------------- -->
<!-- -------------- Page Single template ------------------ -->
<!-- ----------------------------------------------- -->

<!---------------------- Page Single Starts -------------------------->
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
                <div class="page clear">
                    <?php if (have_posts()) while (have_posts()) : the_post(); ?>
                            <div class="page-heading clear">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <div class="page-content clear">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <!----------------------Page Ends -------------------------->
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

<!-- -----------------------Page template ------------------------- -->



<!-- --------------- -->
<!-- -FOOTER Starts- -->
<!-- --------------- -->
<?php get_footer(); ?>