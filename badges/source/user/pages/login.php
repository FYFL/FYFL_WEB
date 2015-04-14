<?PHP
require_once(__DIR__ . "/../scripts/php/User.php");
require_once(__DIR__ . "/navbar.php");
if(isset($_POST['submitted']))$fgmembersite->Login();
$user=getUser();
if($user!=false)
{
   
   if($user['user_level']==0)
	$fgmembersite->RedirectToURL("profile.php");
   if($user['user_level']>0)
    $fgmembersite->RedirectToURL("profile.php");
}
?>
<html>
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
	<script type='text/javascript' src='../scripts/js/gen_validatorv31.js'></script>
</head>
<body id="backgroundColor">
<?php
	navbar($user['user_level']);
?>
	<div class="container">
		<div class="row">
			<div class="wrap clearfix">

				<div class ="text-center" >
					<h3>Login</h3>
							<form class="form" id='login'  action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
								<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
								<input type='hidden' name='submitted' id='submitted' value='1'/>
								<input type="text" name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' placeholder="Username or email" required/><br>
								<span id='login_username_errorloc' class='error'></span>
								<input type="password" name='password' id='password' placeholder="Password" required/><br>
								<span id='login_password_errorloc' class='error'></span>
								<input type="submit" name='Submit'  value="Login">
								<div class='short_explanation'><a href='passwordReset.php'>Forgot Password?</a></div>
							</form>
				</div>
			</div>
		</div>
	</div>
	<script type='text/javascript'>
		var frmvalidator  = new Validator("login");
		frmvalidator.EnableOnPageErrorDisplay();
		frmvalidator.EnableMsgsTogether();

		frmvalidator.addValidation("username","req","Please provide your username");

		frmvalidator.addValidation("password","req","Please provide the password");
	</script>
</body>
</html>
