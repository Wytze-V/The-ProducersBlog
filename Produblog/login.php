<?php include_once('assets/includes/include.php'); ?>

<?php 

$con = getDBConnection();

// Check of user al is ingelogd
if(isset($_SESSION['idUsers'])){
	// User is al ingelogd, stuur user naar homepage
	header("location: home.php");
}

//check of email & password zijn gesubmit
if(!empty($_POST['username']) && !empty($_POST['password'])){
	//Maak query gereed om user info te tonen
	$query = "SELECT * FROM users WHERE username = :username";
	$account = $con->prepare($query);
	$account->bindValue(':username', $_POST['username']);
	$account->execute();
	
	// Sla resultaat op
	$result = $account->fetch(PDO::FETCH_ASSOC);
	//var_dump($result);
	
	// als er een resultaat is en het wachtwoord matched, sla dan de sessie op
	if(count($result) > 0 && password_verify($_POST['password'], $result['password'])){
		$_SESSION['idUsers'] = $result['idUsers'];
		$_SESSION['usertype'] = $result['usertype'];
		session_start();
		header("location: home.php");
	} else {
		// niet gelukt om de user te verifiën, return error messages
		echo "Failed to log in";
	}
}

?>

	<div class="login-page">
		<div class="form">
			<form class="login-form" action="" method="POST">
				<input type="text" name="username" placeholder="username"/>
				<input type="password" name="password" placeholder="password"/>
				<button>Login</button>
				<p class="">Not Registered? <a href="register.php">Create an acount</a></p>
				<p class="">Login <a href="home.php">Home</a></p>
			</form>
		</div>
	</div>
	
<?php include_once('assets/includes/footer.php'); ?>