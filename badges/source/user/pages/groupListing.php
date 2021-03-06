<?php
	require_once(__DIR__ . '/../scripts/php/User.php');
	require_once(__DIR__ . '/../scripts/php/Group.php');
	require_once(__DIR__ . '/navbar.php');

	$group=getGroupInfo($_GET['groupId']);
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
        <h1 align="center"><?php echo $group['name']; ?></h1>
        <!-- Major content needs to go in here.-->
        <div class="wrap clearfix">


                <div>
                    <table class="table">
                        <tbody>
                    <?php
                        $users = usersFromGroup($group['id_group']);
                        foreach($users as $userId){
                            $user = userFromID($userId);
                    ?>
                            <tr>
                                <td><!-- This needs to be a person's profile picture just a placeholder right now. --><img height="50" width="75" src="../scripts/php/DisplayAvatar.php?i=<?php echo $userId; ?>" alt=""></td>
                                <td><a href="profile.php?id=<?php echo $user['id_user']; ?>"><?php echo $user['name'].' '.$user['lname']; ?></a></td>
                            </tr>

                    <?php } ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
</body>
</html>
