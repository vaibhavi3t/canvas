<html>
  <head>
    <title>
	  error
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
<body>
  <div id="main" style="background-image:url(img/index.jpg);min-height:1050px;backgroun-repeat:no-repeat;">
     
    <?
	include("header_error.php");
	?>
	<div id="signup">
	  <?
	  include("signup.php")
	  ?>
	</div>
	
  </div>
  
</body>
</html>