<?php
// Hier worden de gebruikers uit de database opgehaald
function getUser($idUsers = null){
	$input_parameters = array();
	
	$con = getDBConnection();
	$query = "SELECT * FROM users";
	if($idUsers != null){
		$query .= " WHERE idUsers=? ";
		array_push($input_parameters , $idUsers);
	}
	$stmt = $con->prepare($query);
	$stmt->execute($input_parameters);
	return $idUsers != null ? $stmt->fetch() : $stmt->fetchAll();
}


?>