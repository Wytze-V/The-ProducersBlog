<?php
 require_once('assets/includes/include.php');
 $id = $_GET["id"];
 print_r($_GET);

	// hier wordt het profiel van de ingelogde gebruiker getoont
  if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'){
		    $gebruiker = getProfileA($id);  
        echo"<div class='login-page'>
                <h3 class='font' >Profiel van ".$gebruiker->username."</h3>
                <hr class='hr'>
                <div class='form'>
                    <form class='register-form' method='POST' action='action/ac_user.php'>
                        <div class='caption loginText'>
                            <label>Gebruikersnaam</label>
                            <input class='form__field' name='username' value='".$gebruiker->username."' >
                            </br>
                            <label>Email</label>
                            <input class='form__field' name='email' value='".$gebruiker->email."'>
                            </br>
                            <label>Usertype</label>
                            <input class='form__field' name='usertype' value='".$gebruiker->usertype."'>
                            </br>
                            <input class='insert_btn' type='submit' value='Wijzig'  name='UpdateA'>
                        </div>
                    </form>
                </div>
            </div>";
	}else{
		echo"
		you do not have access to this page
		<h3 class='loginText'><a class='loginText' href='home.php'>Go home</a></h3>";
	}
?>


<?php include_once('assets/includes/footer.php'); ?>