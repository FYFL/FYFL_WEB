<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" type="text/css" href="pages.css" />
<title>Creat New Badge</title>
</head>

<body>  
<div id="header">
<div style="-moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888; box-shadow: 0 0 5px #888;">
<!--<a href="javascript:void(0);" class="profilemenu"><img src="images/user/default.png" height="40"/><span style="z-index:99;">user2.fyfl</span></a>--></span>
<a href="http://www.fyflnetwork.org/"> <div id="headercircle"><img src="images/FYFLnew.png" height="50"/></div></a>
<a href="badgeManager.php" class="creatbutton">See Current Badges</a>

    </div>
</div>             
      <div id="content">
      
      <div class="createbox" id="countywide">
    <p class="boxdescription">what is countywide</p>
    <p class="min">Badges only available in a county.</p>
    <p class="info green">COUNTYWIDE</p>
</div>

<div class="createbox" id="statewide">
    <p class="boxdescription">what is statewide</p>
    <p class="min">Badges only available in a state.</p>
    <p class="info yellow">STATEWIDE</p>
</div>  
<div class="createbox" id="nationwide">
    <p class="boxdescription">what is nationwide</p>
    <p class="min">Badges available across the nation.</p>
    <p class="info red">NATIONWIDE</p>
</div>  

      </div>
      
	<script type="text/javascript">
		$("#countywide").click(function(){generateForm(7);return false});
		$("#statewide").click(function(){generateForm(3);return false});
		$("#nationwide").click(function(){generateForm(1);return false});
		function generateForm(p1)
		{
			var output='<form action="MakeBadge.php"method="post"enctype="multipart/form-data">';
			xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function()
			{
				if(xmlhttp.readyState==4&&xmlhttp.status==200)
				{
					output+=xmlhttp.responseText;
				}
			}
			if((p1&2)==2)
			{	
				output+='<label>State Abbreviation</label><br><br><select name="state" id="state" onchange="changeState(this.value)">';
				xmlhttp.open("GET","php/Statewide.php",false);
				xmlhttp.send();
				output+='</select><br><br>';
			}
			if((p1&4)==4)
			{
				output+='<label>County Name</label><br><br><select name="county" id="county">';
				xmlhttp.open("GET","php/Countywide.php?s=AK",false);
				xmlhttp.send();
				output+='</select><br><br>';
			}
			if((p1&1)==1)
			{	
				output+='<label>Academic Category</label><br><br><select name="category_id" id="category_id">';
				xmlhttp.open("GET","php/Nationwide.php",false);
				xmlhttp.send();
				output+=
				'\
					</select><br><br><input type="text"name="badge_name"id="badge_name"placeholder="badge name"><br><br><br>\
					<textarea rows="4"cols="50"maxlength="50"name="badge_desc"id="badge_desc"placeholder="Badge description here."></textarea><br><br><br>\
					<textarea rows="4"cols="50"name="tags"id="tags"placeholder="Comma separated (no spaces) search tags here."></textarea><br><br><br>\
					<textarea rows="10"cols="50"maxlength="256"name="criteria"id="criteria"placeholder="Badge criteria here."></textarea><br><br><br>\
					<input type="hidden"name="MAX_FILE_SIZE"value="52428833"/>\
					<a class="creatbutton" onclick="openDesigner()">Design your badge.</a>\
					<img id="badge_image" src=""/>\
					<button id="submit_button" class="creatbutton" value="submit">Finish!</button>\
				';
			}
			document.getElementById("content").innerHTML=output+'</form>';
		}
		function changeState(p1)
		{
			xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function()
			{
				if(xmlhttp.readyState==4&&xmlhttp.status==200)
					document.getElementById("county").innerHTML=xmlhttp.responseText;
			}
			xmlhttp.open("GET","php/Countywide.php?s="+p1,false);
			xmlhttp.send();
		}
		var designerWindow;
		var image;
		function openDesigner()
		{
			designerWindow=window.open
			(
				'https://www.openbadges.me/designer.html?origin=http://www.fyflnetwork.org&email=COOKJA1@aces.edu'
				,''
				,'width=1200,height=680,location=0,menubar=0,status=0,toolbar=0'
			);
		}
		window.onmessage=function(e)
		{
			if(e.origin=='https://www.openbadges.me')
			{
				designerWindow.close();
				image=e.data;
				$('#badge_image').attr("src",e.data.replace(/\+/g , ""));
				console.log(designerWindow);
			}
		}
	</script>
</body>
</html>
