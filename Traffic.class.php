<?php
	include realpath(dirname(__FILE__)) . '/Base.class.php';
	class Traffic
	{
		public $path 	= '';
		public $session = '';
		private $ranges = '';
		private $total 	= '';
		private $random = '';
		public function path($rules)
		{
			$this->ranges = array();
			$this->total = 0;
			$this->random = rand(1,100);
			foreach($rules as $key => $value) 
			{
				$this->ranges[$value[0]]['min'] = $this->total + 1;
				$this->ranges[$value[0]]['max'] = $this->total + $value[0];
				$this->total += $value[0];
				if($this->random >= $this->ranges[$value[0]]['min'] && $this->random <= $this->ranges[$value[0]]['max']) 
				{
					$path 		= $value[1];
					$file 		= $value[2];
					$session 	= $value[3];
					header("Location: {$path}/{$file}?sid={$session}");
				}
			}
		}
	}
