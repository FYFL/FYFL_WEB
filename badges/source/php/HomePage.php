<?php
include("/var/www/sarthak-jesse-patty/admin/source/include/membersite_config.php");
if(!$fgmembersite->CheckLogin())
{
	$fgmembersite->RedirectToURL("/var/www/sarthak-jesse-patty/admin/source/login.php");
	exit;
}
$user=mysqli_fetch_array(mysqli_query($dbc,"SELECT name,lname,username,email FROM users WHERE username='".$_SESSION[$fgmembersite->GetLoginSessionVar()]."'"),MYSQLI_ASSOC);
var_dump($user);
?>
