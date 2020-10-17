<?php
class Autoloader
{

	static function register()
	{
		spl_autoload_register(array(__CLASS__, 'autoload'));
	}

	static function autoload($class_name)
	{
		require $_SERVER['DOCUMENT_ROOT'] . '/test/PROJET/includes/' . $class_name . '.php';
		//require '../includes/' . $class_name . '.php'; // ----------------------> PROBLEME DE CHEMIN ...
	}
}
