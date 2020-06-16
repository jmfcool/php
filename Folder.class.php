<?php	
	class Folder
	{
		private $files, $result, $blocked, $scan; 
		public $show;
		public function __construct($path=null)
		{
			$this->files = scandir($path);
		}
		public function hide($exclude)
		{
			$this->blocked = explode(",",$exclude);
			$this->scan = array($this->files);
			foreach($this->scan as $file)
			{
				$this->result = array_diff($file,$this->blocked);
				$this->show();
			}
		}
		private function show()
		{
			$this->show = $this->result;
		}
	}