<?php
	session_start();

	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/COMMON/Globe.php";
	$globe = new Globe();
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/JOB/Model/Job.php";
	$job = new Job();
	
	$user = $_SESSION['userID'];
	$id = htmlspecialchars($_POST['id']);
	$check = $job->checkUserAppliedJobs($user, $id);
	$jobposter = $job->getPosterFromID($id);
	
	if(($jobposter == $user)) 
	{
		echo '0';
	}
	
	else	{
	if($check) 
		{	
			echo '1';
		}
		else{
				$result = $job->signupForJob($user, $id);
					
				if($result) {
					echo '2';		
					$field['job_id']=$id;
					$field['job_poster_id']=$user;
					//require("../View/job_apply.php");
				} else 
				{
				echo 'unsuccessful';
				}
			}
		}
?>