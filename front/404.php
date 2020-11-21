<?php ////////////////////////////////////////////////////////////////////////////////////////
////////////////////// PAGE POUR CONSULTER LES ARTICLES/COURS/EXERCICES //////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////
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
	<?php if ($connected) : ?>
		<script>
			let id_user = <?= $_SESSION['Id'] ?>; //----------------> BEURK
		</script>
	<?php endif ?>
	<!-- //////////////////////////////////// HEADER //////////////////////////////////// -->
	<?php require_once SERVEUR_ROOT . '/includes/header.php'; ?>

	<!-- //////////////////////////////////// CONTENT //////////////////////////////////// -->
	<main class="content">

		<div style="font-size: 50px; font-weight:bolder; height:500px; width:350px; display:flex; align-items:center; justify-content:center;">Erreur 404</div>

	</main>

	<!-- //////////////////////////////////// FOOTER //////////////////////////////////// -->
	<?php require_once SERVEUR_ROOT . '/includes/footer.php'; ?>

	<!-- JAVA SCRIPT -->
	<?php require_once SERVEUR_ROOT . '/includes/scripts.php'; ?>
</body>

</html>