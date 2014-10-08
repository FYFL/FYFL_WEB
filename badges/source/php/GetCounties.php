<?php
/* This script gets all counties from the database that are in the given
 * state and prints them as a json object.
 * The returned object takes the form of a two dimensional array where
 * the first value is the county's id and the second one is the county's
 * name.
 */
	$dbc=@mysqli_connect('fyfl-3.fyflnetwork.org','szk0050','Stoneware!','FYFL-3')
	or die('Could not connect to MySQL: '.mysqli_connect_error());
	$r=mysqli_query($dbc,"SELECT id,name FROM counties WHERE abbreviation='".$_GET['s']."' ORDER BY abbreviation DESC");
	if(mysqli_num_rows($r)>0)
	{
		$vars;
		while($row=mysqli_fetch_array($r,MYSQLI_NUM))
			$vars[]=array($row[0],$row[1]);
		echo json_encode($vars);
	}
	else echo 'false';
	mysqli_free_result($r);
?>
