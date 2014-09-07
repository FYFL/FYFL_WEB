<?php
/*
* Because the images are stored as a BLOB type in the database, there is no hard link to the file.
* Append the image id to the url of this script to make a link to that image for all intents and purposes.
*/
if(isset($_GET['i']))
{
	$dbc=@mysqli_connect('fyfl-3.fyflnetwork.org','szk0050','Stoneware!','FYFL-3')or die('Could not connect to MySQL:'.mysqli_connect_error());
	$r=mysqli_query($dbc,"SELECT image,image_name,image_type,image_size FROM images3 WHERE image_id=".(int)$_GET['i']);
	if(mysqli_num_rows($r)==1)
	{
		$row=mysqli_fetch_array($r,MYSQLI_ASSOC);
		header("Content-Type: {$row['image_type']}\n");
		header("Content-Disposition: inline; filename=\"{$row['image_name']}\"\n");
		header("Content-Length: {$row['image_size']}\n");
		echo $row['image'];
	}
	else echo'error loading image with id:'.$_GET['i'];
}
?>     