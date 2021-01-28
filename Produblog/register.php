<?php require_once('assets/includes/include.php'); 

// kijk of user al is ingelogd
if(isset($_SESSION['idUsers'])){
	// User is al ingelogd, stuur user naar homepage
	header("location: home.php");
}

?>
	<div class="login-page">
		<div class="form">
			<form class="register-form" action="ac_user.php" method="POST">
				<input type="text" name="username" placeholder="Gebruikers Naam"/>
				<input type="password" name="password" placeholder="Wachtwoord"/>
				<input type="password" name="confirm-password" placeholder="Herhaal Wachtwoord"/>
				<input type="text" name="email" placeholder="Email"/>
				<input type="hidden" name="usertype" value="gebruiker"/>
				<input class= 'insert_btn' type='submit' value='Meld je aan!' name='Insert'>
				<p class="">Al geregistreerd? <a href="login.php">Klik hier om in te loggen</a></p>
				<p class="">Ga <a href="home.php">Naar Home</a></p>
			</form>
		</div>
	</div>


<?php include_once('assets/includes/footer.php'); ?>