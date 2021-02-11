<?php 
	include realpath(dirname(__FILE__)) . "/../../../../../../php/Database.class.php";
	$database = new Database("localhost","jmfcool_user","1234","jmfcool_tables");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Register</title>
	</head>
	<body>
		<?
		
		// Check Submited
		if(isset($_POST['submit'])) 
		{
			// Check to see if fields are blank
			if(!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2']) 
			{ 
				die('You did not complete all of the required fields'); 
			}
			
			// Check to see if someone already has username
			if(!get_magic_quotes_gpc()) 
			{ 
				$_POST['username'] = addslashes($_POST['username']); 
			}
			$usercheck = $_POST['username'];
			$check = $database->query("SELECT username FROM users WHERE username = '$usercheck'");
			$check2 = mysql_num_rows($check);
			
			// Error for duplicate username
			if($check2 != 0) 
			{ 
				die('Sorry, the username '.$_POST['username'].' is already in use.'); 
			}
			
			// Validate passwords against eachother to make sure they are the same
			if($_POST['pass'] != $_POST['pass2']) 
			{ 
				die('Your passwords did not match. '); 
			}
			
			// MD5 encrypt password and add slashes if needed
			$_POST['pass'] = md5($_POST['pass']);
			if(!get_magic_quotes_gpc()) 
			{
				$_POST['pass'] = addslashes($_POST['pass']);
				$_POST['username'] = addslashes($_POST['username']);
			}
			
			// Insert new user into Database
			$database->query("INSERT INTO users (username, password) VALUES('".$_POST['username']."', '".$_POST['pass']."')");
		?>
		
		<h1>Registered</h1>
		<p>Thank you, you have registered - you may now login</a>.</p>

		<?
		}
		else 
		{ ?>
			
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
			<table border="0">
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" maxlength="60"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="pass" maxlength="10"></td>
				</tr>
					<tr><td>Confirm Password:</td>
					<td><input type="password" name="pass2" maxlength="10"></td>
				</tr>
				<tr>
					<th colspan=2><input type="submit" name="submit" value="Register"></th>
				</tr> 
			</table>
		</form>
		
		<?
		}
		?> 
		<?php include 'options.php' ?>	
	</body>
</html>
