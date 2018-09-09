#!/usr/bin/php 
<?php
if ($argc == 2)
{
	$tab = sscanf($argv[1], "%d %c %d %s");
if (is_numeric($tab[0]) && is_numeric($tab[2]) && !($tab[3]))
{
	if ($tab[1] == "+")
		echo $tab[0] + $tab[2];
	else if ($tab[1] == "-")
		echo $tab[0] - $tab[2];
	else if ($tab[1] == "*")
		echo $tab[0] * $tab[2];
	else if ($tab[1] == "/")
	{
		if ($tab[2] == "0")
			echo "Syntax Error";
		else
			echo $tab[0] / $tab[2];
	}
		else if ($tab[1] == "%")
			echo $tab[0] % $tab[2];
	}
	else
		echo "Syntax Error";
	echo "\n";
}
else
	echo "Incorrect Parameters\n";
?>
