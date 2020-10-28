<?php  //////////////////////////////////////
/////////////// TEST /////////////
//////////////////////////////////////
// recupération des img celon le nombre a afficher
require_once './functions/functions_carrousel.php';
$database = new Database();
$dbTable = 'articles';
$nbImg = 0; // HOMEPAGE_NUM_ARTICLES ou HOMEPAGE_NUM_PRODUCTS

$listImgInfo = getCarrouselImg($database, $dbTable, $nbImg);
?>
<!-- /////////////// CARROUSEL DES ARTICLES RECENTS /////////////// -->
<carousel id="carousel" class="carousel" data-imgPerFrame="2" data-pasDuSlide="2">
   <!-- ---------------- ECRAN ---------------- -->
   <div id="rail" class="slides">
      <!-- SELECTION NB IMG selon la variable prédef et le chemin sera crée dynamiquement (nom img BDD) -->
      <?php for ($i = 0; $i < HOMEPAGE_NUM_ARTICLES; $i++) : ?>
         <a class="slide" href="./front/fiche.php?id=<?= $listImgInfo[$i]['Id']; ?>"><img src="./assets/img/<?= $listImgInfo[$i]['Picture']; ?>.jpg" alt="<?= $listImgInfo[$i]['Title']; ?>" /></a>
      <?php endfor; ?>
   </div>
   <!-- ---------------- INTERFACE ---------------- -->
   <div id="btnPrec" class="precedent fleche gauche">◀</div>
   <div id="btnSuiv" class="suivant fleche droite">▶</div>
   <!-- <div class="indicators"></div>
   <span class="legende"></span> -->
</carousel>