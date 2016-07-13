<?php

require_once "AccountKeycode.php";

// ADD: test retrive invalid code

class T_AccountKeycode {
	private $userID;
	private $code;
	private $codeGenTime;
	private $codeType;
	private $email;
	
	private $accountKeycode;
	
	public function __construct() {
		$this->accountKeycode = new AccountKeycode();
	}
	
	public function runTests() {
		$this->fullEmailTest();
		$this->fullPasswordTest();
		// $this->expiredCodeTest();
		
		// $this->test_retriveInvalidCode($code);
		// $this->test_removeInvalidCodeAndCheck($code);
		
		echo "INCOMPLETE!";
	}
	
	private function fullEmailTest() {
		// setup variables
		$this->userID = 1000;
		$this->code = null;
		$this->codeGenTime = null;
		$this->codeType = AccountKeycode::TYPE_EMAILVERIFICATION;
		
		$this->email = "test@test.com";
		
		$this->output("fullEmailTest()");
		
		// create code
		$code = $this->test_createEmailVerificationCode();
		
		// retrieve and output code
		$this->test_retriveAndPrintKeycode($code);
		
		// check code validity
		$this->test_checkCodeValidity($code);
		
		// remove code and check removal
		$this->test_removeCodeAndCheck($code);
	}
	
	private function fullPasswordTest() {
		// setup variables
		$this->userID = 1000;
		$this->code = null;
		$this->codeGenTime = null;
		$this->codeType = AccountKeycode::TYPE_PASSWORDRESET;
		
		$this->output("fullPasswordTest()");
		
		// create code
		$code = $this->test_createPasswordResetCode();
		
		// retrieve and output code
		$this->test_retriveAndPrintKeycode($code);
		
		// check code validity
		$this->test_checkCodeValidity($code);
		
		// remove code and check removal
		$this->test_removeCodeAndCheck($code);
	}
	
	private function expiredCodeTest() {
		// setup variables
		$this->userID = 1000;
		$this->code = null;
		$this->codeGenTime = null;
		$this->codeType = AccountKeycode::TYPE_PASSWORDRESET;
		
		$this->output("expiredCodeTest()");
		
		// create code
		$code = $this->test_createPasswordResetCode();
		
		// retrieve and output code
		$this->test_retriveAndPrintKeycode($code);
		
		sleep(301);
		
		// check code validity
		$this->test_checkCodeValidity($code);
		
		// remove code and check removal
		$this->test_removeCodeAndCheck($code);
	}
	
	private function test_createEmailVerificationCode() {		
		$this->output("--- test_createEmailVerificationCode():");
		
		$code = $this->accountKeycode->createEmailVerificationCode($this->userID, $this->email);
		if($code != null) {
			$this->output("--- --- PASS - create returned true");
		}
		else {
			$this->output("--- --- FAIL - create returned false");
		}
		
		return $code;
	}
	
	private function test_createPasswordResetCode() {		
		$this->output("--- test_createPasswordResetCode():");
		
		$code = $this->accountKeycode->createPasswordResetCode($this->userID);
		if($code != null) {
			$this->output("--- --- PASS - create returned true");
		}
		else {
			$this->output("--- --- FAIL - create returned false");
		}
		
		return $code;
	}

	private function test_retriveAndPrintKeycode($code) {
		$this->output("--- test_retriveAndPrintKeycode():");
		$this->accountKeycode->retriveKeycode($code);
		$this->output("--- --- userID: " . $this->accountKeycode->getUserID());
		$this->output("--- --- code: " . $this->accountKeycode->getCode());
		$this->output("--- --- codeGenTime: " . $this->accountKeycode->getCodeGenTime());
		$this->output("--- --- codeType: " . $this->accountKeycode->getCodeType());
	}
	
	private function test_checkCodeValidity($code) {
		$this->output("--- test_checkCodeValidity():");
		$this->output("--- --- validity: " . $this->accountKeycode->isCodeTimeValid($code));
	}
	
	private function test_removeCodeAndCheck($code) {
		$this->output("--- test_removeCodeAndCheck():");
		$this->accountKeycode->deleteCode($code);
		
		$result = $this->accountKeycode->retriveKeycode($code);
		
		if(! $result) {
			$this->output("--- --- removal: pass");
		}
		else {
			$this->output("--- --- removal: fail");
		}
	}
	
	private function output($message) {
		echo $message . "<br />";
	}
}

?>