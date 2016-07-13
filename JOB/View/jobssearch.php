<?php 
	session_start();
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/Globe.php";
	$globe = new Globe();
	
	require_once $globe->g_root() . '/Model/Job.php';
	require_once $globe->g_root() . '/Model/Paginator.php';
	
	$job = new Job();
	$paginator = new Paginator();
	
	$limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 4;
    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;	

	$search = (isset($_POST['search']))?$_POST['search']:'';
	$type = (isset($_POST['jobtype']))?$_POST['jobtype']:0;
	$sort = (isset($_POST['jobsort']))?$_POST['jobsort']:'job_date';
	
	//echo $search;
	
	$result = $job->getJobs($search, $type, $sort, $page, $limit);
	$result = array_reverse($result);
	
	$numJobs = count($result);
	$numAllJobs = count($job->getJobs($search, $type, $sort));
	
	$numJobs = count($result);

	//sorting $result
	//$jobsort = array();
	
	//foreach ($result as $key => $row)
	//{
	
	//switch ($sort) {
   // case "0":
	//	$jobsort[$key] = $row['date'];
    //    break;
		
   // case "1":
   //     $jobsort[$key] = $row['job_enddate'];
    //    break;
   // default:
    //    $jobsort[$key] = $row['date'];
   //     break;;
	//				}
	//
	//}
	
	//array_multisort($jobsort, SORT_ASC, $result);
	
	$nav = $paginator->createLinks($page, $limit, $numAllJobs, $links, 'pagination pagination-sm');
	
	echo $nav;
	
	if($numJobs == 0) {
		echo 'There is no posted jobs.';
	}
	
	else {
	
		for($i=0 ; $i<$numJobs ; $i++) {
			$field = $result[$i];
			
			$jobtype_name = $job->getJobtypeFromTypeid($field['job_type_id']);
			
			echo '
			
				<div class="jobtabs">
									
					<a class="" href="#jobView'. $field['job_id'] .'" data-toggle="modal">				
						<div class="panel-body">
							<table>
								<thead>
									<h3 class="margin-none">'. $field['job_title'] . '</h3>
								</thead>
								<tbody>
									<tr>
										<td  colspan="2">
											<span href="#" class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> '. $jobtype_name .'<br>
											<span href="#" class="glyphicon glyphicon-flag" aria-hidden="true"></span> ' . $field['job_enddate'] . '<br> 
											<span href="#" class="glyphicon glyphicon-time" ></span> ' . $field['date'] . '<br>
											' . $field['job_poster_id'] . '<br>
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>	
					</a>
				</div>
			
				';
			
		require("jobView.php");	
		}

	
	}
	
	?>
