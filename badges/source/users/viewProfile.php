<?php
	require_once('../php/Users.php');
	
	$userInfo = getUser($userID);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<title><?php $userInfo['name'].' '.$userInfo['lname']?></title>
	<link rel="stylesheet" href="../../css/admin_level.css" type="text/css">
	<link rel="stylesheet" href="../../bootstrap-3.2.0-dist/css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="../../bootstrap-3.2.0-dist/css/bootstrap-theme.css" type="text/css">
	
	<script src="../../js/jquery-1.8.2.min.js"></script>
	<script src="../../bootstrap-3.2.0-dist/js/bootstrap.js"></script>
	<script src="../../bootstrap-3.2.0-dist/bootstrap-hover-dropdown-master/bootstrap-hover-dropdown.min.js"></script>
	
</head>
<body id="backgroundColor">

<nav class="navbar navbar-default navbar-fixed-top" id="header" role="navigation">
  <div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="adminProfile.php" >Home</a></li>
		<li class="dropdown">
          <a href="" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Badges<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="browseBadge.php" >View Badges</a></li>
            <li><a href="" >Approve Badges</a></li>
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
          <a href=""  title="Settings"  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="">Setting Stuff</a></li>
          </ul>
        </li>
		<li><a href="" id="glyph"  title="Logout"><span class="glyphicon glyphicon-log-out"></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
	<a href="" class="hidden-xs hidden-sm"> <div id="headercircle"><img src="../../images/FYFLnew.png" height="50"/></div></a>
  </div><!-- /.container-fluid -->
  
</nav>
<div class="container">
	<div class="row">
	
	<!-- Major content needs to go in here.-->
		<div class="wrap clearfix">
			<div class="container-inner-sections ">
				<div class="col-sm-4 col-xs-12 avatar">
					<img src="http://www.placehold.it/300x200&amp;text=Avatar" alt="">
					<p class="username"><?php $userInfo['name'].' '.$userInfo['lname']?></p>
				</div>
				<div class="col-sm-8 col-xs-12">    
					<div class="col-xs-12 content">
						<!--a href="editAdminProfile.php"><button type="button" class="btn btn-primary">Edit Profile</button></a-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<script>

		$(document).ready(function(){
	$('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash,
	    $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 900, 'swing', function () {
	        window.location.hash = target;
	    });
	});
});

$('.dropdown-toggle').dropdown();
	</script>

</body>
</html>