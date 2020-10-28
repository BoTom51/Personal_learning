      <header>
         <!-- /////////////// BANNIERE / LOGO /////////////// -->
         <h1>PERSONAL LEARNING</h1>
         <!-- /////////////// BARRE DE NAVIGATION /////////////// -->
         <nav>
            <!-- INTERFACE NAVIGATION -->
            <!-- on souligne l'onglet représentant la page active et le désactive (GET ?) -->
            <ul class="ui_nav">
               <li><a href="">Accueil</a></li>
               <li><a href="./front/recherche.php?action=0">Articles</a></li>
               <li><a href="./front/recherche.php?action=1">Cours</a></li>
               <li><a href="./front/recherche.php?action=2">Exercices</a></li>
            </ul>
            <!-- INTERFACE RECHERCHE -->
            <ul class="ui_search">
               <li>Recherche</li>
            </ul>
            <!-- INTERFACE DE COMPTE -->
            <ul class="ui_account">
               <?php if (be_connect()) : ?>
               <li class="btn_account">
                  <a class="btn_disconnect" href="./includes/session_close.php"><img class="icon_disconnect" title="Déconnexion" src="./assets/icon/disconnect.png" alt="Déconnexion" /></a>
                  <a href="./front/compte.php">Compte</a>
               </li>
               <?php else : ?>
               <li class="btn_account">
                  <a class="btn_connect" href="./front/connexion.php">
                     <img class="icon_connect" title="Connexion" src="./assets/icon/connect.png" alt="login" />
                     Connexion
                  </a>
               </li>
               <?php endif ?>
            </ul>
         </nav>
      </header>