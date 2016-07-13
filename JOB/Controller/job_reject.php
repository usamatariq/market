<?php
	session_start();
	
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/COMMON/Globe.php";
	$globe = new Globe();
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/JOB/Model/Job.php";
	$job = new Job();
	
	$jobID = htmlspecialchars($_POST['jobID']);
	$applicant = htmlspecialchars($_POST['applierID']);

	$result = $job->rejectApplicant($jobID, $applicant);

	if($result) {
		header("Location: /danceseen/JOB/job.php");
	}
	else {
	}
?>