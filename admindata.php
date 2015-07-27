<div id="header">
    <div >
    <div style="background-image:url(img/admin.jpg);width:100%;height:120px;background-repeat:no-repeat;">
    <h1><a HREF="index.php" title="Canvas"><span class="inv">Canvas</span></a></h1>
    </div>
 		<br>
         <div class="nav" style="width=65%;float:center;margin-left:200px;">
			<ul><li><a HREF="memberlist.php" class="navstyle " title="Home"><span>Home</span></a></li>
                <li> <a href="#" class="navstyle "><span>Members</span></a>
                    <ul>
                     <li><a href="student.php"><span>Student</span></a></li>
                      <li><a href="faculty.php"><span>Faculty</span></a></li>
					  
                    </ul>
                </li>
                <li> <a href="logout.php" class="navstyle "><span>Logout</span></a>
                    
                </li>
               
			</ul>
		</div>
        <!-- /Menu -->
        
        <!-- Search -->
    	<div id="search_form" style="margin-right:200px;">
        <form class="search" action="">
            <div class="field"><input type="text" name="keyword" id="searchbox"  class="search" value="Search..." onclick="this.value='';" /></div>
<div id="display">
</div>

		  </form>
</div>
        
<br class="clear" />
  </div>
    
</div>

<div id="main">

<div class="content" style="padding-bottom: 0px; padding-top: 0px;">
<div class="col_1">New Members
<div class="separator_1" style="height: 12px;">
</div>
<img src="images/image_31.png" alt="" width="17" height="16" /> <a href="studentlist.php" style="text-decoration:none;">Students &nbsp;&nbsp;<?php
$result = mysql_query("SELECT * FROM members WHERE confirmation='0' AND type='Student'");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	if($numberOfRows > 0){
	echo '(<font size="1" color="red"><b>' . $numberOfRows .'</b></font>)';} 
	?>
	</a>
	<br />
	<a href="facultylist.php" style="text-decoration:none;">
	<img src="images/sent.png" alt="" width="17" height="16" /> Faculty &nbsp;&nbsp;<?php
$result = mysql_query("SELECT * FROM members WHERE confirmation='0' AND type='Faculty'");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	if($numberOfRows > 0){
	echo '(<font size="1" color="red"><b>' . $numberOfRows .'</b></font>)';} 
	?></a>
	<br />
    </div>
</div>