<?php
 require_once('assets/includes/include.php');
 $id = $_GET["id"];
 
 
if(isset($_SESSION['usertype']) && ( ($_SESSION['usertype'] == 'producer')  or ($_SESSION['usertype'] == 'admin') ) ){
	
	$post = getPost($id);
	echo"

		<div class='postcre'>


		<div class='content'>
		 
			<h2>Pas post aan</h2>


		 <form action='ac_post.php' method='POST'>
		 
				<input type='hidden' name='id' value='".html($post->idPost)."' >
				<h4><label>Titel</label><br>
				<input type='text' name='postname' style='width:100%;height:40px' value='".html($post->postname)."'readonly></h4>

				<h4><label>Post Inhoud</label><br>
				<textarea readonly name='postcontent' id='textarea1' class='mceEditor' cols='120' rows='20'>".html($post->postcontent)."</textarea></h4>
				
				
				<input class= 'delete_btn' type='submit' value='Verwijder!' name='Delete'>


			</form>
			
		</div>

		</div>
	"; 	
}else{
	echo"
		you do not have access to this page
		<h3 class='loginText'><a class='loginText' href='home.php'>Go home</a></h3>
	";
}
 
?>