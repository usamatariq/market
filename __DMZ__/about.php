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
</head>

<body>
	<?php
		require_once($globe->g_userHeader());
	?>
	
<div class="container container-main">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-body" style="text-align:justify;">
<h2>Get to know us</h2>

<p>Danceseen is a social initiative borne out of a group of individuals who are passionate about street dance. All of us behind this project came together because we held a single desire; to celebrate the vibrancy of the local dance scene and allow dancers to give back to society.</p>

<p>Ultimately, we hope to help local dancers gain employment within the society and bridge the gap between dancers who wish to showcase their talents and those who require them. By giving back to the society through dance, we aim to enhance the employability of dancers and make dance a viable career option in Singapore.</p>

<p>Our objectives are simple:
Provide a platform to engage dance enthusiasts in the society. 
Create an online portfolio management system for dancers.
Raise the public's understanding and awareness of dance</p>

<h2>What we do</h2>
<p>Danceseen acts as a centralized platform for dancers and requestors to post and accept ad-hoc or long-term assignments. The website will also host the aggregation of portfolios and show-reels of the participating dancers as a form of certification and resume.</p>

<p>As dancers in the scene for many years, we understand the hassle of having to post an assignment opening on multiple platforms especially when trying to recruit a large group of dancers. With this website, we give requestors the chance to profile the dancers they are hiring so they can engage the most suitable people for the job. Dancers now also have an easy go-to avenue to seek assignment opportunities.</p>

</div>
</div>
</div>
</div>

</body>
</html>
<?php require_once($globe->g_footer()); ?>

