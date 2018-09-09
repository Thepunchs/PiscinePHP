<?php
session_start();
$pass_file = unserialize(file_get_contents("../private/passwd"));
foreach ($pass_file as $key => $value) 
{
		if ($value['login'] == $_SESSION['login'])
		{
			unset($pass_file[$key]);
			file_put_contents("../private/passwd", serialize($pass_file));
			session_destroy();
			header('Location:index.php');
			exit;
		}
}
?>