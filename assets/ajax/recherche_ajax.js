let submit = document.querySelector('input[type="submit"]');
let input = document.getElementById("inputSearch");
let list = document.querySelector(".list");
let classesCard; // mémorise les classes

// execution du script sur soumission du formulaire
submit.addEventListener("click", (e) => {
   e.preventDefault(); // interseption du formulaire par JS

   // recupération de l'objet DOM form et cretion d'un objet JS form représentant le form HTML
   let form = document.getElementById("formSearch");
   let formData = new FormData(form);

   let xhr = new XMLHttpRequest();

   xhr.onreadystatechange = () => {
      // SI reponse terminé et ok ...
      if (xhr.readyState === 4 && xhr.status === 200) {
         // console.log(xhr);
         let response = JSON.parse(xhr.responseText);
         // console.log(response);

         // Si une erreur
         if (response.status === 400) {
            list.innerHTML = '<span id="query_display" class="query_display"></span>';
            let query_display = document.getElementById("query_display");
            query_display.innerHTML = response.error;
         }
         // Si une erreur "prévu" est retournée
         else if (response.status === 201) {
            list.innerHTML = '<span id="query_display" class="query_display"></span>';
            let query_display = document.getElementById("query_display");
            query_display.innerHTML = response.error;
         }
         // SINON ON A EU CE QUE L'ON VEUT !!!! TRAITEMENT RESULTAT REQUETE =>
         else {
            formData.set("key_word", "");

            // mise a jour de la liste des resultats
            if (list.className === "list list_mosaic") classesCard = "card card_mosaic";
            else classesCard = "card card_inline";
            list.innerHTML = "";

            for (let i = 0; i < response.length; i++) {
               // TRAITEMENT des donnees pour affichage
               let type, price, id_type;
               if (typeof response[i].Id_lesson !== "undefined") {
                  id_type = response[i].Id_lesson;
                  type = "lessons";

                  if (typeof response[i].Price_package !== "undefined") {
                     if (response[i].Price_package !== "0") price = `<strong class="product_price">PACKAGE : ${response[i].Price_package}€</strong>`;
                     else price = `<strong class="product_price">${response[i].Price}€</strong>`;
                  }
               } else if (typeof response[i].Id_exercice !== "undefined") {
                  id_type = response[i].Id_exercice;
                  type = "exercices";

                  if (typeof response[i].Price_package !== "undefined") {
                     if (response[i].Price_package !== "0") price = `<strong class="product_price">PACKAGE : ${response[i].Price_package}€</strong>`;
                     else price = `<strong class="product_price">${response[i].Price}€</strong>`;
                  }
               } else {
                  id_type = response[i].Id_article;
                  type = "articles";
                  price = "";
               }

               // AFFICHAGE
               list.innerHTML += `
               <card class="${classesCard}">
                  <a class="lien_recomm" href="./fiche.php?id=${id_type}&type=${type}">
                     <img src="../assets/img/${response[i].Picture}.jpg" alt="${response[i].Title}">
                     <info class="block_info">
                        <h3>${response[i].Title}</h3>
                        <describe class="describe">${response[i].Describ.substr(0, 180)} ...</describe>
                        <strong class="category">${response[i].Category_name}</strong>
                        <strong class="sub_category">${response[i].Sub_category_name}</strong>
                        <strong class="formation">${response[i].Formation_name}</strong>
                        <strong class="niveau">${response[i].Niveau_name}</strong>
                        <strong class="article_date">${response[i].Date}</strong>          
                        ${price}
                     </info>
                  </a>
               </card>`;
            }
         }
      }
   };

   xhr.open("POST", "../assets/ajax/recherche_ajax.php", true);
   xhr.send(formData);
});
