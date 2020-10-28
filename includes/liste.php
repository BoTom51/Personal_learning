<?php

define("NUM_ARTICLES", 4);

$database = new Database();
$prep_sql = $database->myPrepare("SELECT Id, Title, Picture FROM articles ORDER BY Id ASC LIMIT ?");
$prep_sql->myExecute([4]);

var_dump($prep_sql->fetchAll());

for ($i=0; $i < NUM_ARTICLES; $i++) { 
	echo '<a class="slide" href="./front/fiche.php?id=' . $res['Id'] . '"><img src="../assets/img/' . $res['Picture'] . '.jpg" alt="' . $res['Title'] . '" /></a>';
}