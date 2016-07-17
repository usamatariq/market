<?php 	
	require_once $globe->g_root() . '/ACCOUNT/Model/Account.php';
	$account = new Account();
	
	$account->retriveAccount($_SESSION['userID']);
	$firstname = $account->getFirstName();
	$lastname = $account->getLastName();
	$email = $account->getEmail();
?>
<!DOCTYPE html>
<html>
<head>
	<title>market - Jobs</title>
	<?php
		require_once($globe->g_head());
	?>
</head>
<body>
<?php
		require_once($globe->g_userHeader());
?>

<div class="container">
	<?php	echo '
			<tr>
            <td>Email</td>
			<td><fieldset disabled><input type	="text" value="'. $email .'" class="form-control"></fieldset></td>
			</tr>
			
			<tr>
            <td>Password</td>
			<td><a href="edit.php">Change Password</a></td>
			</tr>

			';
?>

	</div>
</div>
	
</body>

</html>