<?php
	require_once(__DIR__ . "/dbc.php");
	require_once(__DIR__ . "/tags.php");
	require_once(__DIR__ . "/utils.php");
	require_once(__DIR__ . "/include/membersite_config.php");
/*Get badges from database and filter by search parameters to return as
 *an array.
 */
	function getBadges($offset=null,$limit=null,$tag=null,$state=null,$county=null)
	{
		global $dbc;
	//get all the badges with the given tag
		$badges=getBadgesFromTags($tag);
	//get all badges
		$q="SELECT image_id,badge_name,badge_desc,status FROM images3 ";
		$whereAnd="WHERE";
	//filter by tags
		if(count($badges)>0)
		{
			$q.=$whereAnd.' image_id IN ('.implode(',',$badges).') ';
			$whereAnd="AND";
		}
	//filter by state
		if(!empty($state))
		{
			$q.=$whereAnd.' state="'.$state.'" ';
			$whereAnd="AND";
		}
	//filter by county
		if(!empty($county))
			$q.=$whereAnd.' county="'.$county.'" ';
	//order by upload date
		$q.="ORDER BY uploaded_date DESC";
	//offset and limit
		if(!empty($offset)&&!empty($limit))
			$q.=' LIMIT '.$offset.', '.$limit;
		$r=mysqli_query($dbc,$q);
		$badges=array();
		while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
			array_push($badges,$row);
		mysqli_free_result($r);
		return $badges;
	}
/*This script is for editing badge information.
 */
	function editBadge($image_id,$badge_name,$badge_desc,$status,$state,$county)
	{
		global $dbc;
		if(!empty($badge_name))
			$arr[]="badge_name='".$badge_name."'";
		if(!empty($badge_desc))
			$arr[]="badge_desc='".$badge_desc."'";
		if(!empty($status)&&strlen($status)==1)
			$arr[]="status='".$status."'";
		if(!empty($state)&&strlen($state)==2)
			$arr[]="state='".$state."'";
		if(!empty($county)&&is_int($county))
			$arr[]="county='".$county."'";
		if(count($arr)>0)
		mysqli_query
		(
			$dbc,
			"UPDATE people3 SET
			".implode(",",$arr)."
			WHERE image_id=".$image_id
		);
	}
/* The exception thrown if makeBadge has an error.					*/
	class BadgeInfoException extends Exception
	{
		public function __construct($errCode)
		{
			global $dbc;
			switch($errCode)
			{
				case 1:
					$err='User not logged in';
					break;
				case 2:
					$err='state must be a two letter acronym';
					break;
				case 3:
					$err='no image';
					break;
				case 4:
					$err='badge name not set';
					break;
				case 5:
					$err='badge description not set';
					break;
				case 6:
					$err='badge criteria not set';
					break;
				case 7:
					$err='badge category not set';
					break;
				case 8:
					$err='MySQL error: '.mysqli_error($dbc);
					break;
			}
			parent::__construct($err,$errCode);
		}
	}
/*This script adds badges to the database.  Throws BadgeInfoException.
																	*/
	function makeBadge($badge_name,$badge_desc,$criteria,$category_id,$state,$county,$image)
	{
		global $dbc;
		global $fgmembersite;
	//store error messages here
		$err=array();
	//checking if user is logged in
		if(!$fgmembersite->CheckLogin())
			throw new BadgeInfoException(1);
	//find errors
		if(!empty($state)&&strlen($state)!=2)
			throw new BadgeInfoException(2);
		if(empty($image))
			throw new BadgeInfoException(3);
		if(empty($badge_name))
			throw new BadgeInfoException(4);
		if(empty($badge_desc))
			throw new BadgeInfoException(5);
		if(empty($criteria))
			throw new BadgeInfoException(6);
		if(empty($category_id))
			throw new BadgeInfoException(7);
	//if there are no errors so far, then start the SQL query
		if(count($err)==0)
		{
		//find the issuer's user account and add the user id to the badge information for referencing in assertions
			$issuer=mysqli_fetch_array(mysqli_query($dbc,"SELECT id FROM people3 WHERE username='".$_SESSION[$fgmembersite->GetLoginSessionVar()]."'"),MYSQLI_ASSOC);
		//insert badge data into the SQL database
			mysqli_query
			(
				$dbc,
				"
					INSERT INTO images3
					(
						state,
						county,
						category,
						image,
						badge_desc,
						badge_crit,
						badge_name,
						issuer_id
					)
					VALUES
					(
						'".$state."',
						'".(int)$county."',
						'".(int)$category_id."',
						'".$image."',
						'".$badge_desc."',
						'".$criteria."',
						'".$badge_name."',
						'".(int)$issuer['id']."'
					)
				"
			);
		//if exactly one badge was not added to the database just now then add the mysql error to the error array
			if(mysqli_affected_rows($dbc)!=1)
				throw new BadgeInfoException(8);
		//if the badge was added succesfully then add the tags (check tags.php to see how that's done)
			if(count($err)==0)
				addTags(mysqli_real_escape_string($dbc,$_POST['tags']),(int)mysqli_insert_id($dbc));
		}
		return $err;
	}
/*Returns false if the user is not logged in.
 *Returns the badges that the user owns.
 */
	function getMyBadges()
	{
		global $dbc;
		global $fgmembersite;
		if(!$fgmembersite->CheckLogin())
			return false;
		$q=mysqli_query($dbc,"SELECT b.image_id FROM backpack b, people3 p WHERE p.id_user=b.id_user AND p.username='".$_SESSION[$fgmembersite->GetLoginSessionVar()]."'");
		while($row=mysqli_fetch_array($q,MYSQLI_ASSOC))$IDs[]=$row['image_id'];
		$q=mysqli_query($dbc,"SELECT image_id,badge_name,badge_desc FROM images3 WHERE image_id IN (".implode(',',$IDs).")");
		$badges=array();
		while($row=mysqli_fetch_array($q,MYSQLI_ASSOC))array_push($badges,$row);
		return $badges;
	}
/*Returns all the badges that the user with the given userID owns.
 */
	function getUserBadges($userID)
	{
		global $dbc;
		$q=mysqli_query($dbc,"SELECT image_id FROM backpack WHERE id_user=".$userID);
		while($row=mysqli_fetch_array($q,MYSQLI_ASSOC))$IDs[]=$row['image_id'];
		$q=mysqli_query($dbc,"SELECT image_id,badge_name,badge_desc FROM images3 WHERE image_id IN (".implode(',',$IDs).")");
		$badges=array();
		while($row=mysqli_fetch_array($q,MYSQLI_ASSOC))array_push($badges,$row);
		return $badges;
	}
?>
