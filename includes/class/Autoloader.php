<?php
class Autoloader
{

	static function register()
	{
		spl_autoload_register(array(__CLASS__, 'autoload'));
	}

	static function autoload($class_name)
	{
		require __DIR__ .'\\'. $class_name . '.php';
		// require $_SERVER['DOCUMENT_ROOT'] . '/test/Personal_learning_v0.2/includes/class/' . $class_name . '.php';
		//require '../includes/' . $class_name . '.php'; // ----------------------> PROBLEME DE CHEMIN ...
	}
}
