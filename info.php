<?php ob_start(); ?>
<?php session_start();?>
<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready( function() {
	$("#edit").click( function() {
		$("#forms").fadeIn();
		$("#cancel1").fadeIn();
		$("#form01").fadeOut();
		$("#edit").fadeOut();
	});	
	$("#cancel1").click( function() {
		$("#forms").fadeOut();
		$("#cancel1").fadeOut();
		$("#form01").fadeIn();
		$("#edit").fadeIn();
	});	
	$("#cancel2").click( function() {
		$("#forms2").fadeOut();
		$("#cancel2").fadeOut();
		$("#form02").fadeIn();
		$("#edit2").fadeIn();
	});	
	$("#edit2").click( function() {
		$("#forms2").fadeIn();
		$("#cancel2").fadeIn();
		$("#form02").fadeOut();
		$("#edit2").fadeOut();
	});	
	$("#change").click( function() {
		$("#account").fadeIn();
		$("#cancel3").fadeIn();
		$("#pass").fadeOut();
		$("#change").fadeOut();
	});	
	$("#cancel3").click( function() {
		$("#account").fadeOut();
		$("#cancel3").fadeOut();
		$("#pass").fadeIn();
		$("#change").fadeIn();
	});	
});
</script>
	<link rel="stylesheet" type="text/css" href="css/pswd.css" />
	<script type="text/javascript" SRC="js/jquery.pngFix.pack.js"></script>


    
	
	<link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="css/nivo-slider.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" media="all" />	
	<!-- Here is where your page title must go -->
 <?php
include ("session/DBConnection.php");
	$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
	
			$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	?>
<title>Canvas- <?php echo $display['firstname'] . " " . $display['lastname'] ?> </title>
	
	<link rel="shortcut icon" HREF="images/favicon.ico" />
	
	
	
</head>
<?php
include ("session/session.php");
include ("session/DBConnection.php");
$error = "";
?>
<body background="img/background.jpg">

<?
include("member_head.php");
?>
	<div style="background-image:url(img/background.jpg)"><a href="profile.php" style="margin-left:100px;">
				<?php echo $display['firstname'] . "  " . $display['lastname'] ?></a> >> Personal Information</div>
				 <?php
