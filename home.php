<?php session_start();?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link rel="stylesheet" type="text/css" href="css/divbelow.css" />
<link rel="stylesheet" type="text/css" href="css/chatlayout.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/ppic.css" />	
	<!-- Here is where your page title must go -->
 <?php
include("session/DBConnection.php");
$id_no = $_SESSION['log']['id_no'];
	$query=mysql_query("SELECT * FROM members WHERE id_no = ".$id_no );
	$user1=mysql_fetch_assoc($query);
	$user=$user1['username'];
			$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	?>
<title>Canvas - <?php echo $display['firstname'] . " " . $display['lastname'] ?> </title>	
	
<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
</head>
<?php
include ("session/session.php");
include("session/DBConnection.php");
?>
<body background="img/background.jpg">
<div style="height:120px;width:100%;background-image:url(img/background.jpg)">
<?
  include("home_header.php");
?>
</div>
<div style="min-height:400px;background-image:url(img/background.jpg);">
		<div class="container_16 clearfix">
			<div class="grid_11 suffix_1 clearfix">
				<ul class="blog_brief">
				  <li class="entry clearfix">
<?php
$id_no = $_SESSION['log']['id_no'];
	$query=mysql_query("SELECT * FROM members WHERE id_no = ".$id_no );
	$user1=mysql_fetch_assoc($query);
	$user=$user1['username'];
$image=mysql_query("SELECT * FROM members WHERE username='$user'");
			$row=mysql_fetch_assoc($image);
			$_SESSION['image']= $row['image'];
			echo '<img class="grid_4 alpha blog_img framed" SRC="' . $_SESSION['image'] . '" alt="Unable to view" />';
    		
?>
<?php  
		$id_no = $_SESSION['log']['id_no'];
	$query=mysql_query("SELECT * FROM members WHERE id_no = ".$id_no );
	$user1=mysql_fetch_assoc($query);
	$user=$user1['username'];
		$query = mysql_query("SELECT * FROM members WHERE username = '$user' and id_no='$id_no'") or die (mysql_error()); 
							$result = mysql_fetch_array($query);	
															?>
						<div class="grid_7 omega">
							<h4><a href="profile.php" id="catchy"><?php echo $result['firstname'] . " " . $result['lastname']; ?></a></h4>
							<p><span style="color: #000099"><?php echo date("M  d, 20y"); ?></span>&nbsp;&nbsp;Login as <span id="type"><?php echo $result['type']?></span> </p>
							<br />
							
							
							
<?php
							
$message= $row['quote']; 
$post3 = wordwrap($message, 8, "\n", true);
?>  
<div id="status">
						<div id="quotes"><br /><?php echo '<span style="padding-left: 35px; padding-top: 100px;">' . $post3 ."...</span.";?></div>
						<b style="padding-left:300px;">
 <a href="edit.php?height=250&width=300&modal=true" class="thickbox" title="Quote for the day"><strong>EDIT</strong></a></b><br/>
						<br /></div>
					

</div>
<br />


<?php
	$id_no = $_SESSION['log']['id_no'];
	$query=mysql_query("SELECT * FROM members WHERE id_no = ".$id_no );
	$user1=mysql_fetch_assoc($query);
	$user=$user1['username'];
	$sql  = "SELECT * FROM friends WHERE username='$user' OR friend='$user' AND status = 'accepted'";
