#!/usr/bin/php 
<?php
function ft_split($chaine)
{
	$chaine = trim(preg_replace("/[\\x00-\\x20]+/", " ", $chaine));
	$array = explode(" ", $chaine);
	return ($array);
}
$i = 0;
$array = ft_split($argv[1]);
$tmp_first = $array[0];
while ($array[$i])
{
	$array[$i] = $array[$i+1];
	$i++;
}
$array[$i-1] = $tmp_first;
$i = 0;
while ($array[$i])
{
	echo $array[$i++];
	if ($array[$i])
		echo " ";
}
echo "\n";
?>
