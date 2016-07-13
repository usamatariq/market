<?php
	require_once $_SERVER["DOCUMENT_ROOT"] . "/danceseen/COMMON/Globe.php";
	$globe = new Globe();
	
	require_once $globe->g_root() . "/ACCOUNT/Model/T_AccountKeycode.php";
	require_once $globe->g_root() . "/ACCOUNT/Model/T_Account.php";
	
	require_once $globe->g_root() . "/ACCOUNT/Model/T_EmailVerifier.php";

	echo "Running Tests: <br />";
	
	$t_account = new T_Account();
	$t_account->runTests();
	
	$t_accountKeycode = new T_AccountKeycode();
	$t_accountKeycode->runTests();
	
	// $t_emailVerifier = new T_EmailVerifier();
	// $t_emailVerifier->runTests();

?>