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
//gebruikers informatie update
function updateUser($username,$email,$usertype, $date,$id){
	$con = getDBConnection();
	$sql = "UPDATE users SET username = ?, email= ?, usertype= ?, date= ? WHERE  idUsers=? ";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($username,$email,$usertype,$date,$id));
}
//file upload file naam clean
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
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

// hier wordt een gebruiker opgehaald uit de database voor admin
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
//gebruikers informatie beijgewerkt door admin
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
function insertPost($postname,$postcontent,$idUsers,$file_ops,$date,$mainpost){
	$con = getDBConnection();
	$sql = "INSERT INTO post
  (postname,postcontent,idUsers,file_ops,datum,admin_post) VALUES (:postname,:postcontent,:idUsers,:file_ops,:date,:mainpost)"; 
	$stmt = $con->prepare($sql);
	$stmt->execute(array(
    ':postname' => $postname,
    ':postcontent' => $postcontent,
	':idUsers' => $_SESSION['idUsers'],
	':file_ops' => $file_ops,
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
//Posts van een specific user ophalen
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
//Hier wordt post bijgewerkt
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

// hier wordt de geselecteerde Comment verwijderd uit de database
function deleteComment($id){
	$con = getDbConnection();
	$sql = "DELETE FROM comment WHERE idComment=?";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($id));
}
//hier word alle posts van admin opgehaald voor op home pagina
function getAdminPost($id = null){
$input_parameters = array();
$con = getDBConnection();
$sql = "SELECT * FROM post WHERE admin_post='1' ORDER BY idPost DESC LIMIT 5";
array_push($input_parameters , $id);

$stmt = $con->prepare($sql);
$stmt->execute($input_parameters);
return $id != null ? $stmt->fetch() : $stmt->fetchAll();
}

// hier wordt een producer opgehaald uit de database
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

// hier wordt een comment opgehaald uit de database
function getComment(){
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

//button die naar de vorige pagina gaat
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

//database informatie deiplay als html text (zorgd ervoor dat scripts in databse niet kan uitgevoord
function html($text){
    return htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

//uploaden van geluids bestand
function soundupload(){

$dbFile = null;
$idu = $_SESSION['idUsers'];
$target_dir = "uploads/$idu/";
$postname = $_POST['postname'];
$postnamec = clean($postname);
$targetfold = "$postnamec/";
$target_file = $target_dir . $targetfold . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// controleer of file is doorgegeven
if(isset($_POST["Insert"])) {
  
  $uploadOk = 1;
}

// controleer of bestand bestaat
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// controleer bestand grote
if ($_FILES["fileToUpload"]["size"] > 500000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Toestemming voor beperkte file formats
if($imageFileType != "mp3" && $imageFileType != "wav" && $imageFileType != "ogg"
&& $imageFileType != "flac" && $imageFileType != "midi" ) {
  echo "Sorry, only the following files are allowed: mp3, wav, ogg, flac, midi.";
  $uploadOk = 0;
}

// controleer of $uploadOk, 0 is als error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  return $dbFile;
  
// Alles goed, upload file
} else {
	
	if(is_dir($target_dir) != true ){
		
	mkdir($target_dir);
	
	}
	
	if(is_dir($target_dir . $targetfold) != true ){
		
	mkdir($target_dir . $targetfold);
	
	}
	
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
	
	
	
	$dbFile = $postnamec;
	return $dbFile;
	
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


}

//displayed en speelt audio fragmenten af
function pageaudio($post){
	if(($post->file_ops) != null){
			
			$upload = 'uploads/';
			$postidu = $post->idUsers;
			$fileloc = $post->file_ops;
			$bksl = '/';
		
			
		
			$dirget = ($upload.$postidu.$bksl.$fileloc.$bksl);
			
		
			$directory = scandir($dirget);
			
			
			foreach($directory as $item){
				
				if(($item != '.') ){
					if($item != '..'){
						$getaudio = $dirget.$item;
						$ext = pathinfo($getaudio, PATHINFO_EXTENSION);
						echo"
							
							<audio controls>
							<source src='$getaudio' type='audio/$ext'>
							</audio>
							
						";
						
				
					}
				}
			
			}
			
			
	}
	
}











?>