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
$i = 0;

while ($array[$i])
{
	if (ctype_alpha($array[$i]) == TRUE)
		$alpha[$j++] = $array[$i];
	$i++;
}
$i = 0;
$j = 0;

while ($array[$i])
{
	if (is_numeric($array[$i]) == TRUE)
		$numeric[$j++] = $array[$i];
	$i++;
}
$j = 0;

while ($numeric[$j])
{
	if ($numeric[$j] - $numeric[$j+1] < 0)
	{
		$tmp = $numeric[$j];
		$numeric[$j] = $numeric[$j+1];
		$numeric[$j+1] = $tmp;
	}
	$j++;
}
$i = 0;
$j = 0;

while ($array[$i])
{
	if (!ctype_alpha($array[$i]) && !is_numeric($array[$i]))
		$other[$j++] = $array[$i];
	$i++;
}

sort($other);
sort($alpha, SORT_STRING | SORT_FLAG_CASE);

$j = 0;
$i = 0;

while ($alpha[$j])
	$newarray[$i++] = $alpha[$j++];
$j = 0;

while ($numeric[$j])
	$newarray[$i++] = $numeric[$j++];
$j = 0;

while ($other[$j])
	$newarray[$i++] = $other[$j++];
$i = 0;
while ($newarray[$i])
{
	echo $newarray[$i++];
	echo "\n";
}
?>
