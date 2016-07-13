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
			<div class="nav-sub">
				<ul id="tabs" class="nav-sub-job" data-tabs="tabs">
					<li class="">	<a href="job.php">Browse</a></li>
					<li class="">		<a href="appliedjob.php">Applied</a></li>
					<li class="active">		<a href="postedjob.php">Posted</a></li>
				</ul>
			</div>
		</div>
		
		<div class="col-md-12">
				<div id="my-tab-content" class="tab-content" style="border:0px;padding-left:0px;padding-right:0px;">							
					<div class="" id="posted" >

						<?php require_once("View/job_posted.php");?>

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
	// Posted Job | View Window
	$(".viewjob").click(function(){ 
		var jobview = $(this).attr("id");
		
		window.open("View/job.php?jobID="+ jobview,"", "width=650, height=600");
	});

	// Posted Job | Applicant Modal 
	$('.applicant-prompt').click(function() {

		
			var applicantjobID = $(this).attr('data-id');
			var applicantjobTitle = $(this).attr('data-name');
			
			$.post('View/job_applicant.php', {
			id:applicantjobID
			}, function(data,status){
			$('#applicant-modal-body').html(data);
			});
			
		$('#applicant-modal').modal('show');	
		$('#applicant-modal-name-field').html(applicantjobTitle);
	});		

	// Posted Job | Edit Modal
	$('.edit-prompt').click(function() {
			var editjobID = $(this).attr('data-id');
			var editjobTitle = $(this).attr('data-name');
			
			$.post('View/job_edit.php', {
			id:editjobID
			}, function(data,status){
			$('#edit-modal-body').html(data);
			});
			
		$('#edit-modal').modal('show');	
		$('#edit-modal-name-field').html(editjobTitle);
	});	

	// Posted Job | Delete Modal
	$(".delete-prompt").click(function(){ 
			$('#delete-modal').modal('show');
			var deleteJobID = $(this).attr('data-id');
			var deleteJobTitle = $(this).attr('data-name');
		$('#delete-modal-name-field').html(deleteJobTitle);
		$('#delete-modal-id-field').val(deleteJobID);
		});
		
	// Posted Job | Remove Modal (Unused)	
	$(".remove-prompt").click(function(){ 
			$('#remove-modal').modal('show');
			var removeJobID = $(this).attr('data-id');
			var removeJobTitle = $(this).attr('data-name');
		$('#remove-modal-name-field').html(removeJobTitle);
		$('#remove-modal-id-field').val(removeJobID);
		});
		
});

</script>


