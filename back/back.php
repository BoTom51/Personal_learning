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

		<h2>Interface d'administration du site</h2>

		<aside class="sous_menu">
			<div id="accordeon">Comptes</div>
			<div class="options">
				<span>Liste des comptes</span>
				<span>Créer</span>
				<span>Modifier</span>
				<span>Supprimer</span>
			</div>
			<div id="accordeon">Articles</div>
			<div class="options">
				<span>Liste des articles</span>
				<span>Créer</span>
				<span>Modifier</span>
				<span>Supprimer</span>
			</div>
			<div id="accordeon">Packages</div>
			<div class="options">
				<span>Liste des packages</span>
				<span>Créer</span>
				<span>Modifier</span>
				<span>Supprimer</span>
			</div>
		</aside>

		<div class="window">



		</div>

	</main>

	<!-- //////////////////////////////////// FOOTER //////////////////////////////////// -->
	<?php require_once SERVEUR_ROOT . '/includes/footer.php'; ?>

	<!-- JAVA SCRIPT -->
	<?php require_once SERVEUR_ROOT . '/includes/scripts.php'; ?>
</body>

</html>