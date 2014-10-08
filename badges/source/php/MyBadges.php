<?php
	require_once(__DIR__ . "/include/membersite_config.php");
	$dbc=@mysqli_connect('fyfl-3.fyflnetwork.org','szk0050','Stoneware!','FYFL-3')
	or die('Could not connect to MySQL: '.mysqli_connect_error());
	if(!$fgmembersite->CheckLogin())
	{
		$fgmembersite->RedirectToURL("/var/www/sarthak-jesse-patty/admin/source/login.php");
		exit;
	}
	$q=mysqli_query($dbc,"SELECT image_id FROM backpack WHERE id_user=(SELECT id FROM people3 WHERE username='".$_SESSION[$fgmembersite->GetLoginSessionVar()]."')");
	//$q=mysqli_query($dbc,"SELECT image_id FROM backpack WHERE id_user=9");
	$badges=array();
	while($row=mysqli_fetch_array($q,MYSQLI_ASSOC))array_push($badges,$row['image_id']);
	$q=mysqli_query($dbc,"SELECT image_id,badge_name,badge_desc FROM images3 WHERE image_id IN (".implode(',',$badges).")");
	$badges=array();
	while($row=mysqli_fetch_array($q,MYSQLI_ASSOC))array_push($badges,$row);
	echo json_encode($badges);
?>
