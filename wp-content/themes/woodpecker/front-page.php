<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
if ( 'posts' == get_option( 'show_on_front' ) ) {    
 get_header(); ?>
<!-- ------------- -->
<!-- SLIDER Starts -->
<!-- ------------- -->
<div class="slider-wrapper">
    <div id="slider" class="nivoSlider">
        <?php if (woodpecker_get_option('woodpecker_slideimage1') != '') { ?>
            <img src="<?php echo woodpecker_get_option('woodpecker_slideimage1'); ?>" data-thumb="<?php echo woodpecker_get_option('inkthemes_slideimage1'); ?>" alt="" title="#htmlcap-slider1" />
        <?php } else { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/slide_1.jpg" data-thumb="<?php echo get_template_directory_uri(); ?>/images/slide_1.jpg" alt="" title="#htmlcap-slider1" />
        <?php } ?>
        <!-- caption1 -->
        <div class="nivo-caption">
            <div class="slider-caption-container">
                <?php if (woodpecker_get_option('woodpecker_sliderheading1') != '') { ?>
                    <h1 class="slide-h1"><?php echo woodpecker_get_option('woodpecker_sliderheading1'); ?></h1>
                <?php } else { ?>
                    <h1 class="slide-h1"><?php
                        _e('WordPress theme with Bootstrap',
                                'woodpecker')
                        ?></h1>
                <?php } ?>
                <?php if (woodpecker_get_option('woodpecker_sliderdes1') != '') { ?>
                    <p class="slide-para"><?php echo woodpecker_get_option('woodpecker_sliderdes1'); ?></p>
                <?php } else { ?>
                    <p class="slide-para"><?php
                        _e('Woodpecker is completely integrated with Bootstrap 3.0',
                                'woodpecker')
                        ?></p>
                <?php } ?>
                <?php if (woodpecker_get_option('woodpecker_Slider_butotntext1') != '') { ?>
                    <a class="slide-button" href="<?php echo woodpecker_get_option('woodpecker_Slider_buttonlink1'); ?>"><?php echo woodpecker_get_option('woodpecker_Slider_butotntext1'); ?></a>
                <?php } else { ?>
                    <a class="slide-button" href="#"><?php
                        _e('Start Building Your Website Now!',
                                'woodpecker')
                        ?></a>
                <?php } ?>

            </div>
        </div>
        <!-- caption1 ends-->
    </div>





</div>
<!-- Slide show speed starts here -->	
<input type="hidden" id="txt_name" value="<?php if (woodpecker_get_option('woodpecker_slider_speed') != '') { ?><?php echo stripslashes(woodpecker_get_option('woodpecker_slider_speed')); ?><?php } else { ?>3000<?php } ?>"/>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="content-container">
                <!-- Feature page with thumbnail 3column starts -->
                <div class="feature-page-wt-thumb clear">
                    <div class="row">
                        <!-- 3column feature block 1 -->
                        <?php
                        $limit = get_option('posts_per_page');


                        $the_query = new WP_Query(array(
                            'post_type' => 'post',
                            'posts_per_page' => $limit));
                        if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
                                ?>						
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="feature-page-wt-thumb-container gallery">
                                        <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                                        <a href="<?php the_permalink() ?>" rel="bookmark" title=""><?php the_post_thumbnail('woodpecker-blog-thumbnail'); ?></a>

                                        <p><p><?php the_excerpt(); ?></p><a href="<?php the_permalink() ?>" class="wpanch"><?php
                                            _e('Read More...',
                                                    'woodpecker')
                                            ?></a>
                                        </p>
                                    </div>
                                </div>
                                <!-- 3column feature block 1 ends -->
                                <?php
                            endwhile;
                        else:
                            ?>
                            <div><p><?php
                                    _e('Sorry no post matched your criteria',
                                            'woodpecker');
                                    ?></p></div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Feature page with thumbnail 3 column Ends -->

                <!-- -------------------------- -->
                <!-- -FEATURED TAGLINES Starts- -->

                <div class="featured-tagline-wrapper clear">
                    <div class="row">
                        <div class="feature-tagline-container">
                            <?php if (woodpecker_get_option('woodpecker_punchline_heading') != '') { ?>
                                <h1><?php echo woodpecker_get_option('woodpecker_punchline_heading'); ?></h1>
                            <?php } else { ?>
                                <h1><?php
                                    _e('Build Your Clean & Optimized Website Within Few Clicks',
                                            'woodpecker')
                                    ?></h1> <?php } ?>
                            <?php if (woodpecker_get_option('woodpecker_page_tagline_desc') != '') { ?>
                                <p><?php echo woodpecker_get_option('woodpecker_page_tagline_desc'); ?></p>
                            <?php } else { ?>
                                <p><?php
                                    _e('Creating your website with Woodpecker is completely easy. You just need to perform few tweaks in the theme option panel and your website will be ready to use. You can showcase all important aspects of your business here on home page.',
                                            'woodpecker')
                                    ?></p><?php } ?>
                        </div>
                    </div>
                </div>
                <?php get_footer(); 
				} else {
    include( get_page_template() );
	}
		?>