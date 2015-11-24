<?php

$functions_path = get_template_directory() . '/functions/';
include_once get_template_directory() . '/functions/inkthemes-functions.php';
/* These files build out the options interface.  Likely won't need to edit these. */
require_once ($functions_path . 'admin-functions.php');  // Custom functions and plugins
require_once ($functions_path . 'admin-interface.php');  // Admin Interfaces 
require_once ($functions_path . 'define_template.php'); // language
require_once ($functions_path . 'theme-options.php');   // Options panel settings and custom settings
/* ----------------------------------------------------------------------------------- */
/* jQuery Enqueue */
/* ----------------------------------------------------------------------------------- */

function woodpecker_wp_enqueue_scripts() {
    if (!is_admin()) {
        wp_enqueue_style('woodpecker-style', get_stylesheet_uri());
        wp_enqueue_script('woodpecker-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'));
        wp_enqueue_script('woodpecker-modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array('jquery'));
        wp_enqueue_script('woodpecker-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'));
        wp_enqueue_script('woodpecker-mobileslicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '', true);
        if (is_singular() and get_site_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
}

add_action('wp_enqueue_scripts', 'woodpecker_wp_enqueue_scripts');

//
/**
 * Load plugin notification file
 */
require_once(get_template_directory() . '/functions/plugin-activation.php');
require_once(get_template_directory() . '/functions/inkthemes-plugin-notify.php');
add_action('tgmpa_register', 'woodpecker_plugins_notify');


function woodpecker_get_option($name) {
    $options = get_option('woodpecker_options');
    if (isset($options[$name]))
        return $options[$name];
}

//
function woodpecker_update_option($name, $value) {
    $options = get_option('woodpecker_options');
    $options[$name] = $value;
    return update_option('woodpecker_options', $options);
}

//
function woodpecker_delete_option($name) {
    $options = get_option('woodpecker_options');
    unset($options[$name]);
    return update_option('woodpecker_options', $options);
}

add_theme_support('custom-background');

// Replaces the excerpt "more" text by a link
function woodpecker_remove_continue_reading() {
    global $post;
    return '...';
}

add_filter('excerpt_more', 'woodpecker_remove_continue_reading');
