<?php
class Product {
	// PROPRIETES
	private $idProduct;
	private $title;
	private $picture;
	private $content;
	private $date;
	private $package;
	private $price;
	private $category;
	private $subCategory;
	private $formation;
	private $niveau;

	private $database;
	private $table;

	// CONSTRUCTEUR (recup PDO)
	public function __construct($database, string $table){
		$this->database = $database;
		$this->table = $table;
	}
	// GETTER

	// CRUD
	public function selectItem(string $id){ 
		//requete sql
		// 'id ? il n'est pas connu a ce stade, donc autre info peut importe laquel qui permet de recup un resultat et remplir l'objet ?


		// return res pour encodage json ?
	}
}