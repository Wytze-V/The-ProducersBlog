<?php

require_once('assets/includes/include.php');

$id = $_GET["id"];

if(isset($_SESSION['usertype'])){
	$posts = getUserPost($id);
	
		foreach($posts as $post){
			
			$text = $post->postname;
			$postname = html($text);
			
			$text = $post->postcontent;
			$postcontent = html($text);
			
			
		  
		  echo"
		  
		  <div class='container2'>
			<div class='content2'>
						
					<div>
					
					<h1><a href='show.php?id=".$post->idPost."'>"/*.$post->postname.*/.$postname. "</a></h1>
					<hr>
					
					
					<p>Geplaatst op ".date('jS M Y', strtotime($post->datum))."</p>
					<hr>
					
					<p>"/*.$post->postcontent.*/.$postcontent."</p>
					
					
					<form action='show.php?id=".$post->idPost."' method='post'>
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