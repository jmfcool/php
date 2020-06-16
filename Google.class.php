<?php
	class Google
	{
		public $account;
		public $domain;
		public function tracking()
		{			
			print "<script type=\"text/javascript\">\n";
			  print "var _gaq = _gaq || [];";
			  print "_gaq.push(['_setAccount', '" . $this->account . "']);";
			  print "_gaq.push(['_setDomainName', '" . $this->domain . "']);";
			  print "_gaq.push(['_trackPageview']);";
			  print "(function() {";
			  print "  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;";
			  print "  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';";
			  print "  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);";
			  print "})();\n";
			print "</script>";
		}
	}