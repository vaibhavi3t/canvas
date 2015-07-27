<?php session_start();?>
<?php 
include('session/session.php');
include('session/DBConnection.php');
if(isset($_POST['reply'])){ 
$id = $_POST['id'];
$today = date("d/m/Y");
$recipient = $_POST['friend'];
$content = $_POST['content'];
$id_no = $_SESSION['log']['id_no'];	$result1=mysql_query("select * from members where id_no='$id_no'");	$user1 = mysql_fetch_assoc($result1);	$user = $user1['username'];
$status = 'unread';
if (empty($error)) {
$qry = "INSERT INTO messages SET sender='$user', recipient='$recipient', content='$content', status='$status', date_sent='$today'";
mysql_query($qry) or die('Error, insert query failed');
}

if (empty($error)) { $error = "Message sent"; }

header("location: read_message.php?id=$id");
exit();
}
?>
