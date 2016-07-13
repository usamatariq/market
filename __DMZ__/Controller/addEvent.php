<?php
	session_start();

	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/Globe.php";
	$globe = new Globe();
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/Model/Event.php";
	$event = new Event();
	
	$userID = $_SESSION['userID'];
	$title = htmlspecialchars($_POST['title']);
	$date = htmlspecialchars($_POST['date']);
	$description = htmlspecialchars($_POST['description']);
	
	$result = $event->addEvent($userID, $title, $date, $description);
	if($result) {
		header("Location: /danceseen/events.php?response=addpass");
	}
	else {
		header("Location: /danceseen/events.php?response=addfail");
	}
	
?>