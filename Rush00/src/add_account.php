<?php
session_start();
if ($_POST['submit'] == "Ajouter" && $_POST['login'] && $_POST['passwd'] && $_POST['email'])
{
	$pass_hash = hash("whirlpool", $_POST['passwd']);
	$ids = array('login' => $_POST['login'], 'passwd' => $pass_hash, 'email' => $_POST['email']);
	serialize($ids);
	if (!file_exists("../private"))
		mkdir("../private");
	if (file_exists("../private/passwd"))
	{
		$file_undo = unserialize(file_get_contents("../private/passwd"));
		foreach ($file_undo as $key => $value)
		{
			if ($value['login'] == $_POST['login'])
			{
				header('Location:admin.php');
				return ;
			}
		}
		$file_undo[] = $ids;
		file_put_contents("../private/passwd", serialize($file_undo));
		header('Location:admin.php');
	}
	else
	{
		$file_undo[] = $ids;
		file_put_contents("../private/passwd", serialize($file_undo));
		header('Location:admin.php');
	}
}
else
	header('admin.php');
?>
