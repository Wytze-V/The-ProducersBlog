<?php
 require_once('assets/includes/include.php');
//Hier word het id van de post meegenomen van de vorige pagina
 $id = $_GET["id"];
 
//Hier word gecontroleerd of de gebruiker is ingelogd en of de gebruiker producer of admin is anders geen toegang
if(isset($_SESSION['usertype']) && ( ($_SESSION['usertype'] == 'producer')  or ($_SESSION['usertype'] == 'admin') ) ){

//hier definiëren wij dat variable post de functie getPost moet uitvoeren met het meegegeven id
	$post = getPost($id);
	echo"

		<div class='postcre'>


			<div class='content'>
		 
			<h2>Pas post aan</h2>


				<form action='ac_post.php' method='POST'>
		 
					<input type='hidden' name='id' value='".html($post->idPost)."' >
					<h4><label>Titel</label><br>
					<input type='text' name='postname' style='width:100%;height:40px' value='".html($post->postname)."'></h4>

					<h4><label>Post Inhoud</label><br>
					<textarea name='postcontent' id='textarea1' class='mceEditor' cols='120' rows='20'>".html($post->postcontent)."</textarea></h4>
					
					<input class= 'insert_btn' type='submit' value='Wijzig Post!' name='Update'>


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



