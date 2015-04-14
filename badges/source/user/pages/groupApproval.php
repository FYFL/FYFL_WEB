<?php
	require_once(__DIR__ . '/../scripts/php/User.php');
	require_once(__DIR__ . '/../scripts/php/Group.php');
	require_once(__DIR__ . '/navbar.php');

	$group=getGroupInfo($_GET['groupId']);
	if(isset($_POST['submit'])&&isset($_GET['groupId'])){
		if($_POST['action']=="approve")foreach($_POST['userId'] as $user)
			pairUserToGroup($user,$_GET['groupId']);
		if($_POST['action']=="deny")foreach($_POST['userId'] as $user)
			denyUserFromGroup($user,$_GET['groupId']);
	}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
	if(empty($group)){ ?>
		no such group
</body>
<?php
		exit;
	}
?>

<div class="container">

    <div class="row">

        <!-- Major content needs to go in here.-->
        <div class="wrap clearfix">
            <h1 align="center"><?php echo $group['name']; ?></h1>

                <div>
				<form action="groupApproval.php?groupId=<?php echo $_GET['groupId'] ?>" method="POST">
					<input type="submit" name="submit" value="submit">
					approve
					<input type="radio" name="action" value="approve" checked>
					deny
					<input type="radio" name="action" value="deny">
                    <table class="table">
                        <tbody>
                    <?php
                        $users = getMembersPending($group['id_group']);
                        foreach($users as $userId){
                            $user = userFromID($userId);
                    ?>
                            <tr>
                                <td><img height="50" width="75" src="../scripts/php/DisplayAvatar.php?i=<?php echo $userId; ?>" alt=""></td>
                                <td><a href="profile.php?id=<?php echo $user['id_user']; ?>"><?php echo $user['name'].' '.$user['lname']; ?></a></td>
                                <td><input type="checkbox" name="userId[]" value="<?php echo $user['id_user']; ?>"></td>
                            </tr>

                    <?php } ?>
                        </tbody>
                    </table>
                </form>
                </div>
        </div>
    </div>
</div>
</body>
</html>
