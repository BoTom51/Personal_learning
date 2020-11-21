<?php ///////////////////////////////////////////////////
////////////////////// BACK OFFICE //////////////////////
/////////////////////////////////////////////////////////
require_once '../config.php';
require_once SERVEUR_ROOT . '/includes/class/Autoloader.php';
Autoloader::register(); //charge automatiquement tous les fichers de class a leur appel
require_once SERVEUR_ROOT . '/includes/session.php';
if (be_connect()) $connected = true;
else $connected = false;
?>
<!DOCTYPE html>
<html lang="fr">
<!-- //////////////////////////////////// HEAD //////////////////////////////////// -->
<?php require_once SERVEUR_ROOT . '/includes/head.php'; ?>

<!-- //////////////////////////////////// BODY //////////////////////////////////// -->

<body>
	<!-- //////////////////////////////////// HEADER //////////////////////////////////// -->
	<?php require_once SERVEUR_ROOT . '/includes/header.php'; ?>

	<!-- //////////////////////////////////// CONTENT //////////////////////////////////// -->
	<main class="content">

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
		echo '<pre>';
		var_dump($_POST);
		echo '</pre><<< POST >>><br>'; //-----------------

		if (isset($_POST['Login'])) {
			$form->signDown($_POST['Email']);
		} else echo 'Entrez la cible !<br>';
		?>

	</main>

	<!-- //////////////////////////////////// FOOTER //////////////////////////////////// -->
	<?php require_once SERVEUR_ROOT . '/includes/footer.php'; ?>

	<!-- JAVA SCRIPT -->
	<?php require_once SERVEUR_ROOT . '/includes/scripts.php'; ?>
</body>

</html>