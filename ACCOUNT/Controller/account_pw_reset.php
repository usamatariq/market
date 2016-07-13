<?php
	session_start();
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/COMMON/Globe.php";
	$globe = new Globe();

	require $globe->g_root() . "/ACCOUNT/Model/AccountAuthenticator.php";
	
	// setup variables
	$accountAuth = new AccountAuthenticator();
	$email = "";
	
	if(isset($_POST['account_email'])) {
		$email = htmlspecialchars($_POST['account_email']);
	}
	
	$response = $accountAuth->attemptPasswordReset($email, $password);
	
	switch($result) {
		case ACCOUNT::SUCCESS:
			header("Location: /danceseen/verify.php"); // LINK TO EMAIL VERIFICATION 
			break;
		case ACCOUNT::EMAIL_INVALID:
			header("Location: /danceseen/index.php?response=emailinvalid");
			break;
		case ACCOUNT::EMAIL_NOT_IN_USE:
			header("Location: /danceseen/index.php?response=emailinuse");
			break;
		default:
			header("Location: /danceseen/index.php?response=error"); // SORRY =(
			break;
	}
	
?>