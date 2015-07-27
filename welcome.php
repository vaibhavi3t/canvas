<body>
  <div style="float:center;margin-top:200px;margin-left:200px;font-size:50px;font-family:Matura MT Script Capitals">
    WELCOME 
	<?
	  include("session/DBConnection.php");
			$user = $_SESSION['log']['id_no'];
			$query = mysql_query("SELECT * FROM members WHERE id_no = '$user'") or die (mysql_error()); 
			$display = mysql_fetch_array($query);
			echo "&nbsp;&nbsp;&nbsp;Welcome"." ".$display['firstname'] . " " . $display['lastname'];
	?>
  </div>
</body>
	