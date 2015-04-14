<?php
	require_once(__DIR__ . "/dbc.php");
	header('Content-Type: image/png');
/*
* Because the images are stored as a BLOB type in the database, there is no hard link to the file.
*/
	if(empty($_GET['i']))return false;
	$r=mysqli_query($dbc,"SELECT avatar FROM people3 WHERE id_user=".(int)$_GET['i']);
	if(mysqli_num_rows($r)!=1)
		exit;
	$row=mysqli_fetch_array($r,MYSQLI_ASSOC);
	mysqli_free_result($r);
	echo $row['avatar'];
?>     
