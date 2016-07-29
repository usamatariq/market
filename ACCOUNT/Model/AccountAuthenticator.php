<?php
	require_once $globe->g_root() . '/ACCOUNT/Model/Account.php';
	require_once $globe->g_root() . '/ACCOUNT/Model/AccountKeycode.php';
	
	class AccountAuthenticator {
		private $account;
		
		public function __construct() {
			$this->account = new Account();
		}
		
		public function authenticate($email, $password) {
			$userID = $this->account->getUserIDFromEmail($email);
			
			$this->account->retriveAccount($userID);
			
			if($userID != null) {
				$obtainedPasswordHash = $this->account->hashPassword($password);
				$actualPasswordHash = $this->account->getPasswordHash();
				
				if(password_verify($password, $actualPasswordHash)) {
					return $userID;
				}
			}
			
			return null;			
		}
		
		public function FBauthenticate($email) {
			$userID = $this->account->getUserIDFromEmail($email);
			
			$this->account->retriveAccount($userID);
			
			if($userID != null) {
					return $userID;				
			}
			
			return null;			
		}
		
		public function checkAccountStatus($userID) {
			return $this->account->getStatus();
		}
		
		public function initiatePasswordReset($email) {
			
		}
		
		public function attemptPasswordReset($email, $verificationCode) {
		}
		
		private function logAccessAttempt($email) {
		}
		
		public function sendPasswordReset() {
			$passwordResetCode = generateVerificationCode($email);
			
			$to = "Existing User";
			$subject = "Password Reset";
			$message = "
				Link: http://localhost/market/resetpassword.php?code=$emailVerificationCode
			";
			
			$mail = new Mail();
			// handle result
			$result = $mail->sendmail($email, $to, $subject, $message);
		}
	}
?>