<?php
require_once('assets/includes/include.php');

$con = getDBConnection();

  if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'){
	echo"
		
		<div class='table-responsive'>
		
		"; 
				
			$query = "SELECT * FROM users";
			$query_run = $con->prepare($query);
		
		echo"
		
			<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
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
				<tbody>
			";
			
			if()
			
			echo"
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
				</tbody>
			</table>
		</div>
	
	";

}else{
	header('location: home.php');
}

?>

