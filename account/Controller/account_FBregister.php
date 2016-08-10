<?php	
	require_once $_SERVER["DOCUMENT_ROOT"] . "/market/COMMON/Globe.php";
	$globe = new Globe();
	
	require_once $globe->g_root() . '/ACCOUNT/Model/AccountRegistrar.php';
		
	//OBJECT CLASS
	$accountRegistrar = new AccountRegistrar();
	
	//SETUP VARIABLES
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
	$result = $accountRegistrar->registerFBAccount($firstname, $lastname, $email);
	
	// Account Registration Response
	switch($result) {
		case ACCOUNT::SUCCESS:
			echo 'success';
			break;
		case ACCOUNT::EMAIL_INVALID:
			echo 'emailinvalid';
			break;
		case ACCOUNT::EMAIL_IN_USE:
			echo 'emailinuse';			
			break;
		case ACCOUNT::PASSWORD_MISMATCH:
			echo 'passwordmismatch';
			break;
		case ACCOUNT::PASSWORD_INVALID:
			echo 'passwordinvalid';
			break;
		default:
			echo 'error';
			break;
	}
?>