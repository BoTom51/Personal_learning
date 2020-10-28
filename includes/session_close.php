<?php
// => FERMETURE DE SESSION
if(session_status() === PHP_SESSION_NONE) session_start(); // Ouvre la session
session_unset(); // Détruit la variable session
header('Location: ../'); // retour a l'accueil
exit();
