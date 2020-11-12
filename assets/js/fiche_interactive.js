//// Dimensionnement adaptatif au nombre d'images
let panneau_elemsPack = document.querySelector(".imgs_pack");
let list_elemsPack = document.querySelector(".list_elem_pack");
let elemsPack = panneau_elemsPack.children;

// Dimensionnement celon le nb imgs
for (let i = 0; i < panneau_elemsPack.children.length - 1; i++) elemsPack[i].style.width = `${100 / (panneau_elemsPack.children.length - 1)}%`;

panneau_elemsPack.addEventListener("click", (e) => {
   if (e.target.tagName === "IMG") {
      // suppression de la class 'selected' de l'element qu'il l'avait prescedement
		list_elemsPack.getElementsByClassName("selected")[0].classList.remove("selected");
		panneau_elemsPack.getElementsByClassName("selected")[0].classList.remove("selected");
      // récupere l'index de l'element sélectionné dans la liste
      let indexElem = [...e.target.parentNode.children].indexOf(e.target);
      // ajout a l'element de la class 'selected'
      list_elemsPack.children[indexElem].classList.add("selected");
      panneau_elemsPack.children[indexElem].classList.add("selected");
   }
});
