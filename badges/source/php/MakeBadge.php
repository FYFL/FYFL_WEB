<?php
/*This script adds badges to the database and echoes errors if any.
 */
	require_once(__DIR__ . "/include/membersite_config.php");
	require_once(__DIR__ . "/tags.php");
//connecting to database
	$dbc=@mysqli_connect('fyfl-3.fyflnetwork.org','szk0050','Stoneware!','FYFL-3')
	or die($err[0]='Could not connect to MySQL: '.mysqli_connect_error());
//checking if user is logged in
	if(!$fgmembersite->CheckLogin())
		$err[1]='User not logged in';
//find errors
	/*if
	(
		!in_array($_FILES['upload']['type'],
		array('image/gif','image/jpeg','image/jpg','image/pjpeg','image/png'))
	)
		$err[2]='Please upload a JPEG, GIF, or PNG image.';*/
	if($_POST['badge_name']=="")
		$err[3]='badge name not set';
	if($_POST['badge_desc']=="")
		$err[4]='badge description not set';
	if($_POST['criteria']=="")
		$err[5]='badge criteria not set';
	if($_POST['category_id']=="")
		$err[6]='badge category not set';
//if there are no errors so far, then start the SQL query
	if(count($err)==0)
	{
	//find the issuer's user account and add the user id to the badge information for referencing in assertions
		$issuer=mysqli_fetch_array(mysqli_query($dbc,"SELECT id FROM people3 WHERE username='".$_SESSION[$fgmembersite->GetLoginSessionVar()]."'"),MYSQLI_ASSOC);
	//get the image's height and width
		list($height,$width)=getimagesize($_FILES['upload']['tmp_name']);
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
					image_name,
					image_type,
					image_width,
					image_height,
					image_size,
					badge_desc,
					badge_crit,
					badge_name,
					issuer_id
				)
				VALUES
				(
					'".$_POST['state']."',
					'".$_POST['county']."',
					'".$_POST['category_id']."',
					'".mysqli_real_escape_string($dbc,base64_decode(str_replace(' ','+',substr($_POST['image'],strpos($_POST['image'],",")+1))))."',
					'".mysqli_real_escape_string($dbc,$_FILES['upload']['name'])."',
					'".$_FILES['upload']['type']."',
					'".$width."',
					'".$height."',
					'".(int)$_FILES['upload']['size']."',
					'".mysqli_real_escape_string($dbc,$_POST['badge_desc'])."',
					'".mysqli_real_escape_string($dbc,$_POST['criteria'])."',
					'".mysqli_real_escape_string($dbc,$_POST['badge_name'])."',
					'".$issuer['id']."'
				)
			"
		);
	//if exactly one badge was not added to the database just now then add the mysql error to the error array
		if(mysqli_affected_rows($dbc)!=1)
			$err[7]='MySQL error: '.mysqli_error($dbc);
	//if the badge was added succesfully then add the tags (check tags.php to see how that's done)
		if(count($err)==0)
			addTags(mysqli_real_escape_string($dbc,$_POST['tags']),(int)mysqli_insert_id($dbc));
	}
	echo implode(',',$err);
//redirect back to the profile page
	header("Location: http://www.fyflnetwork.org/4h/badges/source/badgeManager.php");
	die();
?>
