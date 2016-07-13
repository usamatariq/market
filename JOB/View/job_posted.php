<?php  
	require_once $globe->g_root() . '/JOB/Model/Job.php';
	$job = new Job();
	
	$result = $job->getUserPostedJobs($_SESSION['userID']);
	
	$numJobs = count($result);
?>
<div >
	<ul class="nav applied-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#current" aria-controls="allposted" role="tab" data-toggle="tab">Active Jobs</a></li>
		<li role="presentation" class=""><a href="#past" aria-controls="open" role="tab" data-toggle="tab">Past Jobs</a></li>
	</ul>
</div>
	
<div class="tab-content border-none" style="padding:0px;">

<div class="tab-pane active"  role="tabpanel" id="current">
<div class="panel job-panel">
<table class="table table-applied">	
<thead>
<tr>
	<td>Job</td>
	<td>Applicants</td>
	<td>Expiry Date</td>
	<td>Action</td>
	<td>Action</td>	
</tr>
</thead>
<?php
	if($numJobs == 0) {
		echo "You have no posted jobs.";
	}
	
	else {
		for($i=0 ; $i<$numJobs ; $i++) 
		{
			$field = $result[$i];
			$jobtype_name = $job->getJobtypeFromTypeid($field['job_type_id']);
			
			$jobdate = date_create($field['job_enddate']);
			$jobdateOut = date_format($jobdate, 'jS F Y');
			$jobExpiry = date_format(date_create($field['job_expirydate']), 'Y-m-d');
			$jobDate = date_format($jobdate, 'Y-m-d');
			
			$resultApplicants = $job->getApplicants($field['job_id']);
			$numApplicants = count($resultApplicants);
			
			if ($jobExpiry > $today) {
				echo '		
					<tr>
						<td><a href="#" class="viewjob title" id="'. $field['job_id'].'">'. $field['job_title'] . '</a>
						'; 	
							if ($jobDate < $today) {
							
							echo'<span class="label label-default">Closed</span>';
								
							}			
							echo'
						</td>
						
						<td><a href="#" data-id="'. $field['job_id'] .'" data-name="'. $field['job_title'] . '" class="applicant-prompt">View ('.$numApplicants.')</a>
						</td>
						
									
						<td><span class="label label-warning">' . $jobExpiry . '</span></td>
						
						<td><a href="#" data-id="'. $field['job_id'] .'" data-name="Edit Job" class="edit-prompt">Edit</a>
						</td>
						
						<td><a href="#" data-id="'. $field['job_id'] .'" data-name="'. $field['job_title'] .'" class="delete-prompt">Delete</a>
						</td>
					</tr>					
						';
						}
?>			

<?php					
		}
	}
?>	
</table>
</div>
</div>

<div class="tab-pane"  role="tabpanel" id="past">
<div class="panel job-panel">
<table class="table table-applied">	
<thead>
<tr>
	<td>Job</td>
	<td>Expiry Date</td>
	<td>Action</td>	
</tr>
</thead>
<?php
	if($numJobs == 0) {
		echo "You have no posted jobs.";
	}
	
	else {
		for($i=0 ; $i<$numJobs ; $i++) 
		{
			$field = $result[$i];
			$jobtype_name = $job->getJobtypeFromTypeid($field['job_type_id']);
			
			$jobdate = date_create($field['job_enddate']);
			$jobdateOut = date_format($jobdate, 'jS F Y');
			$jobExpiry = date_format(date_create($field['job_expirydate']), 'Y-m-d');
			
			$resultApplicants = $job->getApplicants($field['job_id']);
			$numApplicants = count($resultApplicants);
			
			if ($jobExpiry < $today) {
				echo '		
					<tr>
						<td><a href="#" class="viewjob title" id="'. $field['job_id'].'">'. $field['job_title'] . '</a>
						</td>
						
												
						<td><span class="label label-warning">' . $jobExpiry . '</span></td>			
						
						<td><a href="#" data-id="'. $field['job_id'] .'" data-name="'. $field['job_title'] .'" class="delete-prompt">Delete</a>
						</td>
					</tr>
					
						';
						}
?>			

<?php					
		}
	}
?>	
</table>
</div>
</div>
</div>


