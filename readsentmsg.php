<?php session_start();?>
<!DOCTYPE html >
<html >
<head>
 <?php
include("session/DBConnection.php");
$id_no = $_SESSION['log']['id_no'];	$result1=mysql_query("select * from members where id_no='$id_no'");	$user1 = mysql_fetch_assoc($result1);	$user = $user1['username'];
			$query = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	?>
<title>Canvas - <?php echo $display['firstname'] . " " . $display['lastname'] ?> </title>	
<link rel="shortcut icon" HREF="images/favicon.ico" />
	<!-- METAS -->
    <meta name="description" content="Welcome to FlowCounts template created by Devilcantburn for Envato ThemeForest Marketplace" />
    <meta name="keywords" content="devilcantburn, envato, template, webdesign, julian chaniolleau" />
	<!-- /METAS -->
    
    <!-- CSS -->

	<link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/violine.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" media="all" />	
	<link type='text/css' href='css1/basic.css' rel='stylesheet' media='screen' />

    <!-- /CSS -->
		
    <!-- JQUERY & PLUGINS -->
	<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/basic.js'></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="contact.js"></script>

	
    <script type="text/javascript" SRC="js/jquery-1.4.1.min.js"></script>
    <script type="text/javascript" SRC="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" SRC="js/jquery.nivo.slider.js"></script>
    <script type="text/javascript" SRC="js/twitter.js"></script>
    <script type="text/javascript" SRC="js/jquery.validate.js"></script>
    <script type="text/javascript" SRC="js/jquery.googlemaps1.01.js"></script>
    <script type="text/javascript" SRC="js/custom.js"></script>
  
   
	<script SRC="js/cufon-yui.js" type="text/javascript"></script>
    <script SRC="js/tindog_400.font.js" type="text/javascript"></script>
    <script type="text/javascript">
        Cufon.replace('h2, h3, h4, h5, .homeSlogan',{ hover: true });
    </script>
   
    <script SRC="../../maps.google.com/maps@file=api&v=2&sensor=false&key=ABQIAAAA6kQ5d_ZZG2I52I3jLyR1nhTXd0YQg71M1t3hrj1DiXIODFdA9xSXETe8CnnQO2z6WyekEE43BB77A" type="text/javascript"></script>
	
	
     
    <style type="text/css">

    </style>
	<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready( function() {
	$("#reply").click( function() {
		$("#forms").fadeIn();
		$("#reply").fadeOut();
	});	
});
</script>
</head>
<?php include("session/DBConnection.php");
include("session/session.php");
$error ="";
?>
<body>

<!-- HEADER -->
<div id="header">
    <!-- content of header -->
    <div class="content">
    
    <div id="logo">
        <h1><a HREF="index.php" title="FlowCounts A real nice folio template"><span class="inv">FlowCounts</span></a></h1>
    </div>
  
     <div class="twitter">
    	<div id="deadTweets"><a style="color: #66FF00; text-decoration:none;" id="cap" href="profile.php"><?php echo $display['firstname'] . "  " . $display['lastname'] ?>&nbsp;<span class="style4">|</span> <a href="logout.php" style="color: #66FF00; text-decoration:none;" id="cap">Logout</a> </div>
    </div>
 
    	<div class="nav">
			<ul><li><a HREF="home.php" class="navstyle " title="Home"><span>Home</span></a></li>
                <li> <a href="#" class="navstyle "><span>My Page</span></a>
                    <ul>
                     <li><a href="profile.php"><span>Profile</span></a></li>
                      <li><a href="info.php"><span>Info</span></a></li>
					  <li><a href="photos.php"><span>Photos</span></a></li>
                    </ul>
                </li>
                <li> <a href="friends.php" class="navstyle"><span>Friends <?php
	$user = $_SESSION['log']['username'];
$result = mysql_query("SELECT * FROM friends WHERE friend = '" . $user ."' and status = 'requesting'");
	
	$numberOfRows = MYSQL_NUMROWS($result);	 
				if ($numberOfRows > 0 )
				  echo '<font size="2" color="red">' . $numberOfRows .'</font>' ;
				else
    			 echo " ";	
				?></span></a></li>
                <li> <a href="mail.php" class="navstyle"><span class="current">Messages <?php
$user = $_SESSION['log']['username'];
$status = 'unread';
$result = mysql_query("SELECT * FROM messages WHERE recipient='" . $user."' AND status='$status'");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	if($numberOfRows > 0){
	echo '<font size="1" color="red"><b>' . $numberOfRows .'</b></font>';} 
	?></span></a></li>
                <li> <a href="forums.php" class="navstyle "><span>Forums</span></a>
                    
                </li>
               
			</ul>
		</div>
    	
        <br class="clear" />
  </div>
   
</div>

<div id="main">
    <div class="content">
   <?php
if (isset($_GET["delete"])) {

$query="DELETE FROM messages WHERE message_id='$_GET[delete]'";
@mysql_query($query) or die('Error, delete query failed');
$error = "Deleted!";
}
?>
<?php echo $error; ?>

<?php
include ("session/DBConnection.php");
$id = $_GET['id'];
			$query = mysql_query("SELECT * FROM messages WHERE message_id = '$id'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	?>
			
		 <?php
include ("session/DBConnection.php");
$user = $display['sender'];
			$qry = mysql_query("SELECT * FROM members WHERE username = '$user'") or die (mysql_error()); 
			$a = mysql_fetch_array($qry);
			echo '<img class="framed" width=50 height=50 src="' . $a['image'] .'"/>';
			echo '&nbsp;&nbsp;<a href="userprofile.php?userid=' . $a['member_id'] . '" style="font-weight: bold; text-decoration:none; text-transform: capitalize; color: #51B22E;">';
			echo $a['firstname'] . " " . $a['lastname'] . '</a>';
			echo '<br />';
			echo '&nbsp;&nbsp;' . $display['content'];
			echo '<br /><br />';
			echo '<div style="border-top:1px solid #999999; width:600px;"></div>';

			echo '<br />';
$id = $_GET['id'];
			
				?>
			<br />
<a href="sentmessages.php" style="text-decoration:none;">Back to Messages</a>

  </div>
<!-- /Cols > 1 -->
 
</table>
</td>
</tr>
</table>
</div>
</div>
<br class="clear" />
    
    </div>
 
</div>
<div id="footer">
</div>
</html>



