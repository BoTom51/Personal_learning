<header>

   <!-- /////////////// BANNIERE / LOGO /////////////// -->
   <h1>PERSONAL LEARNING</h1>

   <!-- /////////////// BARRE DE NAVIGATION /////////////// -->
   <nav class="menuBurger">
      <div class="container">
         <!-- INTERFACE NAVIGATION -->
         <!-- MENU hamberger -->
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
               if (be_connect()) : ?>
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
      if (be_connect()) : ?>
         <div class="container">
            <label class="btn_library" for="check_library"><img src="<?= ROOT_URL ?>/assets/icon/book0a.png" alt="biblio"></label>
            <input class="check_library" type="checkbox" id="check_library" />
            <div class="content_library">
               <ul class="list_lybrary">
                  <li>ljhgfhjfdh</li>
                  <li>ljhgfhjfdh</li>
                  <li>ljhgfhjfdh</li>
               </ul>
            </div>
         </div>
      <?php endif; ?>

      <!-- PANIER -->
      <div class="container">
         <label class="btn_basket" for="check_basket">
            <img src="<?= ROOT_URL ?>/assets/icon/basket0b.png" alt="panier">
            <div class="count"><?= '8' ?></div>
         </label>
         <input class="check_basket" type="checkbox" id="check_basket" />
         <div class="content_basket">
            <ul class="list_basket">
               <li>ljhgfhjfdh</li>
               <li>ljhgfhjfdh</li>
               <li>ljhgfhjfdh</li>
            </ul>
         </div>
      </div>

   </nav>

</header>