<?php
	require_once(__DIR__ . "/dbc.php");
/*
 * Get a list of users from a group ID number.
 */
	function usersFromGroup($groupID)
	{
		global $dbc;
		$q=mysqli_query($dbc,"SELECT id_user FROM membership WHERE id_group=".$groupID);
		$users=array();
		while($row=mysqli_fetch_array($q,MYSQLI_NUM))$users[]=(int)$row[0];
		return $users;
	}
/*
 * Get a list of groups from a user ID number.
 */
	function groupsFromUser($userID)
	{
		global $dbc;
		$q=mysqli_query($dbc,"SELECT id_group FROM membership WHERE id_user=".$userID);
		$groups=array();
		while($row=mysqli_fetch_array($q,MYSQLI_NUM))$groups[]=(int)$row[0];
		return $groups;
	}
/*
 * Get a list of users trying to join the given group.
 */
	function getMembersPending($groupID)
	{
		global $dbc;
		$q=mysqli_query($dbc,"SELECT id_user FROM pending_membership WHERE id_group=".$groupID);
		while($row=mysqli_fetch_array($q,MYSQLI_NUM))$users[]=(int)$row[0];
		return $users;
	}
	function getGroupsPending($userID)
	{
		global $dbc;
		$q=mysqli_query($dbc,"SELECT id_group FROM pending_membership WHERE id_user=".$userID);
		$groups=array();
		while($row=mysqli_fetch_array($q,MYSQLI_NUM))$groups[]=(int)$row[0];
		return $groups;
	}
/*
 * Get group info for group with given group ID.
 */
	function getGroupInfo($groupID)
	{
		global $dbc;
		$vars=mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM groups WHERE id_group=".$groupID),MYSQLI_ASSOC);
		if($vars==null)return array();
		return $vars;
	}
/*
 * Get a list of every group's info in a 2D array.
 */
	function getGroups()
	{
		global $dbc;
		$q=mysqli_query($dbc,"SELECT * FROM groups");
		$groups=array();
		while($row=mysqli_fetch_array($q,MYSQLI_ASSOC))$groups[]=$row;
		return $groups;
	}
/* Add a new group to the database.
 */
	function addGroup($name)
	{
		global $dbc;
		mysqli_query($dbc,"INSERT INTO groups (name) VALUES ('".$name."')");
	}
/* Pairs a user ID number with a group ID number in the membership table.
 */
	function pairUserToGroup($userID,$groupID)
	{
		global $dbc;
		mysqli_query($dbc,"DELETE FROM pending_membership WHERE id_user=".$userID." AND id_group=".$groupID);
		mysqli_query($dbc,"INSERT INTO membership (id_user,id_group) VALUES ('".$userID."','".$groupID."')");
		if(mysqli_affected_rows($dbc)!=1)
			throw new Exception("ERROR: pairUserToGroup(".$userID.",".$groupID."): ".mysqli_error($dbc));
	}
	function pairUserToGroupPending($userID,$groupID)
	{
		global $dbc;
		$groups=groupsFromUser($userID);
		if(in_array($groupID,$groups))return;
		mysqli_query($dbc,"INSERT INTO pending_membership (id_user,id_group) VALUES ('".$userID."','".$groupID."')");
		if(mysqli_affected_rows($dbc)!=1)
			throw new Exception("ERROR: pairUserToGroupPending(".$userID.",".$groupID."): ".mysqli_error($dbc));
	}
	function kickUserFromGroup($userID,$groupID)
	{
		global $dbc;
		mysqli_query($dbc,"DELETE FROM membership WHERE id_user=".$userID." AND id_group=".$groupID);
		if(mysqli_affected_rows($dbc)!=1)
			throw new Exception("ERROR: kickUserFromGroup(".$userID.",".$groupID."): ".mysqli_error($dbc));
	}
	function denyUserFromGroup($userID,$groupID)
	{
		global $dbc;
		mysqli_query($dbc,"DELETE FROM pending_membership WHERE id_user=".$userID." AND id_group=".$groupID);
		if(mysqli_affected_rows($dbc)!=1)
			throw new Exception("ERROR: denyUserFromGroup(".$userID.",".$groupID."): ".mysqli_error($dbc));
	}
	
	/*global $dbc;
	$q="
			CREATE TABLE pending_membership
			(
				id_group INT NOT NULL,
				id_user INT NOT NULL,
				CONSTRAINT id_pair PRIMARY KEY ( id_group, id_user )
			)
	";
	mysqli_query($dbc,$q);
	mysqli_error($dbc);
	echo $q;*/

	/*global $dbc;
	$q="
		ALTER TABLE membership
		ADD COLUMN permission CHAR(1)
	";
	mysqli_query($dbc,$q);
	mysqli_error($dbc);
	echo $q;*/
?>
