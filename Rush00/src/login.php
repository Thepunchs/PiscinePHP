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
		<div class="login_div">
			<h1 id="h_2"> Login : </h1>
<form action="auth.php" method="post">
<p>Identifiant: </p> <input class="boxtext" type="text" name="login" value="">
<p>Mot de passe: </p><input class="boxtext" type="password" name="passwd" value="">
	<input class="button2" type="submit" name="submit" value="Login">
</form>
		</div>
</body></html>
