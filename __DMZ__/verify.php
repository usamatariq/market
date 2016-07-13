<?php
	require_once $_SERVER["DOCUMENT_ROOT"] . "/danceseen/Globe.php";
	$globe = new Globe();
	
	require_once $globe->g_root() . '/Model/Account.php';
	
	$account = new Account();
	$responsecodes = new ResponseCodes();

	$userID = $_SESSION['userID'];
	$verificationCode = htmlspecialchars($_GET['code']);
	
	$result = $account->verifyEmail($userID, 1);
	switch($result) {
		case $responsecodes::VERIFICATION_SUCCESS:
			header("Location: /danceseen/home.php?response=verificationpass");
			break;
		case $responsecodes::CODE_INVALID:
			header("Location: /danceseen/index.php?response=verificationfail");
			break;
		default:
			header("Location: /danceseen/index.php?response=servererror");
			break;
	}
?>