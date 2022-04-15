$(document).on("click", "#click_unlike_like", function () {
  //Récupération de l'id de la vidéo
  var str = window.location.href;
  var url = new URL(str);
  var vidId = url.searchParams.get("video");
  console.log(name);
  //Like ou dislike cliqué
  var type = $(this).data("type_click");

  $.ajax({
    url: "assets/php/setLike.php",
    type: "post",
    data: { like: type, vidId: vidId },
  }).done(function (response) {
    //On choisi la div et on marque la réponse directement dedans
    $("#res").html(response);
  });

  if (type == "like") {
  }
  if (type == "unlike") {
  }
});
