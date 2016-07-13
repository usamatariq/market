<?php
	session_start();
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/Globe.php";
	$globe = new Globe();
	
	if(!isset($_SESSION['username'])) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Danceseen - Jobs</title>
	<?php
		require_once($globe->g_head());
	?>
</head>

<body>
	<?php
		require_once($globe->g_userHeader());
		
		require $globe->g_root() . '/Model/Event.php';
		$event = new Event();

		$event_id = htmlspecialchars($_POST['event_id']);
		
		$result = $event->getEventDetails($event_id);
		$numEvents = count($result);

		if($numEvents != 1) {
			header("Location: eventNotFound.php");
		}

		$eventInfo = $result[0];
	?>
	
	<div class="container home-tab" style="margin-top:20px;">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default panel-body" style="text-align:justify;">
				<div class="banner" style="margin-top:0px;padding-top:0px"></div>
			</div>
		</div>
		
		<div class="col-md-6 col-md-offset-1">
		
		<div class="panel panel-default panel-body">
			<?php echo '<h1>' . $eventInfo['event_name'] . '</h1>' ?>	
		</div>
		
		<div class="panel panel-default panel-body">
		<table class="content-job">
			<tbody >
						
			<tr>
			<?php echo '<td>' . $eventInfo['event_date'] . '</td>' ?>	
			</tr>
						
			<tr>
			<td>7:00pm - 10:00pm</td>
			</tr>
			
			<tr>
			<td>Scape WareHouse</td>
			</tr>			 	
			</tbody>
			
		</table>	
		</div>
		
		<div class="panel panel-default panel-body">
		<table class="content-job">
			<tbody>
			<tr>
				<?php echo '<td>' . $eventInfo['event_description'] . '</td>' ?>
			</tr>
						
			</tbody>
			
		</table>
		</div>
		<div class=" panel-heading">
		Event Posts
		</div>
		<div class="panel panel-default panel-body">
		<table class="table">
		<thead>
			<tr><td>hahahahhah</td>
			</tr>
		</thead>
		<tbody>
			<tr>
			</tr>
		</tbody>
		</table>
		</div>
		
		</div>
		<div class="col-md-4" >
		<div class="panel panel-default panel-body">
			<div class="nav-panel">
								
				<a href="jobs.php"><div class="nav-tab">Join 1v1 Category</div></a>
				<a href="events.php"><div class="nav-tab">Join 3v3 Category</div></a>
				<a href="profile.php"><div class="nav-tab">Message Organizer</div></a>
				<a href="profile.php"><div class="nav-tab">Sponsors</div></a>
								
							
			</div>

			<form action="/danceseen/Controller/uploadEventImage.php" method="post">
				<div class="form-group">
					Image <input name="uploadedfile" type="file" />
				</div>
				<button type="submit" class="btn btn-success">Upload</button>
			</form>
		</div>
		
		<div class="panel panel-default panel-body">					
			Sponsors
		</div>
		</div>
		
	</div>
	<?php require_once($globe->g_footer()); ?>
</body>

</html>