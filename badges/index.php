<?PHP
require_once(__DIR__ . "/source/user/scripts/php/User.php");
$profileLogin = "Login";
$user=getUser();
if($user!=false)
{
	$profileLogin = "Profile";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<title>4-H Badges</title>
	<link rel="stylesheet" href="css/normalize.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/jquery.scrollTo-1.4.3.1.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.scrollorama.js"></script>
	<script src="js/jquery.scrolldeck.js"></script>
<style type="text/css">
	#slideshow {
    margin-top:-55px;
	position:absolute;
	width:100%;
	height:500px;
	overflow:hidden;
	z-index:1;
	}

	#slideshow IMG {
		width: 100%;
		position:absolute;
		top:0;
		left:0;
		z-index:8;
		opacity:0.0;
	}

	#slideshow IMG.active {
		z-index:10;
		opacity:1.0;
	}

	#slideshow IMG.last-active {
		z-index:9;
	}
	
	#buttom{
		position:absolute;
		left:0;
		bottom: 20px;
		width:80%;
		margin: 0 10%;
		height:20px;
		border-top:dotted 3px #999;
		font-color:#666;
		font-size:16px;
	}
</style>
</head>
<body>
	<div class="background"></div>
	<div id="header">
		<h1>&nbsp;<img src="images/FYFLnew.png" height="50"/></h1></a>
		<div id="nav">
			<a href="#login" class="nav-button">Home</a>
			<a href="regPage.html" class="nav-link">Getting Started</a>
			<a href="#badge" class="nav-button">Overview</a>
			<a href="#overview" class="nav-button">4-H Badges</a>
			<a href="resources.html" class="nav-link">Resources</a>
		</div>
	</div>
   <a href="source/user/pages/login.php"> <div id="headercircle"><img src="images/FYFLnew.png" height="50"/></div></a>

<div id="resource" class="triangle">
</div>

<a href="#"><div id="resourcelink">More About Badges</div></a>
	<div class="slide" id="login">	  
       <div id="slideshow">
		<img src="images/image001.jpg" alt="" class="active" />
		<img src="images/image002.jpg" alt="" />
		<img src="images/loginbadge.png" alt="" />
	</div>
       <div id="headertitle" class="effect"><h2 style="text-align:center;">4-H Digital Badges!</h2>
       <h3 style="text-align:center;">...for Lifelong Learning</h3>
		   <a id="buttonFont" href="source/user/pages/login.php"><div id="adminlogin" class="loginbutton"> <?php echo $profileLogin; ?> </div></a>
		   <a id="buttonFont" href="regPage.html"><div id="studnetlogin" class="loginbutton">Getting Started</div></a>
       </div>
       <div id="geninfo">
       <div class="words" id="testzero">
         <span>Welcome to 4-H Digital Badges!</span>
         "A 'badge' is a symbol or indicator of an accomplishment, skill, quality or interest. Badges have been successfully used to set goals, motivate behaviors, represent achievements and communicate success in many contexts. A "digital badge" is an online record of achievements." (Mozilla Open Badges Working Paper, 2012). In this introductory site, 4-H presents its own badge system as an additional way of acknowledging learning in 4-H programs throughout the country. Users may collect badges on a temporary basis in this introductory version of the 4-H Digital Badge System.
       </div>
       </div>
	</div>

	
<div class="slide" id="overview">
<div id="overviewsection">
  <div class="overleft" id="testone"> <h1>4-H Digital Badges are about LEARNING!</h1>

4-H Digital Badges will be available for youth and adults. Youth will earn badges through curriculum and projects in a variety of areas. Later on badges will be developed by 4-H staff which will then be submitted to the badging system and directory. For now, the first series of five badges are on robotics. Adults may earn badges on various topics related to training for or facilitating 4-H programs for youth including issuing badges.

