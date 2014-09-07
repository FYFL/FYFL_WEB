<?PHP
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->RegisterUser())
   {
        $fgmembersite->RedirectToURL("thank-you.php");
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>Register</title>
    <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
    <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
    <link rel="STYLESHEET" type="text/css" href="style/pwdwidget.css" />
    <script src="scripts/pwdwidget.js" type="text/javascript"></script>      
</head>
<body>

<!-- Form Code Start -->
<div id='fg_membersite'>
<form id='register' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>

<fieldset >
<legend>Register</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>
<input type='text'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />

<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
<div class='container'>
    <label for='name' >First Name*: </label><br/>
    <input type='text' name='name' id='name' value='<?php echo $fgmembersite->SafeDisplay('name') ?>' maxlength="50" /><br/>
    <span id='register_name_errorloc' class='error'></span>
</div>
<div class='container'>
    <label for='lname' >Last Name*: </label><br/>
    <input type='text' name='lname' id='lname' value='<?php echo $fgmembersite->SafeDisplay('lname') ?>' maxlength="50" /><br/>
    <span id='register_name_errorloc' class='error'></span>
</div>
<div class='container'>
<div class='container'>
    <label for='email' >Email Address*:</label><br/>
    <input type='text' name='email' id='email' value='<?php echo $fgmembersite->SafeDisplay('email') ?>' maxlength="50" /><br/>
    <span id='register_email_errorloc' class='error'></span>
</div>
<div class='container'>
    		<label>You are*</label><br><br><select name="Adult" onchange="childOrAdult(this.value);">
                <option value=1>Adult</option>
                <option value=0>Youth</option>
            </select><br><br>

    <span id='register_phone_number_errorloc' class='error'></span>
</div>

<div class 'container'>
<div id="childOrAdult">
 error
</div>
</p><br><br>


	<form action="<?php echo $fgmembersite->GetSelfScript(); ?>"method="post"enctype="multipart/form-data">
	<!--Jesse's HTML-->
		<label>State Abbreviation</label><br><br><select name="State" id="stateSelect" onchange="genCounty(this.value);"></select><br><br>
		<label>County Name</label><br><br><select name="County" id="countySelect"></select><br><br>
</form>
	</div>




<div class='container'>
  <label for='username' >UserName*:</label><br/>
    <input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" /><br/>
    <span id='register_username_errorloc' class='error'></span>
</div>
<div class='container' style='height:80px;'>
    <label for='password' >Password*:</label><br/>
    <div class='pwdwidgetdiv' id='thepwddiv' ></div>
    <noscript>
    <input type='password' name='password' id='password' maxlength="50" />
    </noscript>    
    <div id='register_password_errorloc' class='error' style='clear:both'></div>
</div>

<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>

</fieldset>
</form>
</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[
    var pwdwidget = new PasswordWidget('thepwddiv','password');
    pwdwidget.MakePWDWidget();
    
    var frmvalidator  = new Validator("register");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("fname","req","Please provide your name");

    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");

    frmvalidator.addValidation("username","req","Please provide a username");
    
    frmvalidator.addValidation("password","req","Please provide a password");

// ]]>
</script>

		
	</div>
	<!--Jesse's AJAX-->
<script type='text/javascript'>
	function genState()
	{
		xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4&&xmlhttp.status==200)
				document.getElementById("stateSelect").innerHTML=xmlhttp.responseText;
		}
		xmlhttp.open("GET","/var/www/sarthak-jesse-patty/badgeManagment/badges/Statewide.php",false);
		xmlhttp.send();
	}genState();
	function genCounty(p1)
	{
		xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4&&xmlhttp.status==200)
				document.getElementById("countySelect").innerHTML=xmlhttp.responseText;
		}
		xmlhttp.open("GET","/var/www/sarthak-jesse-patty/badgeManagment/badges/Countywide.php?s="+p1,false);
		xmlhttp.send();
	}genCounty("AK"); //please put 'AL' first in the php file or wherever if this list is supposed to be in alphabetical order
	function childOrAdult(p1)
	{
		if(p1==1)
			document.getElementById("childOrAdult").innerHTML=
			'\
				<label for="user_level">I am*:</label><br/>\
				<input type="radio" name="user_level" value="1" />\
				<strong>Parent with child in the system</strong><br/>\
				<input type="radio" name="user_level" value="2" />\
				<strong>Volunteer Leader, Teacher, or Resource Person</strong><br/>\
				<input type="radio" name="user_level" value="3" />\
				<strong>Extension or University Staff</strong><br/>\
				<input type="radio" name="user_level" value="4" />\
				<strong>General User</strong><br/>\
			';
		else
			document.getElementById("childOrAdult").innerHTML=
			'\
				<label for="user_level">Date of Birth:</label><br/>\
				<input type="date" name="bday" placeholder="(MM/DD/YYYY)" required><br>\
				<br/>\
				<label for="user_level">Parents email:</label><br/>\
				<input type="date" name="parentemail"  required><br>\
			';
	}childOrAdult(1);
</script>
</body>

</html>