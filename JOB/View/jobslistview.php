<?php 
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/Globe.php";
	$globe = new Globe();
	
	require_once $globe->g_root() . '/Model/Job.php';
	$job = new Job();
	
	$q = intval($_POST['q']);
	$result = $job->getUserAppliedJobs($q);
	
	$numJobs = count($result);
	
	if($numJobs == 0) {
		echo 'You have no applied jobs.';
	}
	
	else {
		for($i=0 ; $i<$numJobs ; $i++) {
			$field = $result[$i];
		
				echo '
				<div style="border-bottom:1px solid #c0c0c0;padding:5px 5px 5px 5px;">
				<a href="#"data-toggle="modal" data-target="#jobView'. $field['job_id'] .'">		
					<table>
						<tbody>
						<tr>
							<td style="width:25%;"><b>'. $field['job_title'] . '</b></td>
							<td style="width:25%;"></td>
							</tr>
						</tbody>
					</table>
				</a>
				</div>
					';
			
			require("jobView.php");
		}

	
	}
	
	?>
