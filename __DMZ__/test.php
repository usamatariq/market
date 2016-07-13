<?php

	// include("Model/Profile.php");
	// $p = new Profile();
	// echo "Test Page <br />";

	// // echo $p->newProfile("admin");

	// $p->set("admin", "firstName", "Rusty");
	// $p->set("admin", "lastName", "Goh");
	// $p->set("admin", "mobile", "+65 12345678");
	// $p->set("admin", "about", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");

	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/Globe.php";
	$globe = new Globe();

	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/Model/Job.php";
	$job = new Job();

	$result = $job->acceptApplicant(3, "dave");
	echo $result;

	//UPDATE employ SET accepted = 2 WHERE id=1 AND applier = "dave"
	
?>