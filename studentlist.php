<?php session_start();?>
<!DOCTYPE html >
<html >
<head>

 <?php
include("session/DBConnection.php");
$id_no = $_SESSION['log']['id_no'];
			$query = mysql_query("SELECT * FROM members WHERE username = '$id_no'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	?>
<title>Canvas - Administrator </title>	
<link rel="shortcut icon" HREF="images/favicon.ico" />
	

	<link href="admin_css/styles.css" rel="stylesheet" type="text/css" media="all" />
	<link href="admin_css/violine.css" rel="stylesheet" type="text/css" media="all" />

</head>
<?php include("session/DBConnection.php");
include("session/session.php");
$error ="";
?>
<body>

<?php 
include("admindata.php");
?>

<!-- /Cols > 1 -->
<table width="717" border="1">
  <tr style="background: #333; border: 1px solid #331;color:#fff; font-weight: bold;">
    <td><strong>&nbsp;Students List </strong></td>
	<td><strong>&nbsp;User Profile </strong></td>
	<td><strong>&nbsp;User Status </strong></td>
  </tr>
  <tr>
    <td style="border-left: 1px solid #333; border-right: 1px solid #333; border-bottom: 1px solid #333;"><?php
$result = mysql_query("SELECT * FROM members WHERE confirmation = '0' AND type = 'Student' ORDER BY member_id DESC LIMIT 5");
while($row = mysql_fetch_array($result))
  {
  echo '<div align="left" class="style46" style="padding-left: 20px; ">';
  echo '&nbsp;';
 echo '<a href=studentlist.php?id=' . $row["member_id"] . '>';
 echo '<img style="padding-top: 15px; border-width: 0px; margin-left: 20px;" align="left" width=50 height=50 alt="Unable to View" src="' . $row["image"]. '">';
 echo '<br />&nbsp;&nbsp;<span style="text-transform:capitalize; text-decoration: none;">';
 echo $row['firstname'] . " " . $row['lastname'] . '</span>';
  echo '</a><br />&nbsp;';
  echo '</div>';
  echo '<br />';		
  }
?>		</td>
    <td width="327" style="border-left: 1px solid #333; border-right: 1px solid #333; border-bottom: 1px solid #333;"><?php
	if(isset($_GET['id'])){
$id = $_GET['id'];
$result = mysql_query("SELECT * FROM members WHERE member_id = '$id'");
while($row = mysql_fetch_array($result))
  { ?>
   <form id="basic-modal" action="studentlist.php?id=<?php echo $_GET['id'] ?>" method="post">
    <?php 
  echo '<br />';
  echo '<div align="left" style="padding-left: 5px; line-height: 1.5em;">';
  echo '<span style="text-transform:capitalize; font-weight: bold; font-size: 20px;">';
  echo $row['firstname'] . " " . $row['lastname'] . "</span>" . "'s Profile"  ."<br />";
  echo '<span style="color: #ffff00;">ID_no : </span>' . $row['id_no'] . "<br />";
  echo '<span style="color: #ffff00;">Firstname : </span>' .$row['firstname'] . "<br />";
  echo '<span style="color: #ffff00;">Lastname : </span>' . $row['lastname'] . "<br />";
  echo '<span style="color: #ffff00;">Course : </span>' . $row['course'] . "<br />";
  echo '<span style="color: #ffff00;">Yr and sec : </span>' . $row['yr_sec'] . "<br />";
  echo '</div>';
  echo '<br />';		
?>
                <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id" />
                &nbsp;
				<input type="submit" value="Confirm" name="confirm" />
                &nbsp;
                <input type="submit" value="Decline" name="decline" />
				&nbsp;
                <input type="submit" value="Remove" name="delete" />
              </form>
              <br />
		    <?php } } ?>
			<?php if (isset($_POST['confirm'])){
$id = $_GET['id'];
$result = mysql_query("SELECT * FROM members WHERE member_id = '$id'");

while($row1 = mysql_fetch_array($result))
  { 
echo '<div style="border:1px solid #333; float:left;">
<form action="approvestud.php?id='. $id. '" method="post" style="background-color: #333;">
&nbsp&nbsp;&nbsp;&nbsp;
<label>To : &nbsp;<br />
<input name="email" type="text" id="subject" value="' . $row1['email'] . '"/>
</label>
<br />
&nbsp&nbsp;&nbsp;
<label>Subject : &nbsp;<br />
<input name="subject" type="text" id="subject" value="canvas" />
<input name="type" type="hidden" id="subject" value="' . $row1['type']. '" />
</label>
<br />
<label>Message : &nbsp;<br />
<textarea name="content" cols="45" rows="6" id="textarea">
Welcome to Canvas.
YOu can now access your account..please CLick the link below to login to Canvas..


Have fun..</textarea>
<br />
<br />
<input type="submit" name="send" value="Send" />
<a href="studentlist.php"><input type="submit" name="cancel" value="Cancel" /></a></label>
</label>
</form>';
$con = '1';
$query = "Update members SET confirmation = '$con' WHERE member_id = '$id'";

if (empty($id)) {

$error = "Error: Please fill up Member_id!"; }

if (empty($error)) {

mysql_query($query) or die('Error, insert query failed');
}

if (empty($error)) { $error = "Member Confirmed!"; }

}
} 

?>
<?php
if(isset($_POST['delete'])){
$del_id = $_POST['id'];
$sql = "DELETE FROM members WHERE member_id='$del_id'";
$result = mysql_query($sql);
echo "Member deleted.";
echo "<a href='studentlist.php'><input type='submit' value='OK' name='ok' /></a>";
}
?>
<?php if (isset($_POST['decline'])){
$id = $_GET['id'];
$result = mysql_query("SELECT * FROM members WHERE member_id = '$id'");

while($row1 = mysql_fetch_array($result))
  { 
echo '<div style="border:1px solid #333; float:left;">
<center style="font-size: 20px;"><br />Confirmation Message</center><br />
<form action="denystud.php?id='. $id. '" method="post" style="background-color: #333;">
&nbsp&nbsp;&nbsp;&nbsp;
<label>To : &nbsp;<br />
<input name="email" type="text" id="subject" value="' . $row1['email'] . '"/>
</label>
<br />
&nbsp&nbsp;&nbsp;
<label>Subject : &nbsp;<br />
<input name="subject" type="text" id="subject" value="canvas" />
<input name="type" type="hidden" id="subject" value="' . $row1['type']. '" />
</label>
<br />
<label>Message : &nbsp;<br />
<textarea name="content" cols="45" rows="6" id="textarea">
Sorry!!
You can not create an account at Canavas..
Please make sure you input the correct details!!
Thank You!</textarea>
<br />
<br />
<input type="submit" name="send" value="Send" />
<a href="studentlist.php"><input type="submit" name="cancel" value="Cancel" /></a></label>
</form>';
$con = '0';
$query = "Update members SET confirmation = '$con' WHERE member_id = '$id'";

if (empty($id)) {

$error = "Error: Please fill up Member_id!"; }

if (empty($error)) {

mysql_query($query) or die('Error, insert query failed');
}

if (empty($error)) { $error = "Member Confirmed!"; }

}
} 
echo '</div>';
?>
			</td>
   <td width="160" style="border-left: 1px solid #333; border-right: 1px solid #333; border-bottom: 1px solid #333;">
	<?php
if(isset($_GET['id'])){
$id = $_GET['id'];
$result = mysql_query("SELECT * FROM members WHERE member_id = '$id'");

while($row1 = mysql_fetch_array($result))
  {
   $id_no = $row1['id_no'];
    $results="SELECT * FROM students WHERE id_no = '$id_no' "; 
    $result=mysql_query($results);
	if(mysql_num_rows($result) <= 0)
{
    echo "<span class='style4'>Invalid User!</span>";
}
   else {

			  while($row2=mysql_fetch_array($result)){
			  
			  if(($row1['firstname']==$row2['firstname'])&&($row1['lastname']==$row2['lastname'])&&($row1['id_no']==$row2['id_no'])){
			  echo "<span class='style4'><br /><br /><center>Valid User!</center></span>";
			   }  
			   else {
			   echo "<span class='style4'><br /><br /><center>Invalid User!</center></span>"; }
} 
}
}
}?>   </td>
  </tr>
</table>

<!-- /Cols > 3 -->
<br class="clear" />
    
</div>
   
</div>



</body>
</html>