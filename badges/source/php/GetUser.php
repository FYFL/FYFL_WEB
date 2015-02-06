<?php
	require_once(__DIR__ . "/dbc.php");
	require_once(__DIR__ . "/include/membersite_config.php");
/*Get all of a user's information and echo it as a json object.
 */
	function getUser()
	{
		global $dbc;
		global $fgmembersite;
	//if the user is not logged in, return false
		if(!$fgmembersite->CheckLogin())
			return false;
	//fetch the user info from the database
		$vars=mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM people3 WHERE username='".$_SESSION[$fgmembersite->GetLoginSessionVar()]."'"),MYSQLI_ASSOC);
	//must manually typecast some values because mysql_query is dumb
	//add user ids and typecast them.
		$vars['County']=(int)$vars['County'];
		$vars['user_level']=(int)$vars['user_level'];
		$vars['Adult']=(int)$vars['Adult'];
		return $vars;
	}
?>
