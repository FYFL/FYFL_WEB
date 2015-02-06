<?php
require_once('../php/User.php');

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
    $groups = "Not Set";
    $userId = "Not Set";
} else {
    $username = $userInfo['username'];
    $firstName = $userInfo['name'];
    $lastName = $userInfo['lname'];
    $email = $userInfo['email'];
    $role = $userInfo['Adult'];
    $user_level = $userInfo['user_level'];
    $userId = $userInfo["id_user"];
    $State = $userInfo['State'];
    $County = $userInfo['County'];
    $groups = groupsFromUser($userId);
}


if (isset($_POST["id"])) {
    $id = $_POST["id"];
} else {
    $id = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>4-H Badges</title>
    <link rel="stylesheet" href="../../css/admin_level.css" type="text/css">
    <link rel="stylesheet" href="../../bootstrap-3.2.0-dist/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../bootstrap-3.2.0-dist/css/bootstrap-theme.css" type="text/css">

    <script src="../../js/jquery-1.8.2.min.js"></script>
    <script src="../../bootstrap-3.2.0-dist/js/bootstrap.js"></script>
    <script src="../../bootstrap-3.2.0-dist/bootstrap-hover-dropdown-master/bootstrap-hover-dropdown.min.js"></script>

</head>
<body id="backgroundColor">


<nav class="navbar navbar-default navbar-fixed-top" id="header" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="">Home</a></li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Badges<span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="">View My Badges</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="" id="glyph" title="Profile"><span class="glyphicon glyphicon-user"></a></li>
                <li class="dropdown">
                    <a href="" title="Settings" data-hover="dropdown" class="dropdown-toggle"
                       data-toggle="dropdown"><span class="glyphicon glyphicon-cog"><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="">Setting Stuff</a></li>
                    </ul>
                </li>
                <li><a href="" id="glyph" title="Logout"><span class="glyphicon glyphicon-log-out"></a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
        <a href="" class="hidden-xs hidden-sm">
            <div id="headercircle"><img src="../../images/FYFLnew.png" height="50"/></div>
        </a>
    </div>
    <!-- /.container-fluid -->

</nav>


<div class="container">
    <div class="row">

        <!-- Major content needs to go in here.-->
        <div class="wrap clearfix">
            <div class="container-inner-sections ">
                <div class="col-sm-4 col-xs-12 avatar">
                    <img src="http://www.placehold.it/300x200&amp;text=Avatar" alt="">

                    <p class="username"><?php echo $firstName . ' ' . $lastName; ?></p>

                    <?php if ($id == "" or $id == $userId) { ?>
                        <a>Edit Profile</a>
                    <?php } ?>
                </div>
                <div class="col-sm-8 col-xs-12">
                    <div class="col-xs-12 content">
                        <!--We can place information about a user here along with a link to a group.-->
                        <ul>
                            <li>
                                <div>Name:<span id="spaceFormat"><?php echo $firstName . " " . $lastName; ?></span>
                                </div>
                            </li>
                            <li>
                                <div>Role:<span id="spaceFormat"><?php echo $role; ?></span></div>
                            </li>
                            <li>
                                <div>Location:<span id="spaceFormat"><?php echo $County . ", " . $State; ?></span></div>
                            </li>
                            <li>
                                <div>Email: <span id="spaceFormat"><?php echo $email; ?></span></div>
                            </li>
                            <?php if ($groups != "Not Set" && !empty($groups)) { ?>
                                <li>Groups:
                                    <ul>
                                        <?php
                                        foreach ($group as $groups) {
                                            "<a><li>" . $group . "</li></a>";
                                        }
                                        ?>
                                    </ul>
                                </li>
                            <?php
                            } else { ?>
                                <li> You are not in any groups currently.</li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {
        $('a[href^="#"]').on('click', function (e) {
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

</body>
</html>