<!DOCTYPE html>

<?php
	session_start();
	require_once $_SERVER["DOCUMENT_ROOT"] . "/danceseen/Globe.php";
	$globe = new Globe();
	
	require_once '/Model/Message.php';
	
	if(!isset($_SESSION['userID'])) {
		$home = $globe->g_root() . "/danceseen/index.php";
		header("Location: $home");
	}
?>

<html>
<head>
	<title>Danceseen</title>
	<?php
		require_once($globe->g_head());
	?>
	
</head>
	<?php
		require_once($globe->g_userHeader());
	?>
<body >
	
<div class="container container-main">
<!--------------Main-------------->	
	<div class="col-md-6 col-md-offset-1">	

				<?php require_once("/View/Messaging/showInbox.php"); ?>
		
	</div>
<!--------------Side-------------->			
	<div class="col-md-4">
			<div class="panel-body">
					<form method="post" action="/danceseen/Controller/Messaging/sendMessage.php">
						<label>To:</label><input type="text" name="message_to" class="form-control register-control"><br>
						<label>Subject:</label><input type="text" name="message_subject" class="form-control register-control"><br>
						<label>Message:</label><textarea rows="10" cols="40" name="message_text" class="form-control register-control"></textarea><br>
					<input type="submit" name="submit" value="Send">
				</form>	
				</div>
	</div>

</div>
	<?php require_once($globe->g_footer()); ?>

</body>
</html> 