include ("session/DBConnection.php");
    $id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
			$query = mysql_query("SELECT * FROM members WHERE username = '$user' and id_no='$id_no'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	
	
if(isset($_POST['edit1'])){ 
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$contact_no = $_POST['contact_no'];
$email = $_POST['email'];
$birthdate = ($_POST['birthday_month'] . "/" . $_POST['birthday_day']. "/" . $_POST['birthday_year'] );
$b_month = $_POST['birthday_month'];
$b_day = $_POST['birthday_day'];
$b_year = $_POST['birthday_year'];
$gender = $_POST['gender'];
$relationship = $_POST['relationship'];
$hometown = $_POST['hometown']; {

$query = "UPDATE members SET firstname='$firstname', lastname='$lastname', birthdate='$birthdate', b_month='$b_month', b_day='$b_day', b_year='$b_year', address='$address', contact_no='$contact_no', email='$email', gender='$gender', relationship='$relationship', hometown='$hometown' WHERE username='$user'";
$result = mysql_query($query);
}

// if successful redirect to delete_multiple.php 
if($result){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=info.php\">";
}

}

if(isset($_POST['edit2'])){ 
$college = $_POST['college'];
$high_school = $_POST['high_school'];
$quote =  $_POST['quote'];
$aboutme = $_POST['aboutme'];
$interest = $_POST['interest']; {

$sql2 = "UPDATE members SET interest='$interest', quote='$quote', college='$college', high_school='$high_school', aboutme='$aboutme'  WHERE username='$user'";
$result2 = mysql_query($sql2);
}

// if successful redirect to delete_multiple.php 
if($result2){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=info.php\">";
}

}
if(isset($_POST['edit3'])){ 
if(isset($_POST['old_pass'])){
$old = $_POST['old_pass'];}
if(isset($_POST['password'])){
$new = $_POST['password'];}
 {
 $oldpass = $display['password'];
 if($old !=  $oldpass){
$error = "Password Incorrect...";
}

if($old ==  $oldpass) {
if (empty($error)) {
$sql3 = "UPDATE members SET password='$new' WHERE username='$user'";
$result3 = mysql_query($sql3);
}

// if successful redirect to delete_multiple.php 
if($result3){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=info.php\">";
}
}
}

if (empty($error)) { $error = "Password updated"; }

}

?>

<div style="background-image:url(img/background.jpg)">
		<div class="container_12 clearfix">
			<div class="grid_12" style="width: 700px;">
			 <fieldset style="width: 700px;background-color:white">
				<legend>Account Information</legend>
					<div id="pass">
					<span style="color:#222; font-weight:bold;">Username : </span><span id="info" style="margin-left: 61px; text-transform:none;"><?php echo $display['username'] ?></span><br />
					<script type="text/javascript">
					var password = <your password here>
var dispPassword = new String();
var n = password.length;
while(dispPassword.length < n){ 
        dispPassword.push("*"); 
}
document.getElementById("password").innerHTML = dispPassword;

</script>
					<span style="color:#222;; font-weight:bold;">Password : </span><span id="password" style="margin-left: 61px;">
			  <input type="password" name="password" value="<?php echo $display['password'] ?>" style="border: 0px black solid; width: 100px;
					font-weight: bold;" "readonly=readonly"></span><span style="color:#ff0000;"><?php echo $error;?></span></div>
					 <div id="change" style="font-size: 10px;"><a>Change Password</a></div>
				<div id="cancel3" style="display:none; padding-left: 620px;"><a>Cancel</a></div>
<div id="account" style="display:none;">
					<form id="form1" method="post" action="info.php">
						
						<p><label for="text_field">Current Password:</label>
						<div id="entry-text">
						 <input type="password" name="old_pass"/><br />
					  </div>
						</p>
						<p><label for="text_field">New Password:</label>
						<div id="entry-text">
						<input id="text" name="password" type="password" onKeyUp="passwordStrength(this.value)" /></label> 
						<br />
						<label for="passwordStrength">Password strength</label>

                        <div id="passwordDescription">Password not entered</div>

                        <div id="passwordStrength" class="strength0"></div>

                        </div>
						</p>
						<p id="but"><br />
							<input class="button" value="Submit" type="submit" name="edit3"/>
							<input class="button" value="Clear" type="reset" />
						</p>
	    </form></div>
			  </fieldset>
			  
			  
			<? //include Basic and Contact Information
				include("editProfileInfoForm.php");

			?>
				
				<fieldset style="width: 700px; background-color:white">
				<legend>Education, Interest and Entertainment</legend>
				<div id="edit2" style="padding-left: 620px;"><a>Edit</a></div>
				<div id="cancel2" style="display:none; padding-left: 620px;"><a>Cancel</a></div>

					<div id="form02">
					<?php $high = $display['high_school'];
					if($high != ""){
					echo '<span style="color:#222; font-weight:bold;">High School :</span><span id="info" style="margin-left: 23px;">' .$high . '</span><br />'; } ?>
					<?php $college = $display['college'];
					if($college != ""){
					echo '<span style="color:#222; font-weight:bold;">College :</span><span id="info" style="margin-left: 55px;">' . $college . '</span><br />'; } ?>
					<?php $interest = $display['interest'];
					if($interest != ""){
					echo '<span style="color:#222; font-weight:bold;">Interests :</span><span id="info" style="margin-left: 45px;">' . $interest .'</span><br />'; } ?>
					<?php $aboutme = $display['aboutme'];
					if($aboutme != ""){
					echo '<span style="color:#222; font-weight:bold;">About You :</span><span id="info" style="margin-left: 34px;">' . $aboutme. '</span><br />'; } ?></div>
<div id="forms2" style="display:none;">
					<form id="form1" method="post" action="info.php">
						<p><label for="text_field">High School:</label>
						<div id="entry-text">
						 <input type="text" id="cap" name="high_school"   value="<?php echo $display['high_school'] ?>" /></div>
						</p>
						<p><label for="text_field">College:</label>
						<div id="entry-text">
						 <input type="text" id="cap" name="college"   value="<?php echo $display['college'] ?>" /></div>
						</p>
				<p><label for="text_field">Interests:</label>
					  <div id="entry-text">
						<input type="text" id="cap" name="interest" value="<?php echo $display['interest'] ?>" /></div>
</p>				
						<p>
						<label for="text_field">About You:</label>
						<div id="entry-text">
						 <input type="text" id="cap" name="aboutme"   value="<?php echo $display['aboutme'] ?>" /></div>
						</p>
						<p id="but"><br />
							<input class="button" value="Submit" type="submit" name="edit2"/>
							<input class="button" value="Clear" type="reset" />
						</p>
		</form></div>
				</fieldset>
		  </div>
			<!-- end grid -->
<!-- /Cols 1 -->
    
<br class="clear" />
    

</div><!-- end container -->
	
	<!-- end content -->
	<!-- end footer -->
	<div id="sub_footer">

		<? include("footer.php");?>
	      </div>
</body> 
</html>

<?php ob_flush(); ?>