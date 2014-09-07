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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" type="text/css" href="pages.css" />
<link rel="stylesheet" type="text/css" href="speech bubble.css">
<title>Badge Manager</title>
<style type="text/css">

body{
	background: #F3F3F3;
    font-family:Arial;
    font-family:rocks;  
}

#badgecount{
	height:20px;
	width:auto;
	font-size:24px;
}

.count{
	background-color:#000;
	width:30px;
	height:30px;
	border-radius:15px;
	-webkit-border-radius:15px;
	-moz-border-radius:15px;
	color:white;
	text-align:center;
	
}

#badgecount{
	font-family: "Times New Roman", Times, serif;
	font-size:20px;
	
}

.createbtn {
	background-color:#666;
	-webkit-border-top-left-radius:10px;
	-moz-border-radius-topleft:10px;
	border-top-left-radius:10px;
	-webkit-border-top-right-radius:10px;
	-moz-border-radius-topright:10px;
	border-top-right-radius:10px;
	-webkit-border-bottom-right-radius:10px;
	-moz-border-radius-bottomright:10px;
	border-bottom-right-radius:10px;
	-webkit-border-bottom-left-radius:10px;
	-moz-border-radius-bottomleft:10px;
	border-bottom-left-radius:10px;
	text-indent:0;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	font-weight:bold;
	font-style:normal;
	height:50px;
	line-height:50px;
	width:250px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
	position:relative;
	left:75%;
	margin-bottom:15px;

}
.createbtn:hover {
	background-color:#333;
	cursor:pointer;
}.createbtn:active {
	position:relative;
	top:1px;
}

</style>
</head>

<body>
<?php
	include("menu.php");
?>   
            
            <div id="badgecontent">

            <div id="badgecount">Approved Badges <span id="approvedBadges" class="count">&nbsp;&nbsp;enable&nbsp;&nbsp;</span>&nbsp;&nbsp; Unapproved Badges<span id="unapprovedBadges" class="count">&nbsp;&nbsp;JavaScript <3&nbsp;&nbsp;</span></div>
            <a class="createbtn" href="badgeMaker.php">Create New Badge</a>
            <div id="filter">
			<!-- Jesse's HTML -->
            <div id="search"><input id="searchTag" type="text" class="tftextinput" size="30"><button type="button" onclick="filterBadges();" class="tfbutton">search</button>
</div>

            <select id="countyFilter" class="selector" onchange="filterBadges();">
            </select>
            
            <select id="stateFilter" class="selector" onchange="countySelection(this.value);filterBadges();">
            </select>
            
            
            
		    
			<!-- End Jesse's HTML -->
</div>
                       
<ul id="badgecards">
	No badges!
</ul>
 <div id="buttom">

    <p>&nbsp;</p>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function(){

	$("a.fancybox-manual-b").fancybox({
		type:'iframe',
		href:'eachbadge.html',
		afterClose:function(){updateBadge(current);}
	});
				
	$(".profilemenu").click(function(){
		$(".speech").toggle();
		$(".arrowbtm").toggle();
		$(".arrowtop").toggle();
	});
	
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
//Jesse's JavaScript
//populate state select
function stateSelection()
{
	document.getElementById("stateFilter").innerHTML='<option value="ALL"selected="selected">all states</option>';
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4&&xmlhttp.status==200)
		{
			document.getElementById("stateFilter").innerHTML+=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","php/Statewide.php",false);
	xmlhttp.send();
}stateSelection();
//populate county select when state is chosen
function countySelection(p1)
{
	document.getElementById("countyFilter").innerHTML='<option value="ALL"selected="selected">all counties</option>';
	if(p1!="ALL")
	{
		xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4&&xmlhttp.status==200)
				document.getElementById("countyFilter").innerHTML+=xmlhttp.responseText;
		}
		xmlhttp.open("GET","php/Countywide.php?s="+p1,false);
		xmlhttp.send();
	}
}countySelection("ALL");
//array of badge objects and currently selected badge
var badgeObj;
var current;
//load all badges if no search options chosen
function filterBadges()
{
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4&&xmlhttp.status==200)
		{
			badgeObj=JSON.parse(xmlhttp.responseText);
			printBadges();
		}
	}
	xmlhttp.open("POST","php/GetBadges.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send
	(
		"tag="+document.getElementById("searchTag").value
		+"&state="+document.getElementById("stateFilter").value
		+"&county="+document.getElementById("countyFilter").value
	);
}filterBadges();
//add a new badge div for displaying badge information
function addBadge(i)
{
	document.getElementById("badgecards").innerHTML+=
	'\
		<li>\
		<div id="'+i+'" class="badgecard">\
		</div>\
		</li>\
	';updateBadge(i);
}
//fill the badge div with information
function updateBadge(i)
{
	document.getElementById(i).innerHTML='';
	if(badgeObj[i].status=='A')document.getElementById(i).innerHTML+=
	'<div class="ribbon-wrapper"><div class="ribbon">Approved</div></div>';
	document.getElementById(i).innerHTML+=
	'\
		<img src="http://www.fyflnetwork.org/4h/badges/source/php/displayImage?i='+badgeObj[i].image_id+'"/>\
		<span class="badgetitle">'+badgeObj[i].badge_name+'</span>\
		<span class="badgedescription">'+badgeObj[i].badge_desc+'</span>\
		<span class="badgefooter"><a class="fancybox-manual-b" onclick="current='+i+';">Learn More or Edit</a></span>\
	';
	countBadges();
}
//count approved and unapproved badges
//status 'A' is approved 'U' is unapproved
function countBadges()
{
	var approved=0;
	var unapproved=0;
	for(var i=0;i<badgeObj.length;++i)
		badgeObj[i].status=='A'?++approved:++unapproved;
	document.getElementById("approvedBadges").innerHTML="&nbsp;&nbsp;"+approved+"&nbsp;&nbsp;";
	document.getElementById("unapprovedBadges").innerHTML="&nbsp;&nbsp;"+unapproved+"&nbsp;&nbsp;";
}
//print all badge objects
function printBadges()
{
	document.getElementById("badgecards").innerHTML='';
	for(var i=0;i<badgeObj.length;++i)
		addBadge(i);
}
//End Jesse's JavaScript
</script>
</body>
</html>
