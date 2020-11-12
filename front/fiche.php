<?php ////////////////////////////////////////////////////////////////////////////////////////
////////////////////// PAGE POUR CONSULTER LES ARTICLES/COURS/EXERCICES //////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////
require_once '../config.php';
require_once SERVEUR_ROOT . '/includes/class/Autoloader.php';
Autoloader::register(); //charge automatiquement tous les fichers de class a leur appel
require_once SERVEUR_ROOT . '/includes/session.php';
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

		<?php 
		// MISE EN PAGE ARTICLE
		if ($_GET['type'] === 'articles') require SERVEUR_ROOT . '/includes/article.php';
		
		// MISE EN PAGE PRODUIT
		if ($_GET['type'] === 'lessons' || $_GET['type'] === 'exercices') require_once SERVEUR_ROOT . '/includes/pack.php';
		?>

	</main>

	<!-- //////////////////////////////////// FOOTER //////////////////////////////////// -->
	<?php require_once SERVEUR_ROOT . '/includes/footer.php'; ?>

	<!-- JAVA SCRIPT -->
	<?php require_once SERVEUR_ROOT . '/includes/scripts.php'; ?>
</body>

</html>