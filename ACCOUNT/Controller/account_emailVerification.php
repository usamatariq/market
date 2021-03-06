<?php
	// error_reporting(E_ALL);
	// ini_set('display_errors', 1);
	
	require_once $_SERVER["DOCUMENT_ROOT"] . "/market/COMMON/Globe.php";
	$globe = new Globe();
	
	require_once $globe->g_root() . '/ACCOUNT/Model/EmailVerifier.php';
		
	// setup variables
	$emailVerifier = new EmailVerifier();
	$userID = "";
	$code = "";
	
	if(isset($_GET['code'])) {
		$code = htmlspecialchars($_GET['code']);
	}
	if(isset($_GET['userID'])) {
		$userID = htmlspecialchars($_GET['userID']);
	}
	
	// attempt to verify email
	//$result = $emailVerifier->verifyEmail($userID, $code);
	$result = $emailVerifier->verifyEmail($code);
	
	// redirect according to response
	switch($result) {
		case EMAILVERIFIER::SUCCESS:
			echo "congratzzzz.";
			header("Location: /market/verify.php?response=success");
			break;
		case EMAILVERIFIER::CODE_INVALID:
			header("Location: /market/verify.php?response=code_invalid");
			break;
		default:
			header("Location: /market/verify.php?response=error"); // SORRY =(
			break;
	}
?>