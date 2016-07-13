<?php
	require_once "Globe.php";
	class Database {
		function connect() {
			$globe = new Globe();
			$db = new PDO('mysql:dbname=' . $globe::DATABASE . ';host=' . $globe::HOST . ';charset=UTF8', $globe::USER, $globe::PASSWORD);

			$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $db;
		}

		function insert($table, $columns, $values, $array) {
			$db = $this->connect();

			$preparedStatement = $db->prepare("INSERT INTO $table ($columns) VALUES ($values)");

			return $preparedStatement->execute($array);
		}
		
		function deleteRowByCondition($table, $condition, $array) {
			$db = $this->connect();

			$preparedStatement = $db->prepare("DELETE FROM $table WHERE $condition");
			
			return $preparedStatement->execute($array);
		}
		
		function selectAll($table) {
			$db = $this->connect();

			$preparedStatement = $db->prepare("SELECT * FROM $table");

			$preparedStatement->execute();

			$result =  $preparedStatement->fetchAll();

			return $result;
		}

		function select($table, $columns, $where, $array) {
			$db = $this->connect();

			$preparedStatement = $db->prepare("SELECT $columns FROM $table WHERE $where");

			$preparedStatement->execute($array);

			$result = $preparedStatement->fetchAll();

			return $result;
		}
		
		function search($table, $columns, $where, $sort, $page, $limit) {
			$db = $this->connect();
			
			$this->_page    = $page;
			$this->_limit   = $limit;
			
			if ( $this->_limit == 0 ) {
				$preparedStatement = $db->prepare("SELECT $columns FROM $table WHERE $where ORDER BY $sort asc");
			} else {
				$preparedStatement = $db->prepare("SELECT $columns FROM $table WHERE $where ORDER BY $sort asc LIMIT  	" . ( ( $this->_page - 1 ) * $this->_limit ) . ", $this->_limit");
			}
			
			$preparedStatement->execute();
			
			$result = $preparedStatement->fetchAll();

			return $result;
		}

		function update($table, $set, $where, $array) {
			$db = $this->connect();

			$preparedStatement = $db->prepare("UPDATE $table SET $set WHERE $where");

			$result = $preparedStatement->execute($array);

			return $result;
		}
		
		function truncate($table) { // FOR TESTING ONLY
			$db = $this->connect();

			$preparedStatement = $db->prepare("TRUNCATE TABLE $table");

			$result = $preparedStatement->execute();

			return $result;
		}
	}

?>