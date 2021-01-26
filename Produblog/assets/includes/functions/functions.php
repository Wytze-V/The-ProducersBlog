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
function updateUser($username,$email,$usertype, $date,$id){
	$con = getDBConnection();
	$sql = "UPDATE users SET username = ?, email= ?, usertype= ?, date= ? WHERE  idUsers=? ";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($username,$email,$usertype,$date,$id));
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

function updateUserA($username,$email,$usertype,$date,$id){
	$con = getDBConnection();
	$sql = "UPDATE users SET username = ?, email= ?, usertype= ?, date= ? WHERE  idUsers=? ";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($username,$email,$usertype,$date,$id));
}

// hier wordt de geselecteerde user verwijderd uit de database
function deleteUserA($id){
	$con = getDbConnection();
	$sql = "DELETE FROM users WHERE idUsers=?";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($id));
}

// Hier wordt een Post in de database aangemaakt
function insertPost($postname,$postcontent,$idUsers,$date,$mainpost){
	$con = getDBConnection();
	$sql = "INSERT INTO post
  (postname, postcontent, idUsers, datum, admin_post) VALUES (:postname, :postcontent, :idUsers, :date, :mainpost)"; 
	$stmt = $con->prepare($sql);
	$stmt->execute(array(
    ':postname' => $postname,
    ':postcontent' => $postcontent,
	':idUsers' => $_SESSION['idUsers'],
    ':date' => date('Y-m-d H:i:s'),
	':mainpost' => $_POST['mainpost'],
    
));
}
// hier wordt een post opgehaald uit de database
function getPost($id = null){
$input_parameters = array();
$con = getDBConnection();
$sql = "SELECT * FROM post";
if($id != null ){
$sql .= " WHERE idPost=? ORDER BY idPost DESC ";
array_push($input_parameters , $id);
}
$stmt = $con->prepare($sql);
$stmt->execute($input_parameters);
return $id != null ? $stmt->fetch() : $stmt->fetchAll();
}

function getUserPost($id){
$row = null;


$input_parameters = array();
$con = getDBConnection();
$sql = "SELECT * FROM post WHERE idUsers ='$id' ORDER BY idPost DESC";

array_push($input_parameters , $row);

$stmt = $con->prepare($sql);
$stmt->execute($input_parameters);
return $row != null ? $stmt->fetch() : $stmt->fetchAll();

}

function updatePost($postname,$postcontent,$id){
	$con = getDBConnection();
	$sql = "UPDATE post SET postname= ?, postcontent= ? WHERE  idPost= ? ";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($postname,$postcontent,$id));
}

// hier wordt de geselecteerde post verwijderd uit de database
function deletePost($id){
	$con = getDbConnection();
	$sql = "DELETE FROM post WHERE idPost=?";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($id));
}

function getAdminPost($id = null){
$input_parameters = array();
$con = getDBConnection();
$sql = "SELECT * FROM post WHERE admin_post='1' LIMIT 3";
array_push($input_parameters , $id);

$stmt = $con->prepare($sql);
$stmt->execute($input_parameters);
return $id != null ? $stmt->fetch() : $stmt->fetchAll();
}

// hier wordt een gebruiker opgehaald uit de database
function getProducer($id = null){
$input_parameters = array();
$con = getDBConnection();
$sql = "SELECT * FROM users WHERE usertype='producer'";
array_push($input_parameters , $id);

$stmt = $con->prepare($sql);
$stmt->execute($input_parameters);
return $id != null ? $stmt->fetch() : $stmt->fetchAll();
}

// Hier wordt een comment in de database aangemaakt
function insertComment($postid,$userid,$username,$comment,$datum){
	$con = getDBConnection();
	$sql = "INSERT INTO comment
  (idPost,idUsers,username,comment,datum)
   VALUES (?,?,?,?,?)";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($postid,$userid,$username,$comment,$datum));
	
}

// hier wordt een post opgehaald uit de database
function getComment($id = null){
$input_parameters = array();
$con = getDBConnection();
$sql = "SELECT * FROM comment";
if($id != null ){
$sql .= " WHERE idPost=? ORDER BY idComment DESC ";
array_push($input_parameters , $id);
}
$stmt = $con->prepare($sql);
$stmt->execute($input_parameters);
return $id != null ? $stmt->fetch() : $stmt->fetchAll();
}

function backbutton($lastpage, $post){
	
	if(isset($lastpage)){
		
		if($lastpage=="home"){
			//go home
			echo"'home.php' ";
			}
		elseif($lastpage=="mijnposts"){
			//go to mijnposts
			echo"'mijnposts.php?id=".$post->idUsers."' ";
			}
		elseif($lastpage=="postview"){
			//go to post_view
			echo"'post_view.php?id=".$post->idUsers."' ";
			}
						
		}
					
	else{
		//go home
		echo" 'home.php' ";
		
	}
}


function html($text){
    return htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function soundupload(){

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["Insert"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  /*if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }*/
  //simplified and modified from image version, needs security checks
  $uploadOk = 1;
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "mp3" && $imageFileType != "wav" && $imageFileType != "ogg"
&& $imageFileType != "flac" ) {
  echo "Sorry, only mp3, wav, ogg & flac files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  die;
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

}


?>