<?php		
$user = $_SESSION['userID'];		
$check = $job->checkUserAppliedJobs($user,  $field['job_id'] );
			
if(!($field['job_poster_id'] == $_SESSION['userID'])) 
{
			
	if($check) 
	{
				echo '
					
							<input id="jobunapply" type="hidden" name="id" value=' . $field['job_id'] . '"/>
							<button id="unapply" type="submit" class="btn btn-danger">UnApply Job</button>
						
					
					';
				}
				
				else {
					echo '					
					
						
							<input id="jobapply" type="hidden" name="id" value=' . $field['job_id'] . '"/>
							<button id="apply" type="submit" class="btn btn-danger">Apply Job</button>

					
					';
					}
}
			
else 	{
				echo '
						
							<form action="myjobs.php" method="post">
								<input type="hidden" name="id" value=' . $field['job_id'] . '"/>
								<button id="edit" type="submit" class="btn btn-danger">Edit Job</button>
								asd
							</form>
						
					';
				
}		
?>

