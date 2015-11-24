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

                <!-- ---------------Post starts ---------------- -->
                <div class="post">
                    <div class="post-heading">
                        <h1><?php _e('This is somewhat embarrassing, isn&rsquo;t it?', 'woodpecker'); ?></h1>
                    </div>

                    <div class="post-content clear">
                        <p>
                            <?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Trying one of the links below, can help.', 'woodpecker'); ?>
                        </p>
                        <?php the_widget('WP_Widget_Recent_Posts', array('number' => 10), array('widget_id' => '404')); ?>

                        <div class="widget">
                            <h2 class="widgettitle">
                                <?php _e('Most Used Categories', 'woodpecker'); ?>
                            </h2>
                            <ul>
                                <?php wp_list_categories(array('orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10)); ?>
                            </ul>
                        </div>
                        <?php
                        /* translators: %1$s: smilie */
                        $archive_content = '<p>' . sprintf(__('Try looking in the monthly archives. %1$s', 'woodpecker'), convert_smilies(':)')) . '</p>';
                        the_widget('WP_Widget_Archives', array('count' => 0, 'dropdown' => 1), array('after_title' => '</h2>' . $archive_content));
                        ?>
                        <?php the_widget('WP_Widget_Tag_Cloud'); ?>

                    </div>
                </div>

                <!--End Loop-->

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