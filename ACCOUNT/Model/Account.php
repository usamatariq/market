<?php
	require_once $globe->g_root() . '/lib/password.php';
	require_once $globe->g_root() . '/COMMON/Model/Database.php';
	
class Account {

	// class variables - account
	private $userID;
	private $passwordHash;
	private $email;
	private $status;
	
	const SUCCESS = 0;
	const FAILURE = 1;
	const USERNAME_TAKEN = 2;
	const USERNAME_INVALID = 3;
	const PASSWORD_INVALID = 4;
	const PASSWORD_MISMATCH = 5;
	const EMAIL_INVALID = 6;
	const EMAIL_IN_USE = 7;
	
	const STATUS_UNVERIFIED = 0;
	const STATUS_VERIFIED = 1;
	const STATUS_SUSPENDED = 2;
	const STATUS_CLOSED = 3;
	
	public function __construct() {
	}
	
	// --- SETUP
	public function retriveAccount($userID) {
		$table = 'account';
		$columns = '*';
		$values = 'account_userid = :account_userid';
		$array = array(
			':account_userid' => $userID
		);

		$db = new Database();
		$resultArr = $db->select($table, $columns, $values, $array);
		
		if (sizeof($resultArr) == 1) {
			$this->userID = $resultArr[0]['account_userid'];
			$this->passwordHash = $resultArr[0]['account_pw_hash'];
			$this->email = $resultArr[0]['account_email'];
			$this->status = $resultArr[0]['account_status'];
			return true;
		}
		else {
			return false;
		}
	}
	
	public function createAccount($email, $password, $confirmPassword) {	
		// check email
			// valid form
		if(!$this->isValidEmail($email)) {
			return $this::EMAIL_INVALID;
		}
			// if in use
		if(!$this->isEmailAvailable($email)) {
			return $this::EMAIL_IN_USE;
		}

		// check password
		if(!$this->isValidPassword($password)) {
			return $this::PASSWORD_INVALID;
		}
		
		// check password match
		if(!$this->isPasswordMatch($password, $confirmPassword)) {
			return $this::PASSWORD_MISMATCH;
		}
		
		// generate hash
		$hash = $this->hashPassword($password);
		
		// store in account DB
		$table = 'account';
		$columns = 'account_userid, account_pw_hash, account_email, account_status';
		$values = ':account_userid, :account_pw_hash, :account_email, :account_status';
		$array = array(
			
			'account_userid' => 0,
			'account_pw_hash' => $hash,
			'account_email' => $email,
			'account_status' => 0
		);
		
		$db = new Database();
		if($db->insert($table, $columns, $values, $array)) {
			return $this::SUCCESS;
		}
		else {
			return $this::FAILURE;
		}
	}
		
	// --- GETTERS
	public function getUserID() {
		return $this->userID;
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	public function getPasswordHash() {
		return $this->passwordHash;
	}
	
	public function getStatus() {
		return $this->status;
	}
	
	// --- SETTERS
	public function setEmail($userID, $email) {
		if(! $this->isValidEmail($email)) {
			return $this::EMAIL_INVALID;
		}
		
		$table = 'account';
		$set = 'account_email = :account_email';
		$where = 'account_userid = :account_userid';
		$array = array(
			'account_userid' => $userID,
			'account_email' => $email
		);
		
		$db = new Database();
		if($db->update($table, $set, $where, $array)) {
			$this->email = $email;
			return $this::SUCCESS;
		}
		else {
			return $this::FAILURE;
		}
	}
	
	public function setPassword($userID, $password) {
		if(! $this->isValidPassword($password)) {
			return $this::PASSWORD_INVALID;
		}
		
		$hash = $this->hashPassword($password);
		
		$table = 'account';
		$set = 'account_pw_hash = :account_pw_hash';
		$where = 'account_userid = :account_userid';
		$array = array(
			
			'account_userid' => $userID,
			'account_pw_hash' => $hash
		);
		
		$db = new Database();
		if($db->update($table, $set, $where, $array)) {
			$this->passwordHash = $hash;
			return $this::SUCCESS;
		}
		else {
			return $this::FAILURE;
		}
	}
	
	public function setStatus($userID, $status) {
		$table = 'account';
		$set = 'account_status = :account_status';
		$where = 'account_userid = :account_userid';
		$array = array(
			
			'account_userid' => $userID,
			'account_status' => $status
		);
		
		$db = new Database();
		if($db->update($table, $set, $where, $array)) {
			$this->status = $status;
			return $this::SUCCESS;
		}
		else {
			return $this::FAILURE;
		}
	}

	// --- RETRIVE FROM DATABASE
	public function getUserIDFromEmail($email) {
		$table = 'account';
		$columns = 'account_userid';
		$values = 'account_email = :account_email';
		$array = array(
			':account_email' => $email
		);

		$db = new Database();
		$resultArr = $db->select($table, $columns, $values, $array);

		if (sizeof($resultArr) == 1) {
			return $resultArr[0]['account_userid'];
		}
		return null;
	}
	
	// --- CHECKERS
		
	public function isEmailAvailable($email) {
		$userID = $this->getUserIDFromEmail($email);
		if($userID == null) {
			return true;
		}
		else {
			return false;
		}
	}

	private function isValidPassword($password) {
		$length = strlen($password);
		if($length >= 8) {
			return true;
		}
		else {
			return false;
		}
	}
	
	private function isPasswordMatch($password, $confirmPassword) {
		if(strcmp($password,$confirmPassword) == 0) {
			return true;
		}
		else {
			return false;
		}
	}

	private function isValidEmail($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL) 
			&& preg_match('/@.+\./', $email);
	}
	
	public function hashPassword($password) {
		return password_hash($password, PASSWORD_BCRYPT);
	}
	
}
?>