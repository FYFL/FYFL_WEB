<?PHP
require_once(__DIR__ . "/source/php/User.php");
if(isset($_POST['submitted']))$fgmembersite->Login();
$user=getUser();
if($user!=false)
{
   
   if($user['user_level']==0)
	$fgmembersite->RedirectToURL("BadgeBrowser.php");
   if($user['user_level']>0)
    $fgmembersite->RedirectToURL("MyProfile.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="loginstyle.css"/>
<link rel="stylesheet" href="style/font-awesome.css"/>
<script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
<style type="text/css">
body{
	width:100%;
	height:100%;
	background: #CCC;
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFF', endColorstr='#ABD1AF'); /* for IE */
	background: -webkit-gradient(linear, left top, left bottom, from(#FFF), to(#ABD1AF)); /* for webkit browsers */
	background: -moz-linear-gradient(top,  #FFF,  #ABD1AF); /* for firefox 3.6+ */
}
</style>
</head>

<body>
<div id="welcome">
<div style="font-family:rocks; font-size:36px; text-align:center;"><p>Welcome to</p> 4-H Badging System</div> <div style="text-align:center; font-size:17px;">Log in to 4-H so you can comment, share, and get your updates by email.</div></div>


<div id="logincenter">
<div class="drop-shadow lifted" id="noopoliticslogin"><div style="font-family:rocks; font-size:30px; text-align:center;">4-H Badging System</div>
    <div style="margin:auto; text-align:center;">Log in with <span style="font-weight:bolder; font-size:18px;">4-H account</span></div>
    <form class="form" id='login' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
    <input type='hidden' name='submitted' id='submitted' value='1'/>
      <div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>

      <p class="field">
        <input type="text" name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' placeholder="Username or email" required/>
        <i class="fa fa-user"></i>
        <span id='login_username_errorloc' class='error'></span>
      </p>

      <p class="field">
        <input type="password" name='password' id='password' placeholder="Password" required/>
        <i class="fa fa-lock"></i>
        <span id='login_password_errorloc' class='error'></span>
      </p>

      <p class="submit"><input type="submit" name='Submit'  value="Login"></p>
      <div class='short_explanation'><a href='reset-pwd-req.php'>Forgot Password?</a></div>

    </form>
</div>

</div>

<div id="noaccounts">
<div style="position:absolute; left:80px; top:20px;width:250px; height:50px; text-align:center;">Don't have any of these accounts? <div><a href="#">Creat a 4-H account</a></div></div>
</div>

<div style="text-align:center;">brought you by......</div>

</body>
</html>

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("login");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("username","req","Please provide your username");
    
    frmvalidator.addValidation("password","req","Please provide the password");

// ]]>
</script>
</div>
<!--
Form Code End (see html-form-guide.com for more info.)
-->

</body>
</html>
