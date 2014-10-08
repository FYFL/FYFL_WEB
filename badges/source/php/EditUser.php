<?php
/*This script is for editing user info.
 */
	require_once(__DIR__ . "/include/membersite_config.php");
//connecting to database
	$dbc=@mysqli_connect('fyfl-3.fyflnetwork.org','szk0050','Stoneware!','FYFL-3')
	or die('Could not connect to MySQL: '.mysqli_connect_error());
//checking if user is logged in
	if(!$fgmembersite->CheckLogin())
	{
		$fgmembersite->RedirectToURL("/var/www/sarthak-jesse-patty/admin/source/login.php");
		exit;
	}
//only update desired columns
	if(isset($_POST['name'])&&$_POST['name']!="")$arr[]="name='".$_POST['name']."'";
	if(isset($_POST['lname'])&&$_POST['lname']!="")$arr[]="lname='".$_POST['lname']."'";
	if(isset($_POST['email'])&&$_POST['email']!="")$arr[]="email='".$_POST['email']."'";
	if(isset($_POST['State'])&&$_POST['State']!="")$arr[]="State='".$_POST['State']."'";
	if(isset($_POST['County'])&&$_POST['County']!="")$arr[]="County='".$_POST['County']."'";
//only update columns if anything has changed
	if(count($arr)>0)
	mysqli_query
	(
		$dbc,
		"
			UPDATE people3 SET
			".implode(',',$arr)."
			WHERE username='".$_SESSION[$fgmembersite->GetLoginSessionVar()]."'
		"
	);
//redirect back to the profile page
	header("Location: http://www.fyflnetwork.org/4h/badges/source/ProfilePage.php");
	die();
?>
