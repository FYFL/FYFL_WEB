<?php
	require_once(__DIR__ . "/include/membersite_config.php");
	require_once(__DIR__ . "/dbc.php");
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
