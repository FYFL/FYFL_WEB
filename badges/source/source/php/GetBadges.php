<?php
	require_once(__DIR__ . "/dbc.php");
	require_once(__DIR__ . "/tags.php");
/*Get badges from database and filter by search parameters to return as
 *an array.
 */
	function getBadges($tag,$state,$county)
	{
		global $dbc;
	//get all the badges with the given tag
		$badges=getBadgesFromTags($tag);
	//get all badges
		$q="SELECT image_id,badge_name,badge_desc,status FROM images3 ";
		$whereAnd="WHERE";
	//filter by tags
		if(count($badges)>0)
		{
			$q.=$whereAnd.' image_id IN ('.implode(',',$badges).') ';
			$whereAnd="AND";
		}
	//filter by state
		if(!empty($state))
		{
			$q.=$whereAnd.' state="'.$state.'" ';
			$whereAnd="AND";
		}
	//filter by county
		if(!empty($county))
			$q.=$whereAnd.' county="'.$county.'" ';
	//order by upload date
		$q.="ORDER BY uploaded_date DESC";
		$r=mysqli_query($dbc,$q);
		$badges=array();
		while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
			array_push($badges,$row);
		mysqli_free_result($r);
		return $badges;
	}
?>
