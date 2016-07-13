<?php
	session_start();

	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/COMMON/Globe.php";
	$globe = new Globe();
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/JOB/Model/Job.php";
	$job = new Job();
	
	$user = $_SESSION['userID'];
	$id = htmlspecialchars($_POST['id']);
	
	$result = $job->openJob($user, $id);
	
	if($result) {
		echo 'opened';
		header("Location:/danceseen/JOB/job.php");
	}
	else {
	echo 'got problem lei';
	}
?>
