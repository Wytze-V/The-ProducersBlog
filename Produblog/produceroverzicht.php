<?php
require_once('assets/includes/include.php');

    if(isset($_SESSION['idUsers'])){ 
		$con = getDBConnection();
		$producers = getProducer();
	
		foreach($producers as $producer){
			echo"
				<div class='container2'>
				<div class='content2'>
					
					<div>
					
					<h1><a href='post_view.php?username=".$producer->username."'>".$producer->username."</a></h1>
					<p><button class='readbtn'><a href='post_view.php?username=".$producer->username."'>Go to page</a></button></p>
					<hr>
					
					</div>
				
				</div>
				</div>
			";			
		}
	
	}
?>

<?php include_once('assets/includes/footer.php'); ?>