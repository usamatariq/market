<?php 	
	require_once $globe->g_root() . '/ACCOUNT/Model/Account.php';
	$account = new Account();
	
	$account->retriveAccount($_SESSION['userID']);
	$firstname = $account->getFirstName();
	$lastname = $account->getLastName();
	$email = $account->getEmail();

?>
<form action="/market/account/Controller/profile_update.php" method="post">
<table class="table">
	<thead>
		<tr>
			<th style="width:30%;">Account Setting</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php	echo '
		<tr>
            <td>First Name</td>
			<td><input name="firstname" type	="text" value="'. $firstname .'" class="form-control"></td>
		</tr>
			
		<tr>
            <td>Last Name</td>
			<td><input name="lastname" type	="text" value="'. $lastname .'" class="form-control"></td>
			</tr>
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
	</tbody>
</table>

<table class="table">
	
		<?php require $globe->g_root() . "/account/view/profile.php";?>
	
</table>
</form>

<table class="table">
	<thead>
		<tr>
			<th style="width:30%;">Others</th>
			<th></th>
        </tr>
	</thead>
	<tbody>
		<tr>
			<td><a href='#' style='color:#d9534f'>Delete Account<a></td>
		</tr>
	</tbody>
</table>
