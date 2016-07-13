<?php

require_once "Database.php";

class Test {
	
	public function output($message) {
		echo $message . "<br />";
	}
	
	public function truncate($table) {
		$db = new Database();
		$db->truncate($table);
	}
}

?>