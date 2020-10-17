<?php
require_once './includes/Autoloader.php';
Autoloader::register(); //charge automatiquement tous les fichers de class a leur appel
require_once './includes/session.php';
if (session_status() === PHP_SESSION_NONE) session_start(); // Ouvre la session si pas deja ouverte
// var_dump($_SESSION); //-----------------
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Accueil</title>
</head>

<body style="display: flex; flex-direction:column; align-items:center;">
	<?php if (be_connect()) : ?>
		<a href="./includes/session_close.php">Déconnexion</a>
	<?php else : ?>
		<a href="./front/connexion.php">Connexion</a>
	<?php endif ?>
</body>

</html>