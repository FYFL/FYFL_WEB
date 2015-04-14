<?php
	require_once(__DIR__ . "/Group.php");
	require_once(__DIR__ . "/User.php");
//get the current user's info
	$user=getUser();
//make sure the user is logged in (not false) before pairing with group
	if(user!=false&&isset($_POST['submit']))
	//pair the current user's ID with the given group's ID
		pairUserToGroup($user['id_user'],$_POST['groupID']);
?>
<form action="test.php" method='post' accept-charset='UTF-8'>
<table>
<?php
//get all of every group's info in this 2D array
	$groups=getGroups();
//echo a header so the output doesn't confuse me
	echo"<tr><td>Current Groups</td></tr>";
//print all badge names and a button with their ID numbers for the value
	foreach($groups as $group)
		echo"<tr><td><input type='radio'name='groupID'value='".$group['id_group']."'></td><td>".$group['name']."</td></tr>";
?>
</table>
<input type="submit" name='submit'  value="submit">
</form>
<table>
<?php
//get all group ID numbers paired with this user's ID
	$groups=groupsFromUser($user['id_user']);
//echo a header so the output doesn't confuse me again
	echo"<tr><td><img src='DisplayAvatar.php?i=".$user['id_user']."'></td><td>".$user['username']."'s Groups</td></tr>";
	foreach($groups as $group)
	{
	//get the badge info from each badge ID
		$group=getGroupInfo($group);
	//now you can print the group's name
		echo"<tr><td>".$group['name']."</td></tr>";
	}
?>
</table>
