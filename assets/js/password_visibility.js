let btnsVoir = document.querySelectorAll("#btnVoir");
btnsVoir = [...btnsVoir]; // conversion en tableau pour le foreach

//// Rendre visible/invisible le mot de passe dans le champ
btnsVoir.forEach((element) => {
   element.addEventListener("click", (e) => {
      let pswd = e.currentTarget.parentElement.querySelector("#Password");

      if (pswd.type == "password") pswd.type = "text";
      else pswd.type = "password";
   });
});
