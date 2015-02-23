<?php
	require_once(__DIR__ . "/source/php/Badges.php");
	require_once(__DIR__ . "/source/php/States-Counties.php");
	$badges=getBadges($_POST['tag'],$_POST['state'],$_POST['county']);
	$states=getStates();
	$counties=getCounties($_POST['state']);
?>
<html>
<head>
	<meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<title>Badge Browser</title>
	<link rel="stylesheet" href="css/normalize.css" type="text/css">
	<link rel="stylesheet" href="css/third_level_pages.css" type="text/css">
	<link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap-theme.css" type="text/css">
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>
	<script src="bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
<style type="text/css">
	#bottom{
		left:0;
		bottom: 20px;
		width:80%;
		margin: 0 10%;
		border-top:dotted 3px #999;
		font-color:#666;
		font-size:16px;
	}
</style>
</head>
<body id="backgroundColor">
	
	<nav class="navbar navbar-default" id="header" role="navigation">
		<div class="container-fluid">
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="BadgeBrowser.php" class="nav-button">Browse Badges</a></li>
					<li><a href="MyBadges.php" class="nav-button">Backpack</a></li>
					<li><a href="MyProphile.php" class="nav-button">My Prophile</a></li>
				</ul>
			</div>
		</div>
		<a href="http://www.fyflnetwork.org/"> <div id="headercircle"><img src="images/FYFLnew.png" height="50"/></div></a>
	</nav>
	
	<div class="slide"id="odd"style="padding-top:75px">	  
		<div style="padding-top:50px">
			<div class="content" id="regHome">
				
				<form id="padding"action="BadgeBrowser.php"method="post">
					<input name="tag"type="text">
					<select name="state">
						<option value="">all states</option>
<?php
	foreach($states as $state)
		echo"<option value='".$state."'".($state==$_POST['state']?"selected='selected'":"").">".$state."</option>";
?>
					</select>
					<select name="county">
						<option value="">all counties</option>
<?php
	foreach($counties as $county)
		echo"<option value='".$county[0]."'".($county[0]==$_POST['county']?"selected='selected'":"").">".$county[1]."</option>";
?>
					</select>
				</form>
				
				<div id="padding">      
					<table width="100%"border="1"cellpadding="5">
						<tr>
<?php
	foreach($badges as $badge)
		echo"<td align='center'valign='center'width='150px'height='150px'><img width='100px'src='source/php/displayImage.php?i=".$badge['image_id']."'></td>";
?>
						</tr>
						<tr>
<?php
	foreach($badges as $badge)
		echo"<td align='center'valign='center'width='150px'height='150px'>".$badge['badge_desc']."</td>";
?>
						</tr>
					</table>
				</div>
			
			</div>
		</div>
	</div>
	
</body>
</html>
