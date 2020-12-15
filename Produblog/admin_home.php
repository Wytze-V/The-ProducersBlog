<?php
require_once('assets/includes/include.php');

  if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'){
	echo"
	hoi
	";

}else{
	header('location: home.php');
}

?>