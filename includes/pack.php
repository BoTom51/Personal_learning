<?php ///////////////// GESTION OBJET / REQUETE /////////////////
$database = new Database(); // ACCES BDD

// REQUETE DU PRODUIT
if ($_GET['type'] === 'lessons') $sql = "SELECT Id_lesson, Id_package FROM lessons WHERE Id_lesson = ?";
elseif ($_GET['type'] === 'exercices') $sql = "SELECT Id_exercice, Id_package FROM exercices WHERE Id_exercice = ?";
elseif ($_GET['type'] === 'packages' && isset($_SESSION['Id'])) $sql = false; // SI c'est pour consulter un pack de la bibliotheque
else header('Location: ' . SERVEUR_ROOT . "\/front/404.php");

if ($sql !== false) {
	$prep_sqlProduit = $database->myPrepare($sql);
	$resProduit = $database->myExecute($prep_sqlProduit, array($_GET['id']))->fetch(pdo::FETCH_ASSOC);
}

// REQUETE DU PACK
$dbTable = ['lessons', 'exercices'];
$package = $listImgInfo = [];

for ($i = 0; $i < count($dbTable); $i++) {
	$sql = "SELECT * FROM " . $dbTable[$i] . " NATURAL JOIN categories NATURAL JOIN sub_categories NATURAL JOIN formations NATURAL JOIN niveaux NATURAL JOIN packages WHERE Id_package = ?";
	$prep_sql = $database->myPrepare($sql);
	// SI c'est pour consulter un pack de la bibliotheque ... SINON requete normal
	if ($_GET['type'] === 'packages' && isset($_SESSION['Id'])) $resSupport = $database->myExecute($prep_sql, array($_GET['id']))->fetchAll(pdo::FETCH_ASSOC);
	else $resSupport = $database->myExecute($prep_sql, array($resProduit['Id_package']))->fetchAll(pdo::FETCH_ASSOC);
	$package = array_merge($package, $resSupport);

	if ($dbTable[$i] === 'lessons') $nbLessons = count($resSupport);
	else $nbExercices = count($resSupport);
}
$nbMediums = count($package);
$type = substr($_GET['type'], 0, count(str_split($_GET['type'])) - 1); // type du support

for ($i = 0; $i < count($package); $i++) $listImgInfo[$i] = $package[$i]['Picture'];
?>

