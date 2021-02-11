<?php 
	include realpath(dirname(__FILE__)) . "/../../../../../../php/Database.class.php";
	$database = new Database("localhost","jmfcool_user","1234","jmfcool_tables");
	$database->query("CREATE TABLE IF NOT EXISTS users(id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY, username VARCHAR(60), password VARCHAR(60))");
	echo "Table Created!";
?>