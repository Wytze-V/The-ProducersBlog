<?php require_once('assets/includes/include.php'); ?>

<?php
$con = getDBConnection();

// Check if email & password has been submitted
if(!empty($_POST['email']) && !empty($_POST['password'])){
	//maak query string gereed
	$query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
	$stmt = $con->prepare($query);
	
	// laat query string zien waar de values staan
	$stmt->bindValue(':username', $_POST['username']);
	$stmt->bindValue(':email', $_POST['email']);
	$stmt->bindValue(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
	
	if( $stmt->execute() ){
		echo 'Success';
	} else {
		echo 'Failure: ';
		print $stmt->errorCode();
	}

} 
?>

	<div class="login-page">
		<div class="form">
			<form class="register-form" action="" method="POST">
				<input type="text" name="username" placeholder="username"/>
				<input type="password" name="password" placeholder="password"/>
				<input type="text" name="email" placeholder="email address"/>
				<button>Create</button>
				<p class="">Already registered? <a href="login.php">Sign in</a></p>
				<p class="">Go <a href="/webdev/user/">Home</a></p>
			</form>
		</div>
	</div>
	
<?php include_once('assets/includes/footer.php'); ?>