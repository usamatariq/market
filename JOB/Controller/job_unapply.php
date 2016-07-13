<?php
	session_start();

	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/COMMON/Globe.php";
	$globe = new Globe();
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/JOB/Model/Job.php";
	$job = new Job();
	
	$user = $_SESSION['userID'];
	$id = htmlspecialchars($_POST['id']);
	
	$result = $job->unapplyJob($user, $id);
	
	if($result) {
		header("Location:/danceseen/JOB/appliedjob.php");
	}
	
	else {
		echo 'fuck!!';
	}
?>

