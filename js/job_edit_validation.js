$("#jobTitleEdit").popover({
	placement: "right",
	trigger:"manual",
	content:"Please enter at least 10 character"
});

$("#jobCloseInputEdit").popover({
	placement: "right",
	trigger:"manual",
	content:"Please Enter a Closing Date"
});

$("#jobDescriptionInputEdit").popover({
	placement: "right",
	trigger:"manual",
	content:"Please enter at least 10 characters"
});

 $("#jobTermsInputEdit").popover({
	placement: "right",
	trigger:"manual",
	content:"You have to agree to our Terms & Conditions"
 });

function submitForm(form) 
	{
	   
		if(!validateTitle($("#jobTitleEdit").val())){
		$("#jobTitleInputEdit").removeClass('has-success').addClass('has-error');
		$("#jobTitleEdit").popover('show');
		} else {
				$("#jobTitleInputEdit").removeClass('has-error').addClass('has-success');
				$("#jobTitleEdit").popover('hide');
				}

		if(!validateDescription($("#jobDescriptionInputEdit").val())){
		$("#jobDescriptionEdit").removeClass('has-success').addClass('has-error');
		$("#jobDescriptionInputEdit").popover('show');
		} else {
				$("#jobDescriptionEdit").removeClass('has-error').addClass('has-success');
				$("#jobDescriptionInputEdit").popover('hide');
				}

		if(!validateDate($("#jobCloseInputEdit").val())){
		$("#jobCloseEdit").removeClass('has-success').addClass('has-error');
		$("#jobCloseInputEdit").popover('show');
		} else {
				$("#jobCloseEdit").removeClass('has-error').addClass('has-success');
				$("#jobCloseInputEdit").popover('hide');
				}

				
		if 	(	
			validateTitle(form["jobTitleEdit"].value)&
			validateDescription(form["jobDescriptionInputEdit"].value)&
			validateNonEmpty(form["jobCloseInputEdit"].value)
			)
			
			{
			form.submit();
			}
					
	}

$(document).ready(function()
{
	$("#jobTitleEdit").change(function()
	{
		if(!validateTitle($(this).val())){
		$("#jobTitleInputEdit").removeClass('has-success').addClass('has-error');
		$("#jobTitleEdit").popover('show');
		} else {
				$("#jobTitleInputEdit").removeClass('has-error').addClass('has-success');
				$("#jobTitleEdit").popover('hide');
				}
	});
	
	$("#jobDescriptionInputEdit").change(function()
	{
		if(!validateDescription($(this).val())){
		$("#jobDescriptionEdit").removeClass('has-success').addClass('has-error');
		$("#jobDescriptionInputEdit").popover('show');
		} else {
				$("#jobDescriptionEdit").removeClass('has-error').addClass('has-success');
				$("#jobDescriptionInputEdit").popover('hide');
				}
	});
	
	$("#jobCloseInputEdit").change(function()
	{
		if(!validateDate($(this).val())){
		$("#jobCloseEdit").removeClass('has-success').addClass('has-error');
		$("#jobCloseInputEdit").popover('show');
		} else {
				$("#jobCloseEdit").removeClass('has-error').addClass('has-success');
				$("#jobCloseInputEdit").popover('hide');
				}
	});
	
	
});
