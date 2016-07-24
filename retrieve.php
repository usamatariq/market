<?php
//session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/market/facebook/autoload.php";
$fb = new Facebook\Facebook([
	  'app_id' => '1741439976133091',
	  'app_secret' => '14e28b9a734e5ada137da599b12b1284',
	  'default_graph_version' => 'v2.3',
	  // . . .
	  ]);

	  
try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,email, gender, birthday', 'EAAYv1Jcs0eMBAP9ObZAzWkfiHAUIsnUOFFImAwcbIfr5ReT7rE6kDRHgb8eswqMWsAr7YgRm0ewmaGpGQgobbfgHSqqxFEVnzmkgVfHP24duk45aIqTp5hZAYTFjCrar2EZB36QZCZC48bZCM3dzgRPiuHpbzmpE0ZD');
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();
var_dump($user);
//echo 'Name: ' . $user['name'];
// OR
echo nl2br("Name: " . $user->getName());
echo nl2br("\nGender: " . $user->getGender());
echo nl2br("\nEmail: " . $user->getEmail());
?>