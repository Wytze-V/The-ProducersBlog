<?php
require_once('assets/includes/include.php');
//database connectie
$con = getDBConnection();
		//hier wordt gekijken of gebruiker is wel of niet ingelogt
		if(!isset($_SESSION['idUsers'])){
			echo "
			<div class='welkom-home'>
			Welkom, Indien u de volledige posts wilt bekijken moet u inloggen of een account aanmaken.		
			</div>
			";
		}

		// als je ingelogt bent staat er log out + username. // als je nog niet bent ingelogt staat er log in
		if(isset($_SESSION['idUsers'])){	
				
			//Maak query gereed om user info te tonen
			$query = "SELECT idUsers, username, email FROM users WHERE idUsers = :idUsers";
			$user =  $con->prepare($query);
			$user->bindValue(':idUsers', $_SESSION['idUsers']);
			$user->execute();
			
						
			// Sla resultaat op
			$result = $user->fetch(PDO::FETCH_ASSOC);
			
			echo "
			<div class='welkom-home'>
			Welkom ".$result['username']."		
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
					
					<h1>".html($adminpost->postname)."</h1>
					<hr>
					
					
					<p>Geplaatst op ".date('jS M Y', strtotime($adminpost->datum))."</p>
					<hr>
					
					
					
					<p>".$shortdisplay = substr(html($adminpost->postcontent), 0, 200)."...</p>
			 ";
				if(isset($_SESSION['idUsers'])){
					echo "
					<form action='show.php?id=".$adminpost->idPost."' method='post'>
					
					<p><button class='readbtn' type='submit' name='page' value='home' >Lees Meer</button></p>
					
					</form>
					";
				}	
				 if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'){
					echo "
					<p><button class='updatebtn'><a href='editpost.php?id=".$adminpost->idPost."'>Bewerk</a></button></p>
					<p><button class='deletebtn'><a href='deletepost.php?id=".$adminpost->idPost."'>Verwijder</a></button></p>
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