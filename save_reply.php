<?php session_start();?>
<?php
include("session/DBConnection.php");
include("session/session.php");
$error = "";

if(isset($_GET['submit'])){ 
$reply = $_GET['reply_post'];
$poster_id = $_GET['poster_id'];
$forum_id = $_GET['forum_id'];
$date =  date("m/d/Y");
$query = "INSERT INTO forum_reply SET reply='$reply', poster_id='$poster_id', forum_id='$forum_id', date='$date'";
$add_member = mysql_query($query);
header("location: reply_forum.php?fid=$forum_id");
}
?>
