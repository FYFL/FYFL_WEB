<?php
	require_once(__DIR__ . "/dbc.php");
/*This script is for editing badge information.
 */
	function editBadge($image_id,$badge_name,$badge_desc,$status,$state,$county)
	{
		global $dbc;
		$q="UPDATE images3 SET ";
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
		$q.=implode(",",$arr);
		$q.=" WHERE image_id=".$image_id;
		mysqli_query($dbc,$q);
	}
?>
