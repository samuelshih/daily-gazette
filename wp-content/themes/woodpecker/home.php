<?php get_header(); ?>
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
                <?php
                $limit = get_option('posts_per_page');
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $wp_query->query('showposts=' . $limit . '&paged=' . $paged);
                $wp_query->is_archive = true;
                $wp_query->is_home = false;
                ?>
                <!-- ----------------Post loop starts --------------------- -->

                <?php get_template_part('loop', 'blog'); ?> 

                <nav id="nav-single"> <span class="nav-previous">
                        <?php next_posts_link(__('&larr; Older posts', 'woodpecker')); ?>
                    </span> <span class="nav-next">
                        <?php previous_posts_link(__('Newer posts &rarr;', 'woodpecker')); ?>
                    </span> </nav>
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