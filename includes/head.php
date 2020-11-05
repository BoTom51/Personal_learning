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
	<link rel="stylesheet" href="<?= ROOT_URL; ?>/assets/css/document.css" />
	<link rel="stylesheet" href="<?= ROOT_URL; ?>/assets/css/header.css" />

	<?php if (basename($_SERVER["PHP_SELF"], '.php') === "index" || basename($_SERVER["PHP_SELF"], '.php') === "recherche") : ?>
		<link rel="stylesheet" href="<?= ROOT_URL; ?>/assets/css/main.css" />
		<link rel="stylesheet" href="<?= ROOT_URL; ?>/assets/css/list.css" />
	<?php endif; ?>

	<?php if (basename($_SERVER["PHP_SELF"], '.php') === "index") : ?>
		<link rel="stylesheet" href="<?= ROOT_URL; ?>/assets/css/carrousel.css" />
	<?php endif; ?>

	<?php if (basename($_SERVER["PHP_SELF"], '.php') === "recherche") : ?>
		<link rel="stylesheet" href="<?= ROOT_URL; ?>/assets/css/nav_recherche.css" />
	<?php endif; ?>

	<?php if (basename($_SERVER["PHP_SELF"], '.php') === "connexion" || basename($_SERVER["PHP_SELF"], '.php') === "compte" || basename($_SERVER["PHP_SELF"], '.php') === "back") : ?>
		<link rel="stylesheet" href="<?= ROOT_URL; ?>/assets/css/form_account.css" />
	<?php endif; ?>

	<link rel="stylesheet" href="<?= ROOT_URL; ?>/assets/css/footer.css" />
</head>