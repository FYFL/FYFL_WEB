<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>4-H Badges</title>
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link rel="stylesheet" href="css/third_level_pages.css" type="text/css">
    <link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap-theme.css" type="text/css">

    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>
    <script src="bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>

    <style type="text/css">
        #bottom{
            border-top:dotted 3px #999;

        }
    </style>
</head>
<body id="backgroundColor">

<nav class="navbar navbar-default" id="header" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php" class="nav-button">Home</a></li>
                <li><a href="#regHome" class="nav-button">Getting Started</a></li>
                <li><a href="index.php#badge" class="nav-button">Overview</a></li>
                <li><a href="index.php#overview" class="nav-button">4-H Badges</a></li>
                <li><a href="resources.html" class="nav-button">Resources</a></li>
                <!-- <li class="dropdown">
                  <a href="#" id="navStyle" class="dropdown-toggle" data-toggle="dropdown">Login<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#regStaff" class="nav-button">Staff</a></li>
                    <li><a href="#regVolunteer" class="nav-button">Volunteer</a></li>
                    <li><a href="#regParents" class="nav-button">Parents</a></li>
                    <li><a href="#regChild" class="nav-button">Child</a></li>
                  </ul>
                </li> -->
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    <a href="http://www.fyflnetwork.org/"> <div id="headercircle"><img src="images/FYFLnew.png" height="50"/></div></a>
</nav>

<div class="container">
    <div class="row">

        <!-- Major content needs to go in here.-->
        <div class="wrap clearfix">
            <div class="container-inner-sections ">
                <div class="">
                    <div class="content">
                        <!--We can place information about a user here along with a link to a group.-->
                        <form method="post" enctype="multipart/form-data">
                            First Name: <input name="firstName" type="text" placeholder="Type in your first name."/><br>
                            Last Name: <input name="lastName" type="text" placeholder="Type in your last name."/><br>
                            User Name: <input name="userName" type="text" placeholder="Type in your desired user name."/><br>
                            Email: <input name="email" type="email" placeholder="Enter your password."/><br>
                            Password: <input name="password" type="password" placeholder="Type in your desired password."/><br>
                            Confirm Password: <input name="confPassword" type="password" placeholder="Retype the given password."/><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="bottom">
    copy rights and stuff
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