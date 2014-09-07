<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js"></script>
<link rel="stylesheet" href="pass.css"/>
<link rel="import" href="menu.html">
<title>Badge Manager</title>
<style type="text/css">

body{
	background: #F3F3F3;
    font-family:Arial;
    font-family:rocks;  
}

#menu{
	position:absolute;
	top:5px;
	right:0px;
	height:100px;
	float:left;
	padding:0;
	list-style:none;
	overflow:hidden;
	z-index:55;
}

#menupic{
	width:55px;
	height:55px;	
	margin:22px 12px 42px 12px;
	opacity:0.8;
}

#menu li{
	width:80px;
	height:230px;
	top:0px;
	float:left;
	font-size:20px;
	
}

#menu li a{
	display:block;
	padding:4px 2%;
	text-decoration:none;
	text-align:center;
	color:#484848;
}

.myBadges{
	background:#CCEFE1;
}
.myBadges div#menupic{
	background: url(images/user/paperstar32.png);
	background-size:cover;	
}
.earner {
	background:#E09DB1;
}
.earner div#menupic{
	background: url(images/user/users32.png);
	background-size:cover;	
}
.badgeManager{
	background:#99D5D8;
}
.badgeManager div#menupic{
	background: url(images/user/bag32.png);
	background-size:cover;	
}
.password{
	background:#8DC9BC;
}
.password div#menupic{
	background: url(images/user/contactcard32.png);
	background-size:cover;	
}

.logout{
	background:#919191;
}
.logout div#menupic{
	background: url(images/user/plug32.png);
	background-size:cover;	
	margin:22px 12px 52px 12px;
}


</style>
</head>

<body>
<?php
	include("menu.php");
?>
 
 <div id="profile">
 <section id="left">
			<div id="userprofile" class="clearfix">
            <div id="username">User Name</div>
            <div id="userloca">User Location</div>
				<div class="pic">
					<a href="#"><img src="images/user/default.png" width="150" height="150" /></a>
				</div>
                <div id="profilenav">
                <ul>
                <li id="one"><span id="og1" class="og">&nbsp;&nbsp;</span><a href="#tabpage_1">view</a></li>
                <li id="two"><span id="og2" class="og">&nbsp;&nbsp;</span><a href="#tabpage_2">edit</a></li>
                <li id="three"><span id="og3" class="og">&nbsp;&nbsp;</span><a href="#tabpage_3">clubs</a></li>
                </ul>
                </div>
                </div>		
		</section>
  <section id="right">
  <div id="rightheader">View Profile</div>
  <div id="tabInner" class="clearfix">
  <div id="tabpage_1">
        <div class="colum"><span class="columtitle">First Name:</span><span id="firstName" class="columreturn">User9</span></div>
        <div class="colum"><span class="columtitle">Last Name:</span><span id="lastName" class="columreturn">FYFLnet</span></div>
        <div class="colum"><span class="columtitle">Role:</span><span id="user_level" class="columreturn">Adult</span></div>
        <div class="colum"><span class="columtitle">Level:</span><span id="adult" class="columreturn">Extension or University staff</span></span></div>
        <div class="colum"><span class="columtitle">Location:</span><span id="location" class="columreturn">Lee, AL</span></div>
        <div class="colum"><span class="columtitle">Email:</span><span id="email" class="columreturn">user9.fyfl@auburn.edu</span></span></div>
        <div class="colum"><span class="columtitle">Group Membership:</span><span class="columreturn">4=gh robotics club</span></div>
      </div>
      <div id="tabpage_2">
	<form action="EditUser.php" method="post">
        <div class="required">First Name</div> <input name="name" type="text">
        <div class="required">Last Name</div><input name="lname" type="text">
        <div class="required">State</div><select id="StateSelect" name="State" onchange="countySelection(this.value);"></select>
        <div class="required">County</div><select id="CountySelect" name="County"></select>
        <div>Current password</div><input type="text">
        <p class="clues">Enter your current password to change the E-mail address or Password.</p>
        <div class="required">Email</div><input name="email" type="text">
        <p class="clues">A valid e-mail address. All e-mails from the system will be sent to this address. The e-mail address is not made public and will only be used if you wish to receive a new password or wish to receive certain news or notifications by e-mail.</p>
        <div>Password</div><input type="text">
        <div>Comfirm Password</div><input type="text">
        <p class="clues">To change the current user password, enter the new password in both fields.</p>
        <div class="required">Terms & Conditions</div>
        <textarea readonly>By accepting these Terms and Conditions for using the 4-H Digital Badge System as a general user, you agree to the terms set forth herein. As a General User you register as a Youth or Adult. If you register as a Youth you will be able to see badges designed for youth and will also see other Terms and Conditions for using the system as a Youth. To Earn a badge you as a youth you must be assigned as a member of a group. This group is either a club with an assigned Adult Leader or a group a local University or Extension Staff Person moderates. 
