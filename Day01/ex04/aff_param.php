#!/usr/bin/php
<?php
$i = 1;
while ($argc > 1)
{
	$tab[$i] = $argv[$i];
	$argc--;
	$i++;
}
while ($argc < $i)
{
	echo $tab[$argc];
	echo "\n";
	$argc++;
}
?>
