<?php
// Hier wordt een account in de database aangemaakt
function insertUser($username,$password,$usertype,$email){
	$con = getDBConnection();
	$sql = "INSERT INTO users
  (username,password,usertype,email)
   VALUES (?,?,?,?)";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($username,$password,$usertype,$email));
}
function updateUser($username,$email,$nummer,$idUsers){
	$con = getDBConnection();
	$sql = "UPDATE users SET username = ?, email= ? WHERE  idUsers=? ";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($username,$email,$idUsers));
}
	

?>