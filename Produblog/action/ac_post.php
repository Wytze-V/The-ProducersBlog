<?php
require_once('../assets/includes/include.php');
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
		header("location: ../home.php");
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
		$username = ($_POST['username']);
		$email = ($_POST['email']);
		$usertype = $_SESSION['usertype'];
		$id = $_SESSION['idUsers'];
		// dit is de functie en die wordt uit het bestand functions.php gehaald
		updateUser($username,$email,$usertype,$id);
		header("location: ../mijnaccount.php");
	}
?>