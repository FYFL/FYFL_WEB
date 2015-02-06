<?php
require_once('../php/Group.php');
require_once('../php/GetUser.php');

$userInfo = getUser();

if ($userInfo == false) {
    $username = "Not Set";
    $firstName = "Not Set";
    $lastName = "Not Set";
    $email = "Not Set";
    $user_level = "Not Set";
    $State = "Not Set";
    $County = "Not Set";
    $role = "Not Set";
} else {
    $username = $userInfo['username'];
    $firstName = $userInfo['name'];
    $lastName = $userInfo['lname'];
    $email = $userInfo['email'];
    $role = $userInfo['Adult'];
    $user_level = $userInfo['user_level'];
    $State = $userInfo['State'];
    $County = $userInfo['County'];
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Browse Badges</title>
    <link rel="stylesheet" href="../../css/admin_level.css" type="text/css">
    <link rel="stylesheet" href="../../bootstrap-3.2.0-dist/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../bootstrap-3.2.0-dist/css/bootstrap-theme.css" type="text/css">

    <script src="../../js/jquery-1.8.2.min.js"></script>
    <script src="../../bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
    <script src="../../bootstrap-3.2.0-dist/bootstrap-hover-dropdown-master/bootstrap-hover-dropdown.min.js"></script>
</head>


<body>
<?php
if($user_level!= "Not Set" and $user_level==0){
    ?>
    <nav class="navbar navbar-default navbar-fixed-top" id="header" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="" >Home</a></li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Badges<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="" >View Badges</a></li>
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

<?php } ?>

<?php
if($user_level!= "Not Set" and $user_level==1){
    ?>
    <nav class="navbar navbar-default navbar-fixed-top" id="header" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="" >Home</a></li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Badges<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="" >View My Badges</a></li>
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

<?php } ?>

<div class="container">
    <div class="row">

        <!-- Major content needs to go in here.-->
        <div class="wrap clearfix">
            <div class="container-inner-sections ">
                <table class="table table-responsive">
                    <tbody>
                    <?php

                    foreach ($badges as $currentBadge) {
                        echo "<tr>";
                        echo '<td class="editButtonTable"><a class="editButton" href="editBadge.php">Edit</a></td>';
                        echo "<td>";
                        echo '<img class="imageSize img-responsive img-rounded" alt="Responsive image" src="../source/php/DisplayImage.php?i=' . $currentBadge['image_id'] . '">';
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
        </div>
    </div>
</div>
</body>
</html>
