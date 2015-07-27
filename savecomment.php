<?php ob_start(); ?>
<?php session_start();?>
<?php
include("session/DBConnection.php");
include("session/session.php");
$error = "";
?>
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
if(isset($_GET['comment'])){
$mem_id = $display['member_id'];	
$stat = "commented on ";
$post= $_GET['id'];
$qry1 = mysql_query("SELECT * FROM uploads WHERE upload_id = '$post'") or die (mysql_error()); 
			$disp1 = mysql_fetch_array($qry1);
$unym = $disp1['username'];
$qq = mysql_query("SELECT * FROM members WHERE username = '$unym'") or die (mysql_error()); 
			$dd = mysql_fetch_array($qq);	
$firstname = $dd['firstname'];
$lastname = $dd['lastname'];
$friend = $firstname . " " . $lastname .  "\'s photo";
$date = date("m/d/Y");
$qry = "INSERT INTO updates SET member_id='$mem_id', status='$stat', friend='$friend', date='$date'";
$result = mysql_query($qry);
if($result){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=photos.php\">";
}
}

?>

             <?php


$messages = $_GET['comment'];
$user = $_GET['userid'];
$PIC = $_GET['pic'];
$id = $_GET['id'];
$date = strtotime(date("Y-m-d H:i:s"));

$query = "INSERT INTO photoscomment SET comment='$messages', commentby='$user', PIC='$PIC', upload_id='$id', date_comment='$date'";
$add_member = mysql_query($query);

header("location: photoscomment.php?pid=$id");
exit();
?>
<?php ob_flush(); ?>