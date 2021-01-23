<?php

require_once('assets/includes/include.php');

$id = $_SESSION["idUsers"];

if(isset($_SESSION['usertype']) && ( ($_SESSION['usertype'] == 'producer')  or ($_SESSION['usertype'] == 'admin') ) ){
	
			echo "
			<div class='welkom-home'>
			Welkom ".$_SESSION['username']."
			<br>			
			Hier kan je de posts bewerken of verwijderen.
			</div>
			";
	
	$posts = getUserPost($id);
	
		foreach($posts as $post){
		  echo"
		  
		  <div class='container2'>
			<div class='content2'>
						
					<div>
					
					<h1><a href='show.php?id=".$post->idPost."'>".$post->postname."</a></h1>
					<hr>
					
					
					<p>Posted on ".date('jS M Y', strtotime($post->datum))."</p>
					<hr>
					
					<p>".$post->postcontent."</p>		

					
					<form action='show.php?id=".$post->idPost."' method='post'>
					<p><button class='readbtn' type='submit' name='page' value='mijnposts' >Lees Meer</button></p>
					</form>
					
					<p><button class='updatebtn'><a href='editpost.php?id=".$post->idPost."'>Bewerk</a></button></p>
					<p><button class='deletebtn'><a href='deletepost.php?id=".$post->idPost."'>Verwijder</a></button></p>
					
					</div>              

			</div>
		  </div>
		  
		  ";
		}
}


?>		

<?php include_once('assets/includes/footer.php'); ?>