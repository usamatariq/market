<?php
	require_once $globe->g_root() . '/COMMON/Model/Database.php';

	class Profile {
		
		public function __construct() {
			
		}
		
		public function createProfile() {
			return null;
		}
		
		// ---- OLD

		
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
			$where = 'userid = :account_userid';
			
			$array = array(
				":account_userid" => $userid
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