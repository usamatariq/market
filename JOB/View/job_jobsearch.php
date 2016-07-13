<?php
require_once $globe->g_root() . '/JOB/Model/Job.php';
$job = new Job();

$jobtype=$job->getAllJobtype();
$numJobtype=count($jobtype);

$limit      = (isset( $_GET['limit'] ))	? 	$_GET['limit'] 	:5;
$search 	= (isset($_GET['search']))	?	$_GET['search']	:'';
$type 		= (isset($_GET['jobtype']))	?	$_GET['jobtype']:0;
$sort 		= (isset($_GET['jobsort']))	?	$_GET['jobsort']:'job_date';	
	
echo'

<form >
		<div class="" >
				<div class="form-group">
					<input id="jobsearch" type	="text" placeholder="Search Jobs" class="form-control  form-control-search shadow-none" name ="search" value="'.$search.'" style="width:100%;">
						
				</div>
				<div class="form-group ">
				<select id = "jobtype" type="text" class="form-control" name="jobtype" style="width:100%;">
';
				for ($i=0;$i<$numJobtype;$i++)
				{ 
				$result= $jobtype[$i];
				$html='<option value="'.$result['jobtype_id'].'"';
				if($type==$result['jobtype_id'])
				{
				$html.='selected';
				}
				$html.='>'.$result['jobtype_name'].'</option>';
				echo $html;
				}
echo'
				</select>
				</div>
		</div>
		
		<div class="">
				<div class="form-group"> 
					<select id = "jobsort" type="text" class="form-control" name="jobsort" style="width:100%;">
';
					//$sort_select[0] = array("value"=>"job_date", "text"=>"Sort By");
					$sort_select[0] = array("value"=>"job_date", "text"=>"Posted Date");
					$sort_select[1] = array("value"=>"job_enddate", "text"=>"Closing Date");
					
					for ($j=0;$j<2;$j++)
					{
					$dateresult=$sort_select[$j];
					$html='<option value="'.$dateresult['value'].'"';
					
					if($sort==$dateresult['value'])
					{
					$html.='selected';
					}
					
					$html.='>'.$dateresult['text'].'</option>';
					echo $html;					 
					 }
					
				
echo'
					</select>
				</div>
				
				<div class="form-group" style="float:left;">
					<select id = "" type="text" class="form-control" name="limit" style="">
					
					';
					$limit_select[0] = array("value"=>"5", "text"=>"5");
					$limit_select[1] = array("value"=>"10", "text"=>"10");
					$limit_select[2] = array("value"=>"20", "text"=>"20");
					
					for ($j=0;$j<3;$j++)
					{
					$limit_result=$limit_select[$j];
					$html='<option value="'.$limit_result['value'].'"';
					
					if($limit==$limit_result['value'])
					{
					$html.='selected';
					}
				
					$html.='>'.$limit_result['text'].'</option>';
					echo $html;					 
					 }
					
					echo'
					</select>
				</div>
				<div class="form-group" style="float:right;">
						<button id="search" class="btn btn-danger" type="submit">Search</button>
				</div>	
		</div>
</form>
	
';
?>