<?php
	class Base
	{
		public function __construct()
		{
			return 0;
		}
		public function __set($name,$value)
		{
			$this->name = $value;
		}
		public function __get($name)
		{
			return $this->name;
		}
	}