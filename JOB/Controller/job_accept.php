<?php
	session_start();
	
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/COMMON/Globe.php";
	$globe = new Globe();
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/JOB/Model/Job.php";
	$job = new Job();
	
	$jobID = htmlspecialchars($_POST['jobID']);
	$applicant = htmlspecialchars($_POST['applierID']);

	$globe->g_log($jobID);
	$globe->g_log($applicant);

	echo "$jobID $applicant";

	$result = $job->acceptApplicant($jobID, $applicant);
	if($result) {
		header("Location: /danceseen/JOB/job.php");
	}
	else {
	}
?>