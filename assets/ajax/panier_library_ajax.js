///////////////////////////////////////////////////////////////
//-----> PANIER ET BIBLIO PRESENT SUR TOUTES LES PAGES <-----//
///////////////////////////////////////////////////////////////

let basket = document.getElementById("list_basket");
let open_basket_btn = document.getElementById("btnBasket");
let check_basket = document.getElementById("check_basket");
let article_count = document.getElementById("count");
let openModal = document.getElementById("openModal");

let add_btns = document.querySelectorAll(".add_to_basket");

let library = document.getElementById("list_library");
let open_library_btn = document.getElementById("btnLibrary");
let check_library = document.getElementById("check_library");

let Modal = document.getElementById("myModal");
let shopping_list = document.getElementById("shopping_list");
let price = document.getElementById("price");

const url = new URL("/test/Personal_learning_v0.2", "http://localhost:8000"); // cretion chemin global
const GET_url = new URL(window.location.href); // extraction des param GET de l'url courante

//////////////////// INTERACTIONS BOUTONS PANIER ////////////////////
if (basket !== null) {
   open_basket_btn.addEventListener("click", (e) => {
      doubleCssToggleOnEvent(e.currentTarget, "clickBtn", 200);
      if (basket.children.length === 0) {
         basket.parentNode.style.display = "none";
         // messageBubble(basket.parentNode.parentNode, "Votre panier est vide", "info");
      } else {
         basket.parentNode.style.display = "";
         if (check_library.checked == true) check_library.checked = false;
      }
   });

   // utilisation interface vignette
   basket.addEventListener("click", (e) => {
      // SI click vignettes
      if (e.target.id === "imgPack") {
         e.target.nextElementSibling.classList.remove("ui_close");
         e.target.nextElementSibling.classList.add("ui_open");
      }
      // SI click interface vignettes
      if (e.target.className.search("ui_thumbnail") !== -1) {
         e.target.classList.add("ui_close");
         e.target.classList.remove("ui_open");
      }
      if (e.target.id === "imgSuppr") {
         removeFromBasket(e.target.parentNode.parentNode.parentNode);
         if ((add_btns = document.querySelector(".add_to_basket")) !== null) add_btns.classList.remove("disabled");
      }
   });

   // bouton des fiches produits
   add_btns.forEach((element) => {
      element.addEventListener("click", (e) => {
         addToBasket();
         element.classList.add("disabled");
      });
   });

   // ouvre la modal box avec le detail du panier et la confirmation d'achat
   openModal.addEventListener("click", (e) => {
      Modal.style.display = "flex";
   });

   // VALIDATION DES ACHATS => MODAL ou redirection page paymant (iframe paypal ?)
   Modal.addEventListener("click", (e) => {
      // fermeture de la modale sur click de la "X"
      if (e.target.id === "closeModal") Modal.style.display = "none";
      // VALIDATION ACHAT
      else if (e.target.id === "btn_buy_yes") {
         doubleCssToggleOnEvent(e.target, "click_BBBB", 200);
         purchaseValidation();
         Modal.style.display = "none";
      }
      // fermeture de la modale
      else if (e.target.id === "btn_buy_non") {
         doubleCssToggleOnEvent(e.currentTarget, "click_BBBB", 200);
         Modal.style.display = "none";
      }
   });
}
//////////////////// INTERACTIONS BOUTONS BIBLIO ////////////////////
if (library !== null) {
   open_library_btn.addEventListener("click", (e) => {
      doubleCssToggleOnEvent(e.currentTarget, "clickBtn", 200);
      if (library.children.length === 0) {
         library.parentNode.style.display = "none";
         //messageBubble(library.parentNode.parentNode, "Votre panier est vide", "info");
      } else {
         library.parentNode.style.display = "";
         if (check_basket.checked == true) check_basket.checked = false;
      }
   });
}
//////////////////// FONCTIONS GENERALES ////////////////////

function messageBubble(my_parent_element, text, type) {
   // message type values = 'alert' or 'info'
   my_parent_element.innerHTML += `<div id="message_bubble"><span class="message_content_text ${type}_message">${text}</span></div>`;
   setTimeout(() => {
      my_parent_element.removeChild(document.querySelector("#message_bubble"));
   }, 3000);
}

//////////////////// FONCTIONS AJAX ////////////////////

