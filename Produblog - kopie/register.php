<?php require_once('assets/includes/include.php'); 

$con = getDBConnection();

// kijk of user al is ingelogd
if(isset($_SESSION['idUsers'])){
	// User is al ingelogd, stuur user naar homepage
	header("location: home.php");
}

?>
	<div class="login-page">
		<div class="form">
			<form class="register-form" action="ac_user.php" method="POST">
				<input type="text" name="username" placeholder="username"/>
				<input type="password" name="password" placeholder="password"/>
				<input type="password" name="confirm-password" placeholder="confirm-password"/>
				<input type="text" name="email" placeholder="email address"/>
				<input type="hidden" name="usertype" value="gebruiker"/>
				<input class= 'insert_btn' type='submit' value='Meld je aan!' name='Insert'>
				<p class="">Already registered? <a href="login.php">Sign in</a></p>
				<p class="">Go <a href="home.php">Home</a></p>
			</form>
		</div>
	</div>


<?php include_once('assets/includes/footer.php'); ?>