$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result))
{

echo '<br /><div >';

if ($row['friend'] != $user) { $friend = $row['friend']; } else { $friend = $row['username']; }

$query  = "SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent FROM post WHERE (username = '$friend' OR username = '$user') ORDER BY post_id DESC LIMIT 5";
$result = mysql_query($query);

while($row = mysql_fetch_assoc($result))

{				 echo '<li class="entry clearfix">';
				 echo '<div class="blog_info" style="width: 580px;">';
				 /*echo '<span class="date"></span>';*/
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

				 echo '&nbsp;&nbsp;&nbsp;posted..</span>'.'<br />'.'<br />';
				 echo '<div class="clear"></div>';
				 echo '</div>';
				 echo '</br>';
				 echo '<img class="framed" height=100 width=80 align="left" SRC="'. $dis['image'] .'" alt="'. $row['firstname'] . " " . $row['lastname'] .'" />';}

				elseif($user != $username){
				 echo '<a href="userprofile.php?userid=' . $id . '" style="text-transform: capitalize;">';
				 echo $row['firstname'] . " " . $row['lastname'] . '</a>'; 

				 echo '&nbsp;&nbsp;&nbsp;posted..</span>'.'<br />'.'<br />';
				 echo '<div class="clear"></div>';
				 echo '</div>';
				 echo '<img class="framed" height=100 width=80 align="left" SRC="'. $dis['image'] .'" alt="'. $row['firstname'] . " " . $row['lastname'] .'" />'; }
				 echo '<div class="grid_7 omega">';
 
$content= $row['content']; 

				 echo '<p style="color: #000;"><a style="color: #000;" HREF="postcomment.php?pid='. $row['post_id'].'">' . wordwrap($content, 8, "\n", true) . '</a></p><br />';
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
				 echo '<span style="font-size: 10px; text-transform: capitalize;">' .$row['friend_firstname'] . " " . $row['friend_lastname'] . '</span></a>'; }
				elseif($row['friend'] != $username){
				 echo '<a href="userprofile.php?userid=' . $gwa['member_id'] . '">';
				 echo '<span style="text-transform: capitalize; font-size: 10px;"">' .$row['friend_firstname'] . " " . $row['friend_lastname'] . '</span></a>'; }
				 echo '<div class="clear"></div>';
				 echo '</div>';
				 echo '<img class="framed" height=100 width=80 align="left" SRC="'. $dis['image'] .'" alt="'. $row['firstname'] . " " . $row['lastname'] .'" />';
				 echo '<div class="grid_7 omega">';
$str= $row['content']; 
$post = wordwrap($str, 8, "\n", true);

				 echo '<p style="color: #000;"><a style="color: #000;" HREF="postcomment.php?pid='. $row['post_id'].'">' . $post . '</a></p><br />';
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
		UNIX_TIMESTAMP() - date_created AS CommentTimeSpent FROM postcomment WHERE post_id=" . $row['post_id'] . " ORDER BY date_created ASC LIMIT 3";
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
$content1= $row1['content']; 
$post1 = wordwrap($content1, 8, "\n", true); 
echo '<a style="color: #222;" HREF="postcomment.php?pid='. $row1['post_id'].'">' . $post1 . '</a>';
				 	
	
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
	$user=$user1['username'];
		$qr = mysql_query("SELECT * FROM members WHERE username='$user'");
echo "<br />";
while($row3 = mysql_fetch_array($qr))
  {  
	echo '<div class="fieldcomment">';
	echo '<form action="postcommenthome.php" method="GET">'; 
	echo'<input type="hidden" name="post_id" value="'. $row['post_id'] .'">';
	echo'<input type="hidden" name="username" value="'. $row3['username'] .'">';
	echo'<input type="hidden" name="firstname" value="'. $row3['firstname'] .'">';
	echo'<input type="hidden" name="lastname" value="'. $row3['lastname'] .'">';
	echo'<input type="hidden" name="picture" value="'. $row3['image'] .'">';
	echo '<img class="framed" height=40 width=40 align="left" SRC="'. $row3['image'] .'" alt="'. $row3['firstname'] . " " . $row3['lastname'] .'" />';
	echo '&nbsp;';
	echo '<input type="text" value="Leave a comment" onclick="this.value=\'\'" style="color: #333333; width: 200px;" name="postcomment" />';
	echo '&nbsp;<input type="submit" value="Post" style="background-color: #333; color: #bbb; width: 50px;" name="post" />';
	echo '</form></div>';
	echo '</div></li>';
		} 
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
		
			  <br />
			  <div align="left" style="width: 220px; overflow:auto;">
				
      <div style="font-weight:bold; color: #bbbFFF; background: #000000; width: 210px; height: 20px; border: 1px solid #666666;">Latest Updates</div>
<br />
  <?php
  include("session/DBConnection.php");
$result = mysql_query("SELECT * FROM updates WHERE status !='' ORDER BY RAND() LIMIT 6");
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

				</div>
 
</div>

</div>

<!-- Cols 1 -->
<!-- /Cols 1 -->

			</div><!-- end sidebar, end grid -->
		</div><!-- end container -->
	<!-- end content -->
	<!-- end footer -->
<div id="sub_footer">

		<? include("footer.php");?>
	      </div>
		  
</body> 
</html>
