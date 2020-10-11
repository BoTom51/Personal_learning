let form = document.getElementById("formAccount");
let btnInscript = document.getElementById("inscriptionBtn");
let connexion = document.getElementById("block_connexion");
let inscription = document.getElementById("block_inscription");

//////////// INIT ////////////
let open = true;
// INIT pour manipuler en JS et rendre les dimensions dynamiques
let dimConnec = (connexion.style.height = connexion.offsetHeight + "px");
let dimBtnInscript = btnInscript.offsetHeight;
let dimInscrip = (inscription.style.height = inscription.offsetHeight + "px");
let dimForm = (form.style.height = parseInt(dimConnec) + parseInt(dimBtnInscript) + 30 + "px"); // BASE
commuteInput(inscription, false);

//////////// INTERACTION ////////////

//// Commutation entre le volet connexion et inscription
btnInscript.addEventListener("click", () => {
   // SI le block connexion est ouvert ... il se ferme ET le form s'ajuste au block inscription
   if (open) {
      connexion.style.height = 0 + "px";
      form.style.height = parseInt(dimInscrip) + parseInt(dimBtnInscript) + 30 + "px";
      commuteInput(connexion, false);
      commuteInput(inscription, true);
      open = false;
   }
   // SINON le block connexion est fermé ... il s'ouvre ET le form reprend sa taille initiale
   else {
      form.style.height = parseInt(dimForm) + "px"; // BASE
      connexion.style.height = parseInt(dimConnec) + "px";
      commuteInput(inscription, false);
      commuteInput(connexion, true);
      open = true;
   }
});

//////////// FONCTIONS ////////////

//// fait basculer la valeur "disabled" des inputs d'un conteneur (activer/désactiver)
function commuteInput(container, state) {
   container.querySelectorAll("input").forEach((element) => {
      element.disabled = !state;
   });
}
