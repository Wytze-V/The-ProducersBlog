<?php
require_once('assets/includes/include.php');

	// hier wordt de input meegenomen naar de functie
    if(isset($_POST['Insert'])){

        //Ophalen form data
        extract($_POST);

        //Standaard validaties
        if($postname ==''){
            $error[] = 'Please enter the title.';
        }if($postcontent ==''){
            $error[] = 'Please enter the content.';
        }if(!isset($error)){

          try {

		// dit is de functie en die wordt uit het bestand functions.php gehaald
		insertPost($postname,$postcontent,$idUsers,$date,$mainpost);
		header("location: ./mijnposts.php");
			}catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

    

		//check voor fout meldingen
		if(isset($error)){
			foreach($error as $error){
				echo '<p class="message">'.$error.'</p>';
			}
		}
		

		}elseif(isset($_POST['Update'])){
		$postname = ($_POST['postname']);
		$postcontent = ($_POST['postcontent']);
		$id = ($_POST['id']);
		
		// dit is de functie en die wordt uit het bestand functions.php gehaald
		updatePost($postname,$postcontent,$id);
		header("location: ./mijnposts.php");
		
		}elseif(isset($_POST['Delete'])){
		$id = ($_POST['id']);
		deletePost($id);
		header("location: ./mijnposts.php");
	}
	
	
?>


