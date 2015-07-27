<?php ob_start(); ?>
<?php session_start();

include("session/DBConnection.php");
include("session/session.php");
if(isset($_POST['cancel'])){header("location: studentlist.php");exit();}
if(isset($_POST['send'])){
$email = $_POST['email'];
$subject = $_POST['subject'];
$content = $_POST['content'];

$to = "$email";
$subject = "$subject";
$content = "$content";
$from = "Canvas-Administrator";
$headers = "From:" . $from;
mail($to,$subject,$content,$headers);
echo "Mail Sent.";


header("location: studentlist.php");
exit();
} 

?>
<?php ob_flush(); ?>