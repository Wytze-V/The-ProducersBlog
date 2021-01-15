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
			</div>
			";
			
		}
?>