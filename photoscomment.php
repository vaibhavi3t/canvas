<?php session_start();?>
<!DOCTYPE html >
<html>
<head>
    	
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	
	<!-- Here is where your page title must go -->
 <?php
include("session/DBConnection.php");
$id_no =$_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];
			$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	?>
<title>Canvas - <?php echo $display['firstname'] . " " . $display['lastname']; ?> </title>	
		

</head>
<?php
include ("session/session.php");
include("session/DBConnection.php");
?>
<body background="img/background.jpg">
	<div style=" background-image:url(img/background.jpg)">
<?
include("member_head.php");
?>
</div>
	
	<div style="background-image:url(img/background.jpg)">
		
			<div style="background-image:url(img/background.jpg);margin-left:200px;height:40px;">
				<p><a href="profile.php" id="cap"><?php echo $display['firstname']." ". $display['lastname']; ?> </a> >><a HREF="photos.php">Photos</a> >> Comments</p>
			</div>
	</div>
	
	
	<div  style="min-height:400px;background-image:url(img/background.jpg)">
	<?php
$qry  = "SELECT * FROM uploads WHERE upload_id = '". $_GET['pid'] ."'";
$r = mysql_query($qry);
while($a = mysql_fetch_assoc($r))
{

?>		

		<div class="container_12 clearfix">
			<div class="grid_12 portfolio_single"	>
				<div align="center"><h2 id="cap"><?php echo $a["image_name"]; ?></h2>
				<img height=300 width=500 align="center" class="framed" SRC="<?php echo $a["image"]; ?>" alt="<?php echo $a["image_name"]; ?>" /></div><br />
<!--				<img height=189 width=262 class="framed" SRC="" alt="" /><?php } ?>
-->				<?php $sql  = "SELECT *, UNIX_TIMESTAMP() - date_comment AS TimeSpent FROM photoscomment WHERE upload_id = '". $_GET['pid'] ."' ORDER BY comment_id ASC LIMIT 4";
$s = mysql_query($sql);
while($b = mysql_fetch_assoc($s))
{?>		

			<?php
$user = $b['commentby'];
$c  = "SELECT * FROM members WHERE username = '$user'";
$y = mysql_query($c);
while($a = mysql_fetch_assoc($y))
{?>		<p><?php 

echo '<br /><div id="comment" style="padding-left: 220px;">';
		$user = $b['commentby'];
		echo '<img class="framed" height=40 width=40 align="left" SRC="'. $a['image'] .'" alt="'. $a['firstname'] . " " . $a['lastname'] .'" />';
		echo '&nbsp;';
		echo '<span class="nn">';
		$id = $a['member_id'];
		echo '<a href="profile.php?userid=' . $id . '" style="text-transform: capitalize; color:#222;">';
		echo $a['firstname'] . " " . $a['lastname'] . "</a></span>";
		echo '<br />&nbsp;&nbsp;&nbsp;<span style="color: #000";>';
		echo $b['comment'];
		echo '</span><br />';
		echo '&nbsp;';
		echo '<font style="color:#000099;font-size: 10px;">';
						$days2 = floor($b['TimeSpent'] / (60 * 60 * 24));
						$remainder = $b['TimeSpent'] % (60 * 60 * 24);
						$hours = floor($remainder / (60 * 60));
						$remainder = $remainder % (60 * 60);
						$minutes = floor($remainder / 60);
						$seconds = $remainder % 60;	
						if($days2 > 0)
							echo date('F d Y', $b['date_comment']);
						elseif($days2 == 0 && $hours == 0 && $minutes == 0)
							echo "few seconds ago";		
						elseif($days2 == 0 && $hours == 0)
							echo $minutes.' minutes ago';
											
		echo '</font>';				
		echo '</div>'; } }
		?>
				
				<br /><div style="padding-left: 220px;">
				<p>
				<form action="savecomment.php" method="get">
				<input name="userid" type="hidden" value="<?php echo $display['username']; ?>" />
				<input name="pic" type="hidden" value="<?php echo $display['image']; ?>" />
				<input name="id" type="hidden" value="<?php echo $_GET['pid']; ?>" />
				<img class="framed" height=40 width=40 align="left" SRC="<?php echo $display['image']; ?>" alt="<?php echo $display['firstname'] . " " . $display['lastname']; ?>" />&nbsp;&nbsp;
				<input name="comment" type="text" value="Leave a comment.." onClick="this.value='';" />
				</form>
				</p>
				</div>

				
		  </div>
	  </div><!-- end grid -->
</div><!-- end container -->
	</div><!-- end content -->
	<!-- end footer -->
	</br>
	<div style="background-image:url(img/background.jpg)">
	</br>
<?
   include("footer.php");
?>
</div>
	</body> 
</html>
