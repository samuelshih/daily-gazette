<?php
/**
 * Template Name: Sendout
 * The template for displaying the single issue
 */
error_reporting(E_ALL|E_NOTICE);
require_once('sendout_helpers.php');
?>

<?php

$builder = new SendoutBuilder();
//$builder->test_dump();
$theDate = date("m/d/y");
$comments = get_comments(array('number' => 10,
			       'status' => 'approve'));

/*FOR FETCHING WEATHER AND THE SLOG _This section was commented out by Keton Kakkar '19 at 10:00pm 10/1/15 to attempt to fix the previous day's sendout error_
include_once(ABSPATH.WPINC.'/feed.php');
$url = 'http://daily.swarthmore.edu/slog/feed/';
$rss = fetch_feed($url);

if(!$rss->error)
{
	$rss_item = $rss->get_item(0);
	$chatter = file_get_contents($rss_item->get_permalink());
	$regex = '#<p>.*WEATHER.*?</p>#s';
	preg_match($regex, $chatter, $chat_match);
        //if (preg_match($regex, $chatter, $chat_match) === 0) {
	//	$weather = "error";
	//}
	if($chat_match[0]){
        //fixme up a bit
        $weather = $chat_match[0];
        $weather = preg_replace('/WEATHER/', 'Weather', $weather);
        $weather = preg_replace('/<em>/', '<em style="color:#444">', $weather);
    }

    $slogitems = array(
        $rss->get_item(0),
        $rss->get_item(1),
        $rss->get_item(2)
    );
}

//well, why not...
if(!$weather){
    $weather = "<b>Weather:</b> <br/> There's gonna be some!";
}
*/
//$weather = "<b>Weather:</b> <br/> Just look out your window!";
//GET THE POSTS!!!
if (have_posts()){
    while (have_posts()){
        the_post();
        $cont = get_the_content();
        $query = new WP_Query( array(
            'posts_per_page' => 20,
            'offset' => 0,
            'order' => 'DESC',
            'orderby' => 'date'
        ));
    }
}

while ($query->have_posts()) {
    $query->the_post();
	/* Check: last 24hrs? */
	if (time() - get_the_time('U') <= 86400) {
        $l = get_permalink();
        $t = SendoutBuilder::string_max(get_the_title(), 85);

        //get the categories into a simple list...
        $cats_raw = get_the_category();
        $cats = array();
        foreach($cats_raw as $category){
            $cats[] = $category->cat_name;
        }

        //get the excerpt at a good length
        $e = SendoutBuilder::string_max(get_the_excerpt(), 270);
        $image = get_the_post_thumbnail(get_the_ID(), 'thumbnail');
        $i = SendoutBuilder::get_img_src($image);

        //add it to our temporary storage
        $builder->add_article($cats, $t, $e, $l, $i);
	}
}

?>

<!DOCTYPE html>
<html>
<head>

</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="center">
    <table width="720px" style="font-family: georgia,?'palatino linotype',?palatino,?'times new roman',?times,?serif">
		<tr height="4px"><td colspan="3" style="background: #000; height:4px;"></td></tr>
		<tr>
			<td colspan="3"><h1 style="text-align: center; margin:0;">
            <a href="http://daily.swarthmore.edu">
               <img width="720px" src="<?php echo SendoutBuilder::get_static_content('email_header.jpg');?>"
                 alt="THE DAILY GAZETTE" style="display:block"/>
            </a>
			</h1></td>
		</tr>
		<tr height="4px"><td colspan="3" style="background: #000; height:4px;"></td></tr>
		<tr height="1px">
			<td colspan="3">
			<!-- <strong>The deadline to register to vote in the PA primary is MONDAY, MARCH 28! To register, use this <a href="https://www.pavoterservices.state.pa.us/Pages/VoterRegistrationApplication.aspx" target="_blank">online application.</a> To find out more information about voter registration, check out <a href="http://www.votespa.com/portal/server.pt?open=514&objID=1174117&parentname=ObjMgr&parentid=1&mode=2" target="_blank">votesPA.com</a></strong> -->
<br/>
			<p style="box-shadow: 1px 1px 20px #F5F5F5;font-size: 16px; margin: 5px; color: #555; text-align:center; background: #F5F5F5;">
            <i><?php echo $theDate; ?> - Today's Happenings from Swarthmore College's Daily Student Newspaper</i>
<br/>             <i><a href="http://daily.swarthmore.edu/work-for-the-daily-gazette/" style="color:#555">Join the staff!</a></i>
		<!--	<br/><i>Play 2048: 20Chopp Edition <a href="http://games.usvsth3m.com/2048/20chopp-edition-2/" style="color:#555;text-decoration:underline">here</a>!</i>-->
<br/><i><a href="http://wsrnfm.org/schedule/" style="color:#555;text-decoration:underline">WSRN Weekly Schedule</a></i>

			</p>
			</td>
		</tr>
	<tr height="1px">
		</tr>

        <tr height="4px"><td colspan="3" style="background: #000; height:4px;"></td></tr>

		<!--<tr>
			<td colspan="3">
				<img src="special.png" width="720" style="display:block; padding-bottom:10px"/>
			</td>
		</tr>
		<tr height="2px"><td colspan="3" style="background: #000"></td></tr>
		<tr colspan=3 height=10px></tr> -->

		<!-- NEWS -->
<?php
if($builder->has_entries('news'))
{
    $theArticles = $builder->get_category('news');
    $categoryImage = 'news.png';
    $theCategory = 'NEWS';
    $colorCode = "#dd1515";
    include "sendout_render.php";
}
?>
		<!-- SPORTS -->
