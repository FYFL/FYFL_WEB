<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" href="pages.css"/>
<title>My Badges</title>
<style type="text/css">

body{
	background: #F3F3F3;
    font-family:Arial;
    font-family:rocks;  
}

</style>
</head>

<body>
<?php
	include("menu.php");
?>  
            
<ul id="badgecards">
	You have no badges!
</ul>


<script type="text/javascript">
$(document).ready(function(){
	
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
				
	$(".fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'adminbadge.html',
					type : 'iframe',
					padding : 10
				});
			});
	
});
//Jesse's JavaScript
var badgeObj;
function getBadges()
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
	xmlhttp.open("GET","MyBadges.php",true);
	xmlhttp.send();
}getBadges();
function printBadges()
{
	document.getElementById("badgecards").innerHTML='';
	for(var i=0;i<badgeObj.length;++i)
		addBadge(i);
}
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
function updateBadge(i)
{
	document.getElementById(i).innerHTML=
	'\
		<img src="http://www.fyflnetwork.org/4h/badges/source/php/displayImage?i='+badgeObj[i].image_id+'"/>\
		<span class="badgetitle">'+badgeObj[i].badge_name+'</span>\
		<span class="badgedescription">'+badgeObj[i].badge_desc+'</span>\
		<span class="badgefooter"><a class="fancybox-manual-b" onclick="current='+i+';">Learn More or Print</a></span>\
	';
}
//End Jesse's JavaScript
</script>
</body>

</html>
