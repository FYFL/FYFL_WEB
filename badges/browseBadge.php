<?php
	include '/source/php/GetBadges.php';
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Browse Badges</title>;
	<link rel="stylesheet" href="css/admin_level.css" type="text/css">
	<link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap-theme.css" type="text/css">
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>
	<script src="bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
	<script src="bootstrap-3.2.0-dist/bootstrap-hover-dropdown-master/bootstrap-hover-dropdown.min.js"></script>
</head>


<body style="background-image:url(images/greyback.png); background-repeat:repeat;">
	<nav class="navbar navbar-default navbar-fixed-top" id="header" role="navigation">
	<div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
		<li><a href="index.html" >Home</a></li>
		<li class="dropdown">
		<a href="" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Badges<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
			<li><a href="browseBadges.php" >View Badges</a></li>
		<li><a href="" >Approve Badges</a></li>
			</ul>
		</li>
<li class="dropdown">
<a href="" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Users<span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<li><a href="" >Manage Users</a></li>
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
<a href="" class="hidden-xs hidden-sm"> <div id="headercircle"><img src="images/FYFLnew.png" height="50"/></div></a>
</div><!-- /.container-fluid -->
</nav>
	
<center><h2>Browse Badges</h2></center>

	
<div class="col-xs-12 col-sm-6 col-md-8" id="badges_table">
<div class="container-inner-sections ">
<table class="table">
    <thead>
		<tr style="font-weight: bold">
            <td></td>
			<td>Image ID</td>
			<td>Badge Name</td>
			<td>Badge Description</td>
			<td>Status</td>
        </tr>
	</thead>
    <tbody>
	<?php
			$badges = getBadges("","","");
			foreach ($badges as $currentBadge){
				echo "<tr>";
					echo '<td style="border-right-style: solid; border-right-width: 1px; border-right-color: #DDD; padding-left: 35px;"><a href="editBadge.php">Edit</a></td>';
					echo "<td>".$currentBadge['image_id']."</td>";
					echo "<td>".$currentBadge['badge_name']."</td>";
					echo "<td>".$currentBadge['badge_desc']."</td>";
					echo "<td>".$currentBadge['status']."</td>";
				echo "</tr>";
					}
	?>
		</tbody>
</table>
</div>
</div>

</body>
</html>
