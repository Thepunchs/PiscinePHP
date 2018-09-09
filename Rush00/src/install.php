<?php
	function initialize()
	{
		session_start();
		$servername = "127.0.0.1";
		$username = "root";
		$password = "84019744";

		$conn = mysqli_connect(null, $username, $password, null, 0, '/Users/alefebvr/goinfre/mamp/mysql/tmp/mysql.sock');
		mysqli_select_db($conn, 'weedproducts');
		if ($conn->connect_error)
				die("Connection failed: " . $conn->connect_error);
		//if checks if table exists
		if (!mysqli_query($conn, "DESCRIBE `weedproducts`"))
		{
			$sql = "CREATE DATABASE 'weedproduts'";
			mysqli_query($conn, $sql);
		}

		if(!mysqli_query($conn, "DESCRIBE `Articles`"))
		{

			$sql = "CREATE TABLE `weedproducts`.`Articles` (
			`name` VARCHAR(255) NOT NULL DEFAULT 'Nameless',
			`price` INT(255) NOT NULL DEFAULT '0',
			`category` INT(2) NOT NULL DEFAULT '1',
			`amount` INT(255) NOT NULL DEFAULT '0');";
			mysqli_query($conn, $sql);
			$sql = "INSERT INTO articles (name, price, category) VALUES ('Purple Haze', '20', '1')";
			mysqli_query($conn, $sql);
			$sql = "INSERT INTO articles (name, price, category) VALUES ('Amnesia Haze', '20', '1')";
			mysqli_query($conn, $sql);
			$sql = "INSERT INTO articles (name, price, category) VALUES ('White Widdow', '25', '2')";
			mysqli_query($conn, $sql);
			$sql = "INSERT INTO articles (name, price, category) VALUES ('Super Lemon Haze', '15', '1')";
			mysqli_query($conn, $sql);
			$sql = "INSERT INTO articles (name, price, category) VALUES ('Blueberry Kush', '20', '2')";
			mysqli_query($conn, $sql);
			$sql = "INSERT INTO articles (name, price, category) VALUES ('OG Kush', '15', '1')";
			mysqli_query($conn, $sql);
			$sql = "INSERT INTO articles (name, price, category) VALUES ('Northern Lights', '25', '2')";
			mysqli_query($conn, $sql);
		}
		return ($conn);
	}
?>