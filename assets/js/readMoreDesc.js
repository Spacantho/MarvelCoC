desc.style.display = "-webkit-box";

function readMore() {
  var desc = document.getElementById("desc");
  var btnText = document.getElementById("readButton");


  if (desc.style.display === "-webkit-box") {
    desc.style.display = "flex";
    btnText.innerHTML = "Voir moins..."; 
  } else {
    desc.style.display = "-webkit-box";
    btnText.innerHTML = "Voir plus..."; 
  }
}