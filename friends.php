<?php ob_start(); ?>

<?php 
session_start();
?>
<html >
<head>
   <link rel="stylesheet" type="text/css" href="css/style.css" />
	<style type="text/css">
	 a:link{color:#FFFFFF}
	</style>
<?php
include("session/DBConnection.php");
$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
	$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
	$display = mysql_fetch_array($query);	
	?>
	
<title>Canvas <?php echo $display['firstname'] . " " . $display['lastname'] ?> </title>	

<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
 </head>
 
<?php include("session/DBConnection.php");
include("session/session.php");
$error ="";
?>

<body background="img/background.jpg">

<div style="background-image:url(img/background.jpg);background-repeat:no-repeat;">
<?
  include("member_head.php");
?>
</div>
	<div style="background-image:url(img/background.jpg);width:100%;margin-top:10px;color:blue;">
		<div style="background-image:url(img/background.jpg);margin-left:200px;">
			<a HREF="profile.php" style="text-transform: capitalize;margin-left:100px;">
				<?php echo "&nbsp;&nbsp;".$display['firstname'] . "  " . $display['lastname']."&nbsp;&nbsp;" ?> </a> >> Friends&nbsp;<?php
	$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
$result = mysql_query("SELECT * FROM friends WHERE (username = '$user' AND status = 'accepted') OR (friend = '$user' AND status = 'accepted')");
	
	$numberOfRows = MYSQL_NUMROWS($result);	 
				if ($numberOfRows > 0 )
				  echo '<font size="2" color="red">' . $numberOfRows .'</font>' . " ";
				else
    			
				?></p>
				<p> </p>
			</div>
		</div>

	
	<div style="min-height:400px;background-image:url(img/background.jpg);">
	<center>
			<table width="1200" style="margin-top:-20px;">
  <tr>
    <td align="center" width="800" style=" border:none;background-image:url(img/background.jpg);">
		<div style="background-image:url(img/background.jpg);">
	 <div class="separator_3"></div>
	 <?php 
	$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
	$sql  = "SELECT * FROM friends WHERE (username='$user' OR friend='$user') AND (status = 'accepted')";
	$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result))
{


if ($row['friend'] != $user) { $friend = $row['friend']; } else { $friend = $row['username']; }

 $q  = "SELECT * FROM members WHERE username='$friend'";
$a = mysql_query($q);
while($b = mysql_fetch_assoc($a))
{
$id = $b['member_id'];
echo '<p><img class="framed" height=40 width=40 align="left" SRC="'. $b['image'] .'" alt="'. $b['firstname'] . " " . $b['lastname'] .'" />';
echo '&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<h5 style="text-transform: capitalize; margin-top: -35px; margin-left: 60px;"><a style="color:#000; text-decoration:none;" href="userprofile.php?userid=' . $id . '" >' . $b['firstname'] . " " . $b['lastname'] . '</a>             ';
echo '</span></h5>';
$position=25; 

$message= $b['quote']; 
$post = substr($message, 0, $position); 

echo '<div class="quote">&nbsp;&nbsp;' .$post .' ...</div><div class="separator_3"></div></p>'; }}
?>
</div>
</td>
     <td width="400" style="background-image:url(img/background.jpg);  border:none;">
	<div align="left" style="width: 270px; background-image:url(img/background.jpg); border-left: 1px solid #333; padding-left: 10px;">
	<div align="left" style="width: 300px;">
    <a href="profile.php" id="cap"><?php echo $display['firstname']?> <?php echo $display['lastname']?></a>
	   &nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php">Logout</a></div><br />
<?php
	$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
$result = mysql_query("SELECT * FROM friends WHERE friend = '" . $user ."' and status = 'requesting'");
	
	$numberOfRows = MYSQL_NUMROWS($result);	 
				if ($numberOfRows > 0 )
				  echo '<h6 ><font size="2" color="red">' . $numberOfRows .'</font>' . " " . "Friend Request</h6>";
				else
    			 echo " ";	
				?>
    
                <br />
                <?php 
				$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
				$query  = "SELECT * FROM friends WHERE friend='$user' AND status = 'requesting'";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result))
{

$fid = $row['friend_id'];?>
	 
	<?php 
	$userid = $row['username'];
	 $qq  = "SELECT * FROM members WHERE username='$userid' ORDER BY RAND() LIMIT 5";
$cc = mysql_query($qq);
while($aa = mysql_fetch_assoc($cc))
{	
?>
<?php 
echo '<span>';
	 echo '<a href="userprofile.php?userid=' . $aa['member_id'] . '" style="text-transform: capitalize; text-decoration: none;"><img class="framed" height=40 width=40 align="left" SRC="'. $aa['image'] .'" alt="'. $aa['firstname'] . " " . $aa['lastname'] .'" /></a>&nbsp;<a href="userprofile.php?userid=' . $aa['member_id'] . '"  style="text-transform: capitalize; text-decoration: none;">' . $aa['firstname'] . " " . $aa['lastname'] . '</a>';
	 echo '<br />&nbsp;&nbsp;';
	 echo '<a href="action.php?accept=' .$fid . '&status=approve"><img src="images/check.jpg" title="Confirm" width=20 height=20 alt="Confirm" /></a>';
	 echo '&nbsp;&nbsp;';
	 echo '<a href="action.php?decline=' .$fid . '&status=decline"><img src="images/ex.jpg" title="Decline" width=20 height=20 alt="Ignore" /></a></span><br /><br />';
           }  } ?>           
      
     <br />
             
    <?php
include("session/DBConnection.php");
$id_no = $_SESSION['log']['id_no'];

	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
			$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	
	?>
	
 <?php	
	$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
	$sql_qry  = mysql_query("SELECT * FROM friends WHERE (username='$user' OR friend='$user') AND status = 'accepted'") or die (mysql_error());
	$show_result = mysql_fetch_array($sql_qry);

if ($user != $show_result['friend'] ) { $friend = $show_result['friend']; } 
else { $friend = $show_result['username']; }

$result = mysql_query("SELECT * FROM members WHERE username != '$friend' and member_id != '".$display['member_id']."' AND confirmation = '1' AND type != 'Admin' ORDER BY member_id DESC LIMIT 5");
if($result > 0){
echo ' <div style="font-weight:bold; color: #FFFFFF;background-color:#4848FF ;width: 210px; height: 20px; border: 1px solid #666666;">NEW Canvasian</div>
	  <div class="separator_1"></div>';
	  }

	  while($row = mysql_fetch_array($result))
{
	echo '<div align="left" id="names">';
	echo '<a href="userprofile.php?userid='.$row["member_id"].'" valign="top" >';
   echo "<img style='padding-top: 10px; border-width: 0px;' align='center' width=50 height=50 alt='Unable to View' src='" . $row["image"] . "'>";
  echo '&nbsp;';
  echo '<div style="margin: -50px 113px 3px 55px;">';
  echo '<b align="left">'; 
  echo $row['firstname'] . " " . $row['lastname'];
  echo '</b>';
  echo '</div></a><br />';
  echo '</div>';
  echo '<br />';	
   } 
   ?>
			</div>
    		
</td>
  </tr>
</table>
</center>
</div>
<?
  include("footer.php");
?>
		
</body> 
</html>
<?php ob_flush(); ?>