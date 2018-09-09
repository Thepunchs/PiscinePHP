<?PHP
	include("install.php");
	$conn = initialize();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Weed Shop @ 42</title>
	<link rel="stylesheet" type="text/css" href="main_page.css">
</head>
<body>
	<div class=header>
		<a href="index.php"><img class="title" src="../resources/title.png" alt="title" title="Title"></a>
		<div class=leftofhead>
			<a href="basket.php"><img class="panier" src="../resources/panier.png" alt="panier" title=“Panier”></a>
			<?php
			if (!$_SESSION['login'] || $_SESSION['login'] == "")
			{
				echo "<a href=login.php><img class=login src=../resources/login.png alt=login title=Login></a> <br \> <br \>";
				echo "<a href=register.php><img class=register src=../resources/register.png alt=register title=Register></a>";
			}
			else if ($_SESSION['login'] && $_SESSION['login'] != "")
			{
				echo "<p id=session_login> User : {$_SESSION['login']}</p>";
				echo "<form action=destroy.php><input class=button type=submit name=submit value=\"Log out\"></form>";
				echo "<form action=destroy_account.php><input class=button_delete type=submit name=submit value=\"Delete my account\"></form>";
			}
			if ($_SESSION['login'] == "admin" || $_SESSION['login'] == "root")
				echo "<form action=admin_page.php><input class=button_delete type=submit name=submit value=\"Page admin\"></form>";
			?>
		</div>
	</div>
	<form class=totalbox method="post" action="basket.php"> 
		<?PHP
        if ($_SESSION['login'] && $_SESSION['login'] != "")
            echo "<input class=buynow type=\"submit\" name=killall value=\"Buy Now!\"><br \>";
        ?>
	</form>
<?PHP
		if(isset($_POST['killall']))
		{
			$query =  "SELECT * FROM Articles";
			$result = mysqli_query($conn, $query);
			while ($row = mysqli_fetch_array($result))
			{
				$stmt = mysqli_prepare($conn, "UPDATE Articles SET amount='0' WHERE name=?");
				mysqli_stmt_bind_param($stmt, "s",$row['name']);
				mysqli_stmt_execute($stmt);
			}
		}
	?>
		<div class="basket_products">
		<?PHP
			$name = str_replace( '_', ' ', array_keys($_POST)[1]);
			$name = sprintf($name);
			$stmt = mysqli_prepare($conn, "UPDATE Articles SET amount=? WHERE name=?");
			mysqli_stmt_bind_param($stmt, "ss", $_POST['amount'], $name);
			mysqli_stmt_execute($stmt);	
			$query =  "SELECT * FROM Articles";
			$result = mysqli_query($conn, $query);
			$total = '0';
			if ($result !== FALSE)
            while ($row = mysqli_fetch_array($result))
            {
            	if ($row["category"] == 1)
            		$category = "Sativa";
            	elseif ($row["category"] == 2)
            		$category = "Indica";
            	else
            		$category = "Hybrid";
            	if ($row["amount"] != '0') {
            		$total += ($row["amount"] * $row["price"]);
        ?>
        <form class="item" method="post" action="basket.php">
        	<img class="bud" src="../resources/bud.jpg" alt="bud" title=“”>
        	<a class=basketadd><input class="baskettextbar" type="text" name="amount" value="">
        	<input type="submit" name="<?=$row["name"]?>" value="Ok"><a>
        	<b class = text>
        	Strain: <?PHP echo $row["name"];?><br \>
        	Type: <?PHP echo "$category"; ?><br \>
        	Price: <?PHP echo $row["price"];?> $/gram<br \>
        	Amount: <?PHP echo $row["amount"]; ?> </b>
        </form>
        <?PHP }} ?>
	</div>
	<b class=totaltext> Total Price: <?PHP echo $total; ?> $</b>
</body>
</html>
