let btnLine = document.getElementById("alignMosaic");
let btnColumn = document.getElementById("alignColumn");
let tabLists = document.querySelectorAll(".list");
let tabCards = document.querySelectorAll(".card");
btnLine.classList.toggle('active');

//////////// On change le type de liste AU CLICK sur les boutons ////////////

btnLine.addEventListener("click", () => {
   if (tabLists[0].className.search("list_mosaic") === -1) {
      tabLists[0].className = tabLists[0].className.replace("list_column", "list_mosaic");
      btnLine.classList.toggle('active');
      btnColumn.classList.toggle('active');

      for (let i = 0; i < tabCards.length; i++) {
         tabCards[i].className = tabCards[i].className.replace("card_inline", "card_mosaic");
      }
   }
});

btnColumn.addEventListener("click", () => {
   if (tabLists[0].className.search("list_column") === -1) {
      tabLists[0].className = tabLists[0].className.replace("list_mosaic", "list_column");
      btnColumn.classList.toggle('active');
      btnLine.classList.toggle('active');

      for (let i = 0; i < tabCards.length; i++) {
         tabCards[i].className = tabCards[i].className.replace("card_mosaic", "card_inline");
      }
   }
});
