<!DOCTYPE html>
<html <?php language_attributes(); ?> data-useragent="Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="top-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-24">
                        <div id="logo">
                   <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
                      <p><?php bloginfo('description'); ?>

                        </div>
                    </div>
                    </div>
            </div>
        </div>
        <?php
        /**
         * The Header for our theme
         *
         * Displays all of the <head> section and everything up till <div id="main">
         *
         */
        ?>
        <div class="nav-wrapper">
            <div class="nav-border-container">
                <div class="container">
                    <div class="mobile-menu">
<?php woodpecker_nav(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slide show speed starts here -->	
        <input type="hidden" id="txt_menu" value="<?php if (woodpecker_get_option('woodpecker_nav_txt') != '') { ?><?php echo stripslashes(woodpecker_get_option('woodpecker_nav_txt')); ?><?php } else { ?>MENU<?php } ?>"/>