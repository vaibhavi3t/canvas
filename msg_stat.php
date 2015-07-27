<?php 
$con = mysql_connect("localhost","root","1234");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("canvas", $con);
$id = $_GET['id'];

mysql_query("UPDATE messages SET status='read' WHERE message_id='$id'");
mysql_query("UPDATE replymessage SET status='read' WHERE message_id='$id'");
header("location: read_message.php?id=$id");
exit();
mysql_close($con);
?>