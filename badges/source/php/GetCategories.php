<?php
/*Get all academic catagories from database
 *and echo them as a json object.
 */
	$dbc=@mysqli_connect('fyfl-3.fyflnetwork.org','szk0050','Stoneware!','FYFL-3')
	or die('Could not connect to MySQL: '.mysqli_connect_error());
	$r=mysqli_query($dbc,"SELECT id,name FROM academicCategory ORDER BY name DESC");
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
