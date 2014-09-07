<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   
    <link rel="stylesheet" href="/sarthak2/_css/bootstrap-2.0.2.min.css" />
    
    <link rel="stylesheet" href="/sarthak2/_css/style.css" type="text/css" media="all" />
   <link rel="stylesheet" href="/sarthak2/source/source/js/jquery.fancybox.css" type="text/css" media="all" />
   
    <title dir="ltr">4-H Digital Badges Backpack</title>

  </head>






<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<title>FYFL backpack</title>
<style>
body{
	overflow-x:hidden;
}
#info{
	position:absolute;
	left:2000px;
	top: 300px;
}
#info_header{
	height:40px;
	width:800px;
	background-color:#00B050;
	color:#FFF;
	font-size:26px;
	border-bottom:3px solid #080; 
	border-right:3px solid #080;
}

#info_body{
	width:802px;
	background-color:#F2F2F2;
}

#current_bg{
	background-color:#F2F2F2;
	width:502px;
	margin-bottom:50px;
}

.bg:hover{
	cursor:pointer;
}
#cover_area{
	position: absolute;
	left:30px;
	font-size:36px;
}

#close:hover{
	cursor:pointer;
}
</style>
</head>

<body>





  <div class="navbar">
      <div class="navbar-inner">
        <div class="container" style="position: relative; color: #999999; background-color:  #003E69; layer-background-color:  #003E69; border: 1px none #000000;">
          <h3><a class="brand" href="http://www.fyflnetwork.org/4hbadges">4-H DIGITAL BADGES</a></h3>
          
          <ul class="nav">
            <li><a href="login-home.php">Home</a></li>
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
<select name="url_list" size="1" onchange="gotosite()">
<-- Value of first option is default, usually current page -->
<option value="http://www.fyflnetwork.org/sarthak2/source/source/login-home.php"> <?= $fgmembersite->UserEmail(); ?></option>
<option value="login-home.php">Home</option>
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

      

<div class="row" style="position: relative;">
  <div class="span4 column">
     





<h2>Adult's backpack</h2>
<!-- patty's work-->
<div class="header"></div>
<div style="background-color:#00B050; font-size:24px; color:#FFF; width:500px; border-bottom:3px solid #093; border-right:3px solid #093;"> Current Badges </div>


<?php

    
    $dbc = @mysqli_connect('fyfl-3.fyflnetwork.org', 'szk0050', 'Stoneware!', 'FYFL-3') or die 
('Could not
      connect to MySQL: ' . mysqli_connect_error() . '</body></html>');
?>


<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
?>




<?php

   $name= $fgmembersite->UserFullName();
   echo "Username:$name";
   
    echo '<h2></h2>';
    // Create the query:
    $q = "SELECT b.image_id  FROM backpack b,
    people3 p
 
where p.id_user=b.id_user and
p.name='$name'";
   
   
   
   // Execute the query:
    $r = mysqli_query ($dbc, $q);
   // Check the results:
   if (mysqli_num_rows($r) > 0) {
       // Display each item in a list.
       
       while ($row = mysqli_fetch_array ($r, MYSQLI_NUM)) {
 echo"<a class='iframe' href='http://www.fyflnetwork.org/sarthak2/blob3/badge_info.php?i=$row[0]'><img src=\"http://www.fyflnetwork.org/sarthak2/blob3/view_image.php?i=$row[0]\"width='80' height='80'></img></a> ";
 /*
  echo"<a  href='http://www.fyflnetwork.org/sarthak2/blob3/badge_info.php?i=$row[0]' class='iframe'>";
 
echo "<img src=\"http://www.fyflnetwork.org/sarthak2/blob3/view_image.php?i=$row[0]\"width='80' height='80'";
  
 echo"</a>" ;
  */
  
  
  
  
  /*echo "<img src=\"http://www.fyflnetwork.org/sarthak2/blob3/view_image.php?i=$row[0]\"width='80' height='80'";
  
           echo "<a href=\"view_image.php?i=$row[0]\"></a>";
           echo "<a href=\"http://www.fyflnetwork.org/sarthak2/blob3/badge_info.php?i=$row[0]\">  :Badge Information</a><br><br>";
           */
            
  
  }


      
      // Clean up:
      mysqli_free_result($r);

  } else { // No records returned.
      echo '<p>You have not earned any badges for now.</p>';
  }

  // Close the database connection:
  mysqli_close($dbc);

  ?>


<div id="current_bg">
</div>



<div id="info">
<div id="info_header"><span id="title">4-H Digital Badges </span><img id="close" style="float:right;" src="image/close.png" width="40"/> </div>
<div id="info_body">
<table>
<tr height="400px">
<td width="200px"><div id="bodyimg"></div></td>
<td><div id="bodycontent"></div></td>
</tr>
</table>
</div>
</div>
<!--<div class="footer"></div>-->
  <div id="footer" class="container">
      <aside>
        <h2>Legal</h2>
       <ul>
                    <li>




<a href="http://www.fyflnetwork.org/sarthak2/source/source/Terms_of_use.html" class="iframe">Terms Of Use</a>
<a href="http://www.fyflnetwork.org/sarthak2/source/source/privacy.html" class="iframe">Privacy Policy</a>



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="http://www.fyflnetwork.org/sarthak2/source/source/js/jquery.fancybox.pack.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
    $(".iframe").fancybox({
        type: 'iframe'
    });
});
</script>

</body>
    












</html>
