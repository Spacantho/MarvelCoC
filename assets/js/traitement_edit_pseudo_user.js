$(function() {
    $("#username_input").on("submit", "#remplace_form_pseudo", function(e) {
            e.preventDefault();
            remplace = $(this).find("textarea[name=remplace_pseudo]").val();
            $.post("assets/php/traitement_edit_pseudo_user.php", {pseudo: remplace}, function(data){
                $('#remplace_form_pseudo').replaceWith(data);
            });
            return false;
    })
})