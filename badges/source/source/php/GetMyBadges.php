<?php
	require_once(__DIR__ . "/dbc.php");
	require_once(__DIR__ . "/include/membersite_config.php");
	/*Returns false if the user is not logged in.
	 *Returns the badges that the user owns.
	 */
	function getMyBadges()
	{
		global $dbc;
		global $fgmembersite;
		if(!$fgmembersite->CheckLogin())
			return false;
		$q=mysqli_query($dbc,"SELECT image_id FROM backpack WHERE id_user=(SELECT id FROM people3 WHERE username='".$_SESSION[$fgmembersite->GetLoginSessionVar()]."')");
		$badges=array();
		while($row=mysqli_fetch_array($q,MYSQLI_ASSOC))array_push($badges,$row['image_id']);
		$q=mysqli_query($dbc,"SELECT image_id,badge_name,badge_desc FROM images3 WHERE image_id IN (".implode(',',$badges).")");
		$badges=array();
		while($row=mysqli_fetch_array($q,MYSQLI_ASSOC))array_push($badges,$row);
		return $badges;
	}
?>
