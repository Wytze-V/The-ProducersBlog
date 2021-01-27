<?php
require_once('assets/includes/include.php');
	// hier wordt de input meegenomen naar de functie
    if(isset($_POST['Insert'])){
		
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
		
		else{
		
		$username = ($_POST['username']);
		$password = ($_POST['password']);
		$usertype = ($_POST['usertype']);
		$email = ($_POST['email']);
		$date = date('Y-m-d H:i:s');
		// dit is de functie en die wordt uit het bestand functions.php gehaald
		insertUser($username,password_hash($password, PASSWORD_DEFAULT),$usertype,$email,$date);
		header("location: login.php");
		}
		}elseif(isset($_POST['Update'])){
		$username = ($_POST['username']);
		$email = ($_POST['email']);
		$usertype = ($_SESSION['usertype']);
		$date = date('Y-m-d H:i:s');
		$id = ($_SESSION['idUsers']);

		// dit is de functie en die wordt uit het bestand functions.php gehaald
		updateUser($username,$email,$usertype,$date, $id);
		header("location: mijnaccount.php");
		
		}elseif(isset($_POST['UpdateA'])){
		$username = ($_POST['username']);
		$email = ($_POST['email']);
		$usertype = ($_POST['usertype']);
		$date = date('Y-m-d H:i:s');
		$id = ($_POST['id']);

	//	$id = ($_SESSION['idUsers']);
		// dit is de functie en die wordt uit het bestand functions.php gehaald
		updateUserA($username,$email,$usertype,$date, $id);
		header("location: admin_home.php");
		}elseif(isset($_POST['Delete'])){
		$id = ($_POST['id']);
		deleteuserA($id);
		header("location: ./admin_home.php");
	}
?>
