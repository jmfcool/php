<?php
	class Cookie
	{
		protected $secure;
		private $name, $value, $expire, $path, $domain;
		public function set($name=null, $value=null, $expire=null, $path=null, $domain=null, $secure=null) 
		{
			$this->name = $name;
			$this->value = $value;
			$this->expire = time() + $expire;
			$this->path = $path;
			$this->domain = $domain;
			$this->secure = $secure;
			setcookie($this->name, $this->value, $this->expire, $this->path, $this->domain, $this->secure);
		}
		public function get($value)
		{
			return $_COOKIE[$value];
		}
		public function destroy($name) 
		{
			$this->expire = time() - 100;
			setcookie($name, $expire);
		}
	}