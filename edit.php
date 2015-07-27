<?php 
ob_start(); 
?>
<?php
session_start();
?>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<?php
include ("session/session.php");
include("session/DBConnection.php");
?>

<div style="border:1px solid #fff; width: 300px; background:#fff;">					
<form name="my_form" method="post" action="edit.php">
 <p><input size="1" value="100" name="text_num" style="width: 30px; color: #fff; background-color: #333; border:none;"> 
 Characters Left</p>
<p><br />
 <textarea onKeyPress=check_length(this.form); onKeyDown=check_length(this.form); name="quote" rows="4" cols="30" style="width: 280px; color: #fff; background-color: #333; border:none;"></textarea>
 <input type="submit" value="Ok" name="edit2" class="button"/>
  &nbsp;
  <input type="submit" value="Cancel" name="cancel" class="button"/>
</p>
</form>
</div><br /><?php
$user =  $_SESSION['log']['id_no'];
if(isset($_POST['edit2'])){ 
$quote = $_POST['quote'];
{
$sql2 = "UPDATE members SET quote='$quote' WHERE id_no='$user'";
$result2 = mysql_query($sql2);
} 
header("location: home.php");
}
if(isset($_POST['cancel'])){ 
header("location: home.php");
}
?>
</div>
<?php
ob_flush(); 
?>