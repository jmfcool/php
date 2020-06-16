<?php
	class Session
	{
		const SESSION_TRUE = 1; // Session exsists
		const SESSION_FALSE = 0; // Session does not exsist
		
		private $state = self::SESSION_FALSE; // Session state
		private static $inst; // Session instance
		private function __construct() {}

		public static function instance()
		{
			if (!isset(self::$inst))
			{
				self::$inst = new self;
			}
			self::$inst->start();
			return self::$inst;
		}

		public function start()
		{
			if ($this->state === self::SESSION_FALSE)
			{
				$this->state = session_start();
			}
			return $this->state;
		}
    
		public function __set($name,$value)
		{
			$_SESSION[$name] = (string)$value;
		}

		public function __get($name)
		{
			if (isset($_SESSION[$name]))
			{
				return $_SESSION[$name];
			}
		}
    
		public function __isset($name)
		{
			return isset($_SESSION[$name]);
		}
		    
		public function __unset($name)
		{
			unset($_SESSION[$name]);
		}

		public function id() 
		{
			return session_id();
		}
		
		public function destroy()
		{
			if ($this->state === self::SESSION_TRUE)
			{
				$this->state = !session_destroy();
				unset($_SESSION);
				return !$this->state;
			}
			return 0;
		}
	}
