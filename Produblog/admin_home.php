<?php
require_once('assets/includes/include.php');

$con = getDBConnection();

  if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'){
					
				$query = "SELECT * FROM users";
				$query_run = $con->query($query);
			

			if($query_run){
				
				echo '
				<table width="50%" border="1" cellpadding="5" cellspacing="5"
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
						<tr>
							<th> '.$row->idUsers.' </th>
							<th> '.$row->username.' </th>
							<th> '.$row->email.' </th>
							<th> '.$row->usertype.' </th>
							<th></th>
							<th></th>
						</tr>
						
					
				
			
	
			';
				}
				echo'</table>';
			}

}else{
	header('location: home.php');
}

?>

