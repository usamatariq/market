<?php

require_once "EmailVerifier.php";
require_once $globe->g_root() . '/COMMON/Model/Test.php';

class T_EmailVerifier {
	private $userID;
	private $email;
	private $password;
	private $confirmPassword;
	
	private $emailVerifier;
	private $test;
	
	public function runTests() {
		
		$this->emailVerifier = new EmailVerifier();
		$this->test = new Test();
		
		$this->test->output("TEST - EMAIL VERIFIER");
		
		$this->test->output("Truncating table: keycode");
		$this->test->truncate("keycode");
		
		// create new account
		$this->test_sendEmail_bounce();
	}

	private function test_sendEmail_bounce() {
		$this->test->output("--- test_sendEmail_bounce():");
		// setup variables
		$userID = 0;
		$email = "confirmbounce@danceseen.com";
		
		$response = $this->emailVerifier->sendEmailVerification($userID, $email);
		
		if($response == EmailVerifier::EMAIL_FAILURE) {
			$this->test->output("--- --- PASS - returned failure");
		}
		else {
			$this->test->output("--- --- FAIL: " . $response);
		}
	}
	
	private function test_sendEmail() {
	
	}
	
	private function test_resendEmail() {
		
	}
	
	private function test_verifyEmail_uidMismatch() {
		
	}
	
	private function test_verifyEmail_codeTypeMismatch() {
		
	}
	
	private function test_verifyEmail_codeExpired() {
		
	}
	
	private function test_verifyEmail() {
		
	}
}

?>