<?php 
	require_once $globe->g_root() . '/Model/Job.php';
	$job = new Job();

	$result = $job->getAllJobs();
	$result = array_reverse($result);

	$numJobs = count($result);
	$pageJobs=ceil($numJobs/5);

?>
	
<nav>
			
	<ul id="tabs" class="pagination" data-tabs="tabs">
	<li><a href="#" aria-label="Previous" id="btnPrev"><span aria-hidden="true">&laquo;</span></a></li>

<?php
		
	for($j=1 ; $j<=$pageJobs ; $j++) 
	{		
		if ($j == 1)
		{	echo'
				<li class="active">	<a href="#'.$j.'" data-toggle="tab">'.$j.'	</a></li>
				';
		}	else	{
				echo'
					<li class="">	<a href="#'.$j.'" data-toggle="tab">'.$j.'	</a></li>
					';
					}
	}
?>		

		<li>
		<a id="btnNext" href="#" aria-label="Next">
		<span aria-hidden="true">&raquo;</span>
		</a></li>
	</ul>
		
</nav>