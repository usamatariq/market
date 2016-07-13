<!DOCTYPE html>

<?php
	session_start();
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/Globe.php";
	$globe = new Globe();
	
	if(isset($_SESSION['username'])) {
		$home = $globe->g_root() . "/danceseen/home.php";
		header("Location: $home");
	}
?>

<html>
<head>
	<title>Danceseen</title>
	<?php
		require_once($globe->g_head());
	?>
<script type='text/javascript' src='/danceseen/js/formValidation.js'></script>

</head>
	<?php
		require_once($globe->g_guestHeader());
	?>
<body >
	<div class="container">
	
		<div class="row" style="margin-top:10px;">
			<div class="col-lg-4">
			<h2>Register</h2>
				<form action="/danceseen/Controller/signup.php" method="post">
					<div id="userinput" class="form-group ">
					
					<input id="username" type="text" placeholder="Username" class="form-control" name="account_username" />
					</div>
					<div id="passwordinput" class="form-group ">
					<input id="password" type="text" placeholder="Password" class="form-control" name="account_password"/>
					</div>
					<div id="emailinput" class="form-group ">
					<input id="email" type="text" placeholder="Email" class="form-control" name="account_email" />
					</div>
					
					<input type="button" class="button button-default" value="Sign Up" onclick="submitForm(this.form) ;" />
					
				</form>	
				
			</div>
			
			<div class="col-lg-4">
				Empty

			</div>
		</div>
	
	<?php require_once($globe->g_footer()); ?>
	</div>
	

</body>
<script>

$("#username").popover({
	placement: "right",
	trigger:"manual",
	content:"Username must be at least 4 characters"
});

$("#password").popover({
	placement: "right",
	trigger:"manual",
	content:"Password must at least contain a number, an alphabet and at least 8 - 12 characters"
});

$("#email").popover({
	placement: "right",
	trigger:"manual",
	content:"Please enter a valid email address"
});


function submitForm(form) 
	   {
	   if (
			!validateUser(form["username"].value)|
			!validatePassword(form["password"].value)|
			!validateEmail(form["email"].value))
			{
	   
			   if (!validateUser(form["username"].value))
				{	
					$("#userinput").addClass('has-error');
					 $("#username").popover('show');
				} 
			   if (!validatePassword(form["password"].value))
				{
					$("#passwordinput").addClass('has-error');
					$("#password").popover('show');
				}
				if (!validateEmail(form["email"].value))
				{
					$("#emailinput").addClass('has-error');
					$("#email").popover('show');	
				} 
				
			}
				
				else 	{

				form.submit();	
					}
		}

$(document).ready(function(){
   
  $("#username").change(function()
  {
	if(!validateUser($(this).val())){
	$("#userinput").removeClass('has-success').addClass('has-error');
	$("#username").popover('show');
	} else {
			$("#userinput").removeClass('has-error').addClass('has-success');
			$("#username").popover('hide');
			}
  });
  
  $("#password").change(function()
  {
	if(!validatePassword($(this).val())){
	$("#passwordinput").removeClass('has-success').addClass('has-error');
	$("#password").popover('show');
	} else {
			$("#passwordinput").removeClass('has-error').addClass('has-success');
			$("#password").popover('hide');
			}
  });
  
  $("#email").change(function()
  {
	if(!validateEmail($(this).val())){
	$("#emailinput").removeClass('has-success').addClass('has-error');
	$("#email").popover('show');
	} else {
			$("#emailinput").removeClass('has-error').addClass('has-success');
			$("#email").popover('hide');
			}
  });
  
});


</script>


</html> 