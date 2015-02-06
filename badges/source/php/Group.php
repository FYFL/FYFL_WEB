<?php
	require_once(__DIR__ . "/dbc.php");
/*
 * Get a list of users from a group ID number.
 */
	function usersFromGroup($groupID)
	{
		global $dbc;
		$q=mysqli_query($dbc,"SELECT id_user FROM membership WHERE id_group=".$groupID);
		while($row=mysqli_fetch_array($q,MYSQLI_NUM))$users[]=$row[0];
		return $users;
	}
/*
 * Get a list of groups from a user ID number.
 */
	function groupsFromUser($userID)
	{
		global $dbc;
		$q=mysqli_query($dbc,"SELECT id_group FROM membership WHERE id_user=".$userID);
		while($row=mysqli_fetch_array($q,MYSQLI_NUM))$groups[]=$row[0];
		return $groups;
	}
/*
 * Get group info for group with given group ID.
 */
	function getGroupInfo($groupID)
	{
		global $dbc;
		return mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM groups WHERE id_group=".$groupID),MYSQLI_ASSOC);
	}
/*
 * Get a list of every group's info in a 2D array.
 */
	function getGroups()
	{
		global $dbc;
		$q=mysqli_query($dbc,"SELECT * FROM groups");
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
		mysqli_query($dbc,"INSERT INTO membership (id_user,id_group) VALUES ('".$userID."','".$groupID."')");
		if(mysqli_affected_rows($dbc)!=1)
			echo"ERROR: pairUserToGroup(".$userID.",".$groupID."): ".mysqli_error($dbc);
	}
	
	/*function makeTable()
	{
		global $dbc;
		mysqli_query($dbc,"CREATE TABLE membership (id_group INT NOT NULL, id_user INT NOT NULL, CONSTRAINT id_pair PRIMARY KEY ( id_group, id_user ))");
		mysqli_error($dbc);
	}
	/*function deleteTableContents()
	{
		global $dbc;
		mysqli_query($dbc,"DELETE FROM groups");
	}*/
?>
