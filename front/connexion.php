<?php  //////////// INCLUDES ////////////
require_once '../includes/class/Autoloader.php';
Autoloader::register(); //charge automatiquement tous les fichers de class a leur appel
require_once '../includes/session.php';

/////////////// SECURITE ///////////////
// SI connecté ... retour a l'accueil
if (be_connect()) {
	header('Location: ../');
	exit();
}
/////////////// SECURITE ///////////////

// echo '<pre>'; var_dump($_SESSION); echo '</pre><<< SESSION >>>'; //-----------------
?>
<!-- //////////////////////////////////////////////////////////// HEAD //////////////////////////////////////////////////////////// -->
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Connexion</title>
	<!-- CSS -->
	<link rel="stylesheet" href="../assets/css/test.css">
</head>
<!-- //////////////////////////////////////////////////////////// BODY //////////////////////////////////////////////////////////// -->
<body>
	<a href="../">Accueil</a>
	<main id="conteneur" class="conteneur">
	
		<!-- //////////// FORM CONNEXION //////////// -->
		<form id="form_connexion" class="form_connexion" action="" method="POST">
			<h2>Connexion</h2>
			<?php
			$form_connexion = new Form_account(new Database(), $_POST);
			echo $form_connexion->inputText("E-mail", "E-mail ...", "Email", true);
			echo $form_connexion->inputPassword("Mot de passe");
			echo $form_connexion->submit("Se connecter");
			?>
		</form>

		<!-- BOUTON SWITCH CONNEC/INSCRIP  -->
		<label form="form_inscription" for="createAccount" class="inscriptionBtn" id="inscriptionBtn">Créer un compte</label>
		<input form="form_inscription" type="checkbox" id="createAccount" name="createAccount">

		<!-- //////////// FORM INSCRIPTION //////////// -->
		<form id="form_inscription" class="form_inscription" action="" method="POST">
			<h2>Inscription</h2>
			<?php
			$pdo = new Database();
			$form_inscription = new Form_account($pdo, $_POST);
			echo $form_inscription->inputText("Nom", "Nom ...", "Name");
			echo $form_inscription->inputText("Prénom", "Prénom ...", "Firstname");
			echo $form_inscription->inputText("E-mail", "E-mail ...", "Email", true);
			echo $form_inscription->inputPassword("Mot de passe");
			echo $form_inscription->inputText("Téléphone", "Téléphone ...", "Phone");
			// STATUTS
			// utf8_encode change l'encodage des caracteres spéciaux, utilisé pour les donnees récupéré de la BDD et affiché
			$res = $pdo->myQuery("SELECT Statut_name FROM statuts")->fetchAll(PDO::FETCH_NUM);
			for ($i=0; $i < count($res); $i++) $res[$i] = utf8_encode($res[$i][0]);
			echo $form_inscription->inputSelect('Votre statut', $res, 'Id_statut');
			// NIVEAUX
			$res = $pdo->myQuery("SELECT Niveau_name FROM niveaux")->fetchAll(PDO::FETCH_NUM);
			for ($i=0; $i < count($res); $i++) $res[$i] = utf8_encode($res[$i][0]);
			echo $form_inscription->inputSelect('Votre niveau', $res, 'Id_niveau');
			// FORMATION
			$res = $pdo->myQuery("SELECT Formation_name FROM formations")->fetchAll(PDO::FETCH_NUM);
			echo '<div class="grp_radio"><span>Type de formation</span>';
			for ($i=0; $i < count($res); $i++) { 
				$res[$i] = utf8_encode($res[$i][0]);
				echo '<div>'.$form_inscription->inputRadio($res[$i]).'</div>';
			}			
			echo '</div>';

			echo $form_inscription->inputText("Code premium", "Code ...", "Code");
			echo $form_inscription->submit("Sinscrire");
			?>
		</form>
	</main>
	<!-- JAVA SCRIPT -->
	<script src="../assets/js/connexion.js"></script>

	<?php //////////// METHODES CONNEXION / INSCRIPTION ////////////
	// echo '<pre>'; var_dump($_POST); echo '</pre><<< POST >>><br>'; //-------------------------------

	$redirections = ['1' => '../back/back.php', '2' => './compte.php'];

	if (!isset($_POST['createAccount'])) $form_connexion->signIn($redirections);
	else {
		$form_inscription->signUp();
		echo '<script>pan_inscription();</script>'; // ouvre le panneau d'inscription en cas d'erreur d'entrées sur celui ci
	}
	?>

	<!-- JAVA SCRIPT -->
	<script src="../assets/js/password_visibility.js"></script>
</body>

</html>