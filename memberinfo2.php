<?php session_start();?>
<!DOCTYPE html >
<html >
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
<title>Canvas-Administrator </title>
</head>
<?php
include ("session/session.php");
include ("session/DBConnection.php");
?>
<body><div style="background-image:url(img/background.jpg)">
<?phpinclude("admin_head.php");?></div>
	<div style="background-image:url(img/background.jpg);height:40px">		<br/>
		<div style="margin-left:200px; background-image:url(img/background.jpg);margin-top:">
			<?php  
		$user= $_GET['id'];
		$query = mysql_query("SELECT * FROM members WHERE member_id = '$user'") or die (mysql_error()); 
							$show = mysql_fetch_array($query);	
			?>
				<?php echo $show['firstname'] . " " . $show['lastname']; ?> &gt;&gt; Info&nbsp;&nbsp;
		</div>
	</div>
	
	<div style="background-image:url(img/background.jpg);">
		<div class="container_16 clearfix">
			<div class="grid_11 suffix_1 clearfix">
				<ul class="blog_brief">
				  <li class="entry clearfix">
<?php
$id = $_GET['id'];$image=mysql_query("SELECT * FROM members WHERE member_id = '$id'");
			$row=mysql_fetch_assoc($image);
			$_SESSION['image']= $row['image'];
			echo '<img class="grid_4 alpha blog_img framed" SRC="' . $_SESSION['image'] . '" alt="Unable to view" />';
    		
?>
<?php  
		$id = $_GET['id'];
		$query = mysql_query("SELECT * FROM members WHERE member_id = '$id'") or die (mysql_error()); 
							$result = mysql_fetch_array($query);	
															?>
						<div class="grid_7 omega">
							<h4><a href="" id="catchy"><?php echo $result['firstname'] . " " . $result['lastname']; ?></a></h4>
							<p><?php echo date("M  d, 20y"); ?>&nbsp;&nbsp;Login as <span id="type"><?php echo $result['type']?></span>							</p>
							<br />
							
							<?php
							$position=120; // Define how many character you want to display.

$message= $result['quote']; 
$post = substr($message, 0, $position); 

//echo $post;
//echo "...";?>
						<div id="quotes" style="overflow: auto; width:320px; padding-left:30px;"><?php echo '<span style="padding-left: 35px; padding-top: 100px;">' . $post ."...</span.";?></div>
</li></ul><div id="divider"></div>
				<br /><fieldset style="width: 700px;">
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
			
		  </div>
			<!-- end grid -->
<!-- /Cols 1 -->
    
<br class="clear" />
    
</div>
		</div><!-- end container -->
	</div>
	<!-- end content -->
	<!-- end footer -->
	<?	  include("footer.php");	?>
	
</body> 
</html>
