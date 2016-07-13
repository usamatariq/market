<?php  
	require_once $globe->g_root() . '/JOB/Model/Job.php';
	$job = new Job();
	
	$result = $job->getUserAppliedJobs($_SESSION['userID']);
	
	$columnCount = 1;
	$numJobs = count($result);
?>
<div >
	<ul class="nav applied-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#current" aria-controls="all" role="tab" data-toggle="tab">Current Jobs</a></li>
		<li role="presentation" class=""><a href="#past" aria-controls="accepted" role="tab" data-toggle="tab">Past Jobs</a></li>
	</ul>
</div>

<div class="tab-content border-none padding-none" >
<div class="tab-pane active" id="current" role="tabpanel" >
<div class="panel job-panel" >
<table class="table table-applied" >
<thead>
<tr>
	<td>Job</td>
	<td>Type</td>
	<td>Status</td>
	<td>Closing Date</td>
	<td>Action</td>
</tr>
</thead>
<?php

	if($numJobs == 0) {
		echo 'You have no applied jobs.';
	}
	
	else {
		for($i=0 ; $i<$numJobs ; $i++) {
			
			$field = $result[$i];
			$jobtype_name = $job->getJobtypeFromTypeid($field['job_type_id']);
			
			//Date Setting
			$jobdate = date_create($field['job_enddate']);
			$jobdateOut = date_format($jobdate, 'd-m-Y');
			$jobExpiry = date_format(date_create($field['job_expirydate']), 'Y-m-d');
			
			
			$resultAppliedJobs= $job->checkUserAppliedJobs($_SESSION['userID'], $field['job_id']);
			$resultAppliedJobsStatus = $resultAppliedJobs[0];
			
			//Status Setting
			if ($resultAppliedJobsStatus['accepted']==0)
			{
				$status = '<span class="label label-warning">Pending</span>';
			} else if ($resultAppliedJobsStatus['accepted']==1)
				{
					$status = '<span class="label label-success">Accepted</span>';
				} else 	{
							$status = '<span class="label label-danger">Rejected</span>';
						}
						
						if (($jobExpiry > $today)||(($jobExpiry < $today)&&($resultAppliedJobsStatus['accepted']!='1'))) {
				echo '				
						
						<tr>
							<td><a href="#" class="viewjob title" id="'. $field['job_id'].'">'. $field['job_title'] . '</a>
							
							'; 	
							if ($jobExpiry < $today) {
							
							echo'<span class="label label-default">expired</span>';
								
							}			
							echo'
							</td>
							<td>'. $jobtype_name .'</td>
							
				
							<td>' . $status . '</td>
							
							<td>' . $jobdateOut . '</td>				

							<td>
							';
							
							if ($resultAppliedJobsStatus['accepted']==0){
							echo'
							<a href="#" data-id="'. $field['job_id'] .'" data-name="'. $field['job_title'] . '" class="withdraw-modal-link">Withdraw</a>
							';
							} else  if ($jobExpiry < $today){
							echo'
							<a href="#" data-id="'. $field['job_id'] .'" data-name="'. $field['job_title'] . '" class="delete-modal-link">Delete</a>
							';
							}
							else {
								
								
							}
							
							echo'
							
						</tr>
						
					
									';
									}
									

			$columnCount++;
		}

	
	}

?>
</table>
</div>
</div>

<div class="tab-pane fade " id="past" role="tabpanel" >
<div class="panel job-panel">
<table class="table table-applied">
<thead>
<tr>
	<td>Job</td>
	<td>Type</td>
	<td>Status</td>
	<td>Closing Date</td>
</tr>
</thead>
<?php

	if($numJobs == 0) {
		echo 'You have no applied jobs.';
	}
	
	else {
		for($i=0 ; $i<$numJobs ; $i++) {
			
			$field = $result[$i];
			$jobtype_name = $job->getJobtypeFromTypeid($field['job_type_id']);
			
			//Date Setting
			$jobdate = date_create($field['job_enddate']);
			$jobdateOut = date_format($jobdate, 'jS F Y');
			$jobExpiry = date_format(date_create($field['job_expirydate']), 'Y-m-d');
			
			$resultAppliedJobs= $job->checkUserAppliedJobs($_SESSION['userID'], $field['job_id']);
			$resultAppliedJobsStatus = $resultAppliedJobs[0];
			
			//Status Setting
			if ($resultAppliedJobsStatus['accepted']==0)
			{
				$status = '<span class="label label-warning">Pending</span>';
			} else if ($resultAppliedJobsStatus['accepted']==1)
				{
					$status = '<span class="label label-success">Accepted</span>';
				} else 	{
							$status = '<span class="label label-danger">Rejected</span>';
						}
						
			if (($jobExpiry < $today)&&($resultAppliedJobsStatus['accepted']=='1')) {			
				echo '				
						<tr>
							<td><a href="#" class="viewjob title" id="'. $field['job_id'].'">'. $field['job_title'] . '</a>
							'; 	
							if ($jobExpiry < $today) {
							
							echo'<span class="label label-default">expired</span>';
								
							}			
							echo'
							
							</td>
							
							<td>'. $jobtype_name .'</td>
							
							<td>' . $status .'</td>
							
							<td><span class="label label-warning">' . $jobdateOut . '</span></td>					
							
						</tr>
					
									';
									}
			$columnCount++;
		}

	
	}

?>
</table>
</div>
</div>

</div>

