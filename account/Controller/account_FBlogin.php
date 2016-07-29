<?php
	session_start();
	require_once $_SERVER["DOCUMENT_ROOT"] . "/market/COMMON/Globe.php";
	$globe = new Globe();

	require_once $globe->g_root() . "/ACCOUNT/Model/AccountAuthenticator.php";
	
	//VARIABLES
	
	$email = "";

	
	if(isset($_POST['account_email'])) {
		$email = htmlspecialchars($_POST['account_email']);
	}
	if(isset($_POST['account_password'])) {
		$password = htmlspecialchars($_POST['account_password']);
	}
	if(isset($_POST['verify_code'])) {
		$code = htmlspecialchars($_POST['verify_code']);
	}
	
	// AUTHENTICATION 
	$userID = $accountAuth->authenticate($email, $password);
	
	// STANDARD LOGIN
	if(!isset($_POST['verify_code'])) {
		if($userID != null) {
			// if is valid
			$status = $accountAuth->checkAccountStatus($userID);
			
			//SET SESSION
			$_SESSION['userID'] = $userID;
			
			if($status == ACCOUNT::STATUS_VERIFIED) {
				header("Location: /market/home.php");
			}
			else {
				header("Location: /market/verify.php?response=notify");
			}
		}
		else {
			header("Location: /market/index.php?response=login_fail");
		}
	}

	// VERIFICATION LOGIN
	else {
		if($userID != null) {
			$_SESSION['userID'] = $userID;
			header("Location: /market/verify.php?code=$code");
		}
		else {
			header("Location: /market/verify.php?code=$code&response=login_failed");
		}
	}
	
?>