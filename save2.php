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

$id = clean($_GET['id']);
$query = mysql_query("SELECT * FROM members WHERE member_id = '$id'") or die (mysql_error()); 
$display = mysql_fetch_array($query);	
$user = $display['member_id'];
$username = clean($_GET['username']);
$firstname = clean($_GET['firstname']);			
$lastname = clean($_GET['lastname']);
$f_username = clean($_GET['f_username']);
$f_firstname = clean($_GET['f_firstname']);			
$f_lastname = clean($_GET['f_lastname']);						
						
$picture = clean($_GET['picture']);
$content = clean($_GET['content']);

$sql = "INSERT INTO post SET username='$username', firstname='$firstname', lastname='$lastname', friend='$f_username', friend_firstname='$f_firstname', friend_lastname='$f_lastname', picture='$picture', content='$content', date_created='".strtotime(date("Y-m-d H:i:s"))."'";

mysql_query("UPDATE post SET picture = '$picture' WHERE username='$username'");
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  } 
header("location: userprofile.php?userid=$id");
echo $id;
exit();

mysql_close($con)

?>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("chmsc", $con);

$username=$_GET['username'];
$picture=$_GET['picture'];


mysql_query("UPDATE post SET picture = '$picture' WHERE username='$username'");

mysql_close($con);
?> 