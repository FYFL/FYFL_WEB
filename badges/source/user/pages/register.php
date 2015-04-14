<?PHP
require_once(__DIR__ . "/../scripts/php/User.php");
require_once(__DIR__ . "/../scripts/php/States-Counties.php");
require_once(__DIR__ . "/navbar.php");
if(isset($_POST['submitted']))
{
   if($fgmembersite->RegisterUser())
   {
        $fgmembersite->RedirectToURL("login.php");
   }
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
	$user=getUser();
	navbar($user['user_level']);
?>
	<div class="container">
		<div class="row">
			<div class="wrap clearfix">
				<h3>Register</h3>
				<div class="container-inner-sections ">
					<div class="col-sm-8 col-xs-12">
						<form class="form" id='register' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
							<div class="col-xs-12 content">
								<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
								<input type='hidden' name='submitted' id='submitted' value='1'/>
								<input type='hidden' class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' value='1' />
								<input type='text' name='name' id='name' value='<?php echo $fgmembersite->SafeDisplay('name') ?>' placeholder="first name" /><br/>
								<input type='text' name='lname' id='lname' value='<?php echo $fgmembersite->SafeDisplay('lname') ?>' placeholder="last name" /><br/>
								<input type='text' name='email' id='email' value='<?php echo $fgmembersite->SafeDisplay('email') ?>' placeholder="email" /><br/>
								<input type='text' name='parentemail' id='parentemail' value='<?php //echo $fgmembersite->SafeDisplay('parentemail') ?>' placeholder="parent's email" /><br/>
								<input type='text' name='username' id='username' value='<?php //echo $fgmembersite->SafeDisplay('username') ?>' placeholder="username" /><br/>
								<input type='password' name='password' id='password' placeholder="password" /><br>
							</div>
							<div class="col-sm-8 content">
<select name="State">
<?php
	$states=getStates();
	foreach($states as $state)
		echo"<option value=".$state[0].">".$state[1]."</option>";
?>
</select>
<select name="County">
<?php
	$counties=getCounties($states[0][0]);
	foreach($counties as $county)
		echo"<option value=".$county[0].">".$county[1]."</option>";
?>
</select>
							</div>
							<input type='submit' name='Submit' value='Submit' />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type='text/javascript'>
		var frmvalidator  = new Validator("register");
		frmvalidator.EnableOnPageErrorDisplay();
		frmvalidator.EnableMsgsTogether();

		frmvalidator.addValidation("username","req","Please provide your username");

		frmvalidator.addValidation("password","req","Please provide the password");
	</script>
</body>
</html>
