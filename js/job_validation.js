
$("#jobTitle2").popover({
	placement: "right",
	trigger:"manual",
	content:"Please enter at least 10 character"
});

$("#jobTitle").popover({
	placement: "right",
	trigger:"manual",
	content:"Please enter at least 10 character"
});

//$("#jobCloseInput").popover({
//	placement: "right",
//	trigger:"manual",
//	content:"Please Enter a Closing Date"
//});

$("#jobDescriptionInput").popover({
	placement: "right",
	trigger:"manual",
	content:"Please enter at least 10 characters"
});

 $("#jobTermsInput").popover({
	placement: "right",
	trigger:"manual",
	content:"You have to agree to our Terms & Conditions"
 });

function submitForm(form) 
	{
	   
		if(!validateTitle($("#jobTitle").val())){
		$("#jobTitleinput").removeClass('has-success').addClass('has-error');
		$("#jobTitle").popover('show');
		} else {
				$("#jobTitleinput").removeClass('has-error').addClass('has-success');
				$("#jobTitle").popover('hide');
				}

		if(!validateDescription($("#jobDescriptionInput").val())){
		$("#jobDescription").removeClass('has-success').addClass('has-error');
		$("#jobDescriptionInput").popover('show');
		} else {
				$("#jobDescription").removeClass('has-error').addClass('has-success');
				$("#jobDescriptionInput").popover('hide');
				}

		//if(!validateDate($("#jobCloseInput").val())){
		//$("#jobClose").removeClass('has-success').addClass('has-error');
		//$("#jobCloseInput").popover('show');
		//} else {
		//		$("#jobClose").removeClass('has-error').addClass('has-success');
		//		$("#jobCloseInput").popover('hide');
		//		}

		if(!(document.getElementById("jobTermsInput").checked))
		{
		$("#jobTerms").removeClass('has-success').addClass('has-error');
		$("#jobTermsInput").popover('show');
			
		}else {
				$("#jobTerms").removeClass('has-error').addClass('has-success');
				$("#jobTermsInput").popover('hide');
				}
				
		if 	(	
			validateTitle(form["jobTitle"].value)&
			//validateNonEmpty(form["jobCloseInput"].value)&
			validateDescription(form["jobDescriptionInput"].value)&			
			(document.getElementById('jobTermsInput').checked))
			
			{
			form.submit();
			}
					
	}

$(document).ready(function()
{  
  
	$("#jobTitle").change(function()
	{
		if(!validateTitle($(this).val())){
		$("#jobTitleinput").removeClass('has-success').addClass('has-error');
		$("#jobTitle").popover('show');
		} else {
				$("#jobTitleinput").removeClass('has-error').addClass('has-success');
				$("#jobTitle").popover('hide');
				}
	});
	
	$("#jobDescriptionInput").change(function()
	{
		if(!validateDescription($(this).val())){
		$("#jobDescription").removeClass('has-success').addClass('has-error');
		$("#jobDescriptionInput").popover('show');
		} else {
				$("#jobDescription").removeClass('has-error').addClass('has-success');
				$("#jobDescriptionInput").popover('hide');
				}
	});
	
	//$("#jobCloseInput").change(function()
	//{
	//	if(!validateDate($(this).val())){
	//	$("#jobClose").removeClass('has-success').addClass('has-error');
	//	$("#jobCloseInput").popover('show');
	//	} else {
	//			$("#jobClose").removeClass('has-error').addClass('has-success');
	//			$("#jobCloseInput").popover('hide');
	//			}
	//});
	
	$("#jobTermsInput").change(function()
	{	

	if(!(document.getElementById('jobTermsInput').checked))
	{
		$("#jobTerms").removeClass('has-success').addClass('has-error');
		$("#jobTermsInput").popover('show');
			
		}else {
				$("#jobTerms").removeClass('has-error').addClass('has-success');
				$("#jobTermsInput").popover('hide');
				}
	});
});
