<?php 
	include realpath(dirname(__FILE__)) . "/../../../../../../php/Database.class.php";
	$database = new Database("localhost","jmfcool_user","1234","jmfcool_tables");
	
	include realpath(dirname(__FILE__)) . "/../../../../../../php/Cookie.class.php";
	$cookie = new Cookie;
	$user = $cookie->get('ID_my_site');
	$pass = $cookie->get('Key_my_site');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Members</title>
	</head>
	<body>
		<?php
			// Check Cookie to see if user is logged in
			if(isset($user))
			{
				$check = $database->query("SELECT * FROM users WHERE username = '$user'");
				while($info = $database->fetch($check))
				{
					
					// Cookie has wrong password
					if($pass != $info['password']) 
					{ 
						header("Location: login.php"); 
					}
					// Cookie is good
					else
					{
						echo "Admin Area<p>";
						echo "Your Content<p>";
						echo "<a href=logout.php>Logout</a>";
					}
				}
			}
			// Cookie doesnt exsist
			else 
			{ 
				header("Location: login.php"); 
			}
		?>
		<?php include 'options.php' ?>
	</body>
</html>