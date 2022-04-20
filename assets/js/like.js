$(document).on("click", "#click_unlike_like", function () {
  //Récupération de l'id de la vidéo via url
  var str = window.location.href;
  var url = new URL(str);
  var vidId = url.searchParams.get("video");
  //Like ou dislike cliqué avec récupération du champ html : "type_click"
  var type = $(this).data("type_click");

  $.ajax({
    url: "assets/php/setLike.php",
    type: "post",
    data: { like: type, vidId: vidId },
  }).done(function (response) {
    //On choisi la div et on marque la réponse directement dedans

    $("#res").html(response);
  });
  //Switch des boutons like et dislikes
  if (type == "like") {
    if ($("#dislikeicon").hasClass("activeD")) {
      $("#dislikeicon").toggleClass("activeD");
    }
    $("#likeicon").toggleClass("activeL");
  }
  if (type == "unlike") {
    if ($("#likeicon").hasClass("activeL")) {
      $("#likeicon").toggleClass("activeL");
    }
    $("#dislikeicon").toggleClass("activeD");
  }
});
