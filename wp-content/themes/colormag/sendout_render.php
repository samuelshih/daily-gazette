<tr height="1px">
  <td colspan="3">
  <p style="font-size: 20px; margin: 0; color: #555; text-align:left; background: #F5F5F5; font-weight:bold;">
        <img style="display:block;" src="<?php echo SendoutBuilder::get_static_content($categoryImage);?>"
             alt="<?php echo $theCategory; ?>" width="720px"/>
  </p>
  </td>
</tr>
<tr height="4px"><td colspan="3" style="background: #000; height:4px;"></td></tr>
    <tr colspan=3 height=8px><td height="9" style="height:9px"></td></tr>

<?php foreach($theArticles as $article){
$title = $article['t'];
$text = $article['e'];
$link = $article['l'];
$image = ($article['i'] != null) ? $article['i'] : SendoutBuilder::get_static_content('120.png');
?>

<tr height="122px" style="padding: 0px; border: 0px 1px solid #555;">
    <td width="10px" height="120px" style="background: <?php echo $colorCode; ?>;
                                         display:block; height:118px; width:10px;  border: 1px solid #555;"></td>
  <td width="120px" style="padding: 0 10px;">
    <a href="<?php echo $link; ?>">
            <img src="<?php echo $image; ?>" width="120" height="120" style="padding:1px; background: #555; display:block;"/>
    </a>
  </td>
  <td width="590px" style="background: #F5F5F5; vertical-align:top;">
    <span style="font-family: georgia; color: #555;">
      <h3 style="margin: 2px 0px 5px 4px; color: #085E5E; width:540px; font-weight:normal; font-size: 18px;">
                    <a href="<?php echo $link;?>" style="color: #085E5E; text-decoration:none">
                        <?php echo $title; ?>
                    </a>
      </h3>
      <p style="font-size: 15px; margin: 0 0 0 10px; padding-right:5px;">
            <?php echo $text; ?>
                    <a href="<?php echo $link; ?>" style="font-weight: bold; color: #085E5E; text-decoration:none"> &raquo; </a>
      </p>
    </span>
  </td>
</tr>
<tr colspan=3 height="9px"><td height="9px" style="height:9px"></td></tr>

<?php } //endforloop // add final line ?>

    <tr height="4px"><td colspan="3" style="background: #000; height:4px;"></td></tr>
