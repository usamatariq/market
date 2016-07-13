var formSubmitting = false;
var setFormSubmitting = function() { formSubmitting = true; };
var setFormSubmitting2 = function() { formSubmitting = false; };

window.onload = function() {
    window.addEventListener("beforeunload", function (e) {
        var confirmationMessage = 'It looks like you have been editing something. ';
        confirmationMessage += 'If you leave before saving, your changes will be lost.';

        if (formSubmitting) {
            (e || window.event).returnValue = confirmationMessage;
        return confirmationMessage;
        }
    });
};

$(document).ready(function(){

	$("#jobview").change(function(){ 
		var jobview = $("#jobview").val();

		$.post('View/jobslistview.php', {
		q:jobview
		}, function(data,status){
		$("#txtHint").html(data);
		});
	}); 
}); 



