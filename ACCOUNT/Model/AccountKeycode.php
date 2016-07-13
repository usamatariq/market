<?php

require_once $globe->g_root() . '/COMMON/Model/Database.php';

class AccountKeycode {
	// class variables
	private $userID;
	private $code;
	private $codeGenTime;
	private $codeType;
	
	const TYPE_EMAILVERIFICATION = 1;
	const TYPE_PASSWORDRESET = 2;
	
	const VERIFICATION_SUCCESS = 7;
	const CODE_INVALID = 8;
	
	public function __construct() {
	}
	
	// --- SETTERS
	
	public function retriveKeycode($code) {
		$table = 'keycode';
		$columns = '*';
		$values = 'keycode_code = :code';
		$array = array(
			':code' => $code
		);

		$db = new Database();
		$resultArr = $db->select($table, $columns, $values, $array);

		if (sizeof($resultArr) == 1) {
			$this->userID = $resultArr[0]['keycode_userid'];
			$this->code = $resultArr[0]['keycode_code'];
			$this->codeGenTime = $resultArr[0]['keycode_codeGenTime'];
			$this->codeType = $resultArr[0]['keycode_codeType'];
			return true;
		}
		else {
			return false;
		}
	}
	
	public function createEmailVerificationCode($userID, $email) {
		$this->userID = $userID;
		$this->code = $this->generateEmailVerificationCode($email);
		$this->codeGenTime = time();
		$this->codeType = $this::TYPE_EMAILVERIFICATION;
		
		$table = 'keycode';
		$columns = 'keycode_userid, keycode_code, keycode_codeGenTime, keycode_codeType';
		$values = ':keycode_userid, :keycode_code, :keycode_codeGenTime, :keycode_codeType';
		$array = array(
			'keycode_userid' => $this->userID,
			'keycode_code' => $this->code,
			'keycode_codeGenTime' => $this->codeGenTime,
			'keycode_codeType' => $this->codeType
		);

		$db = new Database();
		$result = $db->insert($table, $columns, $values, $array);
		
		if($result) {
			return $this->code;
		}
		else {
			return null;
		}
	}
	
	public function createPasswordResetCode($userID) {
		$this->userID = $userID;
		$this->code = $this->generatePasswordResetCode();
		$this->codeGenTime = time();
		$this->codeType = $this::TYPE_PASSWORDRESET;
	
		$table = 'keycode';
		$columns = 'keycode_userid, keycode_code, keycode_codeGenTime, keycode_codeType';
		$values = ':keycode_userid, :keycode_code, :keycode_codeGenTime, :keycode_codeType';
		$array = array(
			'keycode_userid' => $this->userID,
			'keycode_code' => $this->code,
			'keycode_codeGenTime' => $this->codeGenTime,
			'keycode_codeType' => $this->codeType
		);

		$db = new Database();
		$result = $db->insert($table, $columns, $values, $array);
		
		if($result) {
			return $this->code;
		}
		else {
			return null;
		}
	}
	
	// public function removeExistingUserCode {
		
	// }
	
	// --- GETTERS
	public function getUserID() {
		return $this->userID;
	}
	
	public function getCode() {
		return $this->code;
	}
	
	public function getCodeGenTime() {
		return $this->codeGenTime;
	}
	
	public function getCodeType() {
		return $this->codeType;
	}
	
	// --- STANDARD
	
	public function isCodeTimeValid() {
		$currentTime = time();
		$timeToExpire = 300;

		$elapsedTime = $currentTime - $this->codeGenTime;
		if($elapsedTime < $timeToExpire ) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function deleteCode($code) {
		$table = 'keycode';
		$condition = 'keycode_code = :code';
		$array = array(
			':code' => $code
		);

		$db = new Database();
		return $db->deleteRowByCondition($table, $condition, $array);
	}
	
	// --- PRIVATE
	
	private function generateEmailVerificationCode($email) {
		$code = null;
		
		while(1) {
			$preSHA = $email . mt_rand();
			$code = sha1($preSHA);
			
			if(! $this->checkCodeExists($code)) {
				break;
			}
		}
		
		return $code;
	}
	
	private function generatePasswordResetCode() {
		$code = null;
		
		while(1) {
			$preSHA = mt_rand();
			$code = sha1($preSHA);
			
			if(! $this->checkCodeExists($code)) {
				break;
			}
		}
		
		return $code;
	}
	
	private function checkCodeExists($code) {
		$table = 'keycode';
		$columns = 'keycode_code';
		$values = 'keycode_code = :code';
		$array = array(
			':code' => $code
		);

		$db = new Database();
		$resultArr = $db->select($table, $columns, $values, $array);

		if (sizeof($resultArr) == 1) {
			return true;
		}
		else {
			return false;
		}
	}
}

?>