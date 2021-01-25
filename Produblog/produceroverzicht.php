<?php
require_once('assets/includes/include.php');

    if(isset($_SESSION['idUsers'])){ 
		$con = getDBConnection();
		$producers = getProducer();
	
		foreach($producers as $producer){
			echo"
				<div class='container3'>
				<div class='content2'>
					
					<div>
					
					<h1><a href='post_view.php?id=".html($producer->idUsers)."'>".html($producer->username)."</a></h1>
					<hr>
					<p><button class='readbtn'><a href='post_view.php?id=".html($producer->idUsers)."'>Ga naar pagina</a></button></p>
					<hr>
					
					</div>
				
				</div>
				</div>
			";			
		}
	
	}
?>

<?php include_once('assets/includes/footer.php'); ?>