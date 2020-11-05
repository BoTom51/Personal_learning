<?php /////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////// PAGE POUR LA RECHERCHE ET LES LISTES ARTICLES/COURS/EXERCICES //////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
require_once '../config.php';
require_once SERVEUR_ROOT . '/includes/class/Autoloader.php';
Autoloader::register(); //charge automatiquement tous les fichers de class a leur appel
require_once SERVEUR_ROOT . '/includes/session.php';
// echo '<pre>'; var_dump($_SESSION); echo '</pre><<< SESSION >>>';//-----------------
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

		<h2>Recherche<?= ($_GET['action'] === 'lessons') ? ' de cours' : ' d\'' . $_GET['action']; ?></h2>

		<nav class="recherche">
			<!-- //////// FORMULAIRE //////// -->
			<form id="formSearch" class="formSearch" action="" method="post">
				<input type="text" name="key_word" id="inputSearch" placeholder="Mots-clés ..." value="<?= empty($_POST['key_word']) ? "" : $_POST['key_word']; ?>">
				<input class="btn" type="submit" value="Lancer">
			</form>

			<!-- //////// Interface de liste //////// -->
			<div class="interface_mode">
				<img title="Mosaïque" class="alignMosaic" src="<?= ROOT_URL; ?>/assets/icon/mosaic.png" alt="Mosaïque" id="alignMosaic">
				<img title="Colonne" class="alignColumn" src="<?= ROOT_URL; ?>/assets/icon/column.png" alt="Colonne" id="alignColumn">
			</div>

			<!-- //////// filtres dynamiques //////// -->
			<ul id="filters" class="filters">
				<?php $database = new Database();
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

			if ($_GET['action'] === 'articles') $dbTable = 'articles';
			elseif ($_GET['action'] === 'lessons') $dbTable = 'lessons';
			elseif ($_GET['action'] === 'exercices') $dbTable = 'exercices';
			elseif ($_GET['action'] === 'global') {$dbTableArticles = 'articles'; $dbTable = 'lessons, exercices';}
			echo '<pre>'; var_dump($_POST); echo '</pre><br><<< POST >>>';//-----------------

			//////// REQUETE DE PREMIER CHARGEMENT DE PAGE => affiche tous les articles/cours/exercices ////////
			if ($_GET['action'] !== 'global' && (count($_POST) === 0 || ($_POST["key_word"] === "") && count($_POST) === 1)) {
				if($_GET['action'] === 'articles') $sql = "SELECT * FROM " . $dbTable . " NATURAL JOIN categories NATURAL JOIN sub_categories NATURAL JOIN formations NATURAL JOIN niveaux ORDER BY Id DESC";
				else $sql = "SELECT * FROM " . $dbTable . " NATURAL JOIN categories NATURAL JOIN sub_categories NATURAL JOIN formations NATURAL JOIN niveaux NATURAL JOIN packages ORDER BY Id DESC";
				$prep_sqlAccueil = $database->myPrepare($sql);
				echo '<pre>'; var_dump($prep_sqlAccueil);	echo '</pre><br><<< SQL >>>';//-----------------
				$res = $database->myExecute($prep_sqlAccueil, [""])->fetchAll();
				// echo '<pre>'; var_dump($res);	echo '</pre><br><<< RES >>>';  exit();//-----------------
				$prep_sqlAccueil = null;
			}
			//////// REQUETE RECHERCHE ////////
			elseif (count($_POST) !== 0) {
				$tabCatego = $res = array();
				$sqlGlobale = "SELECT * FROM " . $dbTable;

				// Si c'est une requete uniqement pour les articles ...
				if($dbTable === 'articles') $sqlGlobale .= " NATURAL JOIN categories NATURAL JOIN sub_categories NATURAL JOIN formations NATURAL JOIN niveaux";
				// SINON SI c'est une requete comprenant les articles ... on fait une requete séparement
				elseif(isset($dbTableArticles)) {
					$sqlArticles = $sqlGlobale;
					$sqlArticles .= " NATURAL JOIN categories NATURAL JOIN sub_categories NATURAL JOIN formations NATURAL JOIN niveaux";
					$prep_sqlArticles = $database->myPrepare($sqlArticles);
					var_dump($prep_sqlGlobale); echo '<br><<< SQL >>>'; //-----------------
					$res = $database->myExecute($prep_sqlArticles, ["%".utf8_decode($_POST['key_word'])."%","%".utf8_decode($_POST['key_word'])."%"])->fetchAll();
					$prep_sqlArticles = null;
					echo '<pre>'; var_dump($res);	echo '</pre><br><<< RES >>>'; //-----------------

					// Requete pour les autres tables
					$sqlGlobale .= " NATURAL JOIN categories NATURAL JOIN sub_categories NATURAL JOIN formations NATURAL JOIN niveaux NATURAL JOIN packages";
				}
				// SINON ... Requete pour les autres tables
				else $sqlGlobale .= " NATURAL JOIN categories NATURAL JOIN sub_categories NATURAL JOIN formations NATURAL JOIN niveaux NATURAL JOIN packages";
				
				$sqlGlobale .= " WHERE";
				// Prend en compte les categories selectionné 
				for ($i = 0; $i < count($resCatego); $i++) {
					if(isset($_POST["category_".($i+1)])) $tabCatego[] = $_POST["category_".($i+1)];
				}
				if (count($tabCatego) === 0) $valCatego = "";
				else $valCatego = " Id_category IN ('". implode("', '", $tabCatego) ."')";

				// Prend la chaine de caractere en entrée
				if($valCatego !== "" && $_POST['key_word'] !== "" ) $sqlGlobale .= $valCatego . " AND (Title LIKE ? OR Content LIKE ?)";
				elseif($valCatego === "" && $_POST['key_word'] !== "" ) $sqlGlobale .= $valCatego . " (Title LIKE ? OR Content LIKE ?)";
				else $sqlGlobale .= $valCatego;

				$prep_sqlGlobale = $database->myPrepare($sqlGlobale);
				var_dump($prep_sqlGlobale); echo '<br><<< SQL >>>'; //-----------------
				if($_POST['key_word'] === "") $res += $database->myExecute($prep_sqlGlobale, [""])->fetchAll();
				else $res += $database->myExecute($prep_sqlGlobale, ["%".utf8_decode($_POST['key_word'])."%","%".utf8_decode($_POST['key_word'])."%"])->fetchAll();
				// echo '<pre>'; var_dump($res);	echo '</pre><br><<< RES >>>'; //-----------------
				$prep_sqlGlobale = null;


				///////////// TRAITEMENT DES RESULTATS => COMPILATION CELON FILTRE DANS UN TABLEAU GENERIQUE
			}
			?>

			<!-- //////// RESULTAT DE LA RECHERCHE (CARTES) //////// -->
			<?php for ($i = 0; $i < count($res); $i++) : ?>
				<card class="card card_mosaic">
					<a class="lien_recomm" href="<?= ROOT_URL; ?>/front/fiche.php?id=<?= utf8_encode($res[$i]['Id']); ?>">
						<img src="<?= ROOT_URL; ?>/assets/img/<?= utf8_encode($res[$i]['Picture']); ?>.jpg" alt="<?= utf8_encode($res[$i]['Title']); ?>">
						<info class="block_info">
							<h3><?= utf8_encode($res[$i]['Title']); ?></h3>
							<describ class="describ"><?= utf8_encode(substr($res[$i]['Content'], 0, 180)) . ' ...'; ?></describ>
							<strong class="category"><?= utf8_encode($res[$i]['Category_name']); ?></strong>
							<strong class="sub_category"><?= utf8_encode($res[$i]['Sub_category_name']); ?></strong>
							<strong class="formation"><?= utf8_encode($res[$i]['Formation_name']); ?></strong>
							<strong class="niveau"><?= utf8_encode($res[$i]['Niveau_name']); ?></strong>
							<strong class="article_date"><?= utf8_encode($res[$i]['Date']); ?></strong>
							<?php if(isset($res[$i]['Price'])) : ?>
								<?php if($res[$i]['Num_package'] !== '0') : ?>
									<strong class="product_price">PACKAGE : <?= utf8_encode($res[$i]['Price']); ?>&euro;</strong>
								<?php else : ?>
								<strong class="product_price"><?= utf8_encode($res[$i]['Price']); ?>&euro;</strong>
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