<?php session_start();?>
<html>
<head>

 <?php
include("session/DBConnection.php");
$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
			$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	?>
<title>Canvas - <?php echo $display['firstname'] . " " . $display['lastname'] ?> </title>	
	
<link href="css/forums.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready( function() {
	$("#reply").click( function() {
		$("#forms").fadeIn();
		$("#reply").fadeOut();
	});	
});
</script>
	<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />

  
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/basic.js'></script>

</head>
<?php
include("session/DBConnection.php");
include("session/session.php");
$error = "";
?>
<body>
<div style="height:120px;background-image:url(img/background.jpg)">
<?
  include("member_head.php");
?>
</div>
<div style="margin-top:0px; height:542px;width:65%;margin-left:220px;background-image:url(img/background.jpg);">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
  <div style="height:542px;">
    <div class="table_title">
	<?php
	 $id = $_GET['fid'];
 $result1 = mysql_query("SELECT * FROM forum_reply WHERE forum_id=$id");
	
	$numberOfRows = MYSQL_NUMROWS($result1);	
	if($numberOfRows > 0){
echo '<font size="2" color="#fff"><b>' . $numberOfRows .' Reply</b></font>';} 
	?>
</div>
    <div class="table_con" style="background-image:url(img/background.jpg); height:330px; overflow: scroll;color:#bbb">
	
	<?php
$fid = $_GET['fid'];
$id = $display['member_id'];
$query  = "SELECT * FROM forums WHERE forum_id='$fid'";
$result = mysql_query($query);

while($row = mysql_fetch_assoc($result)) {
 echo '&nbsp;<span style="color: #000066; font-weight: bold;">'.$row['title'].'</span>';
 echo '&nbsp;&nbsp;<span style="margin-left: 300px; color:#333;">Author: </span>';
 $user = $row['authors_id'];
 
 $query = mysql_query("SELECT * FROM members WHERE member_id = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);
 echo '<span style="text-transform: capitalize; color: BLUE; font-weight: bold;">';
 echo $display['firstname']. " " . $display['lastname'];
 echo '</span>&nbsp;&nbsp;<span style="color: #333;">'. $row['date'] . '</span><br/><span style="color: blue; font-weight:bold; padding-left: 20px;">'.$row['content']. '</span><br />';

$query1  = "SELECT * FROM forum_reply WHERE forum_id='$fid' ORDER BY reply_id ASC";
$result1 = mysql_query($query1);

while($row = mysql_fetch_assoc($result1)) {
$uid = $row['poster_id'];
$query2  = "SELECT * FROM members WHERE member_id='$uid'";
$result2 = mysql_query($query2);

while($row2 = mysql_fetch_assoc($result2)){

 echo "<div style='border-top: 1px solid #000;'><span style='color:#333;padding-left: 350px;'>Posted By: </span>&nbsp;<span style='color:blue; text-transform: capitalize;'>" .$row2['firstname']." " . $row2['lastname']."</span>&nbsp;<span style='color: #333;'>". $row['date']. "</span><br /><br />&nbsp;&nbsp;<span style='color: blue;'>".$row['reply']."</span></div><br />";}
}}?>
<div style="color:black;" id="reply"><br /><br /><strong>Reply</strong></div>

<div id="forms" style="display:none">
<form action="save_reply.php" method="GET">
<table>
<tr><td><textarea name="reply_post"></textarea></td></tr>
<tr><td><input type="submit" name="submit" value="Post" /></td></tr>
<input type="hidden" name="poster_id" value="<?php echo $id; ?>" />
<input type="hidden" name="forum_id" value="<?php echo $fid; ?>" />
</table>
</form>
</div>

</div>
<div class="table_title"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="44%">List of Categories</td>
    <td width="15%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
	<td width="35%"><div id='basic-modal'><a class='basic' href="#" style="text-decoration:none; color: fff;"><img src="images/add_thread.png" width="20" height: "20" style="border: none;"/>Add New Thread</a></div></td>
	
  </tr>
</table>
  <div id="basic-modal-content">
	  <form method="post" action="save_forums.php"><br /><br /><br />
  			<span style="color: #FFFF00; font-size: 18px; font-weight: bold;">Category: </span>
			
						<span style="color: #FFFF00; font-size: 18px; font-weight: bold;">Topic: <input type="text" name="title"/></span><br /><br />
						<span style="color: #FFFF00; font-size: 18px; font-weight: bold;">Content: <textarea name="content" style="width: 250px;"></textarea></span><br />
						<br /><p>
				 <br />
						<input type="submit"  style="width: 75px; margin-left: 212px; background-color:#333; color:#fff;" name="submit" value="Add" /><br /><br />
                      <input type="reset"  style="width: 75px; margin-left: 212px; background-color:#333; color:#fff;" name="reset" value="Reset" />
                     
				  </p>
			  </form>
		    </div>
</div>
    <div class="table_con">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="9%" align="center" valign="middle" style="background-color:#999999;">
	<img src="images/image_18.jpg" alt="Folder" width="19" height="17" align="absmiddle" /></td>
    <td width="50%" style="background-color:#999999;">
    <span class="style1"><a href="categories.php?action=2009">2009</a></span></td>
    <td width="9%" align="center" style="background-color:#999999;" class="style5"><?php
$id_no =$_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
$result = mysql_query("SELECT * FROM forums WHERE category='2009'");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	if($numberOfRows > 0){
	echo '<font size="2" color="red"><b>' . $numberOfRows .'</b></font>';} 
	?></td>
    
  </tr>
  <tr>
    <td width="9%" align="center" valign="middle" style="background-color:#999999;"><img src="images/image_18.jpg" alt="Folder" width="19" height="17" align="absmiddle" /></td>
    <td width="50%" style="background-color:#999999;">
    <span class="style1"><a href="categories.php?action=2010">2010</a></span></td>
    <td width="9%" align="center" style="background-color:#999999;" class="style5"><?php
$id_no =$_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
$result = mysql_query("SELECT * FROM forums WHERE category='2010'");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	if($numberOfRows > 0){
	echo '<font size="2" color="red"><b>' . $numberOfRows .'</b></font>';} 
	?></td>
   
   
  <tr>
    <td width="9%" align="center" valign="middle" style="background-color:#999999;"><img src="images/image_18.jpg" alt="Folder" width="19" height="17" align="absmiddle" /></td>
    <td width="50%" style="background-color:#999999;">
    <span class="style1"><a href="categories.php?action=2011">2011</a></span></td>
    <td width="9%" align="center" bgcolor="#999999" class="style5"><?php
$id_no =$_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
$result = mysql_query("SELECT * FROM forums WHERE category='2011'");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	if($numberOfRows > 0){
	echo '<font size="2" color="red"><b>' . $numberOfRows .'</b></font>';} 
	?></td>
  
    
  </tr>
  <tr>
    <td width="9%" align="center" valign="middle" style="background-color:#999999;"><img src="images/image_18.jpg" alt="Folder" width="19" height="17" align="absmiddle" /></td>
    <td width="50%" style="background-color:#999999;">
    <span class="style1"><a href="categories.php?action=2012">2012</a></span></td>
    <td width="9%" align="center" bgcolor="#999999" class="style5"><?php
$id_no =$_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
$result = mysql_query("SELECT * FROM forums WHERE category='2012'");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	if($numberOfRows > 0){
	echo '<font size="2" color="red"><b>' . $numberOfRows .'</b></font>';} 
	?></td>
  </tr>
</table>
</div>
  </div>
</tr>
</table>
</div>
</div>
<div>

		<? include("footer.php");?>
	      </div>
</body>
</html>

