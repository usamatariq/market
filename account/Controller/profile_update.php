<?php
	session_start();
	if(!isset($_SESSION['userID'])) {
		header("Location: home.php");
	}
?>

<?php
	require $_SERVER["DOCUMENT_ROOT"] . "/market/COMMON/Globe.php";
	$globe = new Globe();
	
	require $_SERVER["DOCUMENT_ROOT"] . "/market/profile/Model/Profile.php";
	$profile = new Profile();
	
	require $_SERVER["DOCUMENT_ROOT"] . "/market/account/Model/Account.php";
	$account = new Account();
	
	$userID = $_SESSION['userID'];
	
	$firstname 	= htmlspecialchars($_POST['firstname']);
	$lastname 	= htmlspecialchars($_POST['lastname']);
	
	$dob 		= htmlspecialchars($_POST['dob']);
	$mobile 	= htmlspecialchars($_POST['mobile']);
	
	//DATE FORMAT
			$dob = date("Y-m-d", strtotime($dob));
			
	
	$account->updateAccount($userID, $firstname, $lastname);
	$result = $profile->updateProfile($userID, $dob, $mobile);
	
	if($result) {
		header("Location: /market/account/");
	}
	else {
	}
	
?>