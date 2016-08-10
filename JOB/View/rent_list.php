<?php 
	require_once $globe->g_root() . '/JOB/Model/Job.php';
	require_once $globe->g_root() . '/JOB/Model/Paginator.php';
	
	$job = new Job();
	$paginator = new Paginator();
	
	$limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 8;
    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 3;	
	
	$search 	= ( isset( $_GET['search'] ) )? $_GET['search']:'';
	$type 		= ( isset( $_GET['jobtype'] ) )? $_GET['jobtype']:0;
	$sort		= ( isset( $_GET['jobsort'] ) )? $_GET['jobsort']:'job_date';

	$result = $job->getJobs($search, $type, $sort, $page, $limit);
	
	$numJobs = count($result);
	$numAllJobs = count($job->getJobs($search, $type, $sort));
	
	$nav = $paginator->createLinks($search, $type, $sort, $page, $limit, $numAllJobs, $links, 'pagination pagination-sm');
	
	date_default_timezone_set('Asia/Singapore');//to shift to head.php
?>
			
<div id="my-tab-content" class="" >	

<?php	
	

	if($numJobs == 0 ) {
		echo "There are no items available";
	}

	else 
	{
	
		for($i=0; $i<=($numJobs-1) ; $i++) 
		{
			$field = $result[$i];
			
			$jobtype_name = $job->getJobtypeFromTypeid($field['job_type_id']);
			
			//Date Setting
			$jobdate = date_create($field['job_enddate']);
			$jobdateOut = date_format($jobdate, 'jS F Y');
			$date = date_create($field['job_date']);
			$dateOutput =  date_format($date, 'jS F Y');
			$interval = $date->diff(new DateTime('now'));

			$now = new DateTime('now');
			$diff = $now->getTimestamp() - $date->getTimestamp();
			
			//Time Stamp Code
			if ($diff < 60)
			{
			$int = "".$interval->format('%s')." seconds ago";
			
			} 	else if($diff <3600)
				{
				$int = "".$interval->format('%i')." minutes ago";
				}	else if($diff <86400)
					{
					$int = "".$interval->format('%h')." hours ago";
					}	else 	{
								$int = $dateOutput;
								}
			
			echo '
				
				<div class="item-tab col-sm-3 col-lg-3 col-md-3">
                    <a href="#"class="jobtab overlay" id="'. $field['job_id'].'">
					
					<div class="thumbnail " style="padding:0px;height:300px;" >
							<div>
								<img src='.$field['item_photo'].' alt="" >                           
							</div>
							<div class="caption">
                                <h4 class="pull-right">$	'.$field['job_pay'].'</h4>
                                <h4>'. substr ($field['job_title'],0, 10). '
                                </h4>
								'. $jobtype_name .'
                                <p></p>
                            </div>
			
							<div class="hidden">
								<button id="'. $field['job_id'] .'" type="button" class="jobtab" value="'. $field['job_id'] .'" >View Job</button>
							</div>
							
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
							<div class="job-tab-footer" style="color:#A4A4A4;font-size:12px;">
								<div style="float:left;">
									<p>posted by ' . $field['job_poster_id'] . ' Expiry date:  ' . $field['job_expirydate'] . ' </p>
								</div>
									'.$int.'
							</div>

                    </div>
					</a>
                </div>
		
				';			
			
		}
	
	}
?>
<!--SAMPLE Template
				<div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail" style="padding:0px;">
                        <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$24.99</h4>
                                <h4><a href="#">First Product</a>
                                </h4>
                                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                    </div>
                </div>			
				
            -->
	
	<div style="padding:0px;margin-left:20px;">
	<?php
	echo $nav;	
	?>			
	</div>
</div>

		
