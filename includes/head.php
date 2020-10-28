<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- $_SERVER["PHP_SELF"] + basename() + array NOM DES FICHIERS pour savoir quel TITRE afficher sur la page -->
	<title>Accueil</title>
	<!-- CSS LINKS -->
	<!-- $_SERVER["PHP_SELF"] + basename() + array NOM DES FICHIERS pour savoir quel CSS charger  -->
	<link rel="stylesheet" href="../assets/css/document.css" />
	<link rel="stylesheet" href="../assets/css/main.css" />

	<?php if (basename($_SERVER["PHP_SELF"],'.php') === "index") : ?>
		<link rel="stylesheet" href="../assets/css/carrousel.css" />
	<?php endif ?>
</head>

<?php if (basename($_SERVER["PHP_SELF"],'.php') === "head") : echo basename($_SERVER["PHP_SELF"]); ?>
	<div style="width:50px; height:50px; background-color:red;"></div>
<?php else : ?>
	<div style="width:50px; height:50px; background-color:blue;"></div>
<?php endif ?>