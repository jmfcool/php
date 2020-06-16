<?php	
	class Xarray
	{
		protected $xml;
		private $dom, $root;
		public function __construct($xml=null)
		{
			$this->xml = $xml;
			$this->__create();
		}
		private function __create()
		{
			$this->dom = new DOMDocument;
			$this->dom->load($this->xml);
			$this->root = $this->dom->documentElement;
		}
		public function elements()
		{
			//print __METHOD__;
			$i = 0;
			$elements = $this->root->childNodes;
			$return = array();
			for($i=0; $i<$elements->length; $i++)
			{
				$i = $i + 1;
				$return[] = $elements->item($i)->nodeValue;
			}
			return $return;
		}
		public function tag($tag,$line=null)
		{
			//print __METHOD__;
			$nodeList = $this->dom->getElementsByTagName($tag);
			$return = array();
			foreach($nodeList as $node)
			{
	    		$return[] = $node->nodeValue;
			}
			return $return;
		}
	}