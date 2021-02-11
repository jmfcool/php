<?php 
	include realpath(dirname(__FILE__)) . "/../../../../../../php/Cookie.class.php";
	$cookie = new Cookie;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Logout</title>
	</head>
	<body>
		<?php
			// Invalidates the time by setting it in the pass
			$cookie->destroy(ID_my_site);
			$cookie->destroy(Key_my_site);
			header("Location: login.php");
		?> 
		<?php include 'options.php' ?>
	</body>
</html>
