<form id="loginForm" class="navbar-form navbar-right" action="/market/ACCOUNT/Controller/account_login.php" method="POST">		
		<div id="loginEmailinput" class="form-group">
			<input id="loginEmail" type="text" placeholder="Email" class="form-control" name="account_email">
		</div>
			
		<div id="loginPasswordinput" class="form-group">
			<input id="loginPassword" type="password" placeholder="Password" class="form-control" name="account_password">
		</div>

	<input type="submit" class="button button-default btn btn-success" value="Login" />
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register">Register</button>
	<!--button type="button" class="button button-default btn btn-fail" onClick="parent.location='ACCOUNT/View/account_pw_reset_form.html'"">Forgot My Password =(</button-->
</form>
	
