<?php session_start();
include("session/DBConnection.php");
include("session/session.php");
$error = "";
$id_no = $_SESSION['log']['id_no'];
	$query=mysql_query("SELECT * FROM members WHERE id_no = ".$id_no );
	$user1=mysql_fetch_assoc($query);
	$user=$user1['username'];

$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	
if (isset($_GET["status"]))  {
$get = $_GET['status'];
if ($get=="approve")  {
$mem_id = $display['member_id'];
$stat = "are now friends with ";
}
if ($get=="decline")  {
$mem_id = $display['member_id'];
$stat = "";
}
$friend= $_GET['accept'];
$qry1 = mysql_query("SELECT * FROM friends WHERE friend_id = '$friend'") or die (mysql_error()); 
			$disp1 = mysql_fetch_array($qry1);
$frnd = $disp1['username'];
$qq = mysql_query("SELECT * FROM members WHERE username = '$frnd'") or die (mysql_error()); 
			$disp2 = mysql_fetch_array($qq);	
			$firstname = $disp2['firstname'];
			$lastname = $disp2['lastname'];
$friend = $firstname . " " . $lastname .  ".";
$date = date("m/d/Y");
$qry = "INSERT INTO updates SET member_id='$mem_id', status='$stat', friend='$friend', date='$date'";
$result = mysql_query($qry);
if($result){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=friends.php\">";
}
}

if (isset($_GET["delete"]))  { $delete = $_GET["delete"]; }
if (isset($_GET["decline"]))  { $decline = $_GET["decline"]; }
if (isset($_GET["accept"]))  { $accept = $_GET["accept"]; }
$error ="";

if (isset($_GET["decline"])) {

$query="UPDATE friends SET status='declined' WHERE friend_id='$decline'";
@mysql_query($query) or die('Error, update query failed');
$error = "User declined!";
header("location: friends.php");
}
if (isset($_GET["accept"])) {

$query="UPDATE friends SET status='accepted' WHERE friend_id='$accept'";
@mysql_query($query) or die('Error, update query failed');
$error = "User accepted!";
header("location: friends.php");

}
if (isset($_GET["delete"])) {

$query="DELETE FROM friends WHERE friend_id='$delete'";
@mysql_query($query) or die('Error, delete query failed');
header("location: friends.php");
}


?>