function addToBasket() {
   let xhr = new XMLHttpRequest();
   let post = new FormData();

   xhr.onreadystatechange = () => {
      // SI reponse terminé et ok ...
      if (xhr.readyState === 4 && xhr.status === 200) {
         let response = JSON.parse(xhr.responseText);

         // Si une erreur
         if (response.status === 400) console.log(response.error);
         // messageBubble(basket.parentNode.parentNode, response.error, "alert");
         // SINON ON A EU CE QUE L'ON VEUT !!!! TRAITEMENT RESULTAT REQUETE =>
         else {
            // incrémentation du COMPTEUR d'articles
            article_count.innerHTML = parseInt(article_count.innerHTML) + 1;
            // messageBubble(basket.parentNode.parentNode, response.ok, "info");

            // AJOUT DU PRODUIT d'une fiche a la LISTE d'articles
            basket.innerHTML += `
            <li class="thumbnail" data-id="${response.Picture_package}">
               <img id="imgPack" src="${url.href}/assets/img/${response.Picture_package}.jpg" alt="${response.Title_package}">
               <div class="ui_thumbnail">
                  <span class="basket_title_package">${response.Title_package}</span>
                  <a id="btnVoir" href="${url.href}/front/fiche.php?id=${response.Id_package}&type=packages"><img src="${url.href}/assets/icon/see_icon.png" alt="voir"></a>
                  <div id="btnSuppr"><img id="imgSuppr" src="${url.href}/assets/icon/close_icon.png" alt="close"></div>
                  <span class="basket_price_package">${response.Price_package} &euro;</span>
               </div>
            </li>`;

            // REMPLISSAGE 'FACTURE'
            shopping_list.innerHTML += `
               <li class="modal_thumbnail" data-id="${response.Picture_package}"> 
                  <img id="imgPack" src="${url.href}/assets/img/${response.Picture_package}.jpg" alt="${response.Title_package}">
                  <span class="basket_price_package">${response.Price_package} &euro;</span>
               </li>`;

            // total_price.innerHTML = parseFloat(total_price.innerText) + parseFloat(response.Price_package);
            price.innerText = parseFloat(price.innerText) + parseFloat(response.Price_package);
            console.log(price.innerText);
         }
      }
   };

   // remplissage du formulaire avec les donnees attendu
   post.append("Id", GET_url.searchParams.get("id"));
   post.append("Id_user", id_user);
   post.append("Table", GET_url.searchParams.get("type"));
   post.append("Action", "add");

   // => ENVOI POST AU PHP QUI FERA LA REQUETE BDD
   xhr.open("POST", url.href + "/assets/ajax/panier_library_ajax.php", true);
   xhr.send(post);
}

function removeFromBasket(target) {
   let xhr = new XMLHttpRequest();
   let post = new FormData();

   idPack = target.dataset.id;

   xhr.onreadystatechange = () => {
      // SI reponse terminé et ok ...
      if (xhr.readyState === 4 && xhr.status === 200) {
         let response = JSON.parse(xhr.responseText);

         // Si une erreur
         if (response.status === 400) console.log(response.error);
         // messageBubble(basket.parentNode.parentNode, response.error, "alert");
         // SINON ON A EU CE QUE L'ON VEUT !!!! TRAITEMENT RESULTAT REQUETE =>
         else {
            // décrémentation du COMPTEUR d'articles
            article_count.innerHTML = parseInt(article_count.innerHTML) - 1;
            // messageBubble(basket.parentNode.parentNode, response.ok, "info");

            // SUPPRESSION D'UN PRODUIT DU PANIER
            basket.removeChild(target);

            if (basket.children.length === 0) basket.parentNode.style.display = "none";

            // MODIF FACTURE
            // console.log(Modal.querySelector('.basket_price_package').innerText); //---------------
            rmvPackPrice = Modal.querySelector('.basket_price_package').innerText.split(' €')[0]; //recup prix total
            // console.log(price.innerText+' - '+rmvPackPrice); //---------------------
            price.innerText = parseFloat(price.innerText) - parseFloat(rmvPackPrice);
            // console.log(price.innerText); //---------------------
            
            document.querySelectorAll('.modal_thumbnail').forEach( (elem) => {
               if(elem.dataset.id === idPack) shopping_list.removeChild(elem);
            });


            // if ((add_btns = document.querySelector(".add_to_basket")) !== null && idPack) add_btns.classList.remove("disabled"); //-------------------------
         }
      }
   };

   // remplissage du formulaire avec les donnees attendu
   post.append("Id", idPack);
   post.append("Id_user", id_user);
   post.append("Action", "remove");

   // => ENVOI POST AU PHP QUI FERA LA REQUETE BDD
   xhr.open("POST", url.href + "/assets/ajax/panier_library_ajax.php", true);
   xhr.send(post);
}

function purchaseValidation() {
   let xhr = new XMLHttpRequest();
   let post = new FormData();

   xhr.onreadystatechange = () => {
      // SI reponse terminé et ok ...
      if (xhr.readyState === 4 && xhr.status === 200) {
         let response = JSON.parse(xhr.responseText);

         // Si une erreur
         if (response.status === 400) console.log(response.error);
         // messageBubble(basket.parentNode.parentNode, response.error, "alert");
         // SINON ON A EU CE QUE L'ON VEUT !!!! TRAITEMENT RESULTAT REQUETE =>
         else {
            // réinitialise le COMPTEUR d'articles
            article_count.innerHTML = 0;
            // messageBubble(basket.parentNode.parentNode, response.ok, "info");

            // Changement du bouton
            newBtn = document.querySelector(".add_to_basket");
            newBtn.className = 'play_medium';
            newBtn.innerHTML = 'Lancer';

            // AJOUT DES PRODUITS a la bibliotheque
            for (let i = 0; i < response.length; i++) {
               library.innerHTML += `
                  <li class="thumbnail">
                     <span class="library_title_package">${response[i].Title_package}</span>
                     <a class="library_link" href="${url.href}/front/fiche.php?id=${response[i].Id_package}&type=packages">
                        <img src="${url.href}/assets/img/${response[i].Picture_package}.jpg" alt="${response[i].Title_package}">
                     </a>
                  </li>`;
            }

            // VIDAGE du panier
            basket.innerHTML = "";

            // VIDAGE 'FACTURE'
            shopping_list.innerHTML = "";
            price.innerText = "";

            if (basket.children.length === 0) basket.parentNode.style.display = "none";
         }
      }
   };

   // remplissage du formulaire avec les donnees attendu
   post.append("Id_user", id_user);
   post.append("Action", "buy");

   // => ENVOI POST AU PHP QUI FERA LA REQUETE BDD
   xhr.open("POST", url.href + "/assets/ajax/panier_library_ajax.php", true);
   xhr.send(post);
}