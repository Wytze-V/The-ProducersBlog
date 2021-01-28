<?php
//Sessie starten op het op te ruimen
session_start();

//Alles van sessie vernietigd
session_unset();
session_destroy();
header("location: login.php");

?>