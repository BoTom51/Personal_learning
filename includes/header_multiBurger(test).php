<?php
require_once './class/Autoloader.php';
Autoloader::register(); //charge automatiquement tous les fichers de class a leur appel
require_once './session.php';
require_once '../config.php';
require_once './functions/functions_carrousel.php';
if (session_status() === PHP_SESSION_NONE) session_start(); // Ouvre la session si pas deja ouverte
// echo '<pre>'; var_dump($_SESSION); echo '</pre><<< SESSION >>>';//-----------------
?>
<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TEST</title>

   <!-- CSS GLOBAL -->
   <link rel="stylesheet" href="<?= ROOT_URL; ?>/assets/css/document.css" />
   <link rel="stylesheet" href="<?= ROOT_URL; ?>/assets/css/header_multiBurger.css" />

</head>

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
      //if (be_connect()) : ?>
      <div class="container">
         <label class="btn_library" for="check_library"><img src="../assets/icon/book0a.png" alt="biblio"></label>
         <input class="check_library" type="checkbox" id="check_library" />
         <div class="content_library">
            <ul class="list_lybrary">
               <li>ljhgfhjfdh</li>
               <li>ljhgfhjfdh</li>
               <li>ljhgfhjfdh</li>
            </ul>
         </div>
      </div>
      <?php //endif ?>

      <!-- PANIER -->
      <div class="container">
      <label class="btn_basket" for="check_basket"><img src="../assets/icon/basket0b.png" alt="panier"></label>
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

