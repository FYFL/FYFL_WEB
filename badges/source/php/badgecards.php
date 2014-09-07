<?PHP
	include("tags.php");
	$dbc=@mysqli_connect('fyfl-3.fyflnetwork.org','szk0050','Stoneware!','FYFL-3')or die 
	('Could not connect to MySQL: ' . mysqli_connect_error());
	$badges=getBadgesFromTags($_POST['tag']);
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
	if($_POST['state']!="ALL")
	{
		$q.=$whereAnd.' state="'.$_POST['state'].'" ';
		$whereAnd="AND";
	}
//filter by county
	if($_POST['county']!="ALL")$q.=$whereAnd.' county="'.$_POST['county'].'" ';
//order by upload date
	$q.="ORDER BY uploaded_date DESC";
	$r=mysqli_query($dbc,$q);
	if(mysqli_num_rows($r)>0)
	while($row=mysqli_fetch_array($r,MYSQLI_NUM))
	{
		echo$row[3]=="A"?
		'
			<li>
			<div class="badgecard">
			<div class="ribbon-wrapper"><div class="ribbon">Approved</div></div>
			<img onload="badgeCount(1)" src="http://www.fyflnetwork.org/jzg0028/badge/displayImage?i='.$row[0].'/>
			<span class="badgetitle">'.$row[1].'</span>
			<span class="badgedescription">'.$row[2].'</span>
			<span class="badgefooter"><a class="fancybox-manual-b" href="eachbadge.php?i='.$row[0].'">Learn More or Edit</a></span>
			</div>
			</li>
		':
		'
			<li>
			<div class="badgecard">
			<img onload="badgeCount(0)" src="http://www.fyflnetwork.org/jzg0028/badge/displayImage?i='.$row[0].'/>
			<span class="badgetitle">'.$row[1].'</span>
			<span class="badgedescription">'.$row[2].'</span>
			<span class="badgefooter"><a class="fancybox-manual-b" href="eachbadge.php?i='.$row[0].'">Learn More or Edit</a></span>
			</div>
			</li>
		';
	}
?>
