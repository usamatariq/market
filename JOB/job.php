<?php
	session_start();
	require_once $_SERVER["DOCUMENT_ROOT"] . "/market/COMMON/Globe.php";
	$globe = new Globe();
	
	if(!isset($_SESSION['userID'])) {
		$index = $globe->g_root() . "/index.php";
		header("Location: index.php");
	}
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
	
<div class="container container-main border-black">	
		
		
		<div class="col-md-12 border-black padding-none">
			<div class="nav-sub border-none">
				<ul id="tabs" class="nav-sub-job border-none" data-tabs="tabs">
					<li class="active">	<a href="job.php">Browse</a></li>
					<li class="">		<a href="appliedjob.php">Applied</a></li>
					<li class="">		<a href="postedjob.php">Posted</a></li>
				</ul>
			</div>
		</div>
		
		<div class="col-md-12">
				<div id="my-tab-content" class="tab-content" style="border:0px;padding-left:0px;padding-right:0px;">				
					<div class="tab-pane active " id="browse" >
						<div class="">
							<div class="col-md-4" style="padding:0px;">	

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
								<div class=" job-panel" >				
									<?php 				
										require_once("View/job_jobsearch.php");	
									?>			
								</div>
							</div>
							<div class="col-md-8" style="padding-right:0px;">	
								<div id="txtHint">
								</div>
									
								<div class=" job-panel">				
									<?php 
										require("View/job_jobslist.php");
									?>
								</div>					
							</div>
							
						</div>
					</div>
					
									
				</div>
				
		</div>			
</div>
<?php require_once($globe->g_footer()); 
?>
<?php 
require("View/job_prompt.php");
?>

</body>
</html>

<script>

$(document).ready(function(){
	
	$(".jobtab").click(function(){ 
		var jobview = $(this).attr("id");
		
		window.open("View/job.php?jobID="+ jobview,"", "width=550, height=600");
	});
	
	
//For Job Unapply	
	$(".btn-unapply").click(function(){ 
		var jobID = $(this).val();
		
		alert(jobID);
		
		$.post('Controller/job_unapply.php', {
		id:jobID
		}, function(data,status){
		alert(data);
		});
	});
	
//For Job Removal	
	$(".btn-remove").click(function(){ 
	alert("haha");
		var jobID = $(this).val();

		$.post('Controller/job_remove.php', {
		id:jobID
		}, function(data,status){
alert(data);
		});
	});
	
});

</script>


