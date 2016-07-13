<?php
	session_start();
	require_once $_SERVER["DOCUMENT_ROOT"] . "/market/COMMON/Globe.php";
	$globe = new Globe();
	
	if(!isset($_SESSION['userID'])) {
		$index = $globe->g_root() . "/index.php";
		header("Location: index.php");
	}
	
	$today = date("Y-m-d");
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>market - Jobs</title>
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
		<div class="col-md-12">
			<div class="nav-sub" style="" >
				<ul id="tabs" class="nav-sub-job " data-tabs="tabs" >
					<li class="" >	<a href="job.php">Browse</a></li>
					<li class="active">		<a href="appliedjob.php">Applied</a></li>
					<li class="">		<a href="postedjob.php">Posted</a></li>
				</ul>
			</div>
		</div>
		
		<div class="col-md-12">
				<div id="my-tab-content" class="tab-content" style="border:0px;padding-left:0px;padding-right:0px;">				
					
					<div class="" id="applied" >
						<?php require("View/job_applied.php");	?>						
					</div>		
				</div>
				
		</div>		
	</div>		
</div>


<?php require_once($globe->g_footer()); ?>
</body>
</html>
<?php 
require("View/job_prompt.php");
require("View/job_post.php");
?>

<script>

$(document).ready(function(){
	
	// Applied Job | View Window
	$(".viewjob").click(function(){ 
		var jobview = $(this).attr("id");
		
		window.open("View/job.php?jobID="+ jobview,"", "width=650, height=600");
	});

	// Applied Job | Withdraw Modal
	$('.withdraw-modal-link').click(function() {

		$('#withdraw-modal').modal('show');
		
			var jobID = $(this).attr('data-id');
			var jobTitle = $(this).attr('data-name');
			
		$('#withdraw-modal-name-field').html(jobTitle);
		$('#withdraw-modal-id-field').val(jobID);
	});	

	// Applied Job | Delete Modal
	$('.delete-modal-link').click(function() {

		$('#deleteApplied-modal').modal('show');
		
			var jobID = $(this).attr('data-id');
			var jobTitle = $(this).attr('data-name');
			
		$('#deleteApplied-modal-name-field').html(jobTitle);
		$('#deleteApplied-modal-id-field').val(jobID);
		
	});
	
});
</script>


