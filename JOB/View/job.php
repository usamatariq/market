<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/danceseen/COMMON/Globe.php";
$globe = new Globe();

require_once $globe->g_root() . '/JOB/Model/Job.php';
$job = new Job();
?>

<html>
<head>
	<title>Danceseen - Jobs</title>
	<?php
		require_once($globe->g_head());
	?>
</head>


<?php
$jobID	= ( isset( $_GET['jobID'] ) ) ? $_GET['jobID'] : 43;

$field = $job->getJobFromID($jobID);
$jobfield = $field[0]	;

$jobtype_name = $job->getJobtypeFromTypeid($jobfield['job_type_id']);
$jobbudget_name = $job->getJobBudgetFromBudgetid($jobfield['job_pay']);

$jobdate = date_create($jobfield['job_enddate']);
$jobdateOut = date_format($jobdate, 'jS F Y');
//$jobtype_name = $job->getJobtypeFromTypeid($jobID);

if ($jobfield['job_status'] =='1')
	$status ='Open';
	else 
		$status = 'Close';
?>
<div class="container" style="">
<div class="row">
<div class="col-xs-12" >
<?php echo'	
<div class="panel panel-body" style="background-color: #B80000;color:#fff;">
	<div class="" >
		<h4 class="modal-title title" id="myModalLabel">
			' . $jobfield['job_title'] . '
		</h4>
			'. $jobtype_name .'
	</div>
</div>
';
?>

</div>

</div>
<div class="row">
<div class="col-xs-8" >

<?php 
echo'
	<div class="col-xs-4" style="padding:0px;">
	<div class="panel panel-body job-modal-panel">
		Budget<br>
		<b>'. $jobbudget_name .'</b>
	</div>
	</div>
	<div class="col-xs-4" style="padding:0px;">
	<div class="panel panel-body job-modal-panel">
		Area<br>
		<b>'. $jobfield['job_venue'] .' </b>
	</div>
	</div>
	<div class="col-xs-4" style="padding:0px;">
	<div class="panel panel-body job-modal-panel">
		Poster<br>
		<b>' . $jobfield['job_poster_id'] . ' </b>
	</div>
	</div>
	';
?>
</div>

<div class="col-xs-4" >
<?php echo'
	<div class="panel panel-body job-modal-panel">
					
			<h4>'.$status.'</h4>
	</div>	
';	 

?>
	
</div>
</div>

<div class="row">
	<div class="col-xs-12" >
		<div class="panel panel-body" style="">

	<?php echo'	
				<div class="modal-body" >
					<p>
						' . $jobfield['job_description'] . '
					</p>
				</div>
				<div id="jobby" class="" style="padding:10px 0px 0px 0px;margin-left:-15px;margin-right:-15px;border-top:1px solid #e5e5e5;">
				</div>
				<button id="apply" type="submit" class="btn btn-danger" value="'.$jobID.'">Apply Job</button>
				
				<div style="font-size:12px;float:right;">
					' . $jobfield['job_date'] . ' posted by
					' . $jobfield['job_poster_id'] . '<br>
				</div>
								
				
		';
	?>
				
		</div>
	</div>
</div>


<div id="pop-modal"  class="pop-modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="">
	<div id="pop-content" class="modal-dialog modal-lg" >		
		<div class="modal-content">		
		</div>
	</div>
</div>


<script>
$(document).ready(function(){
	
	$("#apply").click(function(){ 
		var jobID = $(this).val();
		var content;
		
		$.post('../Controller/job_apply.php', {
		id:jobID
		}, function(data,status){
		
		if (data=='0') {
		content = "<div class='alert alert-danger'>Ops! It seems like this job post is upload by you.</div> ";
		}
		
		if (data=='1') {
		content = "<div class='alert alert-warning'>You have applied for this job.</div> ";
		}
		
		if (data=='2') {
		content = "<div class='alert alert-success'>You have successfully applied for this job.</div> ";
		}
		
		$('#pop-content').html(content);		
		$('#pop-modal').modal('show');
		
		});
	});
});
</script>