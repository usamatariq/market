<?php 
session_start();

require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/COMMON/Globe.php";
$globe = new Globe();
require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/JOB/Model/Job.php";
$job = new Job();

$id = htmlspecialchars($_POST['id']);

$resultApplicants = $job->getApplicants($id);
$numApplicants = count($resultApplicants);
?>

<div class="panel job-panel">
<table class="table table-applied">
<thead>
<tr>
	<td>Applicants</td>
	<td>Status</td>
	<td>Action</td>
	<td></td>
</tr>
</thead>

<?php
if ($numApplicants) 
{			
	for($j=0 ; $j<$numApplicants ; $j++) 
		{			
		
		$userField = $resultApplicants[$j];
		
		if ($userField['accepted']==0)
			{
				$status = 'Pending';
			} else if ($userField['accepted']==1)
				{
					$status = 'Accepted';
			
				} else 	{					
						$status = 'Rejected';				
						}
			
			echo'
						
				<tr>							
					
						<td>
							<div style="padding:10px;">
							' . $userField['applier'] . '
							</div>
						</td>
						<td>	
							<div style="padding:10px;">
							' . $status . '		
							</div>
						</td>
				';
									
						if ($userField['accepted']==0) {
				echo'							
						<td>		
									<form action="Controller/job_accept.php" method="post">
										<input type="hidden" name="jobID" value=' . $userField['id'] . '>
										<input type="hidden" name="applierID" value=' . $userField['applier'] . '>
										<input type="hidden" name="acceptance" value="1">
										<button type="submit" class="btn btn-success">Accept</button>
									</form>
						</td>
						<td>	
									<form action="Controller/job_reject.php" method="post">
										<input type="hidden" name="jobID" value=' . $userField['id'] . '>
										<input type="hidden" name="applierID" value=' . $userField['applier'] . '> 
										<input type="hidden" name="acceptance" value="2">
										<button type="submit" class="btn btn-danger">Reject</button>
									</form>
						</td>	
					';
									}
					echo'	

				</tr>
						';
		}
		
} else {
			
		echo' <td> There is no applicant.</td>';
			
		}
echo'		

';				
?>

</table>
</div>