The 4-H badge system is currently in a prototype and introductory form that allows users to "earn" a badge. To earn a badge you must register as a 4-H Digital Badges System user. You will see various types of badges including the five initial robotics badges designed for youth and two demonstration badges on learning. Visitors to the site may navigate through the badge pages and "push" or save badges to their personal profile.
</div>
    <div id="overright"><h1>Enjoy your visit to 4-H Digital Badges!</h1>
    <p><a href="EarnFirstBadge.html">Earn Your First 4-H Badge</a></p>
    <p><a href="allbadges.html">Featured Badges for 2014</a></p>
    <p><a href="source/badgeManager.php">Badge Directory</a></p>
    <p><a href="">Learning Resources for Adult Leaders</a></p>
    </div>

	</div>
    
    </div>
    
    
<div class="slide" id="badge">
    <div id="overviewsection">
    <div class="overleft" id="testtwo">
<h1>Welcome to the 4-H Digital Badging System!</h1>  Digital badges are graphic symbols or indicators of an accomplishment, skill, quality or interest. It is an online record of achievements issued on the basis of work completed to obtain it.  Digital badges in 4-H can be a motivator for learning across many content areas in 4-H but also across other communities and institutions. Following Mozilla's Open Badge Infrastructure, 4-H is developing a means of supporting a badge system to support learning through 4-H experiences. The basic process is as follows:

A learner chooses a learning experience to pursue; 4-H curriculum, projects, etc.
A learner meets the learning criteria established for any given badge
An adult leader verifiies that the criteria have been met
Submission to the 4-H badging system requesting a badge issuance and then Issuance of the badge
The badging process itself is further described through these links:  
<a href="4hBadgeIssuer.html">ISSUER</a>, <a href="4hBadgeEarner.html">EARNER</a>, and the <a href="4hBadgeDisplayer.html">DISPLAYER</a> (or Backpack)
</div>

<div id="overright">
<h1>Introductory Video on 4-H Digital Badges</h1>

We invite you to view an introductory video to learn more about
the concept of digital badges in 4-H through the link below:

<p><a href="">4-H Digital Badges Overview</a></p>

<h1>More on Badges!</h1>

You may also want to view other videos about digital badges:

<p><a href="https://www.youtube.com/watch?v=HgLLq7ybDtc">What is a Badge?</a></p>

<p><a href="https://www.youtube.com/watch?v=iqVidWPVBKA">Badges for Lifelong Learning: An Open Conversation</a></p>
</div>
 
    </div>
    <div id="buttom">
    copy rights and stuff
    </div>
    </div>



	
	<script>
		$(document).ready(function() {		
			var deck = new $.scrolldeck({
				buttons: '.nav-button',
				easing: 'easeInOutExpo'
			});
			
		var login = document.getElementById("login");
		var overview = document.getElementById("overview");
		var badge = document.getElementById("badge");
		var headerh = $("#height").height();
		
		 var loginh = $("#testzero").height()+ 400;
         var overviewh = $("#testone").height()+100;
		 var badgeh = $("#testtwo").height()-100;
		 
		 login.style.height = loginh+"px";
		 login.style.top = 0+"px";
		 overview.style.height = overviewh+"px";
		 overview.style.top = loginh + 300+"px";
		 badge.style.height = badgeh+"px";
		 badge.style.top=loginh + 300+ overviewh+"px";
		 
		// for the window resize		
		});
		
		 $(window).resize(function() {
		var login = document.getElementById("login");
		var overview = document.getElementById("overview");
		var badge = document.getElementById("badge");
		var headerh = $("#height").height();
		
		 var loginh = $("#testzero").height()+ 400;
         var overviewh = $("#testone").height()+100;
		 var badgeh = $("#testtwo").height()-100;
		 
		 login.style.height = loginh+"px";
		 login.style.top = 0+"px";
		 overview.style.height = overviewh+"px";
		 overview.style.top = loginh + 300+"px";
		 badge.style.height = badgeh+"px";
		 badge.style.top=loginh + 300+ overviewh+"px";
     });
		function slideSwitch() {
		var $active = $('#slideshow IMG.active');

		if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

		var $next =  $active.next().length ? $active.next()
			: $('#slideshow IMG:first');

		$active.addClass('last-active');
			
		$next.css({opacity: 0.0})
			.addClass('active')
			.animate({opacity: 1.0}, 1000, function() {
				$active.removeClass('active last-active');
			});
	}

	$(function() {
		setInterval( "slideSwitch()", 4000 );
	});
		
	
	</script>

</body>
</html>
