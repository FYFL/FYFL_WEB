<?php
	$dbc=@mysqli_connect('fyfl-3.fyflnetwork.org','szk0050','Stoneware!','FYFL-3')
	or die('Could not connect to MySQL: '.mysqli_connect_error());
	$r=mysqli_query($dbc,"SELECT id,name FROM academicCategory ORDER BY name DESC");
	if(mysqli_num_rows($r)>0)
		while($row=mysqli_fetch_array($r,MYSQLI_NUM))
			echo'<option value="'.$row[0].'"'.($row[0]==$_POST['category_id']?"selected":"").'>'.$row[1].'</option>';
	else echo'<option value="">No academic categories in database!</option>';
	mysqli_free_result($r);
?>
