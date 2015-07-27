<?php session_start();?>
<head>
   <link rel="stylesheet" type="text/css" href="css/style.css" />
	
<?php
include("session/DBConnection.php");
$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
			$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	?>
<title>Canvas - <?php echo $display['firstname'] . " " . $display['lastname'] ?> </title>	
	
	
	
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4,h5,h6');
		Cufon.replace('.logo', { color: '-linear-gradient(0.5=#FFF, 0.7=#DDD)' }); 
	</script>
	  <script type="text/javascript">
$(document).ready(function(){

$(".search").keyup(function() 
{
var searchbox = $(this).val();
var dataString = 'searchword='+ searchbox;

if(searchbox=='')
{
}
else
{

$.ajax({
type: "POST",
url: "search2.php",
data: dataString,
cache: false,
success: function(html)
{

$("#display").html(html).show();
	
	
	}




});
}return false;    


});
});

jQuery(function($){
   $("#searchbox").Watermark("Search");
   });
</script>
	<link type='text/css' href='css1/basic.css' rel='stylesheet' media='screen' />

	<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/basic.js'></script>

<script type="text/javascript" src="contact.js"></script>
	<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).sey( function() {
	$("#reply").click( function() {
		$("#forms").fadeIn();
		$("#reply").fadeOut();
	});	
});
</script>

	
    </style>
</head>
<?php include("session/DBConnection.php");
include("session/session.php");
$error ="";
?>
<body>
<div style="background-image:url(img/background.jpg)">
  <?
include("member_head.php");
?>
  <div class="clear"></div>
</div>
<!-- end header -->
	
	<div style="background-image:url(img/background.jpg);height:40px;">
			<div class="grid_9">
				<p><a HREF="profile.php" style="text-transform: capitalize;margin-left:200px">
				<?php echo $display['firstname'] . "  " . $display['lastname'] ?></a> >> Messages</p>
				<p> </p>
			</div><!-- end grid -->
			
		
	</div>
	
	<div style="background-image:url(img/background.jpg)">
		<div class="container_12 clearfix">
			<div class="grid_12" style="width: 350px; margin-top: -5px;">
			  <div align="left"><table width="944" height="600" border="1" align="left">
  <tr>
    <td width="253" style="background-color:#222;">
	<div >
<div id='basic-modal'>
                  <h3 class="hx-style01 nom"></h3>
                  <h3 class="hx-style01 nom"><a class='basic' href="#" style="text-decoration:none;"><button type="submit" name="edit" onclick="buttonclicked(this)"><strong> Compose Message</strong></button>
                  </a></h3>
                  <p>
<?php 
if(isset($_POST['send'])){ 
$today = date("m/d/Y");
$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
$status = 'unread';

if (empty($error)) {
$query = "INSERT INTO messages SET sender='$user', recipient='$_POST[friend]', content='$_POST[content]', date_sent='$today', status='$status'";
mysql_query($query) or die('Error, insert query failed');
}

if (empty($error)) { $error = "Message sent"; }

}

?>
</p>
                  <p class="hx-style01 nom" style="color:#66FF00; font-weight:bold; size:13px;"><?php echo $error; ?></p>
				 
      </div>
                <div id="basic-modal-content">
                  <form id="form1" method="post" action="draftmessages.php">
                 <p align="left" style="color: gold; ">To:
                      <label>
                       <select name="friend" size="0" style="width: 200px; color: #fff; background-color: #333; border:none; text-transform:capitalize;">
										  <option>-Select Friend-</option>
<?php
$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
$sql  = "SELECT * FROM friends WHERE (username='$user' OR friend='$user') AND status = 'accepted'";
$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result))
{

if ($row['friend'] != $user) { $friend = $row['friend']; } else { $friend = $row['username']; }
$query  = "SELECT * FROM members WHERE username='$friend'";
$res = mysql_query($query);
while($row1 = mysql_fetch_assoc($res))
{?>

								<option id="cap" value="<?php if ($row['friend'] != $user) { echo $row['friend']; } else { echo $row['username']; } ?>"><?php echo $row1['firstname'] . " " . $row1['lastname'] ?></option>
										<?php } ?><?php } ?>
					  </select>
                      </label>
                    </p><br />
					
                 <p align="left" style="color: gold;">Message:
                      <textarea name="content" cols="100" rows="6" style="width: 300px; color: #fff; background-color: #333; border:none;"></textarea>
                      <br />
					  <br />
                      <input type="submit"  style="width: 75px; margin-left: 212px; background-color:#333; color:#fff;" name="send" value="Submit" /><br />
                      <input type="reset"  style="width: 75px; margin-left: 212px; background-color:#333; color:#fff;" name="reset" value="Reset" />
                     
                    </p>
                  </form>
                </div>
                  <p><img src="images/image_31.png" alt="" width="17" height="16" /> <a href="mail.php" style="text-decoration:none;">Inbox&nbsp;&nbsp;<?php
