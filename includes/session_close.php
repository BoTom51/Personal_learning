<?php
// => FERMETURE DE SESSION
session_start(); // Ouvre la session
session_unset(); // Détruit les variables de la session
session_destroy(); // Détruit la session
// $_SESSION = array();
header('Location: ../index.php');
exit();
