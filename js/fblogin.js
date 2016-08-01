window.fbAsyncInit = function() {
  
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
  
	});
  
};
  
  
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    //console.log('statusChangeCallback');
    //console.log(response);

	console.log(response.status);
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      
	  //console.log(response.authResponse.accessToken);
	  //console.log(response.authResponse.userID);
	  testAPI();

    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
	  
      document.getElementById('status').innerHTML = 'Logged in Facebook but not Market.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
	  
      document.getElementById('status').innerHTML = 'Not Logged onto Facebook.';
    }
  }

  //STATUS
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }
 
  //REGISTER BUTTON
  function fbregister() {
	//LOGIN
	FB.login(function(response) {
		
    if (response.authResponse) {
     console.log(response);
     registerFBData();
		} else {
			console.log(response);
     console.log('User cancelled login or did not fully authorize.');
			   }
	},{scope: 'public_profile, email'});
	
  };
  //LOGIN BUTTON
  function fblogin() {
	//LOGIN
	FB.login(function(response) {
		
    if (response.authResponse) {
     console.log(response);
     loginFBData();
		} else {
			console.log(response);
     console.log('User cancelled login or did not fully authorize.');
			   }
	},{scope: 'public_profile, email'});
	
  };

//LOGOUT
  function fblogout() {
	  console.log('User is logged out');
	  FB.logout(function(response){
		  console.log(response);		  
	  });
} 
//TEST
  function testAPI() {
    FB.api('/me', function(response) {
		console.log(response);
      
      document.getElementById('status').innerHTML =
        'Connected., ' + response.name + '!';
    });
  }
  
  function loginFBData() {
        //GET FACEBOOK DATA
		FB.api('/me?fields=id,first_name,last_name,email,permissions', function(data){
            console.log(data);
		
		//JQUERY FOR PASSING DATA TO PHP
			$url = 'http://localhost/market/account/Controller/account_FBlogin.php';
			$.post($url,
				{
					firstname: data.first_name,
					lastname: data.last_name,
					email: data.email
				},
			function(data, status){
				console.log("Data: " + data + "\nStatus: " + status);
			
			if (data='success') {
				console.log("SUCCESS");
				window.location.href = 'http://localhost/market/home.php'
			}
			
			});

			
        })
    };
   
  function registerFBData() {
        //GET FACEBOOK DATA
		FB.api('/me?fields=id,first_name,last_name,email,permissions', function(data){
            
			console.log(data);
		
		//JQUERY FOR PASSING DATA TO PHP
			$url = 'http://localhost/market/account/Controller/account_FBregister.php';
			$.post($url,
				{
					firstname: data.first_name,
					lastname: data.last_name,
					email: data.email
				},
			function(data, status){
				console.log("Data: " + data + "\nStatus: " + status);
				
				if (status='success') {
				console.log("SUCCESS");
				window.location.href = 'http://localhost/market/verify.php?response=success'
			}
				
			});
			
        })
    };
  