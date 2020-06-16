<?php
	class Authentication
	{
		public function user($login,$password)
		{
			//$user = explode(",",$login);
			//print_r($user);
			$user = array($login => $password);
			$this->server($user);
		}
		private function server($users)
		{
			// If there's no Authentication header, exit
			if(!isset($_SERVER['PHP_AUTH_USER']))
			{
				header('HTTP/1.1 401 Unauthorized');
				header('WWW-Authenticate: Basic realm="Secured with 256 Bit Encryption"');
				exit('To request privileges email <a href="mailto:me@jmfcool.com">me@jmfcool.com</a>');		
			}
			
			// If the user name doesn't exist, exit
			if(!isset($users[$_SERVER['PHP_AUTH_USER']]))
			{
				header('HTTP/1.1 401 Unauthorized');
				header('WWW-Authenticate: Basic realm="Secured with 256 Bit Encryption"');
				exit('To request privileges email <a href="mailto:me@jmfcool.com">me@jmfcool.com</a>');		
			}
			
			// Is the password doesn't match the username, exit
			if($users[$_SERVER['PHP_AUTH_USER']] != $_SERVER['PHP_AUTH_PW'])
			{
				header('HTTP/1.1 401 Unauthorized');
				header('WWW-Authenticate: Basic realm="Secured with 256 Bit Encryption"');
				exit('To request privileges email <a href="mailto:me@jmfcool.com">me@jmfcool.com</a>');		
			}
		}
	}