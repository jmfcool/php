<?php
	class Crawler
	{
		public function check()
		{
			$url = 'http://www.jmfcool.com';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			$result = curl_exec($ch);
			curl_close($ch);
			// Search The Results From The Starting Site
			if($result)
			{
				print "<ul>";
				// I LOOK ONLY FROM TOP domains change this for your usage 
				preg_match_all( '/<a href="(http:\/\/www.[^0-9].+?)"/', $result, $output, PREG_SET_ORDER);
				foreach($output as $links)
				{
					//print_r($key);
					// ALL LINKS DISPLAY HERE
					foreach($links as $link => $value)
					{
						print "<li>{$value}</li>";
						// NOW YOU ADD IN YOU DATABASE AND MAKE A LOOP TO ENGINE NEVER STOP
					}
				}
				print "</ul>";
			}
			else
			{
				print "Crawler has been blocked";
			}
		}
	}