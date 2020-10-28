<?php  //////////// INCLUDES ////////////
require_once '../config.php';
require_once '../includes/class/Autoloader.php';
Autoloader::register(); //charge automatiquement tous les fichers de class a leur appel
require_once '../includes/session.php';
?>
<!--//////////// HTML ////////////-->
<!DOCTYPE html>
<html lang="fr">
<!-- //////////////////////////////////// HEAD //////////////////////////////////// -->
<?php require_once ROOT_SITE . './includes/head.php'; ?>
<!-- <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gestion de compte</title>
	
	<link rel="stylesheet" href="../assets/css/test.css">
</head> -->

<body>
	<!-- //////////////////////////////////// HEADER //////////////////////////////////// -->
	<?php require_once ROOT_SITE . './includes/header.php'; ?>
	<?php
	go_connect(); // SI pas connecté ...
	$pdo = new Database();
	// echo '<pre>'; var_dump($_POST); echo '</pre><<< POST >>><br>';  //-----------------
	if (empty($_POST)) {
		$prep_sqlSelect = $pdo->myPrepare("SELECT * FROM users WHERE Email = :Email");
		$pdo->myExecute($prep_sqlSelect, ['Email' => $_SESSION['Email']]);
		if ($prep_sqlSelect && $res = $prep_sqlSelect->fetch()) {
			$form = new Form_account($pdo, $res);
		}
	} else $form = new Form_account($pdo, $_POST);

	echo $form->signOut('Déconnexion', '../includes/session_close.php'); // => BOUTON DECONNEXION
	echo '<a href="../">Accueil</a>';
	// MESSAGES
	// echo '<pre>'; var_dump($_SESSION); echo '</pre><<< SESSION >>><br>'; //-----------------
	// echo '<pre>'; var_dump($_POST); echo '</pre><<< POST >>><br>';  //-----------------
	?>
	<!-- FORMULAIRE -->
	<form id="formAccount" class="formAccount" action="" method="POST">
		<h2>Données de compte</h2>
		<?php
		echo $form->inputText("Nom", "Nom ...", "Name");
		echo $form->inputText("Prénom", "Prénom ...", "Firstname");
		echo $form->inputText("E-mail", "E-mail ...", "Email");
		echo $form->inputPassword("Mot de passe", "Mot de passe ...", 'Password', false);
		echo $form->inputPassword("Nouveau mot de passe", "Nouveau ...", 'Password_N1', false);
		echo $form->inputPassword("Confirmation nouveau", "Nouveau ...", 'Password_N2', false);
		echo $form->inputText("Téléphone", "Téléphone ...", "Phone");
		// STATUTS
		$res = $pdo->myQuery("SELECT Statut_name FROM statuts")->fetchAll(PDO::FETCH_NUM);
		for ($i=0; $i < count($res); $i++) $res[$i] = utf8_encode($res[$i][0]);
		echo $form ->inputSelect('Votre statut', $res, 'Id_statut');
		// NIVEAUX
		$res = $pdo->myQuery("SELECT Niveau_name FROM niveaux")->fetchAll(PDO::FETCH_NUM);
		for ($i=0; $i < count($res); $i++) $res[$i] = utf8_encode($res[$i][0]);
		echo $form ->inputSelect('Votre niveau', $res, 'Id_niveau');
		// FORMATION
		$res = $pdo->myQuery("SELECT Formation_name FROM formations")->fetchAll(PDO::FETCH_NUM);
		echo '<div class="grp_radio"><span>Type de formation</span>';
		for ($i=0; $i < count($res); $i++) { 
			$res[$i] = utf8_encode($res[$i][0]);
			echo '<div>'.$form ->inputRadio($res[$i]).'</div>';
		}			
		echo '</div>';

		echo $form->inputText("Code premium", "Code ...", "Code");
		echo $form->submit("Validez les modifications");
		?>
	</form>

	<?php /////////// MESSAGES ///////////
		
	$form->signUpdate();
	// echo '<pre>'; var_dump($_SESSION); echo '</pre><<< SESSION >>><br>'; //-----------------
	?>
	<!-- JAVA SCRIPT -->
	<script src="../assets/js/password_visibility.js"></script>
</body>

</html>