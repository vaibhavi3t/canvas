<html>
  <head>
    <title>
	  index
	</title>
	<link rel="stylesheet" href="css/index.css" type="text/css" charset="utf-8" />
	
	<script type="text/javascript"> 
		$(document).ready(function(){ 
			$(document).pngFix(); 
		}); 
		
function passwordStrength(password)

{

        var desc = new Array();

        desc[0] = "Very Weak";
        desc[1] = "Weak";
        desc[2] = "Better";
        desc[3] = "Medium";
        desc[4] = "Strong";
        desc[5] = "Strongest";

        var score   = 0;

        //if password bigger than 6 give 1 point

        if (password.length > 6) score++;

        //if password has both lower and uppercase characters give 1 point      

        if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

        //if password has at least one number give 1 point

        if (password.match(/\d+/)) score++;

        //if password has at least one special caracther give 1 point

        if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) score++;

        //if password bigger than 12 give another 1 point

        if (password.length > 12) score++;

         document.getElementById("passwordDescription").innerHTML = desc[score];

         document.getElementById("passwordStrength").className = "strength" + score;

}
	</script>

	
  </head>
<body background="img/index.jpg" style="background-repeat:no-repeat;" >
<? if (isset($_POST['login'])) {
        $id_no = $_POST['id_no'];			
		$password = $_POST['password'];
		
		$result = mysql_query("SELECT * FROM members
				WHERE ((members.id_no ='$id_no') AND (members.password = '$password') AND (members.confirmation='1'))");
				
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
		$insert = "INSERT INTO users SET id_no = '$id_no', password = '$password', session_id= '', created_date =CURRENT_TIMESTAMP,modified_date= '0000-00-00 00:00:00', image = '$image'";
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
			?>
<div style="margin-top:-10px;margin-left:850px;"><font size="4" color="orange"><i>INVALID username or password.Try again.</i></font></div>
<div style="margin-top:-15px;">
<?
	include("header.php");
	?>
	</div>
	
	<div id="signup">
	  <?
	  include("signup.php")
	  ?>
	</div>
	
</body>
</html>