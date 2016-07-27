<?php	
	require_once $_SERVER["DOCUMENT_ROOT"] . "/market/COMMON/Globe.php";
	$globe = new Globe();
	
	require_once $globe->g_root() . '/ACCOUNT/Model/AccountRegistrar.php';
	$accountRegistrar = new AccountRegistrar();
	
	// Setup variables
	$firstname ="";
	$lastname="";
	$email = "";
	
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

	
	// Register Account by registerAccount Method
	$result = $accountRegistrar->createFBAccount($firstname, $lastname, $email);
	
	// Account Registration Response
	switch($result) {
		case ACCOUNT::SUCCESS:
			echo 'success';
			//header("Location: /market/index.php?response=success"); // REQUEST EMAIL VERIFICATION 
			break;
		case ACCOUNT::EMAIL_INVALID:
			echo 'email invalid';
			//header("Location: /market/index.php?response=emailinvalid");
			break;
		case ACCOUNT::EMAIL_IN_USE:
			echo 'email in use';
			//header("Location: /market/index.php?response=emailinuse");
			break;
		case ACCOUNT::PASSWORD_MISMATCH:
			echo 'password mismatch';
			//header("Location: /market/index.php?response=passwordmismatch");
			break;
		case ACCOUNT::PASSWORD_INVALID:
			echo 'password invalid';
			//header("Location: /market/index.php?response=passwordinvalid");
			break;
		default:
			echo 'error';
			//header("Location: /market/index.php?response=error"); // SORRY =(
			break;
	}
?>