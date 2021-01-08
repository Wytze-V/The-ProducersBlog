<?php
// Hier worden de gebruikers uit de database opgehaald
function getUser($id = null){
	$input_parameters = array();
	
	$con = getDBConnection();
	$query = "SELECT * FROM users";
	if($id!= null){
		$query = " SELECT * FROM users WHERE idUsers=? ";
		array_push($input_parameters , $id);
	}
	$stmt = $con->prepare($query);
	$stmt->execute($input_parameters);
	return $id != null ? $stmt->fetch() : $stmt->fetchAll();
}


?>