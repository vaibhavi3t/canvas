<?php ob_start(); ?>
<!DOCTYPE html >
<html >
<head>
<title>Login</title>
</head>
<body>	
<div id="header">
</div>	 
<?php  
require("session/DBConnection.php");
if (isset($_POST['login'])) {
        $id_no = $_POST['id_no'];			
		$password = $_POST['password'];
		
		$result = mysql_query("SELECT * FROM members WHERE ((members.id_no ='$id_no') AND (members.password = '$password') AND (members.confirmation='1'))");
				
				if (!$result) 
					{
					die("Query to show fields from table failed");
					}
					$numberOfRows = MYSQL_NUMROWS($result);				
					If ($numberOfRows == 0) 
						{
						
							include("error.php");
						}
					else if ($numberOfRows > 0) 
						{
						session_register('is');
						$_SESSION['log']['login'] = TRUE;
						$_SESSION['log']['id_no'] = $_POST['id_no'];
						$session = "1";	
		
		$query = mysql_query("SELECT * FROM members WHERE id_no = '$id_no'") or die (mysql_error()); 
			
			$display = mysql_fetch_array($query);	
			
				$image = $display['image'];
				$user= $display['username'];
		$insert = "INSERT INTO users SET username = '$user', password = '$password', session_id= ' ', created_date =CURRENT_TIMESTAMP,modified_date= '0000-00-00 00:00:00', image = '$image'";
	$add_member = mysql_query($insert);
						
				$type= $display['type'];
				if ($type=="Admin")
				 {
				  header("location:memberlist.php");
				  }
				else{
    				header("location:home.php");
    				}
				}
			}
?></p>
</body>
</html>