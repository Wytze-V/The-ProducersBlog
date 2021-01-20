<?php
require_once('assets/includes/include.php');
	// hier wordt de input meegenomen naar de functie
    if(isset($_POST['Insert'])){

        //collect form data
        extract($_POST);

        //very basic validations
        if($postname ==''){
            $error[] = 'Please enter the title.';
        }if($postcontent ==''){
            $error[] = 'Please enter the content.';
        }if(!isset($error)){

          try {

		// dit is de functie en die wordt uit het bestand functions.php gehaald
		insertPost($postname,$postcontent,$idUsers,$date);
		header("location: ./post_view.php");
			}catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

    

		//check for any errors
		if(isset($error)){
			foreach($error as $error){
				echo '<p class="message">'.$error.'</p>';
			}
		}
		

		}elseif(isset($_POST['Update'])){
		$postname = ($_POST['postname']);
		$postcontent = ($_POST['postcontent']);
		$idu = $_SESSION['idUsers'];
		$id = ($_POST['id']);
		
		// dit is de functie en die wordt uit het bestand functions.php gehaald
		updatePost($postname,$postcontent,$usertype,$idu,$id);
		header("location: producer_posts.php");
		
		}elseif(isset($_POST['Delete'])){
		$id = $_GET['id'];
		deletePost($id);
		header("location: ./post_view.php");
	}
?>

