<?php
 require_once('assets/includes/include.php');
	// hier wordt het profiel van de ingelogde gebruiker getoont
	if(isset($_SESSION['email'])){
		echo"<div class='login-page'>
				<h3 class='font' >Profiel van ".$result['username']."</h3>
				<hr class='hr'>
				<div class='form'>
					<form class='register-form' method='POST' action='action/ac_user.php'>
						<div class='caption loginText'>
							<label>Gebruikersnaam</label>
							<input class='form__field' name='username' value='".$result['username']."' >
							</br>
							<label>Email</label>
							<input class='form__field' name='email' value='".$result['email']."'>
							</br>
							<label>Usertype</label>
							<input class='form__field' name='usertype' value='".$result['usertype']."' readonly>
							</br>
							<input class='insert_btn' type='submit' value='Wijzig'  name='Update'>
						</div>
					</form>
				</div>
			</div>";
	}else{
		echo"<h3 class='loginText'><a class='loginText' href='login.php'>Log-in</a> or <a class='loginText' href='register.php'>sign-up</a></h3>";
	}
?>

