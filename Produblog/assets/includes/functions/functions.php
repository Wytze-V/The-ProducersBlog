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
	

// Hier wordt een Post in de database aangemaakt
function insertPost($postname,$postcontent,$idUsers,$date){
	$con = getDBConnection();
	$sql = "INSERT INTO post
  (postname, postcontent, idUsers, date) VALUES (:postname, :postcontent, :idUsers, :date)"; 
	$stmt = $con->prepare($sql);
	$stmt->execute(array(
    ':postname' => $postname,
    ':postcontent' => $postcontent,
	':idUsers' => $_SESSION['idUsers'],
    ':date' => date('Y-m-d H:i:s'),
    
));
}

function updatePost($postname,$postcontent,$date,$idPost){
	$con = getDBConnection();
	$sql = "UPDATE post SET postname = ?, postcontent= ?,  date =? WHERE  idPost=? ";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($postname,$postcontent,$data,$idPost));
}
?>