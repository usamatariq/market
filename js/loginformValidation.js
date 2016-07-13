
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

$("#loginEmail").popover({
	placement: "bottom",
	trigger:"manual",
	content:"Login Fail"
});



function submitForm(form) 
	{
	   if (
			!validatePassword(form["password"].value)|
			!validateEmail(form["email"].value))
			{
	   

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
  

	$("#login").click(function(){ 
	
	
	var email = $("#loginEmail").val();
	var password = $("#loginPassword").val();
	//alert("click");
	$.post('Controller/loginValidate.php', {
	email1:email, password1:password
	}, function(data){
	
	if(data){
		$("#loginForm").submit();
	} else {
		$("#loginEmailinput").addClass('has-error');
		$("#loginPasswordinput").addClass('has-error');
		$("#loginEmail").popover('show');
		}
			
	});
  
	}); 
  
//this code works for checking existence of email address
/* $("#loginEmail").change(function () { 

   var loginEmail = $(this).val();
   
   $.post('Controller/usernameValidate.php', {
   'loginEmail':loginEmail
   }, function(data) {
   //$("#emailResult").html(data); 
   if (data) {
	$("#loginEmail").popover('hide');   
	} else { $("#loginEmail").popover('show');
	}
   });
});*/

  
}); //end of $(document).ready(function(){
  
