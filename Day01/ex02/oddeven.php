#!/usr/bin/php
<?php
while (1)
{
echo "Entrez un nombre: ";
$nombre = fgets(STDIN);
if(feof(STDIN))
	break;
$nombre = trim($nombre);
if (!is_numeric($nombre))
	echo "'$nombre' n'est pas un chiffre\n";
else if ($nombre % 2 == 0)
	echo "Le chiffre $nombre est Pair\n";
else if ($nombre % 2 != 0)
	echo "Le chiffre $nombre est Impair\n";
}
echo "\n";
?>
