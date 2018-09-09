<?PHP
	include("install.php");
	$conn = initialize();
	if ($_SESSION['login'] != "admin" && $_SESSION['login'] != "root")
		{
			echo "WHAT THE FUCK ARE YOU DOING ON MY GODDAMN ADMIN PAGE?!?!?!?!?!?!?";
			die();
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blazed Admin</title>
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
			}
			if ($_SESSION['login'] == "admin" || $_SESSION['login'] == "root")
				echo "<form action=admin_page.php><input class=button_delete type=submit name=submit value=\"Page admin\"></form>";
			?>
		</div>
	</div>
	<div class=admin_modify>

		<div class="create_weed">
			<h2 class="admin_title"> Ajouter une weed : </h2>
		<form action="admin.php" method="post">
<input class="text_admin" type="text" name="name_weed" placeholder="Weed_Name">
<input class="text_admin" type="text" name="price_weed" placeholder="Price ($)">
<input class="text_admin" type="text" name="category_weed" placeholder="Category (Sativa = 1 || Indica = 2 || Hybrid = 3)">
<input id="button_ajout" type="submit" name="submit" value="Ajouter">
</form>
<?php
		$stmt = mysqli_prepare($conn, "INSERT INTO articles (name, price, category) VALUES (?, ?, ?)");
		mysqli_stmt_bind_param($stmt, "sii", $_POST['name_weed'], $_POST['price_weed'], $_POST['category_weed']);
		mysqli_stmt_execute($stmt);
?>
</div>

<div class="modif_weed">
	<h2 class="admin_title"> Modifier une weed : </h2>
<form action="admin.php" method="post">
<select name='name_weed'>
<?php
		$query =  "SELECT * FROM Articles";
		$result = mysqli_query($conn, $query);
  		while ($row = mysqli_fetch_array($result))
            {
        ?>
    <option> <?php echo $row['name']; ?>
	<?php } ?>   
    </select>
	<select name="change">
    <option> Weed_Name
    <option> Price
    <option> Category
    </select>
	<input type="text" name="changement" placeholder="changement">
	<input type="submit" name="submit" value="Modify">
	</form>
	<?php
	if (isset($_POST['change']))
	{
		if ($_POST['change'] == "Weed_Name")
	    	$stmt = mysqli_prepare($conn, "UPDATE Articles SET name=? WHERE name=?");
	    elseif ($_POST['change'] == "Price")
			$stmt = mysqli_prepare($conn, "UPDATE Articles SET price=? WHERE name=?");
		elseif ($_POST['change'] == "Category")
			$stmt = mysqli_prepare($conn, "UPDATE Articles SET price=? WHERE name=?");	
		mysqli_stmt_bind_param($stmt, "ss", $_POST['changement'], $_POST['name_weed']);
		mysqli_stmt_execute($stmt);
	}
	?>
</div>

<div class="delete_weed">
	<h2 class="admin_title"> Supprimer une weed : </h2>
	<form action="admin.php" method="post">
		<select name='delete_weed'>
<?php
		$query =  "SELECT * FROM Articles";
		$result = mysqli_query($conn, $query);
  		while ($row = mysqli_fetch_array($result))
            {
        ?>
    <option> <?php echo $row['name']; ?>
	<?php } ?>   
    </select>
    <input type="submit" name="submit" value="Delete">
</form>
<?php
	if (isset($_POST['delete_weed']))
	{
	   	$stmt = mysqli_prepare($conn, "DELETE FROM Articles WHERE name=?");
		mysqli_stmt_bind_param($stmt, "s", $_POST['delete_weed']);
		mysqli_stmt_execute($stmt);
	}
	?>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<div class="create_account">
			<h2 class="admin_title_account"> Ajouter un compte : </h2>
		<form action="add_account.php" method="post">
<input class="text_admin" type="text" name="login" placeholder="Login">
<input class="text_admin" type="password" name="passwd" placeholder="Password">
<input class="text_admin" type="text" name="email" placeholder="Email">
<input id="button_ajout" type="submit" name="submit" value="Ajouter">
</form>

</div>

<div class="delete_account">
	<h2 class="admin_title_account"> Supprimer un compte : </h2>
	<form action="admin_destroy_account.php" method="post">
		<select name='name_login'>
<?php
		$file_undo = unserialize(file_get_contents("../private/passwd"));
		foreach ($file_undo as $key => $value)
		{
        ?>
    <option> <?php if ($value['login']) echo $value['login']; ?>
	<?php } ?>  
    </select>
    <input type="submit" name="submit" value="Delete">
</form>
</div>
</div>
<h4> La drogue c'est mal, c'est illégal et c'est mauvais pour la santé. Ce site est conçu uniquement pour s'entraîner en s'amusant. À bon entendeur ! </h4>
<img class="feuille" src="../resources/feuille.jpg" alt="feuille" title="feuille">
<img class="feuille" src="../resources/bang.jpg" alt="bang" title="bang">
<img class="feuille" src="../resources/bud.gif" alt="bud" title="bud">
<div class = "history"> 
</div>

</body>
</html>