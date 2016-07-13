<?php
	session_start();
	if(!isset($_SESSION['userID'])) {
		header("Location: home.php");
	}
	
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/COMMON/Globe.php";
	$globe = new Globe();
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/JOB/Model/Job.php";
	$job = new Job();

	
	$user = $_SESSION['userID'];
	$title = htmlspecialchars($_POST['job_title']);
	$type = htmlspecialchars($_POST['job_type']);
	$pay = htmlspecialchars($_POST['job_pay']);
	
	
	$startdate = date("0-0-0");
	$starttime = date("0:0:0"); 
	$enddate2 = htmlspecialchars($_POST['job_enddate']);
	$endtime = date("0:0:0"); 
	$venue = htmlspecialchars($_POST['job_venue']);
	$description = htmlspecialchars($_POST['job_description']);
	$status = '1';
		
	//changing date format
	$jobdate = date_create($enddate2);
	$enddate = date_format($jobdate, 'Y-m-d');
	
	$result = $job->addJob($user, $title, $type, $pay, $startdate, $starttime, $enddate, $endtime,$venue, $description, $status);
	if($result) {
		header("Location: /danceseen/JOB/job.php?jobpost=success");
	}
	else {
	}
	
?>