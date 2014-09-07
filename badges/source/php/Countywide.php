<?php
/*This script gets all counties from the database that are in the given
 *state and prints them as HTML selection options.
 */
	$dbc=@mysqli_connect('fyfl-3.fyflnetwork.org','szk0050','Stoneware!','FYFL-3')
	or die('Could not connect to MySQL: '.mysqli_connect_error());
	$r=mysqli_query($dbc,"SELECT id,name FROM counties WHERE abbreviation='".$_GET['s']."' ORDER BY abbreviation DESC");
	if(mysqli_num_rows($r)>0)
		while($row=mysqli_fetch_array($r,MYSQLI_NUM))
			echo'<option value="'.$row[0].'">'.$row[1].'</option>';
	else echo'<option>No counties in database for: '.$_GET['s'].'</option>';
	mysqli_free_result($r);
?>
