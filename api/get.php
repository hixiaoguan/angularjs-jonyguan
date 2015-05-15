<?php
require_once('api.php');
$sql = "SELECT * FROM wp_posts WHERE post_status='publish' AND post_title!=''";
$dsql->Execute('me',$sql);
$arr = array();
$i=0;
while($dbobj = $dsql->GetObject('me'))
{
	$arr[$i][id] = $dbobj->ID;
	$arr[$i][title] = $dbobj->post_title;
	$arr[$i][content] = htmlspecialchars_decode(htmlspecialchars($dbobj->post_content));
	$i=$i+1;
}
echo json_encode($arr); 
?>