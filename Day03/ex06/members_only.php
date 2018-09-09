<?php
if ($_SERVER["PHP_AUTH_USER"] === "zaz" && $_SERVER["PHP_AUTH_PW"] === "jaimelespetitsponeys")
{
	header("WWW-Authenticate: Basic realm=''Espace membres''");
	$get_img =  file_get_contents("../img/42.png");
	$variable_base64 = base64_encode($get_img);
	echo "<html><body>\nBonjour Zaz<br />\n<img src='data:image/png;base64,$variable_base64'>\n</body></html>\n";
}
else
{
	header("WWW-Authenticate: Basic realm=''Espace membres''");
	header("HTTP/1.0 401 Unauthorized");
	echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
}
?>
