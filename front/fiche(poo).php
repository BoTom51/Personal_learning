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

		<?php ///////////////// GESTION OBJET / REQUETE /////////////////
		$database = new Database(); // ACCES BDD

		// Creation de l'objet représentant l'article ou le produit a consulter par le GET['type'] article/product
		if ($_GET['type'] === 'product') $item = new Product($database);
		elseif ($_GET['type'] === 'article') $item = new Article($database);

		// REQUETE SELECT avec l'ID en GET['id']
		$item->selectItem($_GET['id']);
		?>

		<article>

			<h2><?= $item->getTitle(); ?></h2>

			<img src="<?= ROOT_URL; ?>/assets/img/<?= $item->getImg(); ?>.jpg" alt="<?= $item->getTitle(); ?>">

			<info class="block_info">
				<strong class="category"><?= $item->getCategory(); ?></strong>
				<strong class="sub_category"><?= $item->getSubCategory(); ?></strong>
				<strong class="formation"><?= $item->getFormation(); ?></strong>
				<strong class="niveau"><?= $item->getNiveau(); ?></strong>
				<strong class="article_date"><?= $item->getDate(); ?></strong>
			</info>

			<describ class="describ"><?= $item->getContent(); ?></describ>

			<?php if ($_GET['type'] === 'product') : ?>
				<?php if ($item->getPackage() !== '0') : ?>
					<strong class="product_price">PACKAGE : <?= $item->getPackagePrice(); ?>&euro;</strong>
				<?php else : ?>
					<strong class="product_price"><?= $item->getPrice(); ?>&euro;</strong>
				<?php endif; ?>

				<button class="add_to_basket">Ajouter au Pannier</button>
			<?php endif; ?>

		</article>

		<!-- <details>
		<summary>Epcot Center</summary>
		<p>Epcot is a theme park at Walt Disney World Resort featuring exciting attractions, international pavilions, award-winning fireworks and seasonal special events.</p>
		</details>

		<p><dfn>HTML</dfn> is the standard markup language for creating web pages.</p> -->

	</main>

	<!-- //////////////////////////////////// FOOTER //////////////////////////////////// -->
	<?php require_once SERVEUR_ROOT . '/includes/footer.php'; ?>

	<!-- JAVA SCRIPT -->
	<?php require_once SERVEUR_ROOT . '/includes/scripts.php'; ?>
</body>

</html>