<?php

require_once('assets/includes/include.php');

$id = $_GET["id"];
print_r($_GET);



if(isset($_SESSION['usertype'])){
	$posts = getPostPro();
	
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
					<p><button class='readbtn'><a href='show.php?id=".$post->idPost."'>Read More</a></button></p>

					
					</div>              

			</div>
		  </div>
		  
		  ";
		}
}


?>		

<?php include_once('assets/includes/footer.php'); ?>