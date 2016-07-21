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
	
	$userID = $_SESSION['userID'];
	
	$firstname = htmlspecialchars($_POST['firstname']);
	$lastname = htmlspecialchars($_POST['lastname']);
	$dob = htmlspecialchars($_POST['dob']);
	$mobile = htmlspecialchars($_POST['mobile']);
	
	//changing date format
	$dob = date_create($dob);
	$dob = date_format($dob, 'Y-m-d');
	
	$result = $profile->updateProfile($userID, $firstname, $lastname, $dob, $mobile);
	if($result) {
		header("Location: /market/account/");
	}
	else {
	}
	
?>