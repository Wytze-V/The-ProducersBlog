<?php

require_once('assets/includes/include.php');

$con = getDBConnection();

$posts = getPost();



if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'producer'){

	}
	else{
		foreach($posts as $post){
		  echo"
		  <div class='posts-page' >
		  <hr class='hr'>
			<div class='form'>
			  <form class='posts-form'>
				<div class-'caption loginText'>
					<label>post naam</label>
					<input class='form__field' name='username' value='".$post->postname."' readonly>
					</br>
					<label>post content</label>
					<input class='form__field' name='email' value='".$post->postcontent."' readonly>
					</br>
				</div>
			  </form>
			</div>
		  </div>";
		}
	}

?>		

<?php include_once('assets/includes/footer.php'); ?>