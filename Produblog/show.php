<?php require_once('assets/includes/include.php');

$con = getDBConnection();
$id = $_GET["id"];


	
if(isset($_POST["page"])){
		$lastpage = $_POST["page"];
	}
else{
	$lastpage = null;	
}

//debug stuff
/*	
var_dump($lastpage);
if(isset($lastpage)){
	echo" Lastpage set!";
}
*/

	if(isset($_SESSION['idUsers'])){
		$post = getPost($id);
		//if post does not exists redirect user.
		if($post->idPost == null){
			header('Location: ./');
			exit;
		}
		//old code for comment, needs fixing, placed under "go back"
		/*
		<div class='col-lg-3'>
			<a href=''> Comment (0)</a>
		</div>
		*/
		
		
		//old code directing to post_view for button
		//a href='post_view.php?id=".$post->idUsers."'
		
		$myAudioFile = "uploads/11 Blue Christmas.mp3";
		
		$path = $myAudioFile;
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		print_r($ext);
		
		
		
		if(file_exists($myAudioFile) == true){
			echo'Found file!';
		}
		echo"

		<div class='container2'>
			<div class='content2'>
						
					<div>
					
					<h1>".html($post->postname)."</h1>
					<hr>
					
					
					<p>Geplaatst op ".html(date('jS M Y', strtotime($post->datum)))."</p>
					<hr>
					
					<audio controls autoplay='true' style='display:none;'>
					<source src='$myAudioFile' type='audio/$ext'>
					</audio>
					
					<p>".html($post->postcontent)."</p>
					<p><button class='readbtn'><a href="; backbutton($lastpage, $post); echo " >Ga Terug</a></button></p>
					
					</div>
			</div>
		</div>
					
			<div class='container2'>
			<div class='content2'>
		<hr class='darkrow'>
					<div class='row'>
						<div class='col-lg-4'></div> 
						<div class='col-lg-10'>
							<form class='form-horizontal' action='ac_comment.php'  method='POST'>
							<input type='hidden' name='idPost' value='".html($post->idPost)."' >
								<div class='form-group'>
									<label class='col-lg-3 control-label'>Reageren</label>
									<div class='col-lg-9'>
										<textarea class='form-control' rows='5' cols='10' name='comment' placeholder='Plaats reactie'></textarea>
									</div>
								</div>
								<input type='submit' name='postcomment' value='Reageer' class='btn btn-primary'>
							</form>
				
						</div>
					</div>
							<hr class='darkrow'>
					<div class='row'>
						<!-- <div class='col-lg-4'></div> -->
						<div class='col-lg-6'>
						

							<h1>Alle Reacties</h1>
		";
							
							$com_query = "SELECT * FROM comment WHERE idPost = '$id' ORDER BY idComment DESC ";
							$com_result = $con->query($com_query);
							
							if($com_result){
								while($com = $com_result->fetch()){
									$username = $com->username;
									$comment = $com->comment;
									$datum = $com->datum;
									$idComment = $com->idComment;
									$idUsers = $com->idUsers;
								
								echo"
								<hr class='darkrow'>
									<p>".html($com->comment)."</p>
									<p>Geplaatst Door: ".html($com->username)."</p>
									

									";	if(isset($_SESSION['idUsers']) && ($_SESSION['idUsers'] == html($com->idUsers)) ){
											echo"
											
											<form action='ac_comment.php' method='POST'>
											<input type='hidden' name='id' value='".html($com->idComment)."' >
											<input type='hidden' name='idPost' value='".html($com->idPost)."' >
											
												<input class= 'deletebtn' type='submit' value='Verwijder' name='Delete'>
								
											</form>
											";	
									}										
								}
							}
					echo"
						</div>
					</div>
					
					<!-- </div>   -->        
		

					

		
			</div>
			


			
			
		 </div>
			
		";
				
	}

?>
       

<?php include_once('assets/includes/footer.php'); ?>