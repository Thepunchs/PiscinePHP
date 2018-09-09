<html>
	<head>
		<meta charset="utf-8" />
		<title>Register</title>
		<link rel="stylesheet" href="login_register.css" type="text/css"/>
	</head>

	<body>
		<div class=header>
		<a href="index.php"><img class="title" src="../resources/title.png" alt="title" title="Title"></a>
		<div class=leftofhead>
			<a href="basket.php"><img class="panier" src="../resources/panier.png" alt="panier" title=“Panier”></a>
			<a href="login.php"><img class="login" src="../resources/login.png" alt="login" title=“Login”></a> <br \> <br \>
			<a href="register.php"><img class="register" src="../resources/register.png" alt="register" title=“Register”></a>
		</div>
	</div>
		<div class="create_account">
			<h1 id="h_1"> Créer un compte : </h1>
<form action="create.php" method="post">
	<div class="text">
<p id="text_settings">Identifiant : <br /> </p>
<p id="text_settings">	Mot de passe : <br /></p>
<p id="text_settings">	Confirmer mot de passe : <br /></p>
<p id="text_settings">	Adresse email : <br /></p>
	</div>
	<div class="textbox_div">
<input class="textbox" type="text" name="login" value="">
<input class="textbox" type="password" name="passwd" value="">
<input class="textbox" type="password" name="passwdconfirm" value="">
<input class="textbox" type="email" name="email" value="">
	</div>
	<input class="button1" type="submit" name="submit" value="Create my account">
</form>
		</div>
</body></html>