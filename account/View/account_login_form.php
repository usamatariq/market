<form id="loginForm" action="/market/ACCOUNT/Controller/account_login.php" method="POST">		
		<div id="loginEmailinput" class="form-group">
			<input id="loginEmail" type="text" placeholder="Email" class="form-control register-control" name="account_email">
		</div>
			
		<div id="loginPasswordinput" class="form-group">
			<input id="loginPassword" type="password" placeholder="Password" class="form-control register-control" name="account_password">
		</div>
		<div class="form-group">
			<input id="login" type="submit" class="button button-default btn btn-success" value="Login" />
		</div>
</form>
	
	<!--button type="button" class="button button-default btn btn-fail" onClick="parent.location='ACCOUNT/View/account_pw_reset_form.html'"">Forgot My Password =(</button-->