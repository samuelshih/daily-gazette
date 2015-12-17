=== WP Responsive Recent Post Slider  ===
Contributors: wponlinesupport, anoopranawat 
Tags: post slider, posts slider, recent post slider, recent posts slider, slider, responsive post slider, responsive posts slider, responsive recent post slider, responsive recent posts slider, wordpress posts slider, post slideshow, posts slideshow, recent posts slideshow, shortcodes
Requires at least: 3.1
Tested up to: 4.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A quick, easy way to add and display Responsive WordPresss Recent Post Slider on your website with 4 designs using a shortcode.

== Description ==
Responsive Recent WordPresss Post Slider is a WordPress posts content slider plugin with touch for mobile devices and responsive.
WordPresss Recent Post Slider displays your recent posts using 4 designs with beautiful slider.

View [DEMO](http://wponlinesupport.com/sp_plugin/wp-responsive-recent-post-slider/) for additional information.

View [PRO DEMO and Features](http://wponlinesupport.com/sp_plugin/wp-responsive-recent-post-slider/) for additional information.

A multipurpose responsive WordPresss posts slider plugin powered with four built-in design template, lots of easy customizable options.
Display unlimited number of WordPresss posts slider in a single page or post with different sets of options like category, limit, navigation type. 

= Here is the Recent Post Slider shortcode example =

Main shortcode:
<code>[recent_post_slider]</code>

To display only latest 4 post:
<code>[recent_post_slider limit="4"]</code>
Where limit define the number of posts to display.

If you want to display Recent Post Slider by category then use this short code: 
<code>[recent_post_slider  category="category_ID"]</code>

We have given 4 designs. For designs use the following shortcode: 
<code>[recent_post_slider design="design-1"]</code> 
Where designs are : design-1, design-2, design-3, design-4  

You can see and select all the designs from Post -> Post Slider Designs. Here you can use the shortcode
for design that you like and want to use for your website.

= Complete shortcode is =

<code>[recent_post_slider limit="4" design="design-1" category="8" show_category_name="true" 
show_content="true" show_date="true" dots="true" arrows="true" autoplay="true"
 autoplay_interval="5000" speed="1000" content_words_limit ="20"]</code>



= Here is Template code =
<code><?php echo do_shortcode('[recent_post_slider]'); ?> </code>

= Features include: =
* Easy to add.
* Given 4 designs.
* Responsive.
* Responsive touch slider.
* Mouse Draggable.
* You can create multiple post slider with different options at single page or post.

= Pro Features include: =
* Recent Post Slider with 6 designs.
* Recent Post Carousel with 10 designs.
<code>[recent_post_carousel]</code>
* 3 Widgets (Post slider, Post with Thumb, Post with Thumb in list views)

View [PRO DEMO and Features](http://wponlinesupport.com/sp_plugin/wp-responsive-recent-post-slider/) for additional information.

= Use Following Recent Post Slider parameters with shortcode =
<code>[recent_post_slider]</code>

* **limit** : [recent_post_slider limit="8"] (Display only 8 latest post. By default it display 8 latest posts with shortcode [recent_post_slider].
 If you want to display all posts then use limit="-1").
* **design** : [recent_post_slider design="design-1"] (You can select 4 design( design-1, design-2, design-3, design-4 ) for your recent post slider. Post -> Post Slider Designs ).
* **category**: [recent_post_slider category="category_ID"] ( ie Display recent post slider by their category ID ).
* **show_category_name** : [recent_post_slider show_category_name="true" ] (Display category name OR not. By default value is "True". Options are "ture OR false").
* **show_date** : [recent_post_slider show_date="false"] (Display post date OR not. By default value is "True". Options are "ture OR false")
* **show_content** : [recent_post_slider show_content="true" ] (Display post Short content OR not. By default value is "True". Options are "ture OR false").
* **Pagination and arrows** : [recent_post_slider dots="false" arrows="false"]
* **Autoplay and Autoplay Interval**: [recent_post_slider autoplay="true" autoplayInterval="100"]
* **Slide Speed**: [recent_post_slider speed="3000"]
* **content_words_limit** : [recent_post_slider content_words_limit="30" ] (Control post short content Words limit. By default limit is 20 words).




== Installation ==

1. Upload the 'wp-recent-post-slider' folder to the '/wp-content/plugins/' directory.
2. Activate the "wp-recent-post-slider with Widget" list plugin through the 'Plugins' menu in WordPress.
3. Add this short code where you want to display recent post slider
<code>[recent_post_slider]</code>

== Screenshots ==

1. Design-1
2. Design-2
3. Design-3
4. Design-4
5. Designs
6. Category shortcode for post

== Changelog ==

= 1.0 =
* Initial release.


== Upgrade Notice ==

= 1.0 =
* Initial release
