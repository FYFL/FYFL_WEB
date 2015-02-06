<?php
	require_once(__DIR__ . "/dbc.php");
	require_once(__DIR__ . "/include/membersite_config.php");
	require_once(__DIR__ . "/tags.php");
/*This script adds badges to the database and returns an array of errors if any.
 */
	function makeBadge($badge_name,$badge_desc,$criteria,$category_id,$state,$county,$image)
	{
		global $dbc;
		global $fgmembersite;
	//checking if user is logged in
		if(!$fgmembersite->CheckLogin())
			$err[]='User not logged in';
	//find errors
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
						'".$county."',
						'".$category_id."',
						'".mysqli_real_escape_string($dbc,base64_decode(substr($_POST['image'],strpos($_POST['image'],",")+1)))."',
						'".mysqli_real_escape_string($dbc,$badge_desc)."',
						'".mysqli_real_escape_string($dbc,$criteria)."',
						'".mysqli_real_escape_string($dbc,$badge_name)."',
						'".$issuer['id']."'
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
?>
