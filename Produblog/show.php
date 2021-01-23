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
		//old code for comment, needs fixing, placed under "got back"
		/*
		<div class='col-lg-3'>
			<a href=''> Comment (0)</a>
		</div>
		*/
		
		
		//old code directing to post_view for button
		//a href='post_view.php?id=".$post->idUsers."'
		
		echo"

		<div class='container2'>
			<div class='content2'>
						
					<div>
					
					<h1>".$post->postname."</h1>
					<hr>
					
					
					<p>Geplaatst op ".date('jS M Y', strtotime($post->datum))."</p>
					<hr>
					
					<p>".$post->postcontent."</p>
					<p><button class='readbtn'><a href="; backbutton($lastpage, $post); echo " >Ga Terug</a></button></p>
					
					

		
					
		
		<hr>
					<div class='row'>
						<div class='col-lg-4'></div>
						<div class='col-lg-6'>
							<form class='form-horizontal' action='ac_comment.php'  method='POST'>
							<input type='hidden' name='idPost' value='".$post->idPost."' >
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
					
					<div class='row'>
						<div class='col-lg-4'></div>
						<div class='col-lg-6'>
						
		<hr>
							<h1>Alle Reacties</h1>
		";
							
							$com_query = "SELECT * FROM comment WHERE idPost = '$id' ";
							$com_result = $con->query($com_query);
							
							if($com_result){
								while($com = $com_result->fetch()){
									$username = $com->username;
									$comment = $com->comment;
									$datum = $com->datum;
								
								echo'
								<hr>
									<p>'.$com->comment.'</p>
									<p>Geplaatst Door: '.$com->username.'</p>
								<hr>	
									';					
								}
							}
					echo"
						</div>
					</div>
					
					</div>              
		

					

		
			</div>
			


			
			
		 </div>
			
		";
				
	}

?>
       

<?php include_once('assets/includes/footer.php'); ?>