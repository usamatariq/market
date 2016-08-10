<form action="/market/ACCOUNT/Controller/account_register.php" method="post">
	<div class="form-group">
		<input id="firstname" type="text" placeholder="First Name" class="form-control register-control" name="account_firstname"/>
	</div>
	<div class="form-group">
		<input id="lastname" type="text" placeholder="Last Name" class="form-control register-control" name="account_lastname"/>
	</div>
	<div class="form-group">
		<input id="email" type="text" placeholder="Email" class="form-control register-control" name="account_email"/>
	</div>
	<div class="form-group">
		<input id="password" type="text" placeholder="Password" class="form-control register-control" name="account_password"/>
	</div>
	<div class="form-group">	
		<input id="confirmpassword" type="text" placeholder="Confirm Password" class="form-control register-control" name="account_confirmpassword" />
	</div>
	<div class="form-group">	
		<input type="button" class="btn btn-success btn-center" value="Sign Up" onclick="submitForm(this.form)"/>
	</div>
	<div class="form-group">
		<button type="button" class="btn btn-primary btn-center" onclick="fbregister();">Register with Facebook</button>
	</div>
</form>

