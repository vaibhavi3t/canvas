<?php session_start();
include("session/DBConnection.php");include('session/session.php');$error="";$uu = $_POST["friend"];$sql_qry  = "SELECT * FROM members WHERE username='$uu'";$res = mysql_query($sql_qry);
while($row_res = mysql_fetch_assoc($res))
{
$userid=$row_res['member_id'];

$id_no =$_SESSION['log']['id_no'];	$result1=mysql_query("select * from members where id_no='$id_no'");	$user1 = mysql_fetch_assoc($result1);	$username = $user1['username'];
if (isset($_GET["action"]) && ($_GET["action"] == "add")) {
if ($_POST["friend"] == $username) { $error = "Oops..You cannot add yourself!"; } 
$query = "SELECT username FROM members WHERE username='$_POST[friend]'";
$result = mysql_query($query) or die('Error, insert query failed');
$row = mysql_fetch_array ($result, MYSQL_NUM);
if (!$row) { $error = "No members found!"; }
$query = "SELECT friend FROM friends WHERE friend='$_POST[friend]' AND username='$username'";
$result = mysql_query($query) or die('Error, insert query failed');
$row = mysql_fetch_array ($result, MYSQL_NUM);
if ($row) { $error = "You are already friends!"; }


if (empty($error)) {
$date = strtotime(date("Y-m-d H:i:s"));
$query = "INSERT INTO friends SET friend='$_POST[friend]', status='requesting', username='$username', date_added='$date'";

$result = mysql_query($query);
}
if($result){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=userprofile.php?userid=$userid\">";
}
}
}
?>


