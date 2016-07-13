<?php
	class Email {
		private $to;
		private $from;
		private $subject;
		private $message;

		public function getTo() {
			return $to;	
		}
		public function setTo($to) {
			$this->to = $to;
		}

		public function getFrom() {
			return $from;	
		}
		public function setFrom($from) {
			$this->from = $from;
		}

		public function getSubject() {
			return $subject;	
		}
		public function setSubject($subject) {
			$this->subject = $subject;
		}

		public function getMessage() {
			return $message;	
		}
		public function setMessage($message) {
			$this->message = $message;
		}
	}
?>