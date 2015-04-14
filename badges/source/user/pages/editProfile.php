<?php
	require_once(__DIR__ . '/../scripts/php/User.php');
	require_once(__DIR__ . '/../scripts/php/Group.php');
	require_once(__DIR__ . '/../scripts/php/utils.php');
	require_once(__DIR__ . '/navbar.php');

if(isset($_POST['submit'])){
    if($_POST['submit']=='Upload'){
        if(isset($_POST['lastName'])){$lname = $_POST['lastName'];}
        else{$lname = "";}
        if(isset($_POST['firstName'])){$fname = $_POST['firstName'];}
        else{$fname = "";}
        if(isset($_POST['email'])){$userEmail = $_POST['email'];}
        else{$userEmail = "";}

        if(isset($_FILES["imgfile"])) {
            try{
                editUser(uploadImage($_FILES["imgfile"]), $fname, $lname, $userEmail, "", "");
            }
            catch(ImageUploadException $e){
                editUser("", $fname, $lname, $userEmail, "", "");
            }
        }
        else{
            editUser("", $fname, $lname, $userEmail, "", "");
        }
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'profile.php';
        header("Location: http://$host$uri/$extra", true, 301);
        exit;

    }
}
$me=getUser();
?>

<!DOCTYPE html>
<html lang="en">
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
	if(empty($me)){ ?>
		no such user
</body>
<?php
		exit;
	}
?>


<div class="container">
    <div class="row">

        <!-- Major content needs to go in here.-->
        <div class="wrap clearfix">
            <div class="container-inner-sections ">
                <div class="col-sm-4 col-xs-12 avatar">
                        <img height="150" width="100" src="../scripts/php/DisplayAvatar.php?i=<?php echo $me['id_user']; ?>" alt="">

                </div>
                <div class="col-sm-8 col-xs-12">
                    <div class="col-xs-12 content">
                        <!--We can place information about a user here along with a link to a group.-->
                        <form method="post" enctype="multipart/form-data">
                            First Name: <input name="firstName" type="text" value="<?php echo $me['name']; ?>"/><br>
                            Last Name: <input name="lastName" type="text" value="<?php echo $me['lname']; ?>"/><br>
                            Email: <input name="email" type="email" value="<?php echo $me['email']; ?>"/><br>
                            File name: <input class="btn btn-default" type="file" name="imgfile"/><br>
                            <input class="btn btn-primary" type="submit" name="submit" value="Upload"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
