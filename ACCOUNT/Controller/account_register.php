<?php
	// error_reporting(E_ALL);
	// ini_set('display_errors', 1);
	
	require_once $_SERVER["DOCUMENT_ROOT"] . "/market/COMMON/Globe.php";
	$globe = new Globe();
	
	require_once $globe->g_root() . '/ACCOUNT/Model/AccountRegistrar.php';
		
	// setup variables
	$accountRegistrar = new AccountRegistrar();
	$email = "";
	$password = "";
	$confirmPassword = "";
	
	if(isset($_POST['account_email'])) {
		$email = htmlspecialchars($_POST['account_email']);
	}
	if(isset($_POST['account_password'])) {
		$password = htmlspecialchars($_POST['account_password']);
	}
	if(isset($_POST['account_confirmpassword'])) {
		$confirmPassword = htmlspecialchars($_POST['account_confirmpassword']);
	}
	
	// attempt to create account
	$result = $accountRegistrar->registerAccount($email, $password, $confirmPassword);
	
	// redirect according to response
	switch($result) {
		case ACCOUNT::SUCCESS:
			header("Location: /market/index.php?response=success"); // REQUEST EMAIL VERIFICATION 
			break;
		case ACCOUNT::EMAIL_INVALID:
			header("Location: /market/index.php?response=emailinvalid");
			break;
		case ACCOUNT::EMAIL_IN_USE:
			header("Location: /market/index.php?response=emailinuse");
			break;
		case ACCOUNT::PASSWORD_MISMATCH:
			header("Location: /market/index.php?response=passwordmismatch");
			break;
		case ACCOUNT::PASSWORD_INVALID:
			header("Location: /market/index.php?response=passwordinvalid");
			break;
		default:
			header("Location: /market/index.php?response=error"); // SORRY =(
			break;
	}
?>