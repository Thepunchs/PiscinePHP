#!/usr/bin/php 
<?php
if ($argv[1] == "moyenne")
{
	$i = 0;
	$total = 0;
	$fichier = fgets(STDIN);
	while (($fichier = fgets(STDIN)) == TRUE)
	{
		$tab = explode(";", $fichier);
		if ($tab[2] != "moulinette")
		{
			$total = $total + $tab[1];
			$i++;
		}
	}
	$total = $total / $i;
	echo $total;
}

else if ($argv[1] == "moyenne_user")
{
	$i = 0;
	$total = 0;
	$fichier = fgets(STDIN);
	while (($fichier = fgets(STDIN)) == TRUE)
	{
		$tab = explode(";", $fichier);
		$hash[$i] = array("user" => $tab[0], "note" => "note" + $tab[1], $ret => $ret + 1);
		print_r($hash[$i]);
		$i++;
	}
	while ($hash[$i])
	{
		$hash[$i][$note] = $hash[$i][$note] / $ret;
		$i++;
	}
	while ($hash[$i])
	{
		echo $hash[$i]['user'];
		echo "=";
		echo $hash[$i][$note];
	}
	echo "\n";
}
?>