<?php
if($builder->has_entries('sports'))
{
    $theArticles = $builder->get_category('sports');
    $categoryImage = 'sports.png';
    $theCategory = 'SPORTS';
    $colorCode = "#dd1515";
    include "sendout_render.php";
}
?>
		<!-- ARTS AND FEATURES -->
<?php
if($builder->has_entries('arts_and_features'))
{
    $theArticles = $builder->get_category('arts_and_features');
    $categoryImage = 'arts_and_features.png';
    $theCategory = 'ARTS AND FEATURES';
    $colorCode = "#153E69";
    include "sendout_render.php";
}
?>


      <!-- WNR -->
<?php
if($builder->has_entries('wnr'))
{
    $theArticles = $builder->get_category('wnr');
    $categoryImage = 'wnr.png';
    $theCategory = 'WNR';
    $colorCode = "#5D98FE";
    include "sendout_render.php";
}
?>

		<!-- OPINION -->
<?php
if($builder->has_entries('opinion'))
{
    $theArticles = $builder->get_category('opinion');
    $categoryImage = 'opinion.png';
    $theCategory = 'OPINION';
    $colorCode = "#000000";
    include "sendout_render.php";
}
?>
        <!-- FB CALLOUT -->
<?php /*<tr height="1px">
			<td colspan="3">
			<p style="font-size: 20px; margin: 0; color: #555; text-align:left; background: #F5F5F5; font-weight:bold;">
            <a href="http://www.facebook.com/pages/The-Daily_gazette/25143725092">
            <img style="display:block;" src="<?php echo SendoutBuilder::get_static_content('dgfb.png') ?>" alt="LIKE US ON FACEBOOK!" width="720px"/>
            </a>
            </p>
			</td>
		</tr>
		<tr height="4px"><td colspan="3" style="background: #000; height:4px;"></td></tr>
 */?>

		<!-- COMMENTS -->

		<tr height="1px">
			<td colspan="3">
			<p style="font-size: 20px; margin: 0; color: #555; text-align:left; background: #F5F5F5; font-weight:bold;">
                <img style="display:block;" src="<?php echo SendoutBuilder::get_static_content('comments.png') ?>" alt="RECENT COMMENTS" width="720px"/>
			</p>
			</td>
		</tr>
		<tr height="4px"><td colspan="3" style="background: #000; height:4px;"></td></tr>
		<tr colspan=3 height="9px"><td height="9px" style="height:9px"></td></tr>

		<tr>
			<td colspan="3" style="padding:0; margin:0;">
				<table border="0" style="padding:0; margin:0;"><tr>
					<td width="11px" style="background: #153E69; border: 1px solid #555; display:inline block;"></td>
					<td width="9px" style="padding:0;"></td>
                    <td width="700px" style="background: #F5F5F5;">
<?php foreach ($comments as $comment) { ?>
    <p style="margin:2px 0 2px 4px;font-size:14px;color:#555;" >
        <a href="<?php echo get_permalink($comment->comment_post_ID)."#comment-".$comment->comment_ID;?>" style="color: #085E5E; text-decoration:none">
            <i><?php echo $comment->comment_author; ?></i> on
        </a>
       <b><?php echo get_the_title($comment->comment_post_ID);?></b>
    </p>
<?php } ?>
                    </td>
				</tr></table>
			</td>
		</tr>
		<tr colspan=3 height="7px"><td height="7px" style="height:7px"></td></tr>

	<!-- WEATHER && SLOG
		<tr colspan="3">
		<td colspan="3" style="padding:0; margin:0;">
			<table border="0" style="padding:0; margin:0;"><tr>
				<td width="730px"style="background: #white;" align="center">
					<span style="font-family: georgia; color: #555; text-align:center;">
                        ?php if($weather) echo $weather; ?
					</span>
				</td>
				<td width="19px" style="padding:0;"></td>
				<td width="2px" style="background: #000;"></td>
				<td width="19px" style="padding:0;"></td>
				<td width="340px"style="background: #F5F5F5;">
					<span style="font-family: georgia; color: #555;">
						<img alt="THE SLOG" src="<?php /*echo SendoutBuilder::get_static_content('slog.png') ?>" style="margin: 0 70px;"/>
						<span style="font-size: 12px; text-align:left; margin-top:0px; margin: 1px 10px;">
<?php/*
foreach($slogitems as $slogHeadline){ ?>
    <p style="margin:6px 10px;" >
    <a href = "<?php echo $slogHeadline->get_link();?>" style="color: #153E69; text-decoration:none;">
    <?php echo $slogHeadline->get_title(); ?> &raquo;
    </a></s>
<?php } */?>

						</span>
					</span>
				</td>
			</tr></table>
		</td>
		</tr>

		<tr colspan=3 height=20px></tr>
	</table>-->
</td></tr></table>

<!-- FOOTER AND FINE PRINT -->
<div style="border-top: black 1px solid;margin-top:50px;padding-top:20px;font-size:12px;"><p style="margin-top:0;"><i>The Daily Gazette</i> is a publication written by members of the Swarthmore College community. The administration of Swarthmore College has no editorial control or oversight regarding the content or presentation of <i>The Daily Gazette</i>. Funding for <i>The Gazette</i> is provided by the Student Budget Committee and by advertising revenue.</p><p style="margin-top:0;">To unsubscribe or otherwise change your subscription preferences,
<a style="color:black;text-decoration:underline;" href="https://secure.sccs.swarthmore.edu/mailman/listinfo/thedailygazette">manage your account</a>.
</p></div>
</body>
</html>
