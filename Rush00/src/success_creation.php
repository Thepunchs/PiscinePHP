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
	<div id="cree">
		<p> Compte créé avec succés ! </p>
	</div>
		<div class=products>
		<form action="index.php" method="post">
		<select class="category" name="category">
			<option> Hybrid </option>
			<option> Sativa </option>
			<option> Indica </option>
		</select>
		<input id="change_category" type="submit" name="button" value="Change">
	</form>
		<?PHP
		$query =  "SELECT * FROM Articles";
		$result = mysqli_query($conn, $query);
		if ($_POST['category'] == "Indica") {
            while ($row = mysqli_fetch_array($result))
            {
            	if ($row["category"] == 2) {
            		$category = "Indica";
            	
        	?>
        <form class=item method="post" action=index.php>
        	<img class="bud" src="../resources/bud.jpg" alt="bud" title=“”>
        	<a class=text><b>Strain: "<?PHP echo $row["name"];?>"<br \>Type: "<?PHP echo "$category"; ?>"<br \> Price:"<?PHP echo $row["price"]?>" $/gram<br \></b></a>
        	<input class=addbutton type="submit" name="<?=$row["name"]?>" value="Add"></b></a>
		</form> 
        <?PHP
        $name = str_replace( '_', ' ', array_keys($_POST)[0]);
		$name = sprintf($name);
		$stmt = mysqli_prepare($conn, "UPDATE Articles SET amount=1 WHERE name=?");
		mysqli_stmt_bind_param($stmt, "s", $name);
		mysqli_stmt_execute($stmt); }}} ?>



		<?PHP
		$query =  "SELECT * FROM Articles";
		$result = mysqli_query($conn, $query);
		if ($_POST['category'] == "Sativa")
		{
            while ($row = mysqli_fetch_array($result))
            {
            	if ($row["category"] == 1){
            		$category = "Sativa";
            	
        	?>
        <form class=item method="post" action=index.php>
        	<img class="bud" src="../resources/bud.jpg" alt="bud" title=“”>
        	<a class=text><b>Strain: "<?PHP echo $row["name"];?>"<br \>Type: "<?PHP echo "$category"; ?>"<br \> Price:"<?PHP echo $row["price"]?>" $/gram<br \></b></a>
        	<input class=addbutton type="submit" name="<?=$row["name"]?>" value="Add"></b></a>
		</form> 
        <?PHP
        $name = str_replace( '_', ' ', array_keys($_POST)[0]);
		$name = sprintf($name);
		$stmt = mysqli_prepare($conn, "UPDATE Articles SET amount=1 WHERE name=?");
		mysqli_stmt_bind_param($stmt, "s", $name);
		mysqli_stmt_execute($stmt); }}} ?>



		<?PHP
		$query =  "SELECT * FROM Articles";
		$result = mysqli_query($conn, $query);
		if ($_POST['category'] == "Hybrid" || $_POST['category'] == ""){
            while ($row = mysqli_fetch_array($result))
            {
            	if ($row["category"] == 1)
            		$category = "Sativa";
            	elseif ($row["category"] == 2)
            		$category = "Indica";
            	else
            		$category = "Hybrid"
        	?>
        <form class=item method="post" action=index.php>
        	<img class="bud" src="../resources/bud.jpg" alt="bud" title=“”>
        	<a class=text><b>Strain: "<?PHP echo $row["name"];?>"<br \>Type: "<?PHP echo "$category"; ?>"<br \> Price:"<?PHP echo $row["price"]?>" $/gram<br \></b></a>
        	<input class=addbutton type="submit" name="<?=$row["name"]?>" value="Add"></b></a>
		</form> 
        <?PHP
        $name = str_replace( '_', ' ', array_keys($_POST)[0]);
		$name = sprintf($name);
		$stmt = mysqli_prepare($conn, "UPDATE Articles SET amount=1 WHERE name=?");
		mysqli_stmt_bind_param($stmt, "s", $name);
		mysqli_stmt_execute($stmt); }} ?>

	</div>
</body>
</html>