$(function() {
    $("#scrolled").on("submit", "#remplace_form", function(e) {
            e.preventDefault();
            remplace = $(this).find("textarea[name=remplace]").val();
            id_commentaire = $(this).find("input[name=commentaire_id]").val();
            $.post("assets/php/traitement_edit_com_user.php", {com: remplace, id: id_commentaire}, function(data){
                $('.alertcommentaire').remove();
                $('#'+id_commentaire+' #remplace_form').replaceWith(data);
            });
            return false;
    })
})