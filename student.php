<?php session_start();?>
<!DOCTYPE html >
<html >
<head>

<title>Canvas Administrator </title>	


	<link href="admin_css/styles.css" rel="stylesheet" type="text/css" media="all" />
	<link href="admin_css/violine.css" rel="stylesheet" type="text/css" media="all" />
		

</head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready( function() {

	$("#addnew").click( function() {
		$("#formadd").fadeIn();
	});	
	
	$("#edit2").click( function() {
		$("#form2").fadeIn();
	});	
});
</script>

<?php include("session/DBConnection.php");
include("session/session.php");
$error ="";
?>
<body>
<?
 include("admindata.php");
?>

<!-- /Cols > 1 -->
 <div class="col_3 design">
<div align="left" >

<table width="800" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td align="left" style="background: #333; border: 1px solid #331;color:#fff; font-weight: bold; width: 400px;"><strong>&nbsp;Student Members</strong></td>
</tr>

<tr>
<?php
$result = mysql_query("SELECT * FROM members WHERE confirmation = '1' AND type = 'Student' ORDER BY firstname ASC LIMIT 15");
while($row = mysql_fetch_array($result))
{?>
<td align="center" bgcolor="#FFFFFF" width="250"><a href="memberinfo2.php?id=<?php echo $row["member_id"]; ?>" valign="top"><img style="padding-top: 15px; border-width: 0px; margin-left: 20px;" align="left" width=50 height=50 alt="Unable to View" src="<?php echo $row["image"]; ?> "></a><br />
  &nbsp;<span style="text-transform:capitalize; margin-right: 600px; text-decoration: none;"><a href="memberinfo2.php?id=<?php echo $row["member_id"]; ?>" valign="top"><?php echo $row['firstname'] . " " . $row['lastname']; ?></a></span></td>
</tr>

<?php
}

?>
</table><br />
<div style="border: 1px solid #333; width: 481px; height: 400px; margin-top: -392px; margin-left: 280px; background-color: #333">
<div><span style="color: #FFFF00; font-size: 14px; font-weight: bold; padding-left: 200px;">Maintenance</span><br />
 <br /><span style="padding-left: 30px; "><input style="background-color:#FFFFCC; border: 1px solid #333; width: 160px;" id="addnew" name="addnew" type="button" value="Add New Student" />&nbsp;&nbsp;
 <div align="right">
 <form action="student.php" method="post" style="width: 300px; margin-top: -25px; padding-right:10px;">
 <input type="text" name="id_no" value="Enter ID No." onclick="this.value='';" />
 &nbsp; <input name="search" type="submit" value="Search" /></form>
 <?php 
			  if(isset($_POST['search'])){ 
			  $id_no = $_POST['id_no'];
			  $results="SELECT * FROM students WHERE id_no = '$id_no' "; 
    $result=mysql_query($results);
	if(mysql_num_rows($result) <= 0)
{
    echo '<div align="left" style="margin-left: 200px; margin-top: 100px; font-size: 18px;">No results</div>';
	echo '<div align="left" style="margin-left: 200px; margin-top: 50px; font-size: 18px;"><a href="student.php"><input type="submit" value="OK" name="OK" /></a></div>';
} else {

			  while($row=mysql_fetch_array($result)){ 
			 ?><div align="left">
			 <ul>
			 <br />
			 <span class='style29'>Firstname:  </span><span class='style28' style='padding-left:10px;'><?php echo $row["firstname"]; ?></span><br />
			 <span class='style29'>Lastname:  </span><span class='style28' style='padding-left: 10px;'><?php echo $row['lastname']; ?></span><br />
			<span class='style29'>Course:  </span><span class='style28' style='padding-left: 28px;'><?php echo $row['course']; ?></span><br />
			 <span class='style29'>Yr & Sec:  </span><span class='style28' style='padding-left: 18px;'><?php echo $row['yr_sec']; ?></span><br /><br />
			
			 <form method="post" action="student.php">
			<input type="hidden" value=<?php echo $row['id_no']; ?> name="id_no" />
<a href="student.php?action=edit&id=<?php echo $row['student_id']; ?>"><input type="submit" value="Edit" style="background-color:#F7F8D6; font-weight: bold; border: 1px solid #333; width: 100px;" /></a>
<input type="submit" name="delete" value="Delete" style="background-color:#F7F8D6; font-weight: bold; border: 1px solid #333; width: 100px;" />
<a href="student.php"><input type="submit" value="Cancel" style="background-color:#F7F8D6; font-weight: bold; border: 1px solid #333; width: 100px;" /></a>

			 </form>
			 </ul> 
			  </div><?php
} 
}
}
if(isset($_POST['delete'])){
$id_no = $_POST['id_no'];
$sql = "DELETE FROM students WHERE id_no='$id_no'";
$result = mysql_query($sql);
}

		?> 
 </div>
 </span><br />