$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
$status = 'unread';
$result = mysql_query("SELECT * FROM messages WHERE recipient='" . $user."' AND status='$status'");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	if($numberOfRows > 0){
	echo '(<font size="1" color="red"><b>' . $numberOfRows .'</b></font>)';} 
	?></a>
	<br />
	<a href="sentmessages.php" style="text-decoration:none;">
	<img src="images/sent.png" alt="" width="17" height="16" /> Sent items&nbsp;&nbsp;<?php
$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
$result = mysql_query("SELECT * FROM messages WHERE sender='" . $user."'");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	if($numberOfRows > 0){
	echo '(<font size="1" color="red"><b>' . $numberOfRows .'</b></font>)';} 
	?></a>
	<br />
	<br />
</p>
    
    <br />
    <div class="separator_1"></div>
<span style="color:#FFFFFF; font-size: 18px;">CONTACTS</span>	
	<br /><br /><?php
$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
$sql  = "SELECT * FROM friends WHERE (username='$user' OR friend='$user') AND status = 'accepted' ORDER BY RAND() LIMIT 2";
$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result))
{
if ($row['friend'] != $user) { $friend = $row['friend']; } else { $friend = $row['username']; }

 $q  = "SELECT * FROM members WHERE username='$friend'";
$a = mysql_query($q);
while($b = mysql_fetch_assoc($a))
{
$email = $b['email'];
if($email != "" ) {
echo '<img class="framed" height=40 width=40 align="left" SRC="'. $b['image'] .'" alt="'. $b['firstname'] . " " . $b['lastname'] .'" />';
echo '<span style="text-transform:capitalize; color: #fff;">&nbsp;' . $b['firstname'] . " " . $b['lastname'] .'</span>';
    echo '<p>&nbsp;'. $b['type'] . '<br /><br />';
    echo 'Email : <span style="color:#6666FF;">' . $b['email'] . '</span></p><br /><div class="separator_1"><br />';
}} }   ?>
    
</div>

</td><td width="700" border="0" style="border-bottom-width: 0px;">
<?php
if (isset($_GET["delete"])) {

$query="DELETE FROM messages WHERE message_id='$_GET[delete]'";
@mysql_query($query) or die('Error, delete query failed');
$error = "Deleted!";
}
?>
<?php echo $error; ?>

<?php
include ("session/DBConnection.php");
$id = $_GET['id'];
			$query = mysql_query("SELECT * FROM messages WHERE message_id = '$id'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	?>
			
		 <?php
include ("session/DBConnection.php");
$user = $display['sender'];
			$qry = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
			$a = mysql_fetch_array($qry);
			echo '<img class="framed" width=50 height=50 src="' . $a['image'] .'"/>';
			echo '&nbsp;&nbsp;<a href="userprofile.php?userid=' . $a['member_id'] . '" style="font-weight: bold; text-decoration:none; text-transform: capitalize; color: #51B22E;">';
			echo $a['firstname'] . " " . $a['lastname'] . '</a>';
			echo '<br />';
			echo '&nbsp;&nbsp;' . $display['content'];
			echo '<br /><br />';
			echo '<div style="border-top:1px solid #999999; width:600px;"></div>';

			echo '<br />';
$id = $_GET['id'];
			
			
			echo '<br />';
			echo '<div id="reply">Reply</div>';
			echo '<div id="forms" style="display:none">';
			echo '<form method="post" action="mensahe.php">';
			echo '<table>';
			echo '<tr><td><textarea name="content" style="width: 300px; height: auto; color: #fff; background-color: #333;" ></textarea></td></tr>';
			echo '<tr><td><input class="button" type="submit" name="reply" value="Reply" /></td></tr>';
			echo '<input type="hidden" name="friend" value="' . $display["sender"] . '" />';
			echo '<input type="hidden" name="id" value="' . $display["message_id"] . '" />';
			echo '</table></form></div>';

			
			?>
			<br />
<a href="mail.php" style="text-decoration:none;">Back to Messages
</table></td></tr>
	</table></div>
	
</td>
  </tr>
</table>
</div>
	
		  </div>
			
			
		</div>
	</div><!-- end content -->
	<!-- end footer -->
	<?
	  include("footer.php");
	?>
</body> 
</html>
