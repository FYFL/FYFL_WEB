<?php
/*Get badges from database and filter by search parameters to echo as
 *json object.
 */
	require_once("tags.php");
	$dbc=@mysqli_connect('fyfl-3.fyflnetwork.org','szk0050','Stoneware!','FYFL-3')or die 
	('Could not connect to MySQL: ' . mysqli_connect_error());
	$badges=getBadgesFromTags($_POST['tag']);
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
	if($_POST['state']!="ALL")
	{
		$q.=$whereAnd.' state="'.$_POST['state'].'" ';
		$whereAnd="AND";
	}
//filter by county
	if($_POST['county']!="ALL")$q.=$whereAnd.' county="'.$_POST['county'].'" ';
//order by upload date
	$q.="ORDER BY uploaded_date DESC";
	$r=mysqli_query($dbc,$q);
	$badges=array();
	while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
		array_push($badges,$row);
	echo json_encode($badges);
?>
