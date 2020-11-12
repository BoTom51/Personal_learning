<?php 
//// Récupere les infos sur les elements a afficher dans le carrousel
function getCarrouselImg($database, $dbTable, $nbImg)
{
   $prep_sql = $database->myPrepare("SELECT * FROM $dbTable ORDER BY Date DESC LIMIT :limit");
   $prep_sql->bindValue('limit', $nbImg, PDO::PARAM_INT);
	$database->myExecute($prep_sql, array());
	$res = $prep_sql->fetchAll();
	// echo '<pre>';var_dump($res);echo '</pre><<< RES >>><br>'; //--------------------
	$prep_sql = null;
   return $res;
}
