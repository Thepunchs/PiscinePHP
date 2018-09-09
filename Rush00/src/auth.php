<?php
session_start();
function auth($login, $passwd)
{
if ($login && $passwd)
{
	$pass_hash = hash("whirlpool", $passwd);
	$get_data = unserialize(file_get_contents("../private/passwd"));
		foreach ($get_data as $key => $value)
		{
			if ($value['login'] == $login)
			{
				if ($value['passwd'] == $pass_hash)
					return (TRUE);
				else
					return (FALSE);
			}
		}
}
else
	return (FALSE);
}

if (auth($_POST['login'], $_POST['passwd']) == TRUE)
{
	$_SESSION['login'] = $_POST['login'];
	if ($_SESSION['login'] == "admin" || $_SESSION['login'] == "root")
		header('Location:admin.php');
	else
		header('Location:index.php');
	echo "Login Success\n";
}
else
{
	header('Location:failed_login.php');
	echo "Error login\n";
}
?>
