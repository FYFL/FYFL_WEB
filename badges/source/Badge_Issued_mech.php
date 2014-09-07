<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Badge Issued</title>
</head>

<body>
<h1 ALIGN="CENTER" class="Badge_Color">Badge Issuance Complete</h1>


 <?php echo"hi"; 
 //if (isset($_POST['submit'])) { //
  $name=$_POST['fname'];
  $badgeid=$_POST['bname'];
  $iname=$_POST['iname'];
  echo"$iname";
    echo "$name! ";
	echo"$badgeid";
	        // Connect to MySQL:
            $dbc = @mysqli_connect('fyfl-3.fyflnetwork.org', 'szk0050', 'Stoneware!', 'FYFL-3')
 or die
              ('Could not connect to MySQL: ' . mysqli_connect_error());

            // Retrieve the image information.
			
			
            $q = "SELECT  id_user FROM people3 WHERE
 name='$name'";

            // Execute the query:
            $r = mysqli_query ($dbc, $q);
	  
            
        // Check the results:
        if (mysqli_num_rows($r) == 1) {

            // Retrieve the image information:
            $row = mysqli_fetch_array ($r, MYSQLI_ASSOC);

          // Clean up:
 
           



		
//          mysql_query("SET CHARACTER SET utf8",$dbc);
		}
		  $id=$row['id_user'];
		
 			
            $q = "UPDATE Mechatronics_Response
			Set action='c'
			where id_user='$iname'";
 

            // Execute the query:
            $r = mysqli_query ($dbc, $q);
	  
            
        // Check the results:
        if (mysqli_num_rows($r) == 1) {

            // Retrieve the image information:
            $row = mysqli_fetch_array ($r, MYSQLI_ASSOC);

          // Clean up:
 
           



		
//          mysql_query("SET CHARACTER SET utf8",$dbc);
		}


	

	
	
	//$name= $fgmembersite->UserFullName();

			
            $s = "INSERT  INTO backpack ( id_user,image_id) VALUES
 ('$id','$badgeid')";
			
	            $s = mysqli_query ($dbc, $s);
	  
            
        // Check the results:
        if (mysqli_num_rows($s) == 1) {

            // Retrieve the image information:
            $raw = mysqli_fetch_array ($s, MYSQLI_ASSOC);


           



		
         echo "your badge has been stored into your BackPack" . $raw['id_user']."<br>";	
echo"<p>Click the MyBadges link below to view earned badges!!</p>";
echo"<p><a href='access-controlled.php'>My Badges!</a></p>";
		
		
		}
			
	 
	 
	 
else {    	
         echo "your badge has been stored into your BackPack" . $raw['id_user']."<br>";	
echo"<p>Click the MyBadges link below to view earned badges!!</p>";
echo"<p><a href='access-controlled.php'>My Badges!</a></p>";
		
                    
              /*      echo '<p><font color="red">MySQL reported: '. mysqli_error($dbc) .'<
/font></p>';*/
            

            	 
	 
     
        // Close the database connection:
        mysqli_close($dbc);

    

 }
 
 //}
		
	?>	