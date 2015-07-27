<?php session_start();?>
<!DOCTYPE html >
<html>
<head>
   
	<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
$(document).ready( function() {

	$("#editpic").click( function() {
		$("#forms").fadeIn();
		$("#editpic").fadeOut();
	});	
});
</script>
	<!-- Here is where your page title must go -->
 <?php
include("session/DBConnection.php");
$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
			$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	?>
<title>Canvas <?php echo $display['firstname'] . " " . $display['lastname'] ?> </title>	

<style type="text/css">

</style>
</head>
<?php
include ("session/session.php");
include("session/DBConnection.php");
?>

<body>
<div style="background-image:url(img/background.jpg);height:120px;">
<?
include("member_head.php");
?>
</div>
	<!-- end header -->
	<div style="min-height:400px;background-image:url(img/background.jpg);">
		<div class="container_16 clearfix">
			<div class="grid_11 suffix_1 clearfix" style="border-right: 1px solid #222; width: 600px;">
				<ul class="blog_brief">
				  <li class="entry clearfix">
						<?php 
$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
$image=mysql_query("SELECT * FROM members WHERE username='$user'");
			$row=mysql_fetch_assoc($image);
			$_SESSION['image']= $row['image'];
			
			echo '<img class="framed" width=130 height=150 align="left" SRC="' . $_SESSION['image'] . '" alt="Unable to view" />';
    					
			?><?php  
	$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
		$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
							$result = mysql_fetch_array($query);	
															?>
						<div class="grid_7 omega">
							<h4><a href="profile.php" id="catchy"><?php echo $result['firstname'] . " " . $result['lastname']; ?>
							</a></h4><div id="editpic"><a>Edit Profile Picture</a></div>
							<fieldset id="forms" style="display:none; background: #333; border: 1px solid #fff;">
							 <form action="editpropic.php" method="post" enctype="multipart/form-data"><p><span class="style23">Source:</span>
    <input name="image" type="file" size="30"> 
  </p>
  <br />
 
                       <input name="post" type="submit" class="button"  value="Upload"  />
                
</form>

							</fieldset>
							 				<form id="share" method="get" action="save.php" name="form">
            <label>
              <p>  <?php  
								$id_no = $_SESSION['log']['id_no'];
								$result1=mysql_query("select * from members where id_no='$id_no'");
								$user1 = mysql_fetch_assoc($result1);
								$id = $user1['username'];
		$query = mysql_query("SELECT * FROM members WHERE username = '$id'") or die (mysql_error()); 
							$result = mysql_fetch_array($query);	
															?>
                  <textarea name="content" id="sharetext"  cols="50" rows="1" onClick="this.value='';">Canvas speak out....
                </textarea>
                </p>
               <p>
			   
                  <input name="username" type="hidden" id="namebox" value="<?php echo $result['username']?>"/>
                  <input name="firstname" type="hidden" id="namebox" value="<?php echo $result['firstname']?>"/>
                  <input name="lastname" type="hidden" id="namebox" value="<?php echo $result['lastname']?>"/>
                  <input name="picture" type="hidden" id="namebox" value="<?php echo $result['image']?>"/>
                </p>
			</label>
            <p>
                       <input name="post" class="button" id="speak" type="submit" value="Share" />		
      
            </p>
          </form>
		  <br /><br /><div align="left">
							<div id="basic-modal-content">
                  <form id="form1" method="post" action="profile.php">
                  <p align="left" style="color: gold;">To:
                      <label>
                       <select name="friend" size="0" id="friend">
										  <option>-select friend-</option>
									 <?php
	$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
	$sql  = "SELECT * FROM friends WHERE username='$user' OR friend='$user' AND status = 'accepted'";
$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result))
{
if ($row['friend'] != $user) { $friend = $row['friend']; } else { $friend = $row['username']; }

									?><?php 
									$query  = "SELECT * FROM members WHERE username='$friend'";
									$res = mysql_query($query);
									while($row1 = mysql_fetch_assoc($res))
									{?>
								<option value="<?php if ($row['friend'] != $user) { echo $row['friend']; } else { echo $row['username']; } ?>"><?php echo $row1['firstname'] . " " . $row1['lastname'] ?></option>
										<?php } ?><?php } ?>
								  </select>
                        </label>
                    </p>
					
                  <p align="left" style="color: gold;">Message:
                      <textarea name="content" cols="35" rows="6" id="textarea"></textarea>
                      <br />
                                            <input type="submit"  style="width: 75px; margin-left: 212px; background-color:#333; color:#fff;" name="send" value="Submit" /><br />
                      <input type="reset"  style="width: 75px; margin-left: 212px; background-color:#333; color:#fff;" name="reset" value="Reset" />

                      <br />
                    </p>
                  </form>
                </div></div><div id="divider"></div><div class="box" id="photos" style="margin-left: -148px; margin-bottom: 14px; margin-top: 10px;">
									
<?php
	$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$username = $user1['username'];
$query  = "SELECT * FROM uploads WHERE username = '$username' ORDER BY upload_id DESC LIMIT 4 ";
$result = mysql_query($query);

while($row = mysql_fetch_assoc($result))
{
echo '<a rel="prettyPhoto[gallery]" class="lightbox" HREF="'. $row["image"] .'">';
echo '<img class="framed" height=100 width=100 SRC="'. $row["image"] .'" title="' . $row["image_name"] . '" />';
echo '</a>';
echo '&nbsp;';
}?> <p>&nbsp;</p>
      </div>
														
