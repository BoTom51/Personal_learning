<?php

class Library
{
	private $database;
	private $idUser;
	private $nbBooks;
	private $IdsBooks = array();

	function __construct($database, $idUser)
	{
		$this->database = $database;
		$this->idUser = $idUser;
	}

	///////////////// MANIP SESSION /////////////////

	// crée la bibliotheque se elle ne l'est pas deja
	// ------> automatisé ! 2 params: le nom (panier/biblio/etc...) et un tableau contenant tous les sous-champs
	public function createSessionLibrary()
	{
		if (!isset($_SESSION['Bibliotheque'])) {
			$_SESSION['Bibliotheque'] = array();
			$_SESSION['Bibliotheque']['idPack'] = array();
			$_SESSION['Bibliotheque']['titrePack'] = array();
			$_SESSION['Bibliotheque']['imgPack'] = array();
		}
		return true;
	}

	// ajout du package dans le panier de session
	public function addToSession($idPack, $titrePack, $imgPack, $prixPack)
	{
		// si le panier existe et qu'il n'est pas vérrouillé ...
		if ($this->createSessionLibrary()) {
			$duplicate = false;
			for ($i = 0; $i < count($_SESSION['Bibliotheque']['idPack']); $i++) if ($_SESSION['Bibliotheque']['idPack'][$i] === $idPack) $duplicate = true;

			if ($duplicate === false) {
				array_push($_SESSION['Bibliotheque']['idPack'], $idPack);
				array_push($_SESSION['Bibliotheque']['titrePack'], $titrePack);
				array_push($_SESSION['Bibliotheque']['imgPack'], $imgPack);

				return true;
			}
			return false; // else return 'Vous possedez deja ce produit';
		}
		return false; // else return 'Impossible d\'agir sur le panier';
	}

	// Synchronise le panier de session avec la BDD (détruit->recré)
	public function synchronizeSession()
	{
		$books = $this->selectFullContent();

		unset($_SESSION['Bibliotheque']);
		$this->createSessionLibrary();

		for ($i = 0; $i < count($books); $i++) {
			$this->addToSession($books[$i]['Id_package'], $books[$i]['Title_package'], $books[$i]['Picture_package'], $books[$i]['Price_package']);
		}
	}

	///////////////// MANIP DB /////////////////

	// RECUPERE tous les packages
	public function selectFullContent()
	{
		// recup les id des packages dans la bibli
		$prep_sql = $this->database->myPrepare("SELECT Id_package FROM library WHERE Id_user = ? ORDER BY Id_package");
		$IdsPackages = $this->database->myExecute($prep_sql, array($this->idUser))->fetchAll(pdo::FETCH_NUM);
		$this->nbPackages = count($IdsPackages);
		$this->IdsPackages = $IdsPackages;
		$prep_sql = null;

		// recup les infos pour affichage/remplissage session
		$packages = array();
		$prep_sql = $this->database->myPrepare("SELECT Id_package, Picture_package, Title_package, Price_package FROM packages WHERE Id_package = ?");

		for ($i = 0; $i < $this->nbPackages; $i++) {
			$res = $this->database->myExecute($prep_sql, [$this->IdsPackages[$i][0]])->fetchAll(pdo::FETCH_ASSOC);

			$packages = array_merge($packages, $res);
		}
		$prep_sql = null;

		return $packages;
	}

	// ajout du package dans la bdd
	public function insertPackage($idPack)
	{
		if (!$this->alreadyExistDB($idPack, $this->idUser)) {
			$prep_sql = $this->database->myPrepare("INSERT INTO library (Id_package, Id_user) VALUES (?, ?)");
			$this->database->myExecute($prep_sql, [$idPack, $this->idUser]);
			$prep_sql = null;
			return true;
		} else return false;
	}

	// vérifit si le package n'est pas deja dans le panier
	public function alreadyExistDB($idPack, $idUser)
	{
		$prep_sql = $this->database->myPrepare("SELECT Id_package FROM library WHERE Id_user = ?");
		$IdsPackages = $this->database->myExecute($prep_sql, [$idUser])->fetchAll(pdo::FETCH_NUM);
		$prep_sql = null;

		$duplicate = false;

		for ($i = 0; $i < count($IdsPackages); $i++) {
			if ($IdsPackages[$i][0] === $idPack) $duplicate = true;
		}

		return $duplicate;
	}
}
