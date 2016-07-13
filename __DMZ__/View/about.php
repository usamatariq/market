<?php
	session_start();
	// ini_set('display_errors','1'); 
	// error_reporting(E_ALL);
	// var_dump($_SESSION);
	
	if(!isset($_SESSION['username'])) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
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
	
	<div class="container home-tab" style="margin-top:20px;">
		<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default panel-body" style="text-align:justify;">
		<h2>About Us</h2>
				<p>Danceseen is a social initiative borne out of a group of individuals who are passionate about street dance. All of us behind this project came together because we held a single desire; to celebrate the vibrancy of the local dance scene and allow dancers to give back to society.</p><p>
				
				Ultimately, we hope to help local street dancers gain employment within the society and bridge the gap between dancers who wish to showcase their talents and those who require them. By giving back to the society through dance, we aim to enhance the employability of dancers and make dance a viable career option in Singapore.
				</p><p>
				Our objectives are simple: Provide a platform to engage dance enthusiasts in the society. Create an online portfolio management system for dancers. Raise the public's understanding and awareness of dance </p>
		</div>
		<div class="panel panel-default panel-body" >
		<h2>What we do</h2>
			<p>
			Danceseen acts as a centralized platform for dancers and requestors to post and accept ad-hoc or long-term assignments. The website will also host the aggregation of portfolios and show-reels of the participating dancers as a form of certification and resume.
			</p>
			<p>
			As dancers in the scene for many years, we understand the hassle of having to post an assignment opening on multiple platforms especially when trying to recruit a large group of dancers. With this website, we give requestors the chance to profile the dancers they are hiring so they can engage the most suitable people for the job. Street dancers now also have an easy go-to avenue to seek assignment opportunities. </p>
		</div>
		</div>
	</div>
	<?php require_once("View/footer.php"); ?>
</body>

</html>