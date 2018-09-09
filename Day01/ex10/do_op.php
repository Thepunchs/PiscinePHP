#!/usr/bin/php 
<?php
	if ($argc == 4)
	{
		$opp = trim($argv[2]);
		if ($opp == "+")
			echo $argv[1] + $argv[3];
		else if ($opp == "-")
			echo $argv[1] - $argv[3];
		else if ($opp == "*")
			echo $argv[1] * $argv[3];
		else if ($opp == "/")
			echo $argv[1] / $argv[3];
		else if ($opp == "%")
			echo $argv[1] % $argv[3];
	}
	else
		echo "Incorrect Parameters";
	echo "\n";
?>
