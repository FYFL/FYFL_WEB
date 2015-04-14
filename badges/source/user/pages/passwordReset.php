<?PHP
require_once(__DIR__ . "/../scripts/php/User.php");
require_once(__DIR__ . "/navbar.php");
$emailsent = false;//<--not sure what this is for
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
	$me=getUser();
	navbar($me['user_level']);
	if(isset($_POST['submitted']))
	{
	   if($fgmembersite->EmailResetPasswordLink())
	   {
			echo"A password reset email will be sent.";
	   }
	}
?>
	<div class="container">
		<div class="row">
			<div class="wrap clearfix">
				<h3>Password Reset</h3>
				<div class="container-inner-sections ">
					<div class="col-sm-8 col-xs-12">
						<div class="col-xs-12 content">
							<form id='resetreq' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
								<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
								<input type='hidden' name='submitted' id='submitted' value='1'/>
								<input type='text' name='email' id='email' value='<?php echo $fgmembersite->SafeDisplay('email') ?>' placeholder="email"/><br/>
								<input type='submit' name='Submit' value='Submit' />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type='text/javascript'>
		var frmvalidator  = new Validator("resetreq");
		frmvalidator.EnableOnPageErrorDisplay();
		frmvalidator.EnableMsgsTogether();

		frmvalidator.addValidation("username","req","Please provide your username");

		frmvalidator.addValidation("password","req","Please provide the password");
	</script>
</body>
</html>
