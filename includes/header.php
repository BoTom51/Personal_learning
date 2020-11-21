<header>

   <!-- /////////////// BANNIERE / LOGO /////////////// -->
   <h1>PERSONAL LEARNING</h1>

   <!-- /////////////// BARRE DE NAVIGATION /////////////// -->
   <nav class="menuBurger">
      <div class="container">
         <!-- INTERFACE NAVIGATION (MENU hamberger) -->
         <label class="btnBurger" for="checkBurger">&equiv;</label>
         <input class="checkBurger" type="checkbox" id="checkBurger" />
         <div class="contenuBuger">
            <ul class="ui_nav">
               <li>
                  <?= (basename($_SERVER["PHP_SELF"], '.php') === "index") ? '<a class="current_page" href="' . ROOT_URL . '">Accueil</a>'
                     : '<a href="' . ROOT_URL . '">Accueil</a>'; ?>
               </li>
               <li>
                  <?= (basename($_SERVER["PHP_SELF"], '.php') === "recherche") ? '<a class="current_page" href="' . ROOT_URL . '/front/recherche.php">Blog & Catalogue</a>'
                     : '<a href="' . ROOT_URL . '/front/recherche.php">Blog & Catalogue</a>'; ?>
               </li>
            </ul>
            <!-- INTERFACE RECHERCHE -->
            <ul class="ui_search">
               <li>Recherche</li>
            </ul>
            <!-- INTERFACE DE COMPTE -->
            <ul class="ui_account">
               <?php // SI CONNECTE
               if ($connected) : ?>
                  <!-- ACTION COMPTE -->
                  <li class="btn_account">
                     <a class="btn_disconnect" href="<?= ROOT_URL; ?>/includes/session_close.php"><img class="icon_disconnect" title="Déconnexion" src="<?= ROOT_URL; ?>/assets/icon/disconnect.png" alt="Déconnexion" /></a>
                     <?php // SI PAS SUR LA PAGE COMPTE
                     if (basename($_SERVER["PHP_SELF"], '.php') !== "compte") : ?>
                        <a href="<?= ROOT_URL; ?>/front/compte.php">Compte</a>
                     <?php endif ?>
                  </li>
               <?php // SI PAS SUR LA PAGE CONNEXION
               elseif (basename($_SERVER["PHP_SELF"], '.php') !== "connexion") : ?>
                  <li class="btn_account">
                     <a class="btn_connect" href="<?= ROOT_URL; ?>/front/connexion.php">
                        <img class="icon_connect" title="Connexion" src="<?= ROOT_URL; ?>/assets/icon/connect.png" alt="login" />
                        Connexion
                     </a>
                  </li>
               <?php endif ?>
            </ul>
         </div>
      </div>

      <!-- BIBLIOTHEQUE -->
      <?php // SI CONNECTE
      if ($connected) : ?>
         <div class="container">
            <label id="btnLibrary" class="btn_library" for="check_library"><img src="<?= ROOT_URL ?>/assets/icon/book0a.png" alt="biblio"></label>
            <input class="check_library" type="checkbox" id="check_library" />
            <div class="content_library">

               <ul id="list_library" class="list_library">
                  <?php ////// RECUP DES PACKAGES ACHETE //////
                  $lib = new Library(new Database(), $_SESSION['Id']);
                  $lib->synchronizeSession(); // vérif synchro panier session <-> BDD
                  ?>
                  <?php for ($i = 0; $i < count($_SESSION['Bibliotheque']['idPack']); $i++) : ?>

                     <li class="thumbnail">
                        <span class="library_title_package"><?= utf8_encode($_SESSION['Bibliotheque']['titrePack'][$i]); ?></span>
                        <a class="library_link" href="<?= ROOT_URL . "/front/fiche.php?id=" . $_SESSION['Bibliotheque']['idPack'][$i] . "&type=packages" ?>">
                           <img src="<?= ROOT_URL . "/assets/img/" . utf8_encode($_SESSION['Bibliotheque']['imgPack'][$i]) . ".jpg" ?>" alt="<?= utf8_encode($_SESSION['Bibliotheque']['titrePack'][$i]); ?>">
                        </a>
                     </li>
                  <?php endfor ?>
               </ul>

            </div>
         </div>
      <?php endif; ?>

      <!-- PANIER -->
      <?php // SI CONNECTE
      if ($connected) : ?>
         <div class="container">
            <?php ////// RECUP DES PACKAGES A ACHETER //////
            $panier = new Panier(new Database(), $_SESSION['Id']);
            $panier->synchronizeSession(); // vérif synchro panier session <-> BDD
            ?>

            <label id="btnBasket" class="btn_basket" for="check_basket">
               <img src="<?= ROOT_URL ?>/assets/icon/basket0b.png" alt="panier">
               <div id="count" class="count"><?= count($_SESSION['Panier']['idPack']) ?></div>
            </label>
            <input class="check_basket" type="checkbox" id="check_basket" />
            <div class="content_basket">

               <ul id="list_basket" class="list_basket">
                  <?php for ($i = 0; $i < count($_SESSION['Panier']['idPack']); $i++) : ?>
                     <li class="thumbnail" data-id="<?= $_SESSION['Panier']['idPack'][$i] ?>">
                        <img id="imgPack" src="<?= ROOT_URL . "/assets/img/" . utf8_encode($_SESSION['Panier']['imgPack'][$i]) . ".jpg" ?>" alt="<?= utf8_encode($_SESSION['Panier']['titrePack'][$i]); ?>">
                        <div class="ui_thumbnail">
                           <span class="basket_title_package"><?= utf8_encode($_SESSION['Panier']['titrePack'][$i]); ?></span>
                           <a id="btnVoir" href="<?= ROOT_URL . "/front/fiche.php?id=" . $_SESSION['Panier']['idPack'][$i] . "&type=packages" ?>"><img src="<?= ROOT_URL ?>/assets/icon/see_icon.png" alt="voir"></a>
                           <div id="btnSuppr"><img id="imgSuppr" src="<?= ROOT_URL ?>/assets/icon/close_icon.png" alt="close"></div>
                           <span class="basket_price_package"><?= utf8_encode($_SESSION['Panier']['prixPack'][$i]); ?> &euro;</span>
                        </div>
                     </li>
                  <?php endfor ?>
               </ul>

               <div id="openModal">Valider votre Panier</div>

            </div>
         </div>
      <?php endif ?>

      <?php // LIEN BACK -> SI CONNECTE
      if ($connected && $_SESSION['Id_type'] === '1') : ?>
         <div class="container">
            <a class="door" href="<?= ROOT_URL . "/back/back.php" ?>">
               <img src="<?= ROOT_URL ?>/assets/icon/door_icon.png" alt="back-door">
            </a>
         </div>
      <?php endif ?>

   </nav>

   <?php if ($connected) : ?>
      <!-- MODAL BOX -->
      <div id="myModal" class="myModal">

         <span id="closeModal" class="closeModal">&times;</span>

         <div id="modalContent" class="modalContent">
            <ul id="shopping_list">
               <?php $total_price = 0 ?>
               <?php for ($i = 0; $i < count($_SESSION['Panier']['idPack']); $i++) :  ?>
                  <?php $total_price = intval($total_price) + intval($_SESSION['Panier']['prixPack'][$i]); ?>
                  <li class="modal_thumbnail" data-id="<?= $_SESSION['Panier']['idPack'][$i] ?>">
                     <img id="imgPack" src="<?= ROOT_URL . "/assets/img/" . utf8_encode($_SESSION['Panier']['imgPack'][$i]) . ".jpg" ?>" alt="<?= utf8_encode($_SESSION['Panier']['titrePack'][$i]); ?>">
                     <span class="basket_price_package"><?= utf8_encode($_SESSION['Panier']['prixPack'][$i]); ?> &euro;</span>
                  </li>
               <?php endfor ?>
            </ul>

            <div class="caption">
               <span id="total_price">Total : <div id="price"><?= $total_price ?></div> &euro;</span>
               <span>Valider l'achat ?</span>
               <div id="btn_buy_yes">Oui</div>
               <div id="btn_buy_non">Non</div>
            </div>

         </div>

      </div>

   <?php endif ?>

</header>