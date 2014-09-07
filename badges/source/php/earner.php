<?php
	$dbc=@mysqli_connect('fyfl-3.fyflnetwork.org','szk0050','Stoneware!','FYFL-3')or die 
	('Could not connect to MySQL: ' . mysqli_connect_error());
	$q=mysqli_query($dbc,"SELECT * from Hands_Response WHERE action='i'");
	while($rows=mysqli_fetch_array($q,MYSQLI_ASSOC))
	{
		echo
		'
		<tr>
			<td><span class="avatar"><a href="javascript:void(0);"><img src="images/user/default.png" width="55" height="55" alt="default avatar"></a></span><span class="earnernm">'.$rows['username'].'</span></td>
			<td>'.$rows['user_id'].'</td>
			<td>Robot Hands</td>
			<td><a class="fancybox-manual-b"href="http://www.fyflnetwork.org/sarthak2/Facilitator/Robot_Facilitator_s.php?i='.$rows['id_user'].'">Open</a></td>
		</tr>
		';
	}
	$q=mysqli_query($dbc,"SELECT * from Competition_Response WHERE action='i'");
	while($rows=mysqli_fetch_array($q))
	{
		echo
		'
		<tr>
			<td><span class="avatar"><a href="javascript:void(0);"><img src="images/user/default.png" width="55" height="55" alt="default avatar"></a></span><span class="earnernm">'.$rows['username'].'</span></td>
			<td>'.$rows['user_id'].'</td>
			<td>Robot Competitions</td>
			<td><a class="fancybox-manual-b"href="http://www.fyflnetwork.org/sarthak2/Facilitator/Robot_Competitions_fac.php?i='.$rows['id_user'].'">Open</a></td>
		</tr>
		';
	}
	$q=mysqli_query($dbc,"SELECT * from Mechatronics_Response WHERE action='i'");
	while($rows=mysqli_fetch_array($q))
	{
		echo
		'
		<tr>
			<td><span class="avatar"><a href="javascript:void(0);"><img src="images/user/default.png" width="55" height="55" alt="default avatar"></a></span><span class="earnernm">'.$rows['username'].'</span></td>
			<td>'.$rows['user_id'].'</td>
			<td>Robot Mechatronics</td>
			<td><a class="fancybox-manual-b"href="http://www.fyflnetwork.org/sarthak2/Facilitator/Robot_Mechatronics_fac.php?i='.$rows['id_user'].'">Open</a></td>
		</tr>
		';
	}
	$q=mysqli_query($dbc,"SELECT * from Movement_Response WHERE action='i'");
	while($rows=mysqli_fetch_array($q))
	{
		echo
		'
		<tr>
			<td><span class="avatar"><a href="javascript:void(0);"><img src="images/user/default.png" width="55" height="55" alt="default avatar"></a></span><span class="earnernm">'.$rows['username'].'</span></td>
			<td>'.$rows['user_id'].'</td>
			<td>Robot Movement</td>
			<td><a class="fancybox-manual-b"href="http://www.fyflnetwork.org/sarthak2/Facilitator/Robot_Movement_fac.php?i='.$rows['id_user'].'">Open</a></td>
		</tr>
		';
	}
	$q=mysqli_query($dbc,"SELECT * from Platforms_Response WHERE action='i'");
	while($rows=mysqli_fetch_array($q))
	{
		echo
		'
		<tr>
			<td><span class="avatar"><a href="javascript:void(0);"><img src="images/user/default.png" width="55" height="55" alt="default avatar"></a></span><span class="earnernm">'.$rows['username'].'</span></td>
			<td>'.$rows['user_id'].'</td>
			<td>Robot Platforms</td>
			<td><a class="fancybox-manual-b"href="http://www.fyflnetwork.org/sarthak2/Facilitator/Robot_Patforms_fac.php?i='.$rows['id_user'].'">Open</a></td>
		</tr>
		';
	}
?>
