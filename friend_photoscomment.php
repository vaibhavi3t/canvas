<?php session_start();?>

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
<title>Canvas's - <?php echo $display['firstname'] . " " . $display['lastname']; ?> </title>	
		
	
	
<script type="text/javascript">
$(document).ready(function(){

$(".search").keyup(function() 
{
var searchbox = $(this).val();
var dataString = 'searchword='+ searchbox;

if(searchbox=='')
{
}
else
{

$.ajax({
type: "POST",
url: "search.php",
data: dataString,
cache: false,
success: function(html)
{

$("#display").html(html).show();
	
	
	}




});
}return false;    


});
});

jQuery(function($){
   $("#searchbox").Watermark("Search");
   });
</script>

</head>
<?php
include ("session/session.php");
include("session/DBConnection.php");
$error ="";
?>
<body>
	<div style="margin-top:20px; background-color:#bbb">
<?
include("member_head.php");
?>
</div>
	<div style="background-color:#bbb">
		<div style="margin-left:200px;height:70px;">
			<div class="grid_9">
				<?php
$sql_qry  = "SELECT * FROM uploads WHERE upload_id = '". $_GET['pid'] ."'";
$qq = mysql_query($sql_qry);
while($aa = mysql_fetch_assoc($qq))
{
	$user= $aa['username'];
		$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
							$show = mysql_fetch_array($query);	}?>
				<p><a style="color:#fff; text-decoration:none;" id="cap" href="userprofile.php?userid=<?php echo $_GET['pid']; ?>">
				<?php echo $show['firstname'] . "  " . $show['lastname'] ?></a>&nbsp;&nbsp;>> Photos&nbsp;&nbsp;>> Comments</p>
			</div><!-- end grid -->
			
		</div><!-- end container -->
	</div>
	
	<div id="content" style="background-color:#bbb">
	<?php
$qry  = "SELECT * FROM uploads WHERE upload_id = '". $_GET['pid'] ."'";
$r = mysql_query($qry);
while($a = mysql_fetch_assoc($r))
{?>		

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
		echo '<a href="profile.php?userid=' . $id . '" style="text-transform: capitalize;">';
		echo $a['firstname'] . " " . $a['lastname'] . "</a></span>";
		echo '<br />&nbsp;&nbsp;&nbsp;';
		echo '<span style="color: #222;">' . $b['comment'] .'</span>';
		echo '<br />';
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
				<p><form action="savecomment2.php" method="get">
				<input name="userid" type="hidden" value="<?php echo $display['username']; ?>" />
				<input name="pic" type="hidden" value="<?php echo $display['image']; ?>" />
				<input name="id" type="hidden" value="<?php echo $_GET['pid']; ?>" />
				<img class="framed" height=40 width=40 align="left" SRC="<?php echo $display['image']; ?>" alt="<?php echo $display['firstname'] . " " . $display['lastname']; ?>" />&nbsp;&nbsp;
				<input name="comment" type="text" value="Leave a comment.." onclick="this.value='';" /></form></p></div>

				
		  </div>
	  </div><!-- end grid -->
</div><!-- end container -->
	</div><!-- end content -->
	<!-- end footer -->
<div id="sub_footer">
		<div class="container_12 clearfix">
		  <div class="grid_12"> <a class="logo left" href="#">Canvas</a>
		    <p><small>&copy;&nbsp;2011 Canvas. All rights reserved. | <a href="copyright.php">Copyright</a> | <a href="terms.php">Terms and Conditions</a> | <a href="privacy.php">Privacy Policy</a> | <a class="current" href="about.php">About Us</a></small></p>
	      </div>
		  <!-- end grid -->
		</div><!-- end container -->
</div><!-- end subfooter -->
	
	<!-- PRETTYPHOTO SCRIPT INICIALITATION -->
	<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$("a[rel^='prettyPhoto']").prettyPhoto();
	});
	</script>
	<!-- END PRETTYPHOTO SCRIPT INICIALITATION -->
	
	<!-- For CUFON Under IE -->
	<script type="text/javascript"> Cufon.now(); </script>
</body> 
</html>
