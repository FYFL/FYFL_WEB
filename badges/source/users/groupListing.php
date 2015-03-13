<?php
	require_once(__DIR__ . '/../php/User.php');
	require_once(__DIR__ . '/../php/Group.php');

	$userInfo = getUser();

	if($userInfo == false){
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
    }
    else{
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


	if(isset($_GET["groupId"])){
        $groupId = $_GET["groupId"];
    }
    else {
        $groupId = 11;
    }
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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

<?php
if($user_level==2){
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
if($user_level>2){
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
            <h1 align="center"><?php $group = getGroupInfo($groupId); echo $group['name']; ?></h1>

                <div>
                    <table class="table">
                        <tbody>
                    <?php
                        $users = usersFromGroup($groupId);
                        
                        foreach($users as $userId){
                            $user = userFromID($userId);
                    ?>
                            <tr>
                                <td><!-- This needs to be a person's profile picture just a placeholder right now. --><img height="50" width="75" src="../php/DisplayAvatar.php?i=<?php echo $userId; ?>" alt=""></td>
                                <td><a href="profile.php/?id=<?php echo $user['id_user']; ?>"><?php echo $user['name'].' '.$user['lname']; ?></a></td>
                            </tr>

                    <?php } ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
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

</body>
</html>
