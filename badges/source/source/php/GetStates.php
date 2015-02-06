<?php
	require_once(__DIR__ . "/dbc.php");
/*Get all states from database and echo them as a json object.
 */
	function getStates()
	{
		global $dbc;
		$r=mysqli_query($dbc,'SELECT abbreviation FROM states ORDER BY abbreviation ASC');
		if(mysqli_num_rows($r)==0)
				return false;
		while($row=mysqli_fetch_array($r,MYSQLI_NUM))
			$vars[]=$row[0];
		mysqli_free_result($r);
		return$vars;
	}
?>
