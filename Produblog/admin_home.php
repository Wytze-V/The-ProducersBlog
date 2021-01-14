<?php
require_once('assets/includes/include.php');

$con = getDBConnection();

  if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'){
					
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
							<a href="edituser.php?id='.$row->idUsers.'" class="edit_btn" >Edit</a>
							</th>
							<th></th>
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

