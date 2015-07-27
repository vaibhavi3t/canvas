<?php session_start();?>

<html>
<head>
    
	<link rel="stylesheet" href="js/prettyphoto/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
	
	<link type='text/css' href='css1/basic.css' rel='stylesheet' media='screen' />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/ppic.css" />	
	<link rel="stylesheet" type="text/css" href="css/sample.css" />

	
	<?php
include("session/DBConnection.php");
$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
			$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	?>
<title>Spec's - <?php echo $display['firstname'] . " " . $display['lastname'] ?> </title>	

			
	
<script type="text/javascript">
$(document).ready( function() {
	$("#add").click( function() {
		$("#forms").fadeIn();
		$("#add").fadeOut();
	});	
		$("#add2").click( function() {
		$("#forms2").fadeIn();
		$("#add2").fadeOut();
	});	
});
</script>
	
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready( function() {
	$("#add2").click( function() {
		$("#forms").fadeIn();
		$("#add2").fadeOut();
	});	
	$("#request").click( function() {
		$("#add2").fadeOut();
	});	
	$("#confirm").click( function() {
		$("#add2").fadeOut();
	});	
	$("#friend").click( function() {
		$("#add2").fadeOut();
	});	
	
});
</script>
</head>
<?php
include ("session/session.php");
include("session/DBConnection.php");
$error="";
?>

<body>
<div style="background-image:url(img/background.jpg);height:120px;">
<?
include("member_head.php");
?>
</div>
	<div style="min-height:400px;background-image:url(img/background.jpg)">
		<div class="container_16 clearfix">
			<div class="grid_11 suffix_1 clearfix" style="height: auto;">
				<ul class="blog_brief">
				  <li class="entry clearfix">
						<?php 
$user= $_GET['userid'];
$image=mysql_query("SELECT * FROM members WHERE member_id='$user'");
			$row=mysql_fetch_assoc($image);
			$_SESSION['image']= $row['image'];
			
			echo '<img class="framed" width=130 height=150 align="left" SRC="' . $_SESSION['image'] . '" alt="Unable to view" />';
    		
			?><?php  
			$user= $_GET['userid'];
			$query = mysql_query("SELECT * FROM members WHERE member_id = '$user'") or die (mysql_error()); 
							$result = mysql_fetch_array($query);	
															?>
						<div class="grid_7 omega">
							<h4><a href="userprofile.php?userid=<?php echo $_GET['userid']; ?>" id="catchy"><?php echo $result['firstname'] . " " . $result['lastname']; ?></a></h4>
							 				<form id="share" method="get" action="save2.php" name="form">
            <label>
              <p>                   <textarea name="content" id="sharetext"  cols="50" rows="1" onClick="this.value='';">Canvasian speak out....
                </textarea>
                </p>
               <p>                  <input name="username" type="hidden" id="namebox" value="<?php echo $display['username']?>"/>
                  <input name="firstname" type="hidden" id="namebox" value="<?php echo $display['firstname']?>"/>
                  <input name="lastname" type="hidden" id="namebox" value="<?php echo $display['lastname']?>"/>
				  <input name="f_username" type="hidden" id="namebox" value="<?php echo $result['username']?>"/>
                  <input name="f_firstname" type="hidden" id="namebox" value="<?php echo $result['firstname']?>"/>
                  <input name="f_lastname" type="hidden" id="namebox" value="<?php echo $result['lastname']?>"/>
                  <input name="picture" type="hidden" id="namebox" value="<?php echo $display['image']?>"/>
				  <input type="hidden" name="id" value="<?php echo $_GET['userid']; ?>" />
                  <input name="picture" type="hidden" id="namebox" value="<?php echo $display['image']?>"/>
                </p>
			</label>
            <p>
                      <input name="post" class="button" id="speak" type="submit" value="Share" />	
      
            </p>
          </form>
		  <br /><?php if (empty($error)) { $error = "Message sent"; } ?>
