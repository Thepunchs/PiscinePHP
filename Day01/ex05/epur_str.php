#!/usr/bin/php 
<?php
if ($argc == 2)
{
	$new_chaine = trim(preg_replace("/[\\x00-\\x20]+/", " ", $argv[1]));
	echo "$new_chaine\n";
}
?>
