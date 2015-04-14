<?php
	require_once(__DIR__ . "/dbc.php");
/*Filter badges by search tags.  Badges are in the images3 table, tags
 *are in the tags table, and tags are mapped to badges in the
 *taggedBadges table.
 *The tags table is a string for the tag text and an id number.
 *The taggedBadges table is badge id numbers paired with tag id numbers.
 */
//adds search tags to badges
	function addTags($commaSeparated,$badgeID)
	{
		global $dbc;
	//ignore empty strings
		if($commaSeparated=="")return;
	//turn comma separated tags into array of tags
		$tags=explode(",",$commaSeparated);
	//remove invalid tags
		//todo
		//idea: create table of blacklisted words for tags
		//getting paid to swear is fun
		foreach($tags as &$tag)
		{
		//an ID number for the tag will be found or generated
			$tagID;
		//check if tag already exists and add to database if it doesn't
			$r=mysqli_query($dbc,'SELECT id FROM tags WHERE name="'.$tag.'"');
			if(mysqli_num_rows($r)==0)
			{
				mysqli_query($dbc,"INSERT INTO tags (name) VALUES ('".$tag."')");
				$tagID=mysqli_insert_id($dbc);
			}
			else
			{
				$row=mysqli_fetch_array($r,MYSQLI_ASSOC);
				$tagID=$row['id'];
			}
		//apply tag to badge
			mysqli_query($dbc,"INSERT INTO taggedBadges (badgeID,tagID) VALUES ('".$badgeID."','".$tagID."')");
			mysqli_free_result($r);
		}
	}
//find badges with this tag (only one tag at a time for now)
	function getBadgesFromTags($tag)
	{
		global $dbc;
	//ignore empty strings
		if(empty($tag))return;
		$badgeIDs;
	//get the tag's ID number.
		$r=mysqli_query($dbc,'SELECT id FROM tags WHERE name="'.$tag.'"');
		$row=mysqli_fetch_array($r,MYSQLI_ASSOC);
	//get all badge ID numbers that are paired with the tag's ID number.
		$r=mysqli_query($dbc,'SELECT badgeID FROM taggedBadges WHERE tagID="'.$row['id'].'"');
		while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
			$badgeIDs[]=$row['badgeID'];
		mysqli_free_result($r);
		return $badgeIDs;
	}
?>