<br /><div align="left"></div><br /><br /><div id="div" style="margin-top: -46px; margin-left: 0px;">
<a href="userprofile.php?userid=<?php echo $_GET['userid']; ?>">Wall</a>&nbsp;|&nbsp;<a href="friends_photos.php?userid=<?php echo $_GET['userid']; ?>">Photos</a>&nbsp;|&nbsp;<a href="friends_info.php?userid=<?php echo $_GET['userid']; ?>">Info</a>&nbsp;|&nbsp;<a href="friendsfriend.php?userid=<?php echo $_GET['userid']; ?>">Friends</a>&nbsp;|&nbsp;<div id='basic-modal' style="margin-top: -18px; margin-left: 205px;">
                  <a class='basic' href="#" style="text-decoration:none; margin-left: 0px;">
				  Send Message</a></div><div id="basic-modal-content">
                 
				 <form id="form1" method="post" action="userprofile.php?userid=<?php echo $_GET['userid']; ?>">
                    <p align="left" style="color: gold;">To:
					<div id="friend" style="text-transform:capitalize;">&nbsp;<?php echo $result['firstname'] . " " . $result['lastname'] ?>&nbsp;</div>
							<input type="hidden" name="friend" value="<?php echo $result['username']; ?>">
                    </p><br />
                   <p align="left" style="color: gold;">Message:
                      <textarea style="color:blue;" name="content" cols="35" rows="6"></textarea>
                      <br /><div align="left">
                      <input type="submit" class="button" name="send" value="Submit" />&nbsp;<input type="reset" class="button" name="reset" value="Reset" /></div>
                   </p>
                  </form>
                </div>
			 <br />
</div><div class="box" id="photos" style="margin-left: -148px; margin-bottom: 2px; margin-top: 10px;">
				
<?php
$username =  $result['username'];
$query  = "SELECT * FROM uploads WHERE username = '$username' ORDER BY upload_id DESC LIMIT 3 ";
$result1 = mysql_query($query);

while($row = mysql_fetch_assoc($result1))
{
echo '<a rel="prettyPhoto[gallery]" class="lightbox" HREF="'. $row["image"] .'">';
echo '<img class="framed" height=100 width=100 SRC="'. $row["image"] .'" title="' . $row["image_name"] . '" />';
echo '</a>';
echo '&nbsp;';
}
?> <p>&nbsp;</p>

      </div>
														
<?php
$error ="";
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

?><br />
</div>
	<?php  
		$user= $_GET['userid'];
		$query = mysql_query("SELECT * FROM members WHERE member_id = '$user'") or die (mysql_error()); 
							$result = mysql_fetch_array($query);	
															?>		
		
<?php
$username =  $result['username'];
$query  = "SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent FROM post WHERE friend ='$username' OR username = '$username' ORDER BY post_id DESC LIMIT 10";
$result = mysql_query($query);

while($row = mysql_fetch_assoc($result))

