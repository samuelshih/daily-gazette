<?php
function woodpecker_setup() {
    add_theme_support('post-thumbnails');
    add_image_size('woodpecker-blog-thumbnail', 326, 200, true);
    add_theme_support('automatic-feed-links');
    add_theme_support( "title-tag" );
    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();
    register_nav_menu('custom_menu', WOODPECKER_MAIN_MENU);
    load_theme_textdomain('woodpecker', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'woodpecker_setup');
// Add CLASS attributes to the first <ul> occurence in wp_page_menu
function woodpecker_add_menuclass($ulclass) {
    return preg_replace('/<ul>/', '<ul class="sf-menu" id="menu">', $ulclass, 1);
}
add_filter('wp_page_menu', 'woodpecker_add_menuclass');
function woodpecker_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'custom_menu', 'menu_class' => 'sf-menu', 'menu_id' => 'menu', 'fallback_cb' => 'woodpecker_nav_fallback'));
    else
        woodpecker_nav_fallback();
}
function woodpecker_nav_fallback() {
    ?>
    <ul class="sf-menu" id="menu">
        <?php
        wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
        ?>
    </ul>

    <?php
}
function woodpecker_nav_menu_items($items) {
    if (is_home()) {
        $homelink = '<li class="current_page_item">' . '<a href="' . home_url('/') . '">' . WOODPECKER_HOME . '</a></li>';
    } else {
        $homelink = '<li>' . '<a href="' . home_url('/') . '">' . WOODPECKER_HOME . '</a></li>';
    }
    $items = $homelink . $items;
    return $items;
}
add_filter('wp_list_pages', 'woodpecker_nav_menu_items');
/* ----------------------------------------------------------------------------------- */
/* Breadcrumbs Plugin
  /*----------------------------------------------------------------------------------- */
function woodpecker_breadcrumbs() {
    $delimiter = '&raquo;';
    $home = __( 'Home', 'woodpecker' ); // text for the 'Home' link
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
    echo '<div id="crumbs">';
    global $post;
    $homeLink = esc_url( home_url() );
    echo '<a href="' . esc_url($homeLink) . '">' . $home . '</a> ' . $delimiter . ' ';
    if ( is_category() ) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category( $thisCat );
            $parentCat = get_category( $thisCat->parent );
            if ( $thisCat->parent != 0 )
                    echo(get_category_parents( $parentCat, TRUE, ' ' . $delimiter . ' ' ));
            echo $before . __( 'Archive by category', 'woodpecker') . ' "' . single_cat_title( '', false ) . '"' . $after;
    }
    elseif ( is_day() ) {
            echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . $delimiter . ' ';
            echo '<a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . get_the_time( 'F' ) . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time( 'd' ) . $after;
    } elseif ( is_month() ) {
            echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time( 'F' ) . $after;
    } elseif ( is_year() ) {
            echo $before . get_the_time( 'Y' ) . $after;
    } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                    $post_type = get_post_type_object( get_post_type() );
                    $slug = $post_type->rewrite;
                    echo '<a href="' . esc_url($homeLink . '/' . $slug['slug']) . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
                    echo $before . get_the_title() . $after;
            } else {
                    $cat = get_the_category();
                    $cat = $cat[0];
                    echo get_category_parents( $cat, TRUE, ' ' . $delimiter . ' ' );
                    echo $before . get_the_title() . $after;
            }
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
            $post_type = get_post_type_object( get_post_type() );
            echo $before . $post_type->labels->singular_name . $after;
    } elseif ( is_attachment() ) {
            $parent = get_post( $post->post_parent );
            $cat = get_the_category( $parent->ID );
            $cat = $cat[0];
            echo get_category_parents( $cat, TRUE, ' ' . $delimiter . ' ' );
            echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
    } elseif ( is_page() && !$post->post_parent ) {
            echo $before . get_the_title() . $after;
    } elseif ( is_page() && $post->post_parent ) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ( $parent_id ) {
                    $page = get_page( $parent_id );
                    $breadcrumbs[] = '<a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . get_the_title( $page->ID ) . '</a>';
                    $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse( $breadcrumbs );
            foreach ( $breadcrumbs as $crumb )
                    echo $crumb . ' ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
    } elseif ( is_search() ) {
            echo $before . __( 'Search results for', 'woodpecker' ) . ' "' . get_search_query() . '"' . $after;
    } elseif ( is_tag() ) {
            echo $before . __( 'Posts tagged ', 'woodpecker' ) . '"' . single_tag_title( '', false ) . '"' . $after;
    } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata( $author );
            echo $before . __( 'Articles posted by ', 'woodpecker' ) . $userdata->display_name . $after;
    } elseif ( is_404() ) {
            echo $before . __( 'Error 404', 'woodpecker' ) . $after;
    }
    if ( get_query_var( 'paged' ) ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
                    echo ' (';
            echo __( 'Page', 'woodpecker' ) . ' ' . get_query_var( 'paged' );
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
                    echo ')';
    }
    echo '</div>';
}
/**
 * Shows posts custom image thumbnails
 * @global type $post
 * @global type $posts
 */
