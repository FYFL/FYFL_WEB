<?php
	require_once(__DIR__ . "/dbc.php");
/*Get all academic catagories from database
 *and echo them as a json object.
 */	
	function getCategories()
	{
		global $dbc;
		$r=mysqli_query($dbc,"SELECT id,name FROM academicCategory ORDER BY name DESC");
		if(mysqli_num_rows($r)<=0)
			return false;
		while($row=mysqli_fetch_array($r,MYSQLI_NUM))
			$vars[]=array($row[0],$row[1]);
		mysqli_free_result($r);
		return $vars;
	}
?>
