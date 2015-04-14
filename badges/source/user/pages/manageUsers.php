<?php
	require_once(__DIR__ . '/../scripts/php/User.php');
	require_once(__DIR__ . '/navbar.php');

	if(isset($_POST['submit'])){
		deleteUser($_POST['userId']);
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Manage Users</title>
	<link rel="stylesheet" href="../style/css/admin_level.css" type="text/css">
	<link rel="stylesheet" href="../style/bootstrap-3.2.0-dist/css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="../style/bootstrap-3.2.0-dist/css/bootstrap-theme.css" type="text/css">
	<script src="../scripts/js/jquery-1.8.2.min.js"></script>
	<script src="../style/bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
	<script src="../style/bootstrap-3.2.0-dist/bootstrap-hover-dropdown-master/bootstrap-hover-dropdown.min.js"></script>
</head>
<body>
<?php
	$me=getUser();
	navbar($me['user_level']);
?>
	<h2 class ="text-center">Manage Users</h2>
	<div class="container">
		<div class="row">
			<div class="wrap clearfix">
				<form action="manageUsers.php" method="POST">

					<table class="table">
						<tbody>
<?php
	$users=getUsers();
	foreach($users as $user){
?>
							<tr>
								<td><img height="50" width="75" src="../scripts/php/DisplayAvatar.php?i=<?php echo $user['id_user']; ?>" alt=""></td>
								<td><a href="profile.php?id=<?php echo $user['id_user']; ?>"><?php echo $user['name'].' '.$user['lname']; ?></a></td>
								<td><input type="checkbox" name="userId[]" value="<?php echo $user['id_user']; ?>"></td>
							</tr>
<?php } ?>
						</tbody>
					</table>
					<input type="submit" name="submit" value="delete">
				</form>
			</div>
		</div>
	</div>
</body>
</html>
