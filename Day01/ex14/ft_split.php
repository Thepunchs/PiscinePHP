#!/usr/bin/php
<?php
function ft_split($chaine)
{
	$chaine = trim(preg_replace("/[\\x00-\\x20]+/", " ", $chaine));
	$array = explode(" ", $chaine);
	return ($array);
}
?>
