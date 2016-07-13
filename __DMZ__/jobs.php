<?php
	session_start();
	require_once $_SERVER["DOCUMENT_ROOT"] . "/danceseen/Globe.php";
	$globe = new Globe();
	
	if(!isset($_SESSION['userID'])) {
		$index = $globe->g_root() . "/index.php";
		header("Location: index.php");
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Danceseen - Jobs</title>
	<?php
		require_once($globe->g_head());
	?>	
	<script type="text/javascript" src="js/datepicker.js"></script>
	<!--<script type="text/javascript" src="js/timepicker.js"></script>-->
	<script type='text/javascript' src="js/formValidation.js"></script>
	
	<?php
		require_once($globe->g_head());	 
	?>
</head>

<body>
	<?php
		require_once($globe->g_userHeader());
	?>
	
<div class="container container-main">
	
	<div class="col-md-10 col-md-offset-1" >	
		<div class="col-md-4" style="">	
	
	<?php	
	if(isset($_GET["jobpost"]))
	{
		$jobpost  = trim($_GET["jobpost"]);
		if($jobpost == 'success')
		{
	echo '	<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>YEAH!</strong> Job Posted Successfully!
			</div>
		';
		}
	}
	?>		
			<div class=" job-panel">				
				<?php 				
					require_once("View/jobSearch.php");	
				?>
			</div>
		
		</div>
		<div class="col-md-8" style="">	
	
				<?php 
					require_once("View/jobslist.php");
				?>

		</div>
	</div>		
</div>



<script type='text/javascript' src="js/jobpostValidation.js"></script>
<script>
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

</script>

<?php require_once($globe->g_footer()); ?>
</body>
</html>


