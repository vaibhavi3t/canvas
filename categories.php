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

<div style="margin-top:0px; height:542px;width:65%;margin-left:220px;background-color:#999999;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
  <div >
    <div class="table_title">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%">
	<?php echo $_GET['action'];?> </td>
    
  </tr>
</table>
</div>
    <div class="table_con" style="overflow:scroll; height: 332px;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	 <?php  $cat = $_GET['action'];
			$result = mysql_query("SELECT * FROM forums WHERE category= '$cat' ORDER BY forum_id DESC");

while($row = mysql_fetch_assoc($result)) {

  echo '<tr>';
  echo '<td width="9%" align="center" valign="middle" style="background-color:#999999">
  <img src="images/image_18.jpg" alt="Folder" width="19" height="17" align="absmiddle" /></td>';
  echo '<td width="50%" style="background-color:#999999">';
  echo '<span class="style1"><a href="reply_forum.php?fid='.$row['forum_id'].'" style="text-decoration: none;">'. $row['title']. '</span></td>';
  echo '</tr>';
 }?>
 
</table>
</div>
<div class="table_title"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="44%">List of Categories</td>
    <td width="15%">&nbsp;</td>
	<td width="20%">&nbsp;</td>
	<td width="35%"><div id='basic-modal'><a class='basic' href="#" style="text-decoration:none; color: #fff;"><img src="images/add_thread.png" width="20" height: "20" style="border: none;"/>Add New Thread</a></div></td>
	
  </tr>
</table>
  <div id="basic-modal-content">
	  <form method="post" action="save_forums.php"><br /><br /><br />
  			<span style="color: #FFFF00; font-size: 18px; font-weight: bold;">Category: <select name="category">
			<option selected="selected">Select Category</option>
  			  <option value="2009">2009</option>
  			  <option value="2010">2010</option>
  			  <option value="2011">2011</option>
  			  <option value="2012">2012</option>

  			</select></span>
			
						<span style="color: #FFFF00; font-size: 18px; font-weight: bold;">Topic: <input type="text" name="title"/></span><br /><br />
						<span style="color: #FFFF00; font-size: 18px; font-weight: bold;">Content: <textarea name="content" style="width: 250px;"></textarea></span><br />
						<br /><p>
				 <br />
						<input type="submit"  style="width: 75px; margin-left: 212px; background-color:#333; color:#fff;" name="submit" value="Add" />
						<br /><br />
                      <input type="reset"  style="width: 75px; margin-left: 212px; background-color:#333; color:#fff;" name="reset" value="Reset" />
                     
				  </p>
					</form>
					 </div>
</div>
    <div class="table_con"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="9%" align="center" valign="middle" style="background-color:#999999">
	<img src="images/image_18.jpg" alt="Folder" width="19" height="17" align="absmiddle" />
	</td>
    <td width="50%" style="background-color:#999999">
    <span class="style1"><a href="categories.php?action=2009">2009</a></span></td>
    <td width="9%" align="center" style="background-color:#999999" class="style5"><?php
	$id_no =$_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
	$result = mysql_query("SELECT * FROM forums WHERE category='BSIS 4A'");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	if($numberOfRows > 0){
	echo '<font size="2" color="red"><b>' . $numberOfRows .'</b></font>';} 
	?></td>
    
  </tr>
  <tr>
    <td width="9%" align="center" valign="middle" style="background-color:#999999"><img src="images/image_18.jpg" alt="Folder" width="19" height="17" align="absmiddle" /></td>
    <td width="50%" style="background-color:#999999">
    <span class="style1"><a href="categories.php?action=2010">2010</a></span></td>
    <td width="9%" align="center" bgcolor="#999999" class="style5"><?php
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
    <td width="9%" align="center" valign="middle" style="background-color:#999999"><img src="images/image_18.jpg" alt="Folder" width="19" height="17" align="absmiddle" /></td>
    <td width="50%" style="background-color:#999999">
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
    <td width="9%" align="center" valign="middle" style="background-color:#999999"><img src="images/image_18.jpg" alt="Folder" width="19" height="17" align="absmiddle" /></td>
    <td width="50%" style="background-color:#999999">
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
</body>
</html>

