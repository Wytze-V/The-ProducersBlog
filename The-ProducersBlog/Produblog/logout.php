<?php
// Start the session ready to destroy the details
session_start();

//Destroy all evidence
session_unset();
session_destroy();
header("location: login.php");

?>