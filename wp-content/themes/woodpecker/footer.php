<?php get_sidebar('footer'); ?>
<div class="footer-copyright-wrapper">
    <div class="container">
        <div class="row">
            <div class="copyright-container col-lg-18 col-md-18 col-sm-18">
			<p><a href="<?php echo esc_url('http://www.wordpress.org'); ?>" rel="generator"><?php _e('Proudly powered by WordPress', 'woodpecker'); ?></a>
                        <span class="sep">&nbsp;|&nbsp;</span>
                        <?php printf(__('%1$s by %2$s.', 'woodpecker'), 'WoodPecker', '<a href="'.esc_url('http://inkthemes.com/') .'" rel="designer">InkThemes</a>'); ?></p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="footer-social-icons">
                    <ul>
                        <?php if (woodpecker_get_option('woodpecker_facebook') != '') { ?>
                            <li class="ftr-fb"><a href="<?php echo woodpecker_get_option('woodpecker_facebook'); ?>" target="_blank"></a></li>
                        <?php
                        } if (woodpecker_get_option('woodpecker_facebook') != '') { ?>
                            <li class="ftr-tw"><a href="<?php echo woodpecker_get_option('woodpecker_facebook'); ?>" target="_blank"></a></li>
                        <?php
                        } 
						if (woodpecker_get_option('woodpecker_facebook') != '') { ?>
                        <li class="ftr-gp"><a href="<?php echo woodpecker_get_option('woodpecker_facebook'); ?>" target="_blank"></a></li>
                        <?php
                        } 
						if (woodpecker_get_option('woodpecker_facebook') != '') { ?>
                            <li class="ftr-rs"><a href="<?php echo woodpecker_get_option('woodpecker_facebook'); ?>" target="_blank"></a></li>
                        <?php
                        }
						if (woodpecker_get_option('woodpecker_facebook') != '') { ?>
                        <li class="ftr-pn"><a href="<?php echo woodpecker_get_option('woodpecker_facebook'); ?>" target="_blank"></a></li>
                        <?php
                        }
						if (woodpecker_get_option('woodpecker_linkedin') != '') { ?>
                        <li class="ftr-ln"><a href="<?php echo woodpecker_get_option('woodpecker_linkedin'); ?>" target="_blank"></a></li>
<?php
}
?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- -------- Footer Copyright Ends ------------>
<!-- ------------- -->
<!-- -FOOTER Ends- -->
<!-- ------------- -->
<?php wp_footer(); ?>
</body>
</html>