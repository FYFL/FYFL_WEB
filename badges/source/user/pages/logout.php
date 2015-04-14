<?PHP
require_once(__DIR__ . "/../scripts/php/include/membersite_config.php");
	$fgmembersite->LogOut();
?>
<h2>You have logged out</h2>
<?PHP
//redirect back to the profile page
	header("Location: login.php");
	die();
?>
