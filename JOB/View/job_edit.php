<?php 
session_start();

require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/COMMON/Globe.php";
$globe = new Globe();
require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/JOB/Model/Job.php";
$job = new Job();



$id = htmlspecialchars($_POST['id']);
$result = $job->getJobFromID($id); 
$field = $result[0];

$jobtype = $job->getAllJobtype();
$numjobtype = count($jobtype);
$jobtype_name = $job->getJobtypeFromTypeid($field['job_type_id']);

$jobbudget = $job->getAllJobBudget();
$numjobbudget = count($jobbudget);
$jobbudget_name = $job->getJobBudgetFromBudgetid($field['job_pay']);

$jobdate = date_create($field['job_enddate']);
$enddate = date_format($jobdate, 'd-m-Y');

?>

<form class="form-group" name="jobform" action="/danceseen/JOB/Controller/job_update.php" method="post">
			
	<div id="jobTitleInputEdit" class="form-group jobTitleinput">		
	<b>Title</b>	
		<?php echo'
		<input id="jobTitleEdit" type="text" class="form-control form-control-job jobTitle" name="job_title" placeholder="Job Title" value="' . $field['job_title'] . '">	
		'; 
		?>
	</div>

	<div id="jobTypeInputEdit" class="form-group">
	<b>Category</b>
		<select type="text" class="form-control form-control-job" name="job_type">			
			<?php
				for($j=0; $j<$numjobtype ; $j++)
					{
						$jobtypefield = $jobtype[$j];
							
							echo '<option value="'.$jobtypefield['jobtype_id'].'"';
							
							if($j==$field['job_type_id'])
							echo 'selected';	
							echo'	
							>'.$jobtypefield['jobtype_name'].'</option>';
					}
			?>				
		</select>
	</div>

	<div class="col-xs-6 padding-none">
		<?php
		echo'		
		<div  class="form-inline form-group">
			<b>Budget</b>		
			<div class="input-group">
				<div class="input-group-addon">SGD</div>
					<div  id="jobPay">
						<select id="jobPayInput type="text" class="form-control form-control-job" name="job_pay">					
						';
						
						for($i=0; $i<$numjobbudget ; $i++)
					{
						$jobbudgetfield = $jobbudget[$i];
							
							echo '<option value="'.$jobbudgetfield['jobtype_id'].'"';
							
							if($i==$field['job_pay'])
							echo 'selected';	
							echo'	
							>'.$jobbudgetfield['job_budget'].'</option>';
					}
						
						
						echo'
						</select>
					</div>							
			</div>
		</div>
		';
		?>
	</div>
			
	<div class="col-xs-6 padding-none" style="padding-left:15px;">
		<?php
		echo'
		<div id="jobCloseEdit" class="form-group">
			<b>Closing Date</b> 
			<div class="input-group">
				<fieldset disabled><input id="" type="text" class="form-control form-control-job" name="" value="' . $enddate . '"></fieldset>
				<input id="jobCloseInputEdit" type="text" class="hidden form-control form-control-job" name="job_enddate" value="' . $enddate . '">
			</div>
		</div>
		';
		?>
	</div>
		
	<div class="col-xs-6 padding-none" >
		<?php
		echo'		
		<div class="form-inline form-group">		
		<b>Area</b>
			<select type="text" class="form-control form-control-job" name="job_venue" >
			<option value="North">North</option>
			<option value="South">South</option>
			<option value="East">East</option>
			<option value="West">West</option>
			<option value="Central">Central</option>
			</select>
		</div>
		';
		?>
	</div>			
	
	<div class="col-xs-6 padding-none" style="padding-left:15px;">
		<div class="form-group">
			<b>Location</b> 	<fieldset disabled><input type	="text" value="Singapore" class="form-control form-control-job"></fieldset>
		</div>
	</div>
	
	<?php
		echo'			

				<div class="form-group" id="jobDescriptionEdit">
					<textarea class="form-control" id="jobDescriptionInputEdit" rows="5" name="job_description" style="width:100%" placeholder="Describe Your Job Post in Details" >' . $field['job_description'] . '</textarea>
				</div>

				<div>
					<input class="hidden" value="' . $field['job_id'] . '" name="jobID">
				</div>
				<button type="button" class="btn btn-danger" onclick="submitForm(this.form)">Update Job</button>
			
';			
?>
</form>

<?php echo'
<script type="text/javascript" src="/danceseen/js/job_edit_validation.js"></script>'
;?>
