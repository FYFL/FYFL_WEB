<?php
	require_once(__DIR__ . "/dbc.php");
	require_once(__DIR__ . "/tags.php");
	require_once(__DIR__ . "/include/membersite_config.php");
/*Get badges from database and filter by search parameters to return as
 *an array.
 */
	function getBadges($offset,$limit,$tag,$state,$county)
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
			$q.=' LIMIT '.$offset.' '.$limit;
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
/*This script adds badges to the database and returns an array of errors if any.
 */
	function makeBadge($badge_name,$badge_desc,$criteria,$category_id,$state,$county,$image)
	{
		global $dbc;
		global $fgmembersite;
	//store error messages here
		$err=array();
	//checking if user is logged in
		if(!$fgmembersite->CheckLogin())
			$err[]='User not logged in';
	//find errors
		if(empty($state)||strlen($state)!=2)
			$err[]='state must be a two letter acronym';
		if(empty($image))
			$err[]='no image';
		if(empty($badge_name))
			$err[]='badge name not set';
		if(empty($badge_desc))
			$err[]='badge description not set';
		if(empty($criteria))
			$err[]='badge criteria not set';
		if(empty($category_id))
			$err[]='badge category not set';
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
						'".mysqli_real_escape_string($dbc,base64_decode(substr($_POST['image'],strpos($_POST['image'],",")+1)))."',
						'".mysqli_real_escape_string($dbc,$badge_desc)."',
						'".mysqli_real_escape_string($dbc,$criteria)."',
						'".mysqli_real_escape_string($dbc,$badge_name)."',
						'".(int)$issuer['id']."'
					)
				"
			);
		//if exactly one badge was not added to the database just now then add the mysql error to the error array
			if(mysqli_affected_rows($dbc)!=1)
				$err[]='MySQL error: '.mysqli_error($dbc);
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
