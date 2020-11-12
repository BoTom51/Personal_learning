<?php ///////////////// GESTION OBJET / REQUETE /////////////////
$database = new Database(); // ACCES BDD

// REQUETE DE l'ARTICLE
$sql = "SELECT * FROM articles NATURAL JOIN categories NATURAL JOIN sub_categories NATURAL JOIN formations NATURAL JOIN niveaux NATURAL JOIN packages WHERE Id_article = ?";
$prep_sqlArticle = $database->myPrepare($sql);
$resArticle = $database->myExecute($prep_sqlArticle, array($_GET['id']))->fetch(pdo::FETCH_ASSOC);

// REQUETE DES SUPPORTS PEDAGO (PACK) mis en avant dans l'articles
$dbTable = ['lessons', 'exercices'];
$package = [];

for ($i = 0; $i < count($dbTable); $i++) {
	$sql = "SELECT * FROM " . $dbTable[$i] . " NATURAL JOIN categories NATURAL JOIN sub_categories NATURAL JOIN formations NATURAL JOIN niveaux NATURAL JOIN packages WHERE Id_package = ?";
	$prep_sql = $database->myPrepare($sql);
	$resSupport = $database->myExecute($prep_sql, array($resArticle['Id_package']))->fetchAll(pdo::FETCH_ASSOC);
	$package = array_merge($package, $resSupport);
}
?>
<!-- BG IMG ARTICLE OU PACK EN PARALAXE -->

<article class="fiche">

	<h2><?= utf8_encode($resArticle['Title']); ?></h2>

	<!-- IMAGES ET LIENS VERS LES FICHES TECHNIQUES PLUS DETAILLEES DES DIFFERENTS ELEMENTS DU PACK -->
	<figure class="imgs_pack" data-nbImg="3">
		<?php for ($i = 0; $i < count($package); $i++) :
			$type = $id = '';
			if (isset($package[$i]['Id_lesson'])) {
				$type = 'lessons';
				$id = $package[$i]['Id_lesson'];
			} elseif (isset($package[$i]['Id_exercice'])) {
				$type = 'exercices';
				$id = $package[$i]['Id_exercice'];
			}
		?>
			<a class="lien_produit" title="<?= utf8_encode($package[$i]['Title']); ?>" href="<?= ROOT_URL . "/front/fiche.php?id=" . $id . "&type=" . $type ?>"><img src="<?= ROOT_URL . "/assets/img/" . utf8_encode($package[$i]['Picture']) . ".jpg" ?>" alt="<?= utf8_encode($package[$i]['Title']); ?>"></a>
		<?php endfor; ?>
		<figcaption class="legend">Liens images vers les elements du packages</figcaption>
	</figure>

	<!-- CATEGORIES DU PACK/ARTICLE -->
	<info class="block_info">
		<strong class="category"><?= utf8_encode($resArticle['Category_name']); ?></strong>
		<strong class="sub_category"><?= utf8_encode($resArticle['Sub_category_name']); ?></strong>
		<strong class="formation"><?= utf8_encode($resArticle['Formation_name']); ?></strong>
		<strong class="niveau"><?= utf8_encode($resArticle['Niveau_name']); ?></strong>
		<strong class="article_date"><?= utf8_encode($resArticle['Date']); ?></strong>
	</info>

	<!-- DESCRIPTION DU THEME ABORDE ET DU CONTENU DU PACK (OBJECTIFS, APPORT THEORIQUE/PRATIQUE, ETC...) -->
	<content class="content article"><?= utf8_encode($resArticle['Content']);	?></content>

	<!-- ACTIONS LIEES A L'ARTICLE -->
	<action class="action_ui">
		<?php if ($resArticle['Price_package'] !== '0') : ?>
			<strong class="price">PRIX DU PACKAGE : <?= utf8_encode($resArticle['Price_package']); ?> &euro;</strong>
		<?php else : ?>
			<strong class="price">PRIX DU SUPPORT : <?= utf8_encode($package[0]['Price']); ?> &euro;</strong>
		<?php endif; ?>

		<?php // si deja acheté, bouton lancer puis redirection biblio client 
		?>
		<span class="add_to_basket">Ajouter au Panier</span>
	</action>

</article>