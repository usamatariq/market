<?php
	session_start();
	// ini_set('display_errors','1'); 
	// error_reporting(E_ALL);
	// var_dump($_SESSION);
	
	if(!isset($_SESSION['username'])) {
		header("Location: index.php");
	}
?>

<html>
<head>
	<title>Danceseen - Jobs</title>
	<?php
		require_once("View/head.php");
	?>
</head>

<body>
	<?php
		require_once("View/userHeader.php");
		include("Model/Job.php");
		$job = new Job();
	?>
    
	<!-- Home Tab -->
	<div class="home-tab" style="margin-top:20px;">
    <div class="container">
       
    <div id="content">
	<div class="panel panel-primary">
        <div class="panel-heading">
           <h1 class="panel-title">Jobs</h1>
        </div>
        <div class="panel-body">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
			<li><a href="jobs.php">Account</a></li>
			<li  class="active"><a href="listing.php" >Listing</a></li>
			<li><a href="post.php" >Post</a></li>
		</ul>
	
		<div id="my-tab-content" class="tab-content">
			<div class="tab-pane active">
				<h2>Listing</h2>
				
				<div class="navbar-form form-group">
				<form>
				<input type	="text" placeholder="Search" class="form-control">
				<button type="submit" class="btn btn-success">Search</button>
				</form>
				</div>

				<div class="joblist">
					<table class="table">
					<thead>
					  <tr>
						<th>#</th>
						<th>Job Title</th>
						<th>Posted By</th>
						<th>Date</th>
						<th>Time</th>
						<th>Description</th>
						<th> </th>
					  </tr>
					</thead>
					<tbody>
						<?php  
							$result = $job->getAllJobs();
							
							$columnCount = 1;

							/* fetch associative array */
							while ($field = $result->fetch_assoc()) {
								echo "<tr>";
								echo "<td>". $columnCount . "</td>";
								echo "<td>". $field['title'] . "</td>";
								echo "<td>". $field['user'] . "</td>";
								echo "<td>". $field['date'] . "</td>";
								echo "<td>". $field['time'] . "</td>";
								echo "<td>". $field['description'] . "</td>";
								echo '<td><button type="button" class="btn btn-sm btn-info">Info</button></td>
										</tr>';
								$columnCount++;
							}

							/* free result set */
							$result->free();
						?>
					</tbody>
				  </table>
							
			</div>
			
        </div>
		<div>
		
		</div>
		</div>
    </div>
    </div>

      <hr>

      
    </div> <!-- /container -->
	</div>
	
	<?php require_once("View/footer.php"); ?>
</body>

</html>