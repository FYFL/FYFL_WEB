Badges.php
	
	editBadge($image_id,$badge_name,$badge_desc,$status,$state,$county)
		$image_id is the ID for the badge that will be edited.
		$badge_name is a new name for the badge.
		$badge_desc is a new description for the badge.
		$status either 'A' for approved or 'U' for unapproved.
		$state associate the badge with a different state.
		$county associate the badge with a different county.
		NOTE: Empty parameters will be ignored.
		
	getBadges($offset,$limit,$tag,$state,$county)
		$tag filters badges by this tag.
		$state filters badges by this state.
		$county filters badges by this county.
		$offset only get badges starting from this offset
		$limit only get badges up to this limit
		returns a 2D array of badges:
			$arr[n]['image_id']
			$arr[n]['badge_name']
			$arr[n]['badge_desc']
			$arr[n]['status']
		NOTE: Empty parameters will be ignored.
		
	getMyBadges()
		returns a 2D array of badges owned by the current user:
			$arr[n]['image_id']
			$arr[n]['badge_name']
			$arr[n]['badge_desc']
			$arr[n]['status']
		returns false if the user is not logged in.
		
	getUserBadges($userID)
		$userID a user's ID number.
		returns a 2D array of badges owned by the given user:
			$arr[n]['image_id']
			$arr[n]['badge_name']
			$arr[n]['badge_desc']
			$arr[n]['status']
		
	makeBadge($badge_name,$badge_desc,$criteria,$category_id,$state,$county,$image)
		$badge_name name for the new badge.
		$badge_desc description for the new badge.
		$criteria information for criteria page.
		$category_id academic category id for new badge.
		$state state associated with this badge.
		$county county associated with this badge.
		$image the badge image should be a base64 encoded png.
		returns an array of errors as strings.
		NOTE: All parameters but state and county are required.
		
DisplayAvatar.php

	Echoes the avatar for a given user ID.
	example: <img src="DisplayAvatar.php?i=(user ID)">

DisplayImage.php
	
	Echoes the image for a given badge ID.
	example: <img src="DisplayImage.php?i=(badge ID)">

GetCategories.php
	
	getCategories()
		returns a 2D array. 1st value is an ID. 2nd value is the name.
		
Group.php

	addGroup($name)
		$name is the name of the new group.
	
	usersFromGroup($groupID)
		$groupID a group ID number.
		returns an array of user ID numbers that are members.
		
	groupsFromUser($userID)
		$userID a user ID number.
		returns an array of group ID numbers that the user is member of.
		
	getGroupInfo($groupID)
		$groupID a group ID number.
		returns an array of a group's info:
			$arr['name']
			$arr['id_group']
			
	getGroups()
		returns a 2D array of every group's info:
			$arr[n]['name']
			$arr[n]['id_group']
			
	pairUserToGroup($userID,$groupID)
		$userID is a user ID.
		$groupID is a group ID.
		NOTE: pairs a user and group together in the membership table

States-Counties.php
	
	countyFromID($id)
		$id is the ID for a county.
		returns the name of the county for that ID.
	
	getStates()
		returns an array of states.
	
	getCounties($state)
		$state the state to get counties from.
		returns a 2D array of counties from that state.  ID and name.
		returns false if an incorrect value for $state is given.
	
	stateFromCounty($id)
		$id id number of the county.
		returns the state abbreviation that the county is in.
		
User.php
	
	editUser($name,$lname,$email,$state,$county)
		$name new first name.
		$lname new last name.
		$email new email address.
		$state new state.
		$county new county.
		returns true if successfull or false if user is not logged in.
		NOTE: Empty parameters will be ignored.
		
	userFromID($userID)
		$userID a user ID number.
		returns an array of user info:
			$arr['username']
			$arr['name']
			$arr['lname']
			$arr['email']
			$arr['user_level']
			$arr['Adult']
			$arr['State']
			$arr['County']
			$arr['id_user']
		
	getUser()
		returns an array of user info:
			$arr['username']
			$arr['name']
			$arr['lname']
			$arr['email']
			$arr['user_level']
			$arr['Adult']
			$arr['State']
			$arr['County']
			$arr['id_user']
			
Utils.php

	uploadImage($image)
		$image from $_FILES with 'tmp_name', 'type', 'size', and 'error'
		returns the contents of the file as a string
		throws an ImageUploadException
