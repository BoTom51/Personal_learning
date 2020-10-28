<?php
require_once './config.php';
require_once './includes/class/Autoloader.php';
Autoloader::register(); //charge automatiquement tous les fichers de class a leur appel
require_once './includes/session.php';
require_once './includes/functions/functions_carrousel.php';
if (session_status() === PHP_SESSION_NONE) session_start(); // Ouvre la session si pas deja ouverte
// echo '<pre>'; var_dump($_SESSION); echo '</pre><<< SESSION >>>';//-----------------
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Accueil</title>
	<link rel="stylesheet" href="./assets/css/document.css" />
	<link rel="stylesheet" href="./assets/css/header.css">
	<link rel="stylesheet" href="./assets/css/main.css">
	<link rel="stylesheet" href="./assets/css/footer.css">
	<link rel="stylesheet" href="./assets/css/carrousel.css" />
	<link rel="stylesheet" href="./assets/css/list.css" />
</head>

<body>
	<!-- //////////////////////////////////// HEADER //////////////////////////////////// -->
	<?php require_once './includes/header.php'; ?>

	<!-- //////////////////////////////////// CONTENT //////////////////////////////////// -->
	<main class="content">
		<?php //// recupération les elements a afficher pour les carrousels celon le nombre définie
		$database = new Database();
		$listImgInfo = [];
		// $dbTables = ['articles','products'];
		$dbTables = ['articles', 'articles'];
		$nbsImg = [HOMEPAGE_NUM_ARTICLES, HOMEPAGE_NUM_PRODUCTS];
		for ($i = 0; $i < count($dbTables); $i++) {
			$listImgInfo[$i] = getCarrouselImg($database, $dbTables[$i], $nbsImg[$i]);
		}

		//// recupération les elements a afficher en recommendations celon le nombre définie
		$prep_sql = $database->myPrepare("SELECT Id, Title, Picture, Content FROM articles WHERE Id_sub_category = :sub LIMIT :limit");
		$prep_sql->bindValue('limit', HOMEPAGE_NUM_RECOM, PDO::PARAM_INT);
		$prep_sql->bindValue('sub', 4, PDO::PARAM_INT);
		// echo '<pre>'; var_dump($prep_sql); echo '</pre>';
		$database->myExecute($prep_sql, array());
		$res = $prep_sql->fetchAll();
		$prep_sql = null;
		?>


		<h2>Actualités</h2>
		<!-- /////////////// CARROUSEL DES ARTICLES RECENTS /////////////// -->
		<carousel id="carousel" class="carousel" data-imgPerFrame="2" data-pasDuSlide="2">
			<!-- ---------------- ECRAN ---------------- -->
			<div id="rail" class="slides">
				<!-- SELECTION NB IMG selon la variable prédef et le chemin sera crée dynamiquement (nom img BDD) -->
				<?php for ($i = 0; $i < count($listImgInfo[0]); $i++) : ?>
					<a class="slide" href="./front/fiche.php?id=<?= utf8_encode($listImgInfo[0][$i]['Id']); ?>"><img src="./assets/img/<?= utf8_encode($listImgInfo[0][$i]['Picture']); ?>.jpg" alt="<?= utf8_encode($listImgInfo[0][$i]['Title']); ?>" /></a>
				<?php endfor; ?>
			</div>
			<!-- ---------------- INTERFACE ---------------- -->
			<div id="btnPrec" class="precedent fleche gauche">◀</div>
			<div id="btnSuiv" class="suivant fleche droite">▶</div>
			<!-- <div class="indicators"></div> -->
			<!-- <span class="legende"></span> -->
		</carousel>


		<h2>Nouveautés</h2>
		<!-- /////////////// CARROUSEL DES PRODUITS RECENTS /////////////// -->
		<carousel id="carousel" class="carousel" data-imgPerFrame="4" data-pasDuSlide="4">
			<!-- ---------------- ECRAN ---------------- -->
			<div id="rail" class="slides">
				<?php for ($i = 0; $i < count($listImgInfo[1]); $i++) : ?>
					<a class="slide" href="./front/fiche.php?id=<?= utf8_encode($listImgInfo[1][$i]['Id']); ?>"><img src="./assets/img/<?= utf8_encode($listImgInfo[1][$i]['Picture']); ?>.jpg" alt="<?= utf8_encode($listImgInfo[1][$i]['Title']); ?>" /></a>
				<?php endfor; ?>
			</div>
			<!-- ---------------- INTERFACE ---------------- -->
			<div id="btnPrec" class="precedent fleche gauche">◀</div>
			<div id="btnSuiv" class="suivant fleche droite">▶</div>
			<!-- <div class="indicators"></div> -->
			<!-- <span class="legende"></span> -->
		</carousel>


		<!-- UNIQUEMENT SI CONNECTÉ -->
		<?php if (be_connect()) : ?>
			<h2>Recommandations</h2>
			
			<list class="list horizontal">
				<?php for ($i = 0; $i < count($res); $i++) : ?>
					<card class="card">
						<a href="./front/fiche.php?id=<?= utf8_encode($res[$i]['Id']); ?>">
							<img src="./assets/img/<?= utf8_encode($res[$i]['Picture']); ?>.jpg" alt="<?= utf8_encode($res[$i]['Title']); ?>">
							<h3><?= utf8_encode($res[$i]['Title']); ?></h3>
							<describ class="describ"><?= utf8_encode(substr($res[$i]['Content'], 0, 180)) . '...'; ?></describ>
						</a>
					</card>
				<?php endfor; ?>
			</list>
		<?php endif ?>
	</main>

	<!-- //////////////////////////////////// FOOTER //////////////////////////////////// -->
	<?php require_once './includes/footer.php'; ?>

	<!-- JAVA SCRIPT -->
	<script src="./assets/js/carrousel.js"></script>
</body>

</html>