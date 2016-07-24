<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/market/COMMON/Model/Facebook.php";

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email', 'user_birthday']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/market/join/fb-callback.php', $permissions);
//header("Location:" . htmlspecialchars($loginUrl) . "");
$URL = htmlspecialchars($loginUrl);
echo $URL;

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>
