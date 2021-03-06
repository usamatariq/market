<?php
	require_once $globe->g_root() . '/COMMON/Model/Database.php';

	class Profile {
		
		const SUCCESS = 0;
		const FAILURE = 1;
		
		public function __construct() {
			
		}
		
		public function createProfile($userID) {
		// INSERT INTO DATABASE 
		$table = 'profile';
		$columns = 'profile_userid';
		$values = ':profile_userid';
		$array = array(			
			'profile_userid' => $userID,
		);
		
		$db = new Database();
		if($db->insert($table, $columns, $values, $array)) {
			return $this::SUCCESS;
			}
		else {
			return $this::FAILURE;
			}
		}
		
		public function updateProfile($userID, $dob, $mobile) {
			$globe = new Globe();
			
			
			$table = "profile";
			$set = "profile_dob=:profile_dob, 
					profile_mobile=:profile_mobile";
						
			$where = "profile_userid=:profile_userid";
			$array = array(
				":profile_userid"=>$userID,
				":profile_dob" => $dob,
				":profile_mobile"=>$mobile
			);
			
			if($globe::IS_TEST) {
				return true;
			}
			else {
				$db = new Database();
				if($db->update($table, $set, $where, $array)) {
					return true;
				}
				else {
					return false;
				}	
			}
		}
		
			
		public function set($username, $column, $value) {
			$table = 'profile';
			$set = "$column = :$column";
			$where = 'username = :username';
			$array = array(
				':username' => $username,
				":$column" => $value
			);

			$dbm = new DB_MANAGER();
			$resultArr = $dbm->update($table, $set, $where, $array);
		}

		private function getter($columns, $username) {
			$table = 'profile';
			$values = 'profile_userid = :profile_userid';
			$array = array(
				'profile_userid' => $username
			);

			$dbm = new DB_MANAGER();
			$resultArr = $dbm->select($table, $columns, $values, $array);

			return $resultArr;
		}

		public function getProfile($userid) {
			$table = 'profile';
			$columns = '*';
			$where = 'profile_userid = :profile_userid';
			
			$array = array(
				":profile_userid" => $userid
				);
				
			$db = new Database();
			$resultArr = $db->select($table, $columns, $where, $array);

			if (is_array($resultArr)) {
				return $resultArr;
			}
			return false;
		}

		public function getLastName($username) {
			$columns = 'lastName';

			$resultArr = $this->getter($columns);

			if (is_array($resultArr)) {
				return $resultArr[0]['lastName'];
			}
			return false;
		}

		public function getFullName($username) {
			$first = $this->getFirstName($username);
			$last = $this->getLastName($username);

			return "$first $last";
		}

		public function getDOB($username) {
			$columns = 'dob';

			$resultArr = $this->getter($columns);

			if (is_array($resultArr)) {
				return $resultArr[0]['dob'];
			}
			return false;
		}

		public function getAvatar($username) {
			$columns = 'avatar';

			$resultArr = $this->getter($columns);

			if (is_array($resultArr)) {
				return $resultArr[0]['avatar'];
			}
			return false;
		}

		public function getGender($username) {
			$columns = 'gender';

			$resultArr = $this->getter($columns);

			if (is_array($resultArr)) {
				return $resultArr[0]['gender'];
			}
			return false;
		}

		public function getMobile($username) {
			$columns = 'mobile';

			$resultArr = $this->getter($columns);

			if (is_array($resultArr)) {
				return $resultArr[0]['mobile'];
			}
			return false;
		}

		public function getAbout($username) {
			$columns = 'about';

			$resultArr = $this->getter($columns);

			if (is_array($resultArr)) {
				return $resultArr[0]['about'];
			}
			return false;
		}


	}
?>