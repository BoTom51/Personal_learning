<?php /////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////// PAGE POUR LA RECHERCHE ET LES LISTES ARTICLES/COURS/EXERCICES //////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
require_once '../config.php';
require_once SERVEUR_ROOT . '/includes/class/Autoloader.php';
Autoloader::register(); //charge automatiquement tous les fichers de class a leur appel
require_once SERVEUR_ROOT . '/includes/session.php';
if (be_connect()) $connected = true;
else $connected = false;
// echo '<pre>'; var_dump($_SESSION); echo '</pre><<< SESSION >>>';//-----------------
?>
<!DOCTYPE html>
<html lang="fr">
<!-- //////////////////////////////////// HEAD //////////////////////////////////// -->
<?php require_once SERVEUR_ROOT . '/includes/head.php'; ?>

<!-- //////////////////////////////////// BODY //////////////////////////////////// -->

<body>
<?php if($connected) : ?>
	<script>
		let id_user = <?= $_SESSION['Id'] ?>; //----------------> BEURK
	</script>
<?php endif ?>
	<!-- //////////////////////////////////// HEADER //////////////////////////////////// -->
	<?php require_once SERVEUR_ROOT . '/includes/header.php'; ?>

	<!-- //////////////////////////////////// CONTENT //////////////////////////////////// -->
	<main class="content">

		<h2>Recherche avancée</h2>

		<!-- //////////////////////////////////// BARRE DE NAV RECHERCHE //////////////////////////////////// -->
		<nav class="recherche">
			<!-- //////// FORMULAIRE //////// -->
			<form id="formSearch" class="formSearch" action="" method="post">
				<input id="inputSearch" type="text" name="key_word" placeholder="Mots-clés ..." value="<?= empty($_POST['key_word']) ? "" : $_POST['key_word']; ?>">
				<input class="btn" type="submit" value="Lancer">
			</form>

			<!-- //////// Interface de liste //////// -->
			<div class="interface_mode">
				<img title="Mosaïque" class="alignMosaic" src="<?= ROOT_URL; ?>/assets/icon/mosaic.png" alt="Mosaïque" id="alignMosaic">
				<img title="Colonne" class="alignColumn" src="<?= ROOT_URL; ?>/assets/icon/column.png" alt="Colonne" id="alignColumn">
			</div>

			<!-- //////// filtres dynamiques //////// -->
			<ul id="global_filters" class="global_filters">
				<li>
					<input class="filter_category" id="articles" form="formSearch" type="checkbox" name="articles" value="articles" <?= isset($_POST['articles']) ? 'checked' : '' ?>>
					<label for="articles">Articles</label>
				</li>
				<li>
					<input class="filter_category" id="lessons" form="formSearch" type="checkbox" name="lessons" value="lessons" <?= isset($_POST['lessons']) ? 'checked' : '' ?>>
					<label for="lessons">Cours</label>
				</li>
				<li>
					<input class="filter_category" id="exercices" form="formSearch" type="checkbox" name="exercices" value="exercices" <?= isset($_POST['exercices']) ? 'checked' : '' ?>>
					<label for="exercices">Exercices</label>
				</li>
			</ul>

			<ul id="filters" class="filters">
				<?php $database = new Database(); // ACCES BDD
				$prep_sqlCatego = $database->myPrepare("SELECT * FROM categories");
				$resCatego = $database->myExecute($prep_sqlCatego, [""])->fetchAll();
				$prep_sqlCatego = null; ?>

				<?php for ($i = 0; $i < count($resCatego); $i++) : ?>
					<?php // Si la checkbox a été check ... on conserve le check
					if (isset($_POST["category_" . ($i + 1)])) : ?>
						<li>
							<input class="filter_category" form="formSearch" type="checkbox" name="category_<?= $i + 1; ?>" id="categorie<?= $i + 1; ?>" value="<?= $resCatego[$i]['Id_category']; ?>" checked>
							<label for="categorie<?= $i + 1; ?>"><?= utf8_encode($resCatego[$i]['Category_name']); ?></label>
						</li>
					<?php else : ?>
						<li>
							<input class="filter_category" form="formSearch" type="checkbox" name="category_<?= $i + 1; ?>" id="categorie<?= $i + 1; ?>" value="<?= $resCatego[$i]['Id_category']; ?>">
							<label for="categorie<?= $i + 1; ?>"><?= utf8_encode($resCatego[$i]['Category_name']); ?></label>
						</li>
					<?php endif; ?>
				<?php endfor; ?>
			</ul>

			<!-- //////// pages dynamiques //////// -->
			<ul id="pages" class="pages"></ul>
		</nav>

		<!-- //////// LISTE DES RESULTATS DE LA RECHERCHE //////// -->
		<list class="list list_mosaic">
			<?php ////////////////////////////////////////////////////////////////////////
			//////////////////////// TRAITEMENT REQUETE FORMULAIRE ///////////////////////

			// echo '<pre>';var_dump($_POST);echo '</pre><br><<< POST >>>'; //-----------------
			$dbTable = $finalResult = [];
			// Recherche ciblé
			if (isset($_POST['articles'])) $dbTable[] = 'articles';
			if (isset($_POST['lessons'])) $dbTable[] = 'lessons';
			if (isset($_POST['exercices'])) $dbTable[] = 'exercices';
			// SINON recherche globale
			if (count($dbTable) === 0) $dbTable = ['articles', 'lessons', 'exercices'];

			//////// REQUETE DE PREMIER CHARGEMENT DE PAGE => affiche tous les articles/cours/exercices ////////
			if (count($_POST) === 0 || ($_POST["key_word"] === "" && count($_POST) === 1)) {

				for ($i = 0; $i < count($dbTable); $i++) {
					if ($dbTable[$i] === 'articles') $sql = "SELECT * FROM " . $dbTable[$i] . " NATURAL JOIN categories NATURAL JOIN sub_categories NATURAL JOIN formations NATURAL JOIN niveaux ORDER BY Date DESC";
					else $sql = "SELECT * FROM " . $dbTable[$i] . " NATURAL JOIN categories NATURAL JOIN sub_categories NATURAL JOIN formations NATURAL JOIN niveaux NATURAL JOIN packages ORDER BY Date DESC";

					$prep_sqlAccueil = $database->myPrepare($sql);
					// echo '<pre>';var_dump($prep_sqlAccueil);echo '</pre><br><<< SQL >>>'; //-----------------
					$res = $database->myExecute($prep_sqlAccueil, [""])->fetchAll(PDO::FETCH_ASSOC);
					// echo '<pre>'; var_dump($res);	echo '</pre><br><<< RES >>>'; //-----------------
					$finalResult = array_merge($finalResult, $res);
					// echo '<pre>'; var_dump($finalResult);	echo '</pre><br><<< RES >>>'; //-----------------
				}
				$prep_sqlAccueil = $res = $sql = null;

				shuffle($finalResult); // mélange aléatoire des objets du tableau pour un affichage varié
			}
			//////// REQUETE RECHERCHE ////////
			else {
				$tabCatego = $finalResult = array();

				// comptabiliser les categories selectionné 
				for ($i = 0; $i < count($resCatego); $i++) {
					if (isset($_POST["category_" . ($i + 1)])) $tabCatego[] = $_POST["category_" . ($i + 1)];
				}

				for ($y = 0; $y < count($dbTable); $y++) {
					if ($dbTable[$y] === 'articles') $sql = "SELECT * FROM " . $dbTable[$y] . " NATURAL JOIN categories NATURAL JOIN sub_categories NATURAL JOIN formations NATURAL JOIN niveaux";
					else $sql = "SELECT * FROM " . $dbTable[$y] . " NATURAL JOIN categories NATURAL JOIN sub_categories NATURAL JOIN formations NATURAL JOIN niveaux NATURAL JOIN packages";

					// echo '<pre>';var_dump($dbTable[$i]);var_dump($dbTable);echo '</pre><br><<< DATA >>>'; //-----------------
					$sql .= " WHERE";
					// iclure les categories
					if (count($tabCatego) === 0) $valCatego = "";
					else $valCatego = " Id_category IN ('" . implode("', '", $tabCatego) . "')";

					// Prend la chaine de caractere en entrée
					if ($valCatego !== "" && $_POST['key_word'] !== "") $sql .= $valCatego . " AND (Title LIKE ? OR Content LIKE ?)";
					elseif ($valCatego === "" && $_POST['key_word'] !== "") $sql .= $valCatego . " (Title LIKE ? OR Content LIKE ?)";
					else $sql .= $valCatego;

					$prep_sql = $database->myPrepare($sql);
					// var_dump($prep_sql);echo '<br><<< SQL >>>'; //-----------------

					if ($_POST['key_word'] === "") $res = $database->myExecute($prep_sql, [""])->fetchAll(PDO::FETCH_ASSOC);
					else $res = $database->myExecute($prep_sql, ["%" . utf8_decode($_POST['key_word']) . "%", "%" . utf8_decode($_POST['key_word']) . "%"])->fetchAll(PDO::FETCH_ASSOC);

					// echo'<<< BOUCLE '.$y.' >>>'; //-----------------
					$finalResult = array_merge($finalResult, $res);
					// echo '<pre>'; var_dump($finalResult);	echo '</pre><br><<< RES >>>'; //-----------------
				}
				$prep_sql = null;

				///////////// TRAITEMENT DES RESULTATS => COMPILATION CELON FILTRE DANS UN TABLEAU GENERIQUE

			}
			?>

			<!-- //////// RESULTAT DE LA RECHERCHE (CARTES) //////// -->
			<?php if (count($finalResult) === 0)  echo '<span class="query_display">Aucune correspondance trouvé ...</span>'; ?>

			<?php for ($i = 0; $i < count($finalResult); $i++) : 
				// RECUP DES ID AVEC LA BONNE CORRESPONDANCE DE TABLE
				$type = $id = '';
				if (isset($finalResult[$i]['Id_article'])) {
					$type = 'articles';
					$id = $finalResult[$i]['Id_article'];
				} elseif (isset($finalResult[$i]['Id_lesson'])) {
					$type = 'lessons';
					$id = $finalResult[$i]['Id_lesson'];
				} elseif (isset($finalResult[$i]['Id_exercice'])) {
					$type = 'exercices';
					$id = $finalResult[$i]['Id_exercice'];
				}
				// CONSTRUCTION HTML DE LA 'CARTE'
				?>
				<card class="card card_mosaic">
					<a class="lien_recomm" href="<?= ROOT_URL . "/front/fiche.php?id=" . $id . "&type=" . $type ?>">
						<img src="<?= ROOT_URL . "/assets/img/" . utf8_encode($finalResult[$i]['Picture']) . ".jpg" ?>" alt="<?= utf8_encode($finalResult[$i]['Title']); ?>">
						<info class="block_info">
							<h3><?= utf8_encode($finalResult[$i]['Title']); ?></h3>
							<describe class="describe"><?= utf8_encode(substr($finalResult[$i]['Describ'], 0, 180)) . ' ...'; ?></describe>
							<strong class="category"><?= utf8_encode($finalResult[$i]['Category_name']); ?></strong>
							<strong class="sub_category"><?= utf8_encode($finalResult[$i]['Sub_category_name']); ?></strong>
							<strong class="formation"><?= utf8_encode($finalResult[$i]['Formation_name']); ?></strong>
							<strong class="niveau"><?= utf8_encode($finalResult[$i]['Niveau_name']); ?></strong>
							<strong class="article_date"><?= utf8_encode($finalResult[$i]['Date']); ?></strong>
							
							<?php if (isset($finalResult[$i]['Price_package'])) : ?>
								<?php if ($finalResult[$i]['Price_package'] !== '0') : ?>
									<strong class="product_price">PACKAGE : <?= utf8_encode($finalResult[$i]['Price_package']); ?>&euro;</strong>
								<?php else : ?>
									<strong class="product_price"><?= utf8_encode($finalResult[$i]['Price']); ?>&euro;</strong>
								<?php endif; ?>
							<?php endif; ?>
						</info>
					</a>
				</card>
			<?php endfor; ?>

		</list>

	</main>

	<!-- //////////////////////////////////// FOOTER //////////////////////////////////// -->
	<?php require_once SERVEUR_ROOT . '/includes/footer.php'; ?>

	<!-- JAVA SCRIPT -->

	<?php require_once SERVEUR_ROOT . '/includes/scripts.php'; ?>
</body>

</html>