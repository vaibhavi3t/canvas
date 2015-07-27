<?php session_start();?>
<html >
<head>
    
	
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link type='text/css' href='css/basic1.css' rel='stylesheet' media='screen' />

    <!-- /CSS -->
		
    <!-- JQUERY & PLUGINS -->
		<script type="text/javascript" src="js/jquery1.js"></script>
		<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
		<script type='text/javascript' src='js/basic.js'></script>
		
		
	<!-- JQUERY -->
	<script type="text/javascript" SRC="js/jquery-1.4.2.min.js"></script>

		
		
		
	<link rel="stylesheet" href="js/prettyphoto/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
	<script SRC="js/prettyphoto/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
			<!-- Here is where your page title must go -->
 <?php
include("session/DBConnection.php");
$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
			$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	?>
<title>Canvas- <?php echo $display['firstname'] . " " . $display['lastname'] ?> </title>		
</head>
<?php
include ("session/session.php");
include("session/DBConnection.php");
?>
<body background:url(img/background.jpg)>
	<div style="background-image:url(img/background.jpg)">
<?
include("member_head.php");
?>
</div>
	
	<div style="background-image:url(img/background.jpg)">
		
			<div style="background-image:url(img/background.jpg);margin-left:200px;height:40px;">
				<p><a href="profile.php" id="cap"><?php echo $display['firstname']?> <?php echo $display['lastname']?></a>>> Photos</p>
			</div>
	</div>
	
	<div style="min-height:500px;background-image:url(img/background.jpg);margin-top:-20px;height:40px">
		<div class="container_12 clearfix" style="margin-top:20px;">
			<ul class="portfolio clearfix"><a class='basic' href="#" style="text-decoration:none;">Upload Photo</a><br />
			<div id="basic-modal-content" style=" width: 300px; height: 200px;">
                <form action="saveupload.php" method="post" enctype="multipart/form-data">
 <br /><br /><br /><br /><br /><span style="color:#FFFF00">Choose photo to upload:</span><br />
    <input name="image" type="file" style="width:250px;"> 
  <br />
  <span style="color:#FFFF00">Photoname:</span><br />
    <label>
    <input name="image_name" type="text" style="width: 200px; color: #fff; background-color: #333;" />
    </label>
  
  <br /><br />
						  <input name="upload" type="submit" class="button" value="Upload" id="" />
                    
</form>
              </div><?php
	include('session/DBConnection.php');
$id_no = $_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
$result = mysql_query("SELECT * FROM uploads WHERE username='$user'");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	echo '<span>Photos </span> <font size="2" color="blue"><b>' . $numberOfRows .'</b></font><br />'; 
	?><br /><?php
									$con=mysql_connect("localhost","root","1234");
									
									mysql_select_db("canvas", $con);
									if (isset($_GET['chmsc']))
									{
									$chmsc=$_GET['chmsc'];
									$chmsc=mysql_real_escape_string($chmsc);
									}
									else
										$chmsc=1;
									?>
                                         
                                            <?php
 									$id_no = $_SESSION['log']['id_no'];
									$result1=mysql_query("select * from members where id_no='$id_no'");
									$user1 = mysql_fetch_assoc($result1);
									$user = $user1['username'];
									$result=mysql_query("SELECT * FROM uploads WHERE username='$user'",$con);
									$rows=mysql_num_rows($result);
									$per_page=9;
									
									$total_pages=ceil($rows/$per_page);
										echo"page $chmsc of $total_pages<br>";
										
										if($chmsc!=1)
										{
										echo "<a href='photos.php?chmsc=1'>First </a>","  ";
										$previous=$chmsc-1;
										echo "<a href='photos.php?chmsc=$previous'> Previous</a>", "  ";
										}
										if (($chmsc!=1) && ($chmsc!=$total_pages))
										echo "||";
										if($chmsc!=$total_pages)
										{
										$next=$chmsc+ 1;
										echo "<a href='photos.php?chmsc=$next'>Next </a>","  ";
										echo "<a href='photos.php?chmsc=$total_pages'> Last</a>";
										}
										echo "<br/><br/>";
										$x=($chmsc-1)*$per_page;
										
										$sql="SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent FROM uploads WHERE username= '$user' ORDER BY upload_id DESC limit $x, $per_page";
										$z= mysql_query($sql, $con);
									
									while($r = mysql_fetch_array($z))
									
									{
						
						echo '<li class="grid_view grid_4 clearfix">';				
					echo '<a class="lightbox clearfix" HREF="'. $r["image"] .'" rel="prettyPhoto[gallery]">';
					echo '<img height=189 width=262 class="framed" SRC="'. $r["image"] .'" alt="'. $r["image_name"] . '" /></a>';
					echo '<div class="text">';
					echo '<h3><a HREF="">' .$r['image_name']. '</a></h3>';
					echo '<p>';
											 echo '<font style="color:#000099;font-size: 10px;">';
	$days = floor($r['TimeSpent'] / (60 * 60 * 24));
			$remainder = $r['TimeSpent'] % (60 * 60 * 24);
			$hours = floor($remainder / (60 * 60));
			$remainder = $remainder % (60 * 60);
			$minutes = floor($remainder / 60);
			$seconds = $remainder % 60;
	if($days > 0)
			echo date('F d Y', $r['date_created']);
			elseif($days == 0 && $hours == 0 && $minutes == 0)
			echo "few seconds ago";		
			elseif($days == 0 && $hours == 0)
			echo $minutes.' minutes ago';
		
			echo '</font><br />';

			$id = $r['upload_id'];		
				echo '</p>';
						echo '<a HREF="portfolio_single.php"><small>';
						$result = mysql_query("SELECT * FROM photoscomment WHERE upload_id='" .$id."'");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	
	echo '<a href="photoscomment.php?pid=' . $id . '">';
	echo $numberOfRows .'&nbsp;Comment/s</small></a>';
					echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo '</div></li>';
																
									}				
										
									?>
				<!-- end grid -->
				<!-- end grid -->
			   
			</ul>
			<!-- end portfolio -->
			<!-- end grid -->
	  </div><!-- end container -->
	</div><!-- end content -->
	<!-- end footer -->
<?
  include("footer.php");
?>
</body> 
</html>
