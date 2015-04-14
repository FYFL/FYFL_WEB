<?php
	require_once(__DIR__ . "/../scripts/php/Group.php");
	require_once(__DIR__ . "/../scripts/php/User.php");
	require_once(__DIR__ . "/navbar.php");
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
?>

<div class="container">

    <div class="row">
        <h1 align="center">Groups</h1>
        <!-- Major content needs to go in here.-->
        <div class="wrap clearfix">



                    <table class="table">
                        <tbody>
                    <?php
                        $groups=getGroups();
                        foreach($groups as $group){
                    ?>
                            <tr>
                                <td><?php echo $group['name']; ?></td>
                                <td><a href="manageGroup.php?groupId=<?php echo $group['id_group']; ?>">current members</a></td>
								<td><a href="groupApproval.php?groupId=<?php echo $group['id_group']; ?>">prospective members</a></td>
                            </tr>
                    <?php } ?>
                        </tbody>
                    </table>

        </div>
    </div>
</div>
</body>
</html>

