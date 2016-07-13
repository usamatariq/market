<?php
	require_once $globe->g_root() . '/lib/class.phpmailer.php';
	
	class Mailer {
	
		const MAILER = 'smtp';
		const SMTPAUTH = true;
		const HOST = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
		const PORT = 587;
		const SMTPSECURE = 'tls';

		
		const EMAIL_USERNAME = "snatchmarket@gmail.com";
		const EMAIL_PASSWORD = "Sn@tchmark3t";
		
		private $mailer;
		
		public function __construct() {
			$this->create_mailer();
		}
		
		public function sendmail($to_email, $to_name, $from_email, $from_name, $subject, $body) {
			// $this->mailer->From = "danceseen@gmail.com";
			// $this->mailer->FromName = "Danceseen";
			echo "from: " . $from_email . "<br />";
			
			$this->mailer->From = $from_email;
			$this->mailer->FromName = $from_name;
			
			$this->mailer->addAddress($to_email, $to_name);
			$this->mailer->Subject = $subject;
			$this->mailer->Body = $body;
			
			if(!$this->mailer->Send()) {
				return true;
			}
			else {
				return false;
			}
		}
		
		private function create_mailer() {
			$this->mailer = new PHPMailer();
			
			$this->mailer->IsSMTP();// enable SMTP
			$this->mailer->Mailer = $this::MAILER;
			$this->mailer->SMTPAuth = $this::SMTPAUTH;
			$this->mailer->Host = $this::HOST; 
			$this->mailer->Port = $this::PORT;
			$this->mailer->SMTPSecure = $this::SMTPSECURE;
			
			$this->mailer->Username = $this::EMAIL_USERNAME;
			$this->mailer->Password = $this::EMAIL_PASSWORD;

			$this->mailer->IsHTML(true); // if you are going to send HTML formatted emails
			$this->mailer->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.
		}
		
		
	}

?>