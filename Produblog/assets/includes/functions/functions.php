<?php
// Hier wordt een account in de database aangemaakt
function insertUser($username,$password,$usertype,$email,$date){
	$con = getDBConnection();
	$sql = "INSERT INTO users
  (username,password,usertype,email,date)
   VALUES (?,?,?,?,?)";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($username,$password,$usertype,$email,$date));
	
}
function updateUser($username,$email,$nummer,$id){
	$con = getDBConnection();
	$sql = "UPDATE users SET username = ?, email= ? WHERE  idUsers=? ";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($username,$email,$id));
}

// hier wordt een gebruiker opgehaald uit de database
function getProfile($id = null){
$input_parameters = array();
$con = getDBConnection();
$sql = "SELECT * FROM users";
if($id != null ){
$sql .= " WHERE idUsers=? ";
array_push($input_parameters , $id);
}
$stmt = $con->prepare($sql);
$stmt->execute($input_parameters);
return $id != null ? $stmt->fetch() : $stmt->fetchAll();
}

// hier wordt een gebruiker opgehaald uit de database
function getProfileA($id = null){
$input_parameters = array();
$con = getDBConnection();
$sql = "SELECT * FROM users";
if($id != null ){
$sql .= " WHERE idUsers=? ";
array_push($input_parameters , $id);
}
$stmt = $con->prepare($sql);
$stmt->execute($input_parameters);
return $id != null ? $stmt->fetch() : $stmt->fetchAll();
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
	$stmt->execute(array($postname,$postcontent,$date,$idPost));
}


?>