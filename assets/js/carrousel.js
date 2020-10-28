let carouselS = document.querySelectorAll("#carousel");

carouselS.forEach((element) => {
   let rail = element.querySelector("#rail");
   let btnSuiv = element.querySelector("#btnSuiv");
   let btnPrec = element.querySelector("#btnPrec");
   let nbSlides = rail.children.length; // nombre de slides

   //-------- init au chargement de la page --------//
   rail.style.left = 0 + "%"; // met le rail contre le bord gauche
	// dimension dynamique du rail
	// l'attribut 'imgperframe' du carrousel détermine le nombre d'img visible
	// l'attribut 'pasduslide' du carrousel détermine de combien d'img il glisse
   rail.style.width = `${(nbSlides * 100) / element.dataset.imgperframe}%`;

   // Click fleches
   btnSuiv.addEventListener("click", () => {
      if (parseInt(rail.style.left) > Math.round(100 - ((nbSlides / element.dataset.imgperframe) * 100))) {
			rail.style.left = Math.round(parseInt(rail.style.left) - 100 / element.dataset.pasduslide) + "%";
			// console.log("limite : ",Math.round(100 - (nbSlides / element.dataset.imgperframe) * 100));
			// console.log("le pas : ",Math.round(parseInt(rail.style.left) - 100 / element.dataset.imgperframe));
      }
   });
   btnPrec.addEventListener("click", () => {
      if (parseInt(rail.style.left) < 0) {
			rail.style.left = parseInt(rail.style.left) + 100 / element.dataset.pasduslide + "%";
			// console.log("le pas : ",Math.round(parseInt(rail.style.left) + 100 / element.dataset.imgperframe));
			// console.log("le pas : ",parseInt(rail.style.left) + 100 / element.dataset.imgperframe);
      }
   });
});
