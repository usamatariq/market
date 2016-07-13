<?php
	//Importing required Class
	require_once $globe->g_root() . '/ACCOUNT/Model/Account.php';
	require_once $globe->g_root() . '/ACCOUNT/Model/AccountKeycode.php';
	require_once $globe->g_root() . '/ACCOUNT/Model/EmailVerifier.php';
	require_once $globe->g_root() . '/PROFILE/Model/Profile.php';
	
	class AccountRegistrar {
		
		private $account;
		private $accountKeycode;
		private $emailVerifier;
		private $profile;
		
		public function __construct() {
			
			$this->account = new Account();
			$this->accountKeycode = new AccountKeycode();
			$this->emailVerifier = new EmailVerifier();
			$this->profile = new Profile();
		}
		
		// create account
		public function registerAccount($email, $password, $confirmPassword) {
			

			$accountResponse = $this->account->createAccount($email, $password, $confirmPassword);
			
			if($accountResponse == ACCOUNT::SUCCESS) {
				$userID = $this->account->getUserIDFromEmail($email);
				
				// send email verification
				$emailResponse = $this->emailVerifier->sendEmailVerification($userID, $email);
				
				// create profile record				
				$profileResponse = $this->profile->createProfile($userID);
				
				return ACCOUNT::SUCCESS;
			}
			else {
				return $accountResponse;
			}
		}
		

	}
?>