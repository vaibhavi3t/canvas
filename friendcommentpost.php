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
$content = clean($_GET['postcomment']);
$username =clean($_GET['username']);
$firstname =clean($_GET['firstname']);
$lastname =clean($_GET['lastname']);
$picture =clean($_GET['picture']);
$post_id =clean($_GET['post_id']);
$userid =clean($_GET['member_id']);

$sql="INSERT INTO postcomment (content, commentby, firstname, lastname, picture, post_id, date_created)
VALUES
('$content','$username', '$firstname', '$lastname', '$picture','$post_id','".strtotime(date("Y-m-d H:i:s"))."')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
header("location: userprofile.php?userid=$id");
exit();

mysql_close($con)

?>
