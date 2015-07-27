<?php session_start();?>
<?php
include("session/DBConnection.php");
$id_no = $_SESSION['log']['id_no'];
			$query = mysql_query("SELECT * FROM members WHERE id_no = '$id_no'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	
$password = $display['password'];
$sql = "DELETE FROM users WHERE id_no = '$id_no' AND password = '$password'";
	$add_member = mysql_query($sql);

?>
<?php
  @session_unregister('log');
  @session_unset();

 echo '<meta http-equiv="refresh" content="2;url=index.php">';
 ?>
