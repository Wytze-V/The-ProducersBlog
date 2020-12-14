<?php
require_once('assets/includes/include.php');

if (!isAdmin()) {
	header('location: login.php');
}

?>