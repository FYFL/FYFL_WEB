<?php
	require_once(__DIR__ . "/dbc.php");
	$vars=mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM people3 WHERE id_user=100"),MYSQLI_ASSOC);
	var_dump($vars);
	echo"test";
?>
