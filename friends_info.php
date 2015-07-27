<?php session_start();?>
<html>
<head>
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
<title>Canvas - <?php echo $display['firstname'] . " " . $display['lastname'] ?> </title>
</head>
<?php
include ("session/session.php");
include ("session/DBConnection.php");
?>
<body background="img/background.jpg">
<div style="background-image:url(img/background.jpg);height:120px;">
<?
include("member_head.php");
?>
</div>	
	<div style="background-image:url(img/background.jpg);height:120px;height:30px">
		<div style="margin-left:200px;background-image:url(img/background.jpg);height:120px;">
			<?php  
		$user= $_GET['userid'];
		$query = mysql_query("SELECT * FROM members WHERE member_id = '$user'") or die (mysql_error()); 
							$show = mysql_fetch_array($query);	
															?>
				<a style="color:#fff; text-decoration:none;" id="cap" href="userprofile.php?userid=<?php echo $_GET['userid']; ?>">
				<?php echo $show['firstname'] . "  " . $show['lastname'] ?></a> >> Info&nbsp;
		</div><!-- end container -->
	</div>
	
	<div style="background-image:url(img/background.jpg);">
		<div style="background-image:url(img/background.jpg);margin-left:200px;">
			<div class="grid_12" style="width: 350px;">
			  

				<fieldset style="width: 700px;">
					<legend>Basic and Contact information</legend>
					<div align="left" id="form01">
		
					<span style="color:#51B22E;; font-weight:bold;">Name : </span><span id="info" style="margin-left: 61px;"><?php echo $show['firstname'] . " " . $show['lastname'] ?></span><br />
					<span style="color:#51B22E;; font-weight:bold;">Address : </span><span id="info" style="margin-left: 47px;"><?php echo $show['address'] ?></span><br /><?php $hometown = $show['hometown'];
					if($hometown != ""){
					echo '<span style="color:#51B22E;; font-weight:bold;">Hometown : </span><span id="info" style="margin-left: 30px;">' . $hometown . '</span><br />'; } ?>
					<?php $contact = $show['contact_no'];
					if($contact != ""){
					echo '<span style="color:#51B22E;; font-weight:bold;">Contact No. : </span><span id="info" style="margin-left: 25px;">' . $contact .'</span><br />'; } ?>
					<span style="color:#51B22E;; font-weight:bold;">Email : </span><span id="uu" style="margin-left: 64px;"><?php echo $show['email'] ?></span><br />
					<span style="color:#51B22E;; font-weight:bold;">Birthdate : </span><span id="info" style="margin-left: 39px;"><?php echo $show['birthdate'] ?></span><br />
					<span style="color:#51B22E;; font-weight:bold;">Gender : </span><span id="info" style="margin-left: 53px;"><?php echo $show['gender'] ?></span><br />
					<?php $rel = $show['relationship'];
					if($rel != ""){
					echo '<span style="color:#51B22E;; font-weight:bold;">Relationship : </span><span id="info" style="margin-left: 20px;">' .$rel . '</span><br />'; }?></div>
				</fieldset>
				<br />
				<fieldset style="width: 700px;">
				<legend>Education, Interest and Entertainment</legend>
				
					<div id="form02" align="left">
					<?php $high = $show['high_school'];
					if($high != ""){
					echo '<span style="color:#51B22E;; font-weight:bold;">High School :</span><span id="info" style="margin-left: 23px;">' .$high . '</span><br />'; } ?>
					<?php $college = $show['college'];
					if($college != ""){
					echo '<span style="color:#51B22E;; font-weight:bold;">College :</span><span id="info" style="margin-left: 55px;">' . $college . '</span><br />'; } ?>
					<?php $interest = $show['interest'];
					if($interest != ""){
					echo '<span style="color:#51B22E;; font-weight:bold;">Interests :</span><span id="info" style="margin-left: 45px;">' . $interest .'</span><br />'; } ?>
					<?php $aboutme = $show['aboutme'];
					if($aboutme != ""){
					echo '<span style="color:#51B22E;; font-weight:bold;">About You :</span><span id="info" style="margin-left: 34px;">' . $aboutme. '</span><br />'; } ?></div>
				</fieldset>
				<br />
				<fieldset style="width: 700px;">
				<legend>Favorite Quotation</legend>
				
					<div id="form02" align="left" style="width: 690px; overflow: auto;">
					<?php $fave = $show['quote'];
					if($fave != ""){
					echo '<span id="info" style="margin-left: 23px;">' .$fave . '</span><br />'; } ?>
					</div>
				</fieldset>
		  </div>
			<!-- end grid -->
<!-- /Cols 1 -->
    
<br class="clear" />
    
</div>
		</div><!-- end container -->
	</div>
	<!-- end content -->
	<!-- end footer -->
	<div>

		<? include("footer.php");?>
	      </div>
</body> 
</html>