<article class="fiche">

	<!-- SELECTIONS DES ELEMENTS DU PACK -->
	<figure class="imgs_pack">
		<?php for ($i = 0; $i < count($listImgInfo); $i++) : ?>
			<?php if ($type === 'package' && $i === 0) : ?>
				<img class="lien_produit selection selected" title="<?= utf8_encode($package[$i]['Title']); ?>" src="<?= ROOT_URL . "/assets/img/" . utf8_encode($package[$i]['Picture']) . ".jpg" ?>" alt="<?= utf8_encode($package[$i]['Title']); ?>" />
			<?php elseif ((isset($package[$i]['Id_' . $type])) && ($package[$i]['Id_' . $type] === $_GET['id']) && ($type !== 'package')) : ?>
				<img class="lien_produit selection selected" title="<?= utf8_encode($package[$i]['Title']); ?>" src="<?= ROOT_URL . "/assets/img/" . utf8_encode($package[$i]['Picture']) . ".jpg" ?>" alt="<?= utf8_encode($package[$i]['Title']); ?>" />
			<?php else : ?>
				<img class="lien_produit selection" title="<?= utf8_encode($package[$i]['Title']); ?>" src="<?= ROOT_URL . "/assets/img/" . utf8_encode($package[$i]['Picture']) . ".jpg" ?>" alt="<?= utf8_encode($package[$i]['Title']); ?>" />
			<?php endif; ?>
		<?php endfor; ?>
		<figcaption class="legend">Liste des elements du package</figcaption>
	</figure>

	<!-- CATEGORIES DU PACK/ARTICLE -->
	<info class="block_info">
		<strong class="category"><?= utf8_encode($package[0]['Category_name']); ?></strong>
		<strong class="sub_category"><?= utf8_encode($package[0]['Sub_category_name']); ?></strong>
		<strong class="formation"><?= utf8_encode($package[0]['Formation_name']); ?></strong>
		<strong class="niveau"><?= utf8_encode($package[0]['Niveau_name']); ?></strong>
		<strong class="article_date"><?= utf8_encode($package[0]['Date']); ?></strong>
	</info>

	<?php ////////// REQUETE ARTICLE CORRESPONDANT AU PACK/PRODUIT //////////
	$prep_sqlArticle = $database->myPrepare("SELECT Id_article, Title FROM articles WHERE Id_package = ?");
	if ($_GET['type'] === 'packages') $resArticle = $database->myExecute($prep_sqlArticle, array($_GET['id']))->fetch(pdo::FETCH_ASSOC);
	else $resArticle = $database->myExecute($prep_sqlArticle, array($resProduit['Id_package']))->fetch(pdo::FETCH_ASSOC);

	?>

	<!-- VISUEL RAPIDE DU NB ET TYPE DE SUPPORT -->
	<div class="counter_medium"><span>Fait partie d'un package de <?= $nbMediums ?> supports</span><span>Cours : <?= $nbLessons ?></span><span>Exercices : <?= $nbExercices ?></span></div>

	<!-- LIEN VERS L'ARTICLE DE PRESENTATION -->
	<span class="lien_article">Voir la présentation dans l'article :<a href="<?= ROOT_URL . "/front/fiche.php?id=" . $resArticle['Id_article'] . "&type=articles" ?>"><?= utf8_encode($resArticle['Title']); ?></a></span>

	<!-- DESCRIPTION TECHNIQUE DU CONTENU -->
	<ul class="list_elem_pack">
		<?php for ($i = 0; $i < count($package); $i++) : ?>

			<?php if (($type === 'package') && $i === 0) : ?>
				<li class="selected">
					<!-- SOMMAIRE DES SUPPORTS / LISTE DES CHOSES ABORDEES / AUTRES DETAILS -->
					<content class="content pack"><?= utf8_encode($package[$i]['Content']);	?></content>
				</li>
			<?php elseif ((isset($package[$i]['Id_' . $type])) && ($package[$i]['Id_' . $type] === $_GET['id']) && ($type !== 'package')) : ?>
				<li class="selected">
					<!-- SOMMAIRE DES SUPPORTS / LISTE DES CHOSES ABORDEES / AUTRES DETAILS -->
					<content class="content pack"><?= utf8_encode($package[$i]['Content']);	?></content>
				</li>
			<?php else : ?>
				<li>
					<content class="content pack"><?= utf8_encode($package[$i]['Content']);	?></content>
				</li>
			<?php endif; ?>

		<?php endfor; ?>
	</ul>

	<!-- ACTIONS LIEES AU PRODUIT -->
	<action class="action_ui">
		<?php if ($package[0]['Price_package'] !== '0') : ?>
			<strong class="price">PRIX DU PACKAGE : <?= utf8_encode($package[0]['Price_package']); ?> &euro;</strong>
		<?php else : ?>
			<strong class="price">PRIX DU SUPPORT : <?= utf8_encode($package[0]['Price']); ?> &euro;</strong>
		<?php endif; ?>

		<?php if ($connected) : ?>

			<?php  // SI dans la biblio, bouton lancer + redirection biblio client
			if ($type === 'package') $packHere = ['Id_package' => $_GET['id']];
			else if($type === 'article' || $type === 'lesson' || $type === 'exercice') $packHere = $panier->selectPackageFromProduct($_GET['id'], $_GET['type']);
			$inLibrary = $inBasket = false;
			for ($i = 0; $i < count($_SESSION['Bibliotheque']['idPack']); $i++) {
				if ($_SESSION['Bibliotheque']['idPack'][$i] === $packHere['Id_package']) $inLibrary = true;
			}
			// SI deja dans le panier, bouton désactivé
			for ($i = 0; $i < count($_SESSION['Panier']['idPack']); $i++) {
				if ($_SESSION['Panier']['idPack'][$i] === $packHere['Id_package']) $inBasket = true;
			}
			?>

			<?php if ($inLibrary) : ?>
				<span class="play_medium">Lancer</span>
			<?php elseif ($inBasket) : ?>
				<span class="add_to_basket disabled">Ajouter au Panier</span>
			<?php else : ?>
				<span class="add_to_basket">Ajouter au Panier</span>
			<?php endif ?>

		<?php endif ?>

	</action>

</article>