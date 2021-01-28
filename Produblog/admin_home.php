<?php
require_once('assets/includes/include.php');

$con = getDBConnection();

	//Hier word gecontroleerd of de gebruiker is ingelogd en of de gebruiker admin is anders geen toegang
  if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'){
				
//hier wordt alle informatie van de gebruikers uit de database gehaald en geordend op datum				
				$query = "SELECT * FROM users ORDER BY date DESC";
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
							<th>Datum</th>
							<th>EDIT</th>
							<th>DELETE</th>
						</tr>
					</thead>
					
				';
				//hier word voor elke gebruiker een rij in een tabel aangemaakt met zijn of haar gegevens
				
				foreach($query_run as $row){
			
				echo'
				<tbody>
						<tr class="active-row">
							<th> '.html($row->idUsers).' </th>
							<th> '.html($row->username).' </th>
							<th> '.html($row->email).' </th>
							<th> '.html($row->usertype).' </th>
							<th>'.html($row->date).'</th>
							<th>
								<a href="edituser.php?id='.html($row->idUsers).'" class="edit_btn" >Bewerk</a>					
							</th>
							<th>
								<a href="deleteuser.php?id='.html($row->idUsers).'" class="delete_btn" >Verwijder</a>
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


