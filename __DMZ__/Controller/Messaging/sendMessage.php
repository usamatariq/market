<?php 
	session_start();
	require_once $_SERVER["DOCUMENT_ROOT"] . "/danceseen/Globe.php";
	$globe = new Globe();
	
	require_once $globe->g_root() . '/Model/Message.php';
	$message = new Message();
	
	$message_from = $_SESSION['userID'];
	$message_to = htmlspecialchars($_POST['message_to']);
	$message_subject = htmlspecialchars($_POST['message_subject']);
	$message_text = htmlspecialchars($_POST['message_text']);
	
	$message->addMessage($message_to, $message_from, $message_subject, $message_text);
	
	header("Location: /danceseen/inbox.php");
?>	