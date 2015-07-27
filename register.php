<html>
<head>
<title>Registration</title>
</head>
<body bgcolor="#bbb">
<?php				
					include('session/DBConnection.php');

					if (isset($_POST['register'])) 
		{ 
					if (!$_POST['id_no']|	
					!$_POST['username']|
					!$_POST['password']|
					!$_POST['firstname']|
					!$_POST['lastname']|
					!$_POST['email']|
					!$_POST['address']|
					!$_POST['birthday_month']|
					!$_POST['birthday_day']|
					!$_POST['birthday_year']|
					!$_POST['gender']|
					!$_POST['course']|
					!$_POST['yr_sec']|
					!$_POST['checkbox'])
		{

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
						 die('Sorry, the ID No.  '.$_POST['id_no'].' is already in use!' . " " . 'or' .  " " .'INVALID  ID No.!<br />'. " " . " " .'Please try again..' );
						}
	$_POST['id_no'] = ($_POST['id_no']);
 	$_POST['password'] = ($_POST['password']);
	$_POST['gender'] = ($_POST['gender']);
	$_POST['birthdate'] = ($_POST['birthday_month'] . "/" . $_POST['birthday_day']. "/" . $_POST['birthday_year'] );
	$_POST['birthday_month'] = ($_POST['birthday_month']);
	$_POST['birthday_day'] = ($_POST['birthday_day']);
	$_POST['birthday_year'] = ($_POST['birthday_year']);
	$type = "Student";
	
 	if (!get_magic_quotes_gpc()) {
 		$_POST['password'] = addslashes($_POST['password']);
 		$_POST['username'] = addslashes($_POST['username']);
 			}	
	$insert = "INSERT INTO members SET id_no='$_POST[id_no]', username='$_POST[username]', password='$_POST[password]', firstname='$_POST[firstname]', lastname='$_POST[lastname]', email='$_POST[email]', address='$_POST[address]', birthdate='$_POST[birthdate]', b_month='$_POST[birthday_month]', b_day='$_POST[birthday_day]', b_year='$_POST[birthday_year]', gender='$_POST[gender]', course='$_POST[course]', image='uploads/propic.jpg', yr_sec='$_POST[yr_sec]', type='$type', confirmation='0'";
	
 	$add_member = mysql_query($insert);
	if(!$add_member )
	echo "problem in query";
	

}

		
?>

<div style="float:center;margin-top:200px;margin-left:200px;color:#fff;font-size:50px;font-family:Matura MT Script Capitals">
    
	<?
	  echo " Welcome ".$_POST['firstname'];
	  echo " </br>Please login to continue.";
	?>
	<a href="index.php">Login</a>
	</div>
		</body>
		</html>