<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php // liste des pages du site et le titre de page correspondant
	$arboSite = array(
		'index' => 'Accueil',
		'back' => 'Gestionnaire administrateur',
		'compte' => 'Gestion de compte',
		'connexion' => 'Connexion',
		'fiche' => 'Fiche du produit',
		'recherche' => 'Recherche',
		'404' => 'Ouille ! Y a de la casse ...'
	); ?>

	<title><?= $arboSite[basename($_SERVER["PHP_SELF"], '.php')]; ?></title>

	<!-- LINKS CSS -->
	<link rel="stylesheet" href="./assets/css/document.css" />
	<link rel="stylesheet" href="./assets/css/header.css">
	<link rel="stylesheet" href="./assets/css/main.css">

	<?php if (basename($_SERVER["PHP_SELF"], '.php') === "index") : ?>
		<link rel="stylesheet" href="./assets/css/carrousel.css" />
		<link rel="stylesheet" href="./assets/css/list.css" />
	<?php endif; ?>

	<link rel="stylesheet" href="./assets/css/footer.css">

</head>