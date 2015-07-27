<?php

include_once('DBConnection.php');

$id_no =$_SESSION['log']['id_no'];
	$result1=mysql_query("select * from members where id_no='$id_no'");
	$user1 = mysql_fetch_assoc($result1);
	$user = $user1['username'];

function checkValues($value)

{

	$value = trim($value);

	if (get_magic_quotes_gpc()) 

	{

		$value = stripslashes($value);

	}

	$value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));

	$value = strip_tags($value);

	$value = mysql_real_escape_string($value);

	$value = htmlspecialchars($value);

	return $value;

}	

$limit = "";

$users_ip = $_SERVER['REMOTE_ADDR'];

if(@$_REQUEST['val'])

{

	$user 	= checkValues($_REQUEST['username']);

	$firstname 	= checkValues($_REQUEST['firstname']);



	$EventInput 	= checkValues($_REQUEST['EventInput']);

	$datepicker 	= checkValues($_REQUEST['datepicker']);

	

	$datepicker 	= $datepicker.' '.$_REQUEST['start_time_min'];

	$datepicker 	= strtotime($datepicker);

	

	$where_text 	= checkValues($_REQUEST['Where']);

	$WhoInvited 	= checkValues($_REQUEST['WhoInvited']);

	

	mysql_query("INSERT INTO event (username, firstname, EventInput, datepicker, where_text, WhoInvited, users_ip ,date_created) VALUES('".$user."', '".$firstname."', '".$EventInput."', '".$datepicker."','".$where_text."','".$WhoInvited."','".$users_ip."','".strtotime(date("Y-m-d H:i:s"))."')");

	

}

$result = mysql_query("SELECT * FROM event where username = '".$user."' order by id desc LIMIT 1");



while ($row = mysql_fetch_array($result))

{?>

  <div id="show_event" style="border-width: 1px; margin-right: 11px; margin-top: 17px; width: 177px; height: 84px;">

   	   <img alt="" style="float: left;" src="images/ico.png">&nbsp;&nbsp;&nbsp;

			   <a href="#" class="delete" id="record-<?php  echo $row['id']?>">

			   <img src="images/del.jpg" style="border-width: 0px; float: right; height: 16px;" alt=""></a>

		<label style="padding: 7px 0px 8px; float: left;" class="text">

		

	   <name><?php echo $row['firstname'] ."" . " is planning to:";?></name>

	   <br />

	   <b><?php echo $row['EventInput'];?></b>

	   <br />

	   <one>at:</one>&nbsp;<b><?php echo $row['where_text'];?><b>

	   <br />

	   <one>on:</one>&nbsp;<b><?php echo date("F d, Y h:ia",$row['datepicker']);?></b>

	   </label>



		<br clear="all" />

		<div id="divider"></div>

		<br />

     </div>



<?php

}

?>

