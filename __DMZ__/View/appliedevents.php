<?php  
	$result = $job->getUserAppliedJobs($_SESSION['username']);
	
	$columnCount = 1;
	$numJobs = count($result);
	echo'			
		';
	
	
	if($numJobs == 0) {
		echo 'You have no applied events.';
	}
	
	else {
		for($i=0 ; $i<$numJobs ; $i++) {
			$field = $result[$i];
		
				echo '
				<a href="#"data-toggle="modal" data-target="#job1">
				<div class="panel panel-default hover-border active-shadow">
				<div class="panel-body">
				<table class="content-job">
					<thead><b>'. $field['title'] . '</b>
					</thead>
					
						<tbody>
							<tr>
								<td>Date:</td><td>' . $field['date'] . '</td>
							</tr>

							<tr>
								<td>Status:</td><td>Open</td>
							</tr>
						</tbody>
						</table>
		</div>
		</div>
		</a>
					';
			
			
					
			$columnCount++;
		}

	
	}
	
?>