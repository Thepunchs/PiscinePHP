#!/usr/bin/php
<?php
	function ft_is_sort ($array)
	{
		$new = $array;
		sort($new);
		if ($array == $new)
			return (true);
		else
			return (false);
	}
?>
