<?php
require_once '../../config.php';
require_once SERVEUR_ROOT . '/includes/class/Autoloader.php';
Autoloader::register(); //charge automatiquement tous les fichers de class a leur appel
?>
<?php
$database = new Database(); // ACCES BDD
// Recup categories
$prep_sqlCatego = $database->myPrepare("SELECT * FROM categories");
$resCatego = $database->myExecute($prep_sqlCatego, [""])->fetchAll();


////////////////////////////////////////////////////////////////////////
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

	// encodage utf8
	for ($x=0; $x < count($finalResult); $x++) {
		foreach ($finalResult[$x] as $key => $value) {
			$value = utf8_encode($value);
			$finalResult[$x][$key]=$value;
		}	
		// echo'<pre>';var_dump($finalResult[$x]);echo'</pre><br><<< ROW >>>'; //-----------------------
	}
	// echo'<pre>';var_dump($finalResult);echo'</pre><br><<< ENCODE >>>'; //-----------------------

	////////// encodage json pour AJAX //////////
	if(!empty($finalResult)) echo json_encode($finalResult);
	else echo json_encode(["status" => 400, "error" => "Erreur chargement ... "]);
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
		if (count($tabCatego) !==0 || $_POST['key_word'] !== "") $sql .= " WHERE";
		// inclure les categories
		if (count($tabCatego) === 0) $valCatego = "";
		else $valCatego = " Id_category IN ('" . implode("', '", $tabCatego) . "')";

		// Prend la chaine de caractere en entrée
		if ($valCatego !== "" && $_POST['key_word'] !== "") $sql .= $valCatego . " AND (Title LIKE ? OR Content LIKE ?)";
		elseif ($valCatego === "" && $_POST['key_word'] !== "") $sql .= $valCatego . " (Title LIKE ? OR Content LIKE ?)";
		else $sql .= $valCatego;
		// var_dump($sql);echo '<br><<< SQL >>>'; //-----------------
		$prep_sql = $database->myPrepare($sql);
		// var_dump($prep_sql);echo '<br><<< SQL >>>'; //-----------------

		if ($_POST['key_word'] === "") $res = $database->myExecute($prep_sql, [""])->fetchAll(PDO::FETCH_ASSOC);
		else $res = $database->myExecute($prep_sql, ["%" . utf8_decode($_POST['key_word']) . "%", "%" . utf8_decode($_POST['key_word']) . "%"])->fetchAll(PDO::FETCH_ASSOC);

		// echo'<<< BOUCLE '.$y.' >>>'; //-----------------
		$finalResult = array_merge($finalResult, $res);
		// echo '<pre>'; var_dump($finalResult);	echo '</pre><br><<< RES >>>'; //-----------------
	}
	$prep_sql = null;


	////////// encodage utf8 et json pour AJAX //////////
	for ($x=0; $x < count($finalResult); $x++) {
		foreach ($finalResult[$x] as $key => $value) {
			$value = utf8_encode($value);
			$finalResult[$x][$key]=$value;
		}	
		// echo'<pre>';var_dump($finalResult[$x]);echo'</pre><br><<< ROW >>>'; //-----------------------
	}
	// echo'<pre>';var_dump($finalResult);echo'</pre><br><<< ENCODE >>>'; //-----------------------

	if(!empty($finalResult)) echo json_encode($finalResult);
	else echo json_encode(["status" => 201, "error" => "Aucune correspondance trouvé ... "]);

	///////////// TRAITEMENT DES RESULTATS => COMPILATION CELON FILTRE DANS UN TABLEAU GENERIQUE
}
?>