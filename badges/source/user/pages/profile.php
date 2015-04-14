<?php
	require_once(__DIR__ . '/../scripts/php/User.php');
	require_once(__DIR__ . '/../scripts/php/Group.php');
	require_once(__DIR__ . '/../scripts/php/States-Counties.php');
	require_once(__DIR__ . '/navbar.php');
	
	if(isset($_GET['id'])){$user=userFromID($_GET['id']);}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<title>4-H Badges</title>
	<link rel="stylesheet" href="../style/css/admin_level.css" type="text/css">
	<link rel="stylesheet" href="../style/bootstrap-3.2.0-dist/css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="../style/bootstrap-3.2.0-dist/css/bootstrap-theme.css" type="text/css">
	
	<script src="../scripts/js/jquery-1.8.2.min.js"></script>
	<script src="../style/bootstrap-3.2.0-dist/js/bootstrap.js"></script>
	<script src="../style/bootstrap-3.2.0-dist/bootstrap-hover-dropdown-master/bootstrap-hover-dropdown.min.js"></script>
	
</head>
<body id="backgroundColor">

<?php
	$me=getUser();
	navbar($me['user_level']);
	if(empty($user))$user=$me;
	if(empty($user)){ ?>
		no such user
</body>
<?php
		exit;
	}
?>


<div class="container">
	<div class="row">
	
	<!-- Major content needs to go in here.-->
		<div class="wrap clearfix">
			<div class="container-inner-sections ">
				<div class="col-sm-4 col-xs-12 avatar">
						<img height="150" width="100" src="../scripts/php/DisplayAvatar.php?i=<?php echo $user['id_user']; ?>" alt="">
						<p class="username"><?php echo $user['name'].' '.$user['lname']; ?></p>
						<?php if($me['id_user']===$user['id_user']){ ?>
							<a href="editProfile.php">Edit Profile</a>
						<?php } ?>
				</div>
				<div class="col-sm-8 col-xs-12">    
					<div class="col-xs-12 content">
						<!--We can place information about a user here along with a link to a group.-->
						<ul>
							<li><div>Name:<span id="spaceFormat"><?php echo $user['name'].' '.$user['lname']; ?></span></div></li>
							<!--<li><div>Role:<span id="spaceFormat"><?php echo $user['user_level']; ?></span></div></li> -->
							<li><div>Location:<span id="spaceFormat"><?php echo countyFromID($user['County']).", ".$user['State']; ?></span></div></li>
							<li><div>Email: <span id="spaceFormat"><?php echo $user['email']; ?></span></div></li>
							<li>Groups:
								<ul>
								<?php
									$groups=groupsFromUser($user['id_user']);
									if(isset($groups)) {
										foreach ($groups as $groupId) {
											$group = getGroupInfo($groupId);
											if(isset($group)) {
												echo "<li><a href='groupListing.php?groupId=" . $groupId . "'>" . $group['name'] . "</a></li>";
											}
										}
									}
								else{
									echo "<p>You are not a part of any groups.</p>";
								}
								?>
								</ul>
							</li>
						</ul>
					</div>
					<div class="col-xs-12 avatar">
						<a href="userBadges.php?id=<?php echo $user['id_user']; ?>">user's badges</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>
