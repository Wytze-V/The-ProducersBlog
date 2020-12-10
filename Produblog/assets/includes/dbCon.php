<?php
function getDBConnection(){
	
	$host = 'localhost'; //IP of database, in this case my host machine
	$user = 'root'; //username to use
	$pass = ''; // password of the user
	$db = 'produblog'; //name of the database
	
	static $con;
	
	if ($con) return $con;
	
	Try{
		$con = new PDO ('mysql:host ='.$host.';charset=utf8;dbname='.$db, $user, $pass);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	}	
	catch (Exception $e)
	{
			die('Caught exception: '. $e->getMessage()
				);
	}
	return $con;
	
}
?>