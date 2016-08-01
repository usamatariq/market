<!DOCTYPE html>

<?php
	session_start();
	require_once $_SERVER["DOCUMENT_ROOT"] . "/market/COMMON/Globe.php";
	$globe = new Globe();
	
	if(isset($_SESSION['userID'])) {
		$home = $globe->g_root() . "/market/home.php";
		header("Location: $home");
	}
	require_once($globe->g_head());
?>

<script type='text/javascript' src='/market/js/fblogin.js'></script>
<script type='text/javascript' src='/market/js/facebook.js'></script>

<html>
<head>
	<title>Market</title>
	
<!--<script type='text/javascript' src='/market/js/formValidation.js'></script>-->

<?php
	
		// checks for URL parameters (messages to users)
		if(isset($_GET["response"])){
			$response = trim($_GET["response"]);
			$haha = trim($_GET["response"]);
			if(($response == 'loginfail')&&($haha=='1')) {
				echo "<br /><div>Login Failedhaha</div> ";
			}
			if($response == 'loginfail') {
				echo "<br /><div>Login Failed2</div> ";
			}
			if($response == 'passwordmismatch') {
				echo "Signup Failed: Password Mismatch <br/>";
			}
			if($response == 'servererror') {
				echo "Signup Failed: Server Error <br/>";
			}
		}
		 
	?>
	
</head>


<body>
	<?php require_once($globe->g_guestHeader()); ?>
	
	<div class="jumbotron">
      <div class="container">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
      </div>
    </div>
	
	<div class="container">

      <div class="row">
        
		<div class="col-lg-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
        </div>
        
		<div class="col-lg-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
		</div>
		
        <div class="col-lg-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>		  
		</div>
		
		<div
		  class="fb-like"
		  data-share="true"
		  data-width="450"
		  data-show-faces="true">
		</div>
		
      </div>
      
    </div> 

	
	
	
	<?php require_once($globe->g_footer()); ?>

	<!--LOGIN MODAL-->
	<div id="loginModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		<div class="modal-dialog modal-sm">
			<div class="modal-content col-md-10">
			  <div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><b>Login</b></h4>
				</div>
				<div class="modal-body">								
			
					<?php require_once $globe->g_root() . '/ACCOUNT/View/account_login_form.php'; ?> 
				
					<button type="button" class="btn btn-primary btn-center" onclick="fblogin();">Login with Facebook</button>			
				
					
				</div>
			</div>
		</div>
	</div>
	
	<!--REGISTER MODAL-->
	<div id="registerModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		<div class="modal-dialog modal-sm">
			<div class="modal-content col-md-10">
			  <div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><b>Register</b></h4>
				</div>
				<div class="modal-body">			
					<?php require_once $globe->g_root() . '/ACCOUNT/View/account_register_form.php'; ?>	
				
					<button type="button" class="btn btn-primary btn-center" onclick="fbregister();">Register with Facebook</button>
					
				</div>
			</div>
		</div>
	</div>

</body>
<script type='text/javascript' src='/market/js/loginformValidation.js'></script>

</html> 