<?php
	include("Database.php");
	$db = new Database();
	
	$table = "account";
	$array = array(
		"username" => "dave",
		"password" => "dave1"
	);
	$username = "dave";
	$password = "dave1";
	
	$result = $db->selectAll($table, "username", $username);
	$userInfo = $result->fetch_array();
	if(!$userInfo) {
		echo "Login fail";
	}
	else {
		if($userInfo['password'] == $password) {
			echo "Match!";
			$_SESSION['username'] = $username;
			
			if(isset($_SESSION['username'])) {
				echo "HELLO, {$_SESSION['username']}";
			}
			else {
				echo "HELLO, Guest!";
			}
		}
		else {
			echo "Nope";
		}
	}
?>