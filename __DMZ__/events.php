<?php
	session_start();
	require_once $_SERVER["DOCUMENT_ROOT"] . "/danceseen/Globe.php";
	$globe = new Globe();
	
	if(!isset($_SESSION['userID'])) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Danceseen - Events</title>
	<?php
		require_once($globe->g_head());
	?>
</head>

<body>
	<?php
		require_once($globe->g_userHeader());
	?>
	
<div class="container home-tab" style="margin-top:20px;">
	<!-- LEFT -->
	<div class="col-md-6 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading" style="background-color:#ffffff;" >
				<h4>EVENTS</h4> 
				<?php require_once("View/eventsList.php"); ?>
			</div>	
		</div>
		
	</div>	
	
	<!-- RIGHT -->	
	<div class="col-md-4">

		<div class="panel panel-default" style="background-color: #f8f8f8;border:none;padding:0px;">
			<div class="panel-body" style="background-color: #f8f8f8;border:none;padding:0px;">
			
				<!--tabs_navigation_bar-->
				<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
				<li class="active">	<a href="#applied" data-toggle="tab">Applied</a></li>
				<li> <a href="#posted" data-toggle="tab">Posted</a></li></ul>
				
				<!--tabs_content-->	
				<div id="my-tab-content" class="tab-content" style="">
					<!--Applied Jobs-->
					<div class="tab-pane active" id="applied" >
						<!--?php require_once("view/eventsList.php");?-->
					</div>
							
					<!--Posted Jobs-->
					<div class="tab-pane" id="posted">
						<!--?php require_once("view/eventsList.php");?-->
					</div>
				
				</div>

				<form action="/danceseen/Controller/addEvent.php" method="post">
					<div class="form-group">
						<table>
							<tbody>
								<tr>
									Title <input type="text" class="form-control" name="title">
								</tr>
								<tr>
									Date <input type="text" class="form-control" name="date" >
								</tr>
								<tr>
									Description <input type="text" class="form-control" name="description">
								</tr>
							</tbody>
						</table>
					</div>
					<button type="submit" class="btn btn-success">Post Event</button>
				</form>
				
			</div>
		</div>
			
	</div>	
</div><!-- /container -->
			
<?php require_once($globe->g_footer()); ?>

</body>

</html>