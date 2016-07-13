<?php  
	
	require $globe->g_root() . '/JOB/Model/Job.php';
	$job = new Job();
	$count = $job->countUserPostedJobs($_SESSION['userID']);
	
	
	echo('Active Posted Jobs:');
	echo($count[0]['jobNum']);
	
	echo('</br>Pending Applied Jobs:3');
	echo('</br>Accepted Applied Jobs:2');
	echo('</br>Rejected Applied Jobs:0');
	
	
?>