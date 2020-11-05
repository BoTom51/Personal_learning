<?php
require_once './includes/class/Autoloader.php';
Autoloader::register(); //charge automatiquement tous les fichers de class a leur appel
require_once './includes/session.php';
require_once './config.php';
require_once './includes/functions/functions_carrousel.php';
if (session_status() === PHP_SESSION_NONE) session_start(); // Ouvre la session si pas deja ouverte
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
		<?php //// recupération des objets a afficher pour les carrousels celon le nombre définie
		$database = new Database();
		$listImgInfo = [];
		$dbTables = ['articles', 'lessons', 'exercices'];
		$nbsImg = [HOMEPAGE_NUM_ARTICLES, HOMEPAGE_NUM_PRODUCTS];
		for ($i = 0; $i < count($dbTables); $i++) {
			if($i > 0) $listImgInfo[$i] = getCarrouselImg($database, $dbTables[$i], $nbsImg[1]);
			else $listImgInfo[$i] = getCarrouselImg($database, $dbTables[$i], $nbsImg[0]);
		}

		//// recupération les elements a afficher en recommendations celon le nombre définie
		// $prep_sql = $database->myPrepare("SELECT Id, Title, Picture, Content FROM articles WHERE Id_sub_category = :sub LIMIT :limit");
		$sql = "SELECT * FROM articles NATURAL JOIN categories NATURAL JOIN sub_categories NATURAL JOIN formations NATURAL JOIN niveaux WHERE Id_sub_category = :sub LIMIT :limit";
		$prep_sql = $database->myPrepare($sql);
		$prep_sql->bindValue('limit', HOMEPAGE_NUM_RECOM, PDO::PARAM_INT);
		$prep_sql->bindValue('sub', 2, PDO::PARAM_INT);
		// echo '<pre>'; var_dump($prep_sql); echo '</pre>'; //------------------------------
		$res = $database->myExecute($prep_sql, array())->fetchAll();
		$prep_sql = null;
		?>

		<h2>Actualités</h2>
		<!-- /////////////// CARROUSEL DES ARTICLES RECENTS /////////////// -->
		<carousel id="carousel" class="carousel" data-imgPerFrame="2" data-pasDuSlide="2">
			<!-- ---------------- ECRAN ---------------- -->
			<div id="rail" class="slides">
				<!-- SELECTION NB IMG selon la variable prédef et le chemin sera crée dynamiquement (nom img BDD) -->
				<?php for ($i = 0; $i < count($listImgInfo[0]); $i++) : ?>
					<a title="<?= utf8_encode($listImgInfo[0][$i]['Title']); ?>" class="slide" href="./front/fiche.php?id=<?= utf8_encode($listImgInfo[0][$i]['Id']); ?>"><img src="./assets/img/<?= utf8_encode($listImgInfo[0][$i]['Picture']); ?>.jpg" alt="<?= utf8_encode($listImgInfo[0][$i]['Title']); ?>" /></a>
				<?php endfor; ?>
			</div>
			<!-- ---------------- INTERFACE ---------------- -->
			<div class="zonefleche gauche"><div id="btnPrec" class="precedent fleche">◀</div></div>
			<div class="zonefleche droite"><div id="btnSuiv" class="suivant fleche">▶</div></div>
			<!-- <div class="indicators"></div> -->
			<!-- <span class="legende"></span> -->
		</carousel>


		<h2>Nouveautés</h2>
		<!-- /////////////// CARROUSEL DES PRODUITS RECENTS /////////////// -->
		<carousel id="carousel" class="carousel" data-imgPerFrame="4" data-pasDuSlide="4">
			<!-- ---------------- ECRAN ---------------- -->
			<div id="rail" class="slides">
				<?php for ($i = 0; $i < count($listImgInfo[1]); $i++) : ?>
					<?php if( $i < count($listImgInfo[1]) / 2 ) : ?>
						<a title="<?= utf8_encode($listImgInfo[1][$i]['Title']); ?>" class="slide" href="./front/fiche.php?id=<?= utf8_encode($listImgInfo[1][$i]['Id']); ?>"><img src="./assets/img/<?= utf8_encode($listImgInfo[1][$i]['Picture']); ?>.jpg" alt="<?= utf8_encode($listImgInfo[1][$i]['Title']); ?>" /></a>						
					<?php else : ?>
						<a title="<?= utf8_encode($listImgInfo[2][$i]['Title']); ?>" class="slide" href="./front/fiche.php?id=<?= utf8_encode($listImgInfo[2][$i]['Id']); ?>"><img src="./assets/img/<?= utf8_encode($listImgInfo[2][$i]['Picture']); ?>.jpg" alt="<?= utf8_encode($listImgInfo[2][$i]['Title']); ?>" /></a>
					<?php endif; ?>
				<?php endfor; ?>
			</div>
			<!-- ---------------- INTERFACE ---------------- -->
			<div class="zonefleche gauche"><div id="btnPrec" class="precedent fleche">◀</div></div>
			<div class="zonefleche droite"><div id="btnSuiv" class="suivant fleche">▶</div></div>
			<!-- <div class="indicators"></div> -->
			<!-- <span class="legende"></span> -->
		</carousel>


		<!-- UNIQUEMENT SI CONNECTÉ -->
		<?php if (be_connect()) : ?>
			<h2>Recommandations</h2>

			<list class="list list_mosaic">
				<?php for ($i = 0; $i < count($res); $i++) : ?>
					<card class="card card_mosaic">
						<a class="lien_recomm" href="./front/fiche.php?id=<?= utf8_encode($res[$i]['Id']); ?>">
							<img src="./assets/img/<?= utf8_encode($res[$i]['Picture']); ?>.jpg" alt="<?= utf8_encode($res[$i]['Title']); ?>">
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
									<strong class="product_price"><?= utf8_encode($res[$i]['Price']); ?></strong>
									<?php endif; ?>
								<?php endif; ?>
							</info>
						</a>
					</card>
				<?php endfor; ?>
			</list>

		<?php endif ?>

	</main>

	<!-- //////////////////////////////////// FOOTER //////////////////////////////////// -->
	<?php require_once SERVEUR_ROOT . '/includes/footer.php'; ?>

	<!-- JAVA SCRIPT -->
	<?php require_once SERVEUR_ROOT . '/includes/scripts.php'; ?>
</body>

</html>