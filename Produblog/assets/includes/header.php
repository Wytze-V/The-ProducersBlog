<!DOCTYPE html>
<?php   require_once('dbCon.php'); ?>
<html lang="en">
<head>
  <title>ProduBlog</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>


<nav class="navbar navbar-inverse">

<?php
	$con = getDBConnection();

		// als je ingelogt bent staat er log out + username. // als je nog niet bent ingelogt staat er log in
		if(isset($_SESSION['idUsers'])){	
				
			//Maak query gereed om user info te tonen
			$query = "SELECT idUsers, username, email, usertype FROM users WHERE idUsers = :idUsers";
			$user =  $con->prepare($query);
			$user->bindValue(':idUsers', $_SESSION['idUsers']);
			$user->execute();
			//echo $_SESSION['idUsers'];
						
			// Sla resultaat op
			$result = $user->fetch(PDO::FETCH_ASSOC);
			
			echo"
						
			  <div class='container-fluid'>
				<div class='navbar-header'>
				  <a class='navbar-brand' href='home.php'>ProduBlog</a>
				</div>
				<ul class='nav navbar-nav'>
				  <li class='active'><a href='home.php'>Home</a></li>
			";
			if(isset($_SESSION['usertype']) && ( ($_SESSION['usertype'] == 'producer')  or ($_SESSION['usertype'] == 'admin') ) ){
				echo"  <li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#''>Post Opties<span class='caret'></span></a>
					<ul class='dropdown-menu'>

					  
			
				
				  <li><a href='mijnposts.php?id=".$_SESSION['idUsers']."'>Mijn Posts</a></li> 
			  
		
				  <li><a href='producer_posts_create.php'>Creëer Post</a></li> 
				  </ul>
				  </li>
				";
			  }

			  echo"

				  <li><a href='produceroverzicht.php'>Producers overzicht</a></li>
			";
			  if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'){
				echo "  <li><a href='admin_home.php'>Admin Home</a></li> ";
			  }
			echo"
				</ul>
					<ul class='nav navbar-nav navbar-right'>
						<li><a href='mijnaccount.php'><span class='glyphicon glyphicon-user'></span> Mijn Account</a></li>
						<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Uitloggen ".$result['username']."</a></li>
					</ul>	
			</div>
			";
		}else{
			echo"
				<div class='container-fluid'>
					<div class='navbar-header'>
						<a class='navbar-brand' href='#'>ProduBlog</a>
					</div>
					<ul class='nav navbar-nav'>
						<li class='active'><a href='home.php'>Home</a></li>
					</ul>
			
					<ul class='nav navbar-nav navbar-right'>
						<li><a href='register.php'><span class='glyphicon glyphicon-user'></span> Registreer</a></li>
						<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Inloggen</a></li>
					</ul>
				</div>
			";
		}
  
?>
</nav>
<body>
  
<!--<div class="container">
  <h3>Right Aligned Navbar</h3>
  <p>The .navbar-right class is used to right-align navigation bar buttons.</p>
</div> 
-->


