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
<div class="panel-body">
			Pending

</div>
</div>
</div>
</div>

</body>
</html>
<?php require_once($globe->g_footer()); ?>

