<?php
	class Globe {
		// comment out as appropriate
		public $dirPath = "/market";

		const IS_TEST = false;
		const APP_PATH = "";

		// local
		const HOST = "localhost";
		const USER = "danceseen"; 
		const PASSWORD = "12345";
		const DATABASE = "market"; 

		// // server
		// const HOST = "localhost";
		// const USER = "admin";
		// const PASSWORD = "12345";
		// const DATABASE = "danceseen"; 
		
		public function g_head() {
			return $_SERVER["DOCUMENT_ROOT"] . $this->dirPath . "/COMMON/View/head.php";
		}

		public function g_guestHeader() {
			return $_SERVER["DOCUMENT_ROOT"] . $this->dirPath . "/COMMON/View/guestHeader.php";
		}

		public function g_unverifiedHeader() {
			return $_SERVER["DOCUMENT_ROOT"] . $this->dirPath . "/COMMON/View/unverifiedHeader.php";
		} 

		public function g_userHeader() {
			return $_SERVER["DOCUMENT_ROOT"] . $this->dirPath . "/COMMON/View/userHeader.php";
		} 

		public function g_footer() {
			return $_SERVER["DOCUMENT_ROOT"] . $this->dirPath . "/COMMON/View/footer.php";
		}

		public function g_root() {
			return $_SERVER["DOCUMENT_ROOT"] . $this->dirPath;
		}

		public function g_log($message) {
			$filename = $_SERVER["DOCUMENT_ROOT"] . $this->dirPath . "/log.txt";
			$file = fopen( $filename, "a" );
			fwrite( $file, "$message \n" );
			fclose( $file );
		}
	}
?>