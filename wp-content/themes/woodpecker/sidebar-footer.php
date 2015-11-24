<?php
/**
 * The Footer Sidebar
 *
 *
 */
?>

<!-- -------- Footer Sidebar Starts ------------>
<div class="footer-wrapper">
    <div class="container">
        <div class="row">
            <div class="footer">
                <!-- -------- Footer Column 1 ------------>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer-column-first">
                        <?php if (is_active_sidebar('first-footer-widget-area')) : ?>
                            <?php dynamic_sidebar('first-footer-widget-area'); ?>
                        <?php else : ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- -------- Footer Column 2 ------------>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer-column-second">
                        <?php if (is_active_sidebar('second-footer-widget-area')) : ?>
                            <?php dynamic_sidebar('second-footer-widget-area'); ?>
                        <?php else : ?> 
                        <?php endif; ?>
                    </div>
                </div>

                <!-- -------- Footer Column 3 ------------>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer-column-third">
                        <?php if (is_active_sidebar('third-footer-widget-area')) : ?>
                            <?php dynamic_sidebar('third-footer-widget-area'); ?>
                        <?php else : ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- -------- Footer Column 4 ------------>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer-column-last">
                        <?php if (is_active_sidebar('fourth-footer-widget-area')) : ?>
                            <?php dynamic_sidebar('fourth-footer-widget-area'); ?>
                        <?php else : ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- -------- Footer Sidebar Ends ------------>
