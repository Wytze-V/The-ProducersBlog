<?php

require_once('assets/includes/include.php');

$con = getDBConnection();

	if(isset($_SESSION['usertype'])){
		
		$query = "SELECT * FROM post ORDER BY date";
		$query_run = $con->query($query);
		
		if($query_run){
				
				echo '
				<table class="styled-table">
					<thead>
						<tr>
							<th>Post ID</th>
							<th>Poster ID</th>
							<th>Post name</th>
							<th>Content</th>
							<th>File</th>
							<th>Date</th>
						</tr>
					</thead>
					
				';
				
				//while($row = $query_run->fetch()){
				foreach($query_run as $row){
				
				echo'
				<tbody>
						<tr class="active-row">
							<th> '.$row->idPost.' </th>
							<th> '.$row->idUsers.' </th>
							<th> '.$row->postname.' </th>
							<th> '.$row->postcontent.' </th>
							<th> '.$row->File_ops.' </th>
							<th> '.$row->date.' </th>
							
							
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

<?php include_once('assets/includes/footer.php'); ?>