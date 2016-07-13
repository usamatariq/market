<?php
	session_start();
	if(!isset($_SESSION['userID'])) {
		header("Location: home.php");
	}
	
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/COMMON/Globe.php";
	$globe = new Globe();
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/JOB/Model/Job.php";
	$job = new Job();
	
	$jobID = htmlspecialchars($_POST['jobID']);
	$user = $_SESSION['userID'];
	$title = htmlspecialchars($_POST['job_title']);
	$type = htmlspecialchars($_POST['job_type']);
	$pay = htmlspecialchars($_POST['job_pay']);
	$venue = htmlspecialchars($_POST['job_venue']);
	$description = htmlspecialchars($_POST['job_description']);
	
	//changing date format
	//$jobdate = date_create($enddate2);
	//$enddate = date_format($jobdate, 'Y-m-d');
	
	$result = $job->updateJob($jobID, $user, $title, $type, $pay, $venue, $description);
	if($result) {
		header("Location: /danceseen/JOB/postedjob.php");
	}
	else {
	}
	
?>