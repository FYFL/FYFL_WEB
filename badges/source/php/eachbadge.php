<?php
/*The script gets badge information and echoes it as a JSON object.
 */
//need an image number
if(isset($_GET['i']))
{
//type cast the number for security
	$i=(int)$_GET['i'];
//connect to MySQL
	$dbc=@mysqli_connect('fyfl-3.fyflnetwork.org','szk0050','Stoneware!','FYFL-3')
 	or die('Could not connect to MySQL: '.mysqli_connect_error());
//retrieve the image information, JSON encode, and echo to JavaScript
	echo json_encode(mysqli_fetch_array(mysqli_query($dbc,"SELECT issuer_id,image_name,image_type,image_width,image_height,image_size,uploaded_date,badge_desc,badge_name,state,county,status,category FROM images3 WHERE image_id=$i"),MYSQLI_ASSOC));
}
?>
