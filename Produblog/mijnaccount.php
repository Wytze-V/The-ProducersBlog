<?php
 require_once('assets/includes/include.php');

if (isset($_SESSION['idUsers'])) {
    echo "Welcome to the member's area, " . $_SESSION['username'] . "!";
	
	error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
 
	$con = getDBConnection();

	$user_id=$_SESSION['idUsers']; // Collecting one record with for user
	$count=$con->prepare("SELECT * from users WHERE idUsers=:idUsers");
	$count->bindParam(":idUsers",$user_id,PDO::PARAM_INT,1);

	if($count->execute()){
	//echo " <br><br>Success";
	$row = $count->fetch(PDO::FETCH_ASSOC);
	//print_r($row);
	echo "<hr>";
	echo "ID = $row[idUsers]";
	echo "<br>username = $row[username]";
	echo "<br>Email = $row[email]";
	echo "<br>Usertype = $row[usertype]";
	echo "<br>password = $row[password]";
	
	} 
}else {
    echo "Please log in first to see this page.";
}

?>