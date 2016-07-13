<!DOCTYPE html>

<?php
	session_start();
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/Globe.php";
	$globe = new Globe();
	
	// if(!isset($_SESSION['userID'])) {
		// $index = $globe->g_root() . "/danceseen/index.php";
		// header("Location: $index");
	// }
	// if(!isset($_SESSION['userVerified'])) {
		// $home = $globe->g_root() . "/danceseen/home.php";
		// header("Location: $home");
	// }
	
?>

<html>
<head>
	<title>Danceseen</title>
	<?php
		require_once($globe->g_head());
	?>
	
</head>
	<?php
		require_once($globe->g_unverifiedHeader());
	?>
<body >

	<div class="container">
		<div class="row" style="margin-top:10px;">
			<h1> Welcome to DANCESEEN </h1>
			
			<form id="loginForm" class="navbar-form navbar-right" action="/danceseen/Controller/login.php" method="POST">		
			
				<div id="loginEmailinput" class="form-group">
					<input id="loginEmail" type="text" placeholder="Email" class="form-control" name="loginEmail">
				</div>
					
				<div id="loginPasswordinput" class="form-group">
					<input id="loginPassword" type="password" placeholder="Password" class="form-control" name="loginPassword">
				</div>
				
				<input id="login" name="login" type="button" value="Login" class="Button3"/>			
				

			</form>
			
		</div>
	
	<?php require_once($globe->g_footer()); ?>
	</div>
</body>
</html> 