<?PHP
//connecting to database
	$dbc=@mysqli_connect('fyfl-3.fyflnetwork.org','szk0050','Stoneware!','FYFL-3')
	or die($err[0]='Could not connect to MySQL: '.mysqli_connect_error());
	
	include("/var/www/sarthak-jesse-patty/admin/source/include/membersite_config.php");
//checking if user is logged in
	if(!$fgmembersite->CheckLogin())
	{
		//$fgmembersite->RedirectToURL("/var/www/sarthak-jesse-patty/admin/source/login.php");
		//exit;
		echo "0";
	}
?>
