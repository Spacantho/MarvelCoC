function editPseudo(username_user, $id_user)
{
$(function () {

    $('.editPseudo').ready(function(){
            $.post("assets/php/edit_pseudo_user.php", {username: username_user, id: $id_user}, function(data){
                $('#username_input').replaceWith(data);
            });
        return false;
    });
});
}