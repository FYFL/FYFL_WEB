<?php
	require_once(__DIR__ . "/../scripts/php/Group.php");
	require_once(__DIR__ . "/../scripts/php/User.php");
	require_once(__DIR__ . "/navbar.php");

	$me=getUser();
	if(isset($_POST['submit'])&&isset($me['id_user'])){
		foreach($_POST['groupId'] as $group)
			pairUserToGroupPending($me['id_user'],$group);
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
	navbar($me['user_level']);
?>

<div class="container">

    <div class="row">
        <h1 align="center">Groups</h1>
        <!-- Major content needs to go in here.-->
        <div class="wrap clearfix">


					<form action="browseGroups.php" method="POST">

                    <table class="table">
                        <tbody>
                    <?php
                        $groups=getGroups();
                        $myGroups=groupsFromUser($me['id_user']);
                        $pending=getGroupsPending($me['id_user']);
                        foreach($groups as $group){
                    ?>
                            <tr>
                                <td><?php echo $group['name']; ?></td>
						<?php if(in_array($group['id_group'],$myGroups)){ ?>
								<td>member</td>
							<?php } elseif(in_array($group['id_group'],$pending)) { ?>
								<td>pending</td>
							<?php } else {?>
								<td>join<input type="checkbox" name="groupId[]" value="<?php echo $group['id_group']; ?>"></td>
								<?php } ?>
                            </tr>
                    <?php } ?>
                        </tbody>
                    </table>
                        <input type="submit" name="submit" value="join">
                    </form>
        </div>
    </div>
</div>
</body>
</html>

