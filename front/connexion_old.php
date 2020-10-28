<?php  //////////// INCLUDES ////////////
require_once '../includes/Database.php';
require_once '../includes/Form_account.php';
?>
<!--//////////// HTML ////////////-->
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Portail utilisateurs</title>
	<!-- CSS -->
	<link rel="stylesheet" href="../assets/css/test.css">
</head>

<body>
	<!-- FORMULAIRE -->
	<form id="formAccount" class="formAccount" action="#" method="POST">
		<!-- //////////// CONNEXION //////////// -->
		<div class="block_connexion" id="block_connexion">
			<h2>Connexion</h2>
			<?php
			$form = new Form_account(new Database(), $_POST);
			echo $form->inputText('Login', true);
			echo $form->inputPassword('Password');
			echo $form->submit("Se connecter");
			?>
		</div>
	</form>

	<p class="messageBox">
		<?php
		$form->signIn();
		?>
	</p>

	<!-- JAVA SCRIPT -->
	<script src="../assets/js/connexion.js"></script>
	<script src="../assets/js/password_visibility.js"></script>
</body>

</html>