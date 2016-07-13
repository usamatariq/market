<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	session_start();
	require_once $_SERVER["DOCUMENT_ROOT"] . "/market/COMMON/Globe.php";
	$globe = new Globe();
?>

<!DOCTYPE html>	
<html>
<head>
	<title>Market</title>
	<?php
		require_once($globe->g_head());
	?>
	
</head>

<body>
	<?php
		require_once($globe->g_guestHeader());
	?>
	<div class="container home-tab" style="margin-top:20px;">
	<?php	

		//CODE
		if(isset($_GET['code'])) {
			$code = htmlspecialchars($_GET['code']);
			
			// LOGGED IN
			if(isset($_SESSION['userID'])) {
				$location = "/market/ACCOUNT/Controller/account_emailVerification.php?code=" . $code . "&userID=" . $_SESSION['userID'];
				header("Location: $location");
			}

			// LOGGED OUT
			else {
				$location = "/market/ACCOUNT/Controller/account_emailVerification.php?code=" . $code;
				header("Location: $location");
				//require_once $globe->g_root() . '/ACCOUNT/VIEW/verify_login_form.html';
			}
		}
		
		//RESPONSE
		if(isset($_GET['response'])) {
			$response = htmlspecialchars($_GET['response']);
			switch($response) {
				case "notify":
					echo "Welcome, you are not yet verified. check email.";
					break;
				case "code_invalid":
					echo "Sorry, there is a problem with your code.";
					break;
				case "login_failed":
					echo "Sorry, your login failed.";
					break;
				case "success":
					echo "login please";
					require_once $globe->g_root() . '/ACCOUNT/VIEW/verify_login_form.html';
					break;
				default:
					echo "wtf.";
					break;
			}
		}
		
		//RESPONSE & CODE
		if(!isset($_GET['code']) && !isset($_GET['response'])) {
			echo "WTF YO";
		}
	?>
	</div>
	
	<?php require_once($globe->g_footer()); ?>
</body>
</html> 