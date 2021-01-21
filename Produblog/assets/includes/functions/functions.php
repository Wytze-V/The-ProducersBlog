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


function updatePost($postname,$postcontent,$date,$idPost){
	$con = getDBConnection();
	$sql = "UPDATE post SET postname = ?, postcontent= ?,  datum =? WHERE  idPost=? ";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($postname,$postcontent,$date,$idPost));
}
// hier wordt de geselecteerde tosti verwijderd uit de database
function deletePost($id){
	$con = getDbConnection();
	$sql = "DELETE FROM post WHERE idPost=?";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($id));
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

function adminpost(){
	if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'){
		echo'
		<div>
        <input type="checkbox" id="Mainpost" name="Mainpost" value="1">
		<label for="Mainpost">Posten als hoofd article</label><br>
        </div>';
	}
		
}

function getAdminPost($id = null){
$input_parameters = array();
$con = getDBConnection();
$sql = "SELECT * FROM post WHERE admin_post='1'";
array_push($input_parameters , $id);

$stmt = $con->prepare($sql);
$stmt->execute($input_parameters);
return $id != null ? $stmt->fetch() : $stmt->fetchAll();
}


?>