function traffica_main_image() {
    global $post, $posts;
    //This is required to set to Null
    $id = '';
    $the_title = '';
    // Till Here
    $permalink = get_permalink($id);
    $homeLink = get_template_directory_uri();
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (isset($matches [1] [0])) {
        $first_img = $matches [1] [0];
    }
    if (empty($first_img)) { //Defines a default image  
    } else {
        print "<a href='".esc_url($permalink)."'><img src='$first_img' width='598px' height='246px' class='postimg wp-post-image' alt='$the_title' /></a>";
    }
}
/* ----------------------------------------------------------------------------------- */
/* Function to call first uploaded image in functions file
/*----------------------------------------------------------------------------------- */
function woodpecker_main_image() {
    global $post, $posts;
    //This is required to set to Null
    $id = '';
    $the_title = '';
    // Till Here
    $permalink = get_permalink($id);
    $homeLink = get_template_directory_uri();
    $first_img = '';
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (isset($matches [1] [0])) {
        $first_img = $matches [1] [0];
    }
    if (empty($first_img)) { //Defines a default image  
    } else {
        print "<a href='$permalink'><img src='$first_img' width='250px' height='160px' class='postimg wp-post-image' alt='$the_title' /></a>";
    }
}
//For Attachment Page
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 */
function woodpecker_posted_in() {
// Retrieves tag list of current post, separated by commas.
    $tag_list = get_the_tag_list('', ', ');
    if ($tag_list) {
        $posted_in = THIS_ENTRY_WAS_POSTED_IN . ' .' . AND_TAGGED . ' %2$s.' . WOODPECKER_BOOKMARK_THE . ' <a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . WOODPECKER_PERMALINK . '</a>.';
    } elseif (is_object_in_taxonomy(get_post_type(), 'category')) {
        $posted_in = THIS_ENTRY_WAS_POSTED_IN . ' %1$s. ' . WOODPECKER_BOOKMARK_THE . ' <a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . WOODPECKER_PERMALINK . '</a>.';
    } else {
        $posted_in = WOODPECKER_BOOKMARK_THE . '<a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . '&nbsp' . WOODPECKER_PERMALINK . '</a>.';
    }
// Prints the string, replacing the placeholders.
    printf(
            $posted_in, get_the_category_list(', '), $tag_list, get_permalink(), the_title_attribute('echo=0')
    );
}
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if (!isset($content_width))
    $content_width = 590;
/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @uses register_sidebar
 */
