<?php
//date_default_timezone_set( "Australia/Sydney" );
define( "DB_DSN", "mysql:host=localhost;dbname=personal_learning" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "" );
define( "ADMIN_USERNAME", "admin" );
define( "ADMIN_PASSWORD", "admin" );
define("HOMEPAGE_NUM_ARTICLES", 4);
define("HOMEPAGE_NUM_PRODUCTS", 6);
define("HOMEPAGE_NUM_RECOM", 4);

define( 'ROOT_SITE', realpath(""));
var_dump(ROOT_SITE);
var_dump($_SERVER['DOCUMENT_ROOT']);


// monter de niveau pour trouver la racine du site et on ajoute le chemin vers le fichier cible

