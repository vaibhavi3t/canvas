<?php  


//Develop:Vaibhav kumar(2011166),Apoorv Srivastava(2011026),Yogendra Singh Katheria(2011180)
	$conn = mysql_connect('localhost', 'root', '1234');
	 if (!$conn)
    {
	 die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("canvas", $conn);
?>