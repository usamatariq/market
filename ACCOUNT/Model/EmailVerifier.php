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
				<html>
				<head>
					<style>
					.btn {
					  display: inline-block;
					  padding: 6px 12px;
					  margin-bottom: 0;
					  font-size: 14px;
					  font-weight: normal;
					  line-height: 1.42857143;
					  text-align: center;
					  white-space: nowrap;
					  vertical-align: middle;
					  -ms-touch-action: manipulation;
						  touch-action: manipulation;
					  cursor: pointer;
					  -webkit-user-select: none;
						 -moz-user-select: none;
						  -ms-user-select: none;
							  user-select: none;
					  background-image: none;
					  border: 1px solid transparent;
					  border-radius: 4px;
					}
					
					.btn-danger {
					  color: #fff;
					  background-color: #d9534f;
					  border-color: #d43f3a;
					}
					</style>
					
				</head>
				<body>
					<a href='http://localhost/market/verify.php?code=$code' class='btn btn-danger' role='button'>Verify Email</a>
				</body>
				</html>
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
		public function verifyEmail($code) {
			$result = $this->accountKeycode->retriveKeycode($code);
			
		// CODE IS VALID	
			if($result) {
				// check userID match
				$retrivedUserID = $this->accountKeycode->getUserID();
				//if($retrivedUserID != $userID) {
				//	return $this::CODE_INVALID;
				//}
				
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
				
				// SET ACCOUNT STATUS
				$this->account->setStatus($retrivedUserID, Account::STATUS_VERIFIED);
				
				// CREATE NEW PROFILE
				//$account->retriveAccount($_SESSION['userID']);
				//$firstname = $this->$account->getFirstName();
				//$lastname = $this->$account->getLastName();
				//$this->account->createProfile($retrivedUserID, $firstname, $lastname);
				
				// DELETE KEYCODE
				$this->accountKeycode->deleteCode($code);
				
				return $this::SUCCESS;
				
			}
		// CODE IS INVALID
			else {
				return $this::CODE_INVALID;
			}
		}
		

	}

?>