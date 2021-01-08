<?php require_once('assets/includes/include.php'); ?>

<div class="login-page">
		<div class="form">
			<form class="register-form" action="" method="POST">
				<input type="text" name="username" placeholder="username"/>
				<input type="password" name="password" placeholder="password"/>
				<input type="password" name="confirm-password" placeholder="confirm-password"/>
				<input type="text" name="email" placeholder="email address"/>
				<input type="hidden" name="usertype" value="gebruiker"/>
				<button>Create</button>
				<p class="">Already registered? <a href="login.php">Sign in</a></p>
				<p class="">Go <a href="home.php">Home</a></p>
			</form>
		</div>
	</div>





<?php

$con = getDBConnection();

// kijk of user al is ingelogd
if(isset($_SESSION['idUsers'])){
	// User is al ingelogd, stuur user naar homepage
	header("location: home.php");
}

// Check if email & password has been submitted

//delcare Post = data

$data = $_POST;



if (empty($data['username']) ||
    empty($data['password']) ||
    empty($data['email']) ||
    empty($data['confirm-password'])) {
    
    die('One or more fields are not filled in properly');
	
	
}

if ($data['password'] !== $data['confirm-password']) {
   die('Password and Confirm password do not match!');   
}

else {
	
	//maak query string gereed
	$query = "INSERT INTO users (username, email, password, usertype) VALUES (:username, :email, :password, :usertype)";
	$stmt = $con->prepare($query);
	
	// laat query string zien waar de values staan
	$stmt->bindValue(':username', $_POST['username']);
	$stmt->bindValue(':email', $_POST['email']);
	$stmt->bindValue(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
	$stmt->bindValue(':usertype', $_POST['usertype']);
	
	if( $stmt->execute() ){
		//echo 'Success';
		header("location: login.php");
	} else {
		echo 'Failure: ';
		print $stmt->errorCode();
	}
	
}
	


/*if(!empty($_POST['email']) && !empty($_POST['password'])){
	//maak query string gereed
	$query = "INSERT INTO users (username, email, password, usertype) VALUES (:username, :email, :password, :usertype)";
	$stmt = $con->prepare($query);
	
	// laat query string zien waar de values staan
	$stmt->bindValue(':username', $_POST['username']);
	$stmt->bindValue(':email', $_POST['email']);
	$stmt->bindValue(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
	$stmt->bindValue(':usertype', $_POST['usertype']);
	
	if( $stmt->execute() ){
		//echo 'Success';
		header("location: login.php");
	} else {
		echo 'Failure: ';
		print $stmt->errorCode();
	}

}*/
?>

	
	
<?php include_once('assets/includes/footer.php'); ?>