<?php

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 
 function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
mysql_select_db("canvas", $con);
															
$firstname = clean($_GET['firstname']);			
$lastname = clean($_GET['lastname']);						
$username = clean($_GET['username']);
$picture = clean($_GET['picture']);
$content = clean($_GET['content']);

$sql = "INSERT INTO post SET username='$username', firstname='$firstname', lastname='$lastname', friend='$username', friend_firstname='$firstname', friend_lastname='$lastname', picture='$picture', content='$content', date_created='".strtotime(date("Y-m-d H:i:s"))."'";

mysql_query("UPDATE post SET picture = '$picture' WHERE username='$username'");
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  } 
header("location: profile.php");
exit();

mysql_close($con)

?>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("canvas", $con);

$username=$_GET['username'];
$picture=$_GET['picture'];


mysql_query("UPDATE post SET picture = '$picture' WHERE username='$username'");

mysql_close($con);
?> 