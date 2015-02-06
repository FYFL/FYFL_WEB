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
	function userFromID($userID)
	{
		global $dbc;
		return mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM people3 WHERE id_user=".$userID),MYSQLI_ASSOC);
	}
/*This script is for editing user info.
 *Returns false on failure.  Returns true on success.
 */
	function editUser($name,$lname,$email,$state,$county)
	{
		global $dbc;
		global $fgmembersite;
	//checking if user is logged in
		if(!$fgmembersite->CheckLogin())
			return false;
	//only update desired columns
		if(!empty($name))$arr[]="name='".$name."'";
		if(!empty($lname))$arr[]="lname='".$lname."'";
		if(!empty($email))$arr[]="email='".$email."'";
		if(!empty($state))$arr[]="State='".$state."'";
		if(!empty($county))$arr[]="County='".$county."'";
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
		return true;
	}
?>