<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo corrupti necessitatibus praesentium expedita libero facilis labore consequuntur molestiae ut vero unde, sapiente porro cum reiciendis explicabo veniam non, voluptatem dignissimos?
   Sed pariatur autem quod fuga repellat, debitis quo ipsa rerum? Nisi non sunt blanditiis ab eligendi eveniet nesciunt beatae adipisci cum molestias. Officia hic assumenda nobis quis! Officiis, illo animi!
   Voluptatem, asperiores fuga. Necessitatibus veritatis eaque, vel dolor accusantium rem nihil nostrum minima laborum reprehenderit animi consequuntur voluptate odio laudantium sunt distinctio nam sint sit similique nesciunt ad, vero quasi.
   Ad doloremque ratione dolor sapiente voluptatibus laboriosam, minus sunt eum iste numquam vitae rerum unde aliquam saepe, explicabo, harum repellat libero alias. Aspernatur similique ut quia ratione ipsa eum repellendus.
   Quis, nihil laboriosam ex optio fugiat quisquam, eaque quia maxime ut error dolorum, dolor veniam illum! Animi tempore quia modi eum tenetur dolorem commodi vel totam perspiciatis, excepturi temporibus minima.
   Modi, ad. Corporis vitae voluptatem reprehenderit officia voluptatibus eius eaque pariatur. Ratione itaque beatae velit veritatis nam, enim fugiat magnam perspiciatis quia vitae! Pariatur ab molestias exercitationem adipisci, placeat ut.
   Id laboriosam reiciendis molestiae, necessitatibus cum, fuga perspiciatis magnam facilis saepe inventore, dicta consectetur alias laudantium accusantium sequi vel repudiandae dolor quos autem eveniet. Minima magni praesentium quisquam eius alias.
   Natus, rem dolorum debitis, corporis quod eius molestiae alias est tempora consequatur laboriosam officiis recusandae placeat reiciendis quibusdam delectus dolor impedit velit vel nemo sequi at animi molestias! Modi, vero?
   Deleniti blanditiis corrupti sapiente obcaecati, quaerat nam sunt iure fuga rem nobis at voluptates dolorem, beatae aspernatur! Natus fugit esse placeat laborum aliquam nesciunt hic, repellat error velit nostrum ad.
   Et vel iure, sed molestiae doloremque ducimus aperiam hic soluta vero eos rerum quod, fuga pariatur consectetur officiis similique esse? Tempore molestias eaque officiis et obcaecati adipisci porro repellat assumenda.
   Sunt alias expedita quaerat earum eum provident, harum, illum vitae eaque reiciendis asperiores molestias laborum, dicta quo consequuntur facilis! Minima ipsa consectetur facere maiores dolorem sit vero in laborum hic.
   Error maiores accusantium repellat voluptatem esse ut dolorem deleniti recusandae accusamus nostrum odit exercitationem, magni libero nihil ipsum. Quasi quos harum possimus ut exercitationem accusantium ab tenetur voluptas magnam minus!
   Quos pariatur est sapiente fuga culpa eos beatae at alias quisquam nesciunt, nam veritatis quod qui! Placeat, blanditiis tempore error numquam sed asperiores quidem repudiandae dolore, quas perspiciatis voluptate facilis!
   Fuga temporibus iusto accusantium ipsam facere provident quaerat recusandae. Assumenda rem voluptatum est? Aspernatur officia illum sed suscipit dolore? Molestiae ipsam nisi quo aliquid molestias nesciunt eius reprehenderit totam officiis?
   Quaerat tempore ipsam voluptatum, rem velit ducimus quam eveniet odio! Vero magnam labore eius est repudiandae nulla corporis id dolorum incidunt doloremque laboriosam, possimus quod quaerat cupiditate voluptatibus eveniet dicta.
   Earum dolore minus alias inventore, commodi beatae. Impedit nemo nam ea odit maxime omnis perferendis dicta voluptatibus porro libero quaerat nisi necessitatibus explicabo cumque harum temporibus, voluptatum voluptas repellendus iure!
   Possimus quo officiis sed fugit eligendi, distinctio tenetur et modi iure esse reiciendis illo praesentium velit cumque dolores, molestias quibusdam reprehenderit incidunt! Laboriosam, praesentium laudantium ratione velit ad sed ipsam?
   Iure veritatis tenetur, vitae architecto sit voluptatem neque saepe at quos natus ducimus earum, laboriosam sint nesciunt maiores, corrupti doloribus iste vel atque provident quaerat consectetur esse. Accusantium, unde deserunt!
   Minima placeat explicabo aspernatur dolore eaque corrupti corporis accusamus amet obcaecati natus molestiae eveniet, nulla provident. Architecto deserunt illum magnam. Commodi fugiat autem magnam ducimus? Exercitationem nisi totam modi dolor.
   Commodi reprehenderit porro laborum. Laboriosam ea eius cum aspernatur hic nulla sed nostrum quod voluptatibus perferendis libero rem fuga sapiente facilis, error suscipit repellendus? Ducimus, quisquam sunt. Quo, at! Animi!
   Nisi voluptate, illo eligendi commodi velit dolores cumque natus amet totam. Repellendus impedit ducimus, iste quisquam numquam dolor rerum nam, voluptatem deleniti quis perferendis, quibusdam unde officia perspiciatis minus molestiae.
   Consequuntur, accusamus? Quae, totam quis repellendus quibusdam, at cum commodi ex porro perspiciatis voluptas dolorem accusamus quos suscipit, deleniti odit saepe maxime ad qui voluptatibus! Illo, esse doloremque? Quia, architecto?
   Hic quo explicabo non aliquam dolore soluta laudantium accusantium, excepturi tenetur labore laborum. Officiis exercitationem atque, magnam id facere debitis expedita sequi mollitia eos tenetur, quo, eligendi aliquam ipsam. Odio.
   Modi numquam quos obcaecati nemo ea, nisi officiis tempore magni porro itaque adipisci laudantium veniam perspiciatis nesciunt dolorum, mollitia sequi rerum praesentium molestiae repudiandae aliquid. Accusantium, adipisci enim! In, veritatis.
   Repellendus placeat aliquid nam dolore quidem saepe officiis a. Quasi quis, corporis, sed iste qui delectus quaerat ipsum, accusamus impedit illum non veritatis? Repellendus, dolores debitis illum adipisci tenetur nulla?
   Voluptatum quam praesentium hic officiis corrupti tempore modi minima, adipisci consequatur dolores! Perferendis, quisquam fuga vero dicta saepe consequatur tenetur recusandae impedit fugiat illo dolor deserunt dolores asperiores, qui facilis.
   Magni sit dolor commodi quam aperiam voluptatibus ipsum id omnis similique adipisci non, dicta quaerat! Amet accusantium est, asperiores cum iusto illo odit optio quas, consectetur, commodi dolores voluptate quos?
   A neque quibusdam sapiente adipisci. Alias eveniet recusandae magnam optio dolor veniam, rem consequuntur exercitationem iusto possimus dolorem non accusantium maxime nostrum quo soluta animi quos laborum quasi harum corrupti.
   Recusandae temporibus corrupti quod quibusdam eius delectus? Animi, similique. Numquam quos illum hic? Illo, iste repellendus quia illum laboriosam iusto deserunt optio, quod veritatis voluptatum eveniet corrupti tempore totam eum.
   Ad delectus impedit laudantium doloremque animi at reprehenderit ipsam ipsum similique sapiente atque quasi maxime debitis porro minima iure odit iste, alias mollitia ab! Minus aliquam exercitationem beatae impedit! Blanditiis.
   Voluptatem corporis laborum reiciendis debitis! Repudiandae ducimus officiis earum dolorem aperiam commodi explicabo aliquid! Deleniti aliquam iste facere at provident dicta, non, nam alias doloremque ad debitis iusto illo maiores?
   Incidunt, similique ratione deleniti odit ullam, quia tempora expedita repellat sequi voluptatum nesciunt obcaecati quod numquam, eos et laborum dolorem cum sed totam? Recusandae voluptates, alias porro adipisci doloribus velit!
   Ratione, adipisci a aliquid officia exercitationem fugit enim laudantium deleniti! Sit nulla non illo necessitatibus quibusdam tempore libero aliquam vero. Aliquid similique atque iure cupiditate cum corporis culpa dolorum sapiente?
   Consectetur reprehenderit minus delectus obcaecati eligendi doloremque deleniti dolorum fugiat ea totam veritatis autem quisquam aperiam, id explicabo! Possimus, deserunt deleniti cumque distinctio nulla excepturi magnam quis aliquam quibusdam numquam!
   Explicabo minus necessitatibus harum aspernatur eaque? Quae enim accusamus, itaque quis aliquam assumenda impedit voluptatum sint nulla perspiciatis nisi consequuntur mollitia voluptatibus similique earum. Magnam tempora commodi ipsam unde dignissimos.
   Delectus aperiam necessitatibus consequuntur quod modi corporis magnam atque neque autem! Nihil minus culpa dicta nam pariatur dolore incidunt inventore, illum modi assumenda quos? Earum tenetur voluptates harum error quibusdam!
   Tempore illo nihil, praesentium exercitationem sunt, unde odit deserunt corporis pariatur harum cumque commodi rerum accusantium quisquam ipsa repudiandae. Tempore non voluptatibus, est voluptas hic quos labore quod architecto assumenda!
   Non beatae sed odit quidem deserunt laboriosam earum dolor? Harum officiis veritatis doloribus impedit aut ipsa, labore rem sed eligendi reprehenderit provident accusamus sapiente excepturi asperiores quidem culpa nobis. Alias?
   Dolore earum soluta dolor quam odit, illo vel voluptates aut eligendi harum unde! Placeat, laborum sequi? Ad nihil suscipit nulla, quae corporis quidem laudantium hic optio minus deleniti animi? Eveniet?
   Praesentium tenetur cupiditate, iusto maxime sapiente pariatur nulla magnam eligendi quos molestias atque magni necessitatibus optio vero provident vitae asperiores quod laborum dignissimos blanditiis! Sunt aliquam quia error voluptates dolor.
   Nesciunt laborum unde quis libero dolore totam molestiae sapiente esse qui beatae ullam alias quo debitis, quasi corrupti amet porro fugit neque quos nulla odit praesentium ipsa molestias. Repellendus, eos?
   Porro quia placeat necessitatibus reiciendis quam laudantium molestias eveniet fuga vitae voluptates deserunt corrupti, nemo, dolor atque at iste, qui assumenda ullam veniam sequi ipsam corporis distinctio quae impedit. Officiis?
   Minima, quia architecto. Recusandae amet maxime labore, eaque deserunt praesentium minima cumque facilis voluptatem at quos omnis exercitationem officiis culpa. Aspernatur architecto, vero fuga ab unde culpa aliquid adipisci nemo?
   Id molestiae dolor veritatis cum cupiditate voluptate unde debitis commodi natus sequi. Voluptatum consectetur error totam officia officiis doloremque a in voluptate, sed nisi, adipisci, eos veritatis sit? Officia, quod!
   Excepturi quis, veniam similique laborum, expedita officia dicta incidunt placeat repellat molestiae accusamus accusantium temporibus soluta dolores earum eius mollitia harum eum? Ipsum molestias similique cumque eligendi iusto, obcaecati recusandae.
   Facere doloremque ipsa suscipit error nihil explicabo, doloribus mollitia voluptas optio iusto fugiat inventore magnam exercitationem quis numquam recusandae ipsum assumenda? Quasi quisquam quibusdam, quis quia doloribus praesentium amet totam.
   Ab sit eum debitis accusantium esse dolor suscipit? Quaerat ab harum placeat dignissimos! Vero, quae voluptatem ipsum repellendus consequatur deleniti iure id saepe voluptas? Ipsa ex omnis doloremque error cumque.
   Voluptates cum, animi explicabo fugit optio hic veritatis voluptatum quasi molestiae nulla dolore, facilis sequi repellat omnis. Magni et dolore recusandae accusantium voluptas, inventore, placeat, mollitia impedit laudantium distinctio est?
   Impedit adipisci fuga assumenda earum quasi, maxime accusamus ipsam quae corrupti, blanditiis architecto obcaecati illo necessitatibus vel voluptatum ab aspernatur ad explicabo. Facere rerum est ullam dolores ipsum, dolorum veniam!
   Voluptas impedit aspernatur voluptatum iure sequi adipisci ab odit! Amet modi vel iure, optio at excepturi laboriosam explicabo accusamus inventore odit debitis nostrum itaque, molestiae alias voluptate autem deserunt vero.</div>


   <script src="../assets/ajax/action_panier_ajax.js"></script>