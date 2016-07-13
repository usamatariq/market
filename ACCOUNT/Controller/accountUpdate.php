<?php
	session_start();
	if(!isset($_SESSION['username'])) {
		header("Location: home.php");
	}
	else {
		$username = $_SESSION['username'];
		$oldPassword = htmlspecialchars($_POST['old_password']);
		$newPassword = htmlspecialchars($_POST['new_password']);
		$newEmail = htmlspecialchars($_POST['email']);
		
		$connection = mysqli_connect("localhost", "danceseen", "12345", "Danceseen");
		if(!$connection) {
			echo "Cannot connect to database!";
		}
		else {
			//confirm old password
			$result = mysqli_query($connection, 'SELECT * FROM account WHERE username="' . $username . '"');
			$userInfo = $result->fetch_array();
			if(strcmp ($userInfo['password'], $oldpassword) == 0) {
				if($newPassword != '') {
					$query = 'UPDATE account SET password="' . $newPassword . '" WHERE username="' . $username . '"';
					$result = mysqli_query($connection, $query);
				}
				if($newEmail != '') {
					$query = 'UPDATE account SET email="' . $newEmail . '" WHERE username="' . $username . '"';
					$result = mysqli_query($connection, $query);
				}
			}
			else {
				echo "Invalid password!";
			}
			//header("Location: profile.php");
		}
	}
	
?>