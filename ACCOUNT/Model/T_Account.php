<?php

require_once "Account.php";
require_once $globe->g_root() . '/COMMON/Model/Test.php';

class T_account {
	private $userID;
	private $password;
	private $email;
	private $status;
	
	private $account;
	private $test;
	
	public function runTests() {
		$this->account = new Account();
		$this->test = new Test();
		
		$this->test->output("Truncating table: account");
		$this->test->truncate("account");
		
		// create new account
		$this->test_createAccount_emailInvalid();
		$this->test_createAccount_passwordMismatch();
		$this->test_createAccount_passwordInvalid();
		$this->test_createAccount();
		$this->test_createAccount_emailInUse();
		
		// get account ID for further tests
		$userID = $this->account->getUserIDFromEmail("test@test.com");
		
		// retrive and display account
		$this->test_retriveInvalidAccount($userID);
		$this->test_retriveAndDisplay($userID);
		
		// edit account details
		$this->test_setInvalidEmail($userID);
		$this->test_setEmail($userID);
		
		$this->test_setInvalidPassword($userID);
		$this->test_setPassword($userID);
		
		$this->test_setStatus($userID);
		
	}
	
	private function test_createAccount_emailInvalid() {
		$this->test->output("--- test_createAccount_emailInvalid():");
		// setup variables
		$email = "test@test";
		$password = "secretive";
		$confirmPassword = "secretive";
		
		$response = $this->account->createAccount($email, $password, $confirmPassword);
		
		if($response == Account::EMAIL_INVALID) {
			$this->test->output("--- --- PASS - returned email invalid");
		}
		else {
			$this->test->output("--- --- FAIL: " . $response);
		}
	}
	
	private function test_createAccount_passwordInvalid() {
		$this->test->output("--- test_createAccount_passwordInvalid():");
		// setup variables
		$email = "test@test.com";
		$password = "short";
		$confirmPassword = "short";
		
		$response = $this->account->createAccount($email, $password, $confirmPassword);
		
		if($response == Account::PASSWORD_INVALID) {
			$this->test->output("--- --- PASS - returned password invalid");
		}
		else {
			$this->test->output("--- --- FAIL: " . $response);
		}
	}
	
	private function test_createAccount_passwordMismatch() {
		$this->test->output("--- test_createAccount_passwordMismatch():");
		// setup variables
		$email = "test@test.com";
		$password = "secretive";
		$confirmPassword = "incorrect";
		
		$response = $this->account->createAccount($email, $password, $confirmPassword);
		
		if($response == Account::PASSWORD_MISMATCH) {
			$this->test->output("--- --- PASS - returned password mismatch");
		}
		else {
			$this->test->output("--- --- FAIL: " . $response);
		}
	}
	
	private function test_createAccount() {
		$this->test->output("--- test_createAccount():");
		// setup variables
		$email = "test@test.com";
		$password = "secretive";
		$confirmPassword = "secretive";
		
		$response = $this->account->createAccount($email, $password, $confirmPassword);
		
		if($response == Account::SUCCESS) {
			$this->test->output("--- --- PASS - returned success");
		}
		else {
			$this->test->output("--- --- FAIL: " . $response);
		}
	}
	
	private function test_createAccount_emailInUse() {
		$this->test->output("--- test_createAccount_emailInUse():");
		// setup variables
		$email = "test@test.com";
		$password = "secretive";
		$confirmPassword = "secretive";
		
		$response = $this->account->createAccount($email, $password, $confirmPassword);
		
		if($response == Account::EMAIL_IN_USE) {
			$this->test->output("--- --- PASS - returned email in use");
		}
		else {
			$this->test->output("--- --- FAIL: " . $response);
		}
	}
	
	private function test_retriveInvalidAccount($userID) {
		$this->test->output("--- test_retriveInvalidAccount():");
		$invalidID = $userID + 1;
		$response = $this->account->retriveAccount($invalidID);
		
		if($response == false) {
			$this->test->output("--- --- PASS - returned false");
		}
		else {
			$this->test->output("--- --- FAIL");
		}
	}
	
	private function test_retriveAndDisplay($userID) {
		$this->test->output("--- test_retriveAndDisplay():");
		$this->account->retriveAccount($userID);
		$this->test->output("--- --- userID: " . $this->account->getUserID());
		$this->test->output("--- --- pwHash: " . $this->account->getPasswordHash());
		$this->test->output("--- --- email: " . $this->account->getEmail());
		$this->test->output("--- --- status: " . $this->account->getStatus());
	}
	
	private function test_setInvalidEmail($userID) {
		$this->test->output("--- test_setInvalidEmail():");
		// setup variables
		$email = "test@test";
		
		$response = $this->account->setEmail($userID, $email);
		
		if($response == Account::EMAIL_INVALID) {
			$this->test->output("--- --- PASS - returned email invalid");
		}
		else {
			$this->test->output("--- --- FAIL: " . $response);
		}
	}
	
	private function test_setEmail($userID) {
		$this->test->output("--- test_setEmail():");
		// setup variables
		$email = "new@test.com";
		
		$response = $this->account->setEmail($userID, $email);
		
		if($response == Account::SUCCESS) {
			$this->test->output("--- --- PASS - returned success");
		}
		else {
			$this->test->output("--- --- FAIL: " . $response);
		}
	}
	
	private function test_setInvalidPassword($userID) {
		$this->test->output("--- test_setInvalidPassword():");
		// setup variables
		$password = "short";
		
		$response = $this->account->setPassword($userID, $password);
		
		if($response == Account::PASSWORD_INVALID) {
			$this->test->output("--- --- PASS - returned password invalid");
		}
		else {
			$this->test->output("--- --- FAIL: " . $response);
		}
	}
	
	private function test_setPassword($userID) {
		$this->test->output("--- test_setPassword():");
		// setup variables
		$password = "secretive";
		
		$response = $this->account->setPassword($userID, $password);
		
		if($response == Account::SUCCESS) {
			$this->test->output("--- --- PASS - returned success");
		}
		else {
			$this->test->output("--- --- FAIL: " . $response);
		}
	}
	
	private function test_setStatus($userID) {
		$this->test->output("--- test_setStatus():");
		
		$response = $this->account->setStatus($userID, Account::STATUS_VERIFIED);
		if($response == Account::SUCCESS) {
			$newStatus = $this->account->getStatus($userID);
			if($newStatus == Account::STATUS_VERIFIED) {	
				$this->test->output("--- --- PASS - account verified");
			}
			else {
				$this->test->output("--- --- FAIL - incorrect status");
			}
			
		}
		else {
			$this->test->output("--- --- FAIL - server returned failure" . $response);
		}
	}
}

?>