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
		$vars=mysqli_fetch_array(mysqli_query($dbc,"SELECT username,name,lname,email,user_level,Adult,State,County,id_user FROM people3 WHERE username='".$_SESSION[$fgmembersite->GetLoginSessionVar()]."'"),MYSQLI_ASSOC);
	//explicitly return an empty array instead of NULL
		if($vars==NULL)return array();
	//must manually typecast some values because mysql_query is dumb
	//add user ids and typecast them.
		$vars['County']=(int)$vars['County'];
		$vars['user_level']=(int)$vars['user_level'];
		$vars['Adult']=(int)$vars['Adult'];
		return $vars;
	}
	function deleteUser($id){
		global $dbc;
		mysqli_query($dbc,'DELETE FROM people3 WHERE id_user IN ('.implode(',',$id).');');
	}
	function getUsers(){
		global $dbc;
		$q=mysqli_query($dbc,"SELECT username,name,lname,email,user_level,Adult,State,County,id_user FROM people3");
		$users=array();
		while($row=mysqli_fetch_array($q,MYSQLI_ASSOC))
			$users[]=$row;
		return $users;
	}
	function userFromID($userID)
	{
		global $dbc;
	//mysqli_fetch_array() returns NULL if mysqli_query() returns NULL
		$sqlResult = mysqli_query($dbc,"SELECT username,name,lname,email,user_level,Adult,State,County,id_user FROM people3 WHERE id_user=".$userID);
		if($sqlResult==NULL)return array();
		$vars=mysqli_fetch_array($sqlResult,MYSQLI_ASSOC);
	//explicitly return an empty array instead of NULL
		if($vars==NULL)return array();
	//must manually typecast some values because mysql_query is dumb
	//add user ids and typecast them.
		$vars['County']=(int)$vars['County'];
		$vars['user_level']=(int)$vars['user_level'];
		$vars['Adult']=(int)$vars['Adult'];
		return $vars;
	}
/*This script is for editing user info.
 *Returns false on failure.  Returns true on success.
 */
	function editUser($id,$avatar,$name,$lname,$email,$state,$county)
	{
		global $dbc;
		global $fgmembersite;
	//checking if user is logged in
		if(!$fgmembersite->CheckLogin())
			return false;
	//only update desired columns
		if(!empty($avatar))$arr[]="avatar='".$avatar."'";
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
			'
				UPDATE people3 SET
				'.implode(",",$arr).'
				WHERE id_user="'.$id.'"
			'
		);
		return true;
	}
?>
