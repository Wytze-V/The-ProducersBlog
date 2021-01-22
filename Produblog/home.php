<?php
require_once('assets/includes/include.php');

$con = getDBConnection();

		// als je ingelogt bent staat er log out + username. // als je nog niet bent ingelogt staat er log in
		if(isset($_SESSION['idUsers'])){	
				
			//Maak query gereed om user info te tonen
			$query = "SELECT idUsers, username, email FROM users WHERE idUsers = :idUsers";
			$user =  $con->prepare($query);
			$user->bindValue(':idUsers', $_SESSION['idUsers']);
			$user->execute();
			//echo $_SESSION['idUsers'];
						
			// Sla resultaat op
			$result = $user->fetch(PDO::FETCH_ASSOC);
			
			echo "
			<div class='welkom-home'>
			Welkom ".$result['username']."		
			Hello world!
			</div>
			";
			
		}
		//Admin posts
		$adminposts = getAdminPost();
		
		foreach($adminposts as $adminpost){
			
			echo"
			
			<div class='container2'>
			<div class='content2'>
						
					<div>
					
					<h1>".$adminpost->postname."</h1>
					<hr>
					
					
					<p>Posted on ".date('jS M Y', strtotime($adminpost->datum))."</p>
					<hr>
					
					<p>".$adminpost->postcontent."</p>
			 ";
				if(isset($_SESSION['idUsers'])){
					echo "
					<p><button class='readbtn'><a href='show.php?id=".$adminpost->idPost."'>Lees Meer</a></button></p>
					";
				}
			echo"
					
					</div>              
		

					

		
			</div>
			


			
			
		 </div>
			
		";
			
		}
?>

<?php include_once('assets/includes/footer.php'); ?>