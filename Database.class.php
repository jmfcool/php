<?php
	class Database
	{
		protected $link;
    		private $host, $username, $password, $database;
		public function __construct($host=null, $user=null, $password=null, $database=null)
		{
			$this->host = $host;
			$this->user = $user;
			$this->password = $password;
			$this->database = $database;
			$this->__connect();
		}
		private function __connect()
		{
			$this->link = @mysql_connect($this->host,$this->user,$this->password);
			@mysql_select_db($this->database,$this->link);
		}
		public function __sleep()
		{
			return array('host', 'user', 'password', 'database');
		}
		public function __wakeup()
		{
			$this->__connect();
		}
		public function connect($host,$user,$password)
		{
			return mysql_connect($host,$user,$password);
		}
		public function select($database)
		{
			return mysql_select_db($database);		
		}
		public function query($query)
		{
			return mysql_query($query);
		}
		public function fetch($result,$type=null)
		{
			if(strtoupper($type) == 'ASSOC')
			{
				return mysql_fetch_array($result,MYSQL_ASSOC);
			}
			elseif(strtoupper($type) == 'NUM')
			{
				return mysql_fetch_array($result,MYSQL_NUM);
			}
			else
			{
				return mysql_fetch_array($result,MYSQL_BOTH);
			}
		}
		public function error()
		{
			return mysql_errno();
		}
		public function close($link)
		{
			return mysql_close($link);
		}
	}