IMPORTANT: As a youth you must contact the local University or Extension staff or an Adult Leader in order to be assigned to a group and earn badges.

As a General Adult User you may view badges designed for adults and choose the option of earning them. You may interact with a moderator in earning a badge. By accepting Terms and Conditions, you agree to interact with others in an appropriate manner and if you work on earning a badge you will do so appropriately and not abuse the system. If you wish to change roles in the system you must communicate with the local university or extension staff.

You must either Accept or Decline these Terms and Conditions to complete registration.</textarea>   
<div><input type="submit" value="Accept"></div>
	</form>
        </div>
        <!--<div style="float:left; margin:-125px 0 0 0;"><a href="badgeManager.html" class="creatbutton">Save</a> </div> -->
      
      <div id="tabpage_3">
<table id="grouplist">
  <tr>
    <th>&nbsp;</th>
    <th>Club or Group name</th>
    <th>County Name</th>
    <th>Club/Group ID</th>
    <th>Leader name</th>
    <th>Update Club/Group</th>
    <th>Add/Remove members</th>
  </tr>
  <tr>
    <td><input type="checkbox" name="chk"/></td>
    <td><span class="groupNm">4-H Rovotics Club</span></td>
    <td><span class="countyNm">Lee</span></td>
    <td><span class="groupId">001</span></td>
    <td><span class="leaderNm">User7FYFLnet</span></td>
    <td><span><a href="#" class="editgroup">Edit</a></span></td>
    <td><span><a href="#">Add/Remove Members</a></span></td>
  </tr>
  <tr>
    <td><input type="checkbox" name="chk"/></td>
    <td><span class="groupNm">4-T Rovotics Club</span></td>
    <td><span class="countyNm">Lee</span></td>
    <td><span class="groupId">002</span></td>
    <td><span class="leaderNm">User7FYFLnet</span></td>
    <td><span><a href="#" class="editgroup">Edit</a></span></td>
    <td><span><a href="#">Add/Remove Members</a></span></td>
  </tr>
</table> 

<div id="creatgroup"><a href="#" onclick="addRow('grouplist')">Creat Club/Group</a></div>
<div id="deletegroup"><a href="#" onclick="deleteRow('grouplist')" >Delete the Checked Club/Group</a></div>
      </div>
  </div>
  </section>
        </div>
        </div>
         

