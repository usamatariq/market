<?php
	$to      = 'leemeiying91@gmail.com';
	$subject = 'the subject';
	$message = 'hello';
	$headers = 'From: webmaster@clonenine.com' . "\r\n" .
		'Reply-To: webmaster@clonenine.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers);
?> 