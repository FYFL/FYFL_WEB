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
<style type="text/css" media="screen">
table { border: 30px solid green;float:left;width:300px;}
 #table_cont{width:700px;margin:0 auto;}
body{
	overflow-x: hidden;
	font-family: Calibri;
	color: #666666;
}
h2.pos_fixed{	
position:relative;
	
left:+120px;
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
            <li><a href="login-home">Home</a></li>
            <li><a href=" ">Help: On</a></li>
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
 <p>Adult Users- Admin Level 3 (Badge Reviewer/Issuer)</p>     
 <p><strong>User Name:</strong>
<?php $name= $fgmembersite->UserFullName();
   echo $name;?></p>     
   </br></br></div>
   <!--Name of the Issuers-->
<!-- <table border='1' width='1000' align="center" style='table-layout:fixed'>
   <tr >
   <th height='50' bgcolor="#CDFFF0" style="width:50%"><strong>Badges To be Reviewed:</strong></th>
   <th style="width:50%" bgcolor="#CDFFF0" height='50'><strong>Badge Issuances Completed:</strong></th>
   </tr>
   </table>-->
   
   <h2 class='pos_fixed'>Badges to be Reviewed &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Badge Issuances Completed </h2>

   <?php
$connect= mysql_connect("fyfl-3.fyflnetwork.org","szk0050","Stoneware!");
mysql_select_db("FYFL-3");

$query= mysql_query("SELECT * from Hands_Response WHERE action='i'");
echo"<div id='table_cont'>";
echo"<table border='1' width='100%' >
<tr>";
 
 echo"   <th><strong>Name</strong></th>
   <th><strong>User ID</strong></th>
   <th><strong>Badge Name</strong></th>
      <th><strong>Action</strong></th>";
	  echo"</tr>";
while ($rows= mysql_fetch_array($query)):
$first_name =$rows['username'];
$userid=$rows['user_id'];  
   
   echo"<tr>";
   echo "<td align='center'>"."$first_name"."</td>";
   echo"<td align='center'>"."$userid"."</td>";
   echo"<td align='center'>Robot Hands</td>";
  echo"<td align='center'><a href='http://www.fyflnetwork.org/sarthak2/Facilitator/Robot_Facilitator_s.php?i=$rows[id_user]'>open</td>";
  echo"</tr>";

endwhile;?>
 <?php
$connect= mysql_connect("fyfl-3.fyflnetwork.org","szk0050","Stoneware!");
mysql_select_db("FYFL-3");

$query= mysql_query("SELECT * from Competition_Response WHERE action='i' ");



while ($rows= mysql_fetch_array($query)):
$first_name =$rows['username'];
$userid=$rows['user_id'];  
   echo"<tr>";
   echo "<td align='center'>"."$first_name"."</td>";
   echo"<td align='center'>"."$userid"."</td>";
   echo"<td align='center'>Robot Competitions</td>";
echo"<td align='center'><a href='http://www.fyflnetwork.org/sarthak2/Facilitator/Robot_Competitions_fac.php?i=$rows[id_user]'>open</td>";
  
echo"</tr>";
endwhile;


?>
 <?php
$connect= mysql_connect("fyfl-3.fyflnetwork.org","szk0050","Stoneware!");
mysql_select_db("FYFL-3");

$query= mysql_query("SELECT * from Mechatronics_Response where action='i'");



while ($rows= mysql_fetch_array($query)):
$first_name =$rows['username'];
$userid=$rows['user_id'];  
   echo"<tr>";
   echo "<td align='center'>"."$first_name"."</td>";
   echo"<td align='center'>"."$userid"."</td>";
   echo"<td align='center'>Robot Mechatronics</td>";
  echo"<td align='center'><a href='http://www.fyflnetwork.org/sarthak2/Facilitator/Robot_Mechatronics_fac.php?i=$rows[id_user]'>open</td>";
  
echo"</tr>";
endwhile;


?>
 <?php
$connect= mysql_connect("fyfl-3.fyflnetwork.org","szk0050","Stoneware!");
mysql_select_db("FYFL-3");

$query= mysql_query("SELECT * from Movement_Response where action='i'");



while ($rows= mysql_fetch_array($query)):
$first_name =$rows['username'];
$userid=$rows['user_id'];  
   echo"<tr>";
   echo "<td align='center'>"."$first_name"."</td>";
   echo"<td align='center'>"."$userid"."</td>";
   echo"<td align='center'>Robot Movement</td>";
 echo"<td align='center'><a href='http://www.fyflnetwork.org/sarthak2/Facilitator/Robot_Movement_fac.php?i=$rows[id_user]'>open</td>";
  
echo"</tr>";
endwhile;


?>

 <?php
$connect= mysql_connect("fyfl-3.fyflnetwork.org","szk0050","Stoneware!");
mysql_select_db("FYFL-3");

$query= mysql_query("SELECT * from Platforms_Response where action='i'");



while ($rows= mysql_fetch_array($query)):
$first_name =$rows['username'];
$userid=$rows['user_id'];  
   echo"<tr>";
   echo "<td align='center'>"."$first_name"."</td>";
   echo"<td align='center'>"."$userid"."</td>";
   echo"<td align='center'>Robot Plaforms</td>";
 echo"<td align='center'><a href='http://www.fyflnetwork.org/sarthak2/Facilitator/Robot_Patforms_fac.php?i=$rows[id_user]'>open</td>";
  
  
echo"</tr>";
endwhile;


?><?php
echo"</table>";
  ?>
  <?php
  $query1= mysql_query("SELECT * from Hands_Response WHERE action='c'");
  
 // echo"</td>";

  echo"<table  border='1'  width='100%'>";
echo"<tr>";
  echo"<th><strong>Name</strong></th>
   <th><strong>User ID</strong></th>
   <th><strong>Badge Name</strong></th>";
   echo"</tr>";
  while ($row= mysql_fetch_array($query1)):
$first_name =$row['username'];
$userid=$row['user_id'];  
  echo"<tr>";
  
  
 
  
   echo "<td align='center'>"."$first_name"."</td>";
   echo"<td align='center'>"."$userid"."</td>";
   echo"<td align='center'>Robot Hands</td>";


  
echo"</tr>";
     endwhile;
	 
	 ?>
	 
	 <?php
$connect= mysql_connect("fyfl-3.fyflnetwork.org","szk0050","Stoneware!");
mysql_select_db("FYFL-3");

$query= mysql_query("SELECT * from Competition_Response where action='c' ");



while ($rows= mysql_fetch_array($query)):
$first_name =$rows['username'];
$userid=$rows['user_id'];  
   echo"<tr>";
   echo "<td align='center'>"."$first_name"."</td>";
   echo"<td align='center'>"."$userid"."</td>";
   echo"<td align='center'>Robot Competitions</td>";
 
  
echo"</tr>";
endwhile;


?> 
	 
	 <?php
$connect= mysql_connect("fyfl-3.fyflnetwork.org","szk0050","Stoneware!");
mysql_select_db("FYFL-3");

$query= mysql_query("SELECT * from Mechatronics_Response where action='c' ");



while ($rows= mysql_fetch_array($query)):
$first_name =$rows['username'];
$userid=$rows['user_id'];  
   echo"<tr>";
   echo "<td align='center'>"."$first_name"."</td>";
   echo"<td align='center'>"."$userid"."</td>";
   echo"<td align='center'>Robot Mechatronics</td>";
 
  
echo"</tr>";
endwhile;


?>  
	
 <?php
$connect= mysql_connect("fyfl-3.fyflnetwork.org","szk0050","Stoneware!");
mysql_select_db("FYFL-3");

$query= mysql_query("SELECT * from Movement_Response where action='c'");



while ($rows= mysql_fetch_array($query)):
$first_name =$rows['username'];
$userid=$rows['user_id'];  
   echo"<tr>";
   echo "<td align='center'>"."$first_name"."</td>";
   echo"<td align='center'>"."$userid"."</td>";
   echo"<td align='center'>Robot Movement</td>";

  
echo"</tr>";
endwhile;


?>
	
	 <?php
$connect= mysql_connect("fyfl-3.fyflnetwork.org","szk0050","Stoneware!");
mysql_select_db("FYFL-3");

$query= mysql_query("SELECT * from Platforms_Response where action='c'");



while ($rows= mysql_fetch_array($query)):
$first_name =$rows['username'];
$userid=$rows['user_id'];  
   echo"<tr>";
   echo "<td align='center'>"."$first_name"."</td>";
   echo"<td align='center'>"."$userid"."</td>";
   echo"<td align='center'>Robot Plaforms</td>";

  
echo"</tr>";
endwhile;
echo"</table>



";



?>
	
	 
 
   
 </div> 
   
   
   
   

</body>
</html>