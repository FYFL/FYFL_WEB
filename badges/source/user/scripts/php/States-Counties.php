<?php
	require_once(__DIR__ . "/dbc.php");
/* This script gets all counties from the database that are in the given
 * state.
 * The returned object takes the form of a two dimensional array where
 * the first value is the county's id and the second one is the county's
 * name.
 * Returns false if there's an error.
 */
	function getCounties($state)
	{
		global $dbc;
		$r=mysqli_query($dbc,"SELECT id,name FROM counties WHERE abbreviation='".$state."' ORDER BY abbreviation DESC");
		if(mysqli_num_rows($r)<=0)
			return false;
		while($row=mysqli_fetch_array($r,MYSQLI_NUM))
			$vars[]=array($row[0],$row[1]);
		mysqli_free_result($r);
		return $vars;
	}
/*Takes a county ID and returns a state abbreviation.
 *Returns false if there's a problem.
 */
	function stateFromCounty($id)
	{
		global $dbc;
		$x=mysqli_fetch_array(mysqli_query($dbc,"SELECT abbreviation FROM counties WHERE id=".$id),MYSQLI_NUM);
		return $x[0];
	}
/* This script takes an id number as a parameter and returns a county.
 * Returns false if there's an error.
 */
	function countyFromID($id)
	{
		global $dbc;
		$county=mysqli_fetch_array(mysqli_query($dbc,"SELECT name FROM counties WHERE id=".$id),MYSQLI_NUM);
		return $county[0];
	}
/*Get all states from database and returns them in an array.
 */
	function getStates()
	{
		global $dbc;
		$r=mysqli_query($dbc,'SELECT abbreviation,name FROM states ORDER BY abbreviation ASC');
		if(mysqli_num_rows($r)==0)
				return false;
		while($row=mysqli_fetch_array($r,MYSQLI_NUM))
			$vars[]=$row;
		mysqli_free_result($r);
		return$vars;
	}
?>
