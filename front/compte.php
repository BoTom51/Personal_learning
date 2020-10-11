<?php  //////////// INCLUDES ////////////
require('../includes/Form_account.php');
require('../includes/Database.php');
require('../includes/session_open.php');
?>
<!--//////////// HTML ////////////-->
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gestion de compte</title>
	<!-- CSS -->
	<link rel="stylesheet" href="../assets/css/test.css">
</head>

<body>
	<!-- <a style="margin: 10px auto; padding:10px; background-color:grey;" href="./session_close.php">Déconnexion</a><br> -->
	<?php 
	$form = new Form_account(new Database(), $_SESSION);
	echo $form->signOut('Déconnexion', '../includes/session_close.php'); // => BOUTON DECONNEXION
	// MESSAGES
	echo '<p><<< SESSION >>> '; var_dump($_SESSION); echo '</p>'; //-----------------
	echo '<p><<< POST >>> '; var_dump($_POST); echo '</p>'; //-----------------
	?>
	<!-- FORMULAIRE -->
	<form id="formAccount" class="formAccount" action="#" method="POST">
		<div class="block_inscription" id="block_inscription">
			<h2>Données de compte</h2>
			<?php
			
			echo $form->inputText('Name');
			echo $form->inputText('Firstname');
			echo $form->inputText('Login');
			echo $form->inputPassword('Password', false);
			echo $form->inputPassword('Password_N1', false);
			echo $form->inputPassword('Password_N2', false);
			echo $form->submit("Validez les modifications");
			?>
		</div>
	</form>
	<!-- MESSAGES -->
	<p> 
		<?php
		echo '<p><<< SESSION >>> '; var_dump($_SESSION); echo '</p>'; //-----------------
		echo '<p><<< POST >>> '; var_dump($_POST); echo '</p>'; //-----------------
		echo '<p>'; $form->signUpdate(); echo '</p>';
		?>
	</p>
	<!-- JAVA SCRIPT -->
	<script src="../assets/js/password_visibility.js"></script>
</body>

</html>