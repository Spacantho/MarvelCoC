var desc = document.getElementById("desc");

//On regarde si le texte est réduit
const isTextClamped = desc.scrollHeight > desc.clientHeight;
console.log(isTextClamped);
//On récupére le bouton
var btnText = document.getElementById("readButton");
//On le supprime si jamais le texte n'est pas réduit
if (!isTextClamped) {
  btnText.remove();
}
desc.style.display = "-webkit-box";

function readMore() {
  if (desc.style.display === "-webkit-box") {
    desc.style.display = "flex";
    btnText.innerHTML = "Voir moins...";
  } else {
    desc.style.display = "-webkit-box";
    btnText.innerHTML = "Voir plus...";
  }
}