&nbsp;<?php
					include('session/DBConnection.php');
										
					if (isset($_POST['add'])) { 
					if (!$_POST['id_no']|
					!$_POST['firstname']|
					!$_POST['lastname']|
					!$_POST['gender']|
					!$_POST['course']|
					!$_POST['yr_sec']){
		die('Please complete all the required feilds!');
		}
		if (!get_magic_quotes_gpc()) {
						 $_POST['id_no'] = addslashes($_POST['id_no']);
							}
						 $idcheck = $_POST['id_no'];
						 $check3 = mysql_query("SELECT * FROM members WHERE id_no = '$idcheck'")
						or die(mysql_error());
						 $check4 = mysql_num_rows($check3);
						 if ($check4 != 0) {
						 die('Sorry, the ID No.  '.$_POST['id_no'].' is already in use!' . " " . 'or' .  " " .'INVALID 					ID No.!<br />'. " " . " " .'Please try again..<br /><a href="student.php"><input type="submit" value="OK" name="OK" /></a>' );
						}
	$_POST['id_no'] = ($_POST['id_no']);
	$insert = "INSERT INTO students SET id_no='$_POST[id_no]', firstname='$_POST[firstname]', lastname='$_POST[lastname]', gender='$_POST[gender]', course='$_POST[course]', yr_sec='$_POST[yr_sec]'";
 	$add_member = mysql_query($insert);
header("location: student.php");
exit();
}
 ?> 
 <?php
