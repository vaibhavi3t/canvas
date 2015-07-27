<?php session_start();?>
<!DOCTYPE html >
<html >
<head>

 <?php
include("session/DBConnection.php");
$user = $_SESSION['log']['id_no'];
			$query = mysql_query("SELECT * FROM members WHERE id_no = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);	?>
<title>Canvas - Administrator </title>	
<link rel="shortcut icon" HREF="images/favicon.ico" />
	
    
    <!-- CSS -->

	<link href="admin_css/styles.css" rel="stylesheet" type="text/css" media="all" />
	<link href="admin_css/violine.css" rel="stylesheet" type="text/css" media="all" />
		

</head>
<?php include("session/DBConnection.php");
include("session/session.php");
$error ="";
?>
<body>
<? include("admindata.php");?>
<!-- /Cols > 1 -->
 <div class="col_3 design">
<div align="left" >
<table width="700" cellspacing="1" cellpadding="2" style="border-left: 1px solid #333;border-bottom: 1px solid #333;border-right: 1px solid #333;">
<tr>
<td>
<table width="800" cellspacing="1" cellpadding="2" border="0" bgcolor="#CCCCCC" style="width: 700px;"><tr>
<td align="left" style="background: #333; border: 1px solid #331;color:#fff; font-weight: bold; width: 400px;"><strong>&nbsp;New Canvas users</strong></td>
</tr>

<tr>
<?php
$result = mysql_query("SELECT * FROM members WHERE confirmation = '1' AND type != 'Admin' ORDER BY member_id DESC LIMIT 5");
while($row = mysql_fetch_array($result))
{?>
<td align="center" bgcolor="#FFFFFF" width="350"><a href="memberinfo2.php?id=<?php echo $row["member_id"]; ?>" valign="top">
<img style="padding-top: 15px; border-width: 0px; margin-left: 20px;" align="left" width=50 height=50 alt="Unable to View" src="<?php echo $row["image"]; ?> ">
</a><br />&nbsp;<span style="text-transform:capitalize; margin-right: 0px; text-decoration: none;">
<a href="memberinfo2.php?id=<?php echo $row["member_id"]; ?>" style="margin-left: -272px;"> <?php echo $row['firstname'] . " " . $row['lastname']; ?>
</a></span>&nbsp;<span style="text-transform: capitalize; margin-right: 0px; text-decoration: none; margin-left: 30px;"> Registered as  <?php echo $row['type']?></span></td>
</tr>
<?php
}

?>
</table>
</td>
</tr><br />
</table>
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