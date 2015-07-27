<?php ob_start(); ?>
<?php session_start();?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<style type="text/css">
		a:link{color:#fff;}
		a:active{}
		</style>

<?php
include("session/DBConnection.php");
 $id_no =$_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
			$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	?>
<title>Canvas - <?php echo $display['firstname'] . " " . $display['lastname'] ?> </title>	
	<link type='text/css' href='css1/basic.css' rel='stylesheet' media='screen' />
</head>
<?php include("session/DBConnection.php");
include("session/session.php");
$error ="";
?>
<body>
<div style="background-image:url(img/background.jpg);height:120px;">
<?
include("member_head.php");
?>
</div>
	<div style="background-image:url(img/background.jpg);color:#fff">
		<div style="margin-left:200px;">
			
			 <?php  
			 
		$user= $_GET['userid'];
		$query = mysql_query("SELECT * FROM members WHERE member_id = '$user'") or die (mysql_error()); 
							$show = mysql_fetch_array($query);	?>
				<p><a style="color:#fff;" id="cap" href="userprofile.php?userid=<?php echo $_GET['userid']; ?>">
				<?php echo $show['firstname'] . "  " . $show['lastname'] ?></a>&nbsp;&nbsp;>>&nbsp; Friends &nbsp;
				
				<?php
	$user_1 = $show['username'];
$result = mysql_query("SELECT * FROM friends WHERE (username='$user_1' OR friend='$user_1') AND status = 'accepted'");
while($row = mysql_fetch_assoc($result))
{
	$numberOfRows = MYSQL_NUMROWS($result);	 
				if ($numberOfRows > 0 ){
				  echo '<font size="2" color="red">' . $numberOfRows .'</font>' . " ";
				  }
				else
    			{
				}
				?></p>
				<p> </p>
			<!-- end grid -->
			
			<!-- end grid -->
		</div><!-- end container -->
	</div>
	
	<div style="min-height:400px;background-image:url(img/background.jpg);">
		<br />
			<center><table width="1200" style="background-image:url(img/background.jpg)">
  <tr>
    <td align="center" width="800" style="background-image:url(img/background.jpg); border:none;"><div style="background-image:url(img/background.jpg)">
	 <div class="separator_3"></div>
	 <?php 
	$user_1 = $show['username'];
	$sql  = "SELECT * FROM friends WHERE (username='$user_1' OR friend='$user_1') AND status = 'accepted'";
	$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result))
{
if ($row['friend'] != $user_1) { $friend = $row['friend']; } else { $friend = $row['username']; }

 $q  = "SELECT * FROM members WHERE username='$friend' ORDER BY RAND() LIMIT 5";
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

//echo $post;
//echo "...";
echo '<div class="quote">&nbsp;&nbsp;' .$post .' ...</div><div class="separator_3"></div></p>'; }}
?>
</div>
</td>
     <td width="400" style="background-color:#ccc; border:none;">
	<div align="left" style="width: 270px; background-color:#ccc; border-left: 1px solid #333; padding-left: 10px;">
	<div align="left" style="width: 300px;">
       <a href="profile.php" id="cap"><?php echo $display['firstname']?> <?php echo $display['lastname']?></a>
	   &nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php">Logout</a></div><br />
	 <br />
              <?php
include("session/DBConnection.php");
$id_no =$_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
			$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	?>
 <?php
$id_no =$_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
	$sql_qry  = mysql_query("SELECT * FROM friends WHERE (username='$user' OR friend='$user') AND status = 'accepted'") or die (mysql_error());
$show_result = mysql_fetch_array($sql_qry);

if ($user != $show_result['friend'] ) { $friend = $show_result['friend']; } else { $friend = $show_result['username']; }

$result = mysql_query("SELECT * FROM members WHERE username != '$friend' and member_id != '".$display['member_id']."' AND confirmation = '1' AND type != 'Admin' ORDER BY member_id DESC LIMIT 5");
if($result > 0){
echo ' <div style="font-weight:bold; color: #FFFFFF; background: #000000; width: 210px; height: 20px; border: 1px solid #666666;">Canvas</div>
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
</div><!-- end container -->

	<div>

		<? include("footer.php");?>
	      </div>
</body> 
</html>
<?php } ?>
<?php ob_flush(); ?>