<?php
	require_once(__DIR__ . "/dbc.php");
/* This script takes an id number as a parameter and returns a county.
 * Returns false if there's an error.
 */
	function countyFromID($id)
	{
		global $dbc;
		$county=mysqli_fetch_array(mysqli_query($dbc,"SELECT name FROM counties WHERE id=".$id),MYSQLI_NUM);
		return $county[0];
	}
?>
