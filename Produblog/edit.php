<?php
 require_once('assets/includes/include.php');
	// hier wordt het profiel van de ingelogde gebruiker getoont
  if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'){
		echo"
		
		";
	}else{
		echo"
		you do not have access to this page
		<h3 class='loginText'><a class='loginText' href='home.php'>Go home</a></h3>";
	}
?>


<?php include_once('assets/includes/footer.php'); ?>