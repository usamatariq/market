<?php
	require_once $globe->g_root() . '/ACCOUNT/Model/Account.php';
	require_once $globe->g_root() . '/ACCOUNT/Model/AccountKeycode.php';
	require_once $globe->g_root() . '/COMMON/Model/Mailer.php';

	class EmailVerifier {
		
		const SUCCESS = 0;
		const FAILURE = 1;
		const EMAIL_FAILURE = 2;		
		const CODE_INVALID = 3;
		
		private $account;
		private $accountKeycode;
		private $mailer;
		
		public function __construct() {
			$this->account = new Account();
			$this->accountKeycode = new AccountKeycode();
			$this->mailer = new Mailer();
		}
		
		// sendVerificationEmail
		public function sendEmailVerification($userID, $to_email) {
			$code = $this->accountKeycode->createEmailVerificationCode($userID, $to_email);
			
			if($code != null) {
				$to_name = "Newcomer!";
				
				$from_email = "gohweixiong86@gmail.com";
				$from_name = "Market";
				
				$subject = "Market Email Verification";
				$message = "
					Link: http://localhost/market/verify.php?code=$code
				";
				
				$result = $this->mailer->sendmail($to_email, $to_name, $from_email, $from_name, $subject, $message);
				
				if($result) {
					return $this::SUCCESS;
				}
				else {
					return $this::EMAIL_FAILURE;
				}
				
			}
			else {
				return $this::FAILURE;
			}
		}
		
		// verify email
		public function verifyEmail($userID, $code) {
			$result = $this->accountKeycode->retriveKeycode($code);
			
			if($result) {
				// check userID match
				$retrivedUserID = $this->accountKeycode->getUserID();
				if($retrivedUserID != $userID) {
					return $this::CODE_INVALID;
				}
				
				// check code type match
				$retrivedCodeType = $this->accountKeycode->getCodeType();
				if($retrivedCodeType != AccountKeycode::TYPE_EMAILVERIFICATION) {
					return $this::CODE_INVALID;
				}
				
				// check code not expired
				// if(! $this->accountKeycode->isCodeTimeValid()) {
					// $this->accountKeycode->deleteCode($code);
					// return $this::CODE_INVALID;
				// }
				
				// set account verified
				$this->account->setStatus($userID, Account::STATUS_VERIFIED);
				
				$this->accountKeycode->deleteCode($code);
				return $this::SUCCESS;
				
			}
			else {
				return $this::CODE_INVALID;
			}
		}
		

	}

?>