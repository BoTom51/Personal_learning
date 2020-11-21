<?php  //////////// INCLUDES ////////////
require_once '../config.php';
require_once SERVEUR_ROOT . '/includes/class/Autoloader.php';
Autoloader::register(); //charge automatiquement tous les fichers de class a leur appel
require_once SERVEUR_ROOT . '/includes/session.php';
ob_start(); // bloque en ecriture le remplissage du header autre que par les fonctions/actions légitime (header location)
/////////////// SECURITE ///////////////
// SI connecté ... retour a l'accueil
if (be_connect()) {
	$connected = true;
	header('Location: ../');
	exit();
} else $connected = false;
/////////////// SECURITE ///////////////
// echo '<pre>'; var_dump($_SESSION); echo '</pre><<< SESSION >>>'; //-----------------
?>
<!DOCTYPE html>
<html lang="fr">
<!-- //////////////////////////////////// HEAD //////////////////////////////////// -->
<?php require_once SERVEUR_ROOT . '/includes/head.php'; ?>

<!-- //////////////////////////////////// BODY //////////////////////////////////// -->

<body>
	<!-- //////////////////////////////////// HEADER //////////////////////////////////// -->
	<?php require_once SERVEUR_ROOT . '/includes/header.php'; ?>

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
		<label class="inscriptionBtn" id="inscriptionBtn" form="form_inscription" for="createAccount">Créer un compte</label>
		<input id="createAccount" form="form_inscription" type="checkbox" name="createAccount">
		<!-- //////////// FORM INSCRIPTION //////////// -->
		<form id="form_inscription" class="form_inscription" action="" method="POST">
			<h2>Inscription</h2>
			<?php	
			$pdo = new Database();
			$form_inscription = new Form_account($pdo, $_POST);
			echo $form_inscription->inputText("Nom", "Nom ...", "Name");
			echo $form_inscription->inputText("Prénom", "Prénom ...","Firstname");
			echo $form_inscription->inputText("E-mail", "E-mail ...","Email",true);
			echo $form_inscription->inputPassword("Mot de passe");
			echo $form_inscription->inputText("Téléphone", "Téléphone ...", "Phone");
			// STATUTS
			// utf8_encode change l'encodage des caracteres spéciaux, utilisé pour les donnees récupéré de la BDD et affiché
			$res = $pdo->myQuery("SELECT Statut_name FROM statuts")->fetchAll(PDO::FETCH_NUM);
			for ($i = 0; $i < count($res); $i++) $res[$i] = utf8_encode($res[$i][0]);
			echo $form_inscription->inputSelect('Votre statut', $res, 'Id_statut');
			// NIVEAUX
			$res = $pdo->myQuery("SELECT Niveau_name FROM niveaux")->fetchAll(PDO::FETCH_NUM);
			for ($i = 0; $i < count($res); $i++) $res[$i] = utf8_encode($res[$i][0]);
			echo $form_inscription->inputSelect('Votre niveau', $res, 'Id_niveau');
			// FORMATION
			$res = $pdo->myQuery("SELECT Formation_name FROM formations")->fetchAll(PDO::FETCH_NUM);
			echo '<div class="grp_radio"><span>Type de formation</span>';
			for ($i = 0; $i < count($res); $i++) {
				$res[$i] = utf8_encode($res[$i][0]);
				echo '<div>' . $form_inscription->inputRadio($res[$i]) . '</div>';
			}
			echo '</div>';

			echo $form_inscription->inputText("Code premium", "Code ...", "Code");
			echo $form_inscription->submit("Sinscrire");
			?>
		</form>
	</main>
	<!-- JAVA SCRIPT -->
	<?php require_once SERVEUR_ROOT . '/includes/scripts.php'; ?>

	<?php //////////// METHODES CONNEXION / INSCRIPTION ////////////
	// echo '<pre>'; var_dump($_POST); echo '</pre><<< POST >>><br>'; //-------------------------------

	$redirections = ['1' => '../back/back.php', '2' => './compte.php'];

	if (!isset($_POST['createAccount'])) {
		////// CONNEXION //////
		$form_connexion->signIn($redirections);
		
		if (isset($_SESSION['Id'])) {
			//// CREATION DU PANIER
			$panier = new Panier(new Database(), $_SESSION['Id']);
			$panier->createSessionBasket();
			$basketBooks = $panier->selectFullContent();

			for ($i=0; $i < count($basketBooks); $i++) {
				$panier->addToSession($basketBooks[$i]['Id_package'], $basketBooks[$i]['Title_package'], $basketBooks[$i]['Picture_package'], $basketBooks[$i]['Price_package']);
			}

			//// CREATION DE LA BIBLI
			$lib = new Library(new Database(), $_SESSION['Id']);
			$lib->createSessionLibrary();
			$libraryBooks = $lib->selectFullContent();

			for ($i=0; $i < count($libraryBooks); $i++) {
				$lib->addToSession($libraryBooks[$i]['Id_package'], $libraryBooks[$i]['Title_package'], $libraryBooks[$i]['Picture_package'], $libraryBooks[$i]['Price_package']);
			}
		}
	} else {
		////// INSCRIPTION //////
		$form_inscription->signUp();
		echo '<script>pan_inscription();</script>'; // ouvre le panneau d'inscription en cas d'erreur d'entrées sur celui ci
		
		if (isset($_SESSION['Id'])) {
			//// CREATION DU PANIER
			$panier = new Panier(new Database(), $_SESSION['Id']);
			$panier->createSessionBasket();
			$basketBooks = $panier->selectFullContent();

			for ($i=0; $i < count($basketBooks); $i++) {
				$panier->addToSession($basketBooks[$i]['Id_package'], $basketBooks[$i]['Title_package'], $basketBooks[$i]['Picture_package'], $basketBooks[$i]['Price_package']);
			}

			//// CREATION DE LA BIBLI
			$lib = new Library(new Database(), $_SESSION['Id']);
			$lib->createSessionLibrary();
			$libraryBooks = $lib->selectFullContent();

			for ($i=0; $i < count($libraryBooks); $i++) {
				$lib->addToSession($libraryBooks[$i]['Id_package'], $libraryBooks[$i]['Title_package'], $libraryBooks[$i]['Picture_package'], $libraryBooks[$i]['Price_package']);
			}
		}
	}
	?>

	<!-- //////////////////////////////////// FOOTER //////////////////////////////////// -->
	<?php require_once SERVEUR_ROOT . '/includes/footer.php'; ?>

	<!-- JAVA SCRIPT -->

</body>

</html>