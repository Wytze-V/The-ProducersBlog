<?php
 require_once('assets/includes/include.php');
 $id = $_GET["id"];

	// hier wordt het profiel van de ingelogde gebruiker getoont
  if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'){
		    $gebruiker = getProfileA($id);  
        echo"<div class='delete-page'>
                <h3 class='font' >Weet je zeker dat je deze gebruiker wil verwijderen? ".html($gebruiker->username)."</h3>
                <hr class='hr'>
                <div class='form'>
                    <form class='register-form' method='POST' action='ac_user.php'>
                        <div class='caption loginText'>
							<input type='hidden' name='id' value='".html($gebruiker->idUsers)."' >
                            <label>Gebruikersnaam</label>
                            <input class='form__field' name='username' value='".html($gebruiker->username)."' readonly>
                            </br>
                            <label>Email</label>
                            <input class='form__field' name='email' value='".html($gebruiker->email)."'readonly>
                            </br>
                            <label>Usertype</label>
							<input class='form__field' name='usertype' value='".html($gebruiker->usertype)."'readonly>

							</br>
                            </br>
						<input class= 'delete_btn' type='submit' value='Delete!' name='Delete'>

                        </div>
                    </form>
						<p><button class='readbtn'><a href='admin_home.php'>Ga Terug</a></button></p>
                </div>
            </div>";
	}else{
		echo"
		you do not have access to this page
		<h3 class='loginText'><a class='loginText' href='home.php'>Go home</a></h3>";
	}
?>


<?php include_once('assets/includes/footer.php'); ?>