let conteneur = document.getElementById("conteneur");
let btnInscript = document.getElementById("inscriptionBtn");
let connexion = document.getElementById("form_connexion");
let inscription = document.getElementById("form_inscription");

//////////// INIT ////////////
let connec = true;
// INIT pour manipuler en JS et rendre les dimensions dynamiques
let dimConnec = (connexion.style.height = connexion.offsetHeight + "px");
let dimBtnInscript = btnInscript.offsetHeight;
let dimInscrip = (inscription.style.height = inscription.offsetHeight + "px");
// TAILLE DEPART
let dimConteneur = (conteneur.style.height = parseInt(dimConnec) + parseInt(dimBtnInscript) + 30 + "px");
commuteInput(inscription, false);

//////////// INTERACTION ////////////

//// Commutation entre le volet connexion et inscription
btnInscript.addEventListener("click", () => {
   // SI le block connexion est ouvert ... il se ferme ET le conteneur s'ajuste au block inscription
   if (connec) {
      pan_inscription();
   }
   // SINON le block connexion est fermé ... il s'ouvre ET le conteneur reprend sa taille initiale
   else {
      pan_connexion();
   }
});

//////////// FONCTIONS ////////////

//// fait basculer la valeur "disabled" des inputs d'un conteneur (activer/désactiver)
function commuteInput(container, state) {
   container.querySelectorAll("input").forEach((element) => {
      element.disabled = !state;
   });
}

function pan_inscription() {
   connexion.style.height = 0 + "px";
   conteneur.style.height = parseInt(dimInscrip) + parseInt(dimBtnInscript) + 30 + "px";
   commuteInput(connexion, false);
   commuteInput(inscription, true);
   connec = false;
}

function pan_connexion() {
   conteneur.style.height = parseInt(dimConteneur) + "px"; // TAILLE DEPART
   connexion.style.height = parseInt(dimConnec) + "px";
   commuteInput(inscription, false);
   commuteInput(connexion, true);
   connec = true;
}
