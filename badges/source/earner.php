<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" href="pages.css"/>
<link rel="stylesheet" type="text/css" href="speech bubble.css">
<title>Youth Badge Earner</title>
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
            
            <div id="usercontent">
			<!-- Jesse's HTML -->
            <table id="earnerTable" cellspacing="0" cellpadding="0">
			<tr>
				<th></th>
				<th>User ID</th>
				<th>Badge Name</th>
				<th>Action</th>
			</tr>
			</table>
			<!-- Jesse's HTML -->
            </div>

<script type="text/javascript">
$(document).ready(function(){
				
	$("a.fancybox-manual-b").fancybox({type:'iframe'});
			
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
function populateTable()
{
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4&&xmlhttp.status==200)
		{
			document.getElementById("earnerTable").innerHTML+=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","php/earner.php",true);
	xmlhttp.send();
}populateTable();
//End Jesse's JavaScript
</script>
</body>

</html>