function woodpecker_widgets_init() {
// Area 1, located at the top of the sidebar.
    register_sidebar(array(
        'name' => WOODPECKER_PRIMARY_WIDGET,
        'id' => 'primary-widget-area',
        'description' => WOODPECKER_THE_PRIMARY_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
    register_sidebar(array(
        'name' => WOODPECKER_SECONDRY_WIDGET,
        'id' => 'secondary-widget-area',
        'description' => WOODPECKER_THE_SECONDRY_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 3, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => WOODPECKER_FIRST_FOOTER_WIDGET,
        'id' => 'first-footer-widget-area',
        'description' => WOODPECKER_THE_FIRST_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 4, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => WOODPECKER_SECONDRY_FOOTER_WIDGET,
        'id' => 'second-footer-widget-area',
        'description' => WOODPECKER_THE_SECONDRY_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 5, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => WOODPECKER_THIRD_FOOTER_WIDGET,
        'id' => 'third-footer-widget-area',
        'description' => WOODPECKER_THE_THIRD_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 6, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => WOODPECKER_FOURTH_FOOTER_WIDGET,
        'id' => 'fourth-footer-widget-area',
        'description' => WOODPECKER_THE_FOURTH_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}
/** Register sidebars by running woodpecker_widgets_init() on the widgets_init hook. */
add_action('widgets_init', 'woodpecker_widgets_init');

/**
 * Pagination
 *
 */
function woodpecker_pagination($pages = '', $range = 2) {
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged))
        $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    if (1 != $pages) {
        echo "<ul class='paging'>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link(1) . "'>&laquo;</a></li>";
        if ($paged > 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a></li>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? "<li><a href='" . get_pagenum_link($i) . "' class='current' >" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a></li>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($pages) . "'>&raquo;</a></li>";
        echo "</ul>\n";
    }
}
/////////Theme Options
/* ----------------------------------------------------------------------------------- */
/* Add Favicon
  /*----------------------------------------------------------------------------------- */
function woodpecker_childtheme_favicon() {
    if (woodpecker_get_option('woodpecker_favicon') != '') {
        echo '<link rel="shortcut icon" href="' . woodpecker_get_option('woodpecker_favicon') . '"/>' . "\n";
    } else {
        ?>
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/images/favicon.ico" />
        <?php
    }
}
add_action('wp_head', 'woodpecker_childtheme_favicon');
/* ----------------------------------------------------------------------------------- */
/* Custom CSS Styles */
/* ----------------------------------------------------------------------------------- */
function woodpecker_of_head_css() {
    $output = '';
    $custom_css = woodpecker_get_option('woodpecker_customcss');
    if ($custom_css <> '') {
        $output .= $custom_css . "\n";
    }
// Output styles
    if ($output <> '') {
        $output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
        echo $output;
    }
}
add_action('wp_head', 'woodpecker_of_head_css');
// activate support for thumbnails
function get_category_id($cat_name) {
    $term = get_term_by('name', $cat_name, 'category');
    return $term->term_id;
}
//Trm excerpt
function woodpecker_trim_excerpt($length) {
    global $post;
    $explicit_excerpt = $post->post_excerpt;
    if ('' == $explicit_excerpt) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
    } else {
        $text = apply_filters('the_content', $explicit_excerpt);
    }
    $text = strip_shortcodes($text); // optional
    $text = strip_tags($text);
    $excerpt_length = $length;
    $words = explode(' ', $text, $excerpt_length + 1);
    if (count($words) > $excerpt_length) {
        array_pop($words);
        array_push($words, '...');
        $text = implode(' ', $words);
        $text = apply_filters('the_excerpt', $text);
    }
    return $text;
}
//Trm post title
function the_titlesmall($before = '', $after = '', $echo = true, $length = false) {
    $title = get_the_title();
    if ($length && is_numeric($length)) {
        $title = substr($title, 0, $length);
    }
    if (strlen($title) > 0) {
        $title = apply_filters('the_titlesmall', $before . $title . $after, $before, $after);
        if ($echo)
            echo $title;
        else
            return $title;
    }
}