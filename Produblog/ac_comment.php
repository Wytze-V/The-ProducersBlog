<?php
require_once('assets/includes/include.php');
	// hier wordt de input meegenomen naar de functie
	
    if(isset($_POST['postcomment'])){
		$postid = $_POST['idPost'];			
		$userid = $_SESSION['idUsers'];		
		$username = $_SESSION['username'];	
		$comment = $_POST['comment'];
		$datum = date('Y-m-d H:i:s');
	if($comment != ""){
		
		insertComment($postid,$userid,$username,$comment,$datum);
		header("location: ./show.php?id=" . $postid);
		
	}
		//hier wordt de comment verwijderd
	}elseif(isset($_POST['Delete'])){
		$id = ($_POST['id']);
		$postid = $_POST['idPost'];
		print_r($_POST);
		deleteComment($id);
		header("location: ./show.php?id=" . $postid);
	}
?>