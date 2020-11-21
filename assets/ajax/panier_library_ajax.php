<?php
require_once '../../config.php';
require_once SERVEUR_ROOT . '/includes/class/Autoloader.php';
Autoloader::register();
?>
<?php //////////// INTERACTION AVEC LE PANIER ////////////
$panier = new Panier(new Database(), $_POST['Id_user']);
$lib = new Library(new Database(), $_POST['Id_user']);

//// AJOUT ////
if ($_POST['Action'] === 'add' && !$panier->noAction()) {

	// SELECTION DU PACKAGE CONCERNE
	$package_to_add = $panier->selectPackageFromProduct($_POST['Id'], $_POST['Table']);
	// AJOUT DU PACKAGE
	$ok = $panier->insertPackage($package_to_add['Id_package']);
	if (!$ok) echo json_encode(["status" => 400, "error" => 'Vous possedez deja ce produit']);
	else echo json_encode($package_to_add);
}
//// SUPPRESSION ////
elseif ($_POST['Action'] === 'remove' && !$panier->noAction()) {

	$ok = $panier->deletePackage($_POST['Id']);
	if (!$ok) echo json_encode(["status" => 400, "error" => 'Erreur suppr']);
	else echo json_encode(["status" => 200, "ok" => 'Package supprimé du panier']);
}
//// REQUETE AJOUT LIBRAIRIE APRES ACHAT ////
elseif ($_POST['Action'] === 'buy' && !$panier->noAction()) {
	// $panier->lockBasket();
	// if($panier->noAction()) {}

	// apparition MODAL paymant puis manip BDD
	$shopping = $panier->selectFullContent();
	$error = false;

	for ($i = 0; $i < count($shopping); $i++) {
		if ($lib->insertPackage($shopping[$i]['Id_package'])) $panier->deletePackage($shopping[$i]['Id_package']);
		else $error = true;
	}

	if ($error) echo json_encode(["status" => 400, "error" => 'Erreur achat']);
	else echo json_encode($newLibrary = $lib->selectFullContent());
}
