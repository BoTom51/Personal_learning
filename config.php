<?php
//date_default_timezone_set( "Australia/Sydney" );
define( "DB_DSN", "mysql:host=localhost;dbname=personal_learning" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "" );
define( "ADMIN_USERNAME", "admin" );
define( "ADMIN_PASSWORD", "admin" );
define("HOMEPAGE_NUM_ARTICLES", 8);
define("HOMEPAGE_NUM_PRODUCTS", 10);
define("HOMEPAGE_NUM_RECOM", 6);

define("SERVEUR_ROOT", dirname(__FILE__)); // racine des dossiers: include/require
define("ROOT_URL", substr($_SERVER['PHP_SELF'], 0, - (strlen($_SERVER['SCRIPT_FILENAME']) - strlen(SERVEUR_ROOT)))); // racine du site (lien url: href/src)
