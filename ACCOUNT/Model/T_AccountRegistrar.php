<?php

require_once "AccountRegistrar.php";

class T_AccountRegistrar {
	private $userID;
	private $email;
	private $password;
	private $confirmPassword;
	
	private $accountRegistrar;
	
	public function runTests() {
		$this->output("TEST - ACCOUNT_REGISTRAR");
		$this->output("This should test what is not covered by Account etc.");
		$this->accountRegistrar = new AccountRegistrar();
		
		$this->output("Truncating table: account");
		$this->account->truncate();
		
		// create new account
		
	}
	
	private function test_registerAccount_emailBounce() {
		$this->output("--- test_registerAccount_emailBounce():");
		// setup variables
		$email = "confirmbounce@danceseen.com";
		$password = "secretive";
		$confirmPassword = "secretive";
		
		$response = $this->account->createAccount($email, $password, $confirmPassword);
		
		if($response == Account::EMAIL_INVALID) {
			$this->output("--- --- PASS - returned email invalid");
		}
		else {
			$this->output("--- --- FAIL: " . $response);
		}
	}
	
	private function test_registerAccount() {
		$this->output("--- test_registerAccount_emailBounce():");
		// setup variables
		$email = "confirmbounce@danceseen.com";
		$password = "secretive";
		$confirmPassword = "secretive";
		
		$response = $this->account->createAccount($email, $password, $confirmPassword);
		
		if($response == Account::EMAIL_INVALID) {
			$this->output("--- --- PASS - returned email invalid");
		}
		else {
			$this->output("--- --- FAIL: " . $response);
		}
	}
	
	private function output($message) {
		echo $message . "<br />";
	}
}

?>