include ("session/DBConnection.php");
 if (isset($_GET['id'])) { 
$user = $_GET['id'];
			$query = mysql_query("SELECT * FROM students WHERE student_id = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	
	
echo '<form action="student.php?action=edit&id='.$display['student_id'].'" method="POST" style="width: 443px; margin-left: 20px;">'; 
echo "Firstname: <span style='padding-left:10px; text-transform: capitalize; font-weight: bold; color: #FFFF33;'>" . $display["firstname"] . "</span><br />";
echo "Lastname:  <span style='padding-left: 10px; text-transform: capitalize; font-weight: bold;color: #FFFF33;'>" . $display['lastname'] . "</span><br />";
echo 'Course: <select name="course" style="width: 200px; padding-left: 2px; margin-left: 22px;" type="text" name="course">
                           <option value="-1" selected="selected">-Select Course-</option>
                           <option>BS in Information System</option>
                           <option>BS in Industrial Technology</option>
                           <option>BS in Civil Engineering</option>
                           <option>Associate in Industrial Technology</option>
                           <option>BS in Hotel and Restaurant Management</option>
                           <option>BS in Elementary Education</option>
                           <option>BS in Secondary Education</option>
                           <option>AB English</option>
                         </select><br />';
echo 'Gender: <select name="gender" style="width: 200px; margin-top: 10px; margin-left: 22px; text-transform: capitalize;">
                             <option value="-1" selected="selected">-Select Gender-</option>
                             <option>Female</option>
                             <option>Male</option>
                           </select><br />';
echo 'Year & Sec: <input style="width: 200px;padding-left: 2px; margin-left: 3px; margin-top: 10px;" type="text" name="yr_sec" /><br /><br />';
echo '<input type="submit" name="edit" value="Submit" />';
echo '<a href="student.php"><input type="submit" name="cancel" value="Cancel" /></a>';
echo '<input type="hidden" name="id_no" value="'.$display['id_no'].'" />';
echo '</form>'; } ?>
<?php
if(isset($_POST['edit'])){ 
$user =  $_GET['id'];
$course = $_POST['course'];
$yr_sec = $_POST['yr_sec'];
{
$sql2 = "UPDATE students SET course='$course', yr_sec='$yr_sec' WHERE student_id='$user'";
$result2 = mysql_query($sql2);
}

// if successful redirect to delete_multiple.php 
if($result2){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=student.php\">";
}

} ?>

 <div id="formadd" style="display:none;margin-left: 40px; border: 1px solid #999999; width: 400px; ">
<form action="student.php" method="post">
<span style="text-transform:capitalize; color: #66FF00; text-align: left;">
<label style=" padding-left: 5px;">Student's ID No. : <input name="id_no" type="text" style="margin-top: 10px; margin-left: 20px; text-transform: capitalize;"/></label><br />
<label style=" padding-left: 5px;">Firstname: <input type="text" style="margin-top: 10px; margin-left: 55px; text-transform: capitalize;" name="firstname"></label><br />
<label style=" padding-left: 5px;">Lastname: <input name="lastname" type="text" style="margin-top: 10px; margin-left: 55px; text-transform: capitalize;"/></label><br />
<label style=" padding-left: 5px;">Gender: <select name="gender" style="width: 150px; margin-top: 10px; margin-left: 70px; text-transform: capitalize;">
                             <option value="-1" selected="selected">-Select Gender-</option>
                             <option>Female</option>
                             <option>Male</option>
                           </select> </label><br />
<label style=" padding-left: 5px;">Course: <select name="course"  style="margin-top: 10px; width: 150px; margin-left: 70px; text-transform: capitalize;">
                           <option value="-1" selected="selected">-Select Course-</option>
                           <option>UG-Computer Science and Engineering 2011</option>
						   <option>UG-Computer Science and Engineering 2012</option>
						   <option>UG-Computer Science and Engineering 2010</option>
						   <option>UG-Computer Science and Engineering 2009</option>
						   <option>PG-Computer Science and Engineering 2011</option>
						   <option>PG-Computer Science and Engineering 2012</option>
						   
                           <option>UG-Mechanical Engineering 2011</option>
						   <option>UG-Mechanical Engineering 2012</option>
						   <option>UG-Mechanical Engineering 2010</option>
						   <option>UG-Mechanical Engineering 2009</option>
						   <option>PG-Mechanical Engineering 2011</option>
						   <option>PG-Mechanical Engineering 2012</option>
						   
						   <option>UG-Electronics and Communication Engineering 2011</option>
						   <option>UG-Electronics and Communication Engineering 2012</option>
						   <option>UG-Electronics and Communication Engineering 2010</option>
						   <option>UG-Electronics and Communication Engineering 2009</option>
						   <option>PG-Electronics and Communication Engineering 2011</option>
						   <option>PG-Electronics and Communication Engineering 2012</option>
                         </select></label><br />
<label style=" padding-left: 5px;">Year and section: <input name="yr_sec" style="margin-top: 10px; margin-left: 18px; text-transform: capitalize;" type="text" /></label><br />
<input style="margin-top: 20px; margin-left: 150px;" type="submit" name="add" value="Add to records" />
<a href="student.php"><input type="submit" name="cancel" value="Cancel" /></a>
<br /><br /></span></form>



</div></div>
<br />
<br />
<br />
</div>
</div>
</div>
<!-- /Cols > 3 -->

<br class="clear" />
    
</div>
    <!-- /content of main -->
</div>
<!-- /MAIN -->

</body>
</html>