<?php
$error ="";
if(isset($_POST['send'])){ 
$today = strtotime(date("Y-m-d H:i:s"));
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

</div>			
<?php
$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$username = $user1['username'];
$query  = "SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent FROM post WHERE friend ='$username'  ORDER BY post_id DESC LIMIT 10";
$result = mysql_query($query);

while($row = mysql_fetch_assoc($result))

{				 echo '<li class="entry clearfix" >';
				 echo '<div class="blog_info">';
				
				 echo '<span class="info" style="float: left;">';
$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
$q = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
$dis = mysql_fetch_array($q);
$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
$id = $dis['member_id'];
if($user == $username){
				 echo '<a href="profile.php" style="text-transform: capitalize;">';
				 echo $row['firstname'] . " " . $row['lastname'] . '</a>'; }
				elseif($user != $username){
				 echo '<a href="userprofile.php?userid=' . $id . '" style="text-transform: capitalize;">';
				 echo $row['firstname'] . " " . $row['lastname'] . '</a>'; }

				 echo '&nbsp;says that..</span>';
				 echo '<div class="clear"></div>';
				 echo '</div>';
				 echo '<img class="framed" height=100 width=80 align="left" SRC="'. $row['picture'] .'" alt="'. $row['firstname'] . " " . $row['lastname'] .'" />';
				 echo '<div class="grid_7 omega">';
 $position=30;

$content= $row['content']; 


				 echo '<p style="color: #000;"><a style="color: #000;" HREF="postcomment.php?pid='. $row['post_id'].'">' . wordwrap($content, 8, "\n", true) . '</a></p><br />';
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
		echo '<br /><div style="color: #222">';
		$user = $row1['commentby'];
$s = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
$d = mysql_fetch_array($s);
$id = $d['member_id'];

		echo '<img class="framed" height=40 width=40 align="left" SRC="'. $row1['picture'] .'" alt="'. $row1['firstname'] . " " . $row1['lastname'] .'" />';
		echo '&nbsp;';
		echo '<span class="nn">';
		$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$username = $user1['username'];
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
echo '<a style="color: #222;" HREF="postcomment.php?pid='. $row1['post_id'].'">' . wordwrap($content1, 8, "\n", true) . '</a>';
				 	
	
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
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
		$qr = mysql_query("SELECT * FROM members WHERE username='".$user."'");
echo "<br />";
while($row3 = mysql_fetch_array($qr))
  {  
	echo '<div class="fieldcomment">';
	echo '<form action="commentpost.php" method="GET">'; 
	echo'<input type="hidden" name="post_id" value="'. $row['post_id'] .'">';
	echo'<input type="hidden" name="username" value="'. $row3['username'] .'">';
	echo'<input type="hidden" name="firstname" value="'. $row3['firstname'] .'">';
	echo'<input type="hidden" name="lastname" value="'. $row3['lastname'] .'">';
	echo'<input type="hidden" name="picture" value="'. $row3['image'] .'">';
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
				<!-- end blog -->
			</div><!-- end grid --> 
			
			<div class="sidebar grid_4">
			<div align="left" style="width: 300px;">
       <a href="profile.php" id="cap"><?php echo $display['firstname']?> <?php echo $display['lastname']?></a>
	   &nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php">Logout</a></div><br />
		
<div align="left" style="height: auto; width: 230px; overflow:auto;">
				
      <div style="font-weight:bold; color: #FFFFFF; background: #000000; width: 210px; height: 20px; border: 1px solid #666666;">Latest Updates</div>
	  <div class="separator_1"></div>
	 
  <?php 
$result = mysql_query("SELECT * FROM updates WHERE status !='' ORDER BY RAND() LIMIT 5");
while($row = mysql_fetch_array($result))
{
$mem_id = $row['member_id'];
$friend = $row['friend'];
$image = $row['image'];
			$query = mysql_query("SELECT * FROM members WHERE member_id = '$mem_id'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);
echo "<span style='text-transform: capitalize;'>";
$_SESSION['image']= $display['image'];	
echo '<img class="" width=20 height=20 align="left" SRC="' . $_SESSION['image'] . '" alt="Unable to view" />';
echo "&nbsp;" . $display['firstname'] . "&nbsp;". $display['lastname'] . "</span>";
echo "&nbsp;";
echo $row['status'];
if($row['status']=="changed profile picture."){
echo "<br />";		
echo '<img width=40 height=40 align="left" SRC="' . $image . '" alt="Unable to view" />';
echo "&nbsp;". $row['date']."<br />";
}
elseif($row['status']=="just uploaded a photo."){
echo "&nbsp;". $row['date'];
echo "<br />";

}
elseif($row['friend']!=""){
echo "<span style='text-transform: capitalize;'>". $row['friend']."</span><br />";
}
echo "<br /><br />--------------------------------------<br />";
}
?>

				</div><!-- Cols 1 -->
<!-- /Cols 1 -->
<?php
include("session/DBConnection.php");
$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
			$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	?>
 <?php
$id_no = $_SESSION['log']['id_no'];
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
  echo '</div></a>';
  echo '</div>';
  echo '<br />';	
   } 
   ?>
			</div><!-- end sidebar, end grid -->
		</div><!-- end container -->
	</div><!-- end content -->
	<!-- end footer -->
<div>

		<? include("footer.php");?>
	      </div>
		  
		
	</body> 
</html>
