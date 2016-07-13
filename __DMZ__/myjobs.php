<?php
	session_start();
	require_once $_SERVER["DOCUMENT_ROOT"] . "/danceseen/Globe.php";
	$globe = new Globe();
	
	if(!isset($_SESSION['userID'])) {
		$index = $globe->g_root() . "/index.php";
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
	<script type="text/javascript" src="js/datepicker.js"></script>
	<script type="text/javascript" src="js/timepicker.js"></script>
	<script type='text/javascript' src="js/formValidation.js"></script>
</head>

<body>
	<?php
		require_once($globe->g_userHeader());
	?>
	
<div class="container container-main">
	<div class="col-md-10 col-md-offset-1" >		
		<div class="nav-sub">
         <ul id="tabs" class="nav-sub-job" data-tabs="tabs">
			<li class="active">	<a href="#applied" 	data-toggle="tab">Applied</a></li>
			<li class="">		<a href="#posted" 	data-toggle="tab">Posted</a></li>
		</ul>

      </div>
		
		<div>
				<div id="my-tab-content" class="tab-content" style="border:0px;padding-left:0px;padding-right:0px;">				
					<div class="tab-pane active " id="applied" >
						<div class="">
							<?php require_once("view/appliedjobs.php");	?>
						</div>
					</div>
							
					<div class="tab-pane" id="posted" >
						<div class="">
							<?php require_once("view/postedjobs.php");?>
						</div>
					</div>
				
				</div>
				
		</div>
	
			
	</div>

</div>

<?php require("View/jobmodal.php"); ?>

<script type='text/javascript' src="js/jobpostValidation.js"></script>

<script>
$('#btnNext').click(function(){
  $('.pagination > .active').next('li').find('a').trigger('click');
});

$('#btnPrev').click(function(){
  $('.pagination > .active').prev('li').find('a').trigger('click');
});

</script>

<?php require_once($globe->g_footer()); ?>
</body>
</html>


