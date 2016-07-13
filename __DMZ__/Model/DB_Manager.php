<?php
	require $globe->g_root() . '/Model/Database.php';

	class DB_Manager {
		const IS_OFFLINE = false;

		public function insert($table, $columns, $values, $array) {
			if(DB_MANAGER::IS_OFFLINE) {
				return true;
			}
			else {
				$db = new Database();
				return $db->insert($table, $columns, $values, $array);
			}
		}

		public function selectAll($table) {
			if(DB_MANAGER::IS_OFFLINE) {
				return true;
			}
			else {
				$db = new Database();
				$result =  $db->selectAll($table);
				return $result;
			}
		}

		public function select($table, $columns, $values, $array) {
			if(DB_MANAGER::IS_OFFLINE) {
				return true;
			}
			else {
				$db = new Database();
				$result =  $db->select($table, $columns, $values, $array);
				return $result;
			}
		}

		public function update($table, $set, $where, $array) {
			if(DB_MANAGER::IS_OFFLINE) {
				return true;
			}
			else {
				$db = new Database();
				$result =  $db->update($table, $set, $where, $array);
				return $result;
			}
		}
	}
?>