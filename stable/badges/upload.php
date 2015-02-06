<html lang="en">
<head>
	<meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<title>Upload Avatar</title>
<!--	<link rel="stylesheet" href="css/admin_level.css" type="text/css">
	<link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap-theme.css" type="text/css">
	
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>
	<script src="bootstrap-3.2.0-dist/bootstrap-hover-dropdown-master/bootstrap-hover-dropdown.min.js"></script>
	-->
</head>
<body id="backgroundColor">

<nav class="navbar navbar-default navbar-fixed-top" id="header" role="navigation">
	<div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
		<li><a href="adminProfile.php">Home</a></li>
		<li class="dropdown">
		<a href="" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Badges<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
			<li><a href="browseBadge.php">View Badges</a></li>
		<li><a href="approveBadges.php" >Approve Badges</a></li>
			</ul>
		</li>
<li class="dropdown">
<a href="" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Users<span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<li><a href="manageUsers.php" >Manage Users</a></li>
<li><a href="" >Check User Badges</a></li>
</ul>
</li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li><a href="" id="glyph" title="Profile"><span class="glyphicon glyphicon-user"></a></li>
<li class="dropdown">
<a href="" title="Settings" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"><span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<li><a href="">Setting Stuff</a></li>
</ul>
</li>
<li><a href="" id="glyph" title="Logout"><span class="glyphicon glyphicon-log-out"></a></li>
</ul>
</div><!-- /.navbar-collapse -->
<a href="" class="hidden-xs hidden-sm"> <div id="headercircle"><img src="../../images/FYFLnew.png" height="50"/></div></a>
</div><!-- /.container-fluid -->
</nav>

<div class="container">
<div class="wrap clearfix">
<?php
//includes ~Jesse
require_once(__DIR__ . "/source/php/User.php");
require_once(__DIR__ . "/source/php/utils.php");
if(isset($_REQUEST['submit']))
{
	try
	{
	//editUser() returns false if there is an error.
	//uploadImage() outputs file contents as a sanitized string. ~Jesse
		if(editUser(uploadImage($_FILES["imgfile"])))
			echo"avatar upload successful";
		else echo"avatar upload unseccessful";
	}
//uploadImage throws an ImageUploadException
	catch(ImageUploadException $e){echo $e->getMessage();}
}
else
{
?>
<form method="post" enctype="multipart/form-data">
File name:<input class="btn btn-default" type="file" name="imgfile"><br>
<input class="btn btn-primary" type="submit" name="submit" value="Upload">
</form>
<?php
}
?> 
</div>
</div>
</html>
</body>
