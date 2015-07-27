<?php ob_start(); ?>
<html>
  <head>
    <title>
	  
	</title>
	
	</head>
<body>
<div style="background-image:url(img/header1.jpg);background-repeat:no-repeat; height:100px;width:100%">
	  	<table id="welcome" style="margin-left:420px;">
		 <tr>
		 	<td style="width:200px;"><?
		   include("session/DBConnection.php");
			$user = $_SESSION['log']['id_no'];
			$query = mysql_query("SELECT * FROM members WHERE id_no = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);
			echo "&nbsp;&nbsp;&nbsp;Welcome"." ".$display['firstname'];	
		?>
		</td>
			
		 	<td width="60px;"><a class="current" href="home.php">Home</a> </li></td>
            <td width="80px;"><a href="profile.php">Profile</a></li></td>
            <td width="0px;"><a href="info.php">Info</a></li></td>
            <td width="150px;"><a href="photos.php">My Photos</a></li></td>
			<td width="120px" height="30px">
			  <a href="friends.php">Friends
                  <?php
	$id_no = $_SESSION['log']['id_no'];
	$query=mysql_query("SELECT * FROM members WHERE id_no = ".$id_no );
	$user1=mysql_fetch_assoc($query);
	$user=$user1['username'];
	$result = mysql_query("SELECT * FROM friends WHERE friend = '" . $user ."' and status = 'requesting'");
	
	$numberOfRows= mysql_num_rows($result);	 
				if ($numberOfRows > 0 )
				  echo '<font size="2" color="red">(' . $numberOfRows .')</font>' ;
				else
    			 echo " ";	
				?>
                </a>
			</td>
			<td width="100px" height="30px">
			  <a href="mail.php">Messages
                  <?php
$id_no = $_SESSION['log']['id_no'];
$status = 'unread';
$query=mysql_query("SELECT * FROM members WHERE id_no = ".$id_no );
	$user1=mysql_fetch_assoc($query);
	$user=$user1['username'];
$result = mysql_query("SELECT * FROM messages WHERE recipient='" . $user."' AND status='$status'");
	
	$numberOfRows = mysql_num_rows($result);	
	if($numberOfRows > 0){
	echo '<font size="1" color="red"><b>' . $numberOfRows .'</b></font>';} 
	?>
			</td>
			<td width="180px;"><a href="forums.php">Notice Board</a></li></td>
			<td width="80px;"><a href="logout.php">Logout</a></li></td>
			
         </tr>
		 </table>
		</div>
	
</div>
	
</body>