<?php
	require_once(__DIR__ . "/GetUser.php");
	require_once(__DIR__ . "/CountyFromID.php");
	$test = getUser();
	var_dump($test);
	var_dump(CountyFromID($test['County']));
?>
