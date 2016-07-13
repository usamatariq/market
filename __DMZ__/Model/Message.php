<?php
	require $globe->g_root() . '/lib/password.php';
	require $globe->g_root() . '/Model/DB_Manager.php';
	require $globe->g_root() . '/ResponseCodes.php';
	
	class Message {
		
		
		public function getUserMessages($userid) {
			$table = 'message';
			$columns = '*';
			$values = 'message_to_id = :message_to_id';
			$array = array(
				':message_to_id' => $userid
			);

			$dbm = new DB_MANAGER();
			$resultArr = $dbm->select($table, $columns, $values, $array);

			if (is_array($resultArr)) {
				return $resultArr;
			}
			return false;
		}
		
		public function getIdFromUsername($username) {
			$table = 'account';
			$columns = 'account_userid';
			$values = 'account_username = :account_username';
			$array = array(
				':account_username' => $username
			);

			$dbm = new DB_MANAGER();
			$resultArr = $dbm->select($table, $columns, $values, $array);

			if (is_array($resultArr)) {
				return $resultArr[0]['account_userid'];
			}
			return false;
		}
		
		public function getMessageTo($messageID) {
			$table = 'message';
			$columns = 'message_to_id';
			$values = 'message_id = :message_id';
			$array = array(
				':message_id' => $messageID
			);

			$dbm = new DB_MANAGER();
			$resultArr = $dbm->select($table, $columns, $values, $array);

			if (is_array($resultArr)) {
				return $resultArr[0]['message_to_id'];
			}
			return false;
		}
		
		public function getMessageFrom($messageID) {
			$table = 'message';
			$columns = 'message_from_id';
			$values = 'message_id = :message_id';
			$array = array(
				':message_id' => $messageID
			);

			$dbm = new DB_MANAGER();
			$resultArr = $dbm->select($table, $columns, $values, $array);

			if (is_array($resultArr)) {
				return $resultArr[0]['message_from_id'];
			}
			return false;
		}
		
		public function getMessageSubject($messageID) {
			$table = 'message';
			$columns = 'message_subject';
			$values = 'message_id = :message_id';
			$array = array(
				':message_id' => $messageID
			);

			$dbm = new DB_MANAGER();
			$resultArr = $dbm->select($table, $columns, $values, $array);

			if (is_array($resultArr)) {
				return $resultArr[0]['message_subject'];
			}
			return false;
		}
		
		public function getMessageText($messageID) {
			$table = 'message';
			$columns = 'message_text';
			$values = 'message_id = :message_id';
			$array = array(
				':message_id' => $messageID
			);

			$dbm = new DB_MANAGER();
			$resultArr = $dbm->select($table, $columns, $values, $array);

			if (is_array($resultArr)) {
				return $resultArr[0]['message_text'];
			}
			return false;
		}
		
		public function addMessage($message_to, $message_from, $message_subject, $message_text) {
			$table = 'message';
			$columns = 'message_to_id, message_from_id, message_subject, message_text';
			$values = ':message_to_id, :message_from_id, :message_subject, :message_text';
			$array = array(
				
				'message_to_id' => $message_to,
				'message_from_id' => $message_from,
				'message_subject' => $message_subject,
				'message_text' => $message_text
			);
			
			$dbm = new DB_MANAGER();
			if($dbm->insert($table, $columns, $values, $array)) {
				return true;
			}
			else {
				return false;
			}	
		}
	}
?>