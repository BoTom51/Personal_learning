<?php
define("NUM_ARTICLES", 4);

$database = new Database();
//// recupération les elements a afficher en recommendations celon le nombre définie
// $prep_sql = $database->myPrepare("SELECT Id, Title, Picture, Content FROM articles WHERE Id_sub_category = :sub LIMIT :limit");
$prep_sql = $database->myPrepare("SELECT Id, Title, Picture, Content FROM articles");
// $prep_sql->bindValue('limit', NUM_ARTICLES, PDO::PARAM_INT);
// $prep_sql->bindValue('sub', 4, PDO::PARAM_INT);
// $database->myExecute($prep_sql, array());
// echo '<pre>'; var_dump($prep_sql); echo '</pre>';
$database->myExecute($prep_sql,[""]);
$res = $prep_sql->fetchAll();
$prep_sql = null;
// echo '<pre>'; var_dump($res); echo '</pre>';
?>

<list class="list list_horizontal">
	<?php for ($i = 0; $i < count($res); $i++) : ?>
		<card class="card card_vertical">
			<a class="lien_recomm" href="./front/fiche.php?id=<?= utf8_encode($res[$i]['Id']); ?>">
				<img src="./assets/img/<?= utf8_encode($res[$i]['Picture']); ?>.jpg" alt="<?= utf8_encode($res[$i]['Title']); ?>">
				<h3><?= utf8_encode($res[$i]['Title']); ?></h3>
				<describ class="describ"><?= utf8_encode(substr($res[$i]['Content'], 0, 180)) . ' ...'; ?></describ>
			</a>
		</card>
	<?php endfor; ?>
</list>