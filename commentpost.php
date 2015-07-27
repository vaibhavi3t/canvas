<?php ob_start(); ?>
<?php session_start();?>
<?php
include("session/DBConnection.php");
include("session/session.php");
$error = "";
?>

<?php
$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);
			
if(isset($_GET['postcomment'])){
$mem_id = $display['member_id'];	
$stat = "commented on ";
$post= $_GET['post_id'];
$qry1 = mysql_query("SELECT * FROM post WHERE post_id = '$post'") or die (mysql_error()); 
			$disp1 = mysql_fetch_array($qry1);
			
$firstname = $disp1['firstname'];
$lastname = $disp1['lastname'];
$friend = $firstname . " " . $lastname .  "\'s post";
$date = date("m/d/Y");
$qry = "INSERT INTO updates SET member_id='$mem_id', status='$stat', friend='$friend', date='$date'";
$result = mysql_query($qry);
if($result){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=profile.php\">";
}
}

?>

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
$content = clean($_GET['postcomment']);
$username =clean($_GET['username']);
$firstname =clean($_GET['firstname']);
$lastname =clean($_GET['lastname']);
$picture =clean($_GET['picture']);
$post_id =clean($_GET['post_id']);

$sql="INSERT INTO postcomment (content, commentby, firstname, lastname, picture, post_id, date_created)
VALUES
('$content','$username', '$firstname', '$lastname', '$picture','$post_id','".strtotime(date("Y-m-d H:i:s"))."')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
header("location: profile.php");
exit();

mysql_close($con)

?>

<?php ob_flush(); ?>