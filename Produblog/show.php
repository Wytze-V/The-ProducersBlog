<?php require_once('assets/includes/include.php');

$con = getDBConnection();
$id = $_GET["id"];

	if(isset($_SESSION['usertype'])){
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
					<p><button class='readbtn'><a href='post_view.php'>Go Back</a></button></p>

					
					</div>              

			</div>
		 </div>
			
		";
				
	}

?>
       

<?php include_once('assets/includes/footer.php'); ?>