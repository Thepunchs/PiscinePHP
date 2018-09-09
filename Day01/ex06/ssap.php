#!/usr/bin/php 
<?php
function ft_split($chaine)
{
	$chaine = trim(preg_replace("/[\\x00-\\x20]+/", " ", $chaine));
	$array = explode(" ", $chaine);
	return ($array);
}
$i = 1;
$j = 0;
$k = 0;
while ($argc > 1)
{
	$array_tmp = ft_split($argv[$i]);
	while ($array_tmp[$j])
		$array[$k++] = $array_tmp[$j++];
	$argc--;
	$j = 0;
	$i++;
}
sort($array);
print_r($array);
?>