{				 echo '<li class="entry clearfix">';
				 echo '<div class="blog_info">';
				
				 echo '<span class="info" style="float: left;">';
$user = $row['username'];
$q = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
$dis = mysql_fetch_array($q);
$ff = $row['friend'];
$ss = mysql_query("SELECT * FROM members WHERE username = '$ff'") or die (mysql_error()); 
$gwa = mysql_fetch_array($ss);
$id_no = $_SESSION['log']['id_no'];
	$query=mysql_query("SELECT * FROM members WHERE id_no = ".$id_no );
	$user1=mysql_fetch_assoc($query);
	$username=$user1['username'];
$id = $dis['member_id'];
if($row['username'] == $row['friend']){
if($user == $username){
				 echo '<a href="profile.php" style="text-transform: capitalize;">';
				 echo $row['firstname'] . " " . $row['lastname'] . '</a>'; 

				 echo '&nbsp;says that..</span>';
				 echo '<div class="clear"></div>';
				 echo '</div>';
				 echo '<img class="framed" height=100 width=80 align="left" SRC="'. $dis['image'] .'" alt="'. $row['firstname'] . " " . $row['lastname'] .'" />';

}


				 else if($user != $username){
				 echo '<a href="userprofile.php?userid=' . $id . '" style="text-transform: capitalize;">';
				 echo $row['firstname'] . " " . $row['lastname'] . '</a>'; 

				 echo '&nbsp;says that..</span>';
				 echo '<div class="clear"></div>';
				 echo '</div>';
				 echo '<img class="framed" height=100 width=80 align="left" SRC="'. $dis['image'] .'" alt="'. $row['firstname'] . " " . $row['lastname'] .'" />'; };
				 echo '<div class="grid_7 omega">';
 $position=30; 

$content= $row['content']; 
$post = wordwrap($content, 8, "\n", true); 

				 echo '<p style="color: #000;"><a style="color: #000;" HREF="postcomment.php?pid='. $row['post_id'].'">' . $post . '</a></p><br />';
				 }
				 
		if($row['username'] != $row['friend']){
if($user == $username){
				 echo '<a href="profile.php" style="text-transform: capitalize;">';
				 echo $row['firstname'] . " " . $row['lastname'] . '</a>'; }
				elseif($user != $username){
				 echo '<a href="userprofile.php?userid=' . $id . '" style="text-transform: capitalize;">';
				 echo $row['firstname'] . " " . $row['lastname'] . '</a>'; }

				 echo '&nbsp;&nbsp;says to</span>';
				 if($row['friend'] == $username){
				 echo '<a href="profile.php">';
				 echo '<span style="text-transform: capitalize; font-size: 10px;">' .$row['friend_firstname'] . " " . $row['friend_lastname'] . '</span></a>'; }
				elseif($row['friend'] != $username){
				 echo '<a href="userprofile.php?userid=' . $gwa['member_id'] . '">';
				 echo '<span style="text-transform: capitalize; font-size: 10px;">' .$row['friend_firstname'] . " " . $row['friend_lastname'] . '</span></a>'; }
				 echo '<div class="clear"></div>';
				 echo '</div>';
				 echo '<img class="framed" height=100 width=80 align="left" SRC="'. $row['picture'] .'" alt="'. $row['firstname'] . " " . $row['lastname'] .'" />';
				 echo '<div class="grid_7 omega">';
 $position=30; // Define how many character you want to display.

$content= $row['content']; 
$post1 = wordwrap($content, 8, "\n", true); 

				 echo '<p style="color: #000;"><a style="color: #000;" HREF="postcomment.php?pid='. $row['post_id'].'">' . $post1 . '</a></p><br />';
				 }
		 
		 
				 echo '<font style="color:#000099;font-size: 10px;">';
	$days = floor($row['TimeSpent'] / (60 * 60 * 24));
			$remainder = $row['TimeSpent'] % (60 * 60 * 24);
			$hours = floor($remainder / (60 * 60));
			$remainder = $remainder % (60 * 60);
			$minutes = floor($remainder / 60);
			$seconds = $remainder % 60;
	if($days > 0)
			echo date('F d Y', $row['date_created']);
			elseif($days == 0 && $hours == 0 && $minutes == 0)
			echo "few seconds ago";		
			elseif($days == 0 && $hours == 0)
			echo $minutes.' minutes ago';
		
			echo '</font><br />';

$qqq = mysql_query("SELECT * FROM postcomment WHERE post_id='" . $row['post_id']."'");
	$numberOfRows = MYSQL_NUMROWS($qqq);
	if ($numberOfRows > 0){
	if ($numberOfRows == 1){
	echo '<a HREF="postcomment.php?pid='. $row['post_id'].'"><small>1 comment</small></a>';}
	if ($numberOfRows==3 || $numberOfRows==2){
	echo '<a HREF="postcomment.php?pid='. $row['post_id'].'"><small>' . $numberOfRows. " comments</small></a>";}
	if ($numberOfRows >= 4){
	echo '<a HREF="postcomment.php?pid='. $row['post_id'].'"><small>('. $numberOfRows.')View all comments</small></a>'; }
	}echo '<br /><br />';
	
	$query1  = "SELECT *,
		UNIX_TIMESTAMP() - date_created AS CommentTimeSpent FROM postcomment WHERE post_id=" . $row['post_id'] . " ORDER BY comment_id ASC LIMIT 3";
	$result1 = mysql_query($query1);
	while($row1 = mysql_fetch_assoc($result1))
	{				 
		echo '<br /><div id="comment">';
		$user = $row1['commentby'];
$s = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
$d = mysql_fetch_array($s);
$id = $d['member_id'];

		echo '<img class="framed" height=40 width=40 align="left" SRC="'. $d['image'] .'" alt="'. $row1['firstname'] . " " . $row1['lastname'] .'" />';
		echo '&nbsp;';
		echo '<span class="nn">';
	$id_no = $_SESSION['log']['id_no'];
	$query=mysql_query("SELECT * FROM members WHERE id_no = ".$id_no );
	$user1=mysql_fetch_assoc($query);
	$username=$user1['username'];
$id = $d['member_id'];
if($user == $username){
 echo '<a href="profile.php" style="text-transform: capitalize;">';
		echo $row1['firstname'] . " " . $row1['lastname'] . "</a></span>";
		echo '<br />&nbsp;&nbsp;&nbsp;'; }
elseif($user != $username){
 echo '<a href="userprofile.php?userid=' . $id . '" style="text-transform: capitalize;">';
		echo $row1['firstname'] . " " . $row1['lastname'] . "</a></span>";
		echo '<br />&nbsp;&nbsp;&nbsp;'; }	
		 $position1=30; // Define how many character you want to display.

$content1= $row1['content']; 
$post2 = wordwrap($content1, 8, "\n", true); 
echo '<a style="color: #000;" HREF="postcomment.php?pid='. $row1['post_id'].'">' . $post2 . '</a>';
				 	
	
		echo '<br />';
		echo '&nbsp;';
		echo '<font style="color:#000099;font-size: 10px;">';
						$days2 = floor($row1['CommentTimeSpent'] / (60 * 60 * 24));
						$remainder = $row1['CommentTimeSpent'] % (60 * 60 * 24);
						$hours = floor($remainder / (60 * 60));
						$remainder = $remainder % (60 * 60);
						$minutes = floor($remainder / 60);
						$seconds = $remainder % 60;	
						if($days2 > 0)
							echo date('F d Y', $row1['date_created']);
						elseif($days2 == 0 && $hours == 0 && $minutes == 0)
							echo "few seconds ago";		
						elseif($days2 == 0 && $hours == 0)
							echo $minutes.' minutes ago';
											
		echo '</font>';				
		echo '</div>';
	
	}
	$id_no = $_SESSION['log']['id_no'];
	$query=mysql_query("SELECT * FROM members WHERE id_no = ".$id_no );
	$user1=mysql_fetch_assoc($query);
	$username=$user1['username'];
		$qr = mysql_query("SELECT * FROM members WHERE username='$username'");
echo "<br />";
while($row3 = mysql_fetch_array($qr))
  {  
	echo '<div class="fieldcomment">';
	echo '<form action="friendcommentpost.php" method="GET">'; 
	echo'<input type="hidden" name="post_id" value="'. $row['post_id'] .'">';
	echo'<input type="hidden" name="username" value="'. $row3['username'] .'">';
	echo'<input type="hidden" name="firstname" value="'. $row3['firstname'] .'">';
	echo'<input type="hidden" name="lastname" value="'. $row3['lastname'] .'">';
	echo'<input type="hidden" name="picture" value="'. $row3['image'] .'">';
	echo'<input type="hidden" name="id" value="'. $_GET['userid'] .'">';
	echo '<img class="framed" height=40 width=40 align="left" SRC="'. $row3['image'] .'" alt="'. $row3['firstname'] . " " . $row3['lastname'] .'" />';
	echo '&nbsp;';
	echo '<input type="text" value="Leave a comment" onclick="this.value=\'\'" style="color: #333333; width: 200px;" name="postcomment" />';
	echo '&nbsp;<input type="submit" value="Post" style="background-color: #333; color: #fff; width: 50px;" name="post" />';
	echo '</form></div>';
	echo '</div></li>';
		} 
}
?>
				 <br />
				</ul>
				
			</div><!-- end grid --> 
			
			<div class="sidebar grid_4">
			<div align="left" style="width: 300px; text-transform:capitalize;">
			<div align="center" style="width: 200px;">
