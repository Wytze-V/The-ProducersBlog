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
					<p><button class='readbtn'><a href='post_view.php'>Go Back</a></button></p>

					<div class='col-lg-3'>
						<a href=''> Comment (0)</a>
					</div>

					<div class='row'>
						<div class='col-lg-4'></div>
						<div class='col-lg-6'>
							<form class='form-horizontal' action='ac_comment.php'  method='POST'>
								<div class='form-group'>
									<label class='col-lg-3 control-label'>Add Comment</label>
									<div class='col-lg-9'>
										<textarea class='form-control' rows='5' cols='10' name='comment' placeholde='Comment'></textarea>
									</div>
								</div>
								<input type='submit' name='postcomment' value='Comment' class='btn btn-primary'>
								<a href='home.php' class='btn btn-default'>Go home</a>
							</form>
				
						</div>
					</div>
					
					</div>              
		

					

		
			</div>
			


			
			
		 </div>
			
		";
			
		}
?>

<?php include_once('assets/includes/footer.php'); ?>