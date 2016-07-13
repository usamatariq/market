<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/danceseen/COMMON/Globe.php";
	$globe = new Globe();

require_once $globe->g_root() . '/JOB/Model/Job.php';
	
$job = new Job();

$jobID	= $_POST['q'];
//$jobID ='43';

$field = $job->getJobFromID($jobID);
$jobfield = $field[0];

$jobtype_name = $job->getJobtypeFromTypeid($jobfield['job_type_id']);


$jobdate = date_create($jobfield['job_enddate']);
$jobdateOut = date_format($jobdate, 'jS F Y');
//$jobtype_name = $job->getJobtypeFromTypeid($jobID);

if ($jobfield['job_status'] =='1')
	$status ='Open';
	else 
		$status = 'Close';

echo'
<div class="panel panel-body">


</div>
<div class="panel panel-body" style="">
			<div class="">
				<h4 class="modal-title title" id="myModalLabel">' . $jobfield['job_title'] . '
				</h4>
				'. $jobtype_name .'
			</div>
			<div class="well well-sm">
					<ul class="job-modal-field">
						<li>	Budget<br><b>'. $jobfield['job_pay'] .' </b></li>
						<li>	Venue<br><b>'. $jobfield['job_venue'] .' </b></li>
						<li>	Poster<br><b>' . $jobfield['job_poster_id'] . ' </b></li>
					</ul>
					<ul class="job-modal-field job-modal-field-right">
						<li>	<span class="label label-warning"> ' . $jobdateOut . '</span><br><b>
						'. $jobfield['job_status'].'
						</b>
						'.$status.'
						
						</li>
					</ul>
			</div>
			<div class="modal-body" >
				<div class="">
					<p>
					' . $jobfield['job_description'] . '
					</p>
				</div>
			</div>
			<div id="jobby" class="" style="padding:10px 0px 0px 0px;margin-left:-15px;margin-right:-15px;border-top:1px solid #e5e5e5;">
			</div>
			<div>
				<button id="apply" type="submit" class="btn btn-danger" value="">Apply Job</button>
			</div>
			
			';
			//require("job_apply.php");
			?>
</div>
