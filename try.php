<?php session_start();?>
<?php
include ("session/session.php");
include("session/DBConnection.php");
if(isset($_GET['action'])){
$id = $_GET['action'];
$id_no = $_SESSION['log']['id_no'];	$result1=mysql_query("select * from members where id_no='$id_no'");	$user1 = mysql_fetch_assoc($result1);	$user = $user1['username'];
mysql_query("UPDATE chat SET status = 'read'  WHERE (recipient = '$user' AND username = '$id') AND status = 'unread'");
}
?>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link rel="stylesheet" type="text/css" href="css/divbelow.css" />
<link rel="stylesheet" type="text/css" href="css/chatlayout.css" />
<script type="text/javascript" src="js/thickbox.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>
<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />

<?php
include ("session/session.php");
include("session/DBConnection.php");
?>


<div align="center" >
<?php
if (isset($_POST['submit'])) {

$username = $_GET['action'];
$id_no = $_SESSION['log']['id_no'];	$result1=mysql_query("select * from members where id_no='$id_no'");	$user1 = mysql_fetch_assoc($result1);	$user = $user1['username'];
$message = $_POST['message'];
echo '<br />';
$insert = "INSERT INTO chat SET username='$user', recipient='$username', message='$message', status='unread', time=CURRENT_TIMESTAMP";
	$add_member = mysql_query($insert);
	 
 }
	?>
<div class="headerchat" style="width: 300px;"><div class="buddycontainer">&nbsp;<?php $username = $_GET['action']; ?></div>

    <br class="breaker" />
</div>
<?php
$username = $_GET['action'];
$id_no = $_SESSION['log']['id_no'];	$result1=mysql_query("select * from members where id_no='$id_no'");	$user1 = mysql_fetch_assoc($result1);	$user = $user1['username'];
$query  = "SELECT * FROM users WHERE username = '$username'";
$result = mysql_query($query);

while($row = mysql_fetch_assoc($result))
{ ?>
<div style="padding-left:5px;"><span class="gray"><?php echo date("F d, Y");?>&nbsp;&nbsp;</span></div>
<div class="conversationpicture">

&nbsp;&nbsp;<img class="framed" width="50" height="50" src="<?php $image = $row['image']; echo $image; }?>" /></div>
<?php
$username = $_GET['action'];
$id_no = $_SESSION['log']['id_no'];	$result1=mysql_query("select * from members where id_no='$id_no'");	$user1 = mysql_fetch_assoc($result1);	$user = $user1['username'];
$query  = "SELECT * FROM chat WHERE (recipient = '$user' OR username = '$user') AND (recipient = '$username' OR username = '$username') ORDER BY chat_id ASC";
$result = mysql_query($query);

while($row = mysql_fetch_assoc($result))
{ 

$sql  = "SELECT * FROM members WHERE username='".$row['username']."'";
$result1 = mysql_query($sql);
while($row1 = mysql_fetch_assoc($result1))
{


 echo '<div class="conversation" align="left">
        <b><span class="username" style="text-transform:capitalize;">'. $row1['firstname']. '&nbsp;' . $row1['lastname']. '</span></b>
        <span class="gray">&nbsp;' . $row['time'].'</span>
        <br /><br />' . $row['message']. '&nbsp;</div>';
   } 
	} ?>
	<div style="padding-top: 20px;">
<form action="try.php?action=<?php echo $_GET['action']; ?>" method="post" >
  <p>&nbsp;</p>
  <p>
  <input type="text" maxlength="75" class="formchattext" name="message" id="message" />
  <input 	type="submit" class="button" style="background-color: #333; color: #fff; width: 50px;" name="submit" value="Send" />
  </p>
</form>
</div>
</div>