<script type="text/javascript">
$(document).ready(function(){
	$("#one").click(function(){
		 $("#rightheader").text("View Profile");
		 $("#og1").css('background-color','#F60');
		 $("#og2").css('background-color','#eee');
		 $("#og3").css('background-color','#eee');
		 $("#tabInner").css('height','400px');
		 $("#tabInner #tabpage_2, #tabInner #tabpage_3").css('display','none');
		 $("#tabInner #tabpage_1").css('display','block');
		
	});
	$("#two").click(function(){
		 $("#rightheader").text("Edit Profile");
		 $("#og2").css('background-color','#F60');
		 $("#og1").css('background-color','#eee');
		 $("#og3").css('background-color','#eee');
		 $("#tabInner").css('height','1000px');
		 $("#tabInner #tabpage_1, #tabInner #tabpage_3").css('display','none');
		 $("#tabInner #tabpage_2").css('display','block');
		
	});
	$("#three").click(function(){
		 $("#rightheader").text("Group & Clubs");
		 $("#og3").css('background-color','#F60');
		 $("#og2").css('background-color','#eee');
		 $("#og1").css('background-color','#eee');
		 $("#tabInner").css('height','auto');
		 $("#tabInner #tabpage_1, #tabInner #tabpage_2").css('display','none');
		 $("#tabInner #tabpage_3").css('display','block');
		
	});
	
	//This may be for the menu roll overs.
	$("#menu > li").bind('mouseenter',function(){
		 var $elem = $(this);
		 $elem.stop(true)
		      .animate({
			  'margin-top':'-100px',
		},400)
	}).bind('mouseleave',function(){
		var $elem = $(this);
		$elem.stop(true)
		     .animate({
			  'margin-top':'0px',
		},400)
	});
	
		
});


 function addRow(tableID) {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
			row.insertCell(0).innerHTML = '<input type="checkbox" name="chk"/>';
			row.insertCell(1).innerHTML = '<input type="text" name="txt" id="groupname"/>';
			row.insertCell(2).innerHTML = '<input type="text" name="txt" id="countyname"/>';
			row.insertCell(3).innerHTML = '<input type="text" name="txt" id="groupid"/>';
			row.insertCell(4).innerHTML = '<input type="text" name="txt" id="leadername"/>';
			row.insertCell(5).innerHTML = '<a href="#" onclick="saveRow('+rowCount+')">Save</a>';
        }
		
  function saveRow(rowID){
	  var table = document.getElementById("grouplist");
	  var groupname = document.getElementById("groupname").value;
	  var countyname = document.getElementById("countyname").value
	  var groupid = document.getElementById("groupid").value;
	  var leadername = document.getElementById("leadername").value;
	  table.deleteRow(rowID);
	   var row = table.insertRow(rowID);
	   row.insertCell(0).innerHTML = '<input type="checkbox" name="chk"/>';
	   row.insertCell(1).innerHTML = groupname;
	   row.insertCell(2).innerHTML = countyname;
	   row.insertCell(3).innerHTML = groupid;
	   row.insertCell(4).innerHTML = leadername;
	   row.insertCell(5).innerHTML = '<span><a href="#" class="editgroup">Edit</a></span>';
	   row.insertCell(6).innerHTML = '<span><a href="#">Add/Remove Members</a></span>';
	   
  }
		
  function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }catch(e) {
                alert(e);
            }
        }
		
//Jesse's JavaScript
var userInfo;
//get user info from database into userInfo object
function loadUserInfo()
{
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4&&xmlhttp.status==200)
		{
			userInfo=jQuery.parseJSON(xmlhttp.responseText);
		}
	}
	xmlhttp.open("GET","UserInfo.php",false);
	xmlhttp.send();
}loadUserInfo();
//print user info from userInfo object
function printUserInfo()
{
	document.getElementById("firstName").innerHTML=userInfo.name;
    document.getElementById("lastName").innerHTML=userInfo.lname;
    document.getElementById("adult").innerHTML=userInfo.Adult==1?"Adult":"Child";
    document.getElementById("user_level").innerHTML=
    userInfo.user_level==1?"Parent":userInfo.user_level==2?"Volunteer":userInfo.user_level==3?"Staff":"General User";
    document.getElementById("location").innerHTML=userInfo.State+", "+userInfo.County;
    document.getElementById("email").innerHTML=userInfo.email;
    document.getElementById("username").innerHTML=userInfo.username;
    document.getElementById("userloca").innerHTML=userInfo.State+", "+userInfo.County;
}printUserInfo();
//populate state select
function stateSelection()
{
	document.getElementById("StateSelect").innerHTML='<option value=""selected="selected">change state</option>';
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4&&xmlhttp.status==200)
		{
			document.getElementById("StateSelect").innerHTML+=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","php/Statewide.php",false);
	xmlhttp.send();
}stateSelection();
//populate county select when state is chosen
function countySelection(p1)
{
	document.getElementById("CountySelect").innerHTML='<option value=""selected="selected">change county</option>';
	if(p1!='')
	{
		xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4&&xmlhttp.status==200)
				document.getElementById("CountySelect").innerHTML+=xmlhttp.responseText;
		}
		xmlhttp.open("GET","php/Countywide.php?s="+p1,false);
		xmlhttp.send();
	}
}countySelection('');
//End Jesse's JavaScript
</script>
</body>

</html>
