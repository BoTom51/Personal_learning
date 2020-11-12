<header>
   
   <!-- /////////////// BANNIERE / LOGO /////////////// -->
   <h1>PERSONAL LEARNING</h1>

   <!-- /////////////// BARRE DE NAVIGATION /////////////// -->
   <nav>
      <!-- INTERFACE NAVIGATION -->
      <ul class="ui_nav">
         <li><?= 
            (basename($_SERVER["PHP_SELF"], '.php') === "index") ? '<a class="current_page" href="'.ROOT_URL.'">Accueil</a>'
            : '<a href="'.ROOT_URL.'">Accueil</a>';
         ?></li>
         <li><?= 
            ( (basename($_SERVER["PHP_SELF"], '.php') === "recherche") && ($_GET['action'] === 'articles') ) ? '<a class="current_page" href="'.ROOT_URL.'/front/recherche.php?action=articles">Articles</a>'
            : '<a href="'.ROOT_URL.'/front/recherche.php?action=articles">Articles</a>';
         ?></li>
         <li><?= 
            ( (basename($_SERVER["PHP_SELF"], '.php') === "recherche") && ($_GET['action'] === 'lessons') ) ? '<a class="current_page" href="'.ROOT_URL.'/front/recherche.php?action=lessons">Cours</a>'
            : '<a href="'.ROOT_URL.'/front/recherche.php?action=lessons">Cours</a>';
         ?></li>
         <li><?=
            ( (basename($_SERVER["PHP_SELF"], '.php') === "recherche") && ($_GET['action'] === 'exercices') ) ? '<a class="current_page" href="'.ROOT_URL.'/front/recherche.php?action=exercices">Exercices</a>'
            : '<a href="'.ROOT_URL.'/front/recherche.php?action=exercices">Exercices</a>';
         ?></li>
      </ul>
      <!-- INTERFACE RECHERCHE -->
      <ul class="ui_search">
         <li>Recherche</li>
      </ul>
      <!-- INTERFACE DE COMPTE -->
      <ul class="ui_account">
         <?php // SI CONNECTE
         if (be_connect()) : ?>
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
   </nav>

</header>