<?php  
		$user= $_GET['userid'];
		$qry = mysql_query("SELECT * FROM members WHERE member_id = '$user'") or die (mysql_error()); 
							$show = mysql_fetch_array($qry);	
?> <?
	$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$username = $user1['username'];
	$fname = $show['username'];
	$qry  = "SELECT * FROM friends WHERE username='$username' OR friend='$username'";
	$result = mysql_query($qry);
	$sql = mysql_fetch_assoc($result1);
if($sql == 0){
echo '<div id="add2"><img width=140 height=40 src="images/add.jpg" alt="" /></div>';
}

while($row = mysql_fetch_assoc($result))
{
$fuser = $row['username'];
$userfriend = $row['friend'];
$status = $row['status'];
$fid = $row['friend_id'];
if ($row['friend'] != $username) { $friend = $row['friend']; } else { $friend = $row['username']; }

if($fuser == $username && $userfriend == $fname && $status == 'requesting'){
 echo '<script type="text/javascript">';
 echo '$(document).ready( function() {';
 echo '$("#add2").hide()';
 echo '});';
 echo '</script>';
 
echo '<div id="request">Request Sent</div>';

}
if($fuser == $fname && $userfriend == $username && $status == 'requesting'){
echo '<span style="color:#000099; font-weight: bold;">' . $show['firstname'] . " " . $show['lastname'] . '</span>&nbsp;wants to make friends with you.';
echo '<br /><br /><br />';
 echo '<script type="text/javascript">';
 echo '$(document).ready( function() {';
 echo '$("#add2").hide()';
 echo '});';
 echo '</script>';
echo '<div align="center" id="confirm" style="width: 81px;"><a href="action2.php?accept=' .$fid . '&status=approve" "><img src="images/check.jpg" title="Confirm" width=20 height=20 alt="Confirm" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="action2.php?decline=' .$fid . '&status=decline""><img src="images/ex.jpg" title="Decline" width=20 height=20 alt="Ignore" /></a></div>	'; }
if($friend == $fname && $status = 'accepted'){
 echo '<script type="text/javascript">';
 echo '$(document).ready( function() {';
 echo '$("#add2").hide()';
 echo '});';
 echo '</script>';
echo "<div id='friend'></div>";
}

}


?>
 </div>
 <div id="forms" style="display:none; width: 200px;">
	<form action="addfriend.php?action=add"  method="post">
	<input type="hidden" value="<?php echo $show['username']; ?>" name="friend" />
	<center>
	Make friends with <br /><span style="color: #000099; font-weight:bold; text-transform: capitalize;"><?php echo $show['firstname'] . " " . $show['lastname']; ?></span> ? 
	<br /><br /> 
	<input class="button" name="add" type="submit" id="add" value="OK">
	</center>
	</form></div>

			</div><!-- end sidebar, end grid -->
		</div>
		<!-- end container -->
	<br /><br />
	<br /><br />
	<br /><br />
	</div>
	</div>
	<!-- end footer -->
	<div id="sub_footer">

		<? include("footer.php");?>
	      </div>
</body> 
</html>