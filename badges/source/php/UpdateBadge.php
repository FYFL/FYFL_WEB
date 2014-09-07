<?php
	$dbc=@mysqli_connect('fyfl-3.fyflnetwork.org','szk0050','Stoneware!','FYFL-3')
	or die('Could not connect to MySQL: '.mysqli_connect_error());
	$q="UPDATE images3 SET ";
	//$_POST['badge_name']=mysql_real_escape_string(trim($_POST['badge_name']));
	if(isset($_POST['badge_name'])&&$_POST['badge_name']!="")
		$arr[0]="badge_name='".$_POST['badge_name']."'";
	//$_POST['badge_desc']=mysql_real_escape_string(trim($_POST['badge_desc']));
	if(isset($_POST['badge_desc'])&&$_POST['badge_desc']!="")
		$arr[1]="badge_desc='".$_POST['badge_desc']."'";
	if(isset($_POST['status'])&&$_POST['status']!=""&&strlen($_POST['status'])==1)
		$arr[2]="status='".$_POST['status']."'";
	if(isset($_POST['state'])&&$_POST['state']!=""&&strlen($_POST['state'])==2)
		$arr[3]="state='".$_POST['state']."'";
	if(isset($_POST['county'])&&$_POST['county']!=""&&is_int($_POST['county']))
		$arr[4]="county='".$_POST['county']."'";
	$q.=implode(",",$arr);
	$q.=" WHERE image_id=".$_POST['image_id'];
	mysqli_query($dbc,$q);
?>
