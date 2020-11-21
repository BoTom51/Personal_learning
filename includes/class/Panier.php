<?php

class Panier
{
	private $database;
	private $idUser;
	private $nbPackages;
	private $IdsPackages = array();

	public function __construct($database, $idUser)
	{
		$this->database = $database;
		$this->idUser = $idUser;
	}

	///////////////// MANIP SESSION /////////////////

	// crée un panier s'il ne l'est pas deja
	// ------> automatisé ! 2 params: le nom (panier/biblio/etc...) et un tableau contenant tous les sous-champs
	public function createSessionBasket()
	{
		if (!isset($_SESSION['Panier'])) {
			$_SESSION['Panier'] = array();
			$_SESSION['Panier']['idPack'] = array();
			$_SESSION['Panier']['titrePack'] = array();
			$_SESSION['Panier']['imgPack'] = array();
			$_SESSION['Panier']['prixPack'] = array();
			$_SESSION['Panier']['noAction'] = false;
		}
		return true;
	}

	// ajout du package dans le panier de session
	public function addToSession($idPack, $titrePack, $imgPack, $prixPack)
	{
		// si le panier existe et qu'il n'est pas vérrouillé ...
		if ($this->createSessionBasket() && !$this->noAction()) {
			$duplicate = false;
			for ($i = 0; $i < count($_SESSION['Panier']['idPack']); $i++) if ($_SESSION['Panier']['idPack'][$i] === $idPack) $duplicate = true;

			if ($duplicate === false) {
				array_push($_SESSION['Panier']['idPack'], $idPack);
				array_push($_SESSION['Panier']['titrePack'], $titrePack);
				array_push($_SESSION['Panier']['imgPack'], $imgPack);
				array_push($_SESSION['Panier']['prixPack'], $prixPack);

				return true;
			}
			return false; // else return 'Vous possedez deja ce produit';
		}
		return false; // else return 'Impossible d\'agir sur le panier';
	}

	// Methode sans ajax ???
	public function removeFromSession($idPack)
	{
		// si le panier existe et qu'il n'est pas vérrouillé ...
		if ($this->createSessionBasket() && !$this->noAction()) {
			$indexDataPack = null;
			// cherche l'index du pack dans le panier (le meme pour tous les champs de donnees du pack dans la session)
			for ($i = 0; $i < count($_SESSION['Panier']['idPack']); $i++) if ($_SESSION['Panier']['idPack'][$i] === $idPack) $indexDataPack = $i;

			unset($_SESSION['Panier']['idPack'][$indexDataPack]);
			unset($_SESSION['Panier']['titrePack'][$indexDataPack]);
			unset($_SESSION['Panier']['imgPack'][$indexDataPack]);
			unset($_SESSION['Panier']['prixPack'][$indexDataPack]);

			return true;
		}
		return false;
	}

	// Synchronise le panier de session avec la BDD (détruit->recré)
	public function synchronizeSession()
	{
		$books = $this->selectFullContent();

		unset($_SESSION['Panier']);
		$this->createSessionBasket();

		for ($i = 0; $i < count($books); $i++) {
			$this->addToSession($books[$i]['Id_package'], $books[$i]['Title_package'], $books[$i]['Picture_package'], $books[$i]['Price_package']);
		}
	}

	// permet de savoir si l'on peut ou non encore agir sur le panier
	// on ne doit pas pouvoir agir dessus pendant le paymant
	public function noAction()
	{
		if (isset($_SESSION['Panier']) && $_SESSION['Panier']['noAction']) return true;
		else return false;
	}

	public function lockBasket()
	{
		$_SESSION['Panier']['noAction'] = true;
	}


	///////////////// MANIP DB /////////////////

	// RECUPERE tous les packages
	public function selectFullContent()
	{
		$prep_sql = $this->database->myPrepare("SELECT Id_package FROM basket WHERE Id_user = ? ORDER BY Id_package");
		$IdsPackages = $this->database->myExecute($prep_sql, array($this->idUser))->fetchAll(pdo::FETCH_NUM);
		$this->nbPackages = count($IdsPackages);
		$this->IdsPackages = $IdsPackages;
		$prep_sql = null;

		$packages = array();
		$prep_sql = $this->database->myPrepare("SELECT Id_package, Picture_package, Title_package, Price_package FROM packages WHERE Id_package = ?");

		for ($i = 0; $i < $this->nbPackages; $i++) {
			$res = $this->database->myExecute($prep_sql, [$this->IdsPackages[$i][0]])->fetchAll(pdo::FETCH_ASSOC);

			$packages = array_merge($packages, $res);
		}
		$prep_sql = null;

		return $packages;
	}

	// RECUPERE le package d'un produit
	public function selectPackageFromProduct($productId, $productTable)
	{
		if ($productTable === 'lessons') $sql = "SELECT Id_package, Picture_package, Title_package, Price_package FROM lessons NATURAL JOIN packages WHERE Id_lesson = ?";
		elseif ($productTable === 'exercices') $sql = "SELECT Id_package, Picture_package, Title_package, Price_package FROM exercices NATURAL JOIN packages WHERE Id_exercice = ?";
		elseif ($productTable === 'articles') $sql = "SELECT Id_package, Picture_package, Title_package, Price_package FROM articles NATURAL JOIN packages WHERE Id_article = ?";
		elseif ($productTable === 'packages') $sql = "SELECT Id_package, Picture_package, Title_package, Price_package FROM packages WHERE Id_package = ?";

		$prep_sql = $this->database->myPrepare($sql);
		$package = $this->database->myExecute($prep_sql, [$productId])->fetch(pdo::FETCH_ASSOC);
		$prep_sql = null;

		return $package;
	}

	// ajout du package dans la bdd
	public function insertPackage($idPack)
	{
		if (!$this->alreadyExistDB($idPack, $this->idUser)) {
			$prep_sql = $this->database->myPrepare("INSERT INTO basket (Id_package, Id_user) VALUES (?, ?)");
			$this->database->myExecute($prep_sql, [$idPack, $this->idUser]);
			$prep_sql = null;
			return true;
		} else return false;
	}

	// suppression du package dans la bdd
	public function deletePackage($idPack)
	{
		$prep_sql = $this->database->myPrepare("DELETE FROM basket WHERE Id_package = ? AND Id_user = ?");
		if (!$this->database->myExecute($prep_sql, [$idPack, $this->idUser])) return false;
		else return true;
	}

	// vérifit si le package n'est pas deja dans le panier
	public function alreadyExistDB($idPack, $idUser)
	{
		$prep_sql = $this->database->myPrepare("SELECT Id_package FROM basket WHERE Id_user = ?");
		$IdsPackages = $this->database->myExecute($prep_sql, [$idUser])->fetchAll(pdo::FETCH_NUM);
		$prep_sql = null;

		$duplicate = false;

		for ($i = 0; $i < count($IdsPackages); $i++) {
			if ($IdsPackages[$i][0] === $idPack) $duplicate = true;
		}

		return $duplicate;
	}
}
