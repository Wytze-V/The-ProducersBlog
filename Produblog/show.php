<?php require_once('assets/includes/include.php');

$con = getDBConnection();
$id = $_GET["id"];

	if(isset($_SESSION['idUsers'])){
		$post = getPost($id);
		//if post does not exists redirect user.
		if($post->idPost == null){
			header('Location: ./');
			exit;
		}
		echo"

		<div class='container2'>
			<div class='content2'>
						
					<div>
					
					<h1>".$post->postname."</h1>
					<hr>
					
					
					<p>Posted on ".date('jS M Y', strtotime($post->datum))."</p>
					<hr>
					
					<p>".$post->postcontent."</p>
					<p><button class='readbtn'><a href='post_view.php?id=".$post->idUsers."'>Go Back</a></button></p>

					<div class='col-lg-3'>
						<a href=''> Comment (0)</a>
					</div>

					<div class='row'>
						<div class='col-lg-4'></div>
						<div class='col-lg-6'>
							<form class='form-horizontal' action='ac_comment.php'  method='POST'>
							<input type='hidden' name='idPost' value='".$post->idPost."' >
								<div class='form-group'>
									<label class='col-lg-3 control-label'>Add Comment</label>
									<div class='col-lg-9'>
										<textarea class='form-control' rows='5' cols='10' name='comment' placeholde='comment'></textarea>
									</div>
								</div>
								<input type='submit' name='postcomment' value='comment' class='btn btn-primary'>
								<a href='home.php' class='btn btn-default'>Ga terug naar home</a>
							</form>
				
						</div>
					</div>
					
					<div class='row'>
						<div class='col-lg-4'></div>
						<div class='col-lg-6'>
							<h1>All Comments</h1>
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
									<p>Posted By: '.$com->username.'</p>
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