<?php
/**
 * The Template for displaying all single posts
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */
get_header();
?>
<!-- ----------------------------------------------- -->
<!-- -------------- Post Single template ------------------ -->
<!-- ----------------------------------------------- -->

<!---------------------- Post Single Starts -------------------------->
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
                <!-- Start the Loop. -->
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>  
                        <!-- ---------------Post starts ---------------- -->
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="post-heading">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <div class="post-meta">
                                <ul>
                                    <li class="meta-admin"><?php the_author_posts_link(); ?></li>
                                    <li class="meta-date"><?php echo get_the_time('M j, Y') ?></li>
                                    <li class="meta-cat"><?php the_category(', '); ?></li>
                                    <li class="meta-comm"><?php comments_popup_link('0', '1', '%'); ?></li>
                                </ul>
                            </div>
                            <div class="post-content clear">
                                <?php the_content(); ?>
                                <?php wp_link_pages(array('before' => '<div class="clear"></div><div class="page-link"><span>' . WOODPECKER_PAGES_COLON . '</span>', 'after' => '</div>')); ?>
                            </div>
                        </div>
                        <?php
                    endwhile;
                else:
                    ?>
                    <div>
                        <p>
                            <?php echo WOODPECKER_SORRY_NO_POST_MATCHED_YOUR_CRETERIA; ?>
                        </p>
                    </div>
                <?php endif; ?>
                <!--End Loop-->
                <nav id="nav-single"> <span class="nav-previous">
                        <?php previous_post_link('%link', __('<span class="meta-nav">&larr;</span> Previous Post ', 'woodpecker')); ?>
                    </span> <span class="nav-next">
                        <?php next_post_link('%link', __('Next Post <span class="meta-nav">&rarr;</span>', 'woodpecker')); ?>
                    </span> </nav>
                <!----------------------Post Single Ends -------------------------->
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

<!-- -----------------------Single template ------------------------- -->

<!-- --------------- -->
<!-- -FOOTER Starts- -->
<!-- --------------- -->
<?php get_footer(); ?>