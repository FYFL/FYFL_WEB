<?php
/*Gets all states from the database and prints them as HTML selection
 *options.
 */
	$dbc=@mysqli_connect('fyfl-3.fyflnetwork.org','szk0050','Stoneware!','FYFL-3')
	or die('Could not connect to MySQL: '.mysqli_connect_error());
	$r=mysqli_query($dbc,'SELECT abbreviation FROM states ORDER BY abbreviation ASC');
	if(mysqli_num_rows($r)>0)
		while($row=mysqli_fetch_array($r,MYSQLI_NUM))
			echo'<option value="'.$row[0].'"'.($row[0]==$_POST['state']?"selected":"").'>'.$row[0].'</option>';
	else echo'<option value="">Error loading states from database!</option>';
	mysqli_free_result($r);
?>
