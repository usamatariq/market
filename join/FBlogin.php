<?php	
	session_start();
	require_once $_SERVER["DOCUMENT_ROOT"] . "/market/COMMON/Globe.php";
	$globe = new Globe();
	
	require_once $globe->g_root() . "/ACCOUNT/Model/AccountAuthenticator.php";
	$accountAuth = new AccountAuthenticator();
	
	// Setup variables
	$firstname ="";
	$lastname="";
	$email = "";
	$password = "";
	$confirmPassword = "";
	
	// Get values into variables
	if(isset($_POST['firstname'])) {
		$firstname = htmlspecialchars($_POST['firstname']);
	}
	if(isset($_POST['lastname'])) {
		$lastname = htmlspecialchars($_POST['lastname']);
	}	
	if(isset($_POST['email'])) {
		$email = htmlspecialchars($_POST['email']);
	}

	// AUTHENTICATION 
	$userID = $accountAuth->FBauthenticate($email);
	
	// STANDARD LOGIN
		if($userID != null) {
			// if is valid
			$status = $accountAuth->checkAccountStatus($userID);
			
			//SET SESSION
			$_SESSION['userID'] = $userID;
			
			if($status == ACCOUNT::STATUS_FBVERIFIED||ACCOUNT::STATUS_VERIFIED) {
				//header("Location: /market/home.php");
				echo ('success');
			}
			else {
				echo ('notify');
			}
		} 
		else {
			echo ('login fail');
		}

?>