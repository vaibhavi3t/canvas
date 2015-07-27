<?php session_start();?>
<?php
include("session/DBConnection.php");
include("session/session.php");
$error = "";
?>
                <?php
$id_no = $_SESSION['log']['id_no'];	$result1=mysql_query("select * from members where id_no='$id_no'");	$user1 = mysql_fetch_assoc($result1);	$user = $user1['username'];
$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	
	
if(isset($_POST['submit'])){ 
$title = $_POST['title'];
$category = $_POST['category'];
$content = $_POST['content'];
$id = $display['member_id'];
$date = date("m/d/Y");{

$query = "INSERT INTO forums SET category='$category', title='$title', content='$content', authors_id='$id', date='$date'";
$result = mysql_query($query);
if($result){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=forums.php\">";
}
}

}

?>
