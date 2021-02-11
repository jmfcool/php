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
		<title>Login</title>
	</head>
	<body>
		<?php
		
		// Check for login Cookie
		if(isset($user))
		{
			$check = $database->query("SELECT * FROM users WHERE username = '$username'");
			while($info = $database->fetch($check))
			{
				if($pass != $info['password']){}
				else
				{
					header("Location: members.php");
				}
			}
		}
		
		// If form has been submited
		if(isset($_POST['submit'])) 
		{
			// Checks required fields
			if(!$_POST['username'] | !$_POST['pass']) 
			{ 
				die('You did not fill in a required field.'); 
			}
			// Checks Login against Database
			if(!get_magic_quotes_gpc()) 
			{ 
				$_POST['email'] = addslashes($_POST['email']); 
			}
			$check = $database->query("SELECT * FROM users WHERE username = '".$_POST['username']."'");
			// Error if user doesn't exsist
			$check2 = mysql_num_rows($check);
			if($check2 == 0) 
			{ 
				die('That user does not exist in our database. <a href=register.php>Click Here to Register</a>'); 
			}
			while($info = $database->fetch($check))
			{
				$_POST['pass'] = stripslashes($_POST['pass']);
				$info['password'] = stripslashes($info['password']);
				$_POST['pass'] = md5($_POST['pass']);
				// Error if password isn't right
				if($_POST['pass'] != $info['password']) 
				{ 
					die('Incorrect password, please try again.'); 
				}
				// Create Cookie and Redirect if Login is good
				else
				{
					$_POST['username'] = stripslashes($_POST['username']);
					$cookie->set(ID_my_site,$_POST['username'],3600);
					$cookie->set(Key_my_site,$_POST['pass'],3600);
					header("Location: members.php");
				}
			}
		}
		else
		{
		
		// If not logged in
		?>
			<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
				<table border="0">
					<tr>
						<td colspan=2><h1>Login</h1></td>
					</tr>
					<tr>
						<td>Username:</td>
						<td><input type="text" name="username" maxlength="40"></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="pass" maxlength="50"></td>
					</tr>
					<tr>
						<td colspan="2" align="right"><input type="submit" name="submit" value="Login"></td>
					</tr>
				</table>
			</form>
		<?php } ?> 
		<?php include 'options.php' ?>
	</body>
</html>
