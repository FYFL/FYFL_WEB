<?php
	function navbar($user_level){
?>
<nav class="navbar navbar-default navbar-fixed-top" id="header" role="navigation">
	<div class="container">
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
<?php if($user_level>0){ ?>
		<li><a href="../../../index.php" >Home</a></li>
		<li class="dropdown">
			<a href="" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Badges<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="browseBadge.php" >View Badges</a></li>
				<li><a href="userBadges.php" >View My Badges</a></li>
			</ul>
		</li>
		<li class="dropdown">
			<a href="" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Users<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="manageUsers.php" >Manage Users</a></li>
				<li><a href="manageGroups.php" >Manage Groups</a></li>
				<li><a href="browseGroups.php" >Join Groups</a></li>
			</ul>
		</li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href="profile.php" id="glyph" title="Profile"><span class="glyphicon glyphicon-user"></a></li>
		<li class="dropdown">
			<a href=""  title="Settings"  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"><span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="">Setting Stuff</a></li>
			</ul>
		</li>
		<li><a href="logout.php" id="glyph"  title="Logout"><span class="glyphicon glyphicon-log-out"></a></li>
<?php }elseif($user_level===0){ ?>
		<li><a href="../../../index.php" >Home</a></li>
		<li class="dropdown">
			<a href="" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Badges<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="userBadges.php" >View My Badges</a></li>
			</ul>
		</li>
		<li class="dropdown">
			<a href="" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Users<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="browseGroups.php" >Join Groups</a></li>
			</ul>
		</li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href="profile.php" id="glyph" title="Profile"><span class="glyphicon glyphicon-user"></a></li>
		<li class="dropdown">
			<a href=""  title="Settings"  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"><span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="">Setting Stuff</a></li>
			</ul>
		</li>
		<li><a href="logout.php" id="glyph"  title="Logout"><span class="glyphicon glyphicon-log-out"></a></li>
<?php }else{ ?>
		<li><a href="../../../index.php" >Home</a></li>
<?php } ?>
			</ul>
		</div>
		<a href="" class="hidden-xs hidden-sm"> <div id="headercircle"><img src="../style/images/FYFLnew.png" height="50"/></div></a>
	</div>
</nav>

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

<?php
	}//end navbar()
?>
