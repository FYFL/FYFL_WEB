<?php
require_once(__DIR__ . '/../scripts/php/Badges.php');
require_once(__DIR__ . '/../scripts/php/User.php');
require_once(__DIR__ . '/navbar.php');
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Browse Badges</title>
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
<h2 class ="text-center">Browse Badges</h2>

<div class="wrap clearfix">

    <table class="table table-responsive">
        <thead>
        <tr style="font-weight: bold">
            <td>Badge Image</td>
            <td>Badge Name</td>
            <td>Badge Description</td>
            <td>Status</td>
        </tr>
        </thead>
        <tbody>
        <?php
        $badges=getBadges();
        foreach ($badges as $currentBadge) {
            echo "<tr>";
            echo "<td>";
            echo '<img class="imageSize img-responsive img-rounded" alt="Responsive image" src="../scripts/php/DisplayImage.php?i=' . $currentBadge['image_id'] . '">';
            echo "</td>";
            echo "<td>" . $currentBadge['badge_name'] . "</td>";
            echo "<td>" . $currentBadge['badge_desc'] . "</td>";
            echo "<td>" . $currentBadge['status'] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
