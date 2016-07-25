<!DOCTYPE html>

<?php
	session_start();	
	require_once $_SERVER["DOCUMENT_ROOT"] . "/market/COMMON/Globe.php";
	$globe = new Globe();

	require_once($globe->g_head());	
?>
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      alert(response.status);
	  alert(response.authResponse.accessToken);
	  alert(response.authResponse.userID);
	  testAPI();
	  getFBData();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Logged in Facebook but not Market. Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Not Logged onto Facebook. Please log ' +
        'into Facebook.';
    }
  }

  //STATUS
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }
  
  function getFBData () {
        FB.api('/me', function(data){
            alert(data.first_name + data.last_name + data.id);
        })
    };
  
  //LOGIN
  function fblogin() {
  FB.login(function(){},{scope: 'public_profile, email'} //there must be scope for permission
	  
	);
  };

  //LOGOUT
  function fblogout() {
  FB.logout(function(){}, {scope: 'publish_actions'});
}

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1741439976133091',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.5' // use graph api version 2.5
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  //STATUS
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);	
  });
  
  //LOGIN
  FB.login(function(response) {
   // handle the response
 }, {scope: 'public_profile, email'});//if scope is left blank still can work
  
  
  
  //LOGOUT
  FB.logout(function(response) {
  // user is now logged out
	});
  
  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  
  

  function testAPI() {
    alert('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
		console.log(response);
      alert('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
  function getFBData () {
        FB.api('/me?fields=id,name,email,permissions', function(data){
            console.log(data);
			
			$url = 'phpFile.php';
			//jquery			
			//$.get($url, {name: data.name});
			
			//jquery post
			$.post($url,
				{
					name: data.name,
					email: data.email
				},
			function(data, status){
				alert("Data: " + data + "\nStatus: " + status);
			});
			
			//directing
			//window.location.href = 'phpFile.php?name=' + data.name;
        })
    };
  
</script>
<html>
<head>
	<title>Market</title>
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
      <!-- Example row of columns -->
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
		  <div
		  class="fb-like"
		  data-share="true"
		  data-width="450"
		  data-show-faces="true">
		</div>
		</div>
      </div>

      <hr>
      
    </div> 


<div id="register" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content col-md-10">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel"><b>Register</b></h4>
		</div>
		<div class="modal-body">			
			<?php require_once $globe->g_root() . '/ACCOUNT/View/account_register_form.php'; ?>	
		</div>
		<div>
			<button type="button" class="btn btn-primary btn-center">Register with Facebook</button>
			
		</div>
		<div>
			<button type="button" class="btn btn-primary btn-center" onclick="checkLoginState();">Login Status</button>
			
		</div>
		<div>
			<button type="button" class="btn btn-primary btn-center" onclick="fblogin();">Login with Facebook</button>
			
		</div>
		<div>
			<button scope="public_profile,email" type="button" class="btn btn-primary btn-center" onclick="getFBData();">Get Data</button>
			
		</div>
		<div>
			<button type="button" class="btn btn-primary btn-center" onclick="fblogout();">Logout</button>
			
		</div>
		<div id="status">
		</div>
		
	</div>
  </div>
</div>
</div>
</div>

	<?php require_once($globe->g_footer()); ?>


</body>
<script type='text/javascript' src='/market/js/loginformValidation.js'></script>
<script type='text/javascript' src='/market/js/facebook.js'></script>
</html> 