<?php
	require_once(__DIR__ . "/dbc.php");
/*
* Because the images are stored as a BLOB type in the database, there is no hard link to the file.
*/
	function displayImage($image_id)
	{
		global $dbc;
		if(empty($image_id))return false;
		$r=mysqli_query($dbc,"SELECT image FROM images3 WHERE image_id=".(int)$image_id);
		if(mysqli_num_rows($r)!=1)
			return false;
		$row=mysqli_fetch_array($r,MYSQLI_ASSOC);
		mysqli_free_result($r);
		return $row['image'];
	}
?>     
