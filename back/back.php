<?php
require_once '../includes/class/Autoloader.php';
Autoloader::register(); //charge automatiquement tous les fichers de class a leur appel
require_once '../includes/session.php';
if (session_status() === PHP_SESSION_NONE) session_start(); // Ouvre la session si pas deja ouverte
// var_dump($_SESSION); //-----------------
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Back</title>
	<link rel="stylesheet" href="../assets/css/test.css">
</head>

<body style="display: flex; flex-direction:column; align-items:center;">
	<?php if (be_connect()) : ?>
		<a href="../includes/session_close.php">Déconnexion</a>
		<a href="../front/compte.php">Compte Admin</a>
		<a href="../">Accueil</a>
	<?php else : ?>
		<a href="../front/connexion.php">Connexion</a>
	<?php endif ?>

	<form id="formAccount" class="formAccount" action="#" method="POST">
		<!-- <div class="block_inscription" id="block_inscription"> -->
			<h2>Suppression de comptes</h2>
			<?php
			$form = new Form_account(new Database());
			echo $form->inputText("E-mail", "E-mail ...", "Email", true);
			echo $form->submit("Supprimer le compte");
			?>
		<!-- </div> -->
	</form>

	<?php
	echo '<pre>'; var_dump($_POST); echo '</pre><<< POST >>><br>'; //-----------------

	if (isset($_POST['Login'])) {
		$form->signDown($_POST['Email']);
	} else echo 'Entrez la cible !<br>';
	?>
</body>

</html>