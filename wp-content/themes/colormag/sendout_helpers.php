<?php

/*
    This class will do most of the heavy lifting when building the sendout
    This isn't good design practice, but this is PHP so who gives a darn.
*/

class SendoutBuilder{

    // ==== Static Stuff  ====

    public static $staticUrl = "http://http://live-daily-gazette.pantheon.io/wp-content/themes/colormag/sendout_static/";
    public static $rootUrl = "http://http://live-daily-gazette.pantheon.io/";

    /* Returns a full url path for static images (e.g. the header) */
    public static function get_static_content($filename){
        return self::$staticUrl.$filename;
    }

    /* Returns a nicely shortened excerpt given an original excerpt.
        This function is taken from the wordpress website...why this isn't
        an actual function in WP is anyone's guess... */
    public static function string_max($excerpt, $charlength) {
        $charlength++;
        if ( mb_strlen( $excerpt ) > $charlength ) {
            $subex = mb_substr( $excerpt, 0, $charlength - 5 );
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
            if ( $excut < 0 ) {
                return mb_substr( $subex, 0, $excut )."[...] ";
            } else {
                return $subex."[...] ";
            }
            return '[...]';
        } else {
            return $excerpt;
        }
    }

    /* rips out src from the img tag returned by thumbnail function */
    public static function get_img_src($imgTag){
        if(!$imgTag){
            return null;
        }
        $outArray = array();
        preg_match('/src="(.*?)"/i', $imgTag, $outArray);
        if(count($outArray) > 1){
            return $outArray[1];
        }
        return null;
    }


    // ==== INPUT STUFF ====

    public $allArticles = array();

    /* Builds our class storage structure */
    public function __construct(){
        $this->allArticles = array();
        $this->allArticles['news'] = array();
        $this->allArticles['sports'] = array();
        $this->allArticles['arts_and_features'] = array(); //wnr will also go here for now (TODO)
        $this->allArticles['opinion'] = array();
        $this->allArticles['sports'] = array();
	$this->allArticles['wnr'] = array(); //created this to get rid of unindexed error
    }

    public function add_article(array $categories, $title, $excerpt, $permalink, $image = null){
        $category = $this->get_primary_category($categories);
        $entry = array(
            't' => $title,
            'e' => $excerpt,
            'l' => $permalink,
            'i' => $image
        );
        $this->allArticles[$category][] = $entry;
    }

    /*figure out the category to use
        ...this is not efficient, but it is necessary
        because an article can have many categories  */
    private function get_primary_category($categories){
        //list these in decending order of priority
        if(in_array("WNR", $categories))
            return "wnr";
        if(in_array("News", $categories))
            return "news";
        if(in_array("Arts &amp; Features", $categories) || in_array("Arts & Features", $categories))
            return "arts_and_features";
        if(in_array("Sports", $categories))
            return "sports";
        if(in_array("Opinion", $categories) || in_array("Columnist", $categories))
            return "opinion";

        //if nothing took...then it's a feature!
        return "arts_and_features";
    }

    // ==== RENDERING OUTPUT STUFF ====

    /* returns true if the given category (string) is not empty */
    public function has_entries($category){
	return (count($this->allArticles[$category]) > 0);
    }

    /* write out a whole category of articles*/
    public function get_category($category){
        return $this->allArticles[$category];
    }

    // ==== TESTING STUFF ====

    public function add_debug_article($category){
        $title = "$category DEBUG THING";
        $content = "adjkfh ajkasdhfjk asdjkl asdfhfuisdyrfajkn yfasduih".
            " fjksdahftadsfgasd sdbab wuyahfuysdt fabsn bqwuiq hgdjas".
            " g dsghasdgf uyasdt fhsagdfsdg fuy jhga jkhdsgfjh sdajhg";
        $this->add_article(array($category), $title, $content, "http://google.com", self::get_static_content('120.png'));
    }

    public function test_dump(){
        $this->add_debug_article("WNR");
        $this->add_debug_article("News");
        $this->add_debug_article("News");
        $this->add_debug_article("WHO KNOWS");
        $this->add_debug_article("Opinion");
        $this->add_debug_article("Arts & Features");
        $this->add_debug_article("Sports");
    }

}




?>
