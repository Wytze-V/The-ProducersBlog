<?php
require_once('assets/includes/include.php');

$con = getDBConnection();

	//Hier word gecontroleerd of de gebruiker is ingelogd en of de gebruiker admin is anders geen toegang
  if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'){
				
//hier wordt alle informatie van de gebruikers uit de database gehaald en geordend op datum				
				$query = "SELECT * FROM users ORDER BY date";
				$query_run = $con->query($query);

			if($query_run){
				
				echo '
				<table class="styled-table">
					<thead>
						<tr>
							<th>User id</th>
							<th>Username</th>
							<th>Email</th>
							<th>Usertype</th>
							<th>EDIT</th>
							<th>DELETE</th>
						</tr>
					</thead>
					
				';
				//hier word voor elke gebruiker een rij in een tabel aangemaakt met zijn of haar gegevens
				//while($row = $query_run->fetch()){
				foreach($query_run as $row){
			
				echo'
				<tbody>
						<tr class="active-row">
							<th> '.$row->idUsers.' </th>
							<th> '.$row->username.' </th>
							<th> '.$row->email.' </th>
							<th> '.$row->usertype.' </th>
							<th>
								<a href="edituser.php?id='.$row->idUsers.'" class="edit_btn" >Bewerk</a>					
							</th>
							<th>
								<a href="deleteuser.php?id='.$row->idUsers.'" class="delete_btn" >Verwijder</a>
							</th>
						</tr>
						
				</tbody>
			';
				}
				echo'</table>';
			}

}else{
	header('location: home.php');
}

?>

<?php include_once('assets/includes/footer.php'); ?>


