<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="/sarthak2/_css/socialshare.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/sarthak2/_css/bootstrap-2.0.2.min.css" />
    <link rel="stylesheet" href="/sarthak2/_css/tabzilla.css"/>    
    <link rel="stylesheet" href="/sarthak2/_css/style.css" type="text/css" media="all" />
    <title dir="ltr">4-H Digital Badges Backpack</title>

    <script type="text/javascript" src="/sarthak2/Home/modernizr.js"></script>
    <script type="text/javascript" src="/sarthak2/Home/include.js"></script>
    <script type="text/javascript" src="/sarthak2/Home/jquery.min.js"></script>
  </head>
  <body>
  <div class="navbar">
      <div class="navbar-inner">
        <div class="container" style="position: relative; color: #999999; background-color: #003E69; layer-background-color: #003E69; border: 1px none #000000;">
          <h3><a class="brand" href="/4hbadges">4-H DIGITAL BADGES</a></h3>
          
          <ul class="nav">
            <li><a href="">Home</a></li>
            <li><a href="/?tooltips">Help: On</a></li>
          </ul>
            <ul class="nav pull-right">
              <li class="user"><SCRIPT LANGUAGE="JavaScript">
<!-- Begin gotosite
function gotosite()
{
var URL = document.gotoform.url_list.options[document.gotoform.url_list.selectedIndex].value; window.location.href = URL;
}
// End gotosite -->
</script>
<form name="gotoform" method="post" action="http://www.fyflnetwork.org/sarthak2/source/source/login-home.php">
<noscript>
<!-- use noscript to only show this if no javascript is available -->
<input type="submit" name="submit_button" value="Go">
</noscript>
<select name="url_list" size="1" onChange="gotosite()">
<-- Value of first option is default, usually current page -->
<option value="http://www.fyflnetwork.org/sarthak2/source/source/login-home.php"> <?= $fgmembersite->UserEmail(); ?></option>
<option value='change-pwd.php'>Change Password</option>
<option value="logout.php">Logout</option>
</select>
</form>




</li>
              <li><a href='logout.php'>Sign Out</a></li>
              <li><img src="/sarthak2/_images/FYFLimage1.fw.png" width="160" height="56" alt="FYFLimage1"></li>
              
          </ul>
        </div>
      </div>
    </div>

    <div id="body" class="container">
      <div class='message-container'>

      </div>

<div id='fg_membersite_content'>
<!--<h2>Home Page</h2>-->
<span id="text1">Welcome back,<br>
<?= $fgmembersite->UserFullName(); ?>! to your personal profile for the 4-H Digital Badge System. As you earn badges they will be placed into My Badges! (your "backpack") at the link below.
</span>



<br><br>
<p><a href='access-controlled.php'>My Badges!</a></p>
<p><a href ='youthbadge.php'>Youth Badge Earner</a></p>
<br><br><br>
    <div id="footer" class="container">
      <aside>
        <h2>Legal</h2>
        <ul>
                    <li>
<script type="text/javascript">
<!--
function myPopup1() {
window.open( "http://www.fyflnetwork.org/sarthak2/source/source/Terms_of_use.html", "myWindow", 
"status = 1, height = 300, width = 650, resizable = 0" )
}
//-->
</script>
<form>
<input type="button" onClick="myPopup1()" value="Terms Of Use">
</form>
<p onClick="myPopup1()"></p></li>
          <li>
<script type="text/javascript">
<!--
function myPopup2() {
window.open( "http://www.fyflnetwork.org/sarthak2/source/source/privacy.html", "myWindow", 
"status = 1, height = 300, width = 400, resizable = 0" )
}
//-->
</script>
</head>
<body>
<form>
<input type="button" onClick="myPopup2()" value="Privacy Policy">
</form>
<p onClick="myPopup2()"></p>
</body>

        </ul>
      </aside>




</div>
</body>
</html>
