$(function() {
    $("#comment_form").submit(function() {
            user = $(this).find("input[name=user_id]").val();
            video = $(this).find("input[name=video_id]").val();
            com = $(this).find("textarea[name=commentaire]").val();
            $.post("assets/php/traitement_commentaire.php", {user_id: user, commentaire: com, video_id: video}, function(data){
                $('textarea').val('');
                $('.error').remove();
                $("#base_com").after(data);
            });
            return false;
    })
})

function eraseText() {
    document.getElementById("output").value = "";
}

/* 
if($("textarea[name=commentaire]").val().trim().length < 1) {
    $("#base_com").before("<span style='color: red;'>Veuillez remplir ce champ</span>");
} else { }
    */