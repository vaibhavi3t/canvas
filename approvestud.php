<?php ob_start(); ?>
<?php session_start();
include("session/DBConnection.php");
include("session/session.php");
if(isset($_POST['send'])){
$email = $_POST['email'];
$subject = $_POST['subject'];
$content = $_POST['content'];

$from = "Canvas-Administrator";
$headers = "From:" . $from;
mail($email,$subject,$content,$headers);
echo "Mail Sent.";

header("location: studentlist.php");
exit();
} 
?> 
<?php ob_flush(); ?>	  
