<?php

add_action('init', 'of_options');
if (!function_exists('of_options')) {

    function of_options() {
        // VARIABLES
        $themename = 'Woodpecker Theme';
        $shortname = "of";
        // Populate OptionsFramework option in array for use in theme
        global $of_options;
        $of_options = woodpecker_get_option('of_options');
        //Front page on/off
        $file_rename = array("on" => "On", "off" => "Off");
        $showhide_sections = array("Show" => "Show", "Hide" => "Hide");
        // Background Defaults
        $background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat', 'position' => 'top center', 'attachment' => 'scroll');
        //Stylesheet Reader
        $alt_stylesheets = array("red" => "red", "black" => "black", "coffee" => "coffee", "green" => "green", "teal-green" => "teal-green", "blue" => "blue", "yellow" => "yellow", "orange" => "orange", "pink" => "pink", "purple" => "purple");
        $lan_stylesheets = array("Default" => "Default");
        // Pull all the categories into an array
        $options_categories = array();
        $options_categories_obj = get_categories();
        foreach ($options_categories_obj as $category) {
            $options_categories[$category->cat_ID] = $category->cat_name;
        }

        // Populate OptionsFramework option in array for use in theme
        $contact_option = array("on" => "On", "off" => "Off");
        // Pull all the pages into an array
        $options_pages = array();
        $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
        $options_pages[''] = 'Select a page:';
        foreach ($options_pages_obj as $page) {
            $options_pages[$page->ID] = $page->post_title;
        }
        // If using image radio buttons, define a directory path
        $imagepath = get_template_directory_uri() . '/images/';

        $options = array(
        array("name" => "General Settings",
            "type" => "heading"),

        array("name" => "Custom Favicon",
            "desc" => "Here you can upload a Favicon for your Website. Specified size is 16px x 16px.",
            "id" => "woodpecker_favicon",
            "type" => "upload"),

        //Background Image
        array("name" => "Template Header Background Image",
            "desc" => "Choose a suitable background for template pages header for eg. page, post, attachment. Optimal width is 1600px and height is 250px.",
            "id" => "woodpecker_headbg",
            "type" => "upload"),

        array("name" => "Mobile Navigation Menu",
            "desc" => "Enter your mobile navigation menu text",
            "id" => "woodpecker_nav_txt",
            "std" => "",
            "type" => "text"),

        array("name" => "Front Page On/Off",
            "desc" => "If the front page option is active then home page will appear otherwise blog page will display.",
            "id" => "re_nm",
            "std" => "on",
            "type" => "radio",
            "options" => $file_rename),     

        //Home Page Top Feature Setting
        array("name" => "Top Feature Area Settings",
            "type" => "heading"),

        array("name" => "Top Feature Image",
            "desc" => "The optimal size of the image is 1600 px wide x 650 px height, but it can be varied as per your requirement.",
            "id" => "woodpecker_slideimage1",
            "std" => "",
            "type" => "upload"),

        array("name" => "Top Feature Heading",
            "desc" => "Mention the heading for the Top Feature.",
            "id" => "woodpecker_sliderheading1",
            "std" => "",
            "type" => "textarea"),

        
        array("name" => "Top Feature Description",
            "desc" => "Here mention a short description for the Top Feature heading.",
            "id" => "woodpecker_sliderdes1",
            "std" => "",
            "type" => "textarea"),

		array("name" => "Button Text for Top Feature",
            "desc" => "Mention the button text for first Top Feature.",
            "id" => "woodpecker_Slider_butotntext1",
            "std" => "",
            "type" => "text"),
			
		array("name" => "Button Link for Top Feature",
            "desc" => "Mention button URL for Top Feature",
            "id" => "woodpecker_Slider_buttonlink1",
            "std" => "",
            "type" => "text"),
		
		
	//****=============================================================================****//
        //Homepage Feature Tagline
        array("name" => "Featured Punchline",
            "type" => "heading"),

        array("name" => "Featured Punchline Heading",
            "desc" => "Mention the punch line heading for your business here.",
            "id" => "woodpecker_punchline_heading",
            "std" => "",
            "type" => "textarea"),

        array("name" => "Featured Tagline Description",
            "desc" => "Mention the tagline for your business here that will complement the punch line.",
            "id" => "woodpecker_page_tagline_desc",
            "std" => "",
            "type" => "textarea"),

//****=============================================================================****//
//****-----------This code is used for creating color styleshteet options----------****//
//****=============================================================================****//				
        array("name" => "Styling Options",
            "type" => "heading"),
       
        array("name" => "Custom CSS",
            "desc" => "Quickly add your custom CSS code to your theme by writing the code in this block.",
            "id" => "woodpecker_customcss",
            "std" => "",
            "type" => "textarea"),

//****=============================================================================****//
//****-------------This code is used for creating social logos options-------------****//					
//****=============================================================================****//

        array("name" => "Social Icons",
            "type" => "heading"),

        array("name" => "Facebook URL",
            "desc" => "Mention the URL of your Facebook here.",
            "id" => "woodpecker_facebook",
            "std" => "",
            "type" => "text"),

        array("name" => "Twitter URL",
            "desc" => "Mention the URL of your Twitter here.",
            "id" => "woodpecker_twitter",
            "std" => "",
            "type" => "text"),

        array("name" => "Google+ URL",
            "desc" => "Mention the URL of your Google+ here.",
            "id" => "woodpecker_google",
            "std" => "",
            "type" => "text"),

        array("name" => "Rss Feed URL",
            "desc" => "Mention the URL of your Rss Feed here.",
            "id" => "woodpecker_rss",
            "std" => "",
            "type" => "text"),

        array("name" => "Pinterest URL",
            "desc" => "Mention the URL of your Pinterest here.",
            "id" => "woodpecker_pinterest",
            "std" => "",
            "type" => "text"),

		array("name" => "Linkedin",
            "desc" => "Mention the URL of your Linkedin here.",
            "id" => "woodpecker_linkedin",
            "std" => "",
            "type" => "text"));

        woodpecker_update_option('of_template', $options);
        woodpecker_update_option('of_themename', $themename);
        woodpecker_update_option('of_shortname', $shortname);
    }
}
?>
