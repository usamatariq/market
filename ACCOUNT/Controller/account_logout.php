<?php
	session_start();
	require $_SERVER["DOCUMENT_ROOT"] . "/market/COMMON/Globe.php";
	$globe = new Globe();

	
	if(isset($_SESSION['userID'])) {
		$_SESSION = array();
	
		if(isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-3600);
		}
	
		session_destroy();
	}

	header("Location: /market/index.php");
?>