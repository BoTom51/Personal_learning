<?php  //////////// INCLUDES ////////////
require_once '../includes/class/Autoloader.php';
Autoloader::register(); //charge automatiquement tous les fichers de class a leur appel
require_once '../includes/session.php';
require_once '../config.php';
?>
<!--//////////// HTML ////////////-->
<!DOCTYPE html>
<html lang="fr">
<!-- //////////////////////////////////// HEAD //////////////////////////////////// -->
<?php require_once SERVEUR_ROOT.'/includes/head.php'; ?>

<!-- //////////////////////////////////// BODY //////////////////////////////////// -->
<body>
	<!-- //////////////////////////////////// HEADER //////////////////////////////////// -->
	<?php require_once SERVEUR_ROOT.'/includes/header.php'; ?>

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
	<?php $form->signUpdate();	// echo '<pre>'; var_dump($_SESSION); echo '</pre><<< SESSION >>><br>'; //-----------------?>

	<!-- //////////////////////////////////// FOOTER //////////////////////////////////// -->
	<?php require_once SERVEUR_ROOT . '/includes/footer.php'; ?>

	<!-- JAVA SCRIPT -->
	<?php require_once SERVEUR_ROOT.'/includes/scripts.php'; ?>
</body>

</html>