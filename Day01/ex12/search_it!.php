#!/usr/bin/php 
<?php
$i = 2;
while ($argc > 2)
{
	$tab = explode(":", $argv[$i]);
	$hash[$i-2] = array($tab[0] => $tab[1]);
	$i++;
	$argc--;
}
$i = 0;
while ($hash[$i])
{
	if ($hash[$i][$argv[1]])
		$value = $hash[$i][$argv[1]];
	$i++;
}
echo $value;
echo "\n";
?>
