<?php
// => OUVERTURE DE SESSION
session_start(); // Ouvre la session
// SI non connecté (pas de login lié a la session) ... retour a la page de connexion 
//... sinon message de bienvenue
if (!isset($_SESSION['Login'])) {
	header('Location: ../front/connexion.php');
	exit();
} else echo '<p class="messageBox">Bonjour <u>' . $_SESSION["Type"] . '</u> <strong>' . (isset($_SESSION["Firstname"]) ? $_SESSION["Firstname"] : $_SESSION["Login"]) . '</strong> !</p>';
