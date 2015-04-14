<?php
	require_once(__DIR__ . "/source/php/Badges.php");
	$badges=getMyBadges();
	if($badges==false)header('Location: http://www.fyflnetwork.org/4h/badges/source/login.php');
?>
<html>
<head>
	<meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<title>Backpack</title>
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
					<li><a href="MyProfile.php" class="nav-button">My Profile</a></li>
				</ul>
			</div>
		</div>
		<a href="http://www.fyflnetwork.org/"> <div id="headercircle"><img src="images/FYFLnew.png" height="50"/></div></a>
	</nav>
	
	<div class="slide"id="odd"style="padding-top:75px">	  
		<div style="padding-top:50px">
			<div class="content" id="regHome">
				
				<div id="padding">      
					<table width="100%"border="1"cellpadding="5">
						<tr>
<?php
	foreach($badges as $badge)
		echo"<td align='center'valign='center'width='150px'height='150px'><img width='100px'src='source/php/DisplayImage.php?i=".$badge['image_id']."'></td>";
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
