<?php
function be_connect()
{
	// => OUVERTURE DE SESSION
	if (session_status() === PHP_SESSION_NONE) session_start(); // Ouvre la session si pas deja ouverte
	// SI non connecté (aucune info de compte lié a la session) ...
	if (isset($_SESSION['Id'])) return true;
	else return false;
}

function who_connect()
{
	return 'Bonjour <u>' . $_SESSION["Type"] . '</u> <strong>' . (isset($_SESSION["Firstname"]) ? $_SESSION["Firstname"] : $_SESSION["Email"]) . '</strong>';
}

function go_connect()
{
	if (be_connect() === false) {
		header('Location: ' . ROOT_URL . '/front/connexion.php');
		exit();
	}
}

/*// => index / liste / fiche
si connecté ... 
BOUTON 'se déco' + compte dispo 
... sinon BOUTON 'se co'/'s'inscrire'

// => connexion
si connecté ... 
REDIRECTION accueil 
... sinon on reste sur la page pour pouvoir se co/s'inscrire

// => compte / back
si non connecté ... 
REDIRECTION page connection ... sinon on reste
*/
