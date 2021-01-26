<?php

require_once('assets/includes/include.php');

$id = $_GET["id"];

if(isset($_SESSION['usertype'])){
	$posts = getUserPost($id);
	
	echo"	
			<p><button class='gaterugbtn'><a href='produceroverzicht.php'>Ga Terug</a></button></p>
	";
	
		foreach($posts as $post){
			
			
			

			
		  
		  echo"
		  
		  
		  <div class='container2'>
			<div class='content2'>
						
					<div>
					
					<h1><a href='show.php?id=".html($post->idPost)."'>".html($post->postname). "</a></h1>
					<hr>
					
					
					<p>Geplaatst op ".html(date('jS M Y', strtotime($post->datum)))."</p>
					<hr>
					
					<p>".$shortdisplay = substr(html($post->postcontent), 0, 200)."...</p>
					
					
					<form action='show.php?id=".html($post->idPost)."' method='post'>
					<p><button class='readbtn' type='submit' name='page' value='postview' >Lees Meer</button></p>
					</form>
					
					</div>              

			</div>
		  </div>
		  
		  ";
		}
}


?>		

<?php include_once('assets/includes/footer.php'); ?>