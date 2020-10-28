<?php 
//// Récupere les infos sur les elements a afficher dans le carrousel
function getCarrouselImg($database, $dbTable, $nbImg)
{
   $prep_sql = $database->myPrepare("SELECT Id, Title, Picture FROM $dbTable ORDER BY Id DESC LIMIT :limit");
   $prep_sql->bindValue('limit', $nbImg, PDO::PARAM_INT);
	$database->myExecute($prep_sql, array());
	$res = $prep_sql->fetchAll();
	$prep_sql = null;
   return $res;
}
