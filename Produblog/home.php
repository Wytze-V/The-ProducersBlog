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
		//Admin posts
		$adminposts = getAdminPost();
		//old action triggers for button
		//<a href='show.php?id=".$adminpost->idPost."'>Lees Meer</a>
		foreach($adminposts as $adminpost){
			
			$text = $adminpost->postname;
			$postname = html($text);
			
			$text = $adminpost->postcontent;
			$postcontent = html($text);
			echo"
			
			<div class='container2'>
			<div class='content2'>
						
					<div>
					
					<h1>"/*.$adminpost->postname.*/.$postname."</h1>
					<hr>
					
					
					<p>Geplaatst op ".date('jS M Y', strtotime($adminpost->datum))."</p>
					<hr>
					
					<p>"/*.$adminpost->postcontent.*/.$postcontent."</p>
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