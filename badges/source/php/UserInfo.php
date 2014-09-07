<?php
/*Get all of a user's information and echo it as a json object.
 */
	$dbc=@mysqli_connect('fyfl-3.fyflnetwork.org','szk0050','Stoneware!','FYFL-3')
	or die('Could not connect to MySQL: '.mysqli_connect_error());
	if(!$fgmembersite->CheckLogin())
	{
		$fgmembersite->RedirectToURL("./login.php");
		exit;
	}
	$vars=mysqli_fetch_array(mysqli_query($dbc,"SELECT username,name,lname,email,user_level,Adult,State,County FROM people3 WHERE username='".$_SESSION[$fgmembersite->GetLoginSessionVar()]."'"),MYSQLI_ASSOC);
	$county=mysqli_fetch_array(mysqli_query($dbc,"SELECT name FROM counties WHERE id=".$vars['County']),MYSQLI_ASSOC);
	$vars['County']=$county['name'];
	echo json_encode($vars);
?>
