<?php
if ($_GET["action"] == "set")
	setcookie($_GET["name"], $_GET["value"], time() + 60 * 60 * 24 * 365);
else if ($_GET["action"] == "del")
	setcookie($_GET["name"], $_GET["value"], time() - 1);
else if (($_GET["action"] == "get") && ($_COOKIE[$_GET["name"]] != FALSE))
	echo($_COOKIE[$_GET["name"]])."\n";
?>
