<?php 

require_once $globe->g_root() . '/JOB/Model/Job.php';
	require_once $globe->g_root() . '/JOB/Model/Paginator.php';
	
	$job = new Job();
$jobID	= ( isset( $_GET['jobID'] ) )? $_GET['jobID']:'';


$field = $job->getJobFromID($jobID);
$jobfield = $field[0];
//$jobtype_name = $job->getJobtypeFromTypeid($jobID);

if ($jobfield['job_status'] =='1')
	$status ='Open';
	else 
		$status = 'Close';

echo'
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">' . $jobfield['job_title'] . '
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
			<div id="jobby" class="" style="padding:10px 0px 0px 0px;border-top:1px solid #e5e5e5;">
			</div>
			';
			//require("job_apply.php");
			?>
			


